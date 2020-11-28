<?php

namespace App\Controller;

use App\Repository\ApprenantRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ApprenantController extends AbstractController
{
    /**
     * @Route("/apprenant", name="apprenant")
     */
    public function putUser(UserServices $userServices,Request $request,ApprenantRepository $apprenantRepo,ProfilRepository $profilRepo,EntityManagerInterface $em){

        $user_to_save=$userServices->addUser($request,$userRepo,$profilRepo,"App\Entity\Apprenant");
        if((gettype($user_to_save))!=="object"){
             return $this->json($user_to_save, Response::HTTP_FORBIDDEN);;
        }
        $em->persist($user_to_save);
        $em->flush();
        return $this->json(["message" => "Nouvel admin modifié."], Response::HTTP_OK);
     }
     
     
    }