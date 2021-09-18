<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UploadController extends Controller
{
    public function uploadForm(){
        return view('/upload/index');
    }
    public function uploadFile(Request $request){
        $request->file('image')->storeAs('public', 'test.2');
        return "file has been upload succ";
    }
}
