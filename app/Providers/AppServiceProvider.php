<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Auth;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
            view()->composer(
                'include.BuyerNavBar', 
                function ($view) {
                    $view->with('categories', \App\Models\wishlist::where('username', Auth::user()->name )->get()->count());
                    $view->with('items', \App\Models\wishlist::where('username', Auth::user()->name )->get());

                    $view->with('items', \App\Models\wishlist::select('wishlists.id','items.seller','items.itemName','items.itemCode','items.created_at')
                    ->join('items','items.itemCode','=','wishlists.itemCode')
                    ->orderBy('wishlists.id','DESC')
                    ->where('wishlists.username', Auth::user()->name )->get());
                }
            );
        
      
    }
}
