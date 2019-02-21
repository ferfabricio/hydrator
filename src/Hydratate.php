<?php

namespace FerFabricio\Hydratator;

class Hydratate
{
    private static function getSetters($className)
    {
        $avaibleMethods = \get_class_methods($className);
        $reducer = function ($acc, $method) {
            if (\substr($method, 0, 3) === 'set') {
                array_push($acc, $method);
                return $acc;
            }

            return $acc;
        };

        return array_reduce($avaibleMethods, $reducer, []);
    }

    private static function getSetterName($key)
    {
        return 'set' . ucwords($key);
    }

    public static function toObject($className, $source)
    {
        $setters = self::getSetters($className);
        $finalObj = new $className;
        foreach ($source as $key => $value) {
            $setterName = self::getSetterName($key);
            if (in_array($setterName, $setters)) {
                $finalObj->{$setterName}($value);
            }
        }

        return $finalObj;
    }
}
