<?php

namespace Jeeno\Core\Helper;

use Symfony\Component\Serializer\Serializer;

/**
 * Class ModelSerializerDefault
 *
 * @package Jeeno\Core\Helper
 */
class ModelSerializerDefault implements ModelSerializer
{
    /**
     * @var Serializer
     */
    private $serializer;

    /**
     * ModelSerializerDefault constructor.
     *
     * @param Serializer $serializer
     */
    public function __construct(Serializer $serializer)
    {
        $this->serializer = $serializer;
    }

    /**
     * @param $model
     *
     * @return array
     */
    public function serialize($model): array
    {
        $result = $this->serializer->normalize($model);

        return $result;
    }
}