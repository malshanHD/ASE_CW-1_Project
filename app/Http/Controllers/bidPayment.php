<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\bidPay;

class bidPayment extends Controller
{
    public function paymentProcess(Request $request){
            
       

    $merchant_secret = '8bNjn5CuZdP4Es3PS6Wh4X4TqDs0x9FiN4eVZTOeot7b'; // Replace with your Merchant Secret (Can be found on your PayHere account's Settings page)

    $local_md5sig = strtoupper (md5 ( $merchant_id . $order_id . $payhere_amount . $payhere_currency . $status_code . strtoupper(md5($merchant_secret)) ) );

    if (($local_md5sig === $md5sig) AND ($status_code == 2) ){
        
        $category=new bidPay;

        $category->itemID=1;
        $category->buyerID=2;
        $category->bidAmount=1000;
        $category->save();
    }

    }
}
