<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\buyerUser;
use App\Models\User;


class BuyerSignUpController extends Controller
{
    public function saveBuyerInfo(Request $request)
    {
        $BuyerData=new buyerUser;

        $ulevel=2;
        $passusername=$request->usernames;
        $passemail=$request->email;
        
        if (User::where('name', $request->usernames)->exists()) {
            //email exists in user table
            return redirect()->back()->with('message', 'This username was already taken!');

         }

        $this->validate($request,[
            
            'usernames'=>'required|max:10',
            'email'=>'required|max:180|min:2',
            'Lname'=>'required|max:180|min:2',
            'gender'=>'required',
            'dob'=>'required',
            'contact'=>'required|max:180|min:2',
            'countries'=>'required',
            'stAdd01'=>'required|max:180|min:2',
            'stAdd02'=>'required|max:180|min:2',
            'city'=>'required|max:180|min:2',
            'state'=>'required|max:180|min:2',
            'zipcode'=>'required|max:180|min:2',
            

        ]);


        $BuyerImage=time().'-'.$request->fname.'.'.$request->picture->extension();

        $request->picture->move(public_path('buyer_images'),$BuyerImage);

        $BuyerData->username= $request->usernames;
        $BuyerData->email= $request->email;
        $BuyerData->firstname= $request->fname;
        $BuyerData->lastname= $request->Lname;
        $BuyerData->gender= $request->gender;
        $BuyerData->dob= $request->dob;
        $BuyerData->phnNumber= $request->contact;
        $BuyerData->country= $request->countries;
        $BuyerData->streetadd01= $request->stAdd01;
        $BuyerData->streetadd02= $request->stAdd02;
        $BuyerData->city= $request->city;
        $BuyerData->province= $request->state;
        $BuyerData->zipcode= $request->zipcode;
        $BuyerData->profilePicture= $BuyerImage;
        $BuyerData->save();
        
        return view('auth.register', compact('ulevel', 'passusername','passemail'));
    }
}
