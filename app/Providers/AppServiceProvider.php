<?php

namespace App\Providers;
use App\Setting;
use App\Category;
use App\Post;
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
        /*THis is based on the navigation*/
         view()->composer('pages.includes.navigation',function($view){
            $view->with('setting',Setting::first());
        });

        view()->composer('pages.includes.navigation',function($view){
        $view->with('categories',Category::take(4)->get());
    });
        view()->composer('pages.includes.side',function($view){
        $view->with('categories_side',Category::orderBy('created_at','asc')->skip(4)->take(5)->get());
    });

        view()->composer('pages.includes.side',function($view){
            $view->with('posts_side',Post::latest()->paginate(5));
        });

        view()->composer('pages.includes.side',function($view){
            $view->with('most_read_posts',Post::orderBy('hit','desc')->take(4)->get());
        });

        /* end based on the navigation*/

        /*this is based on the footer*/

         view()->composer('pages.includes.footer',function($view){
    $view->with('setfooter',Setting::first());
});
          /* end /this is based on the footer*/





        
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
