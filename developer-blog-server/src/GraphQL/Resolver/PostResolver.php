<?php
/**
 * Created by PhpStorm.
 * User: annabuzian
 * Date: 27.08.2018
 * Time: 21:48
 */

namespace app\GraphQL\Resolver;

use Doctrine\ORM\EntityManager;
use Overblog\GraphQLBundle\Definition\Argument;
use Overblog\GraphQLBundle\Definition\Resolver\AliasedInterface;
use Overblog\GraphQLBundle\Definition\Resolver\ResolverInterface;

/**
 * Class PostResolver
 * @package app\GraphQL\Resolver
 */
class PostResolver implements ResolverInterface, AliasedInterface {

    private $em;

    public function __construct(EntityManager $em)
    {
        $this->em = $em;
    }

    public function resolve(Argument $args)
    {
        $post = $this->em->getRepository('App:Post')->find($args['id']);
        return $post;
    }

    public static function getAliases()
    {
        return [
            'resolve' => 'Post'
        ];
    }
}