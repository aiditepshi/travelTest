<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $allcustomers = Customer::all();
        return view('/customers/index', compact('allcustomers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('customers/create');
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
            'first_name' => 'required|max:255',
            'last_name' => 'required|max:255',
            'telephone' => 'required|max:255',
            'email' => 'required|max:255',
            'age' => 'required|numeric'
        ]);
        $insertonecustomer = Customer::create($storeData);

        return redirect('/customers')->with('completed', 'Customer has been saved!');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $oneCustomer = Customer::where('id', $id)->first(); //User::find(2), User::findOrFail(2),User::whereIn('id', [2])->first()
        return view('/customers/show',compact('oneCustomer'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $customertoedit = Customer::findOrFail($id);
        return view('/customers/edit', compact('customertoedit'));
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
            'first_name' => 'required|max:255',
            'last_name' => 'required|max:255',
            'telephone' => 'required|max:255',
            'email' => 'required|max:255',
            'age' => 'required|numeric'
        ]);
        Customer::whereId($id)->update($updateData);
        return redirect('/customers')->with('completed', 'Customer has been updated');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $customer = Customer::findOrFail($id);
        $customer->delete();

        return redirect('/customers')->with('completed', 'Customer has been deleted');

    }
}
