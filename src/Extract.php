<?php

namespace FerFabricio\Hydratator;

use FerFabricio\Hydratator\Traits\MethodExtractor;

class Extract
{
    use MethodExtractor;

    public static function toArray($object)
    {
        if (is_object($object)) {
            $methods = self::extractAndFilter($object, 'get');
            $result = [];
            foreach($methods as $getter) {
                $tmpData = $object->{$getter}();
                if (is_object($tmpData)) {
                    $tmpData = self::toArray($tmpData);
                }

                $result[self::getPropertyName($getter)] = $tmpData;
            }

            return $result;
        }

        throw new \Exception('toArray param require a object.');
    }
}
