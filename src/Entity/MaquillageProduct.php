<?php

namespace App\Entity;

use App\Repository\MaquillageProductRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=MaquillageProductRepository::class)
 */
class MaquillageProduct
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
    private $title;

    /**
     * @ORM\Column(type="string", length=500)
     */
    private $description;

    /**
     * @ORM\Column(type="float")
     */
    private $price;

    /**
     * @ORM\OneToMany(targetEntity=MaquillageImage::class, mappedBy="maquillage")
     */
    private $maquillageImages;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $slug;

    public function __construct()
    {
        $this->maquillageImages = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getPrice(): ?float
    {
        return $this->price;
    }

    public function setPrice(float $price): self
    {
        $this->price = $price;

        return $this;
    }

    /**
     * @return Collection<int, MaquillageImage>
     */
    public function getMaquillageImages(): Collection
    {
        return $this->maquillageImages;
    }

    public function addMaquillageImage(MaquillageImage $maquillageImage): self
    {
        if (!$this->maquillageImages->contains($maquillageImage)) {
            $this->maquillageImages[] = $maquillageImage;
            $maquillageImage->setMaquillage($this);
        }

        return $this;
    }

    public function removeMaquillageImage(MaquillageImage $maquillageImage): self
    {
        if ($this->maquillageImages->removeElement($maquillageImage)) {
            // set the owning side to null (unless already changed)
            if ($maquillageImage->getMaquillage() === $this) {
                $maquillageImage->setMaquillage(null);
            }
        }

        return $this;
    }

    public function getSlug(): ?string
    {
        return $this->slug;
    }

    public function setSlug(string $slug): self
    {
        $this->slug = $slug;

        return $this;
    }
}
