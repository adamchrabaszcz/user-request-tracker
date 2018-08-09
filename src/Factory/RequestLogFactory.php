<?php 

namespace App\Factory;

use Symfony\Component\HttpFoundation\Request;
use App\Entity\RequestLog;

/**
 * RequestLogFactory
 * Factory for creating RequestLog objects
 */
class RequestLogFactory
{
    
    /**
     * Create RequestLog from Request
     *
     * @param Request $request 
     * @return RequestLog
     */
    public function createFromRequest(Request $request) : RequestLog
    {
        // get session
        $session = $request->getSession();
        
        // create RequestLog
        $requestLog = new RequestLog();
        $requestLog->setSessionId($session->getId());
        $requestLog->setIpAddress($request->getClientIp());
        $requestLog->setUrlRequest($request->getUri());
        $requestLog->setPostParameters($request->request->all());
        $requestLog->setGetParameters($request->query->all()); 
        $requestLog->setMethod($request->getMethod()); 
        $requestLog->setFileNames($request->files->get('cool_stuff')['file'] ? [
                $request->files->get('cool_stuff')['file']->getClientOriginalName(), 
                $request->files->get('cool_stuff')['file']->getFilename()
                ] : []);
        $requestLog->setHttpReferer($request->headers->get('referer'));
        
        return $requestLog;
    }

}