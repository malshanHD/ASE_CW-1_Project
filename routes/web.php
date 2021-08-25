<?php
// import control
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\maincatcontroller;
use App\Http\Controllers\subcatcontroller;
use App\Http\Controllers\itemcontroller;
use App\Http\Controllers\bidPayment;
use App\Http\Controllers\sellerSignUpController;
use App\Http\Controllers\BuyerSignUpController;
use App\Http\Controllers\adminController;
use Carbon\Carbon;
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
// Start Route to welcome page
Route::get('/', function () {
    $maincategory=App\Models\maincategory::all();

    $WomensFashion=App\Models\item::where('itemMainCat','100')->orderBy('itemCode','DESC')->whereDate('bidEnd', '>=', Carbon::now())->take(6)->get();
    $MensFashion=App\Models\item::where('itemMainCat','101')->orderBy('itemCode','DESC')->whereDate('bidEnd', '>=', Carbon::now())->take(6)->get();
    $Jewelleryitems=App\Models\item::where('itemMainCat','102')->orderBy('itemCode','DESC')->whereDate('bidEnd', '>=', Carbon::now())->take(6)->get();
    $Babyitems=App\Models\item::where('itemMainCat','103')->orderBy('itemCode','DESC')->whereDate('bidEnd', '>=', Carbon::now())->take(6)->get();
    $Furnitures=App\Models\item::where('itemMainCat','104')->orderBy('itemCode','DESC')->whereDate('bidEnd', '>=', Carbon::now())->take(6)->get();
    $Books=App\Models\item::where('itemMainCat','106')->orderBy('itemCode','DESC')->whereDate('bidEnd', '>=', Carbon::now())->take(6)->get();
    $Electronicitems=App\Models\item::where('itemMainCat','107')->orderBy('itemCode','DESC')->whereDate('bidEnd', '>=', Carbon::now())->take(6)->get();
    
    return view('welcome', compact('MensFashion', 'maincategory','WomensFashion','Jewelleryitems','Babyitems','Furnitures','Books','Electronicitems'));
});
// end Route to welcome page

//Start Route home page
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes(['verify' => true]);
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
//End Route home page

//Route item upload
Route::post('/itemUpload','itemcontroller@saveItem');


// start Route get mathods

Route::get('dropdownlist/getstates/{id}',[subcatcontroller::class, 'getStates']);



Route::get('/findSubCat',[subcatcontroller::class, 'subcatfind']);
// End Route get mathods

// start Route post mathods

Route::post('/categorySave',[maincatcontroller::class, 'savedata']);
Route::post('/subcategorySave',[subcatcontroller::class, 'subsavedata']);
Route::post('/itemUpload',[itemcontroller::class, 'saveItem']);
Route::post('/sellerInfoSave',[sellerSignUpController::class, 'saveSellerInfo']);
Route::post('/buyerSave',[BuyerSignUpController::class, 'saveBuyerInfo']);
Route::post('/newAdmin',[adminController::class, 'saveAdminInfo']);


// End Route post mathods



// Route category Items
Route::get('/CategoryItem',function(){
    return view('categoryitemsearch');
});

// Route Seller sign-up
Route::get('/SignUpseller',function(){
    return view('sellerSignUp');
});

//Route Buyer sign-up 
Route::get('/Buyersignup',function(){
    return view('SignUp');
});

//Route return Item
Route::get('/returnItem',function(){
    return view('ItemReturn');
});



//Route get sales dashboard

Route::middleware(['auth','seller'])->group(function (){
    Route::get('/Saledashboard',function(){
        return view('salesdashboard');
    });
   // route Items insert
    Route::get('ItemInsert',[subcatcontroller::class, 'getCountries']);
   
    // route Items Delete
    Route::get('ItemDelete',[itemcontroller::class, 'itemdelete']);

});

// Route Item View 
Route::middleware(['auth','buyer'])->group(function (){
    route::get('/BuyItem/{itemCode}/{seller}',[itemcontroller::class, 'itemView']);

// Route get Buyer Proflie 
    Route::get('/BuyerProfile/{name}',[BuyerSignUpController::class, 'buyerProfile']);
    
// Route post bid win Pay
    Route::post('/bidwinPay',[bidPayment::class, 'bidWinPay']);
    

 });
// Route Admin page
Route::middleware(['auth','admin'])->group(function (){

    Route::get('/adminReg',function(){
        $report=App\Models\sellerReport::where('action','0')->get()->count();
        
        return view('adminregistration', compact('report'));
    });
    // Rout get report data
    Route::get('/reportData',function(){
        $report=App\Models\sellerReport::where('action','0')->get()->count();
        $repdata=App\Models\sellerReport::where('action','0')->get();
        
        return view('reportdetails', compact('report','repdata'));
    });
// Route Category add page
    Route::get('/CategoryAdd',function(){
        $report=App\Models\sellerReport::where('action','0')->get()->count(); 
        $cat=App\Models\maincategory::all();
        return view('CategoryAdd', compact('report','cat'));
    });
// Route Change Advertiesment page
    Route::get('/ChangeAdvertiestment',function(){

        $report=App\Models\sellerReport::where('action','0')->get()->count();  
        return view('AdminAddChange', compact('report'));
    });
//Route get report seller 
    Route::get('/notereport/{id}',[sellerSignUpController::class, 'reportNote']);
//Route get report seller 
    Route::get('/SellerCheck/{sellername}',[sellerSignUpController::class, 'sallerProfileadminView']);
//Route get report seller 
    Route::get('/blcokUser/{username}',[sellerSignUpController::class, 'sallerBlock']);
   
    
});
//route get bid winner
route::get('/bidwinner/{itemCode}',[bidPayment::class, 'BidWinner']);
//Route get Seller proflie
Route::get('/sallerprofile/{seller}',[sellerSignUpController::class, 'sallerProfile']);
//route get report seller view
Route::get('/ReportSeller/{seller}',[sellerSignUpController::class, 'reportSellerView']);


//Route get Help page
Route::get('/Help',function(){
    return view('help');
});


// Route post payment
Route::post('/sucess',[bidPayment::class, 'paymentProcess']);


// Route post  seller Report

Route::POST('/sellerReported',[sellerSignUpController::class, 'sellerReport']);
//Route post Seller feedback
Route::POST('/sellerFeedback',[sellerSignUpController::class, 'sellerFeedbackSave']);

//Route post bid payment
Route::POST('/bidPayment',[bidPayment::class, 'paymentData']);
//Route post payment 
Route::post('/paymentSuccess',[bidPayment::class, 'paymentDataSave']);
//Route get payment
route::get('/payment', function(){
    return view('paymentView');
});




//Route get Seller Ratings
route::get('/rate/1/{name}/{username}',[sellerSignUpController::class, 'sellerRatingStrong']);
route::get('/rate/2/{name}/{username}',[sellerSignUpController::class, 'sellerRatingGood']);
route::get('/rate/3/{name}/{username}',[sellerSignUpController::class, 'sellerRatingNormal']);
route::get('/rate/4/{name}/{username}',[sellerSignUpController::class, 'sellerRatingPoor']);
route::get('/rate/5/{name}/{username}',[sellerSignUpController::class, 'sellerRatingStrongPoor']);

