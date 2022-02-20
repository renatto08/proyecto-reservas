<?php

namespace App\Http\Controllers;

use App\Mail\EmailReserva;
use App\Mail\EmailVerification;
use App\Models\Order;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Mail;

class EmailTestController extends Controller
{
    public function verify(){
        $notificable = User::find(8);
        $verifyUrl = URL::temporarySignedRoute(
            'verification.verify',
            Carbon::now()->addMinutes(Config::get('auth.verification.expire',60)),
            ['id' => $notificable->getKey(),'hash'=>sha1($notificable->email)]
        );
        return new EmailVerification($verifyUrl,$notificable);
    }

    public function reserva(Request $request){

        //dd(env('MAIL_DRIVER'));
        $order = Order::find($request->input('order',1));

        if($request->input('view',false))
            return new EmailReserva($order);
        Mail::to($order->shop->email)->send(new EmailReserva($order));
        return "enviad a ".$order->shop->email;
        //$order = Order::find(63);
        //return new EmailReserva($order);
    }
}
