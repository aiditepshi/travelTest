<?php

namespace App\Http\Controllers;

use App\Trip;
use Illuminate\Http\Request;
use App\Customer;

class TripsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $alltrips = Trip::all();
        return view('/trips/index', compact('alltrips'));
    }

}
