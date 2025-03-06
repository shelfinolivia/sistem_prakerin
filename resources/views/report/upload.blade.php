@extends('layouts.app')

@section('title', 'Unggah Laporan Prakerin')

@section('content')
    <div class="p-6 bg-white shadow-md rounded-lg">
        <h3 class="text-lg font-semibold">Unggah Laporan Prakerin</h3>
        <form action="{{ route('report.upload') }}" method="POST" enctype="multipart/form-data" class="mt-4">
            @csrf
            <input type="file" name="report" class="w-full p-2 border rounded">
            <button type="submit" class="mt-4 bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">
                Unggah
            </button>
        </form>
    </div>
@endsection
