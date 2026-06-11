<x-app-layout>
    <div class="py-6">
        <div class="max-w-4xl mx-auto">

            <div class="bg-white shadow rounded p-6">

                <h2 class="text-2xl font-bold mb-6">
                    Edit Pelamar
                </h2>

                <form action="{{ route('pelamar.update', $pelamar->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div style="margin-bottom:15px;">
                        <label>Nama</label>
                        <input type="text"
                            name="nama"
                            value="{{ $pelamar->nama }}"
                            style="width:100%; padding:8px; border:1px solid #ccc;">
                    </div>

                    <div style="margin-bottom:15px;">
                        <label>Jenis Kelamin</label>

                        <select name="jenis_kelamin"
                            style="width:100%; padding:8px; border:1px solid #ccc;">

                            <option value="Laki-laki"
                                {{ $pelamar->jenis_kelamin == 'Laki-laki' ? 'selected' : '' }}>
                                Laki-laki
                            </option>

                            <option value="Perempuan"
                                {{ $pelamar->jenis_kelamin == 'Perempuan' ? 'selected' : '' }}>
                                Perempuan
                            </option>

                        </select>
                    </div>

                    <div style="margin-bottom:15px;">
                        <label>Pendidikan</label>
                        <input type="text"
                            name="pendidikan"
                            value="{{ $pelamar->pendidikan }}"
                            style="width:100%; padding:8px; border:1px solid #ccc;">
                    </div>

                    <div style="margin-bottom:15px;">
                        <label>Telepon</label>
                        <input type="text"
                            name="telepon"
                            value="{{ $pelamar->telepon }}"
                            style="width:100%; padding:8px; border:1px solid #ccc;">
                    </div>

                    <div style="margin-bottom:15px;">
                        <label>Alamat</label>
                        <textarea name="alamat"
                            style="width:100%; padding:8px; border:1px solid #ccc;">{{ $pelamar->alamat }}</textarea>
                    </div>

                    <button type="submit"
                        style="
                            background-color:#2563eb;
                            color:white;
                            padding:10px 20px;
                            border:none;
                            border-radius:5px;
                            cursor:pointer;
                        ">
                        Update
                    </button>

                    <a href="{{ route('pelamar.index') }}"
                        style="
                            background-color:#6b7280;
                            color:white;
                            padding:10px 20px;
                            text-decoration:none;
                            border-radius:5px;
                            margin-left:10px;
                        ">
                        Kembali
                    </a>

                </form>

            </div>

        </div>
    </div>
</x-app-layout>