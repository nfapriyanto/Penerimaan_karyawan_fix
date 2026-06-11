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
                        <input type="number" name="skill" min="0" max="100" style="width:100%; padding:8px;">
                    </div>

                    <div style="margin-bottom:10px;">
                        <label>Pengalaman</label>
                        <input type="number" name="pengalaman"  min="0" max="100" style="width:100%; padding:8px;">
                    </div>

                    <div style="margin-bottom:10px;">
                        <label>Pendidikan</label>
                        <input type="number" name="pendidikan"  min="0" max="100" style="width:100%; padding:8px;">
                    </div>

                    <div style="margin-bottom:10px;">
                        <label>Interview</label>
                        <input type="number" name="interview" style="width:100%; min="0" max="100" padding:8px;">
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