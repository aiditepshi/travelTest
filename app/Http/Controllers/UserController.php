<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Customer;
use App\Agency;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $allUsers = User::all();
        return view('users\index', compact('allUsers'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $allCustomers = Customer::all();
        $allAgency = Agency::all();
        return view('users\create', compact('allCustomers','allAgency'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $storeData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|max:255',
            'password' => 'required|max:255',
            'role' => 'required|max:255',
            'agency_id' => 'required|numeric',
            'customer_id' => 'required|numeric'
        ]);
        $insertOneUser = User::create($storeData);

        return redirect('/users')->with('completed', 'User has been saved!');


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $oneUser = User::where('id', $id)->first(); //User::find(2), User::findOrFail(2),User::whereIn('id', [2])->first()
        return view('users\show',compact('oneUser'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $userToEdit = User::findOrFail($id);
        $allCustomers = Customer::all();
        $allAgency = Agency::all();
        return view('users\edit', compact('userToEdit','allCustomers','allAgency'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $updateData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|max:255',
            'password' => 'required|max:255',
            'role' => 'required|max:255',
            'agency_id' => 'required|numeric',
            'customer_id' => 'required|numeric',
        ]);
        User::whereId($id)->update($updateData);
        return redirect('/users')->with('completed', 'Customer has been updated');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect('/users')->with('completed', 'Customer has been deleted');

    }
}
