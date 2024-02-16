<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit0d26461a4d34e02e489a9be8ecbbed60
{
    public static $prefixLengthsPsr4 = array (
        'r' => 
        array (
            'rasteiner\\KirbyHyphens\\' => 23,
        ),
        'V' => 
        array (
            'Vanderlee\\Syllable\\' => 19,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'rasteiner\\KirbyHyphens\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
        'Vanderlee\\Syllable\\' => 
        array (
            0 => __DIR__ . '/..' . '/vanderlee/syllable/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit0d26461a4d34e02e489a9be8ecbbed60::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit0d26461a4d34e02e489a9be8ecbbed60::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit0d26461a4d34e02e489a9be8ecbbed60::$classMap;

        }, null, ClassLoader::class);
    }
}