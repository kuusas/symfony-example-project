<?php

namespace AppBundle\EventListener;

use Symfony\Component\HttpKernel\Event\GetResponseForExceptionEvent;
use Symfony\Component\HttpFoundation\Response;

class ExceptionListener
{
    private $environment;

    public function __construct($environment)
    {
        $this->environment = $environment;
    }
    public function onKernelException(GetResponseForExceptionEvent $event)
    {
        if ($this->environment != 'prod') {
            return;
        }
        $exception = $event->getException();
        $response = new Response('Error!');
        // setup the Response object based on the caught exception
        $event->setResponse($response);

        // you can alternatively set a new Exception
        // $exception = new \Exception('Some special exception');
        // $event->setException($exception);
    }
}
