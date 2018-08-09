<?php

namespace App\Tests;

use App\Command\SendEmailCommand;
use Symfony\Bundle\FrameworkBundle\Console\Application;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use PHPUnit\Framework\TestCase;
use Symfony\Component\Console\Tester\CommandTester;

/**
 * Test SendEmailCommand
 *
 */
class SendEmailCommandTest extends KernelTestCase
{
    public function testExecute()
    {
        $kernel = self::bootKernel();
        $application = new Application($kernel);

        $command = $application->find('app:send:email');
        $commandTester = new CommandTester($command);
        $commandTester->execute(array(
            // get command name
            'command'  => $command->getName(),

            // pass arguments to the helper
            'recipient' => 'xxx@xxx.pl',
        ));

        // the output of the command in the console
        $output = $commandTester->getDisplay();

        // test if output has proper message
        $this->assertRegexp('/Email sent to xxx@xxx.pl with [0-9]+ records./', $output);

    }
}
