@extends('layouts.app')

@section('content')
<div class="bg-white shadow-md rounded-lg p-6">
    <header class="flex items-center justify-between">
        <h2 class="text-lg font-medium text-gray-900">Edit Profil</h2>
    </header>

    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('patch')

        <!-- Nama -->
        <div>
            <label for="name" class="block text-gray-700 font-medium">Nama</label>
            <input id="name" name="name" type="text" class="w-full p-2 mt-1 border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" value="{{ old('name', $user->name) }}" required autofocus>
        </div>

        <!-- Email -->
        <div>
            <label for="email" class="block text-gray-700 font-medium">Email</label>
            <input id="email" name="email" type="email" class="w-full p-2 mt-1 border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" value="{{ old('email', $user->email) }}" required>
        </div>

        <div class="flex justify-end gap-4">
            <a href="{{ route('dashboard') }}" class="bg-gray-500 text-white px-4 py-2 rounded-md hover:bg-gray-600">Kembali</a>
            <button type="submit" class="bg-yellow-500 text-white px-4 py-2 rounded-md hover:bg-yellow-600">Simpan</button>
        </div>
    </form>
</div>
@endsection
