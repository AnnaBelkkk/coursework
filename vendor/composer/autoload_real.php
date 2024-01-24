<?php

// autoload_real.php @generated by Composer

class ComposerAutoloaderInit1c4c01454a1ce41af4bb3bd8b82f13f2
{
    private static $loader;

    public static function loadClassLoader($class)
    {
        if ('Composer\Autoload\ClassLoader' === $class) {
            require __DIR__ . '/ClassLoader.php';
        }
    }

    /**
     * @return \Composer\Autoload\ClassLoader
     */
    public static function getLoader()
    {
        if (null !== self::$loader) {
            return self::$loader;
        }

        require __DIR__ . '/platform_check.php';

        spl_autoload_register(array('ComposerAutoloaderInit1c4c01454a1ce41af4bb3bd8b82f13f2', 'loadClassLoader'), true, true);
        self::$loader = $loader = new \Composer\Autoload\ClassLoader(\dirname(__DIR__));
        spl_autoload_unregister(array('ComposerAutoloaderInit1c4c01454a1ce41af4bb3bd8b82f13f2', 'loadClassLoader'));

        require __DIR__ . '/autoload_static.php';
        call_user_func(\Composer\Autoload\ComposerStaticInit1c4c01454a1ce41af4bb3bd8b82f13f2::getInitializer($loader));

        $loader->register(true);

        return $loader;
    }
}
