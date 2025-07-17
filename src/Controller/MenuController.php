<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

final class MenuController extends AbstractController
{
    #[Route('/menu', name: 'app_menu')]
    public function index(): Response
    {
        if ((new \DateTime())->format('m-d') === '02-14') {
            return $this->redirectToRoute('app_menu_saint_valentin');
        }
        
        return $this->render('menu/index.html.twig', [
            'controller_name' => 'MenuController',
        ]);
    }

    #[Route('/menu/saint-valentin', name: 'app_menu_saint_valentin')]
    public function saintValentin(): Response
    {
        
        return $this->render('menu/saintValentin.html.twig', [
            'controller_name' => 'MenuController',
        ]);
    }

    
}
