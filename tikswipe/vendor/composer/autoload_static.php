<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit2c39118838c553abffe414c6fa2ea8f4
{
    public static $prefixLengthsPsr4 = array (
        'C' => 
        array (
            'Composer\\Installers\\' => 20,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Composer\\Installers\\' => 
        array (
            0 => __DIR__ . '/..' . '/composer/installers/src/Composer/Installers',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit2c39118838c553abffe414c6fa2ea8f4::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit2c39118838c553abffe414c6fa2ea8f4::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit2c39118838c553abffe414c6fa2ea8f4::$classMap;

        }, null, ClassLoader::class);
    }
}