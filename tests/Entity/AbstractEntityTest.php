<?php
/**
 * Created by PhpStorm.
 * User: christian
 * Date: 10/12/18
 * Time: 12:44 PM
 */

namespace Jeeno\Core\Entity;

use DateTime;
use Jeeno\Core\Helper\PropertyHelper;
use PHPUnit\Framework\Assert;
use PHPUnit\Framework\TestCase;

/**
 * Class AbstractEntityTest
 *
 * @package Jeeno\Core\Entity
 */
class AbstractEntityTest extends TestCase
{
    /**
     * @test
     */
    public function shouldCreateAnEntityAndSetNothing()
    {
        $entity = $this->getEntity();

        Assert::assertNull($entity->getId());
        Assert::assertNotNull($entity->getCreatedAt());
        Assert::assertNotNull($entity->getUpdatedAt());
    }

    /**
     * @test
     */
    public function shouldCreateAnEntityAndSetInternalValue()
    {
        $id       = 1;
        $dateTime = new DateTime();

        $entity = $this->getEntity();

        $this->fillEntity($entity, 1, $dateTime);

        Assert::assertEquals($id, $entity->getId());
        Assert::assertEquals($dateTime, $entity->getUpdatedAt());
        Assert::assertEquals($dateTime, $entity->getCreatedAt());
    }

    /**
     * @return AbstractEntity
     */
    private function getEntity(): AbstractEntity
    {
        return new class() extends AbstractEntity
        {
            public function __construct()
            {
                $this->createdAt = new DateTime();
                $this->updatedAt = new DateTime();
            }
        };
    }

    /**
     * @param AbstractEntity $entity
     */
    private function fillEntity(AbstractEntity $entity, int $id, DateTime $dateTime): void
    {
        PropertyHelper::setProperty($entity, 'id', $id);
        PropertyHelper::setProperty($entity, 'createdAt', $dateTime);
        PropertyHelper::setProperty($entity, 'updatedAt', $dateTime);
    }
}