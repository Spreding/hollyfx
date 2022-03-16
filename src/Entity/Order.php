<?php

namespace App\Entity;

use App\Repository\OrderRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=OrderRepository::class)
 * @ORM\Table(name="`order`")
 */
class Order
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
    private $orderNumber;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="orders")
     */
    private $User;

    /**
     * @ORM\Column(type="datetime")
     */
    private $orderDate;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $orderAdress;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $orderDelivery;

    /**
     * @ORM\Column(type="float")
     */
    private $orderDeliveryPrice;

    /**
     * @ORM\Column(type="boolean")
     */
    private $orderIsPayed;

    /**
     * @ORM\Column(type="float")
     */
    private $orderPrice;

    /**
     * @ORM\OneToMany(targetEntity=OrderDetails::class, mappedBy="OrderRef")
     */
    private $orderDetails;

    public function __construct()
    {
        $this->orderDetails = new ArrayCollection();
    }



    public function getId(): ?int
    {
        return $this->id;
    }

    public function getOrderNumber(): ?string
    {
        return $this->orderNumber;
    }

    public function setOrderNumber(string $orderNumber): self
    {
        $this->orderNumber = $orderNumber;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->User;
    }

    public function setUser(?User $User): self
    {
        $this->User = $User;

        return $this;
    }

    public function getOrderDate(): ?\DateTimeInterface
    {
        return $this->orderDate;
    }

    public function setOrderDate(\DateTimeInterface $orderDate): self
    {
        $this->orderDate = $orderDate;

        return $this;
    }

    public function getOrderAdress(): ?string
    {
        return $this->orderAdress;
    }

    public function setOrderAdress(string $orderAdress): self
    {
        $this->orderAdress = $orderAdress;

        return $this;
    }

    public function getOrderDelivery(): ?string
    {
        return $this->orderDelivery;
    }

    public function setOrderDelivery(string $orderDelivery): self
    {
        $this->orderDelivery = $orderDelivery;

        return $this;
    }

    public function getOrderIsPayed(): ?bool
    {
        return $this->orderIsPayed;
    }

    public function setOrderIsPayed(bool $orderIsPayed): self
    {
        $this->orderIsPayed = $orderIsPayed;

        return $this;
    }

    public function getOrderPrice(): ?float
    {
        return $this->orderPrice;
    }

    public function setOrderPrice(float $orderPrice): self
    {
        $this->orderPrice = $orderPrice;

        return $this;
    }

    public function getOrderDeliveryPrice(): ?float
    {
        return $this->orderDeliveryPrice;
    }

    public function setOrderDeliveryPrice(float $orderDeliveryPrice): self
    {
        $this->orderDeliveryPrice = $orderDeliveryPrice;

        return $this;
    }

    /**
     * @return Collection<int, OrderDetails>
     */
    public function getOrderDetails(): Collection
    {
        return $this->orderDetails;
    }

    public function addOrderDetail(OrderDetails $orderDetail): self
    {
        if (!$this->orderDetails->contains($orderDetail)) {
            $this->orderDetails[] = $orderDetail;
            $orderDetail->setOrderRef($this);
        }

        return $this;
    }

    public function removeOrderDetail(OrderDetails $orderDetail): self
    {
        if ($this->orderDetails->removeElement($orderDetail)) {
            // set the owning side to null (unless already changed)
            if ($orderDetail->getOrderRef() === $this) {
                $orderDetail->setOrderRef(null);
            }
        }

        return $this;
    }
}
