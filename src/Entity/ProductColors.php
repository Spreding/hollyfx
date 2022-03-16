<?php

namespace App\Entity;

use App\Repository\ProductColorsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ProductColorsRepository::class)
 */
class ProductColors
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
    private $colors;

    /**
     * @ORM\ManyToMany(targetEntity=Product::class, inversedBy="productColors")
     */
    private $product;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $ColorName;

    public function __construct()
    {
        $this->product = new ArrayCollection();

    }

    public function __toString()
    {
        return $this->getColorName();
    }


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getColors(): ?string
    {
        return $this->colors;
    }

    public function setColors(string $colors): self
    {
        $this->colors = $colors;

        return $this;
    }

    /**
     * @return Collection<int, Product>
     */
    public function getProduct(): Collection
    {
        return $this->product;
    }

    public function addProduct(Product $product): self
    {
        if (!$this->product->contains($product)) {
            $this->product[] = $product;
        }

        return $this;
    }

    public function removeProduct(Product $product): self
    {
        $this->product->removeElement($product);

        return $this;
    }

    public function getColorName(): ?string
    {
        return $this->ColorName;
    }

    public function setColorName(string $ColorName): self
    {
        $this->ColorName = $ColorName;

        return $this;
    }
}
