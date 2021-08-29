<?php

namespace App\Http\Controllers;

use Cassandra\Type\Custom;
use Illuminate\Http\Request;
use App\User;
use App\Agency;
use App\Customer;
class AuthController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function login()
    {
//        return view('users\create');
//        return view('resources\views\auth');
        return view('auth\login');
    }
}
