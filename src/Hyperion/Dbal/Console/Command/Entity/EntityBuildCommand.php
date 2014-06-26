<?php
namespace Hyperion\Dbal\Console\Command\Entity;

use Guzzle\Inflection\Inflector;
use Hyperion\Dbal\Console\Command\DbalCommand;
use Hyperion\Dbal\DataManager;
use Hyperion\Dbal\Driver\ApiDataDriver;
use Hyperion\Dbal\Entity\HyperionEntity;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Yaml\Yaml;

class EntityBuildCommand extends DbalCommand
{

    protected function configure()
    {
        $this->setName('entity:build')->setDescription('Build entities from a YAML file')
            ->addArgument('data', InputArgument::REQUIRED, 'Path to YAML config');
    }


    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $fn = $input->getArgument('data');
        $dm = new DataManager(new ApiDataDriver());

        if (!$fn) {
            $output->writeln("<error>YAML configuration file (--data) required</error>");
            return;
        } elseif (!is_readable($fn)) {
            $output->writeln("<error>Unable ot read config file</error>");
            return;
        }

        $entities = Yaml::parse($fn);

        $ids = [];
        foreach ($entities as $name => $data)
        {
            $output->write("Building <comment>".$name."</comment>.. ");

            if (!isset($data['class'])) {
                $output->writeln("<error>missing class name [class]</error>");
            }
            if (!isset($data['fields'])) {
                $output->writeln("<error>missing field data [fields]</error>");
            }

            $class = 'Hyperion\Dbal\Entity\\'.$data['class'];

            $r = new \ReflectionClass($class);
            /** @var HyperionEntity $entity */
            $entity = $r->newInstance();

            foreach ($data['fields'] as $field_name => $value) {
                // Name of the setter function we need
                $setter = 'set'.Inflector::getDefault()->camel($field_name);
                $method = $r->getMethod($setter);

                // Check to see what object type to send to the setter
                $arg = $method->getParameters()[0]->getClass();

                if ($arg && $arg->isSubclassOf('Eloquent\Enumeration\AbstractEnumeration')) {
                    // Need to send an AbstractEnumeration
                    $value = call_user_func($arg->getName().'::memberByKey', $value);
                } elseif (is_string($value) && ($value{0} == '!')) {
                    // Pull value from a file
                    $value = file_get_contents(substr($value, 1));
                } elseif (is_string($value) && ($value{0} == '@')) {
                    // Need to send a reference to a previously created entity
                    $prev_entity = substr($value, 1);
                    if (!isset($ids[$prev_entity])) {
                        $output->writeln("<error>related entity [".$prev_entity."] has not been created</error>");
                        continue;
                    }
                    $value = $ids[$prev_entity];
                }

                $entity->$setter($value);
            }

            $dm->create($entity);
            $output->writeln("created new <info>".$data['class']."</info> with ID <info>".$entity->getId()."</info>");
            $ids[$name] = $entity->getId();
        }

    }


} 