<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route('/throw/{shouldThrow}', name: 'app_throw_exception', requirements: ['shouldThrow' => 'yes|no|y|n'])]
    public function index(string $shouldThrow): Response
    {
        if (array_search($shouldThrow, ['yes', 'y']) !== false) {
            throw new \Exception('This is a fake exception throw to try the custom event listener');
        }

        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }
}
