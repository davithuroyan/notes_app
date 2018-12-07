<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->when('App\Http\Controllers\NoteController')
            ->needs('App\Services\ServiceInterface')
            ->give('App\Services\NoteService');

        $this->app->when('App\Services\NoteService')
            ->needs('App\Repositories\RepositoryInterface')
            ->give('App\Repositories\NotesRepository');

        $this->app->when('App\Http\Controllers\UserController')
            ->needs('App\Services\ServiceInterface')
            ->give('App\Services\UserService');

        $this->app->when('App\Services\UserService')
            ->needs('App\Repositories\RepositoryInterface')
            ->give('App\Repositories\UserRepository');


    }
}
