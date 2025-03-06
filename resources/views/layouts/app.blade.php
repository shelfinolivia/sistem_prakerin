{{-- <!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name', 'Sistem Prakerin') }}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100">

<div class="flex min-h-screen">
    <!-- Sidebar -->
    <aside class="w-64 bg-blue-900 text-white min-h-screen p-4">
        <h2 class="text-xl font-bold">SISWA</h2>
        <nav class="mt-4">
            <a href="{{ route('dashboard') }}" class="block py-2 px-4 rounded bg-blue-700">Dashboard</a>
            <a href="{{ route('magang.ajukan') }}" class="block py-2 px-4 rounded hover:bg-blue-700">Ajukan Magang</a>
            <a href="{{ route('magang.status') }}" class="block py-2 px-4 rounded hover:bg-blue-700">Cek Status</a>
            <a href="{{ route('laporan.upload') }}" class="block py-2 px-4 rounded hover:bg-blue-700">Unggah Laporan</a>
            <a href="{{ route('logout') }}" class="block py-2 px-4 rounded hover:bg-red-600 mt-4">Logout</a>
        </nav>
    </aside>

    <!-- Konten -->
    <main class="flex-1 p-6">
        @yield('content')
    </main>
</div>

</body>
</html> --}}

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Dashboard Siswa')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/js/all.min.js" crossorigin="anonymous"></script>
</head>
<body class="bg-gray-100 h-screen flex">
    
    @include('components.sidebar')
    
    <div class="w-full p-6">
        @yield('content')
    </div>

    <script>
        function toggleSidebar() {
            let sidebar = document.getElementById('sidebar');
            let menuIcon = document.getElementById('menu-icon');
            let mainContent = document.getElementById('main-content');

            if (sidebar.style.left === "0px" || sidebar.style.left === "") {
                sidebar.style.left = "-16rem";
                mainContent.classList.remove('sidebar-open');
                mainContent.classList.add('sidebar-closed');
                menuIcon.classList.remove('hidden');
            } else {
                sidebar.style.left = "0px";
                mainContent.classList.remove('sidebar-closed');
                mainContent.classList.add('sidebar-open');
                menuIcon.classList.add('hidden');
            }
        }

        function showSection(sectionId, element) {
            // Sembunyikan semua section
            document.querySelectorAll('.section').forEach(sec => sec.classList.add('hidden'));

            // Tampilkan section yang dipilih
            let selectedSection = document.getElementById(sectionId);
            if (selectedSection) {
                selectedSection.classList.remove('hidden');
            }

            // Hapus kelas aktif dari semua item sidebar
            document.querySelectorAll('.sidebar-item').forEach(item => item.classList.remove('bg-blue-800'));

            // Tambahkan kelas aktif ke item yang diklik
            element.classList.add('bg-blue-800');
        }

        document.addEventListener("DOMContentLoaded", function () {
            showSection('dashboard', document.querySelector('.sidebar-item'));
        });
    </script>

    <style>
        .hidden {
            display: none;
        }
        .sidebar-open { margin-left: 16rem; transition: margin-left 0.3s; }
        .sidebar-closed { margin-left: 0; transition: margin-left 0.3s; }
        #sidebar {
            width: 16rem; 
            left: 0;
            transition: left 0.3s;
        }
        .-translate-x-full {
            transform: translateX(-100%);
        }
    </style>

</body>
</html>



