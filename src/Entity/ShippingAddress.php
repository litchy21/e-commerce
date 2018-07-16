<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ShippingAddressRepository")
 */
class ShippingAddress
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
    private $name;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $lastname;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $shipAddress;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $shipCity;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $shipState;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $shipCountry;

    /**
     * @ORM\Column(type="integer")
     */
    private $shipPostalCode;

    public function getId()
    {
        return $this->id;
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

    public function getLastname(): ?string
    {
        return $this->lastname;
    }

    public function setLastname(string $lastname): self
    {
        $this->lastname = $lastname;

        return $this;
    }

    public function getShipAddress(): ?string
    {
        return $this->shipAddress;
    }

    public function setShipAddress(string $shipAddress): self
    {
        $this->shipAddress = $shipAddress;

        return $this;
    }

    public function getShipCity(): ?string
    {
        return $this->shipCity;
    }

    public function setShipCity(string $shipCity): self
    {
        $this->shipCity = $shipCity;

        return $this;
    }

    public function getShipState(): ?string
    {
        return $this->shipState;
    }

    public function setShipState(?string $shipState): self
    {
        $this->shipState = $shipState;

        return $this;
    }

    public function getShipCountry(): ?string
    {
        return $this->shipCountry;
    }

    public function setShipCountry(string $shipCountry): self
    {
        $this->shipCountry = $shipCountry;

        return $this;
    }

    public function getShipPostalCode(): ?int
    {
        return $this->shipPostalCode;
    }

    public function setShipPostalCode(int $shipPostalCode): self
    {
        $this->shipPostalCode = $shipPostalCode;

        return $this;
    }
}
