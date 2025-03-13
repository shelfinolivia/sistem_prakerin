@extends('layouts.app')

@section('content')
<!-- Tombol Toggle Sidebar -->
<div id="menu-icon" class="fixed left-5 top-5 text-2xl text-white bg-blue-900 p-3 rounded-full cursor-pointer transition-all duration-300 hidden" onclick="toggleSidebar()">
    <i class="fa-solid fa-bars"></i>
</div> 

    <div id="main-content" class="flex-1 p-6 overflow-auto transition-all duration-300">
        <!-- Header Selamat Datang -->
        <div class="mt-6 bg-white p-6 rounded-lg shadow-md flex items-center justify-between">
            <div>
                <h3 class="text-lg font-semibold">Selamat datang, {{ auth()->user()->name ?? 'Siswa' }}!</h3>
                <p class="text-gray-600">Silakan gunakan aplikasi ini untuk mengelola magang Anda.</p>
            </div>
            <a href="{{ route('profile.edit') }}" class="bg-yellow-500 text-white px-4 py-2 rounded hover:bg-yellow-600">
                Edit Profil
            </a>
        </div>

        <!-- Informasi Magang -->
        <div class="mt-6 bg-white p-6 rounded-lg shadow-md">
            <h3 class="text-lg font-semibold text-blue-900">Informasi Magang</h3>
            <div class="grid grid-cols-2 gap-4 mt-4">
                <div class="p-4 bg-green-100 rounded-lg">
                    <h4 class="font-bold">Nama Perusahaan</h4>
                    <p class="text-green-700">{{ $dataSiswa->nama_perusahaan ?? "Belum Ada" }}</p>
                </div>
                <div class="p-4 bg-green-100 rounded-lg">
                    <h4 class="font-bold">Posisi Magang</h4>
                    <p class="text-green-700">{{ $dataSiswa->posisi_magang ?? "Belum Ada"}}</p>
                </div>
                <div class="p-4 bg-green-100 rounded-lg">
                    <h4 class="font-bold">Tanggal Mulai</h4>
                    <p class="text-green-700">{{ $dataSiswa->tanggal_mulai ?? "Belum Ada"}}</p>
                </div>
                <div class="p-4 bg-green-100 rounded-lg">
                    <h4 class="font-bold">Tanggal Selesai</h4>
                    <p class="text-green-700">{{ $dataSiswa->tanggal_selesai ?? "Belum Ada"}}</p>
                </div>
            </div>
        </div>
        

        <!-- Riwayat Unggahan Laporan -->
        <div class="mt-6 bg-white p-6 rounded-lg shadow-md">
            <h3 class="text-lg font-semibold text-blue-900">Riwayat Unggahan Laporan</h3>
        
            @if($reports->isEmpty())
                <p class="text-gray-500 mt-4">Belum ada laporan yang diunggah.</p>
            @else
                <ul class="mt-4 space-y-2">
                    @foreach ($reports as $report)
                        <li class="flex justify-between items-center p-3 bg-gray-100 border rounded-md hover:bg-gray-200 transition-all">
                            <div class="flex flex-col">
                                <span class="text-gray-800 font-medium">{{ $report->nama_file }}</span>
                                <span class="text-sm text-gray-600">Status: 
                                    <strong class="{{ $report->status == 'terkirim' ? 'text-green-600' : 'text-red-600' }}">
                                        {{ ucfirst($report->status) }}
                                    </strong>
                                </span>
                            </div>
                            <div class="flex space-x-2">
                                <a href="{{ asset('storage/' . $report->file_path) }}" target="_blank" class="bg-blue-500 text-white px-3 py-1 rounded hover:bg-blue-600 flex items-center gap-2 transition-all">
                                    <i class="fa-solid fa-eye"></i>
                                </a>
                                @if($report->status == 'belum dikirim')
                                    <form method="POST" action="{{ route('report.send', $report->id) }}">
                                        @csrf
                                        <button type="submit" class="bg-yellow-500 text-white px-3 py-1 rounded hover:bg-yellow-600 flex items-center gap-2 transition-all">
                                            <i class="fa-solid fa-paper-plane"></i>
                                        </button>
                                    </form>
                                @endif
                                <form method="POST" action="{{ route('report.delete', $report->id) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600 flex items-center gap-2 transition-all">
                                        <i class="fa-solid fa-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </li>
                    @endforeach
                </ul>
            @endif
        </div>        
    </div>
@endsection

@section('scripts')
<script>
    function deleteReport(filename) {
        if (confirm("Apakah Anda yakin ingin menghapus " + filename + "?")) {
            alert(filename + " berhasil dihapus.");
            // Implementasi penghapusan laporan dari database bisa ditambahkan di sini.
        }
    }

    function viewReport(filename) {
        alert("Membuka " + filename);
        // Implementasi membuka file bisa ditambahkan di sini (misalnya window.open).
    }
</script>
@endsection
