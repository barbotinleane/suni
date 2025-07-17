<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class EmailController extends AbstractController
{
    #[Route('/email', name: 'app_email')]
    public function index(): Response
    {
        return $this->render('@email/welcome.html.twig');
    }
}