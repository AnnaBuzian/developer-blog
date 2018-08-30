<?php

namespace App\GraphQL\Field;

use Youshido\GraphQL\Config\Field\FieldConfig;
use Youshido\GraphQL\Execution\ResolveInfo;
use Youshido\GraphQL\Type\Scalar\IdType;
use App\GraphQL\Type\BlogType;
use App\Entity\Blog;

/**
 * Class BlogField
 * @package App\GraphQL\Field
 */
class BlogField extends AbstractField
{
    /**
     * @return BlogType
     */
    public function getType()
    {
        return new BlogType();
    }

    /**
     * @param $config
     */
    public function build(FieldConfig $config)
    {
        $config->addArguments(
            [
                'id' => new IdType(),
            ]
        );
    }

    /**
     * @param $value
     * @param array $args
     * @param ResolveInfo $info
     * @return null|object
     */
    public function resolve($value, array $args, ResolveInfo $info)
    {
        $result = null;

        $blogId = $args['id'];
        $em = $this->getEntityManager();

        $result = $em->getRepository(Blog::class)
                     ->findOneBy(['id' => $blogId]);

        return $result;
    }
}
