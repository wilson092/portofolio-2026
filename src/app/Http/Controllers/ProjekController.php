<?php

namespace App\Http\Controllers;

use App\Models\Projek;

class ProjekController extends Controller
{
    /**
     * Halaman daftar projek
     */
    public function index()
    {
        $projeks = Projek::latest()->get();

        return view('projek.index', compact('projeks'));
    }

    /**
     * Halaman detail projek
     */
    public function show($id)
    {
        $projek = Projek::findOrFail($id);

        return view('detail-projek', compact('projek'));
    }
}