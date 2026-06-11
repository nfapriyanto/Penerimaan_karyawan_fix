<?php

namespace App\Http\Controllers;

use App\Models\Penilaian;
use App\Models\BobotAhp;
use App\Models\HasilTopsis;

class TopsisController extends Controller
{
    public function index()
    {
        $data = Penilaian::with('pelamar')->get();

        // =========================
        // 1. MATRIKS AWAL
        // =========================
        $matrix = [];

        foreach ($data as $item) {
            $matrix[] = [
                'nama' => $item->pelamar->nama,
                'skill' => $item->skill,
                'pengalaman' => $item->pengalaman,
                'pendidikan' => $item->pendidikan,
                'interview' => $item->interview,
            ];
        }

        // =========================
        // 2. NORMALISASI
        // =========================
        $sum = [
            'skill' => 0,
            'pengalaman' => 0,
            'pendidikan' => 0,
            'interview' => 0,
        ];

        foreach ($matrix as $m) {
            $sum['skill'] += pow($m['skill'], 2);
            $sum['pengalaman'] += pow($m['pengalaman'], 2);
            $sum['pendidikan'] += pow($m['pendidikan'], 2);
            $sum['interview'] += pow($m['interview'], 2);
        }

        $root = [
            'skill' => sqrt($sum['skill']),
            'pengalaman' => sqrt($sum['pengalaman']),
            'pendidikan' => sqrt($sum['pendidikan']),
            'interview' => sqrt($sum['interview']),
        ];

        $normalisasi = [];

        foreach ($matrix as $m) {
            $normalisasi[] = [
                'nama' => $m['nama'],
                'skill' => $root['skill'] ? $m['skill'] / $root['skill'] : 0,
                'pengalaman' => $root['pengalaman'] ? $m['pengalaman'] / $root['pengalaman'] : 0,
                'pendidikan' => $root['pendidikan'] ? $m['pendidikan'] / $root['pendidikan'] : 0,
                'interview' => $root['interview'] ? $m['interview'] / $root['interview'] : 0,
            ];
        }

        // =========================
        // 3. BOBOT AHP
        // =========================
        $bobot = BobotAhp::pluck('nilai', 'kriteria')->toArray();

        $bobot = array_merge([
            'skill' => 0.4,
            'pengalaman' => 0.3,
            'pendidikan' => 0.2,
            'interview' => 0.1,
        ], $bobot);

        // =========================
        // 4. TERBOBOT
        // =========================
        $terbobot = [];

        foreach ($normalisasi as $n) {
            $terbobot[] = [
                'nama' => $n['nama'],
                'skill' => $n['skill'] * $bobot['skill'],
                'pengalaman' => $n['pengalaman'] * $bobot['pengalaman'],
                'pendidikan' => $n['pendidikan'] * $bobot['pendidikan'],
                'interview' => $n['interview'] * $bobot['interview'],
            ];
        }

        // =========================
        // 5. SOLUSI IDEAL
        // =========================
        $aPlus = [
            'skill' => max(array_column($terbobot, 'skill')),
            'pengalaman' => max(array_column($terbobot, 'pengalaman')),
            'pendidikan' => max(array_column($terbobot, 'pendidikan')),
            'interview' => max(array_column($terbobot, 'interview')),
        ];

        $aMin = [
            'skill' => min(array_column($terbobot, 'skill')),
            'pengalaman' => min(array_column($terbobot, 'pengalaman')),
            'pendidikan' => min(array_column($terbobot, 'pendidikan')),
            'interview' => min(array_column($terbobot, 'interview')),
        ];

        // =========================
        // 6. HITUNG NILAI PREFERENSI
        // =========================
        $hasil = [];

        foreach ($terbobot as $t) {

            $dPlus = sqrt(
                pow($t['skill'] - $aPlus['skill'], 2) +
                pow($t['pengalaman'] - $aPlus['pengalaman'], 2) +
                pow($t['pendidikan'] - $aPlus['pendidikan'], 2) +
                pow($t['interview'] - $aPlus['interview'], 2)
            );

            $dMin = sqrt(
                pow($t['skill'] - $aMin['skill'], 2) +
                pow($t['pengalaman'] - $aMin['pengalaman'], 2) +
                pow($t['pendidikan'] - $aMin['pendidikan'], 2) +
                pow($t['interview'] - $aMin['interview'], 2)
            );

            $v = ($dMin + $dPlus) != 0 ? $dMin / ($dMin + $dPlus) : 0;

            $hasil[] = [
                'nama' => $t['nama'],
                'nilai' => $v
            ];
        }

        // =========================
        // 7. SORTING
        // =========================
        usort($hasil, function ($a, $b) {
            return $b['nilai'] <=> $a['nilai'];
        });

        // =========================
        // 8. TAMBAH RANK (WAJIB SEBELUM SAVE)
        // =========================
        foreach ($hasil as $i => $h) {
            $hasil[$i]['rank'] = $i + 1;
        }

        // =========================
        // 9. AUTO SAVE KE DATABASE (FIX FINAL)
        // =========================
        HasilTopsis::truncate();

        foreach ($hasil as $h) {
            HasilTopsis::create([
                'nama' => $h['nama'],
                'nilai' => $h['nilai'],
                'rank' => $h['rank']
            ]);
        }

        // =========================
        // RETURN VIEW HRD
        // =========================
        return view('topsis.index', compact(
            'matrix',
            'normalisasi',
            'terbobot',
            'hasil'
        ));
    }
        
    //=========================
    // PIMPINAN (AMBIL DARI DB)
    // =========================
    public function pimpinan()
{
    $hasil = HasilTopsis::orderBy('rank', 'asc')->get();

    return view('pimpinan.dashboard', compact('hasil'));
}
}