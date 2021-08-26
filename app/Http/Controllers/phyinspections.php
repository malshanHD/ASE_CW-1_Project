<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\phyinspection;

class phyinspections extends Controller
{
    public function savedata(Request $request){

        $inspection= new phyinspection;
        $this->validate($request,[
            'phyinspection'=>'required|max:180|min:2',
        ]);

        $inspection->itemCode=$request->code;
        $inspection->Time=$request->time;
        $inspection->Date=$request->date;
        $inspection->Email=$request->email;
        $inspection->save();
        return redirect()->back()->with('message', 'Fix Date & Time Successfully!');
    }
    //
}
