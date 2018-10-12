<?php
/**
 * Created by PhpStorm.
 * User: christian
 * Date: 6/21/17
 * Time: 10:21 AM
 */

namespace Jeeno\Core\Exception;


use Exception;

/**
 * Class ResourceNotFoundException
 *
 * @package Jeeno\Core\Exception
 */
class ResourceNotFoundException extends Exception
{
    /**
     * ResourceNotFoundException constructor.
     *
     * @param string $resourceType
     * @param int    $resourceId
     * @param string $extraMessage
     */
    public function __construct(string $resourceType, $resourceId, $extraMessage = '')
    {
        $message = sprintf("Resource %s (%s) not found %s", $resourceType, $resourceId, $extraMessage);

        parent::__construct($message);
    }
}