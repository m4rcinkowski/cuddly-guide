<?php

declare(strict_types=1);

namespace App\Command;

use App\DTO\NewProduct;

final class AddNewProduct
{
    private NewProduct $product;

    public function __construct(NewProduct $product)
    {
        $this->product = $product;
    }

    public function getProduct(): NewProduct
    {
        return $this->product;
    }
}
