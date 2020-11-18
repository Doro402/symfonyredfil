<?php

namespace App\DataFixtures;

use App\Entity\Formateur;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class FormateurFixtures extends Fixture implements DependentFixtureInterface
{
    

    public function __construct(UserPasswordEncoderInterface $encoder) {
        $this->encoder = $encoder;
    }

    public function load(ObjectManager $manager)
    {
        $profil=$this->getReference("formateur");
        for ($i = 1; $i <= 3; $i++) {
            $formateur = new Formateur();
            $formateur->setProfil($profil);
            $formateur->setUsername(strtolower($profil->getLibelle()) . $i);
            //Génération des Users
            $password = $this->encoder->encodePassword($formateur, '1234');
            $formateur->setPassword($password);
            $manager->persist($formateur);
           

            
        }
        $manager->flush();
    }
    public function getDependencies(){
        return array(
            ProfilFixtures::class,
        );
    }
}