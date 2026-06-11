<?php

namespace App\Http\Controllers;

use App\Models\Kriteria;
use Illuminate\Http\Request;

class KriteriaController extends Controller
{
    public function index()
    {
        $kriterias = Kriteria::all();

        return view('kriteria.index', compact('kriterias'));
    }

    public function create()
    {
        return view('kriteria.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'kode' => 'required',
            'nama' => 'required',
        ]);

        Kriteria::create($request->all());

        return redirect()->route('kriteria.index')
            ->with('success', 'Data kriteria berhasil ditambahkan');
    }

    public function edit(Kriteria $kriteria)
    {
        return view('kriteria.edit', compact('kriteria'));
    }

    public function update(Request $request, Kriteria $kriteria)
    {
        $request->validate([
            'kode' => 'required',
            'nama' => 'required',
        ]);

        $kriteria->update($request->all());

        return redirect()->route('kriteria.index')
            ->with('success', 'Data kriteria berhasil diubah');
    }

    public function destroy(Kriteria $kriteria)
    {
        $kriteria->delete();

        return redirect()->route('kriteria.index')
            ->with('success', 'Data kriteria berhasil dihapus');
    }
}