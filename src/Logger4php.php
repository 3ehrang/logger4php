<?php

namespace I3ehrang\Logger4php;

use Logger;
use I3ehrang\Logger4php\Msgkey\MessageKey;
use PhpParser\Node\Stmt\If_;
 
/**
 * This Class create log file using log4php lib
 *
 * @author Behrang
 *
 */
class Logger4php
{
    static private $instance;
    
    // logger class
    private $_logger;
    
    /**
     * bind message with key flag
     * 
     * @var boolean
     */
    private $_bindMsg;
    
    private $_formatter;
    
    /**
     * 
     * @var array pair of key and message
     */
    protected $_params = null;
    
    static public function getInstance($outputPath, $name = null, $bindMsg = false, $formatter = false)
    {
        if (self::$instance === null) {
            self::$instance = new self($outputPath, $name, $bindMsg, $formatter);
        }
        return self::$instance;
    }
    
    /**
     * load config file
     */
    private function __construct($outputPath, $name, $bindMsg, $formatter)
    {
        // load default config
        $configurator = new \LoggerConfiguratorDefault();
        $config = $configurator->parse(__DIR__ . '/Log4phpConfig.xml');
    
        // add file path to config
        $file = $outputPath;
        $config['appenders']['default']['params']['file'] = $file;
    
        Logger::configure($config);
    
        if(is_null($name)) $name = 'Logger4PHP';
        $this->_logger = Logger::getLogger($name);
        
        $this->_bindMsg = $bindMsg;
        $this->_formatter = $formatter;
    }
    
/**
     * Log info
     *
     * @param string $msg
     * @param array|null $params
     */
    public function info($msgKey)
    {
        // get message by key
        $msgKey = $this->getMessage($msgKey);

        if ($this->_formatter) {
            $msgKey = $this->_formatter($msgKey);
        }

        // write log
        $this->_logger->info($msgKey);

        // empty params
        unset($this->_params);
    }
    
    /**
     * formatter class
     * @param unknown $input
     */
    protected function _formatter($input)
    {
        // create output
        $output = [];
        $output[] = '-[';
        $output[] = $input;
        $output[] =  ']';
        // add params
        if ($this->_params) {
            $output[] =  '-';
            foreach ($this->_params as $key => $value) {
                $logParams[] = $key . '=' . $value;
            }
            $logParams = implode(', ', $logParams);
            $output[] =  $logParams;
        }
        return implode($output);
    }

    /**
     * get message by key if bind is true else return key
     *
     * @param unknown $key
     */
    protected function getMessage($key)
    {
        $message = MessageKey::get($key);
        if ($this->_bindMsg && !$message) {
            throwException('Message Key Not Founded');
        }
        return $key;
    }

    /**
     * Set params
     *
     * @param array $params
     * @return \App\Lib\Log\Log4php
     */
    public function setParams(array $params)
    {
        unset($this->_params);
        foreach ($params as $key => $value) {
            $this->addParam($key, $value);
        }
        return $this;
    }

    /**
     * Add new param to params if value is null change it with -1
     *
     * @param unknown $key
     * @param unknown $value
     * @return \App\Lib\Log\Log4php
     */
    public function addParam($key, $value = null)
    {
        if (is_null($value) || empty($value)) {
            $value = -1;
        }
        $this->_params[$key] = $value;
        return $this;
    }

    /**
     ** Add array of params by key and value
     */
    public function addParams(array $params)
    {
        foreach ($params as $key => $value) {
            $this->addParam($key, $value);
        }
        return $this;
    }
}