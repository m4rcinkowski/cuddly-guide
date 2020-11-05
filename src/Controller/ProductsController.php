<?php

declare(strict_types=1);

namespace App\Controller;

use App\Command\AddNewProduct;
use App\DTO\NewProduct;
use FOS\RestBundle\Controller\AbstractFOSRestController;
use FOS\RestBundle\Controller\Annotations as Rest;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Symfony\Component\Messenger\HandleTrait;
use Symfony\Component\Messenger\MessageBusInterface;
use Symfony\Component\Validator\ConstraintViolationListInterface;

final class ProductsController extends AbstractFOSRestController
{
    use HandleTrait;

    /** @var MessageBusInterface */
    private $messageBus;

    public function __construct(MessageBusInterface $messageBus)
    {
        $this->messageBus = $messageBus;
    }

    /**
     * @Rest\Post("/products")
     * @Rest\View(statusCode=201)
     * @ParamConverter(name="product", converter="fos_rest.request_body")
     */
    public function createProduct(NewProduct $product, ConstraintViolationListInterface $validationErrors)
    {
        $this->handle(new AddNewProduct($product));

        return $product;
    }
}
