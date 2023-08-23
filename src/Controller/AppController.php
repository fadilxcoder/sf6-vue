<?php

namespace App\Controller;

use App\Entity\Post;
use App\Form\PostType;
use App\Repository\PostRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AppController extends AbstractController
{
    #[Route('/', name: 'app')]
    public function index(): Response
    {
        return $this->render('index.html.twig', []);
    }

    #[Route('/api/get-post-form', name: 'api_get_post_form', methods: ['GET'])]
    public function getPostForm(PostRepository $postRepository): JsonResponse
    {
        $form = $this->createForm(PostType::class);
        $uiForm = $this->renderView('app/post-form.html.twig', [
            'form' => $form->createView()
        ]);
        $uiContent = $this->renderView('app/post-list.html.twig', [
            'posts' => $postRepository->findAll()
        ]);

        return $this->json([
            'form' => $uiForm,
            'posts' => $uiContent,
        ]);
    }

    #[Route('/api/submit-post-form', name: 'api_submit_post_form', methods: ['POST'])]
    public function submitPostForm(
        Request $request,
        PostRepository $postRepository,
        EntityManagerInterface $em)
    : JsonResponse {
        $post = new Post();
        $post->setCreatedAt(new \DateTime('now'));
        $form = $this->createForm(PostType::class, $post);
        $form->handleRequest($request);

        if ($form->isSubmitted()) {
            $em->persist($post);
            $em->flush();

            $uiContent = $this->renderView('app/post-list.html.twig', [
                'posts' => $postRepository->findAll()
            ]);

            return $this->json([
                'posts' => $uiContent,
            ]);
        }

        return $this->json('empty');
    }

    #[Route('/api/say-my-name/{name}', name: 'api_say_my_name')]
    public function api(string $name = 'fadilxcoder'): JsonResponse
    {
        return new JsonResponse('hello ' . $name);
    }
}
