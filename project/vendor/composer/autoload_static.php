<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit720a11aaef6a2cf77658d6def72aef1a
{
    public static $prefixLengthsPsr4 = array (
        'C' => 
        array (
            'Core\\' => 5,
        ),
        'A' => 
        array (
            'App\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Core\\' => 
        array (
            0 => __DIR__ . '/../..' . '/core',
        ),
        'App\\' => 
        array (
            0 => __DIR__ . '/../..' . '/app',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit720a11aaef6a2cf77658d6def72aef1a::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit720a11aaef6a2cf77658d6def72aef1a::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}