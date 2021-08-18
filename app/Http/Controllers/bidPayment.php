<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\bidPay;

class bidPayment extends Controller
{
    public function bidSave(Request $request){

        dd($request);

        $bidTble=new bidPay;


        $bidTble->categoryName=$request->categorytype;
        $bidTble->categoryName=$request->categorytype;
        $bidTble->categoryName=$request->categorytype;
        $bidTble->categoryName=$request->categorytype;
        $bidTble->save();
        return redirect()->back()->with('message', 'Item Added Successfully!');
    }
}
