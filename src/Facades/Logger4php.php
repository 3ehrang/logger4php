<?php

namespace I3ehrang\Logger4php\Facades;

use Illuminate\Support\Facades\Facade;

class Logger4php extends Facade {

    /**
    * Get the registered name of the component.
    *
    * @return string
    */
    protected static function getFacadeAccessor() { return 'Logger4php'; }

}