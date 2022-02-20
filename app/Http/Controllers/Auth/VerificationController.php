<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\VerifiesEmails;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Auth\Events\Verified;
use Illuminate\Http\Request;

class VerificationController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Email Verification Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling email verification for any
    | user that recently registered with the application. Emails may also
    | be re-sent if the user didn't receive the original email message.
    |
    */

    use VerifiesEmails;

    /**
     * Where to redirect users after verification.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth.client']);
        $this->middleware('signed')->only('verify');
        $this->middleware('throttle:6,1')->only('verify', 'resend');
    }

    public function verify(Request $request)
    {
        if (! hash_equals((string) $request->route('id'), (string) backpack_user()->getKey())) {
            throw new AuthorizationException;
        }

        if (! hash_equals((string) $request->route('hash'), sha1(backpack_user()->getEmailForVerification()))) {
            throw new AuthorizationException;
        }

        if (backpack_user()->hasVerifiedEmail()) {
            return redirect($this->redirectPath());
        }

        if (backpack_user()->markEmailAsVerified()) {
            event(new Verified(backpack_user()));
        }

        return redirect($this->redirectPath())->with('verified', true);
    }

    public function show(Request $request)
    {
        return backpack_user()->hasVerifiedEmail()
            ? redirect($this->redirectPath())
            : view('auth.verify');
    }


}
