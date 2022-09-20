<?php

namespace App\Repositories\Coach;

use Illuminate\Support\ServiceProvider;

class CoachRepoServiceProvider extends ServiceProvider
{
    
    public function boot(){

    }

    public function register(){
        $this->app->bind('App\Repositories\Coach\CoachInterface','App\Repositories\Coach\CoachRepository');
    }
}