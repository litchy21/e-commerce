<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CategoriesRepository")
 */
class Categories
{

    public function __toString() {
        return $this->name;
    }
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
     * @ORM\OneToMany(targetEntity="App\Entity\SubCategories", mappedBy="category")
     */
    private $subCategories;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Products", mappedBy="category")
     */
    private $products;

    public function __construct()
    {
        $this->subCategories = new ArrayCollection();
        $this->products = new ArrayCollection();
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

    /**
     * @return Collection|SubCategories[]
     */
    public function getSubCategories(): Collection
    {
        return $this->subCategories;
    }

    public function addSubCategory(SubCategories $subCategory): self
    {
        if (!$this->subCategories->contains($subCategory)) {
            $this->subCategories[] = $subCategory;
            $subCategory->setCategory($this);
        }

        return $this;
    }

    public function removeSubCategory(SubCategories $subCategory): self
    {
        if ($this->subCategories->contains($subCategory)) {
            $this->subCategories->removeElement($subCategory);
            // set the owning side to null (unless already changed)
            if ($subCategory->getCategory() === $this) {
                $subCategory->setCategory(null);
            }
        }

        return $this;
    }
    /**
     * @return Collection|Products[]
     */
    public function getProducts(): Collection
    {
        return $this->products;
    }

    public function addProducts(Products $products): self
    {
        if (!$this->products->contains($products)) {
            $this->products[] = $products;
            $products->setProducts($this);
        }

        return $this;
    }

    public function removeProducts(Products $products): self
    {
        if ($this->products->contains($products)) {
            $this->products->removeElement($products);
            // set the owning side to null (unless already changed)
            if ($products->getProducts() === $this) {
                $products->setProducts(null);
            }
        }

        return $this;
    }


}
