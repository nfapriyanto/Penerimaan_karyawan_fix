<x-app-layout>

    <div style="padding:20px;">

        <div style="margin-bottom:20px;">
            <a href="{{ route('kriteria.create') }}"
                style="
                    background-color:#2563eb;
                    color:white;
                    padding:10px 15px;
                    text-decoration:none;
                    border-radius:5px;
                ">
                Tambah Kriteria
            </a>
        </div>

        @if(session('success'))
            <div style="
                background-color:#d1fae5;
                color:#065f46;
                padding:10px;
                margin-bottom:15px;
                border-radius:5px;
            ">
                {{ session('success') }}
            </div>
        @endif

        <div style="
            background:white;
            padding:20px;
            border-radius:5px;
            box-shadow:0 0 10px rgba(0,0,0,0.1);
        ">

            <h2 style="margin-bottom:20px;">
                Data Kriteria
            </h2>

            <table border="1" width="100%" cellpadding="10" cellspacing="0">

                <thead>
                    <tr>
                        <th>No</th>
                        <th>Kode</th>
                        <th>Nama Kriteria</th>
                        <th>Aksi</th>
                    </tr>
                </thead>

                <tbody>

                    @forelse($kriterias as $kriteria)

                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $kriteria->kode }}</td>
                        <td>{{ $kriteria->nama }}</td>

                        <td>

                            <a href="{{ route('kriteria.edit', $kriteria->id) }}"
                                style="
                                    background-color:orange;
                                    color:white;
                                    padding:8px 12px;
                                    text-decoration:none;
                                    border-radius:5px;
                                ">
                                Edit
                            </a>

                            <form action="{{ route('kriteria.destroy', $kriteria->id) }}"
                                method="POST"
                                style="display:inline;">

                                @csrf
                                @method('DELETE')

                                <button type="submit"
                                    onclick="return confirm('Yakin hapus data?')"
                                    style="
                                        background-color:red;
                                        color:white;
                                        padding:8px 12px;
                                        border:none;
                                        border-radius:5px;
                                        cursor:pointer;
                                    ">
                                    Hapus
                                </button>

                            </form>

                        </td>

                    </tr>

                    @empty

                    <tr>
                        <td colspan="4" align="center">
                            Belum ada data kriteria
                        </td>
                    </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>

</x-app-layout>