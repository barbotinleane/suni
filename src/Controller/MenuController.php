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

        $menuItems = [
            [
                'name' => 'Burger du jour',
                'description' => 'Un délicieux burger avec des ingrédients frais.',
                'price' => 12.50,
                'img' => 'https://burgeraddict.fr/wp-content/uploads/2024/09/MSG-Smash-Burger-FT-RECIPE0124-d9682401f3554ef683e24311abdf342b.jpg',
            ],
            [
                'name' => 'Salade César',
                'description' => 'Une salade classique avec poulet grillé et croûtons.',
                'price' => 10.00,
                'img' => 'https://rians.com/wp-content/uploads/2024/04/1000038128.jpg',
            ],
            [
                'name' => 'Pâtes Primavera',
                'description' => 'Des pâtes aux légumes de saison dans une sauce légère.',
                'price' => 11.00,
                'img' => 'https://fgdjrynm.filerobot.com/recipes/9aa06d1e2babfc588211647238353b13c27dd07fc8aa8e44526c87b79ad36587.jpg?vh=3713e4&h=800&w=800&q=60',
            ]
        ];
        
        return $this->render('menu/index.html.twig', [
            'menu_items' => $menuItems,
            'date' => (new \DateTime()),
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
