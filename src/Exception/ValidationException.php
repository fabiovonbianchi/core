<?php
/**
 * Created by PhpStorm.
 * User: christian
 * Date: 7/17/17
 * Time: 6:07 PM
 */

namespace Jeeno\Core\Exception;

/**
 * Class ValidationException
 *
 * @package Jeeno\Core\Exception
 */
class ValidationException extends \Exception
{
    /**
     * @var string
     */
    public $key;

    /**
     * @var string
     */
    public $error;

    /**
     * ValidationException constructor.
     *
     * @param string $key
     * @param string $message
     */
    public function __construct(string $key, string $message)
    {
        parent::__construct("{$key}: {$message}");

        $this->key   = $key;
        $this->error = $message;
    }
}