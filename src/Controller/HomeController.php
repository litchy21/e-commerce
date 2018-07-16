<?php

namespace App\Controller;

use App\Entity\ProductDetails;
use App\Entity\Products;
use App\Form\ProductsType;
use App\Repository\CategoriesRepository;
use App\Repository\ProductDetailsRepository;
use App\Repository\ProductsRepository;
use App\Repository\SubCategoriesRepository;
use App\Repository\VariantOptionsRepository;
use App\Repository\VariantsRepository;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class HomeController extends Controller
{
    /**
     * @Route("/", name="home")
     */
    public function index(ProductsRepository $productsRepository, CategoriesRepository $categoriesRepository, SubCategoriesRepository $subCategoriesRepository, ProductDetailsRepository $productDetailsRepository): Response
    {

        $productDetails = $this->getDoctrine()->getRepository(ProductDetails::class);
        $list_productDetails = $productDetails->findBy(['new' => true], null, 4);
        $all_productDetails = $productDetails->findAll();
        shuffle($all_productDetails);
        
        if(empty($list_productDetails)){
            $list_productDetails = $productDetails->findBy([],null,4);
        }

        dump($list_productDetails);

        return $this->render('home/index.html.twig', [
            'all_productDetails' => $all_productDetails,
            'list_productDetails' => $list_productDetails,
            'controller_name' => 'HomeController',
            'products' => $productsRepository->findAll(),
            'categories' => $categoriesRepository->findAll(),
            'subcategories' => $subCategoriesRepository->findAll(),
        ]);
    }
}
