<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class LawyerMenuServiceProvider extends ServiceProvider
{
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
        $lawyerVerticalMenuJson = file_get_contents(base_path('resources/menu/lawyerVerticalMenu.json'));
        // $verticalMenuJson = file_get_contents(base_path('resources/menu/sidebar.json'));
        $lawyerVerticalMenuData = json_decode($lawyerVerticalMenuJson);

        // Share all menuData to all the views
        \View::share('lawyerMenuData', [$lawyerVerticalMenuData]);
    }
}
