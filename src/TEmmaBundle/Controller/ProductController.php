<?php

namespace TEmmaBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use TEmmaBundle\Entity\Artikel as Product;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class ProductController extends Controller {

    /**
     * @Route("/product/list", name="product_list")
     */
    public function listAction(Request $request)
    {
        $repository = $this->getDoctrine()->getRepository('TEmmaBundle:Artikel');
        $products = $repository->findAll();
        return $this->render('product/list.twig', array(
                    'products' => $products
        ));
    }

}
