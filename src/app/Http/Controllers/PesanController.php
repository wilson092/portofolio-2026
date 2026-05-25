<?php

namespace App\Http\Controllers;

use App\Models\Pesan;
use Illuminate\Http\Request;

class PesanController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([

            'nama'=>'required',

            'email'=>'required|email',

            'pesan'=>'required',

        ]);

        Pesan::create([

            'nama'=>$request->nama,

            'email'=>$request->email,

            'pesan'=>$request->pesan,

        ]);

        return back()

            ->with('success','Pesan berhasil dikirim');
    }
}