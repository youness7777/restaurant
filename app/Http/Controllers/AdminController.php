<?php

namespace App\Http\Controllers;

use App\Models\Chef;
use App\Models\User;
use App\Models\Food;
use App\Models\Order;
use App\Models\Cart;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;

class AdminController extends Controller
{
  
    public function show_user(){
        if(Auth::id()){
            if(Auth::user()->usertype==1){
                
           
        $users=User::all();
        return view('admin.users',compact('users'));

            }else{
                return redirect()->back();
            }
         }
         else
         {
        return redirect('login');

         }
    }

    public function delete_user(User $id){
        $id->delete();
        return redirect()->back();

    }
    public function formmenu(){
        return view('admin.foodmenu');
    }

    public function addfoods(Request $request){
        if(Auth::id()){
            if(Auth::user()->usertype==1){
                
        $food=new Food();
        $image=$request->file;
    $imagename=time().'.'.$image->getClientoriginalExtension();
    $request->file->move('foodimage',$imagename);

    
    $food->title=$request->title;
    $food->price=$request->price;
    $food->image=$imagename;
    $food->description=$request->description;
    
    $food->save();
    return redirect()->back()->with('message','le docteur a été ajouté avec succèss');
            }else{
                return redirect()->back();
            }
        }else{
            return redirect('login'); 
        }
    }


    
    public function showfoods(){
        $foods=Food::all();
        return view('admin.showfood',compact('foods'));
    }




    public function deletefood(Food $id){
            $id->delete();
            return redirect()->back();
    }

    public function editfood($id){
        $foods=Food::find($id);
        return view('admin.editfood',compact('foods'));
    }

    public function updatefood(Request $request ,$id){
        $food=Food::find($id);
        $image=$request->file;
    $imagename=time().'.'.$image->getClientoriginalExtension();
    $request->file->move('foodimage',$imagename);

    
    $food->title=$request->title;
    $food->price=$request->price;
    $food->image=$imagename;
    $food->description=$request->description;
    
    $food->save();
    return redirect()->back()->with('message','food uploaded with success');
    }


    public function reservation(Request $request){
        $reservation= new Reservation();
        $reservation->name=$request->name;
        $reservation->email=$request->email;
        $reservation->phone=$request->phone;
        $reservation->guest=$request->guest;
        $reservation->date=$request->date;
        $reservation->time=$request->time;
        $reservation->message=$request->message;
        
        $reservation->save();
        return redirect()->back()->with('message','your resersation made with success');
    }

    public function showreservation(){
        $r=Reservation::all();
        return view('admin.showreservation',compact('r'));
    }
    public function search_R(Request $request){
        $om=$request->se;
        $r=Reservation::where('name','like','%'.$om.'%')->orwhere('phone','like','%'.$om.'%')->get();
         return view('admin.showreservation',compact('r'));
           
      
    }

    public function chefform(){
        return view('admin.addchef');
    }

    public function addchef(Request $request){
        $chefs=new Chef();
        $image=$request->file;
        $imagename=time().'.'.$image->getClientoriginalExtension();
        $request->file->move('chefimage',$imagename);

    
    $chefs->name=$request->name;
    $chefs->speciality=$request->speciality;
    $chefs->image=$imagename;
    
    
    $chefs->save();
    return redirect()->back()->with('message','chef added with success');
    }
    
    public function showchefs(){
        $chefs=Chef::all();
        return view('admin.meschefs',compact('chefs'));
    }



    public function deletechef(Chef $id){
        $id->delete();
        return redirect()->back();
    }


    public function editchef($id){
        $chefs=Chef::find($id);
        return view('admin.editchef',compact('chefs'));
    }

    public function updatechef(Request $request ,$id){
        $food=Chef::find($id);
        $image=$request->file;
    $imagename=time().'.'.$image->getClientoriginalExtension();
    $request->file->move('chefimage',$imagename);

    
    $food->name=$request->name;
    $food->speciality=$request->speciality;
    $food->image=$imagename;
    
    $food->save();
    return redirect()->back()->with('message','chef uploaded with success');
    }

    public function confirm_order(Request $request){
        foreach( $request->foodname as $key=>$foodname)
        {
            $ord=new Order();
            $ord->foodname=$foodname;
            $ord->price=$request->price[$key];
            $ord->quantity=$request->quantity[$key];
            $ord->name=$request->name;
            $ord->phone=$request->phone;
            $ord->adress=$request->adresse;
            $ord->save();
        }
        $user_id = Auth::user()->id;
        Cart::where('user_id', $user_id)->delete();
       return redirect()->back()->with('message','your order had been confirmed');;
    }

    public function showorders(){
         $orders=Order::all();
         return view('admin.orders',compact('orders'));
    }

    public function search(Request $request){
        if(Auth::id()){
            if(Auth::user()->usertype==1){
        
        $om=$request->search;
        $orders=Order::where('name','like','%'.$om.'%')->orwhere('foodname','like','%'.$om.'%')->get();
         return view('admin.orders',compact('orders'));
            }else{
                return redirect()->back();
            }
        }else{
            return redirect('login'); 
        }
    }

}
