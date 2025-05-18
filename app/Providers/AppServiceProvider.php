<?php

namespace App\Providers;

use App\Repositories\ClassScheduleRepository;
use App\Repositories\Interfaces\ClassScheduleRepositoryInterface;
use App\Services\ClassScheduleService;
use App\Services\Interfaces\ClassScheduleServiceInterface;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(ClassScheduleRepositoryInterface::class, ClassScheduleRepository::class);
        $this->app->bind(ClassScheduleServiceInterface::class, ClassScheduleService::class);
    }

    public function boot()
    {
        //
    }
}
