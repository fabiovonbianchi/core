<?php
/**
 * Created by PhpStorm.
 * User: christian
 * Date: 1/11/17
 * Time: 6:17 PM
 */

namespace Jeeno\Core\Helper;


/**
 * Class PropertyHelper
 *
 * @package Jeeno\Core\Helper
 */
class PropertyHelper
{
    /**
     * @param $object
     * @param $property
     * @param $value
     */
    public static function setProperty($object, string $property, $value): void
    {
        $setter = \Closure::bind(
            function ($object) use ($property, $value) {
                $object->{$property} = $value;
            },
            null,
            get_class($object)
        );

        $setter($object);
    }

    /**
     * @param mixed  $object
     * @param string $property
     *
     * @return mixed
     */
    public static function getProperty($object, string $property)
    {
        $getter = \Closure::bind(
            function ($object) use ($property) {
                return $object->{$property};
            },
            null,
            get_class($object)
        );

        return $getter($object);
    }

}