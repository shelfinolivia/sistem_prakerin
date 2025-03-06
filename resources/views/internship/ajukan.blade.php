@extends('layouts.app')

@section('title', 'Ajukan Magang')

@section('content')
    <div class="p-6 bg-white shadow-md rounded-lg">
        <h3 class="text-lg font-semibold">Ajukan Magang</h3>
        <form action="{{ route('internship.apply') }}" method="POST" class="mt-4">
            @csrf
            <label class="block mb-2 font-medium">Nama Perusahaan</label>
            <input type="text" name="company" class="w-full p-2 border rounded" placeholder="Masukkan nama perusahaan">
            <button type="submit" class="mt-4 bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                Ajukan
            </button>
        </form>
    </div>
@endsection
