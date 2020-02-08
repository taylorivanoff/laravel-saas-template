<?php

namespace Template\App\Providers;

use Illuminate\Support\ServiceProvider;
use Template\Domain\Users\Models\Role;
use Template\Domain\Users\Observers\RoleObserver;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //model observers
//        Category::observe(CategoryObserver::class);
//        Tag::observe(TagObserver::class);
        Role::observe(RoleObserver::class);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
