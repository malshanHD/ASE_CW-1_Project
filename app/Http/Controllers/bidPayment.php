<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\bidPay;

class bidPayment extends Controller
{

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
        
        return view('buyerprofile');
    }

    public function paymentProcess(Request $request){
        
        mkdir('test_folder');

            
        // $merchant_id         = $_POST['merchant_id'];
        // $order_id             = $_POST['order_id'];
        // $payhere_amount     = $_POST['payhere_amount'];
        // $payhere_currency    = $_POST['payhere_currency'];
        // $status_code         = $_POST['status_code'];
        // $md5sig                = $_POST['md5sig'];
        

        // $merchant_secret = '8bNjn5CuZdP4Es3PS6Wh4X4TqDs0x9FiN4eVZTOeot7b'; // Replace with your Merchant Secret (Can be found on your PayHere account's Settings page)

        // $local_md5sig = strtoupper (md5 ( $merchant_id . $order_id . $payhere_amount . $payhere_currency . $status_code . strtoupper(md5($merchant_secret)) ) );

        // if (($local_md5sig === $md5sig) AND ($status_code == 2) ){
            
        //     $category=new bidPay;

        //     $category->itemID=1;
        //     $category->buyerID=2;
        //     $category->bidAmount=1000;
        //     $category->save();
        // }

    }
}
