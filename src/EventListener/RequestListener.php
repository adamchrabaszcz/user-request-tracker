<?php

namespace App\EventListener;

use Symfony\Component\HttpKernel\Event\GetResponseEvent;
use Symfony\Component\HttpKernel\HttpKernel;
use Symfony\Component\HttpKernel\HttpKernelInterface;
use App\RequestLogger\RequestLogger;

/**
 * RequestListener
 *
 * Request Listener listening for requests and logging them to the RequestLogger.
 */
class RequestListener
{
    
    /**
     * @var RequestLogger
     */
    protected $requestLogger;
    
    public function __construct(RequestLogger $requestLogger)
    {
        $this->requestLogger = $requestLogger;
    }

    /**
     * OnKernelRequest - log Request to RequestLog on each Request
     *
     * @param GetResponseEvent $event 
     * @return void
     */
    public function onKernelRequest(GetResponseEvent $event) : void
    {
        // don't do anything if it's not the master request
        if (! $event->isMasterRequest()) {
            return;
        }
        
        // get Request from Event
        $request = $event->getRequest();
        
        // log Request via RequestLogger
        $this->requestLogger->logRequest($request);
        
    }
}