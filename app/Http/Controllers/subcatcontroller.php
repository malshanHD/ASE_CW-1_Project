<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\subcategory;
use App\Models\seller_info;
use DB;
use Auth;

class subcatcontroller extends Controller
{
    public function subsavedata(Request $request){
        $Subcategory=new subcategory;
        
        // validation
        $this->validate($request,[
            'maincategory'=>'required|max:180|min:2',
            'subcategorytype'=>'required|max:180|min:2',
        ]);
      
     
        $Subcategory->subcategoryName=$request->subcategorytype;
        $Subcategory->id=$request->maincategory;
        $Subcategory->save();
        return redirect()->back()->with('message', 'Item sub category added Successfully!');
    }

    public function getCountries()
    {
        $categoryType = DB::table('maincategories')->pluck("categoryName","id");
        $count2 = DB::table('items')->count();

        //$SellerInfo=DB::table('seller_infos')->where('username',$name)->first();
       

        return view('itemAdd',compact('categoryType','count2'));
    }

    public function getStates($id) 
    {        
            $states = DB::table("subcategories")->where("id",$id)->pluck("subcategoryName","subcat_id");
            // dd(json_encode($states));
            return json_encode($states);
    }
}
