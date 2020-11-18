<?php

namespace App\DataFixtures;

use App\Entity\Profil;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class ProfilFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $profils = ["ADMIN", "FORMATEUR", "APPRENANT", "CM"];
        foreach ($profils as $key => $libelle) {
            $profil = new Profil();
            $profil->setLibelle($libelle);
            $manager->persist($profil);
            if ($libelle=="ADMIN"){
                $this->addReference("admin", $profil);
            } elseif ($libelle== "APPRENANT"){
                $this->addReference("apprenant", $profil);
            } elseif ($libelle== "CM"){
                $this->addReference("cm", $profil);
            } elseif ($libelle== "FORMATEUR"){
                $this->addReference("formateur", $profil);
            }
        }
        $manager->flush();
    }
}