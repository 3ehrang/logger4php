<?php

namespace I3ehrang\Logger4php;

use Logger;
use I3ehrang\Logger4php\Output\JsonOutput;
 
/**
 * This Class create log file using log4php lib
 *
 * @author Behrang
 *
 */
class Logger4php
{
    /**
     * 
     * @var OutputInterface
     */
    protected $output;

    protected $logger;
    
    /**
     * 
     * @var array pair of key and value
     */
    protected $params = [];
    
    
    public function __construct()
    {
        
        
        // load user config if not exist load default config
        $configurator = new \LoggerConfiguratorDefault();
        if (file_exists(config_path() . PATH_SEPARATOR . 'Log4phpConfig.xml')) {
            $config = $configurator->parse(config_path() . PATH_SEPARATOR . 'Log4phpConfig.xml');
        } else {
            $config = $configurator->parse(__DIR__ . '/Log4phpConfig.xml');
        }
        
        // add file output path to config
        $file = env('LOGGER4PHP_FILE');
        $config['appenders']['default']['params']['file'] = $file;
    
        Logger::configure($config);
    
        // add logger name
        $name = env('LOGGER4PHP_NAME');
        
        // set default output
        $this->setOutput(new JsonOutput());
        
        $this->logger = Logger::getLogger($name);
        
    }
    
    
    public function setOutput(OutputInterface $outputType)
    {
        $this->output = $outputType;
    }
    
    public function loadOutput($params)
    {
        return $this->output->load($params);
    }
    
    public function setParams(array $params)
    {
        $this->params = $params;
        return $this;
    }
    
    
    /**
     * Log info
     *
     * @param string $msg
     * @param array|null $params
     */
    public function info($msgKey = null)
    {
        $output = $this->output->load($this->params);
        // write log info
        $this->logger->info( ' ' .$output);

        // empty params
        unset($this->params);
    }
    
    
}
