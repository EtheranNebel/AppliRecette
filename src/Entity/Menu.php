<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\MenuRepository")
 */
class Menu
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="datetime")
     */
    private $creationDate;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Recette", inversedBy="menus")
     */
    private $recetteList;

    public function __construct()
    {
        $this->recetteList = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCreationDate(): ?\DateTimeInterface
    {
        return $this->creationDate;
    }

    public function setCreationDate(\DateTimeInterface $creationDate): self
    {
        $this->creationDate = $creationDate;

        return $this;
    }

    /**
     * @return Collection|Recette[]
     */
    public function getRecetteList(): Collection
    {
        return $this->recetteList;
    }

    public function addRecetteList(Recette $recetteList): self
    {
        if (!$this->recetteList->contains($recetteList)) {
            $this->recetteList[] = $recetteList;
        }

        return $this;
    }

    public function removeRecetteList(Recette $recetteList): self
    {
        if ($this->recetteList->contains($recetteList)) {
            $this->recetteList->removeElement($recetteList);
        }

        return $this;
    }
}
