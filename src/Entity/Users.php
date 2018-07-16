<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\User\AdvancedUserInterface;

/**
* @ORM\Table(name="users")
* @ORM\Entity(repositoryClass="App\Repository\UsersRepository")
*/
class Users implements AdvancedUserInterface, \Serializable
{
  /**
  * @ORM\Id()
  * @ORM\GeneratedValue()
  * @ORM\Column(type="integer", unique=true)
  */
  private $id;

  /**
  * @ORM\Column(type="string", length=190)
  */
  private $name;

  /**
  * @ORM\Column(type="string", length=190)
  */
  private $lastname;

  /**
  * @ORM\Column(type="string", length=190, unique=true)
  */
  private $username;

  /**
  * @ORM\Column(type="string", length=190, unique=true)
  */
  private $email;

  /**
  * @ORM\Column(type="string", length=190)
  */
  private $password;

  /**
  * @ORM\Column(type="string", length=190, nullable=true)
  */
  private $verifyToken;

  /**
  * @ORM\Column(type="boolean")
  */
  private $active;

  /**
  * @ORM\Column(type="array")
  */
  private $roles;

  /**
   * @ORM\Column(type="datetime")
   */
  private $Created_at;

  /**
  * @ORM\Column(type="integer")
  */
  private $phone;

  /**
  * @ORM\Column(type="string", length=190)
  */
  private $address;

  /**
  * @ORM\Column(type="string", length=190)
  */
  private $city;

  /**
  * @ORM\Column(type="string", length=190)
  */
  private $state;

  /**
  * @ORM\Column(type="string", length=190)
  */
  private $country;

  /**
  * @ORM\Column(type="integer")
  */
  private $postalCode;

  /**
  * @ORM\Column(type="integer", nullable=true)
  */
  private $discount;

  /**
  * @ORM\OneToMany(targetEntity="App\Entity\Orders", mappedBy="user")
  */
  private $orders;

  public function __construct()
  {
    $this->orders = new ArrayCollection();
    $this->roles = array('ROLE_USER');
    // $this->active = false;
  }


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

  public function getUsername(): ?string
  {
    return $this->username;
  }

  public function setUsername(string $username): self
  {
    $this->username = $username;

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

  public function getPassword(): ?string
  {
    return $this->password;
  }

  public function setPassword(string $password): self
  {
    $this->password = $password;

    return $this;
  }

  public function getVerifyToken(): ?string
  {
    return $this->verifyToken;
  }

  public function setVerifyToken(string $verifyToken): self
  {
    $this->verifyToken = $verifyToken;

    return $this;
  }

  public function getActive(): ?bool
  {
    return $this->active;
  }

  public function setActive(bool $active): self
  {
    $this->active = $active;

    return $this;
  }

  public function getCreatedAt(): ?\DateTimeInterface
  {
      return $this->Created_at;
  }

  public function setCreatedAt(\DateTimeInterface $Created_at): self
  {
      $this->Created_at = $Created_at;

      return $this;
  }

  public function getPhone(): ?int
  {
    return $this->phone;
  }

  public function setPhone(int $phone): self
  {
    $this->phone = $phone;

    return $this;
  }

  public function getAddress(): ?string
  {
    return $this->address;
  }

  public function setAddress(string $address): self
  {
    $this->address = $address;

    return $this;
  }

  public function getCity(): ?string
  {
    return $this->city;
  }

  public function setCity(string $city): self
  {
    $this->city = $city;

    return $this;
  }

  public function getState(): ?string
  {
    return $this->state;
  }

  public function setState(string $state): self
  {
    $this->state = $state;

    return $this;
  }

  public function getCountry(): ?string
  {
    return $this->country;
  }

  public function setCountry(string $country): self
  {
    $this->country = $country;

    return $this;
  }

  public function getPostalCode(): ?int
  {
    return $this->postalCode;
  }

  public function setPostalCode(int $postalCode): self
  {
    $this->postalCode = $postalCode;

    return $this;
  }

  public function getDiscount(): ?int
  {
    return $this->discount;
  }

  public function setDiscount(int $discount): self
  {
    $this->discount = $discount;

    return $this;
  }

  /**
  * @return Collection|Orders[]
  */
  public function getOrders(): Collection
  {
    return $this->orders;
  }

  public function addOrder(Orders $order): self
  {
    if (!$this->orders->contains($order)) {
      $this->orders[] = $order;
      $order->setUser($this);
    }

    return $this;
  }

  public function removeOrder(Orders $order): self
  {
    if ($this->orders->contains($order)) {
      $this->orders->removeElement($order);
      // set the owning side to null (unless already changed)
      if ($order->getUser() === $this) {
        $order->setUser(null);
      }
    }

    return $this;
  }

  public function getSalt()
  {
    // The bcrypt and argon2i algorithms don't require a separate salt.
    // You *may* need a real salt if you choose a different encoder.
    return null;
  }

  public function getRoles()
  {
    return $this->roles;
  }

  public function eraseCredentials()
  {
  }

  public function isAccountNonExpired()
   {
       return true;
   }

   public function isAccountNonLocked()
   {
       return true;
   }

   public function isCredentialsNonExpired()
   {
       return true;
   }


  public function isEnabled()
  {
      return $this->active;
  }

  /** @see \Serializable::serialize() */
    public function serialize()
    {
        return serialize(array(
            $this->id,
            $this->username,
            $this->password,
            $this->active,
            // see section on salt below
            // $this->salt,
        ));
    }

    /** @see \Serializable::unserialize() */
    public function unserialize($serialized)
    {
        list (
            $this->id,
            $this->username,
            $this->password,
            $this->active,
            // see section on salt below
            // $this->salt
        ) = unserialize($serialized, ['allowed_classes' => false]);
    }
}
