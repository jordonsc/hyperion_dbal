<?php
namespace Hyperion\Dbal\Console;

use Bravo3\Properties\Conf;
use Hyperion\Dbal\Console\Command\Entity\EntityBuildCommand;
use Hyperion\Dbal\Console\Command\Entity\EntityListCommand;
use Hyperion\Dbal\Console\Command\Entity\EntityRetrieveCommand;
use Hyperion\Dbal\Console\Command\Project\ProjectBakeCommand;
use Hyperion\Dbal\Console\Command\Project\ProjectBuildCommand;
use Hyperion\Dbal\Console\Command\Project\ProjectDescribeCommand;
use Symfony\Component\Console\Application;
use Symfony\Component\Console\Input\InputOption;

class DbalApplication extends Application
{
    const APP_NAME    = 'Hyperion DBAL';
    const APP_VERSION = '1.0.0';

    /**
     * @var string
     */
    protected $env;

    /**
     * @var bool
     */
    protected $debug;

    /**
     * @var string
     */
    protected $conf_dir;


    function __construct($env, $debug, $conf_dir)
    {
        $this->env      = $env;
        $this->debug    = $debug;
        $this->conf_dir = $conf_dir;

        Conf::init($conf_dir, 'console-'.$env.'.yml');

        parent::__construct(self::APP_NAME, self::APP_VERSION);

        $this->getDefinition()->addOption(
            new InputOption('--conf', '-c', InputOption::VALUE_REQUIRED, 'Path to the configuration file', $conf_dir)
        );

        $this->getDefinition()->addOption(
            new InputOption('--env', '-e', InputOption::VALUE_REQUIRED, 'The environment name.', $env)
        );

        $this->getDefinition()->addOption(
            new InputOption('--no-debug', null, InputOption::VALUE_NONE, 'Switches off debug mode.')
        );


        // Entity commands
        //$this->add(new EntityCreateCommand());
        $this->add(new EntityRetrieveCommand());
        $this->add(new EntityListCommand());
        $this->add(new EntityBuildCommand());

        // Stack action commands
        $this->add(new ProjectDescribeCommand());
        $this->add(new ProjectBakeCommand());
        $this->add(new ProjectBuildCommand());

    }

    /**
     * Get application environment name
     *
     * @return string
     */
    public function getEnvironment()
    {
        return $this->env;
    }

    /**
     * Get debug mode
     *
     * @return boolean
     */
    public function getDebugMode()
    {
        return $this->debug;
    }

    /**
     * Get a console configuration value
     *
     * @param string $key
     * @param mixed  $default
     * @return mixed
     */
    public function getParameter($key, $default = null)
    {
        return Conf::get($key, $default);
    }


}