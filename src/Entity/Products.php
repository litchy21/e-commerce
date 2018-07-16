<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ProductsRepository")
 */
class Products
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
     * @ORM\Column(type="text", nullable=true)
     */
    private $description;

    /**
     * @ORM\Column(type="array", nullable=true)
     */
    private $tags;

    /**
     * @ORM\Column(type="datetime")
     */
    private $date;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\SubCategories", inversedBy="products")
     */
    private $sub_category;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Categories", inversedBy="products")
     */
    private $category;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\ProductDetails", mappedBy="product")
     */
    private $productDetails;

    public function __construct()
    {
        $this->sub_category = new ArrayCollection();
        $this->category = new ArrayCollection();
        $this->productDetails = new ArrayCollection();
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

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getTags(): ?array
    {
        return $this->tags;
    }

    public function setTags(?array $tags): self
    {
        $this->tags = $tags;

        return $this;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function getSubCategory()
    {
        return $this->sub_category;
    }

    public function setSubCategory(?SubCategories $sub_category): self
    {
        $this->sub_category = $sub_category;

        return $this;
    }

    public function getCategory()
    {
        return $this->category;
    }

    public function setCategory(?Categories $category): self
    {
        $this->category = $category;

        return $this;
    }

    /**
     * @return Collection|ProductDetails[]
     */
    public function getProductDetails(): Collection
    {
        return $this->productDetails;
    }

    public function addProductDetail(ProductDetails $productDetail): self
    {
        if (!$this->productDetails->contains($productDetail)) {
            $this->productDetails[] = $productDetail;
            $productDetail->setProduct($this);
        }

        return $this;
    }

    public function removeProductDetail(ProductDetails $productDetail): self
    {
        if ($this->productDetails->contains($productDetail)) {
            $this->productDetails->removeElement($productDetail);
            // set the owning side to null (unless already changed)
            if ($productDetail->getProduct() === $this) {
                $productDetail->setProduct(null);
            }
        }

        return $this;
    }
    public function __toString() {
        return $this->name;
    }
}
