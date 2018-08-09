<?php

namespace App\RequestLogger;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\Session;
use App\Entity\RequestLog;
use App\Factory\RequestLogFactory;

/**
 * RequestLogger
 * Class responsible for logging Requests to DB
 */
class RequestLogger
{
    /**
     * @var EntityManagerInterface
     */
    protected $entityManager;
    
    function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }
    
    /**
     * Log Request
     *
     * @param Request $request 
     * @return void
     */
    public function logRequest(Request $request) : void
    {
        // Create RequestLog via RequestLogFactory
        $requestLog = RequestLogFactory::createFromRequest($request);
            
        // persist RequestLog to DB
        $this->entityManager->persist($requestLog);
        $this->entityManager->flush();
    }
    
}