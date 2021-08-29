<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;
use App\Agency;
use Hash;
use Session;
use App\User;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login()
    {
        return view('/auth/login');
    }

    public function postLogin(Request $request)
    {
        $validateLogin = $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        if(Auth::attempt($validateLogin))
        {
            return redirect('/customers');
        }
        return redirect('/login');

    }

    public function register()
    {
        $customers = Customer::all();
        $agencies = Agency::all();
        return view('/auth/register', compact('customers', 'agencies'));
    }

    public function postRegister(Request $request)
    {
        $validateData = $request->validate([
            'name' => 'required|max:100',
            'password' => 'required|max:14|min:6',
            'email' => 'required|max:100|unique:users,email',
            'role' => 'required|in:customer,employee',
            'agency_id' => 'integer',
            'customer_id' => 'integer'
        ]);
        $hashPass = Hash::make($validateData['password']);
        $validateData['password'] = $hashPass;

        if ($validateData['role'] == 'customer') {
            $validateData['agency_id'] = null;
        } else {
            $validateData['customer_id'] = null;
        }
        $insertUser = User::create($validateData);
        return redirect('/users')->with('completed', 'User has been saved!');
    }

    public function logout(){
        Session::flush();
        Auth::logout();

        return redirect('/login');
    }
}
