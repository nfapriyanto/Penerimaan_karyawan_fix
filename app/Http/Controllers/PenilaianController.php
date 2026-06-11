<?php

namespace App\Http\Controllers;

use App\Models\Penilaian;
use App\Models\Pelamar;
use Illuminate\Http\Request;

class PenilaianController extends Controller
{
    public function index()
    {
        $penilaians = Penilaian::with('pelamar')->get();

        return view('penilaian.index', compact('penilaians'));
    }

    public function create()
    {
        $pelamars = Pelamar::all();

        return view('penilaian.create', compact('pelamars'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'pelamar_id' => 'required',
            'skill' => 'required|integer',
            'pengalaman' => 'required|integer',
            'pendidikan' => 'required|integer',
            'interview' => 'required|integer',
        ]);

        Penilaian::create($request->all());

        return redirect()->route('penilaian.index')
            ->with('success', 'Nilai berhasil disimpan');
    }

    public function edit(Penilaian $penilaian)
    {
        $pelamars = Pelamar::all();

        return view('penilaian.edit', compact('penilaian', 'pelamars'));
    }

    public function update(Request $request, Penilaian $penilaian)
    {
        $request->validate([
            'skill' => 'required|integer',
            'pengalaman' => 'required|integer',
            'pendidikan' => 'required|integer',
            'interview' => 'required|integer',
        ]);

        $penilaian->update($request->all());

        return redirect()->route('penilaian.index')
            ->with('success', 'Nilai berhasil diupdate');
    }

    public function destroy(Penilaian $penilaian)
    {
        $penilaian->delete();

        return redirect()->route('penilaian.index')
            ->with('success', 'Nilai berhasil dihapus');
    }
}