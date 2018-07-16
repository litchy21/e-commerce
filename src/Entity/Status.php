<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\StatusRepository")
 */
class Status
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="boolean")
     */
    private $payment;

    /**
     * @ORM\Column(type="boolean")
     */
    private $shipped;

    /**
     * @ORM\Column(type="boolean")
     */
    private $item_recieved;

    public function getId()
    {
        return $this->id;
    }

    public function getPayment(): ?bool
    {
        return $this->payment;
    }

    public function setPayment(bool $payment): self
    {
        $this->payment = $payment;

        return $this;
    }

    public function getShipped(): ?bool
    {
        return $this->shipped;
    }

    public function setShipped(bool $shipped): self
    {
        $this->shipped = $shipped;

        return $this;
    }

    public function getItemRecieved(): ?bool
    {
        return $this->item_recieved;
    }

    public function setItemRecieved(bool $item_recieved): self
    {
        $this->item_recieved = $item_recieved;

        return $this;
    }
}
