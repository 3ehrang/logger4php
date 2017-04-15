<?php

return [

    /*
    |--------------------------------------------------------------------------
    | name
    |--------------------------------------------------------------------------
    |
    | Looger writting name
    |
    */

    'name' => env('LOGGER4PHP_NAME', 'logger4PHP'),

    /*
    |--------------------------------------------------------------------------
    | Path
    |--------------------------------------------------------------------------
    |
    | Here you may provide the path address of the file used for writting logs
    |
    */

    'path' => env('LOGGER4PHP_PATH', storage_path('logs/logger4PHP.log')),
        
    /*
     |--------------------------------------------------------------------------
     | bind
     |--------------------------------------------------------------------------
     |
     | if set true only certain message may write to log
     |
     */
    
    'bind' => env('LOGGER4PHP_BIND', true),
        
    /*
     |--------------------------------------------------------------------------
     | formatter
     |--------------------------------------------------------------------------
     |
     | if set true user default formatter 
     |
     */
    
    'formatter' => env('LOGGER4PHP_FORMATTER', true),

];