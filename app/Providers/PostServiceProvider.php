<?php

namespace App\Providers;

use App\Services\Impl\PostServiceImpl;
use App\Services\PostService;
use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider;

class PostServiceProvider extends ServiceProvider implements DeferrableProvider
{
    public array $singletons = [
        PostService::class => PostServiceImpl::class
    ];

    public function provides()
    {
        return [
            PostService::class
        ];
    }
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
