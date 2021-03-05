<?php

declare(strict_types=1);

namespace App\Entity;

use Symfony\Component\Validator\Constraints as Assert;

/**
 *
 * @package App\Entity
 */
class Shoe
{

    /**
     *
     * @var array
     */
    private array $aSizes;

    /**
     *
     * @var string
     * @Assert\NotBlank(message = "Le contenu ne peut être vide.")
     */
    private string $sName;

    /**
     *
     * @var float
     * @Assert\Positive
     */
    private float $fPrice;

    /**
     *
     * @var string
     */
    private string $sDescription;

    /**
     *
     * @param string $sName
     * @param float $fPrice
     * @param string $sDescription
     * @param array $aSizes
     * @return void
     */
    public function __construct($sName = '', $fPrice = 0.0, $sDescription = '', $aSizes = [])
    {
        $this->sName = $sName;
        $this->fPrice = $fPrice;
        $this->sDescription = $sDescription;
        $this->setSizes($aSizes);
    }

    /**
     *
     * @return string
     */
    public function getName(): string
    {
        return $this->sName;
    }

    /**
     *
     * @param string $sName
     * @return Shoe
     */
    public function setName(string $sName): self
    {
        $this->sName = $sName;
        return $this;
    }

    /**
     *
     * @return string
     */
    public function getDescription(): string
    {
        return $this->sDescription;
    }

    /**
     *
     * @param string $sDescription
     * @return Shoe
     */
    public function setDescription(string $sDescription): self
    {
        $this->sDescription = $sDescription;
        return $this;
    }

    /**
     *
     * @return float
     */
    public function getPrice(): float
    {
        return $this->fPrice;
    }

    /**
     *
     * @param float $fPrice
     * @return Shoe
     */
    public function setPrice(float $fPrice): self
    {
        $this->fPrice = $fPrice;
        return $this;
    }

    /**
     *
     * @return array
     */
    public function getSizes(): array
    {
        return $this->aSizes;
    }

    /**
     *
     * @param array $aSizes
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
     *
     * @param Size $pSize
     * @return Shoe
     */
    public function addSize(Size $pSize): self
    {
        $this->aSizes[$pSize->getSize()] = $pSize;
        return $this;
    }

    /**
     *
     * @param Size $pSize
     * @return void
     */
    public function removeSize(Size $pSize): self
    {
        unset($this->aSizes[$pSize->getSize()]);
        return $this;
    }
}
