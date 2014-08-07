<?php
namespace Hyperion\Dbal\Console\Command\Entity;

use Hyperion\Dbal\Console\Command\DbalCommand;
use Hyperion\Dbal\Entity\HyperionEntity;
use Hyperion\Dbal\Enum\Entity;
use Hyperion\Dbal\Exception\NotFoundException;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class EntityListCommand extends DbalCommand
{

    protected function configure()
    {
        $this->setName('entity:list')->setDescription('List all entities')
            ->addArgument('entity', InputArgument::REQUIRED)
            ->addOption('full', 'f', InputOption::VALUE_NONE);
    }


    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $entity_name = $input->getArgument('entity');
        $entity      = Entity::memberByKey(strtoupper($entity_name));

        if (!$entity) {
            $output->writeln("<error>Unknown entity: ".$entity_name."</error>");
            return;
        }

        $output->writeln("Entity listing <comment>".$entity->key()."</comment>");

        $dm = $this->getDataManager();

        try {
            $objs = $dm->retrieveAll($entity);
        } catch (NotFoundException $e) {
            $output->writeln("<error>Not found</error>");
            return;
        }

        $max_len = 0;

        /** @var $obj HyperionEntity */
        foreach ($objs as $obj) {
            $max_len = max($max_len, strlen($obj->getId()));
        }

        foreach ($objs as $obj) {
            if ($input->getOption('full')) {
                $output->writeln("");
                $output->writeln("Entity <comment>".$entity->key()."</comment>:<comment>".$obj->getId()."</comment>");
                $this->dumpObject($obj, $output);
            } else {
                $output->writeln(
                    "  ".str_pad($obj->getId().':', $max_len + 3, ' ', STR_PAD_RIGHT).'<info>'.$obj.'</info>'
                );
            }
        }

    }

} 