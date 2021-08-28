<?php

namespace App\Http\Controllers;

use App\Agency;
use Illuminate\Http\Request;

class AgencyController extends Controller
{
    public function index(){

        $agency= Agency::all();
        return view('/agencies/index',compact('agency'));
    }
    

    public function create()
    {
        return view('/agencies/create');
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
            'address' => 'required|max:255',
            'nipt' => 'required|max:255',
            'active' => 'required|boolean',
        ]);
        $agency= Agency::create($storeData);

        return redirect('agencies')->with('completed', 'Agency has been created!');
    }
    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $showagency = Agency::where('id', $id)->first();
        return view('/agencies/show',compact('showagency'));
    }

    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $editagency = Agency::findOrFail($id);
        return view('/agencies/edit', compact('editagency'));
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
            'address' => 'required|max:255',
            'nipt' => 'required|max:255',
            'active' => 'required|max:255',
        ]);
        Agency::whereId($id)->update($updateData);
        return redirect('agencies');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $agency = Agency::findOrFail($id);
        $agency->delete();

        return redirect('agencies');
    }
   
}