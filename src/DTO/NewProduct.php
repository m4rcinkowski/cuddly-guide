<?php

declare(strict_types=1);

namespace App\DTO;

use JMS\Serializer\Annotation as Serializer;
use Symfony\Component\Validator\Constraints as Assert;

final class NewProduct
{
    /**
     * @Serializer\Type("string")
     * @Assert\NotBlank()
     */
    private string $name;
    /**
     * @Serializer\Type("float")
     * @Assert\Positive()
     */
    private float $price;

    public function getName(): string
    {
        return $this->name;
    }

    public function getPrice(): float
    {
        return $this->price;
    }
}
