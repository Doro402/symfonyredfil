<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\ProfilRepository;
use ApiPlatform\Core\Annotation\ApiFilter;
use Doctrine\Common\Collections\Collection;
use ApiPlatform\Core\Annotation\ApiResource;
use ApiPlatform\Core\Annotation\ApiSubresource;
use Doctrine\Common\Collections\ArrayCollection;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\BooleanFilter;


/**
 * @ORM\Entity(repositoryClass=ProfilRepository::class)
 * @ApiFilter(BooleanFilter::class, properties={"IsDeleted"})
 * @ApiResource(
 *      routePrefix="/admin",
 *      collectionOperations={
 *                  "get_profils"={
 *                  "method"="GET",
 *                  "path"="/profils",
 *                  "access_control"="(is_granted('ROLE_ADMIN'))",
 *                  "access_control_message"="Non Accèss à cette Ressource"
 *                              },
 *                  },
 *      itemOperations={
 *                   "get_profils_id"={
 *                   "method"="GET",
 *                   "path"="/profils/{id}"
 *                                  },
 *                   "put_profils_id"={
 *                   "method"="PUT",
 *                   "path"="/profils/{id}"
 *                     },
 *                   "delete_profils_id"={
 *                   "method"="DELETE",
 *                   "path"="/profils/{id}"
 *                          }
 *                  }
 *      )
 */

class Profil
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $libelle;

    /**
     * @ORM\OneToMany(targetEntity=User::class, mappedBy="profil")
     * @ApiSubresource()
     */
    private $yes;

    /**
     * @ORM\Column(type="boolean")
     */
    private $IsDeleted;

    public function __construct()
    {
        $this->yes = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLibelle(): ?string
    {
        return $this->libelle;
    }

    public function setLibelle(string $libelle): self
    {
        $this->libelle = $libelle;

        return $this;
    }

    /**
     * @return Collection|User[]
     */
    public function getYes(): Collection
    {
        return $this->yes;
    }

    public function addYe(User $ye): self
    {
        if (!$this->yes->contains($ye)) {
            $this->yes[] = $ye;
            $ye->setProfil($this);
        }

        return $this;
    }

    public function removeYe(User $ye): self
    {
        if ($this->yes->removeElement($ye)) {
            // set the owning side to null (unless already changed)
            if ($ye->getProfil() === $this) {
                $ye->setProfil(null);
            }
        }

        return $this;
    }

    public function getIsDeleted(): ?bool
    {
        return $this->IsDeleted;
    }

    public function setIsDeleted(bool $IsDeleted): self
    {
        $this->IsDeleted = $IsDeleted;

        return $this;
    }
}
