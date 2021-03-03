<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class KeyServerMidtransController extends Controller
{
    public static function getKeyServer()
    {
      $keyServer = env('SERVER_KEY_MIDTRANS') 
                   ? env('SERVER_KEY_MIDTRANS') 
                   : Crypt::decryptString('');
                   
      return $keyServer;
    }
}
