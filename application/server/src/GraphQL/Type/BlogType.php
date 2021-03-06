<?php

namespace App\GraphQL\Type;

use Youshido\GraphQL\Type\Object\AbstractObjectType;
use Youshido\GraphQL\Type\Scalar\IdType;
use Youshido\GraphQL\Type\Scalar\StringType;
use Youshido\GraphQL\Type\Scalar\DateTimeType;

/**
 * Class BlogType
 * @package App\GraphQL\Type
 */
class BlogType extends AbstractObjectType
{
    public function build($config)
    {
        $config->addFields([
            'id' => new IdType(),
            'title' => new StringType(),
            'content' => new StringType(),
            'created_at' => new DateTimeType(),
            'user' => new UserType(),
        ]);
    }
}
