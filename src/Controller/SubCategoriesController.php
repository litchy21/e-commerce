<?php

namespace App\Controller;

use App\Entity\SubCategories;
use App\Form\SubCategoriesType;
use App\Repository\CategoriesRepository;
use App\Repository\ProductsRepository;
use App\Repository\SubCategoriesRepository;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/sub_category")
 */
class SubCategoriesController extends Controller
{
//    /**
//     * @Route("/", name="sub_categories_index", methods="GET")
//     */
//    public function index(SubCategoriesRepository $subCategoriesRepository): Response
//    {
//        return $this->render('sub_categories/index.html.twig', ['sub_categories' => $subCategoriesRepository->findAll()]);
//    }

//    /**
//     * @Route("/new", name="sub_categories_new", methods="GET|POST")
//     */
//    public function new(Request $request): Response
//    {
//        $subCategory = new SubCategories();
//        $form = $this->createForm(SubCategoriesType::class, $subCategory);
//        $form->handleRequest($request);
//
//        if ($form->isSubmitted() && $form->isValid()) {
//            $em = $this->getDoctrine()->getManager();
//            $em->persist($subCategory);
//            $em->flush();
//
//            return $this->redirectToRoute('sub_categories_index');
//        }
//
//        return $this->render('sub_categories/new.html.twig', [
//            'sub_category' => $subCategory,
//            'form' => $form->createView(),
//        ]);
//    }

    /**
     * @Route("/{category}/{sub_category}", name="sub_categories_show", methods="GET")
     * @ParamConverter("category", options={"mapping": {"category_name" : "name"}})
     * @ParamConverter("sub_category", options={"mapping": {"sub_category_name" : "name"}})
     */
    public function show($category, $sub_category, CategoriesRepository $categoriesRepository, SubCategoriesRepository $subCategoriesRepository, ProductsRepository $productsRepository): Response
    {
        $sub_category = $subCategoriesRepository->findBy(array('name' => $sub_category));
        $category = $categoriesRepository->findBy(array('name' => $category));

        return $this->render('sub_categories/show.html.twig', [
            'sub_category' => $sub_category[0],
            'sub_categories' => $category[0]->getSubCategories(),
            'products' => $sub_category[0]->getProducts(),
            'categories' => $categoriesRepository->findAll(),
            'category' => $sub_category[0]->getCategory(),
        ]);
    }

//    /**
//     * @Route("/{id}/edit", name="sub_categories_edit", methods="GET|POST")
//     */
//    public function edit(Request $request, SubCategories $subCategory): Response
//    {
//        $form = $this->createForm(SubCategoriesType::class, $subCategory);
//        $form->handleRequest($request);
//
//        if ($form->isSubmitted() && $form->isValid()) {
//            $this->getDoctrine()->getManager()->flush();
//
//            return $this->redirectToRoute('sub_categories_edit', ['id' => $subCategory->getId()]);
//        }
//
//        return $this->render('sub_categories/edit.html.twig', [
//            'sub_category' => $subCategory,
//            'form' => $form->createView(),
//        ]);
//    }
//
//    /**
//     * @Route("/{id}", name="sub_categories_delete", methods="DELETE")
//     */
//    public function delete(Request $request, SubCategories $subCategory): Response
//    {
//        if ($this->isCsrfTokenValid('delete'.$subCategory->getId(), $request->request->get('_token'))) {
//            $em = $this->getDoctrine()->getManager();
//            $em->remove($subCategory);
//            $em->flush();
//        }
//
//        return $this->redirectToRoute('sub_categories_index');
//    }
}
