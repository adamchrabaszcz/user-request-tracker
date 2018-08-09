<?php 

namespace App\EmailStatistics;

use Doctrine\ORM\EntityManagerInterface;
use App\Entity\RequestLog;

/**
 * EmailStatistics Service
 * Service for sending emails with statistics
 */
class EmailStatistics
{
    
    /**
     * @var EntityManagerInterface
     */
    protected $entityManager;
    
    /**
     * @var \Swift_Mailer
     */
    protected $mailer;
    
    function __construct(EntityManagerInterface $entityManager, \Swift_Mailer $mailer)
    {
        $this->entityManager = $entityManager;
        $this->mailer = $mailer;
    }
    
    /**
     * Send Email with statistics
     *
     * @param string $recipient 
     * @return int | null
     */
    public function sendEmail(string $recipient) : ?int
    {
        $logs = $this->entityManager->getRepository(RequestLog::class)->findAll();
        
        $message = (new \Swift_Message('Email Statistics!'))
            ->setFrom('test@test.pl')
            ->setTo($recipient)
            ->setBody(
                sprintf('Logs in DB: %s', count($logs)),
                'text/plain'
            );

        if ($this->mailer->send($message)) {
            return count($logs);
        } else {
            return null;
        }
    }
}