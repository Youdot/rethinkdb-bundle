<?php

namespace Youdot\RethinkDBBundle\Helper;

use r\Cursor;

class QueryHelper
{
    public static function cursorToAssociativeArray(Cursor $cursor): array
    {
        $objects = $cursor->toArray();
        array_walk($objects, function (\ArrayObject &$entry) {
            $entry = self::normalizeValues($entry->getArrayCopy());
        });

        return $objects;
    }

    public static function arrayObjectToAssociativeArray(\ArrayObject $arrayObject): array
    {
        return self::normalizeValues($arrayObject->getArrayCopy());
    }

    public static function normalizeValues($values)
    {
        return array_map(function ($value) {
            if (is_a($value, \ArrayObject::class)) {
                return self::normalizeValues($value->getArrayCopy());
            }

            return $value;
        }, $values);
    }
}
