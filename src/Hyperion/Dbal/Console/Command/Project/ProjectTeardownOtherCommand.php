<?php
namespace Hyperion\Dbal\Console\Command\Project;

use Hyperion\Dbal\Console\Command\DbalCommand;
use Hyperion\Dbal\Exception\NotFoundException;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class ProjectTeardownOtherCommand extends DbalCommand
{

    protected function configure()
    {
        $this->setName('project:teardown:other')->setDescription(
            'Tear-down all other distributions with the same name and environment'
        )->addArgument('distribution', InputArgument::REQUIRED, 'Distribution ID');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        try {
            $report = $this->getStackManager()->tearDownOther($input->getArgument('distribution'));

            if (count($report->getActions())) {
                $output->writeln("Tearing down ".number_format(count($report->getActions()))." distributions:");
                foreach ($report->getActions() as $action_id) {
                    $output->writeln(" * Action #".$action_id);
                }
            } else {
                $output->writeln("Nothing to tear-down");
            }
        } catch (NotFoundException $e) {
            $output->writeln("<error>Invalid distribution ID</error>");
        }

    }

}
