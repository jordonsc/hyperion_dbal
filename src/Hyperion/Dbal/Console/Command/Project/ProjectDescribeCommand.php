<?php
namespace Hyperion\Dbal\Console\Command\Project;

use Hyperion\Dbal\Collection\CriteriaCollection;
use Hyperion\Dbal\Console\Command\DbalCommand;
use Hyperion\Dbal\Entity\Project;
use Hyperion\Dbal\Enum\Entity;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class ProjectDescribeCommand extends DbalCommand
{

    protected function configure()
    {
        $this->setName('project:describe')->setDescription('Show all project details and environments')
            ->addArgument('project', InputArgument::REQUIRED, 'Project ID');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $dm = $this->getDataManager();
        $project_id = (int)$input->getArgument('project');

        /** @var Project $project */
        $project = $dm->retrieve(Entity::PROJECT(), $project_id);

        if (!$project) {
            $output->writeln("Invalid project");
            return;
        }

        $output->writeln("<info>Project Details</info>");
        $this->dumpObject($project, $output);
        $output->writeln("");

        $c = new CriteriaCollection();
        $c->add('project', $project_id);
        $r = $dm->search(Entity::ENVIRONMENT(), $c);

        foreach ($r as $entity) {
            $output->writeln("<info>Environment</info>");
            $this->dumpObject($entity, $output);
            $output->writeln("");
        }



    }


}