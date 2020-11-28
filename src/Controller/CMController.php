<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CMController extends AbstractController
{
    /**
     * @Route("/c/m", name="c_m")
     */
    public function index(): Response
    {
        return $this->render('cm/index.html.twig', [
            'controller_name' => 'CMController',
        ]);
    }
}
