<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\VariantsRepository")
 */
class Variants
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
     * @ORM\OneToMany(targetEntity="App\Entity\VariantOptions", mappedBy="variant")
     */
    private $variantOptions;

    public function __construct()
    {
        $this->variantOptions = new ArrayCollection();
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
     * @return Collection|VariantOptions[]
     */
    public function getVariantOptions(): Collection
    {
        return $this->variantOptions;
    }

    public function addVariantOption(VariantOptions $variantOption): self
    {
        if (!$this->variantOptions->contains($variantOption)) {
            $this->variantOptions[] = $variantOption;
            $variantOption->setVariant($this);
        }

        return $this;
    }

    public function removeVariantOption(VariantOptions $variantOption): self
    {
        if ($this->variantOptions->contains($variantOption)) {
            $this->variantOptions->removeElement($variantOption);
            // set the owning side to null (unless already changed)
            if ($variantOption->getVariant() === $this) {
                $variantOption->setVariant(null);
            }
        }

        return $this;
    }

    public function __toString() {
        return $this->name;
    }
}
