<x-app-layout>

    <div style="padding: 20px;">

        <div style="margin-bottom: 20px;">
            <a href="{{ route('pelamar.create') }}"
                style="
                    background-color: #2563eb;
                    color: white;
                    padding: 10px 15px;
                    text-decoration: none;
                    border-radius: 5px;
                ">
                Tambah Pelamar
            </a>
        </div>

        @if(session('success'))
            <div style="
                background-color: #d1fae5;
                color: #065f46;
                padding: 10px;
                margin-bottom: 15px;
                border-radius: 5px;
            ">
                {{ session('success') }}
            </div>
        @endif

        <div style="
            background-color: white;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        ">

            <table border="1" width="100%" cellpadding="10" cellspacing="0">

                <thead>
                    <tr style="background-color: #f3f4f6;">
                        <th>No</th>
                        <th>Nama</th>
                        <th>Jenis Kelamin</th>
                        <th>Pendidikan</th>
                        <th>Telepon</th>
                        <th>Aksi</th>
                    </tr>
                </thead>

                <tbody>

                    @forelse($pelamars as $pelamar)

                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $pelamar->nama }}</td>
                        <td>{{ $pelamar->jenis_kelamin }}</td>
                        <td>{{ $pelamar->pendidikan }}</td>
                        <td>{{ $pelamar->telepon }}</td>

                        <td>

                            <a href="{{ route('pelamar.edit', $pelamar->id) }}"
                                style="
                                    background-color: orange;
                                    color: white;
                                    padding: 8px 12px;
                                    text-decoration: none;
                                    border-radius: 5px;
                                    display: inline-block;
                                ">
                                Edit
                            </a>

                            <form action="{{ route('pelamar.destroy', $pelamar->id) }}"
                                method="POST"
                                style="display:inline;">

                                @csrf
                                @method('DELETE')

                                <button type="submit"
                                    onclick="return confirm('Yakin hapus data?')"
                                    style="
                                        background-color: red;
                                        color: white;
                                        padding: 8px 12px;
                                        border: none;
                                        border-radius: 5px;
                                        cursor: pointer;
                                        margin-left: 5px;
                                    ">
                                    Hapus
                                </button>

                            </form>

                        </td>

                    </tr>

                    @empty

                    <tr>
                        <td colspan="6" style="text-align:center;">
                            Belum ada data pelamar
                        </td>
                    </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>

</x-app-layout>