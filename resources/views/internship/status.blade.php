@extends('layouts.app')

@section('title', 'Status Pengajuan')

@section('content')
    <div class="p-6 bg-white shadow-md rounded-lg">
        <h3 class="text-lg font-semibold">Status Pengajuan</h3>
        <div class="grid grid-cols-4 gap-4 mt-4">
            <div class="p-4 bg-blue-100 rounded-lg">
                <p class="font-medium">Status Magang</p>
                <p class="text-blue-700">Menunggu</p>
            </div>
            <div class="p-4 bg-blue-100 rounded-lg">
                <p class="font-medium">Pembimbing</p>
                <p class="text-blue-700">Belum Ditentukan</p>
            </div>
            <div class="p-4 bg-blue-100 rounded-lg">
                <p class="font-medium">Tanggal Mulai</p>
                <p class="text-blue-700">-</p>
            </div>
            <div class="p-4 bg-blue-100 rounded-lg">
                <p class="font-medium">Tanggal Selesai</p>
                <p class="text-blue-700">-</p>
            </div>
        </div>
    </div>
@endsection
