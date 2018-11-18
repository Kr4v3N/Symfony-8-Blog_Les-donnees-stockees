<?php

namespace App\Controller;

use App\Entity\Category;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class CategoryController extends AbstractController
{
    /**
     * @Route ("/blog/category/{id}", name="blog_category")
     * @return \Symfony\Component\HttpFoundation\Response
     * @param Category $category
     * @return mixed
     */
//    public function show(Category $category)
//    {
//        return $this->render('/blog/categoryShow.html.twig', ['category' => $category]);
//    }
}
