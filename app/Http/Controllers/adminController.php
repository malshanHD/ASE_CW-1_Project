<?php
// import control
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\adminInfo;
use App\Models\User;

class adminController extends Controller
{
    public function saveAdminInfo(Request $request){
        $adminData=new adminInfo;

        $ulevel=3;
        $passusername=$request->usernames;
        $passemail=$request->email;
        
        if (User::where('name', $request->usernames)->exists()) {
            //email exists in user table
            return redirect()->back()->with('message', 'This username was already taken!');

         }
           //validate required
        $this->validate($request,[
            'usernames'=>'required|max:10',
            'fname'=>'required|max:180|min:2',
            'Lname'=>'required|max:180|min:2',
            'email'=>'required|max:180|min:2',
            'contact'=>'required',

        ]);

        //admin form data save
        $AdminImage=time().'-'.$request->usernames.'.'.$request->picture->extension();

        $request->picture->move(public_path('adminImg'),$AdminImage);

        $adminData->username= $request->usernames;
        $adminData->firstName= $request->fname;
        $adminData->lassName= $request->Lname;
        $adminData->email= $request->email;
        $adminData->contact= $request->contact;
        $adminData->profilePicture= $AdminImage;
        $adminData->save();

        return view('auth.register', compact('ulevel', 'passusername','passemail'));
    }
}
