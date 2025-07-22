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
        return $this->render('accueil/index.html.twig');
    }

    #[Route('/last-blog-post', name: 'app_last_blog_post')]
    public function lastBlogPost(): Response
    {
        $lastBlogPost = [
            'title' => 'Nouveau dessert à la carte !',
            'content' => 'Découvrez notre version signature de la tarte au citron meringuée.',
            'date' => (new \DateTime())->format('Y-m-d H:i:s'),
        ];
        
        return $this->render('partials/_last_blog_post.html.twig', [
            'lastBlogPost' => $lastBlogPost,
        ]);
    }

    #[Route('/blog', name: 'app_blog')]
    public function blog(): Response
    {
        return $this->render('blog/index.html.twig');
    }

    #[Route('/blog/article/{post}', name: 'app_blog_post', requirements: ['post' => '^[a-z-]+$'])]
    public function blogPost(string $post = "not-found"): Response
    {
        if($post == "not-found") {
            return $this->render('blog/not_found.html.twig');
        } else {
            return $this->render('blog/post.html.twig');
        }
    }
}
