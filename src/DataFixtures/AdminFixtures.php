<?php

namespace App\DataFixtures;

use App\Entity\User;
use App\Entity\Admin;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class AdminFixtures extends Fixture implements DependentFixtureInterface
{
    

    public function __construct(UserPasswordEncoderInterface $encoder) {
        $this->encoder = $encoder;
    }

    public function load(ObjectManager $manager)
    {
       $profil=$this->getReference("admin");
        for ($i = 1; $i <= 3; $i++) {
            $admin = new Admin();
            $admin->setProfil($profil);
            $admin->setUsername(strtolower($profil->getLibelle()) . $i);
            //Génération des Users
            $password = 'password';
            $admin->setPassword($password);
           
            
            $manager->persist($admin);
        }

        $manager->flush();
    }
    public function getDependencies(){
        return array(
            ProfilFixtures::class,
        );
    }
}
