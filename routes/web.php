<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\maincatcontroller;
use App\Http\Controllers\subcatcontroller;
use App\Http\Controllers\itemcontroller;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    $maincategory=App\Models\maincategory::all();

    $WomensFashion=App\Models\item::where('itemMainCat','100')->orderBy('id','DESC')->take(6)->get();
    $MensFashion=App\Models\item::where('itemMainCat','101')->orderBy('id','DESC')->take(6)->get();
    $Jewelleryitems=App\Models\item::where('itemMainCat','102')->orderBy('id','DESC')->take(6)->get();
    $Babyitems=App\Models\item::where('itemMainCat','103')->orderBy('id','DESC')->take(6)->get();
    $Furnitures=App\Models\item::where('itemMainCat','104')->orderBy('id','DESC')->take(6)->get();
    $Books=App\Models\item::where('itemMainCat','106')->orderBy('id','DESC')->take(6)->get();
    $Electronicitems=App\Models\item::where('itemMainCat','107')->orderBy('id','DESC')->take(6)->get();
    

    return view('welcome', compact('MensFashion', 'maincategory','WomensFashion','Jewelleryitems','Babyitems','Furnitures','Books','Electronicitems'));
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes(['verify' => true]);
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::post('/itemUpload','itemcontroller@saveItem');

Route::get('ItemInsert',[subcatcontroller::class, 'getCountries']);


Route::get('dropdownlist/getstates/{id}',[subcatcontroller::class, 'getStates']);



Route::get('/findSubCat',[subcatcontroller::class, 'subcatfind']);



Route::post('/categorySave',[maincatcontroller::class, 'savedata']);
Route::post('/subcategorySave',[subcatcontroller::class, 'subsavedata']);
Route::post('/itemUpload',[itemcontroller::class, 'saveItem']);



Route::get('/CategoryAdd',function(){
    $categoryType=App\Models\maincategory::all();
    return view('CategoryAdd')->with('cat',$categoryType);
});

Route::get('/CategoryItem',function(){
    return view('categoryitemsearch');
});

route::get('/BuyItem/{itemCode}',[itemcontroller::class, 'itemView']);

Route::get('/SignUpseller',function(){
    return view('sellerSignUp');
});


Route::get('/returnItem',function(){
    return view('ItemReturn');
});

Route::get('/ChangeAdvertiestment',function(){
    return view('AdminAddChange');
});

Route::get('/Saledashboard',function(){
    return view('salesdashboard');
});