<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit04c2731d64dea9163b8cfab8ecc4259a
{
    public static $prefixLengthsPsr4 = array (
        'P' => 
        array (
            'PHPMailer\\PHPMailer\\' => 20,
        ),
        'D' => 
        array (
            'DiscordWebhooks\\' => 16,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'PHPMailer\\PHPMailer\\' => 
        array (
            0 => __DIR__ . '/..' . '/phpmailer/phpmailer/src',
        ),
        'DiscordWebhooks\\' => 
        array (
            0 => __DIR__ . '/..' . '/nopjmp/discord-webhooks/DiscordWebhooks',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit04c2731d64dea9163b8cfab8ecc4259a::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit04c2731d64dea9163b8cfab8ecc4259a::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit04c2731d64dea9163b8cfab8ecc4259a::$classMap;

        }, null, ClassLoader::class);
    }
}
