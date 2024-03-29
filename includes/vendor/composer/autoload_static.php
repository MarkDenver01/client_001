<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit0034f53ddf60ac4b46c56f0b1e02aaff
{
    public static $prefixLengthsPsr4 = array (
        'P' => 
        array (
            'PHPMailer\\PHPMailer\\' => 20,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'PHPMailer\\PHPMailer\\' => 
        array (
            0 => __DIR__ . '/..' . '/phpmailer/phpmailer/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit0034f53ddf60ac4b46c56f0b1e02aaff::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit0034f53ddf60ac4b46c56f0b1e02aaff::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit0034f53ddf60ac4b46c56f0b1e02aaff::$classMap;

        }, null, ClassLoader::class);
    }
}
