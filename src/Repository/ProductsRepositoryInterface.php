<?php

declare(strict_types=1);

namespace App\Repository;

use App\Domain\Product;
use App\DTO\NewProduct;

interface ProductsRepositoryInterface
{
    public function add(NewProduct $product): Product;
}
