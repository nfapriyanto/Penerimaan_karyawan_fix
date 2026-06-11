<?php

namespace App\Http\Controllers;

use App\Models\Penilaian;
use App\Models\BobotKriteria;

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
        $bobotData = BobotKriteria::all()->keyBy('kode');

        $bobot = [
            'C1' => $bobotData['C1']->bobot ?? 0.4,
            'C2' => $bobotData['C2']->bobot ?? 0.3,
            'C3' => $bobotData['C3']->bobot ?? 0.2,
            'C4' => $bobotData['C4']->bobot ?? 0.1,
        ];

        // =========================
        // 4. TERBOBOT
        // =========================
        $terbobot = [];

        foreach ($normalisasi as $n) {
            $terbobot[] = [
                'nama' => $n['nama'],
                'skill' => $n['skill'] * $bobot['C1'],
                'pengalaman' => $n['pengalaman'] * $bobot['C2'],
                'pendidikan' => $n['pendidikan'] * $bobot['C3'],
                'interview' => $n['interview'] * $bobot['C4'],
            ];
        }

        // =========================
        // 5. SOLUSI IDEAL (+ / -)
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
        // 6. JARAK + PREFERENSI
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
        // 7. RANKING
        // =========================
        usort($hasil, function ($a, $b) {
            return $b['nilai'] <=> $a['nilai'];
        });

        foreach ($hasil as $i => $h) {
            $hasil[$i]['rank'] = $i + 1;
        }

        // =========================
        // RETURN VIEW
        // =========================
        return view('topsis.index', compact(
            'matrix',
            'normalisasi',
            'terbobot',
            'hasil'
        ));
    }
}