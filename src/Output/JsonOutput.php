<?php

namespace I3ehrang\Logger4php\Output;


use I3ehrang\Logger4php\OutputInterface;

/**
 * This Class create log file using log4php lib
 *
 * @author Behrang
 *
 */
class JsonOutput implements OutputInterface
{
   
    public function load($params)
    {
        return json_encode($params);
    }
    
}