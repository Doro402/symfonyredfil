<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\ApprenantRepository;
use ApiPlatform\Core\Annotation\ApiResource;

/**
 * @ORM\Entity(repositoryClass=ApprenantRepository::class)
 * @ApiResource(
 *     
 *      collectionOperations={
 *              "get_apprenants"={
 *                      "method"="GET",
 *                      "path"="/apprenants",
 *                      "normalization_context"={"groups"={"formateur:read"}},
 *                      "security"="is_granted('ROLE_ADMIN') or is_granted('ROLE_FORMATEUR') or is_granted('ROLE_CM')",
 *                      "security_message"= "Vous n'avez pas acces à cette ressource"
 *                               },             
 *                           }
 * )
 */
class Apprenant extends User
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

}
