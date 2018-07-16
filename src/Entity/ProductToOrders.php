<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ProductToOrdersRepository")
 */
class ProductToOrders
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Orders", inversedBy="productToOrders")
     */
    private $orders;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\ProductDetails", inversedBy="productToOrders")
     */
    private $product_detail;

    public function getId()
    {
        return $this->id;
    }

    public function getOrders(): ?Orders
    {
        return $this->orders;
    }

    public function setOrders(?Orders $orders): self
    {
        $this->orders = $orders;

        return $this;
    }

    public function getProductDetail(): ?ProductDetails
    {
        return $this->product_detail;
    }

    public function setProductDetail(?ProductDetails $product_detail): self
    {
        $this->product_detail = $product_detail;

        return $this;
    }
}
