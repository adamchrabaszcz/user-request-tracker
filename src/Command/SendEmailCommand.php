<?php 

namespace App\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputArgument;
use App\EmailStatistics\EmailStatistics;

/**
 * SendEmailCommand
 *
 * Command for sending emails
 */
class SendEmailCommand extends Command
{
    
    /**
     * @var EmailStatistics
     */
    protected $emailStatistics;
    
    function __construct(EmailStatistics $emailStatistics)
    {
        $this->emailStatistics = $emailStatistics;
        
        parent::__construct();
    }
    
    /**
     * Configure command
     *
     * @return void
     */
    protected function configure() : void
    {
        $this->setName('app:send:email')
                ->setDescription('Send email with statistics')
                ->setHelp('This command allows you send email with statistics.')
                ->addArgument('recipient', InputArgument::REQUIRED, 'The recipient of the email.')                    
            ;
    }

    /**
     * Execute command
     *
     * @param InputInterface $input 
     * @param OutputInterface $output 
     * @return void
     */
    protected function execute(InputInterface $input, OutputInterface $output) : void
    {
        // get input
        $recipient = $input->getArgument('recipient');
        
        $output->writeln([
            '<comment>Send Email Command</comment>',
            '============',
        ]);
        
        // send statistics and get response
        $response = $this->emailStatistics->sendEmail($recipient);
        
        // if response, then echo Success
        if ($response) {
            $output->writeln(sprintf('<info>Email sent to <options=bold>%s</> with <options=bold>%s</> records.</info>', $recipient, $response));
        // else echo Fail
        } else {
            $output->writeln('<error>Email NOT sent. There was an error.</error>');
        }
        $output->writeln('');

    }
}
