<?php

namespace App\Controller;

use App\Entity\Category;
use App\Form\CategoryType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class CategoryController extends AbstractController
{
    /**
     * @Route("categorylist", name="categorynew")
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function index()
    {
        $categories = $this->getDoctrine()
            ->getRepository(Category::class)
            ->findAll();

        if (!$categories) {
            throw $this->createNotFoundException(
                'No article found in article\'s table.'
            );
        }

        return $this->render(
            '/category/category.html.twig',
            ['categories' => $categories]
        );
    }

    /**
     * @Route("category/{id}", name="category_show")
     * @param Category $category
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function show(Category $category)
    {
        return $this->render(
            '/category/categoryShow.html.twig',
            ['category' => $category]
        );
    }

    /**
     * @Route("/category", name="category")
     */
    public function add(Request $request)
    {
        $category = new Category();
        $form = $this->createForm(CategoryType::class, $category);
        $form->handleRequest($request);
        if ($form->isSubmitted()) {
            $data = $form->getData();
            $em = $this->getDoctrine()->getManager();
            $em->persist($data);
            $em->flush();
        }
        return $this->render('category/categoryAdd.html.twig', [
            'form' =>$form->createView(),
        ]);
    }

}
