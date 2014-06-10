<?php
namespace Hyperion\Dbal\Console\Command;

use Eloquent\Enumeration\AbstractEnumeration;
use Guzzle\Inflection\Inflector;
use Hyperion\Dbal\Console\DbalApplication;
use Hyperion\Dbal\DataManager;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Formatter\OutputFormatterStyle;
use Symfony\Component\Console\Output\OutputInterface;

class DbalCommand extends Command
{
    const DBAL_APP_ERR = "Application is not a DbalApplication";

    /**
     * Get the application environment
     *
     * @return string
     * @throws \Exception Throws an exception if not using a DbalApplication
     */
    protected function getEnvironment()
    {
        $app = $this->getApplication();

        if ($app instanceof DbalApplication) {
            return $app->getEnvironment();
        } else {
            throw new \Exception(self::DBAL_APP_ERR);
        }
    }

    /**
     * Get the debug mode
     *
     * @return bool
     * @throws \Exception Throws an exception if not using a DbalApplication
     */
    protected function getDebugMode()
    {
        $app = $this->getApplication();

        if ($app instanceof DbalApplication) {
            return $app->getDebugMode();
        } else {
            throw new \Exception(self::DBAL_APP_ERR);
        }
    }

    /**
     * Get a config parameter
     *
     * @param string $key
     * @param mixed  $default
     * @return string
     * @throws \Exception Throws an exception if not using a DbalApplication
     */
    protected function getParameter($key, $default = null)
    {
        $app = $this->getApplication();

        if ($app instanceof DbalApplication) {
            return $app->getParameter($key, $default);
        } else {
            throw new \Exception(self::DBAL_APP_ERR);
        }
    }

    /**
     * Create a new DataManager
     *
     * @return DataManager
     */
    protected function getDataManager()
    {
        $class = new \ReflectionClass($this->getParameter('data_manager.driver'));
        $driver = $class->newInstanceArgs($this->getParameter('data_manager.arguments', []));

        return new DataManager($driver);
    }

    protected function dumpObject($obj, OutputInterface $output) {
        $output->getFormatter()->setStyle('string', new OutputFormatterStyle('red'));
        $output->getFormatter()->setStyle('number', new OutputFormatterStyle('yellow'));
        $output->getFormatter()->setStyle('bool', new OutputFormatterStyle('cyan'));
        $output->getFormatter()->setStyle('enum', new OutputFormatterStyle('green'));
        $output->getFormatter()->setStyle('null', new OutputFormatterStyle('blue'));

        $r = new \ReflectionClass($obj);
        $max_len = 0;
        $props   = $r->getProperties();

        foreach ($props as $prop) {
            $max_len = max($max_len, strlen($prop->getName()));
        }

        foreach ($props as $prop) {

            $val = '-';
            $getter = 'get'.Inflector::getDefault()->camel($prop->getName());

            if ($r->hasMethod($getter)) {
                $val = $this->printValue($obj->$getter());
            }

            $output->writeln('  '.str_pad(strtoupper($prop->getName().':  '), $max_len + 3, ' ', STR_PAD_RIGHT).$val);
        }
    }

    private function printValue($val) {
        if (is_string($val)) {
            return '<string>'.$val.'</string>';
        } elseif (is_numeric($val)) {
            return '<number>'.number_format($val).'</number>';
        } elseif (is_bool($val)) {
            return '<bool>'.($val ? 'true' : 'false').'</bool>';
        } elseif (is_array($val)) {
            $out = '[';
            foreach ($val as $sub_val) {
                if (strlen($out) > 1) {
                    $out .= ', ';
                }
                $out .= $this->printValue($sub_val);
            }
            return $out.']';
        } elseif (is_null($val)) {
            return '<null>null</null>';
        } elseif ($val instanceof AbstractEnumeration) {
            return '<enum>'.$val->key().'</enum>';
        } else {
            return '<error>unknown type: '.get_class($val).'</error>';
        }
    }


}