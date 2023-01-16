<?php

namespace App\Controller;

use App\Entity\Order;
use Doctrine\ORM\EntityManagerInterface;
use Faker\Factory;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class OrderController extends AbstractController
{
    #[Route('/order/create', name: 'app_order')]
    public function index(EntityManagerInterface $entityManager): Response
    {
        $order = new Order();

        $faker = Factory::create();

        $order->setOrderNumber($faker->isbn10);

        $entityManager->persist($order);
        $entityManager->flush();

//        dump($order);

        return $this->render('order/index.html.twig', [
            'controller_name' => 'OrderController',
        ]);
    }

    #[Route('/order/update/{id}', name: 'app_order_update_order')]
    public function updateOrder(Order $order, EntityManagerInterface $entityManager)
    {
        $faker = Factory::create();
        $order->setOrderNumber($faker->isbn10);
        $entityManager->flush();

        return $this->render('order/index.html.twig', [
            'controller_name' => 'OrderController',
        ]);
    }
}
