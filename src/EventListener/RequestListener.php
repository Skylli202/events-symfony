<?php

namespace App\EventListener;

use Symfony\Component\EventDispatcher\Attribute\AsEventListener;
use Symfony\Component\HttpKernel\Event\RequestEvent;

#[AsEventListener(event: RequestEvent::class)]
class RequestListener
{
    public function onKernelRequest(RequestEvent $event)
    {
        dump('RequestListener called!', $event);
        // The isMainRequest() method was introduced in Symfony 5.3.
        // In previous versions it was called isMasterRequest()
        if (!$event->isMainRequest()) {
            // don't do anything if it's not the main request
            return;
        }

        // ...
    }
}