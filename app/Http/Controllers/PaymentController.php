<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Course;
use App\Models\Payment;

class PaymentController extends Controller
{
    public function index(Course $course){
      \Midtrans\Config::$serverKey = env('MIDTRANS_SERVER_KEY');
      \Midtrans\Config::$isProduction = env('MIDTRANS_ENVIRONMENT');
      \Midtrans\Config::$isSanitized = true;
      \Midtrans\Config::$is3ds = true;
      
      $user = Auth::user();
      
      $data = [
          'transaction_details' => [
              'order_id' => rand(),
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
          'snap_token' => $snapToken
        ]);
      }
      
      return view('landing.payment', compact('snapToken'));
    }
}
