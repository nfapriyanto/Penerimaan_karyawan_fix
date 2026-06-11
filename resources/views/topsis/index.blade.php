<x-app-layout>

<div style="padding:20px; background:white; min-height:100vh;">

    <h2>Matriks Awal (Data Penilaian)</h2>

    <table border="1" width="100%" cellpadding="8">
        <tr>
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

    <br><br>

    <h2>Matriks Normalisasi (TOPSIS STEP 2)</h2>

    <table border="1" width="100%" cellpadding="8">
        <tr>
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

        <br><br>

    <h2>Matriks Terbobot (AHP)</h2>

    <table border="1" width="100%" cellpadding="8">
        <tr>
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

        <br><br>

    <h2>Hasil Akhir & Ranking TOPSIS</h2>

    <table border="1" width="100%" cellpadding="8">
        <tr>
            <th>Rank</th>
            <th>Nama</th>
            <th>Nilai Preferensi</th>
        </tr>

        @foreach($hasil as $h)
        <tr>
            <td>{{ $h['rank'] }}</td>
            <td>{{ $h['nama'] }}</td>
            <td>{{ number_format($h['nilai'], 4) }}</td>
        </tr>
        @endforeach
    </table>

</div>

</x-app-layout>