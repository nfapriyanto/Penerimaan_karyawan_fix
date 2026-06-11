<x-app-layout>
    <div class="py-6">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white shadow rounded p-6">

                <h2 class="text-2xl font-bold mb-6">
                    Tambah Pelamar
                </h2>

                @if ($errors->any())
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('pelamar.store') }}" method="POST">
                    @csrf

                    <div class="mb-4">
                        <label class="block mb-2 font-medium">
                            Nama
                        </label>

                        <input type="text"
                            name="nama"
                            class="w-full border rounded px-3 py-2"
                            required>
                    </div>

                    <div class="mb-4">
                        <label class="block mb-2 font-medium">
                            Jenis Kelamin
                        </label>

                        <select name="jenis_kelamin"
                            class="w-full border rounded px-3 py-2"
                            required>

                            <option value="">-- Pilih --</option>
                            <option value="Laki-laki">Laki-laki</option>
                            <option value="Perempuan">Perempuan</option>

                        </select>
                    </div>

                    <div class="mb-4">
                        <label class="block mb-2 font-medium">
                            Pendidikan
                        </label>

                        <input type="text"
                            name="pendidikan"
                            class="w-full border rounded px-3 py-2"
                            required>
                    </div>

                    <div class="mb-4">
                        <label class="block mb-2 font-medium">
                            Telepon
                        </label>

                        <input type="text"
                            name="telepon"
                            class="w-full border rounded px-3 py-2"
                            required>
                    </div>

                    <div class="mb-4">
                        <label class="block mb-2 font-medium">
                            Alamat
                        </label>

                        <textarea name="alamat"
                            rows="4"
                            class="w-full border rounded px-3 py-2"
                            required></textarea>
                    </div>

                    <div class="flex gap-2">

                        <button type="submit"
                        style="background-color: blue; color: white; padding: 10px 20px; border-radius: 5px;">
                        Simpan
                        </button>

                        <a href="{{ route('pelamar.index') }}"
                            class="bg-gray-500 text-white px-4 py-2 rounded">
                            Kembali
                        </a>

                    </div>

                </form>

            </div>

        </div>
    </div>
</x-app-layout>