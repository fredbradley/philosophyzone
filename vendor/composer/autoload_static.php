<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit165cc790e63373cd56caee3c12846f32
{
    public static $files = array (
        '1f37a5ef85747fbad7d9cdafefb4209b' => __DIR__ . '/..' . '/yahnis-elsts/admin-notices/AdminNotice.php',
        'efa803deefb591fb71236877c8a12137' => __DIR__ . '/../..' . '/app/helpers.php',
        'a431defd1741eda719df61d88daac760' => __DIR__ . '/../..' . '/app/Widgets/WidgetFooterLogo.php',
    );

    public static $prefixLengthsPsr4 = array (
        'P' => 
        array (
            'PostTypes\\' => 10,
        ),
        'C' => 
        array (
            'CranleighSchool\\PhilosophyZoneTheme\\' => 36,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'PostTypes\\' => 
        array (
            0 => __DIR__ . '/..' . '/jjgrainger/posttypes/src',
        ),
        'CranleighSchool\\PhilosophyZoneTheme\\' => 
        array (
            0 => __DIR__ . '/../..' . '/app',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit165cc790e63373cd56caee3c12846f32::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit165cc790e63373cd56caee3c12846f32::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
