<?php
/**
 * Created by PhpStorm.
 * User: christian
 * Date: 6/16/17
 * Time: 9:52 AM
 */

namespace Jeeno\Core\Repository;


use Doctrine\Common\Collections\ArrayCollection;
use Jeeno\Core\Entity\Entity;
use Jeeno\Core\Helper\ModelSerializer;
use Jeeno\Core\Helper\PropertyHelper;

/**
 * Class InMemoryEntityRepository
 *
 * @package Jeeno\Core\Repository
 */
abstract class InMemoryEntityRepository
{
    /** @var  ArrayCollection */
    protected $collection;

    private $indexCounter = 0;

    /**
     * @var ModelSerializer
     */
    private $serializer;

    /**
     * InMemoryEntityRepository constructor.
     *
     * @param ModelSerializer $serializer
     */
    public function __construct(ModelSerializer $serializer)
    {
        $this->collection = new ArrayCollection();
        $this->serializer = $serializer;
    }

    /**
     * @param Entity $entity
     */
    protected function _persist(Entity $entity)
    {
        if ($entity->getId() === null) {
            $this->indexCounter++;

            PropertyHelper::setProperty($entity, 'id', $this->indexCounter);
            PropertyHelper::setProperty($entity, 'createdAt', new \DateTime());
            PropertyHelper::setProperty($entity, 'updatedAt', new \DateTime());
        }

        $this->collection->set($entity->getId(), $entity);
    }

    /**
     * @param int $id
     *
     * @return Entity
     */
    protected function _find(int $id): ?Entity
    {
        return $this->collection->get($id);
    }

    /**
     * @param string $key
     * @param        $value
     *
     * @return ArrayCollection|\Doctrine\Common\Collections\Collection
     */
    protected function _findBy(string $key, $value): ArrayCollection
    {
        return $this->collection->filter(
            function (Entity $entity) use ($key, $value) {
                return PropertyHelper::getProperty($entity, $key) == $value;
            }
        );
    }

    /**
     * @param string $key
     * @param        $value
     *
     * @return Entity
     */
    protected function _findOneBy(string $key, $value): ?Entity
    {
        $result = $this->_findBy($key, $value);

        $entity = $result->first();

        return $entity === false ? null : $entity;
    }

    /**
     * @return ArrayCollection
     */
    protected function _findAll()
    {
        return $this->collection;
    }
}