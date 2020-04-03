<?php

namespace App\Providers;

use App\Models\Admin\Menu;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        /*
        Pasar una variable a una vista, en este caso 
        la vista es aside.blade.php que esta en 
        views/theme/lte, le paso la vista como tal
        con $view, luego obtengo los menus (registros)
        de la tabla menu del modelo Menu, y guardo esos
        datos en la variable menusComposer.
        */

        View::composer("theme.lte.aside", function ($view) {
            $menus = Menu::getMenu(true);
            $view->with('menusComposer', $menus);
        });
        
        View::share('theme', 'lte');

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
