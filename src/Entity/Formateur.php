<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\FormateurRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource(
 *          
 *      normalizationContext={"groups"={"user:read"}},
 *      collectionOperations={
 *          "get_apprenants"={
 *              "method"="GET",
 *              "path"="admin/apprenants",
 *              "security"="is_granted('ROLE_ADMIN')",
 *              "security_message"= "Vous n'avez pas acces à cette ressource",
 *          },
 *          "get_formateurs"={
 *                      "method"="GET",
 *                      "path"="/formateurs",
 *                      "normalization_context"={"groups"={"CM:read"}},
 *                      "security"="is_granted('ROLE_ADMIN') or is_granted('ROLE_CM')",
 *                      "security_message"= "Vous n'avez pas acces à cette ressource"
 *                                }    
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
 * @ORM\Entity(repositoryClass=FormateurRepository::class)
 */
class Formateur extends User 
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    
}
