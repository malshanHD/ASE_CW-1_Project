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

                      //$view->with('items', \App\Models\wishlist::where('username', Auth::user()->name )->get());

                    $view->with('items', \App\Models\wishlist::select('wishlists.id','items.seller','items.itemName','items.itemCode','items.created_at')
                    ->join('items','items.itemCode','=','wishlists.itemCode')
                    ->orderBy('wishlists.id','DESC')
                    ->where('wishlists.username', Auth::user()->name )->get());

                    //order track
                    $view->with('orderTrackNoti', \App\Models\delivery::where([['buyerName', Auth::user()->name],['packaging',1],['arrivedToCurrier',0]])->get()->count());
                    $view->with('orderTrackDetails', \App\Models\delivery::where([['buyerName', Auth::user()->name],['packaging',1],['arrivedToCurrier',0]])->get());
                    
                    //my Collection
                   
                    $view->with('mycol', \App\Models\delivery::where([['buyerName', Auth::user()->name],['packaging',1],['arrivedToCurrier',1]])->get());
                    

                }
            );

            view()->composer(
                'include.sellerNavbar', 
                function ($view1) {
                    $view1->with('ordersCount', \App\Models\paiddetails::where([['sellusername', Auth::user()->name],['deleveryStatus',0]] )->get()->count());
                    //$view->with('items', \App\Models\wishlist::where('username', Auth::user()->name )->get());

                    $view1->with('orderDetails', \App\Models\paiddetails::select('paiddetails.id','paiddetails.itemCode','paiddetails.value','paiddetails.buyusername','paiddetails.created_at')
                    ->orderBy('paiddetails.id','DESC')
                    ->where([['sellusername', Auth::user()->name],['deleveryStatus',0]] )->get());

                    $view1->with('inspectnotify', \App\Models\phyinspection::where([['seller', Auth::user()->name],['confirm',0]] )->get()->count());

                    $view1->with('inspectData', \App\Models\phyinspection::select('phyinspections.id','phyinspections.itemCode','phyinspections.Time','phyinspections.Date','phyinspections.Email','phyinspections.seller','phyinspections.created_at')
                    ->orderBy('phyinspections.id','DESC')
                    ->where([['seller', Auth::user()->name],['confirm',0]] )->get());

                }
            );
        
      
    }
}
