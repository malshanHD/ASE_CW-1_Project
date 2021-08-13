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
    return view('welcome');
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