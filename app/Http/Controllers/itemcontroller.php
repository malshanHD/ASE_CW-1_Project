<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\item;
use App\Models\seller_info;
use App\Models\ItemImage;
use App\Models\comment;
use App\Models\cmntreply;
use App\Models\bidPay;
use App\Models\subcategory;
use App\Models\wishlist;

use Auth;
use DB;

class itemcontroller extends Controller
{
    public function saveItem(Request $request){

        $path = [];

        $item = new item();

        $this->validate($request,[
            'name'=>'required|max:180|min:2',
            'description'=>'required|max:2000|min:2',
            'category'=>'required',
            'subcate'=>'required',
            'Warranty'=>'required',
            'Quantity'=>'required',
            'Price'=>'required',
            'mainPic'=>'required|mimes:jpg,png,jpeg,JPG,PNG,JPEG|max:10096',
            
            
        ]);

        $imgName=time().'-'.$request->name.'.'.$request->mainPic->extension();

        $request->mainPic->move(public_path('AddItemsImages'),$imgName);

        $item = $item->create([
            'itemCode' => $request->code,
            'itemName' => $request->name,
            'itemDescription' => $request->description,
            'itemPrice' => $request->Price,
            'itemWarrenty' => $request->Warranty,
            'itemQTY' => $request->Quantity,
            'itemMainCat' => $request->category,
            'itemSubCat' => $request->subcate,
            'bidEnd' => $request->Bidendate,
            'mainImage' => $imgName,
            'seller' => $request->sellerName,
        ]);


        foreach( $request->file('pictures') as $file){
            $path[] = $file->store('public/avatars');
        }

        if(!empty($path)){
            
            foreach($path as $filename){

                $itemImage = new ItemImage();

                $itemImage->create([
                    'item_id' => $item->itemCode,
                    'image' => $filename
                ]);
            }
        }

        $bidData=new bidPay;
        
        $bidData->itemID= $request->code;
        $bidData->buyerUsername= $request->sellerName;
        $bidData->bidAmount= $request->Price;
        $bidData->save();
        

        return redirect()->back()->with('message', 'Item Added Successfully!');
    }

    public function itemView($itemCode,$seller){
        $itemRetrive=$itemCode;
        
        $datas=item::where('itemCode',$itemRetrive)->get();

        $sellerInfo=seller_info::where('username',$seller)->get();
        

        $images=ItemImage::where('item_id',$itemRetrive)->get();

       // $sug = DB::Table('items')->select('itemSubCat')->where('itemCode',$itemRetrive)->get();  
       
       // $itemCatID=$sug;
       
        $item = item::orderBy('itemCode', 'DESC')->take(4)->get();

        $cmnt=comment::where('itemCode',$itemRetrive)->get();

        $CurrentBid=bidPay::where('itemID',$itemRetrive)->orderBy('bidAmount', 'DESC')->take(1)->get();
        

        return view('buyitem', compact('images', 'datas','item','cmnt','sellerInfo','CurrentBid'));

    
    

    }
     public function itemdelete(){
     $delete = ((Auth::user()->name));
     $item = item::where('seller',$delete)->GET();
     return view('itemDelete')->with('items',$item);
    }

    public function searchitem(){
        $serach = $_GET['Search'];
        $item = item::where('itemName','LIKE','%'.$serach.'%')->GET();
        return view('search')->with('items',$item);
    }
    public function catItemSearch($catItemSearch){ 
        $catItem = item::where('itemSubCat',$catItemSearch)->GET();
        return view('categoryitemsearch',compact('catItem'));
    }
    public function wishlist($name, $itemCode){

        if (wishlist::where([['username', $name],['itemCode',$itemCode]])->exists()) {
            //email exists in user table
            return redirect()->back();
        }

        $wishlist = new wishlist;
        $wishlist->username=$name;
        $wishlist->itemCode=$itemCode;
        $wishlist->save();
        return redirect()->back()->with('message', 'wish list Added Successfully!');
    }
    
    public function wishlistRemove($id){
        $delete=wishlist::find($id);
        $delete->delete();
        return redirect()->back();
    }
}

