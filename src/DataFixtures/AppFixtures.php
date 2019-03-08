<?php

namespace App\DataFixtures;

use App\Core\FileManipulation;
use App\Photo\Photo;
use App\Place\Place;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Faker\Factory;

class AppFixtures extends Fixture
{
    /**
     * @var string
     */
    private $photoBasepath;

    public function load(ObjectManager $manager)
    {
        $this->photoBasepath = getenv('PHOTOS_BASE_PATH');
        $pathOfPhotos =   ($this->photoBasepath);
        if($pathOfPhotos !== false && is_dir($pathOfPhotos)) {
            FileManipulation::delTree($pathOfPhotos);
        }
        FileManipulation::hexaHashFolder($pathOfPhotos, 3);

        // create 4 travel! Bam!
        for ($i = 0; $i < 4; $i++) {
            $travel = $this->generateTravel();
            $manager->persist($travel);

            $nbStep = rand(2, 5);
            for ($j = 0; $j < $nbStep; $j++) {
                $step = $this->generateStep($travel, $j);
                $manager->persist($step);

                $nbPhoto = rand(1, 7);
                for ($k = 0; $k < $nbPhoto; $k++) {
                    $photo = $this->generatePhoto($step, $k);
                    $manager->persist($photo);
                }
            }
        }

        $manager->flush();
    }

    public function generateTravel(): Place
    {
        $faker = Factory::create('fr_FR');

        $stringDateTime = $faker->date() . ' ' . $faker->time();
        $timezone       = $faker->timezone;
        $dateTimeStart  = new \DateTime($stringDateTime, new \DateTimeZone($timezone));
        $dateTimeEnd    = new \DateTime($stringDateTime, new \DateTimeZone($timezone));
        $dateTimeEnd->add(new \DateInterval('P' . rand(7, 28) . 'D'));

        return $this->generatePlace('travel', $dateTimeStart, $dateTimeEnd);
    }

    public function generateStep(Place $travel, int $j): Place
    {
        $dateTimeStart = new \DateTime(
            $travel->getDatetimeStartLocal()->format('Y-m-d H:i:s'),
            $travel->getDatetimeStartLocal()->getTimezone()
        );
        $dateTimeStart->add(new \DateInterval('P' . $j . 'D'));
        $dateTimeEnd = new \DateTime(
            $travel->getDatetimeStartLocal()->format('Y-m-d H:i:s'),
            $travel->getDatetimeStartLocal()->getTimezone()
        );
        $dateTimeEnd->add(new \DateInterval('P' . ($j + 1) . 'D'));

        return $this->generatePlace('step', $dateTimeStart, $dateTimeEnd);
    }

    public function generatePhoto(Place $step, int $k): Photo
    {
        $faker = Factory::create('fr_FR');

        $date = new \DateTime(
            $step->getDatetimeStartLocal()->format('Y-m-d H:i:s'),
            $step->getDatetimeStartLocal()->getTimezone()
        );
        $date->add(new \DateInterval('PT' . ($k + rand(1, 3)) . 'H'));

        $photo = new Photo();
        $photo->setName(uniqid('pho_').'.jpg')
              ->setDescription($faker->text)
              ->setPlace($step)
              ->setTimezone($date->getTimezone()->getName())
              ->setDatetimeLocal(clone $date);
        $date->setTimezone(new \DateTimeZone('UTC'));
        $photo->setDatetimeUtc($date);

        $tmpFileName = $faker->image('/tmp', 800, 600, 'cats', true, true);
        $newFileName = FileManipulation::getPhotoPathByName($photo->getName());
        rename($tmpFileName, $newFileName);

        return $photo;
    }

    public function generatePlace(string $kindOfPlace, \DateTime $dateStart, \DateTime $dateEnd): Place
    {
        $faker = Factory::create('fr_FR');

        $place = new Place();
        $place->setKind($kindOfPlace)
              ->setName($kindOfPlace === 'travel' ? $faker->country : $faker->realText(50))
              ->setDescription($faker->text);

        $place->setTimezoneStart($dateStart->getTimezone()->getName());
        $place->setDatetimeStartLocal(clone $dateStart);
        $dateStart->setTimezone(new \DateTimeZone('UTC'));
        $place->setDatetimeStartUtc($dateStart);

        $place->setTimezoneEnd($dateEnd->getTimezone()->getName());
        $place->setDatetimeEndLocal(clone $dateEnd);
        $dateEnd->setTimezone(new \DateTimeZone('UTC'));
        $place->setDatetimeEndUtc($dateEnd);

        return $place;
    }
}
