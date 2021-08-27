<?php

namespace App\Http\Controllers;
use App\Agency;
use Illuminate\Http\Request;
use App\Http\Controllers\AgencyController;

class AgencyController extends Controller
{
    public function agency(){

        $agency= Agency::all();
        return view('agency',compact('agency'));
    }
     
    
 public function add (Request $request){

        $agency = new Agency;

        $agency -> name = $request->name;
        $agency ->address = $request->address;
        $agency -> nipt = $request->nipt;
        $agency -> active = $request->active;

        $agency = save();

        return redirect('agencies');
    }
    
    public function delete($id){

        $data = Agency :: findorfail($id);
        $data = delete();

        return redirect ('agencies');
    }
    

    public function update($id){

        $data = Agency :: findorfail($id);
        return view('/agencies/update',compact('data'));

    }

    public function change (Request $request){

        $agency =  Agency :: findorfail($request->id);

        $agency -> name = $request->name;
        $agency ->address = $request->address;
        $agency -> nipt = $request->nipt;
        $agency -> active = $request->active;

        $agency = save();

        return redirect('agencies');

 
   

}




















    // public function create()
    // {
    //     return view('create');
    // }

    // /**
    //  * Store a newly created resource in storage.
    //  *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @return \Illuminate\Http\Response
    //  */
    // public function store(Request $request)
    // {
    //     $storeData = $request->validate([
    //         'name' => 'required|max:255',
    //         'address' => 'required|max:255',
    //         'nipt' => 'required|max:255',
    //         'active' => 'required|max:255',
    //     ]);
    //     $addagency= Agency::create($storeData);

    //     return redirect('/agencies')->with('completed', 'Agency has been created!');
    // }

    // /**
    //  * Display the specified resource.
    //  *
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    // public function show($id)
    // {
    //     $agency =Agency::where('id', $id)->first(); 
    //     return view('show',compact('agency'));
    // }

    // /**
    //  * Show the form for editing the specified resource.
    //  *
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    // public function edit($id)
    // {
    //     $editagency = Agency::findOrFail($id);
    //     return view('edit', compact('editagency'));
    // }

    // /**
    //  * Update the specified resource in storage.
    //  *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    // public function update(Request $request, $id)
    // {
    //     $updateData = $request->validate([
    //         'name' => 'required|max:255',
    //         'address' => 'required|max:255',
    //         'nipt' => 'required|max:255',
    //         'active' => 'required|max:255',
    //     ]);
    //     Agency::whereId($id)->update($updateData);
    //     return redirect('/agencies')->with('completed', 'Agency has been updated');
    // }

    // /**
    //  * Remove the specified resource from storage.
    //  *
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    // public function destroy($id)
    // {
    //     $agency = Agency::findOrFail($id);
    //     $agency->delete();

    //     return redirect('/agencies')->with('completed', 'Agency has been deleted');
    // }

    }









   
    