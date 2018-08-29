<?php

namespace App\GraphQL;

use Youshido\GraphQL\Config\Object\ObjectTypeConfig;
use Youshido\GraphQL\Type\Object\AbstractObjectType;
use App\GraphQL\Field\AllBlogsField;
use App\GraphQL\Field\BlogField;

/**
 * Class RootQuery
 * @package App\GraphQL
 */
class RootQuery extends AbstractObjectType
{
    /**
     * @param ObjectTypeConfig $config
     */
    public function build($config)
    {
        $config->addFields([
            new AllBlogsField(),
            new BlogField(),
        ]);
    }
}
