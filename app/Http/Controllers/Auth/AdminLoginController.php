<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class AdminLoginController extends Controller
{
    public function __construct() {
        $this->middleware('guest:admin')->except('adminLogout');
    }

    //Show admin login form
    public function showAdminLoginForm() {

        return view('admin.auth.login');
    }

    //Admin Login
    public function adminLogin(Request $request) {
        // 1. Validate the form data
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6'
        ]);

        // 2. Attempt to login the admin user
        if (auth()->guard('admin')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember)) {
            // 3. If successful; redirect the user to its destination.
            return redirect()->intended(route('get.admin.dashboard'));
        }
        // 4. Else, redirect them back to the admin login page
        return back()->withErrors(['email' => 'Email or password are wrong.']);
    }

    /**
     * Log the Admin out of the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function adminLogout()
    {
        Auth::guard('admin')->logout();
        return redirect('/admin/login');
    }
}
