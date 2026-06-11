<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BobotAhp;

class AhpController extends Controller
{
    public function index()
    {
        $kriteria = ['skill', 'pengalaman', 'pendidikan', 'interview'];

        return view('ahp.index', compact('kriteria'));
    }

    public function store(Request $request)
    {
         $matrix = $request->nilai;

    $bobot = $this->hitungBobotAHP($matrix);

    // HAPUS DATA LAMA
    BobotAhp::truncate();

    // SIMPAN KE DATABASE
    foreach ($bobot as $key => $value) {
        BobotAhp::create([
            'kriteria' => $key,
            'nilai' => $value
        ]);
    }

    return redirect()->back()->with('success', 'Bobot AHP berhasil disimpan permanen');
}

    private function hitungBobotAHP($matrix)
    {
        $kriteria = array_keys($matrix);
        $n = count($kriteria);

        // 1. jumlah tiap kolom
        $jumlahKolom = [];

        foreach ($kriteria as $j) {
            $jumlahKolom[$j] = 0;

            foreach ($kriteria as $i) {
                $jumlahKolom[$j] += $matrix[$i][$j];
            }
        }

        // 2. normalisasi matrix
        $normal = [];

        foreach ($kriteria as $i) {
            foreach ($kriteria as $j) {
                $normal[$i][$j] = $matrix[$i][$j] / $jumlahKolom[$j];
            }
        }

        // 3. hitung bobot (rata-rata baris)
        $bobot = [];

        foreach ($kriteria as $i) {
            $bobot[$i] = array_sum($normal[$i]) / $n;
        }

        return $bobot;
    }
}