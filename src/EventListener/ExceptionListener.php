<?php

namespace App\EventListener;

use Symfony\Component\EventDispatcher\Attribute\AsEventListener;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Event\ExceptionEvent;

#[AsEventListener(event: ExceptionEvent::class)]
class ExceptionListener
{
    // the event listened is based upon the type of this parameter
    public function __invoke(ExceptionEvent $event): void
    {
        dump(
            "ExceptionListener called!",
            $event,
        );

        // Implement business logic like (uncomment to see what happen)
//        $response = $event->getResponse();
//        $response = new Response(
//            'An unknown error happen, please try again later',
//            Response::HTTP_INTERNAL_SERVER_ERROR, [
//            'custom-header-error-code'    => $event->getThrowable()->getCode(),
//            'custom-header-error-message' => $event->getThrowable()->getMessage(),
//        ]);
//        $event->setResponse($response);


    }
}