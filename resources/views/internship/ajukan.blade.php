@extends('layouts.app')

@section('title', 'Ajukan Magang')

@section('content')
    <div class="max-w-lg mx-auto mt-10 bg-white shadow-lg rounded-lg p-6">
        <h3 class="text-lg font-semibold text-center mb-4">Form Pengajuan Magang</h3>

        <!-- Tampilkan pesan sukses jika ada -->
        @if(session('success'))
            <div class="bg-green-500 text-white p-3 rounded-md mb-4">
                {{ session('success') }}
            </div>
        @endif

        <form id="form-ajukan-magang" action="{{ route('internship.apply') }}" method="POST">
            @csrf

            <div class="mb-4">
                <label class="block mb-2 font-medium">Nama Siswa</label>
                <input type="text" name="nama_siswa" class="w-full p-2 border rounded" placeholder="Masukkan nama siswa" required>
            </div>

            <div class="mb-4">
                <label class="block mb-2 font-medium">Kelas</label>
                <input type="text" name="kelas" class="w-full p-2 border rounded" placeholder="Masukkan kelas" required>
            </div>

            <div class="mb-4">
                <label class="block mb-2 font-medium">Nama Perusahaan</label>
                <input type="text" name="nama_perusahaan" class="w-full p-2 border rounded" placeholder="Masukkan nama perusahaan" required>
            </div>

            <div class="mb-4">
                <label class="block mb-2 font-medium">Posisi Magang</label>
                <input type="text" name="posisi_magang" class="w-full p-2 border rounded" placeholder="Masukkan posisi magang" required>
            </div>

            <div class="flex gap-4">
                <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                    Ajukan
                </button>
                <button type="reset" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">
                    Batal
                </button>
            </div>
        </form>
    </div>
@endsection
