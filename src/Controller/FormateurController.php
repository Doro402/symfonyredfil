<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class FormateurController extends AbstractController
{

    /**
     * @Route
     * (
     * path="/api/apprenant",
     *  name="add_apprenant",
     * methods={"GET"},
     * defaults={
     * "__controller"="App\Controller\FormateurController::postApprenant",
     * "__api_resource_class"=Formateur::class,
     * "__api_collection_operation_name"="add_apprenant"
     * }
     * )
     */
    public function getapprenant(UserServices $userServices,Request $request,FormateurRepository $formateurRepo,ProfilRepository $profilRepo,EntityManagerInterface $em){
      
        $user_to_save=$userServices->getapprenant($request,$userRepo,$profilRepo,"App\EntityApprenant");
        if((gettype($apprenant_to_get))!=="object"){
             return $this->json($apprenant_to_get, Response::HTTP_FORBIDDEN);
        }
        $em->persist($apprenant_to_get);
        $em->flush();
        return $this->json(["message" => "Apprenants affichés."], Response::HTTP_OK);
     }  


    /**
     * @Route
     * (
     * path="/api/apprenant",
     *  name="add_apprenant",
     * methods={"POST"},
     * defaults={
     * "__controller"="App\Controller\FormateurController::postApprenant",
     * "__api_resource_class"=Formateur::class,
     * "__api_collection_operation_name"="add_apprenant"
     * }
     * )
     */
    public function addapprenant(UserServices $userServices,Request $request,FormateurRepository $formateurRepo,ProfilRepository $profilRepo,EntityManagerInterface $em){
      
        $user_to_save=$userServices->addapprenant($request,$userRepo,$profilRepo,"App\Entity\Formateur");
        if((gettype($apprenant_to_add))!=="object"){
             return $this->json($apprenant_to_add, Response::HTTP_FORBIDDEN);
        }
        $em->persist($apprenant_to_add);
        $em->flush();
        return $this->json(["message" => "Nouvel epprenant ajouté."], Response::HTTP_OK);
     }  
    }



