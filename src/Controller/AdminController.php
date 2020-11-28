<?php

namespace App\Controller;

use App\Service\UserServices;
use App\Repository\UserRepository;
use App\Repository\ProfilRepository;
use App\Repository\ApprenantRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


class AdminController extends AbstractController
{
    private $userServices;
    private $em;
   

    public function __construct(UserServices $userServices){
        $this->userServices=$userServices;
    }

    /**
     * @Route
     * (
     * path="/api/admin/users",
     *  name="add_admin",
     * methods={"POST"},
     * defaults={
     * "__controller"="App\Controller\AdminController::postUser",
     * "__api_resource_class"=User::class,
     * "__api_collection_operation_name"="add_admin"
     * }
     * )
     */

    public function postUser(UserServices $userServices,Request $request,UserRepository $userRepo,ProfilRepository $profilRepo,EntityManagerInterface $em){

       $user_to_save=$userServices->addUser($request,$userRepo,$profilRepo,"App\Entity\Admin");
       if((gettype($user_to_save))!=="object"){
            return $this->json($user_to_save, Response::HTTP_FORBIDDEN);
       }
       $em->persist($user_to_save);
       $em->flush();
       return $this->json(["message" => "Nouvel admin ajouté."], Response::HTTP_OK);
    }

    /**
     * @Route( path="/api/admin/users/{id}", methods={"PUT"},name="put_users"
     * )
     */
    public function putUser($id,EntityManagerInterface $em,UserServices $userServices,Request $request,UserRepository $userRepo){   
        
        $user_to_modify=$userServices->updateUser($id,$request,$userRepo);
        
        if((gettype($user_to_modify))!=="object"){
            return $this->json($user_to_modify, Response::HTTP_FORBIDDEN);
        }
        $em->persist($user_to_modify);
        $em->flush();
        return $this->json(["message" => "User modifié."], Response::HTTP_OK);
    }

    /**
     * @Route("/api/admin/users/{id}", name="put_admin",methods={"DELETE"})
     */

    public function deleteUser($id,UserServices $userServices,Request $request,UserRepository $userRepo){ 
        $user_to_delete=$userServices->user_to_delete($request,$id,$userRepo);
        if((gettype($user_to_delete))!=="object"){
            return $this->json($user_to_delete, Response::HTTP_FORBIDDEN);
        }

    }
}
