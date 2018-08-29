<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class BlogController
 * @package App\Controller
 */
class BlogController extends Controller
{
    /**
     * @Route("/blog/", name="blog_list")
     * @Route("/blog/{id}", name="blog")
     */
    public function showAction($id = null)
    {
        return $this->render('blog/blog.html.twig', []);
    }
}
