<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use App\Models\Course;
use App\Models\User;
use App\Models\Payment;

class PaymentController extends Controller
{
    public function payment(Course $course){
      \Midtrans\Config::$serverKey = env('MIDTRANS_SERVER_KEY');
      \Midtrans\Config::$isProduction = env('MIDTRANS_ENVIRONMENT');
      \Midtrans\Config::$isSanitized = true;
      \Midtrans\Config::$is3ds = true;
      
      $user = Auth::user();
      $order_id = 'CDF-' . rand();
      
      $data = [
          'transaction_details' => [
              'order_id' => $order_id,
              'gross_amount' => $course->pricing,
          ],
          
          'customer_details' => [
              'first_name' => $user->name,
              'email' => $user->email,
          ],
      ];
      $payment = Payment::where('course_id', $course->id)->where('user_id', $user->id)->first();
      
      if ($payment) {
        $snapToken = $payment->snap_token;
      } else {
        $snapToken = \Midtrans\Snap::getSnapToken($data);
                
        Auth::user()->payments()->create([
          'course_id' => $course->id,
          'order_id' => $order_id,
          'snap_token' => $snapToken
        ]);
      }
      
      return view('landing.payment', compact('snapToken'));
    }
    
    public function prosesPayment(Request $request){
      $transaction = json_decode($request->result_data, true);
      //dd($transaction);
      switch ($transaction['status_code']) {
        case 200:
          $payment = Payment::where('order_id', $transaction['order_id'])->first();
          $user = User::findOrFail($payment->user_id);
          $user->courses()->attach($payment->course_id);
          
          $payment->transaction_id = $transaction['transaction_id'];
          $payment->status_code = $transaction['status_code'];
          $payment->transaction_time = $transaction['transaction_time'];
          $payment->transaction_status = $transaction['transaction_status'];
          $payment->payment_type = $transaction['payment_type'];
          $payment->status_message = $transaction['status_message'];
          $payment->save();
          
          return redirect('/thankyou');
          break;
          
        case 201:
          $response = Http::withHeaders([
            'Content-Type' => 'application/json', 
            'Accept' => 'application/json', 
            'Authorization' => 'Basic U0ItTWlkLXNlcnZlci1IbEY2bjBrSjR3bmVqa2plQ2lXRF95Z2E6'])
          ->get('https://api.sandbox.midtrans.com/v2/' . $transaction['order_id'] . '/status')
          ->json();
          
          dd($response);
          break;
          
        case 409:
          // Udah Bayar
          break;
        
        default:
          // Server Error
          break;
      }
      
      //dd($transaction);
    }
}