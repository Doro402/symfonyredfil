<?php

namespace App\Entity;

use App\Repository\CMRepository;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;

/**
 * @ORM\Entity(repositoryClass=CMRepository::class)
 *  @ApiResource(
 *          
 *      normalizationContext={"groups"={"user:read"}},
 *      collectionOperations={
 *          "get_apprenants"={
 *              "method"="GET",
 *              "path"="admin/apprenants",
 *              "security"="is_granted('ROLE_ADMIN')",
 *              "security_message"= "Vous n'avez pas acces à cette ressource",
 *          }    
 *      },
 *      itemOperations={
 *          "get_user"={
 *               "normalization_context"={"groups"={"user:read","user:read:all"}},
 *               "method"="GET",
 *               "path"="admin/apprenants/{id}",
 *               "security"="is_granted('ROLE_ADMIN')",
 *               "security_message"= "Vous n'avez pas acces à cette ressource",
 *          },
 *           "update_user"={
 *                 "method"="PUT",
 *                 "path"="admin/apprenants/{id}",
 *                 "security"="is_granted('ROLE_ADMIN')",
 *                 "security_message"= "Vous n'avez pas acces à cette ressource",
 *         }
 * })
 */
class CM extends User 
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

}
