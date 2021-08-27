<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\phyinspection;

class phyinspections extends Controller
{
    public function inspectSave(Request $request){

        $inspection= new phyinspection;
       

        $inspection->itemCode=$request->code;
        $inspection->Time=$request->time;
        $inspection->Date=$request->date;
        $inspection->Email=$request->email;
        $inspection->seller=$request->seller;
        $inspection->save();
        return redirect()->back()->with('message', 'Fix Date & Time Successfully!');
    }
    
    public function inspectHere($itemCode, $seller){
        $inspectItem = $itemCode;
        $sellerName = $seller;
        return view('physicalinspection',compact('inspectItem','sellerName'));
    }
}
