<?php

namespace App\Controller;

use App\Entity\Article;
use App\Entity\Category;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Form\ArticleType;
use Symfony\Component\HttpFoundation\Request;

class ArticleController extends AbstractController
{
    /**
     * @Route("/article", name="article")
     */
    public function index()
    {
        $categories = $this->getDoctrine()->getRepository(Category::class)->findAll();


        foreach ($categories as $category)
        {
            $articles = $this->getDoctrine()->getRepository(Article::class)->findBy(['category' => $category->getId()]);

            foreach ($articles as $article)
            {
                $category->addArticle($article);
            }

            $tableau[] = $category->getArticles();
        }



        return $this->render('article/index.html.twig', [
            'controller_name' => 'ArticleController',
            /*	        'categories' => $categories,
                        'articles' => $articles,*/
            'tableau' => $tableau
        ]);
    }


    /**
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     * @route ("/article/add", name="addArticle")
     */
    public function addArticle(Request $request)
    {

        $article = new Article();
        $form = $this->createForm(ArticleType::class, $article);
        $form->handleRequest($request);


        if($form->isSubmitted() && $form->isValid())
        {
            $article = $form->getData();
            $EntityManager = $this->getDoctrine()->getManager();
            $EntityManager->persist($article);
            $EntityManager->flush();

            return $this->redirectToRoute('article');
        }


        return $this->render('article/addArticle.html.twig', [
            'controller_name' => 'CategoryController',
            'form' => $form->createView(),
        ]);
    }

    /**
     * @param Article $article
     * @return \Symfony\Component\HttpFoundation\Response
     * @route ("article/{id}", name="article_show")
     */

    public function show(Article $article)
    {
        $tags = $article->getTags();
        return $this->render('article/show.html.twig', [
            'article' => $article,
            'tags' => $tags,
        ]);
    }

}
