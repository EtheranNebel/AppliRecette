<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\IngredientRecetteRepository")
 */
class IngredientRecette
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Ingredients")
     * @ORM\JoinColumn(nullable=false)
     */
    private $ingredient;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Recette", inversedBy="ingredients")
     * @ORM\JoinColumn(nullable=false)
     */
    private $recette;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIngredient(): ?Ingredients
    {
        return $this->ingredient;
    }

    public function setIngredient(?Ingredients $ingredient): self
    {
        $this->ingredient = $ingredient;

        return $this;
    }

    public function getRecette(): ?Recette
    {
        return $this->recette;
    }

    public function setRecette(?Recette $recette): self
    {
        $this->recette = $recette;

        return $this;
    }
}
