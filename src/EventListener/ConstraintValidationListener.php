<?php

namespace App\EventListener;

use App\Exception\RequestValidationException;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Event\ControllerArgumentsEvent;
use Symfony\Component\HttpKernel\KernelEvents;
use Symfony\Component\Validator\ConstraintViolationList;

final class ConstraintValidationListener implements EventSubscriberInterface
{
    public function onKernelControllerArguments(ControllerArgumentsEvent $event)
    {
        $controllerArguments = $event->getArguments();

        foreach ($controllerArguments as $controllerArgument) {
            if ($controllerArgument instanceof ConstraintViolationList) {
                if (count($controllerArgument)) {
                    throw new RequestValidationException($controllerArgument);
                }
            }
        }
    }

    public static function getSubscribedEvents()
    {
        return [
            KernelEvents::CONTROLLER_ARGUMENTS => 'onKernelControllerArguments',
        ];
    }
}
