<?php
namespace Hyperion\Dbal\Console\Command\Project;

use Hyperion\Dbal\Console\Command\DbalCommand;
use Hyperion\Dbal\Exception\NotFoundException;
use Hyperion\Dbal\Exception\ParseException;
use Hyperion\Dbal\Utility\TagStringHelper;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class ProjectBuildCommand extends DbalCommand
{

    const TAG_HINT = 'Repository tag string in the format "core=feature/stuff extras=1.2.5"';

    protected function configure()
    {
        $this->setName('project:build')->setDescription('Bake a test environment')
            ->addArgument('environment', InputArgument::REQUIRED, 'Environment ID')
            ->addOption('name', 'b', InputOption::VALUE_REQUIRED, 'Name of the build')
            ->addOption('tags', 't', InputOption::VALUE_REQUIRED, self::TAG_HINT);
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $name = $input->getOption('name');
        $tags = $input->getOption('tags');

        if (!$tags && !$name) {
            $output->writeln("<error>You must specify a build name or a tag string</error>");
            return;
        }

        // Parse tags
        $tag_helper = new TagStringHelper();
        try {
            $tag_string = $tags ? $tag_helper->cleanTagString($tags) : '';
        } catch (ParseException $e) {
            $output->writeln('<error>'.$e->getMessage().'</error>');
            return;
        }

        if (!$name) {
            $name = $tag_helper->createBuildNameFromTags($tag_string);
        }

        $output->writeln("<comment>Build Name:</comment> <info>".$name."</info>");
        $output->writeln("<comment>Tag String:</comment> <info>".$tag_string."</info>");

        try {
            $report = $this->getStackManager()->build($input->getArgument('environment'), $name, $tag_string);
            $output->writeln("Build started, action: <comment>".$report->getAction()."</comment>");
        } catch (NotFoundException $e) {
            $output->writeln("<error>Invalid environment ID</error>");
        }

    }



}