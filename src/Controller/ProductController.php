<?php

namespace App\Controller;
use App\Entity\Product;
use Doctrine\ORM\EntityManagerInterface;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class ProductController extends AbstractController
{
    #[Route('', name: 'create_product')]
    public function createProduct(Request $request): Response
    {



       return  $this->render('product/index.html.twig', [
           'name'=> $request->get('name')
       ]);

    }

    #[Route('service/{name}', name: 'service')]
    public function showService($name): Response{
        return  $this->render('product/index.html.twig', [
            'name'=> $name
        ]);
    }


}
