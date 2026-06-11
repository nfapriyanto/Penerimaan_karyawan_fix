<?php

namespace App\Http\Controllers;

use App\Models\Pelamar;
use Illuminate\Http\Request;

class PelamarController extends Controller
{
    /**
     * Menampilkan semua data pelamar
     */
    public function index()
    {
        $pelamars = Pelamar::latest()->get();

        return view('pelamar.index', compact('pelamars'));
    }

    /**
     * Menampilkan form tambah pelamar
     */
    public function create()
    {
        return view('pelamar.create');
    }

    /**
     * Menyimpan data pelamar
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'jenis_kelamin' => 'required',
            'pendidikan' => 'required',
            'telepon' => 'required',
            'alamat' => 'required',
        ]);

        Pelamar::create($request->all());

        return redirect()->route('pelamar.index')
            ->with('success', 'Data pelamar berhasil ditambahkan');
    }

    /**
     * Menampilkan detail pelamar
     */
    public function show(Pelamar $pelamar)
    {
        return view('pelamar.show', compact('pelamar'));
    }

    /**
     * Menampilkan form edit
     */
    public function edit(Pelamar $pelamar)
    {
        return view('pelamar.edit', compact('pelamar'));
    }

    /**
     * Update data pelamar
     */
    public function update(Request $request, Pelamar $pelamar)
    {
        $request->validate([
            'nama' => 'required',
            'jenis_kelamin' => 'required',
            'pendidikan' => 'required',
            'telepon' => 'required',
            'alamat' => 'required',
        ]);

        $pelamar->update($request->all());

        return redirect()->route('pelamar.index')
            ->with('success', 'Data pelamar berhasil diupdate');
    }

    /**
     * Hapus data pelamar
     */
    public function destroy(Pelamar $pelamar)
    {
        $pelamar->delete();

        return redirect()->route('pelamar.index')
            ->with('success', 'Data pelamar berhasil dihapus');
    }
}