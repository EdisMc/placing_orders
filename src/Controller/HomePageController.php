<?php

namespace App\Controller;

use App\Entity\Products;
use App\Form\ProductsType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Twig\Environment;


class HomePageController extends AbstractController
{
    #[Route('/', name: 'app_home_page')]
    public function show(Environment $environment, Request $request, EntityManagerInterface $entityManager)
    {
        $products = new Products();

        $form = $this->createForm(ProductsType::class, $products);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($products);
            $entityManager->flush();

            return new Response('Order number ' . $products->getId() . ' created!');
        }

        return new Response($environment->render('home_page/index.html.twig', [
            'product_order_form' => $form->createView()
        ]));
    }
}
