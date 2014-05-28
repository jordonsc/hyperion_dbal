<?php
namespace Hyperion\Dbal\Console\Command\Entity;

use Hyperion\Dbal\Console\Command\DbalCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class EntityCreateCommand extends DbalCommand
{

    protected function configure()
    {
        $this->setName('entity:create')->setDescription('Create an entity');
    }


    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $output->writeln("<comment>New Entity</comment>");




    }

} 