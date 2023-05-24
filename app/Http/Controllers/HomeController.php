<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\TilesImage;
use App\Models\User;


class HomeController extends Controller
{
    public function home(){

        $categories = Category::orderBy('name','asc')->get();
        return view('welcome',compact('categories'));
    }

    public function Showpricing(){

        $allPriceData = DB::table('price')->get();
        $currentPlan = 0;

        if(session()->has('unlocker_user')){
            $userId = session()->get('unlocker_user')[0];
            $checkPlans = DB::table('orders')->where('user_id',$userId)->where('status','completed')->orderBy('order_id','desc')->first();
            if($checkPlans){
                $currentPlan = $checkPlans->plan_id;
            }
        }

        return view('pricing',compact('allPriceData','currentPlan'));
    }

    public function ShowLogin(){
        return view('login');
    }

    public function Showcart($id){
        $singPriceData = DB::table('price')->where('id',$id)->first();
        return view('cart',compact('singPriceData'));
    }

    public function Showcontact(){
        return view('contact');
    }

    public function sendEmail(Request $request){
        return redirect()->back()->with('success','Email successfully sent');
    }

    public function Showabout(){
        return view('about');
    }

    public function singnUpProcess(Request $request){

        $checkUserName = User::where('username',$request->username)->first();
        $checkUserEmail = User::where('email',$request->email)->first();
        if($checkUserName):
            return redirect()->back()->with('error','Username already exist')->withInput($request->input());
        endif;
        if($checkUserEmail):
            return redirect()->back()->with('error','Email already exist')->withInput($request->input());
        endif;

        $saveUser = new User();
        $saveUser->name = $request->fullname;
        $saveUser->username = $request->username;
        $saveUser->email = $request->email;
        $saveUser->phone = $request->phone;
        $saveUser->password = md5($request->password);
        $saveUser->save();
        if($saveUser):
            return redirect()->back()->with('success','Registration successfully completed');
        endif;


    }

    public function signInProcess(Request $request){

        $pass = md5($request->password);
        
        $chkuserCred = DB::table('users')->where('password',$pass)->where(function($query) use ($request) {
            $query->where('username',$request->logusername);
            $query->orwhere('email',$request->logusername);
        })->get();
        
        if(count($chkuserCred) > 0) {
            session()->put('unlocker_user',array($chkuserCred[0]->id,$chkuserCred[0]->username,$chkuserCred[0]->name,$chkuserCred[0]->email));
            session()->save();
            return redirect($request->previous_url);
        } else {
            return redirect()->back()->with('error_login','Invalid authentication')->withInput($request->input());
        }

    }




}
