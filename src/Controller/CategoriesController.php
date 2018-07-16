<?php

namespace App\Controller;

use App\Entity\Categories;
use App\Entity\Products;
use App\Form\CategoriesType;
use App\Repository\CategoriesRepository;
use App\Repository\ProductsRepository;
use App\Repository\SubCategoriesRepository;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/category")
 */
class CategoriesController extends Controller
{
//    /**
//     * @Route("/", name="categories_index", methods="GET")
//     */
//    public function index(CategoriesRepository $categoriesRepository): Response
//    {
//        return $this->render('categories/index.html.twig', ['categories' => $categoriesRepository->findAll()]);
//    }

//    /**
//     * @Route("/new", name="categories_new", methods="GET|POST")
//     */
//    public function new(Request $request): Response
//    {
//        $category = new Categories();
//        $form = $this->createForm(CategoriesType::class, $category);
//        $form->handleRequest($request);
//
//        if ($form->isSubmitted() && $form->isValid()) {
//            $em = $this->getDoctrine()->getManager();
//            $em->persist($category);
//            $em->flush();
//
//            return $this->redirectToRoute('categories_index');
//        }
//
//        return $this->render('categories/new.html.twig', [
//            'category' => $category,
//            'form' => $form->createView(),
//        ]);
//    }

    /**
     * @Route("/{slug}", name="categories_show", methods="GET")
     * @ParamConverter("slug", options={"mapping": {"category_name" : "name"}})
     */
    public function show($slug, CategoriesRepository $categoriesRepository, SubCategoriesRepository $subCategoriesRepository, ProductsRepository $productsRepository): Response
    {
        $category = $categoriesRepository->findBy(array('name' => $slug));

        return $this->render('categories/show.html.twig', [
            'category' => $category[0],
            'categories' => $categoriesRepository->findAll(),
            'sub_categories' => $subCategoriesRepository->findBy(array('category' => $category[0])),
            'products' => $productsRepository->findBy(array('category' => $category[0]), array('date' => 'DESC'), 5),
        ]);
    }

//    /**
//     * @Route("/{id}/edit", name="categories_edit", methods="GET|POST")
//     */
//    public function edit(Request $request, Categories $category): Response
//    {
//        $form = $this->createForm(CategoriesType::class, $category);
//        $form->handleRequest($request);
//
//        if ($form->isSubmitted() && $form->isValid()) {
//            $this->getDoctrine()->getManager()->flush();
//
//            return $this->redirectToRoute('categories_edit', ['id' => $category->getId()]);
//        }
//
//        return $this->render('categories/edit.html.twig', [
//            'category' => $category,
//            'form' => $form->createView(),
//        ]);
//    }
//
//    /**
//     * @Route("/{id}", name="categories_delete", methods="DELETE")
//     */
//    public function delete(Request $request, Categories $category): Response
//    {
//        if ($this->isCsrfTokenValid('delete'.$category->getId(), $request->request->get('_token'))) {
//            $em = $this->getDoctrine()->getManager();
//            $em->remove($category);
//            $em->flush();
//        }
//
//        return $this->redirectToRoute('categories_index');
//    }
}
