<x-app-layout>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="mb-4">
                <a href="{{ route('penilaian.create') }}"
                    style="
                        background-color:#2563eb;
                        color:white;
                        padding:10px 15px;
                        text-decoration:none;
                        border-radius:5px;
                    ">
                    + Tambah Penilaian
                </a>
            </div>

            @if(session('success'))
                <div style="
                    background:#d1fae5;
                    color:#065f46;
                    padding:10px;
                    margin-bottom:10px;
                    border-radius:5px;
                ">
                    {{ session('success') }}
                </div>
            @endif

            <div style="background:white; padding:20px; border-radius:5px;">

                <table border="1" width="100%" cellpadding="10">

                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Pelamar</th>
                            <th>Skill</th>
                            <th>Pengalaman</th>
                            <th>Pendidikan</th>
                            <th>Interview</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($penilaians as $penilaian)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $penilaian->pelamar->nama }}</td>
                            <td>{{ $penilaian->skill }}</td>
                            <td>{{ $penilaian->pengalaman }}</td>
                            <td>{{ $penilaian->pendidikan }}</td>
                            <td>{{ $penilaian->interview }}</td>

                            <td>

                                <a href="{{ route('penilaian.edit', $penilaian->id) }}"
                                    style="
                                        background:orange;
                                        color:white;
                                        padding:5px 10px;
                                        text-decoration:none;
                                        border-radius:5px;
                                    ">
                                    Edit
                                </a>

                                <form action="{{ route('penilaian.destroy', $penilaian->id) }}"
                                    method="POST"
                                    style="display:inline;">

                                    @csrf
                                    @method('DELETE')

                                    <button type="submit"
                                        onclick="return confirm('Hapus data?')"
                                        style="
                                            background:red;
                                            color:white;
                                            padding:5px 10px;
                                            border:none;
                                            border-radius:5px;
                                        ">
                                        Hapus
                                    </button>

                                </form>

                            </td>
                        </tr>
                        @endforeach
                    </tbody>

                </table>

            </div>

        </div>
    </div>

</x-app-layout>