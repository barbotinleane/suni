<?php

namespace App\Controller;

use App\Entity\Reservation;
use App\Form\ReservationType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ReservationController extends AbstractController
{
    #[Route('/reservations', name: 'app_reservations')]
    public function reserver(Request $request): Response
    {
        $reservation = new Reservation();
        $form = $this->createForm(ReservationType::class, $reservation);

        if ($form->isSubmitted() && $form->isValid()) {
            dd($reservation);
        }

        return $this->render('reservation/index.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
