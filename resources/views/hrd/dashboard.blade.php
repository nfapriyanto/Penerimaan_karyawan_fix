<x-app-layout>

<div class="bg-gray-100 min-h-screen">

    <div class="flex">

        <!-- SIDEBAR -->
        <div class="w-56 bg-white shadow-md min-h-screen p-4">

            <h2 class="text-lg font-bold mb-5">HRD PANEL</h2>

            <nav class="space-y-2 text-sm">

                <a href="{{ route('dashboard') }}"
                   class="block p-2 rounded hover:bg-blue-100">
                    🏠 Dashboard
                </a>

                <a href="{{ route('pelamar.index') }}"
                   class="block p-2 rounded hover:bg-blue-100">
                    👤 Pelamar
                </a>

                <a href="{{ route('kriteria.index') }}"
                   class="block p-2 rounded hover:bg-blue-100">
                    📊 Kriteria
                </a>

                <a href="{{ route('penilaian.index') }}"
                   class="block p-2 rounded hover:bg-blue-100">
                    📝 Penilaian
                </a>

                <a href="{{ url('/topsis') }}"
                   class="block p-2 rounded hover:bg-blue-100">
                    🏆 TOPSIS
                </a>

            </nav>

        </div>

        <!-- CONTENT -->
        <div class="flex-1 p-4">

            <!-- HEADER -->
            <div class="bg-white p-4 rounded shadow mb-4">

                <h1 class="text-xl font-bold">Dashboard HRD</h1>
                <p class="text-sm text-gray-500">
                    AHP + TOPSIS System
                </p>

            </div>

            <!-- GRID CARD -->
            <div class="grid grid-cols-2 lg:grid-cols-4 gap-3">

                <a href="{{ route('pelamar.index') }}"
                   class="bg-blue-500 text-white p-4 rounded shadow hover:scale-105 transition text-center">

                    <div class="text-lg">👤</div>
                    <div class="font-bold text-sm">Pelamar</div>

                </a>

                <a href="{{ route('kriteria.index') }}"
                   class="bg-green-500 text-white p-4 rounded shadow hover:scale-105 transition text-center">

                    <div class="text-lg">📊</div>
                    <div class="font-bold text-sm">Kriteria</div>

                </a>

                <a href="{{ route('penilaian.index') }}"
                   class="bg-yellow-500 text-white p-4 rounded shadow hover:scale-105 transition text-center">

                    <div class="text-lg">📝</div>
                    <div class="font-bold text-sm">Penilaian</div>

                </a>

                <a href="{{ url('/topsis') }}"
                   class="bg-purple-600 text-white p-4 rounded shadow hover:scale-105 transition text-center">

                    <div class="text-lg">🏆</div>
                    <div class="font-bold text-sm">TOPSIS</div>

                </a>

            </div>

            <!-- FLOW MINI -->
            <div class="mt-4 bg-white p-4 rounded shadow text-sm">

                <div class="font-bold mb-2">Alur HRD</div>

                <div class="grid grid-cols-2 gap-1 text-gray-600">

                    <div>1. Input Pelamar</div>
                    <div>2. Input Penilaian</div>
                    <div>3. Hitung AHP</div>
                    <div>4. TOPSIS Ranking</div>

                </div>

            </div>

        </div>

    </div>

</div>

</x-app-layout>