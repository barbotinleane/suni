<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\HttpFoundation\BinaryFileResponse;
use Symfony\Component\HttpFoundation\ResponseHeaderBag;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;


#[Route('/blog', name: 'app_blog_')]
final class BlogController extends AbstractController
{
    #[Route('/download', name: 'download', methods: ['GET'])]
    public function download(): BinaryFileResponse
    {
        $filePath = $this->getParameter('kernel.project_dir') . '/files/example.pdf';

        return $this->file($filePath, 'mon_fichier.pdf', ResponseHeaderBag::DISPOSITION_ATTACHMENT);
    }
    
    #[Route('/{post}', name: 'article', requirements: ['post' => '^[a-z-]+$'])]
    public function blogPost(string $post = "not-found"): Response
    {
        if($post == "not-found") {
            $response = new Response('
            <h1>Article introuvable</h1>
            <img style="height:600px;" src="https://thumbs.dreamstime.com/b/animation-d-icône-de-couleur-page-web-introuvable-animée-signe-isolé-sur-fond-blanc-207675518.jpg" alt="Random Image">');
        } else {
            $response = new Response('
            <h1>Post de notre blog</h1>
            <img style="height:600px;" src="https://www.lapotence.fr/images/contenus/categories/7-potence-plat-1.jpg" alt="Random Image">');
        }

        return $response;
    }

    #[Route('/liste', name: 'list')]
    public function blog(): Response
    {
        $response = new Response('
        <h1>Blog Liste</h1>
        <img style="height:600px;" src="https://www.formationfacile.com/wp-content/uploads/2021/04/comment-creer-un-blog-01-1-4.png" alt="Random Image">');

        return $response;
    }



    #[Route('/api/blog', name: 'api_blog', methods: ['GET'])]
    public function getBlog(): JsonResponse
    {
        $userData = [
            'id' => 42,
            'username' => 'johndoe',
            'email' => 'john@example.com',
        ];

        // La méthode json() convertit automatiquement le tableau en JSON
        return $this->json($userData);
    }
}


