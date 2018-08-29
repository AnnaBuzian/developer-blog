<?php

namespace App\GraphQL;

use Youshido\GraphQL\Config\Schema\SchemaConfig;
use Youshido\GraphQL\Schema\AbstractSchema;

/**
 * Class Schema
 * @package App\GraphQL
 */
class Schema extends AbstractSchema
{
    public function build(SchemaConfig $config)
    {
        $config->setQuery(new RootQuery());
    }
}
