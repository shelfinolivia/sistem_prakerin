@extends('layouts.app')

@section('title', 'Unggah Laporan Prakerin')

@section('content')
    <div class="p-6 bg-white shadow-md rounded-lg">
        <h3 class="text-lg font-semibold">Unggah Laporan Prakerin</h3>

        <!-- Form Upload Laporan -->
        <form id="form-unggah-laporan" action="{{ route('report.upload') }}" method="POST" enctype="multipart/form-data" class="mt-4">
            @csrf
            <input type="file" id="report" name="report" class="w-full p-2 border rounded" required>
            <button type="submit" class="mt-4 bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">
                Unggah
            </button>
        </form>
    </div>

    <!-- Riwayat Unggahan Laporan -->
    <div class="mt-6 bg-white p-6 rounded-lg shadow-md">
        <h3 class="text-lg font-semibold text-blue-900">Riwayat Unggahan Laporan</h3>

        <ul class="mt-4 space-y-2">
            @foreach ($reports as $report)
                <li class="flex justify-between items-center p-3 bg-gray-100 border rounded-md hover:bg-gray-200 transition-all">
                    <div class="flex flex-col">
                        <span class="text-gray-800 font-medium">{{ $report->nama_file }}</span>
                        <span class="text-sm text-gray-600">Status: <strong class="{{ $report->status == 'terkirim' ? 'text-green-600' : 'text-red-600' }}">
                            {{ ucfirst($report->status) }}
                        </strong></span>
                    </div>
                    
                    <div class="flex space-x-2">
                        <!-- Tombol Lihat -->
                        <a href="{{ asset('storage/' . $report->file_path) }}" target="_blank" class="bg-blue-500 text-white px-3 py-1 rounded hover:bg-blue-600 flex items-center gap-2 transition-all">
                            <i class="fa-solid fa-eye"></i> 
                        </a>

                        <!-- Tombol Kirim -->
                        @if($report->status == 'belum dikirim')
                            <form method="POST" action="{{ route('report.send', $report->id) }}">
                                @csrf
                                <button type="submit" class="bg-yellow-500 text-white px-3 py-1 rounded hover:bg-yellow-600 flex items-center gap-2 transition-all">
                                    <i class="fa-solid fa-paper-plane"></i>
                                </button>
                            </form>
                        @endif

                        <!-- Tombol Hapus -->
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
    </div>
@endsection
