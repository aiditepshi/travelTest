<?php

namespace App\Http\Controllers;

use App\Agency;
use Illuminate\Http\Request;
use PHPMailer\PHPMailer\PHPMailer;

class AgencyController extends Controller
{
    public function index()
    {

        $agency = Agency::all();
        return view('/agencies/index', compact('agency'));
    }


    public function create()
    {
        return view('/agencies/create');
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
            'address' => 'required|max:255',
            'nipt' => 'required|max:255',
            'active' => 'max:255',
            'image' => 'image:jpg,png,gif,svg|max:2048',
        ]);
        if ($image = $request->file('image')) {
            $destinationPath = 'image/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $storeData['image'] = "$profileImage";
        }


        if (!isset($storeData ['active'])) {
            $storeData['active'] = false;
        } else {
            $storeData['active'] = true;
        }


        $agency = Agency::create($storeData);
        \Mail::to('test@gmail.com')->send(new \App\Mail\OrderShipped());

        return redirect('agencies');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $showagency = Agency::where('id', $id)->first();
        return view('/agencies/show', compact('showagency'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
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
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $updateData = $request->validate([
            'name' => 'required|max:255',
            'address' => 'required|max:255',
            'nipt' => 'required|max:255',
            'active' => 'boolean',
            'image' => 'image:jpg,png,gif,svg|max:2048',
        ]);

        if ($image = $request->file('image')) {
            $destinationPath = 'image/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $updateData['image'] = "$profileImage";
        } else {
            unset($updateData['image']);
        }
        if (!isset($updateData ['active'])) {
            $updateData['active'] = false;
        } else {

            $updateData['active'] = true;
        }


        Agency::whereId($id)->update($updateData);
        return redirect('agencies');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $agency = Agency::findOrFail($id);
        $agency->delete();

        return redirect('agencies');
    }

}
