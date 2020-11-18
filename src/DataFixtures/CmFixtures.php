<?php

namespace App\DataFixtures;

use App\Entity\CM;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class CmFixtures extends Fixture implements DependentFixtureInterface
{
    

    public function __construct(UserPasswordEncoderInterface $encoder) {
        $this->encoder = $encoder;
    }

    public function load(ObjectManager $manager)
    {
        $profil=$this->getReference("cm");
        for ($i = 1; $i <= 3; $i++) {
            $cm = new CM();
            $cm ->setProfil($profil);
            $cm ->setUsername(strtolower($profil->getLibelle()) . $i);
            //Génération des Users
            $password = $this->encoder->encodePassword($cm,"1234");
            $cm ->setPassword($password);
            $manager->persist($cm);
            

           
        }
        $manager->flush();
    }
    public function getDependencies(){
        return array(
            ProfilFixtures::class,
        );
    }
}