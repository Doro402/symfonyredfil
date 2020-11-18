<?php

namespace App\Entity;

use App\Repository\CMRepository;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;

/**
 * @ORM\Entity(repositoryClass=CMRepository::class)
 *  * @ApiResource
 */
class CM extends User 
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    

   
    public function getId(): ?int
    {
        return $this->id;
    }

    

   
}
