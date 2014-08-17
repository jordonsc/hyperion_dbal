<?php
namespace Hyperion\Dbal\Console\Command\Project;

use Hyperion\Dbal\Console\Command\DbalCommand;
use Hyperion\Dbal\Exception\NotFoundException;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class ProjectTeardownCommand extends DbalCommand
{

    protected function configure()
    {
        $this->setName('project:teardown')->setDescription('Tear-down a distribution')
            ->addArgument('distribution', InputArgument::REQUIRED, 'Distribution ID');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        try {
            $report = $this->getStackManager()->tearDown($input->getArgument('distribution'));
            $output->writeln("Teardown started, action: <comment>".$report->getAction()."</comment>");
        } catch (NotFoundException $e) {
            $output->writeln("<error>Invalid distribution ID</error>");
        }

    }

}
