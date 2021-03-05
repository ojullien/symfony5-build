<?php

declare(strict_types=1);

namespace App\Entity;

use Symfony\Component\Validator\Constraints as Assert;

class Size
{
    /**
     * @Assert\PositiveOrZero
     * @Assert\Type("\float")
     */
    private float $fSize;

    /**
     * @return void
     */
    public function __construct(float $fSize = 0.0)
    {
        $this->fSize = $fSize;
    }

    public function getSize(): float
    {
        return $this->fSize;
    }

    public function setSize(float $fSize): void
    {
        $this->fSize = $fSize;
    }
}
