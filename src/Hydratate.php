<?php

namespace FerFabricio\Hydratator;

use FerFabricio\Hydratator\Traits\MethodExtractor;

class Hydratate
{
    use MethodExtractor;

    private static function getSetterName($key)
    {
        return 'set' . ucwords($key);
    }

    public static function toObject($className, $source)
    {
        $finalObj = new $className;
        $setters = self::extractAndFilter($finalObj, 'set');
        foreach ($source as $key => $value) {
            $setterName = self::getSetterName($key);
            if (in_array($setterName, $setters)) {
                $finalObj->{$setterName}($value);
            }
        }

        return $finalObj;
    }
}
