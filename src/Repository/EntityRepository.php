<?php
/**
 * Created by PhpStorm.
 * User: christian
 * Date: 10/6/18
 * Time: 11:43 AM
 */

namespace Jeeno\Core\Repository;


use Jeeno\Core\Entity\Entity;

/**
 * Interface EntityRepository
 *
 * @package Jeeno\Core\Repository
 */
interface EntityRepository
{
    /**
     * @param int $id
     *
     * @return Entity|null
     */
    public function findById(int $id):?Entity;


    /**
     * @return Entity[]
     */
    public function findAll(): array;

    /**
     * @param Entity $entity
     */
    public function add(Entity $entity): void;

    /**
     * @param Entity $entity
     */
    public function remove(Entity $entity): void;
}