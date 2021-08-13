<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\maincategory;

class maincatcontroller extends Controller
{
    public function savedata(Request $request)
    {
        $category=new maincategory;

        $this->validate($request,[
            'categorytype'=>'required|max:180|min:2',
        ]);

        $category->categoryName=$request->categorytype;
        $category->save();
        return redirect()->back()->with('message', 'Item Added Successfully!');
    }
}
