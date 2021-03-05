<?php

declare(strict_types=1);

namespace App\Entity;

use Symfony\Component\Validator\Constraints as Assert;

class Shoe
{
    private array $aSizes;

    /**
     * @Assert\NotBlank(message = "Le contenu ne peut être vide.")
     */
    private string $sName;

    /**
     * @Assert\Positive
     */
    private float $fPrice;

    private string $sDescription;

    /**
     * @param string $sName
     * @param float  $fPrice
     * @param string $sDescription
     * @param array  $aSizes
     *
     * @return void
     */
    public function __construct($sName = '', $fPrice = 0.0, $sDescription = '', $aSizes = [])
    {
        $this->sName = $sName;
        $this->fPrice = $fPrice;
        $this->sDescription = $sDescription;
        $this->setSizes($aSizes);
    }

    public function getName(): string
    {
        return $this->sName;
    }

    /**
     * @return Shoe
     */
    public function setName(string $sName): self
    {
        $this->sName = $sName;

        return $this;
    }

    public function getDescription(): string
    {
        return $this->sDescription;
    }

    /**
     * @return Shoe
     */
    public function setDescription(string $sDescription): self
    {
        $this->sDescription = $sDescription;

        return $this;
    }

    public function getPrice(): float
    {
        return $this->fPrice;
    }

    /**
     * @return Shoe
     */
    public function setPrice(float $fPrice): self
    {
        $this->fPrice = $fPrice;

        return $this;
    }

    public function getSizes(): array
    {
        return $this->aSizes;
    }

    /**
     * @return Shoe
     */
    public function setSizes(array $aSizes): self
    {
        $this->aSizes = [];
        foreach ($aSizes as $pSize) {
            if ($pSize instanceof Size) {
                $this->aSizes[$pSize->getSize()] = $pSize;
            }
        }

        return $this;
    }

    /**
     * @return Shoe
     */
    public function addSize(Size $pSize): self
    {
        $this->aSizes[$pSize->getSize()] = $pSize;

        return $this;
    }

    /**
     * @return void
     */
    public function removeSize(Size $pSize): self
    {
        unset($this->aSizes[$pSize->getSize()]);

        return $this;
    }
}
