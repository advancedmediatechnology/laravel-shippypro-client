<?php
namespace advancedmediatechnology\ShippyProConnector;

class ShippyproServiceProvider extends \Illuminate\Support\ServiceProvider{
    public function boot(){
        $this->publishes([
            __DIR__.'/config/shippypro.php' => config_path('shippypro.php'),
        ]);
    }
    public function register()
    {

    }
}
