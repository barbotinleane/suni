<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class IndexController extends AbstractController
{
    #[Route('/', name: 'app_index')]
    public function index(): Response
    {
        $response = new Response('
        <h1>Le restaurant Suni</h1>
        <img style="height:600px;" src="https://www.tables-auberges.com/storage/images/front/medias/549/549-le-relais-des-moines-1.jpg" alt="Random Image">');

        return $response;
    }

    #[Route('/reservations', name: 'app_reservations')]
    public function reservations(): Response
    {
        $response = new Response('
        <h1>Reservations</h1>
        <img style="height:600px;" src="https://cdn.venngage.com/template/thumbnail/small/c50525da-3d68-4d0b-9b3a-cb389d95535a.webp" alt="Random Image">');

        return $response;
    }

    #[Route('/blog', name: 'app_blog')]
    public function blog(): Response
    {
        $response = new Response('
        <h1>Blog</h1>
        <img style="height:600px;" src="https://www.formationfacile.com/wp-content/uploads/2021/04/comment-creer-un-blog-01-1-4.png" alt="Random Image">');

        return $response;
    }

    #[Route('/blog/article/{post}', name: 'app_blog_post', requirements: ['post' => '^[a-z-]+$'])]
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
}
