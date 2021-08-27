<?php
// import control
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\bidPay;
use App\Models\item;
use App\Models\buyerUser;
use App\Models\seller_info;
use DB;
use Auth;

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
        $seller=$request->seller;

        return view('paymentView', compact('itemID', 'buyerNamme','bidAmount','bidDeposite','reason','itemNAme','seller'));

    }

    public function paymentDataSave(Request $request){
        $bidData=new bidPay;

        
        
        $bidData->itemID= $request->itemID;
        $bidData->buyerUsername= $request->buyerName;
        $bidData->bidAmount= $request->bidAmount;
        $bidData->deposite= $request->bidDeposite;
        $bidData->seller= $request->seller;
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

    public function bidwinnerview($itemCode){
        //$winner=bidPay::where('itemID',$itemCode)->orderBy('bidAmount', 'DESC')->take(1)->get();
        
        $sellerInfo = ((Auth::user()->name));
        $info = seller_info::where('username',$sellerInfo)->GET();

        $winner=DB::table('bid_pays')
        ->select('bid_pays.*','items.*')
        ->join('items','items.itemCode','=','bid_pays.itemID')
        ->orderBy('bidAmount', 'DESC')
        ->where('bid_pays.itemID',$itemCode)
        ->take(1)->get();
        return view('winnerView', compact('winner','info'));
    }

    public function customerNotify($bidID){
        $updateWinner = DB::table('bid_pays')->where('bidID', $bidID)->update([
            'winner' => 1,
            
        ]);
        return redirect()->back();
    }

}
