<?php
/**
 * Created by PhpStorm.
 * User: pierre
 * Date: 3/4/19
 * Time: 12:57 PM
 */
declare(strict_types=1);


namespace App\Core;


class FileManipulation
{
    /**
     * Create hexadecimal hash folder with personalized deep
     *
     * @param string $absolutePath
     * @param int    $nbLevel
     */
    public static function hexaHashFolder(string $absolutePath, int $nbLevel): void
    {
        $hex = ['0', '1', '2', '3', '4', '5', '6', '7', '8', '9', 'a', 'b', 'c', 'd', 'e', 'f'];

        foreach ($hex as $folderNameLevel) {
            $pathLevel = $absolutePath . '/' . $folderNameLevel;
            if ($nbLevel > 1) {
                self::hexaHashFolder($pathLevel, $nbLevel - 1);
            } else {
                if (! is_dir($pathLevel) && ! file_exists($pathLevel)) {
                    if (! mkdir($pathLevel, 0705, true)) {
                        echo $pathLevel . PHP_EOL;
                    }
                }
            }
        }
    }

    /**
     * return the absolute path of a photo
     *
     * @example /var/www/img/photos/test/e/b/s/pho_dqqhbq56.jpg
     *
     * @param string $name
     *
     * @return string
     */
    public static function getPhotoPathByName(string $name): string
    {
        $md5Path = implode('/', str_split(substr(md5($name), 0, 3)));
        return realpath(getenv('PHOTOS_BASE_PATH') . '/' . $md5Path) . '/' . $name;

    }

    /**
     * delete recursively everything under the given path
     *
     * @param string $dir
     *
     * @return bool
     */
    public static function delTree(string $dir): bool
    {
        $files = array_diff(scandir($dir), ['.', '..']);
        foreach ($files as $file) {
            (is_dir("$dir/$file")) ? self::delTree("$dir/$file") : unlink("$dir/$file");
        }
        return rmdir($dir);
    }

}
