@extends('layouts.app')

@section('title', 'Status Pengajuan')

@section('content')
<div class="bg-white p-6 shadow-md rounded-lg">
    <h3 class="text-lg font-semibold mb-4">Status Pengajuan</h3>

    <div class="grid grid-cols-1 sm:grid-cols-3 gap-6">
        {{-- Nama --}}
        <div class="p-4 bg-blue-50 border border-blue-200 rounded-lg shadow-sm">
            <p class="font-medium text-gray-700">Nama Peserta</p>
            @if($dataStatus)
            <p id="tanggal-mulai" class="text-gray-600">{{ $dataStatus->nama_siswa }}</p>
            @else
            <p id="tanggal-mulai" class="text-gray-600">-</p>
            @endif
        </div>

        <!-- Tanggal Mulai -->
        <div class="p-4 bg-blue-50 border border-blue-200 rounded-lg shadow-sm">
            <p class="font-medium text-gray-700">Tanggal Mulai</p>
            @if($dataStatus)
            <p id="tanggal-mulai" class="text-gray-600">{{ $dataStatus->tanggal_mulai }}</p>
            @else
            <p id="tanggal-mulai" class="text-gray-600">-</p>
            @endif
        </div>

        <!-- Tanggal Selesai -->
        <div class="p-4 bg-blue-50 border border-blue-200 rounded-lg shadow-sm">
            <p class="font-medium text-gray-700">Tanggal Selesai</p>
            @if($dataStatus)
            <p id="tanggal-mulai" class="text-gray-600">{{ $dataStatus->tanggal_selesai }}</p>
            @else
            <p id="tanggal-mulai" class="text-gray-600">-</p>
            @endif
        </div>
    </div>

    {{-- <div class="mt-6 flex justify-start">
        <button id="updateStatusBtn" class="bg-green-600 text-white px-5 py-2 rounded-lg font-medium shadow-md hover:bg-green-700 transition duration-200">
            Update Status
        </button>
    </div> --}}
</div>

<!-- Form Update Status -->
<div id="form-status" class="mt-6 bg-white p-6 rounded-lg shadow-md hidden transition-all duration-300">
    <h3 class="text-lg font-semibold text-gray-800 mb-4">Update Status Pengajuan</h3>
    <form id="status-form">
        <div class="mb-4">
            <label class="block text-gray-700 font-medium mb-1">Pembimbing</label>
            <input type="text" id="input-pembimbing" class="w-full p-2 border rounded-lg" placeholder="Masukkan nama pembimbing" required>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
            <div>
                <label class="block text-gray-700 font-medium mb-1">Tanggal Mulai</label>
                <input type="date" id="input-tanggal-mulai" class="w-full p-2 border rounded-lg" required>
            </div>
            <div>
                <label class="block text-gray-700 font-medium mb-1">Tanggal Selesai</label>
                <input type="date" id="input-tanggal-selesai" class="w-full p-2 border rounded-lg" required>
            </div>
        </div>

        <div class="mt-6 flex gap-4">
            <button type="submit" class="bg-blue-600 text-white px-5 py-2 rounded-lg font-medium shadow-md hover:bg-blue-700 transition duration-200">
                Simpan
            </button>
            <button type="button" id="cancelBtn" class="bg-gray-500 text-white px-5 py-2 rounded-lg font-medium hover:bg-gray-600 transition duration-200">
                Batal
            </button>
        </div>
    </form>
</div>
@endsection

@push('scripts')
<script>
    document.addEventListener("DOMContentLoaded", function () {
        const updateStatusBtn = document.getElementById("updateStatusBtn");
        const formStatus = document.getElementById("form-status");
        const cancelBtn = document.getElementById("cancelBtn");

        // Fungsi untuk menampilkan form
        updateStatusBtn.addEventListener("click", function () {
            formStatus.classList.remove("hidden");
        });

        // Fungsi untuk menyembunyikan form
        cancelBtn.addEventListener("click", function () {
            formStatus.classList.add("hidden");
        });

        // Fungsi update status
        document.getElementById("status-form").addEventListener("submit", function(event) {
            event.preventDefault();

            let pembimbing = document.getElementById("input-pembimbing").value.trim();
            let tanggalMulai = document.getElementById("input-tanggal-mulai").value;
            let tanggalSelesai = document.getElementById("input-tanggal-selesai").value;

            if (!pembimbing || !tanggalMulai || !tanggalSelesai) {
                alert("Harap isi semua kolom sebelum menyimpan!");
                return;
            }

            document.getElementById("pembimbing").textContent = pembimbing;
            document.getElementById("tanggal-mulai").textContent = tanggalMulai;
            document.getElementById("tanggal-selesai").textContent = tanggalSelesai;

            formStatus.classList.add("hidden");
        });
    });
</script>
@endpush
