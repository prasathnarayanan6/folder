<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit9211fb7f27208afcc4dc2d3d15188eb3
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
            $loader->prefixLengthsPsr4 = ComposerStaticInit9211fb7f27208afcc4dc2d3d15188eb3::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit9211fb7f27208afcc4dc2d3d15188eb3::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit9211fb7f27208afcc4dc2d3d15188eb3::$classMap;

        }, null, ClassLoader::class);
    }
}
