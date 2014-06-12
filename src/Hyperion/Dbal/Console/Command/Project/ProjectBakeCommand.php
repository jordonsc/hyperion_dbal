<?php
namespace Hyperion\Dbal\Console\Command\Project;

use Hyperion\Dbal\Console\Command\DbalCommand;
use Hyperion\Dbal\Entity\Environment;
use Hyperion\Dbal\Enum\Entity;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class ProjectBakeCommand extends DbalCommand
{

    protected function configure()
    {
        $this->setName('project:bake')->setDescription('Bake a project template')
            ->addArgument('environment', InputArgument::REQUIRED, 'Environment ID');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $report = $this->getStackManager()->bake($input->getArgument('environment'));

        $output->writeln("Baking started, action: <comment>".$report->getAction()."</comment>");

    }


}