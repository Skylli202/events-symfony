<?php

namespace App\EventListener;

use Symfony\Component\EventDispatcher\Attribute\AsEventListener;
use Symfony\Component\HttpKernel\Event\ControllerEvent;
use Symfony\Component\HttpKernel\Event\ExceptionEvent;

class ControllerListener
{
    public function __invoke(ControllerEvent $event): void
    {
        dump(
            'ControllerListener called!',
            $event
        );
    }
}