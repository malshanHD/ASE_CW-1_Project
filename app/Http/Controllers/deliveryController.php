<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\delivery;
use DB;
use Auth;
use Carbon\Carbon;

class deliveryController extends Controller
{
    public function deliveryProcess($id){
        $itemDetails=DB::table('paiddetails')
        ->select('paiddetails.id','items.itemCode','items.itemName','items.seller','items.mainImage','buyer_users.firstname','buyer_users.lastname','buyer_users.username','buyer_users.phnNumber','buyer_users.country','buyer_users.streetadd01','buyer_users.streetadd02','buyer_users.city','buyer_users.province','buyer_users.zipcode')
        ->join('items','items.itemCode','=','paiddetails.itemCode')
        ->join('buyer_users','buyer_users.username','=','paiddetails.buyusername')
        ->where('paiddetails.id',$id)
        ->get();

        $deliveryDetails=delivery::where('paymentID',$id)->get();

        return view('deliveryProcess',compact('itemDetails','deliveryDetails'));
        
    }

    public function shipped($id){
        $shippedTime = Carbon::now();

        $packaged = DB::table('deliveries')->where('paymentID', $id)->update([
            'shipped' => 1,
            'shippedTime' =>$shippedTime,
        ]);

        return redirect()->back();
    }

    public function arrived($id){

        $shippedTime = Carbon::now();

        $arrived = DB::table('deliveries')->where('paymentID', $id)->update([
            'arrivedToCurrier' => 1,
            'arrivedToCurrierTime' =>$shippedTime,
        ]);

        return redirect()->back();
    }

    public function packaged(Request $request){
      
        $packageDone=new delivery;
        $packageDone->paymentID=$request->paymentID;
        $packageDone->itemCode=$request->itemCode;
        $packageDone->buyerName=$request->buyerName;
        $packageDone->save();
        return redirect()->back()->with('message', 'Item Added Successfully!');
    }
}
