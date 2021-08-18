<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\seller_info;
use App\Models\User;
use App\Models\sellerRate;
use App\Models\sellerReport;
use DB;


class sellerSignUpController extends Controller
{
    public function saveSellerInfo(Request $request)
    {
        $sellerData=new seller_info;

        $ulevel=1;
        $passusername=$request->usernames;
        $passemail=$request->email;
        
        if (User::where('name', $request->usernames)->exists()) {
            //email exists in user table
            return redirect()->back()->with('message', 'This username was already taken!');

         }

        $this->validate($request,[
            'usernames'=>'required|max:10',
            'companyname'=>'required|max:180|min:2',
            'email'=>'required|max:180|min:2',
            'contact'=>'required|max:180|min:2',
            'countries'=>'required',
            'stAdd01'=>'required|max:180|min:2',
            'stAdd02'=>'required|max:180|min:2',
            'description'=>'required|max:999|min:2',

        ]);


        $sellerImage=time().'-'.$request->companyname.'.'.$request->picture->extension();

        $request->picture->move(public_path('seller_images'),$sellerImage);

        $sellerData->username= $request->usernames;
        $sellerData->comapnyname= $request->companyname;
        $sellerData->email= $request->email;
        $sellerData->contactno= $request->contact;
        $sellerData->country= $request->countries;
        $sellerData->streetadd01= $request->stAdd01;
        $sellerData->streetadd02= $request->stAdd02;
        $sellerData->city= $request->city;
        $sellerData->state= $request->state;
        $sellerData->zipcode= $request->zipcode;
        $sellerData->profilePicture= $sellerImage;
        $sellerData->description=$request->description;
        $sellerData->save();

        return view('auth.register', compact('ulevel', 'passusername','passemail'));
    }

    public function sallerProfile($seller){
        $rate=new sellerRate;
        $avgStar = sellerRate::where('seller',$seller)->avg('value');
        
        
        $info=seller_info::where('username',$seller)->get();
        
        return view('sellerprofile', compact('avgStar', 'info'));

    }
    
    public function sellerRatingStrong($name,$username){
        $rate=new sellerRate;

        if (sellerRate::where('username', $name)->exists()) {
            //email exists in user table
            return redirect()->back();
        }

        $rate->value=1;
        $rate->seller= $username;
        $rate->username= $name;
        $rate->save();
        return redirect()->back();
    }

    public function sellerRatingGood($name,$username){
        $rate=new sellerRate;

        if (sellerRate::where('username', $name)->exists()) {
            //email exists in user table
            return redirect()->back();
        }

        $rate->value=2;
        $rate->seller= $username;
        $rate->username= $name;
        $rate->save();
        return redirect()->back();
    }

    public function sellerRatingNormal($name,$username){
        $rate=new sellerRate;

        if (sellerRate::where('username', $name)->exists()) {
            //email exists in user table
            return redirect()->back();
        }

        $rate->value=3;
        $rate->seller= $username;
        $rate->username= $name;
        $rate->save();
        return redirect()->back();
    }
    public function sellerRatingPoor($name,$username){
        $rate=new sellerRate;

        if (sellerRate::where('username', $name)->exists()) {
            //email exists in user table
            return redirect()->back();
        }

        $rate->value=4;
        $rate->seller= $username;
        $rate->username= $name;
        $rate->save();
        return redirect()->back();
    }
    public function sellerRatingStrongPoor($name,$username){
        $rate=new sellerRate;

        if (sellerRate::where('username', $name)->exists()) {
            //email exists in user table
            return redirect()->back();
        }

        $rate->value=5;
        $rate->seller= $username;
        $rate->username= $name;
        $rate->save();
        return redirect()->back();
    }

    public function reportSellerView($seller){
        return view('reportSeller', compact('seller'));
    }

    public function sellerReport(Request $request){
        $sellerReport=new sellerReport;

        $sellerReport->reportuser=$request->authuser;
        $sellerReport->sellername= $request->seller;
        $sellerReport->reason= $request->reason;
        $sellerReport->additional= $request->additional;
        $sellerReport->save();

        return redirect()->back()->with('message', 'Reported Successfully');

    }
}
