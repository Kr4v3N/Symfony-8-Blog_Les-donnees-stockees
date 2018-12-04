<?php
namespace App\Controller;
use App\Form\CategoryType;
use App\Entity\Category;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
class CategoryController extends AbstractController
{
    /**
     * @Route("/category", name="category")
     */
    public function index(Request $request)
    {

        $category = new Category();
        $form = $this->createForm(CategoryType::class, $category);
        $form->handleRequest($request);


        if($form->isSubmitted() && $form->isValid())
        {
            $category = $form->getData();
            $EntityManager = $this->getDoctrine()->getManager();
            $EntityManager->persist($category);
            $EntityManager->flush();
        }


        return $this->render('category/index.html.twig', [
            'controller_name' => 'CategoryController',
            'form' => $form->createView(),
        ]);
    }

    /**
     * @param Category $category
     * @return \Symfony\Component\HttpFoundation\Response
     * @Route("/category/{category}", name="category_show")
     */
    public function show(Category $category)
    {
        return $this->render('category/index.html.twig', [
            'category' => $category
        ]);
    }

}
