<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Food;
use App\Models\Chef;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index(){
        if(Auth::id()){
           
            return redirect('redirect');

        }else{
        
            $user_id=Auth::id();
            $data=Food::all();
            $chefs=Chef::all();
           
            return view('user.home',compact('data','chefs'));

        }
     
    }

    public function redirect(){
        $data=Food::all();
        $chefs=Chef::all();


        $pie = DB::select(DB::raw('SELECT COUNT(*) as nbremp, 
                                  CASE usertype 
                                  WHEN 0 THEN "utilisateur" 
                                  WHEN 1 THEN "admin" 
                                  END as usertype_label 
                            FROM users 
                            GROUP BY usertype'));

        $datach = "";

        foreach ($pie as $val) {
             $datach .= "['" . $val->usertype_label . "', " . $val->nbremp . "],";
            }

                $ch = $datach;

                //bar chart//
                $bar=User::select('id','created_at')->get()->groupBy(function($bar){
                    return Carbon::parse($bar->created_at)->format('M');
                });
                $months=[];
                $monthcount=[];
                 
                foreach($bar as $month => $values){
                    $months[]=$month;
                    $monthcount[]=count($values);
                }
                    
                $totalUsers = User::count();
///////////////////////////////////////////////////
               // Obtenir le pourcentage d'utilisateurs inscrits pour le mois actuel
             
 ////////////////////////////////  
   
        $usertype=Auth::user()->usertype;
        $countforadmin=User::count();
        $countforchef=Chef::count();
        if($usertype=='1')
        {
            return view('admin.adminhome',compact('ch','bar','months','monthcount','countforadmin','countforchef'));
        }else
        {
            $user_id=Auth::id();
            $count=Cart::where('user_id',$user_id)->count();
        return view('user.home',compact('data','chefs','count'));
        }
    }

    public function addcart(Request $request,$id){
        if(Auth::id()){

        
           $food_id=$id;
           $user_id=Auth::id();
           $quantity=$request->quantity;
           $cart=new Cart();
           $cart->user_id=$user_id;
           $cart->food_id= $food_id;
           $cart->quantity=$quantity;
           $cart->save();
           return redirect()->back();
        }else{
            return redirect('/login');
        }
    }

    public function showcart(Request $request, $id) {
        $user_id = Auth::user()->id; // Obtenez l'ID de l'utilisateur connecté
        
        // Vérifiez si l'ID de l'utilisateur passé dans l'URL correspond à l'utilisateur connecté
        if ($user_id == $id) {
            $count = Cart::where('user_id', $user_id)->count();
            
            // Filtrer les données de la base de données pour l'utilisateur connecté
            $show =Cart::where('carts.user_id', $user_id)->join('Food', 'carts.food_id', '=', 'Food.id') ->get();
            
            $data2 = Cart::select('*')->where('user_id', '=', $user_id)->get();
            
            return view('user.showcart', compact('count', 'show', 'data2'));
        } else {
            // Gérez le cas où l'ID ne correspond pas à l'utilisateur connecté
            // Vous pouvez rediriger l'utilisateur ou afficher un message d'erreur
            return redirect()->route('nom_de_votre_route_de_redirection');
        }
    }
    

    public function deletecart(Cart $id){
      
            $id->delete();
            return redirect()->back();
   
    }
    
}
