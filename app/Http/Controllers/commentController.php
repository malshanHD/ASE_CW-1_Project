<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\comment;


class commentController extends Controller
{
    public function cmntSave(Request $request){
        $cmt=new comment;

        $this->validate($request,[
            'quize'=>'required|max:180|min:2',
        ]);

        $cmt->itemCode=$request->itemcode;
        $cmt->itemCode=$request->itemcode;
        $cmt->email=$request->email;
        $cmt->quize=$request->quize;
        $cmt->save();
        return redirect()->back()->with('message', 'Item Added Successfully!');
    }
}
