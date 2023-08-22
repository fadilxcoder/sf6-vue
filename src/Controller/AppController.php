<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AppController extends AbstractController
{
    #[Route('/', name: 'app')]
    public function index(): Response
    {
        return $this->render('app/index.html.twig', []);
    }

    #[Route('/api/say-my-name/{name}', name: 'api_say_my_name')]
    public function api(string $name = 'fadilxcoder'): JsonResponse
    {
        return new JsonResponse('hello ' . $name);
    }
}
