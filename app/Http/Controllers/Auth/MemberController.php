<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;

class MemberController extends Controller
{

	public function __construct()
        {
           
            $this->middleware('guest:member')->except('logout');
        }

    public function showMemberLoginForm()
    {
        return view('auth.login', ['url' => 'member']);
    }

    public function memberLogin(Request $request)
    {
        $this->validate($request, [
            'email'   => 'required|email',
            'password' => 'required|min:8'
        ]);

        if (Auth::guard('member')->attempt(['email' => $request->email, 'password' => $request->password], $request->get('remember'))) {

            return redirect()->intended('/member');
        }
        return back()->withInput($request->only('email', 'remember'));
    }
}
