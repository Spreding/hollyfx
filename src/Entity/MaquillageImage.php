<?php

namespace App\Entity;

use App\Repository\MaquillageImageRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=MaquillageImageRepository::class)
 */
class MaquillageImage
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
    private $image;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\ManyToOne(targetEntity=MaquillageProduct::class, inversedBy="maquillageImages")
     */
    private $maquillage;


    public function __toString()
    {
        return $this->getName();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(string $image): self
    {
        $this->image = $image;

        return $this;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getMaquillage(): ?MaquillageProduct
    {
        return $this->maquillage;
    }

    public function setMaquillage(?MaquillageProduct $maquillage): self
    {
        $this->maquillage = $maquillage;

        return $this;
    }
}
