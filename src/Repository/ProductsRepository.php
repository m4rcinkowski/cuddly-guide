<?php

declare(strict_types=1);

namespace App\Repository;

use App\DTO\NewProduct;
use App\Infrastructure\DataSourceInterface;

final class ProductsRepository implements ProductsRepositoryInterface
{
    private DataSourceInterface $dataSource;

    public function __construct(DataSourceInterface $dataSource)
    {
        $this->dataSource = $dataSource;
    }

    public function add(NewProduct $product)
    {
        $this->dataSource->add([
            'name' => $product->getName(),
            'price' => $product->getPrice(),
        ]);
    }
}
