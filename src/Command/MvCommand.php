<?php


namespace App\Command;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Process\Process;

class MvCommand extends Command
{
    protected static $defaultName = 'test:mv';

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $process = new Process(['mv', '/tmp/test/*', '/tmp/1']);
        $process->start();

        foreach ($process as $type => $data) {
            if ($process::OUT === $type) {
                dump("Read from stdout: ".$data);
            } else { // $process::ERR === $type
                dump("Read from stderr: ".$data);
            }
        }
        return 0;
    }

}
