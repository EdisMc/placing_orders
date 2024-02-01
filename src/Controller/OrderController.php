<?php

namespace App\Controller;

use App\Entity\Order;
use App\Form\OrderType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;

class OrderController extends AbstractController
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    #[Route('/order', name: 'app_order')]
    public function index(): Response
    {
        $orders = $this->entityManager->getRepository(Order::class)->findAll();

        return $this->render('order/index.html.twig', ['controller_name' => 'OrderController',
        'orders' => $orders]);
    }

    public function create(Request $request): Response
    {
        $order = new Order();
        $form = $this->createForm(OrderType::class, $order);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->entityManager->persist($order);
            $this->entityManager->flush();

            return $this->redirectToRoute('order_index');
        }

        return $this->render('order/create.html.twig', ['form' => $form->createView()]);
    }
}
