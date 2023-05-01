<?php

namespace App\Http\Controllers\admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Carbon\Carbon;
use Session;
use Illuminate\Support\Facades\Mail;
use Stripe;


class AdminController extends Controller

{
    public function adminlogin(){
        if(session()->has('unlocker')){
            return redirect('admin/dashboard');
        }
        return view('admin/login');
    }
    
    public function dashboard(){
        return view('admin/dashboard');
    }

    public function viewOrders(){

        $allOrders = DB::table('orders')->join('users','users.id','=','orders.user_id')->join('price','orders.plan_id','=','price.id')->select('price.name','orders.*')->get();
        return view('admin/orders',compact('allOrders'));
    }
    

}



