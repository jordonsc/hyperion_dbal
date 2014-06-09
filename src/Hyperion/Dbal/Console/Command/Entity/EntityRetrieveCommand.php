<?php
namespace Hyperion\Dbal\Console\Command\Entity;

use Hyperion\Dbal\Console\Command\DbalCommand;
use Hyperion\Dbal\Enum\Entity;
use Hyperion\Dbal\Exception\NotFoundException;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class EntityRetrieveCommand extends DbalCommand
{

    protected function configure()
    {
        $this->setName('entity:retrieve')->setDescription('Retrieve an entity')
            ->addArgument('entity', InputArgument::REQUIRED)
            ->addArgument('id', InputArgument::REQUIRED);
    }


    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $id          = $input->getArgument('id');
        $entity_name = $input->getArgument('entity');
        $entity      = Entity::memberByKey(strtoupper($entity_name));

        if (!$entity) {
            $output->writeln("<error>Unknown entity: ".$entity_name."</error>");
            return;
        }

        $output->writeln("Entity <comment>".$entity->key()."</comment>:<comment>".$id."</comment>");

        $dm = $this->getDataManager();

        try {
            $obj = $dm->retrieve($entity, $id);
        } catch (NotFoundException $e) {
            $output->writeln("<error>Not found</error>");
            return;
        }

        $this->dumpObject($obj, $output);

    }

} 