<?php

namespace App\DataFixtures;

use App\Entity\Apprenant;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class ApprenantFixtures extends Fixture implements DependentFixtureInterface
{
    

    public function __construct(UserPasswordEncoderInterface $encoder) {
        $this->encoder = $encoder;
    }

    public function load(ObjectManager $manager)
    {
        $profil=$this->getReference("apprenant");
        for ($i = 1; $i <= 3; $i++) {
            $apprenant = new Apprenant();
            $apprenant->setProfil($profil);
            $apprenant->setUsername(strtolower($profil->getLibelle()) . $i);
            //Génération des Users
            $password = $this->encoder->encodePassword($apprenant, 'password');
            $apprenant->setPassword($password);
           

            $manager->flush();
        }
    }
    public function getDependencies(){
        return array(
            ProfilFixtures::class,
        );
    }
}
