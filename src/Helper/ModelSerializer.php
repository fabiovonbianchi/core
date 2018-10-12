<?php
/**
 * Created by PhpStorm.
 * User: christian
 * Date: 6/13/17
 * Time: 6:19 PM
 */

namespace Jeeno\Core\Helper;


/**
 * Interface ModelSerializer
 *
 * @package Jeeno\Core\Helper
 */
interface ModelSerializer
{
    /**
     * @param $model
     *
     * @return array
     */
    public function serialize($model):array;
}