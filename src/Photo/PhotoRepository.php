<?php
/**
 * Created by PhpStorm.
 * User: pierre
 * Date: 3/1/19
 * Time: 3:58 PM
 */

declare(strict_types=1);

namespace App\Photo;


use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

class PhotoRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Photo::class);
    }

    public function findAll()
    {
        return parent::findAll(); // TODO: Change the autogenerated stub
    }

    public function persist(Photo $photo): bool
    {
        $this->getEntityManager()->persist($photo);
        $this->getEntityManager()->flush();

        return true;
    }
}