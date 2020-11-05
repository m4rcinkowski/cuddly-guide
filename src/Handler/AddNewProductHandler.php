<?php

declare(strict_types=1);

namespace App\Handler;

use App\Command\AddNewProduct;
use App\Repository\ProductsRepositoryInterface;
use Symfony\Component\Messenger\Handler\MessageHandlerInterface;

final class AddNewProductHandler implements MessageHandlerInterface
{
    private ProductsRepositoryInterface $repository;

    public function __construct(ProductsRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke(AddNewProduct $command)
    {
        $this->repository->add($command->getProduct());
    }
}
