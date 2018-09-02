<?php

namespace AppBundle\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class testCommand extends Command
{
    /**
     * {@inheritdoc}
     */
    protected function configure()
    {
        $this
            ->setName('walter:test')
            ->setDescription('Dit is mijn test command voor de CLI')
            ->setHelp('Dit krijg je als je php bin/console walter:test typt op de cli met --help')
        ;

        $this->addArgument('arg1', InputArgument::OPTIONAL,'First argument');
    }

    /**
     * {@inheritdoc}
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {

        //$container = $this->getC
        //$cityservice = $this->get('app.RandomCity');

        //$cityservice->returnRandomCityname();

        $output->writeln([
            'Test command via cli',
            '============',
            '',
        ]);

    }
}
