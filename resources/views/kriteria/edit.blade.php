<x-app-layout>

    <div style="padding:20px;">

        <div style="
            background:white;
            padding:20px;
            border-radius:5px;
            box-shadow:0 0 10px rgba(0,0,0,0.1);
        ">

            <h2>Edit Kriteria</h2>

            <form action="{{ route('kriteria.update', $kriteria->id) }}" method="POST">

                @csrf
                @method('PUT')

                <div style="margin-bottom:15px;">
                    <label>Kode Kriteria</label>
                    <input type="text"
                        name="kode"
                        value="{{ $kriteria->kode }}"
                        style="width:100%; padding:8px;">
                </div>

                <div style="margin-bottom:15px;">
                    <label>Nama Kriteria</label>
                    <input type="text"
                        name="nama"
                        value="{{ $kriteria->nama }}"
                        style="width:100%; padding:8px;">
                </div>

                <button type="submit"
                    style="
                        background-color:blue;
                        color:white;
                        padding:10px 15px;
                        border:none;
                        border-radius:5px;
                    ">
                    Update
                </button>

            </form>

        </div>

    </div>

</x-app-layout>