<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FileController extends Controller
{
    public function index()
    {
        return view('file.index');
    }

    public function upload(Request $r)
    {
        $file = $r->file('image');
        $name = time() . '_' . $file->getClientOriginalName();

        auth()->loginUsingId(1);
        $user_id = auth()->id();


        if(! $user_id){
            $user_id = 'guest';
        }

        $r = $file->storeAs('myfiles/' . $user_id, $name, 'image');
        dd($r);

        return redirect()->back();
    }
}
