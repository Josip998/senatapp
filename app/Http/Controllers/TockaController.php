<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sjednica;
use App\Models\Tocka;

class TockaController extends Controller
{
    public function index(Sjednica $Sjednica)
    {
        $Tocke = $Sjednica->Tocke;

        return view('tocke.index', compact('Tocke', 'Sjednica'));
    }

    public function create(Sjednica $Sjednica, Tocka $parent = null)
    {
        $parent_id = $parent ? $parent->id : null;

        return view('tocke.create', compact('Sjednica', 'parent_id'));
    }

    public function store(Sjednica $Sjednica, Request $request)
    {
        $data = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'parent_id' => 'nullable|exists:tocke,id'
        ]);

        $Tocka = $Sjednica->Tockas()->create($data);

        return redirect()->route('Sjednice.tocke.index', $Sjednica);
    }

    public function edit(Sjednica $Sjednica, Tocka $Tocka)
    {
        return view('tocke.edit', compact('Sjednica', 'Tocka'));
    }

    public function update(Sjednica $Sjednica, Tocka $Tocka, Request $request)
    {
        $data = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'parent_id' => 'nullable|exists:tocke,id'
        ]);

        $Tocka->update($data);

        return redirect()->route('Sjednice.tocke.index', $Sjednica);
    }

    public function destroy(Sjednica $Sjednica, Tocka $Tocka)
    {
        $Tocka->delete();

        return redirect()->route('Sjednice.tocke.index', $Sjednica);
    }
}

