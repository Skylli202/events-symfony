<?php

namespace App\Controller;

use App\Entity\Product;
use Doctrine\ORM\EntityManagerInterface;
use Faker\Factory;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProductController extends AbstractController
{
    #[Route('/product/create', name: 'app_product')]
    public function index(EntityManagerInterface $entityManager): Response
    {

        $faker = Factory::create('en_US');

        $product = new Product();
        $product->setItemReference(
            $faker->isbn10
        );
        $product->setItemDescription(
            $faker->ean8
        );

        dump($product);

        $entityManager->persist($product);
        $entityManager->flush();

        dump($product);

        return $this->render('product/index.html.twig', [
            'controller_name' => 'ProductController',
        ]);
    }
}
