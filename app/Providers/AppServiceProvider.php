<?php

namespace App\Providers;


use App\Repository\CompanyRepository;
use App\Repository\Contracts\CompanyRepositoryInterface;
use App\Repository\Contracts\EmployeeRepositoryInterface;
use App\Repository\EmployeeRepository;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(CompanyRepositoryInterface::class, CompanyRepository::class);
        $this->app->bind(EmployeeRepositoryInterface::class, EmployeeRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
