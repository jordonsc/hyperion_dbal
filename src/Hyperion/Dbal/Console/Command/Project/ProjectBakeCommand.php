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
        $dm = $this->getDataManager();
        $env_id = (int)$input->getArgument('environment');

        /** @var Environment $env */
        $env = $dm->retrieve(Entity::PROJECT(), $env_id);

        if (!$env) {
            $output->writeln("Invalid environment");
            return;
        }

        $this->getStackManager()->bake($env);

        $output->writeln("Baking started");

    }


}