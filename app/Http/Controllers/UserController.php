<?php

namespace App\Http\Controllers;

use Cassandra\Type\Custom;
use Illuminate\Http\Request;
use App\User;
use App\Agency;
use App\Customer;

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
        return view('users/index', compact('allUsers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
//        return view('users\create');
//        return view('resources\views\auth');
        return view('users/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $storeData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|max:255',
            'password' => 'required|max:255',
            'role' => 'required|max:255',
            'agency_id' => 'required|max:255',
            'customer_id' => 'required|max:255'
        ]);
        $insertUser = User::create($storeData);

        return redirect('/users')->with('completed', 'User has been saved!');

    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $oneUser = User::where('id', $id)->first(); //User::find(2), User::findOrFail(2),User::whereIn('id', [2])->first()
        return view('users/show', compact('oneUser'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $userEdit = User::findOrFail($id);
        $customers = Customer::all();
        $agencies =  Agency::all();
        return view('users/edit', compact('userEdit', 'customers', 'agencies'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $updateData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|max:255',
            'password' => 'required|max:255',
            'role' => 'required|in:customer,employee',
            'agency_id' => 'required|max:255',
            'customer_id' => 'required|max:255'
        ]);
        if($updateData['role'] == 'customer') {
            $updateData['agency_id'] = null;
        }else{
            $updateData['customer_id'] = null;
        }
        User::whereId($id)->update($updateData);
        return redirect('/users')->with('completed', 'User has been updated');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect('/users')->with('completed', 'User has been deleted');

    }
}
