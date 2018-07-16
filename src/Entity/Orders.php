<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\OrdersRepository")
 */
class Orders
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Status", cascade={"persist", "remove"})
     */
    private $status;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\InternationalShippings", cascade={"persist", "remove"})
     */
    private $international_shipping;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Payments", cascade={"persist", "remove"})
     */
    private $payment;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\ShippingAddress", cascade={"persist", "remove"})
     */
    private $shipping;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $phone;

    /**
     * @ORM\Column(type="boolean")
     */
    private $gift_wrap;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $order_number;

    /**
     * @ORM\Column(type="datetime")
     */
    private $order_date;


    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Users", inversedBy="orders")
     */
    private $user;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\ProductToOrders", mappedBy="orders")
     */
    private $productToOrders;

    public function __construct()
    {
        $this->user = new ArrayCollection();
        $this->productToOrders = new ArrayCollection();
    }

    public function getId()
    {
        return $this->id;
    }


    public function getStatus(): ?Status
    {
        return $this->status;
    }

    public function setStatus(?Status $status): self
    {
        $this->status = $status;

        return $this;
    }

    public function getInternationalShipping(): ?InternationalShippings
    {
        return $this->international_shipping;
    }

    public function setInternationalShipping(?InternationalShippings $international_shipping): self
    {
        $this->international_shipping = $international_shipping;

        return $this;
    }

    public function getPayment(): ?Payments
    {
        return $this->payment;
    }

    public function setPayment(?Payments $payment): self
    {
        $this->payment = $payment;

        return $this;
    }

    public function getShipping(): ?ShippingAddress
    {
        return $this->shipping;
    }

    public function setShipping(?ShippingAddress $shipping): self
    {
        $this->shipping = $shipping;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getPhone(): ?string
    {
        return $this->phone;
    }

    public function setPhone(string $phone): self
    {
        $this->phone = $phone;

        return $this;
    }

    public function getGiftWrap(): ?bool
    {
        return $this->gift_wrap;
    }

    public function setGiftWrap(bool $gift_wrap): self
    {
        $this->gift_wrap = $gift_wrap;

        return $this;
    }

    public function getOrderNumber(): ?string
    {
        return $this->order_number;
    }

    public function setOrderNumber(string $order_number): self
    {
        $this->order_number = $order_number;

        return $this;
    }

    public function getOrderDate(): ?\DateTimeInterface
    {
        return $this->order_date;
    }

    public function setOrderDate(\DateTimeInterface $order_date): self
    {
        $this->order_date = $order_date;

        return $this;
    }

    public function getUser(): ?Users
    {
        return $this->user;
    }

    public function setUser(?Users $user): self
    {
        $this->user = $user;

        return $this;
    }

    /**
     * @return Collection|ProductToOrders[]
     */
    public function getProductToOrders(): Collection
    {
        return $this->productToOrders;
    }

    public function addProductToOrder(ProductToOrders $productToOrder): self
    {
        if (!$this->productToOrders->contains($productToOrder)) {
            $this->productToOrders[] = $productToOrder;
            $productToOrder->setOrders($this);
        }

        return $this;
    }

    public function removeProductToOrder(ProductToOrders $productToOrder): self
    {
        if ($this->productToOrders->contains($productToOrder)) {
            $this->productToOrders->removeElement($productToOrder);
            // set the owning side to null (unless already changed)
            if ($productToOrder->getOrders() === $this) {
                $productToOrder->setOrders(null);
            }
        }

        return $this;
    }
}
