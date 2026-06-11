<x-app-layout>

    <div class="py-6">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">

            <div style="background:white; padding:20px; border-radius:5px;">

                <h2 style="margin-bottom:20px;">Input Penilaian Pelamar</h2>

                <form action="{{ route('penilaian.store') }}" method="POST">
                    @csrf

                    <div style="margin-bottom:10px;">
                        <label>Pilih Pelamar</label>
                        <select name="pelamar_id" style="width:100%; padding:8px;">
                            <option value="">-- pilih --</option>
                            @foreach($pelamars as $p)
                                <option value="{{ $p->id }}">{{ $p->nama }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div style="margin-bottom:10px;">
                        <label>Skill</label>

                        <select name="skill" style="width:100%; padding:8px;" required>
                            <option value="">-- Pilih Skill --</option>
                            <option value="1">Buruk</option>
                            <option value="2">Cukup</option>
                            <option value="3">Baik</option>
                            <option value="4">Sangat Baik</option>
                         </select>
                        </div>

                    <div style="margin-bottom:10px;">
                         <label>Pengalaman Kerja</label>

                         <select name="pengalaman" style="width:100%; padding:8px;" required>

                        <option value="">-- Pilih Pengalaman --</option>

                        <option value="1">< 1 Tahun</option>
                        <option value="2">1 - 2 Tahun</option>
                        <option value="3">3 - 5 Tahun</option>
                        <option value="4">> 5 Tahun</option>

                    </select>
                    </div>

                    <div style="margin-bottom:10px;">
                        <label>Pendidikan</label>

                         <select name="pendidikan" style="width:100%; padding:8px;" required>
                            <option value="">-- Pilih Pendidikan --</option>
                            <option value="1">SMA</option>
                            <option value="2">D3</option>
                            <option value="3">S1</option>
                            <option value="4">S2</option>
                        </select>
                        </div>

                    <div style="margin-bottom:10px;">
                        <label>Interview</label>

                        <select name="interview" style="width:100%; padding:8px;" required>
                            <option value="">-- Pilih Interview --</option>
                            <option value="1">Buruk</option>
                            <option value="2">Cukup</option>
                            <option value="3">Baik</option>
                            <option value="4">Sangat Baik</option>
                        </select>
                        </div>

                    <button type="submit"
                        style="
                            background:#2563eb;
                            color:white;
                            padding:10px 15px;
                            border:none;
                            border-radius:5px;
                        ">
                        Simpan Penilaian
                    </button>

                </form>

            </div>

        </div>
    </div>

</x-app-layout>