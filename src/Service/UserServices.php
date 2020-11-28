<?php

namespace App\Service;

use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use phpDocumentor\Reflection\DocBlock\Serializer;
use Symfony\Component\Serializer\SerializerInterface;

class UserServices
{
    private $serializer;
    private $userRepo;
    private $manager;
    public function __construct(SerializerInterface $serializer,UserRepository $userRepo,EntityManagerInterface $manager) { 
        $this->serializer=$serializer;
        $this->userRepo=$userRepo;
        $this->manager=$manager;
    }

    public function addUser(Request $request,$userRepo,$profilRepo,$entity){
    
        $data=$request->request->all();
        //dd($data);
        $email=$data["email"];
        $email_to_find=$userRepo->findBy(['email'=>$email]);
        if(!empty($email_to_find)){
            $message="Cet utilisateur existe déjà";
            return $message;
        }
        $user=$this->serializer->denormalize($data,$entity,true);
        $image=$request->files->get("avatar");
        if($image){
            $image=fopen($image->getRealPath(),"rb");
            $user_to_modify->setAvatar($image);
        }
        return $user;
    }
    


    public function updateUser($id,Request $request,$userRepo){
       
        $data=$request->request->all();
        $user_to_modify=$userRepo->find($id);
        if(empty($user_to_modify)){
            $message="Cet utilisateur n'existe pas";
            return $message;
        }
        foreach($data as $attribute_key =>$attribute){
            
            if($attribute!="PUT"){
                $method_set="set".ucfirst(strtolower($attribute_key));
                $user_to_modify->$method_set($attribute);
            }
        }
        $image=$request->files->get("avatar");
        if($image){
            $image=fopen($image->getRealPath(),"rb");
            $user_to_modify->setAvatar($image);
        }

        return $user_to_modify;
    }

    public function user_to_delete(Request $request,$id,UserRepository $userRepo){
        $user_to_delete=$userRepo->findBy(['id'=>$id]);
        
        if (empty($user)) {
            $message="Cet utitlisateur n'existe plus";
            return $message;
        }
        $user=$user_to_delete[0];
        $user->setIsDeleted(true);
        $this->manager->persist($user);
        return $user;
       
    }

    
    
}