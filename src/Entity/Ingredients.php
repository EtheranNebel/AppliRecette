<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\IngredientsRepository")
 */
class Ingredients
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $label;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\TypeIngredient", inversedBy="ingredients")
     * @ORM\JoinColumn(nullable=false)
     */
    private $type;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\TypeQte", inversedBy="ingredients")
     * @ORM\JoinColumn(nullable=false)
     */
    private $typeQte;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLabel(): ?string
    {
        return $this->label;
    }

    public function setLabel(string $label): self
    {
        $this->label = $label;

        return $this;
    }

    public function getType(): ?TypeIngredient
    {
        return $this->type;
    }

    public function setType(?TypeIngredient $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function getTypeQte(): ?TypeQte
    {
        return $this->typeQte;
    }

    public function setTypeQte(?TypeQte $typeQte): self
    {
        $this->typeQte = $typeQte;

        return $this;
    }
}
