<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\VariantOptionsRepository")
 */
class VariantOptions
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
    private $detail;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Variants", inversedBy="variantOptions")
     */
    private $variant;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\ProductDetails", mappedBy="variantoption")
     */
    private $productDetails;

    public function __construct()
    {
        $this->productDetails = new ArrayCollection();
    }

    public function getId()
    {
        return $this->id;
    }

    public function getDetail(): ?string
    {
        return $this->detail;
    }

    public function setDetail(string $detail): self
    {
        $this->detail = $detail;

        return $this;
    }

    public function getVariant(): ?Variants
    {
        return $this->variant;
    }

    public function setVariant(?Variants $variant): self
    {
        $this->variant = $variant;

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
            $productDetail->addVariantoption($this);
        }

        return $this;
    }

    public function removeProductDetail(ProductDetails $productDetail): self
    {
        if ($this->productDetails->contains($productDetail)) {
            $this->productDetails->removeElement($productDetail);
            $productDetail->removeVariantoption($this);
        }

        return $this;
    }
    public function __toString() {
        return (string) $this->detail;
    }
}
