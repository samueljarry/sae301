<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CartController extends AbstractController
{
    #[Route('/panier', name: 'app_cart')]
    public function index(): Response
    {
        return $this->render('cart/index.html.twig', [
            'controller_name' => 'CartController',
        ]);
    }

    #[Route('/panier/confirmation', name:'cart_confirm')]
    public function confirmCart() : Response
    {
        $user = $this->getUser();
        if(!$user)
        {
            return $this->redirectToRoute('app_login', ["cart"=>true]);
        }

        return $this->render('cart/confirmation.html.twig', [
            'controller_name' => 'CartController',
        ]);
    }
}
