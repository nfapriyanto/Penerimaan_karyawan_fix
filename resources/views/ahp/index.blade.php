<x-app-layout>

<div style="padding:20px; background:white;">

    <h2>Perbandingan Kriteria (AHP)</h2>

    <form method="POST" action="/ahp">
        @csrf

        <table border="1" width="100%" cellpadding="8">

            <tr style="background:#e5e7eb;">
                <th>Kriteria</th>
                <th>Skill</th>
                <th>Pengalaman</th>
                <th>Pendidikan</th>
                <th>Interview</th>
            </tr>

            @foreach($kriteria as $a)
            <tr>
                <td><b>{{ ucfirst($a) }}</b></td>

                @foreach($kriteria as $b)
                <td>

                    @if($a == $b)
                        <input type="hidden" name="nilai[{{ $a }}][{{ $b }}]" value="1">
                        1
                    @else
                        <select name="nilai[{{ $a }}][{{ $b }}]">
                            <option value="1">1</option>
                            <option value="3">3</option>
                            <option value="5">5</option>
                            <option value="7">7</option>
                            <option value="9">9</option>
                        </select>
                    @endif

                </td>
                @endforeach

            </tr>
            @endforeach

        </table>

        <br>

        <button type="submit" style="background:blue;color:white;padding:10px 15px;">
            Hitung Bobot AHP
        </button>

    </form>

    <!-- HASIL BOBOT -->
    @if(session('bobot_ahp'))
    <div style="margin-top:20px; padding:15px; background:#f3f4f6; border-radius:8px;">

        <h3>Hasil Bobot AHP</h3>

        @foreach(session('bobot_ahp') as $key => $value)
            <p>
                {{ ucfirst($key) }} :
                <b>{{ number_format($value, 3) }}</b>
            </p>
        @endforeach

    </div>
    @endif

</div>

</x-app-layout>