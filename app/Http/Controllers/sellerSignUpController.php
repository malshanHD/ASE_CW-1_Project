<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\seller_info;
use App\Models\User;
use App\Models\sellerRate;
use App\Models\sellerReport;
use App\Models\sellerFeedback;
use App\Models\item;
use Carbon\Carbon;
use DB;

use Auth;


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
        $feedbacks=sellerFeedback::where('seller',$seller)->get();

        $items=item::where('seller',$seller)->orderBy('itemCode','DESC')->whereDate('bidEnd', '>=', Carbon::now())->take(6)->get();
        
        $endBid=item::where('seller',$seller)->orderBy('itemCode','DESC')->whereDate('bidEnd', '<=', Carbon::now())->take(6)->get();
        
        return view('customerSellerProfile', compact('avgStar', 'info','feedbacks','items','endBid'));

    }
    
    public function sellerRatingStrong($name,$username){
        $rate=new sellerRate;

        if (sellerRate::where([['username', $name],['seller',$username]])->exists()) {
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

    public function reportNote($id){
        $update=sellerReport::find($id);
        $update->action=1;
        $update->save();
        return redirect()->back();
    }

    
    public function sallerProfileadminView($sellername){

        $report=sellerReport::where('action','0')->get()->count();

        $rate=new sellerRate;
        $avgStar = sellerRate::where('seller',$sellername)->avg('value');
        
        
        $info=seller_info::where('username',$sellername)->get();
        
        return view('sellerProfileAdminView', compact('avgStar', 'info','report'));
    }

    public function sallerBlock($username){
        //$update = seller_info::where('username',$username)->firstOrFail();

        $affected = DB::table('seller_infos')->where('username', $username)->update(['status' => 0]);

        // $update->status=0;
        // $update->save();
        return redirect()->back();
    }

    public function sellerFeedbackSave(Request $request){
        $sellerFeedback =  new sellerFeedback;
        $sellerFeedback->seller=$request->sellerName;
        $sellerFeedback->user=$request->user;
        $sellerFeedback->Feedback=$request->feedback;
        $sellerFeedback->save();
        return redirect()->back();
    }

    public function selProfile(){

        $sellerInfo = ((Auth::user()->name));
        $info = seller_info::where('username',$sellerInfo)->GET();

        $avgStar = sellerRate::where('seller',$sellerInfo)->avg('value');

        $feedbacks=sellerFeedback::where('seller',$sellerInfo)->get();

        $endBid=item::where('seller',$sellerInfo)->orderBy('itemCode','DESC')->whereDate('bidEnd', '<=', Carbon::now())->take(6)->get();

        return view('profileSeller', compact('info','endBid','avgStar','feedbacks'));
    }

    
}
