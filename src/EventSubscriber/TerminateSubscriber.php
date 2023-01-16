<?php

namespace App\EventSubscriber;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpKernel\Event\TerminateEvent;
use Symfony\Component\HttpKernel\KernelEvents;

class TerminateSubscriber implements EventSubscriberInterface
{
    public function onKernelTerminate(TerminateEvent $event): void
    {
        // ...
        dump('THE KERNEL IS TERMINATING!!!!!', $event);
    }

    public static function getSubscribedEvents(): array
    {
        return [
            KernelEvents::TERMINATE => 'onKernelTerminate',
        ];
    }
}
