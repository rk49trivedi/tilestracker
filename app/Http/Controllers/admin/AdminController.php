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

    public function viewUsers(){
       
        if(isset($_REQUEST['id'])){
            $delUser = DB::table('users')->where('id',$_REQUEST['id'])->delete();
        }

        if(isset($_REQUEST['access'])){
            $userLogin = DB::table('users')->where('id',$_REQUEST['access'])->first();
            session()->put('unlocker_user',array($userLogin->id,$userLogin->username,$userLogin->name,$userLogin->email));
            session()->save();
            return redirect('/');
        }

        $userList = DB::table('users')->paginate(10);
        return view('admin/users',compact('userList'));
    }

    public function ViewPrice(){
        $allPrice = DB::table('price')->get();
        return view('admin/price',compact('allPrice'));
    }

    public function UpdatePrice(Request $request){

        if($request->listing != ''){
            $updateLIst = explode(',',trim($request->listing));
            $updateLIst = json_encode($updateLIst);
        }else{
            $updateLIst = '';
        }
        DB::table('price')->where('id',$request->pid)->update([
            'name'=>$request->name,
            'type'=>$request->type,
            'price'=>$request->price,
            'interval'=>$request->interval,
            'description_data'=>$request->description_data,
            'listing'=>$updateLIst
        ]);
        return redirect()->back()->with('success','Data successfully saved');
        exit;
    }

    public function viewOrders(){

        $allOrders = DB::table('orders')->join('users','users.id','=','orders.user_id')->join('price','orders.plan_id','=','price.id')->select('price.name','orders.*','users.email')->paginate(10);
        return view('admin/orders',compact('allOrders'));
    }
    

}



