<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit218d80ce2b6cc1ba921d59701ed00199
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
            $loader->prefixLengthsPsr4 = ComposerStaticInit218d80ce2b6cc1ba921d59701ed00199::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit218d80ce2b6cc1ba921d59701ed00199::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit218d80ce2b6cc1ba921d59701ed00199::$classMap;

        }, null, ClassLoader::class);
    }
}