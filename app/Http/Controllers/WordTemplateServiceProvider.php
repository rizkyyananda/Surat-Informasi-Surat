<?php

namespace App\Http\Controllers;

use Illuminate\Support\ServiceProvider as BaseServiceProvider;;

class WordTemplateServiceProvider extends BaseServiceProvider
{
    public function register()
    {
        $this->app->bind('word-template', function() {
            return new WordTemplate;
        });
    }

    public function boot()
    {
        //
    }
}
