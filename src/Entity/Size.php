<?php

declare(strict_types=1);

namespace App\Entity;

use Symfony\Component\Validator\Constraints as Assert;

/**
 *
 * @package App\Entity
 */
class Size
{

    /**
     *
     * @var float
     * @Assert\PositiveOrZero
     * @Assert\Type("\float")
     */
    private float $fSize;

    /**
     *
     * @param float $fSize
     * @return void
     */
    public function __construct(float $fSize = 0.0)
    {
        $this->fSize = $fSize;
    }

    /**
     *
     * @return float
     */
    public function getSize(): float
    {
        return $this->fSize;
    }

    /**
     *
     * @param float $fSize
     * @return void
     */
    public function setSize(float $fSize): void
    {
        $this->fSize = $fSize;
    }
}
