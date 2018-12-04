<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Entity\Article;
use Symfony\Component\Routing\Annotation\Route;

class BlogController extends AbstractController
{
    /**
     * @Route("blog/{slug}",requirements={"slug"="[a-z0-9-]+"}, name="blog")
     *
     */
    public function show($slug = "Article Sans Titre")
    {
        $slug = str_replace('-', ' ', ucwords($slug));
        $slug = ucwords($slug);
        return $this->render('blog/blog.html.twig', [
            'slug'=> $slug,
        ]);
    }
    /**
     * Show all row from article's entity
     *
     * @Route("/articles", name="blog_index")

     */
    public function index()
    {
        $articles = $this->getDoctrine()
            ->getRepository(Article::class)
            ->findAll();

        if (!$articles) {
            throw $this->createNotFoundException(
                'No article found in article\'s table.'
            );
        }

        return $this->render(
            'blog/index.html.twig',
            ['articles' => $articles]
        );
    }
}
