<?php
namespace I3ehrang\Logger4php;

use Illuminate\Support\ServiceProvider;
use Config;

class Logger4phpServiceProvider extends ServiceProvider {

    
    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
                __DIR__.'/config/logger4php.php' => config_path('logger4php.php'),
        ]);
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
	public function register()
	{
        /* $this->app->bind('Logger4php', function(){
	        return new Logger4php();
	    }); */
        $this->app->bind('Logger4php', function(){
            return new Logger4php();
        });
	}
   

}
