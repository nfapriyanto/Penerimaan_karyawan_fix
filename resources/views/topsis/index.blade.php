<x-app-layout>

<div style="padding:20px; background:#f3f4f6; min-height:100vh; font-family:Arial;">

    <h1 style="margin-bottom:25px; font-size:24px; font-weight:bold;">
        HASIL PERHITUNGAN TOPSIS
    </h1>

    <!-- ===================== -->
    <!-- 1. MATRIKS AWAL -->
    <!-- ===================== -->
    <h2 style="margin-bottom:10px;">Matriks Awal</h2>

    <table border="1" width="100%" cellpadding="10"
           style="background:white; margin-bottom:25px; border-collapse:collapse;">

        <tr style="background:#e5e7eb;">
            <th>Nama</th>
            <th>Skill</th>
            <th>Pengalaman</th>
            <th>Pendidikan</th>
            <th>Interview</th>
        </tr>

        @foreach($matrix as $m)
        <tr>
            <td>{{ $m['nama'] }}</td>
            <td>{{ $m['skill'] }}</td>
            <td>{{ $m['pengalaman'] }}</td>
            <td>{{ $m['pendidikan'] }}</td>
            <td>{{ $m['interview'] }}</td>
        </tr>
        @endforeach

    </table>

    <!-- ===================== -->
    <!-- 2. NORMALISASI -->
    <!-- ===================== -->
    <h2 style="margin-bottom:10px;">Normalisasi</h2>

    <table border="1" width="100%" cellpadding="10"
           style="background:white; margin-bottom:25px; border-collapse:collapse;">

        <tr style="background:#e5e7eb;">
            <th>Nama</th>
            <th>Skill</th>
            <th>Pengalaman</th>
            <th>Pendidikan</th>
            <th>Interview</th>
        </tr>

        @foreach($normalisasi as $n)
        <tr>
            <td>{{ $n['nama'] }}</td>
            <td>{{ number_format($n['skill'], 4) }}</td>
            <td>{{ number_format($n['pengalaman'], 4) }}</td>
            <td>{{ number_format($n['pendidikan'], 4) }}</td>
            <td>{{ number_format($n['interview'], 4) }}</td>
        </tr>
        @endforeach

    </table>

    <!-- ===================== -->
    <!-- 3. TERBOBOT -->
    <!-- ===================== -->
    <h2 style="margin-bottom:10px;">Terbobot (AHP)</h2>

    <table border="1" width="100%" cellpadding="10"
           style="background:white; margin-bottom:25px; border-collapse:collapse;">

        <tr style="background:#e5e7eb;">
            <th>Nama</th>
            <th>Skill</th>
            <th>Pengalaman</th>
            <th>Pendidikan</th>
            <th>Interview</th>
        </tr>

        @foreach($terbobot as $t)
        <tr>
            <td>{{ $t['nama'] }}</td>
            <td>{{ number_format($t['skill'], 4) }}</td>
            <td>{{ number_format($t['pengalaman'], 4) }}</td>
            <td>{{ number_format($t['pendidikan'], 4) }}</td>
            <td>{{ number_format($t['interview'], 4) }}</td>
        </tr>
        @endforeach

    </table>

    <!-- ===================== -->
    <!-- 4. KANDIDAT TERBAIK -->
    <!-- ===================== -->
    @php
        $best = $hasil[0] ?? null;
    @endphp

    @if($best)
    <div style="background:#16a34a; color:white; padding:15px; border-radius:8px; margin-bottom:25px;">
        <h2 style="margin:0;">🏆 Kandidat Terpilih</h2>
        <p style="font-size:18px; margin:5px 0;">
            {{ $best['nama'] }}
        </p>
        <p style="margin:0;">
            Nilai: {{ number_format($best['nilai'], 4) }}
        </p>
    </div>
    @endif

    <!-- ===================== -->
    <!-- 5. RANKING -->
    <!-- ===================== -->
    <h2 style="margin-bottom:10px;">Ranking TOPSIS</h2>

    <table border="1" width="100%" cellpadding="10"
           style="background:white; margin-bottom:25px; border-collapse:collapse;">

        <tr style="background:#e5e7eb;">
            <th>Rank</th>
            <th>Nama</th>
            <th>Nilai</th>
            <th>Status</th>
        </tr>

        @foreach($hasil as $h)
        <tr @if($h['rank'] == 1) style="background:#dcfce7;" @endif>

            <td style="text-align:center;">{{ $h['rank'] }}</td>
            <td>{{ $h['nama'] }}</td>
            <td style="text-align:center;">
                {{ number_format($h['nilai'], 4) }}
            </td>

            <td style="text-align:center;">

                @if($h['rank'] == 1)
                    <span style="background:#16a34a; color:white; padding:5px 10px; border-radius:5px;">
                        DITERIMA
                    </span>
                @else
                    <span style="background:#dc2626; color:white; padding:5px 10px; border-radius:5px;">
                        TIDAK DITERIMA
                    </span>
                @endif

            </td>

        </tr>
        @endforeach

    </table>

</div>

</x-app-layout>