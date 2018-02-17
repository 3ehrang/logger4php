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

    'path' => env('LOGGER4PHP_FILE', storage_path('logs/logger4PHP.log')),

];