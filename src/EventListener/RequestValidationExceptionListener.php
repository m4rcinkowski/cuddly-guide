<?php

namespace App\EventListener;

use App\Exception\RequestValidationException;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpKernel\Event\ExceptionEvent;
use Symfony\Component\HttpKernel\KernelEvents;
use Symfony\Component\Validator\ConstraintViolationInterface;

final class RequestValidationExceptionListener implements EventSubscriberInterface
{
    public function onKernelException(ExceptionEvent $event)
    {
        $exception = $event->getThrowable();

        if ($exception instanceof RequestValidationException) {
            $validationErrors = $exception->getViolationList();
            $errorDetails = [];

            /** @var ConstraintViolationInterface $item */
            foreach ($validationErrors as $item) {
                $errorDetails[$item->getPropertyPath()] = $item->getMessage();
            }

            $event->setResponse(new JsonResponse([
                'validation_errors' => $errorDetails,
            ], 422));
        }
    }

    public static function getSubscribedEvents()
    {
        return [
            KernelEvents::EXCEPTION => 'onKernelException',
        ];
    }
}
