<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Razorpay\Api\Api;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class OrderController extends Controller
{
    
    public function rezorPayReturn(Request $request){
        
        echo '<pre>';
        print_r($request->all());
        exit;
        
    }
    
    public function showCheckout(){
        return view('checkout');
    }
    public function viewOrders(){

        $delPendingOrder = DB::table('orders')->where('status','pending')->where('user_id',session()->get('unlocker_user')[0])->delete();
        $allOrders = DB::table('orders')->join('price','orders.plan_id','=','price.id')->select('price.name','orders.*')->where('user_id',session()->get('unlocker_user')[0])->orderBy('order_id','desc')->paginate(10);
        return view('orders',compact('allOrders'));
    }

    public function processtoPay(Request $request){
        
        $api_key = env('REZOR_API_KEY');
        $api_secret = env('REZOR_SECRET_KEY');

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
        
        $input = $request->all();
        
        $api_key = env('REZOR_API_KEY');
        $api_secret = env('REZOR_SECRET_KEY');

        $api = new Api($api_key, $api_secret);
        
        $payment = $api->payment->fetch($request->input('razorpay_payment_id'));
        
        $order_id = $payment->notes->order_id;
        
        if(count($input) && !empty($request->input('razorpay_payment_id'))) {
            try {
                $response = $api->payment->fetch($input['razorpay_payment_id'])->capture(array('amount' => $payment->amount));
                
                $orderDetail = DB::table('orders')->where('transaction_id',$order_id)->first();
                $planDetails = DB::table('price')->where('id',$orderDetail->plan_id)->first();

                $currentDate = Carbon::now();

                $formattedStartDate = $currentDate->format('Y-m-d H:i:s');

                if($planDetails->interval == 'year'){
                    $modifiedDate = $currentDate->addYears(1);
                }else if($planDetails->interval == 'month'){
                    $modifiedDate = $currentDate->addMonths(1);
                }else{
                    $modifiedDate = $currentDate->addDays(1);
                }

                $formattedEndDate = $modifiedDate->format('Y-m-d H:i:s');

                DB::table('orders')->where('user_id',$orderDetail->user_id)->where('status','completed')->where('transaction_id','<>',$order_id)->update(['status'=>'end']);

                DB::table('orders')->where('transaction_id',$order_id)->update([
                    'r_payment_id' => $response['id'],
                    'method' => $response['method'],
                    'currency' => $response['currency'],
                    'user_email' => $response['email'],
                    'status' => 'completed',
                    'start_date' => $formattedStartDate,
                    'end_date' => $formattedEndDate,
                    'order_json' => json_encode((array)$response)
                ]);
                
                return redirect('orders')->with('success','Payment successfully completed');
                
            } catch(Exceptio $e) {
                
                DB::table('orders')->where('transaction_id',$order_id)->update([
                    'status' => 'failed'
                ]);
                
                return redirect('orders')->with('error',$e->getMessage());
            }
        }else{
            DB::table('orders')->where('transaction_id',$order_id)->update([
                    'status' => 'failed'
            ]);
            return redirect('orders')->with('error','Invalid request found');
        }
        
        
        exit;

        $payment = $api->payment->fetch($request->input('razorpay_payment_id'));


        $payment_id = $request->input('razorpay_payment_id');
        $order_id = $payment->notes->order_id;

        $string = $order_id . '|' . $payment_id;
        $signature = hash_hmac('sha256', $string, $api_secret);
        $signature = base64_encode($signature);
        
        
        
        

        try {

            $attributes = array(
                'razorpay_order_id' => $order_id,
                'razorpay_payment_id' => $payment_id,
                'razorpay_signature' => $signature
            );
        
            $api->utility->verifyPaymentSignature($attributes);
            
            echo '<pre>';
        print_r($request->all());
        exit;
            
            return redirect('orders')->with('success','Payment successfully completed');

        } catch (\Exception $e) {
            echo $e->getMessage();
            exit;
            //return redirect('orders')->with('error',$e->getMessage());
        }

    }


}
