<?php

declare(strict_types=1);

namespace App\Controller;

use App\DTO\NewProduct;
use FOS\RestBundle\Controller\AbstractFOSRestController;
use FOS\RestBundle\Controller\Annotations as Rest;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Symfony\Component\Validator\ConstraintViolationListInterface;

final class ProductsController extends AbstractFOSRestController
{
    /**
     * @Rest\Post(path="/products")
     * @ParamConverter(name="product", converter="fos_rest.request_body")
     */
    public function createProduct(NewProduct $product, ConstraintViolationListInterface $validationErrors)
    {
        return $product;
    }
}
