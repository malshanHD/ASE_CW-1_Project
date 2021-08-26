<?php
// import control
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\bidPay;
use App\Models\item;
use App\Models\buyerUser;
use App\Models\seller_info;
use DB;

class bidPayment extends Controller
{
//Bid Deposite data save
    public function paymentData(Request $request){
        $itemID=$request->itemCode;
        $buyerNamme=$request->itemBuyer;
        $bidAmount=$request->bidding;
        $bidDeposite=$request->amount;
        $itemNAme=$request->items;
        $reason="Bid Deposite";

        return view('paymentView', compact('itemID', 'buyerNamme','bidAmount','bidDeposite','reason','itemNAme'));

    }

    public function paymentDataSave(Request $request){
        $bidData=new bidPay;

        

        $bidData->itemID= $request->itemID;
        $bidData->buyerUsername= $request->buyerName;
        $bidData->bidAmount= $request->bidAmount;
        $bidData->deposite= $request->bidDeposite;
        $bidData->save();

        return redirect('/');
        
    }

    public function paymentProcess($name){
       $affected = DB::table('seller_infos')->where('username', $name)->update(['registrationPayment' => 1]);
       return redirect('/Saledashboard');
    }

    public function BidWinner($itemCode){
        $datas=item::where('itemCode',$itemCode)->get();
        $winner=bidPay::where('itemID',$itemCode)->orderBy('bidAmount', 'DESC')->take(1)->get();

        return view('bidWinner', compact('datas', 'winner'));
    }

    public function bidWinPay(Request $request){
        $itemCode=$request->itemCode;
        $bidID=$request->bidID;
        $diposite=$request->deposite;
        $bidAmount=$request->totalPay;
        $bidderName=$request->bidderName;
        $sellerName =$request->sellerName;
        
        
        return view('itemPayment', compact('bidID','diposite','bidAmount','bidderName','sellerName','itemCode'));
    }
}
