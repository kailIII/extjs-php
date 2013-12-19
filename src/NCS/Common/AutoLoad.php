<?php

namespace Core\Common;

class AutoLoad
{
    
    private static $_namespace = array();

    public static function addPath($namespace, $path) {
        self::$_namespace[$namespace] = $path;
    }

    protected static function findPath($prefix) {
       return (array_key_exists($prefix[0], self::$_namespace))
            ? self::$_namespace[$prefix[0]] . DS
            : ROOT . DS;
    }

    public static function register() {
        return spl_autoload_register(array(__CLASS__, 'load'));
    }

    public static function unregister() {
        return spl_autoload_unregister(array(__CLASS__, 'load'));
    }

    public static function load($className) {
        $className = ltrim($className, '\\');
        if ($lastNsPos = strripos($className, '\\')) {
            $namespace = substr($className, 0, $lastNsPos);
            $className = substr($className, $lastNsPos + 1);
        } 
        $fileName = self::findPath(explode('\\', $namespace))
                  . DS
                  . str_replace('\\', DS, $namespace)
                  . DS
                  . str_replace('_', DS, $className)
                  . '.php';
        return include $fileName;
    }

}

