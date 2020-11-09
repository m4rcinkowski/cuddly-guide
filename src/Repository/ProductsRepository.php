<?php

declare(strict_types=1);

namespace App\Repository;

use App\Domain\Product;
use App\DTO\NewProduct;
use App\Infrastructure\DataSourceInterface;
use Ramsey\Uuid\Uuid;

final class ProductsRepository implements ProductsRepositoryInterface
{
    private DataSourceInterface $dataSource;

    public function __construct(DataSourceInterface $dataSource)
    {
        $this->dataSource = $dataSource;
    }

    public function add(NewProduct $product): Product
    {
        $id = Uuid::uuid4()->toString();
        $this->dataSource->add([
            'id' => $id,
            'name' => $product->getName(),
            'price' => $product->getPrice(),
        ]);

        return new Product($id, $product->getName(), $product->getPrice());
    }
}
