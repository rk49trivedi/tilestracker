<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Razorpay\Api\Api;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    
    public function showCheckout(){
        return view('checkout');
    }
    public function viewOrders(){

        $allOrders = DB::table('orders')->join('price','orders.plan_id','=','price.id')->select('price.name','orders.*')->where('user_id',session()->get('unlocker_user')[0])->get();
        return view('orders',compact('allOrders'));
    }

    public function processtoPay(Request $request){
        
        $api_key = 'rzp_test_y1JxbNUs1Aw0r9';
        $api_secret = 'DXpokIEhKme19AC05990F2S5';

        $api = new Api($api_key, $api_secret);

        $userDetails = User::find(session()->get('unlocker_user')[0]);


        $order = $api->order->create([
            'amount' => $request->amount * 100, 
            'currency' => 'INR',
            'payment_capture' => 1,
            'notes' => [
                'name' => $request->rname,
                'email' => $request->email,
            ],
        ]);

        
        // create order

        $insertData = DB::table('orders')->insert(['user_id'=>session()->get('unlocker_user')[0],'plan_id'=>$request->plan_id,'price'=>$request->amount,'transaction_id'=>$order->id,'order_json'=>json_encode($order)]);
        if($insertData){


            return view('checkout', [
                'order_id' => $order->id,
                'amount' => $request->amount,
                'name' => $request->rname,
                'email' => $request->remail,
                'razorpay_key'=>$api_key
            ]);
        }
        

    }

    public function Paymentprocess(Request $request){

        $api_key = 'rzp_test_y1JxbNUs1Aw0r9';
        $api_secret = 'DXpokIEhKme19AC05990F2S5';

        $api = new Api($api_key, $api_secret);

        $payment_id = $request->input('razorpay_payment_id');
        $order_id = $request->input('razorpay_order_id');
        $signature = $request->input('razorpay_signature');

        try {
            $attributes = array(
                'razorpay_order_id' => $order_id,
                'razorpay_payment_id' => $payment_id,
                'razorpay_signature' => $signature
            );

            $api->utility->verifyPaymentSignature($attributes);
            
            // Payment verification is successful, update the payment status in your database
            
            return redirect()->route('payment.success');
        } catch (\Exception $e) {
            return redirect()->route('payment.failure');
        }

    }


}
