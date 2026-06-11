<x-app-layout>

<div style="padding:20px; background:#f3f4f6; min-height:100vh;">

    <h1 style="margin-bottom:20px;">👔 DASHBOARD PIMPINAN</h1>

    @php
        $hasil = $hasil ?? [];
        $best = $hasil[0] ?? null;
    @endphp

    <!-- KANDIDAT TERBAIK -->
    @if($best)
    <div style="background:#16a34a; color:white; padding:15px; border-radius:10px; margin-bottom:20px;">
        <h2>🏆 Kandidat Terpilih</h2>
        <p style="font-size:18px;">{{ $best->nama }}</p>
        <p>Nilai: {{ number_format($best->nilai, 4) }}</p>
    </div>
    @endif

    <!-- INFO TOTAL -->
    <div style="background:white; padding:15px; border-radius:10px; margin-bottom:20px;">
        <h3>📊 Ringkasan</h3>
        <p>Total Kandidat: {{ count($hasil) }}</p>
    </div>

    <!-- TABLE HASIL -->
    <table border="1" width="100%" cellpadding="10" style="background:white; border-collapse:collapse;">

        <tr style="background:#e5e7eb;">
            <th>Rank</th>
            <th>Nama</th>
            <th>Nilai</th>
            <th>Status</th>
        </tr>

        @foreach($hasil as $h)
        <tr @if($h->rank == 1) style="background:#dcfce7;" @endif>

            <td>{{ $h->rank }}</td>
            <td>{{ $h->nama }}</td>
            <td>{{ number_format($h->nilai, 4) }}</td>
            <td>
                @if($h->rank == 1)
                    <b style="color:green;">DITERIMA</b>
                @else
                    Tidak Diterima
                @endif
            </td>

        </tr>
        @endforeach

    </table>

</div>

</x-app-layout>