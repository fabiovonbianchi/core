<?php
/**
 * Created by PhpStorm.
 * User: christian
 * Date: 10/5/18
 * Time: 1:32 PM
 */

namespace Jeeno\Core\Entity;

use DateTime;

/**
 * Interface Entity
 *
 * @package Library\Core\Entity
 */
interface Entity
{
    /**
     * @return int
     */
    function getId():?int;

    /**
     * @return DateTime
     */
    function getCreatedAt():DateTime;

    /**
     * @return DateTime
     */
    function getUpdatedAt():DateTime;
}