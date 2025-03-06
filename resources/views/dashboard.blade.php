<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Siswa</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/js/all.min.js" crossorigin="anonymous"></script>
    {{-- <script>
        function showSection(section, element) {
            document.getElementById('ajukan-magang').style.display = 'none';
            document.getElementById('unggah-laporan').style.display = 'none';
            document.getElementById('informasi-magang').style.display = 'none';
            document.getElementById('status-pengajuan').style.display = 'none';

            if (section === 'dashboard') {
                document.getElementById('informasi-magang').style.display = 'block';
                document.getElementById('status-pengajuan').style.display = 'block';
            } else {
                document.getElementById(section).style.display = 'block';
            }

            let menuItems = document.querySelectorAll('.sidebar-item');
            menuItems.forEach(item => item.classList.remove('bg-blue-700'));
            element.classList.add('bg-blue-700');
        }

        window.onload = function () {
            let dashboardMenu = document.querySelector('.sidebar-item');
            dashboardMenu.click();
        };
    </script>  --}}
    <style>
        .sidebar-open { margin-left: 16rem; transition: margin-left 0.3s; }
        .sidebar-closed { margin-left: 0; transition: margin-left 0.3s; }
    </style>
</head>
<body class="bg-gray-100 h-screen flex">

    @include('components.sidebar')
    
    <!-- Konten Utama -->
    <div id="main-content" class="flex-1 p-6 overflow-auto sidebar-open">
        <div class="flex justify-between items-center bg-white p-4 shadow-md rounded-lg">
            <div class="flex items-center space-x-4">
                <img src="/images/student-avatar.png" alt="Avatar" class="w-16 h-16 rounded-full">
                <div>
                    <h2 class="text-xl font-semibold">Nama Siswa</h2>
                    <p class="text-gray-500">Siswa</p>
                </div>
            </div>
            <div class="flex space-x-4">
                <a href="{{ route('profile.edit') }}" class="bg-yellow-500 text-white px-4 py-2 rounded hover:bg-yellow-600">
                    Edit Profil
                </a>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600">
                        Logout
                    </button>
                </form>
            </div>
        </div>

        <!-- Informasi Magang -->
        <div id="informasi-magang" class="mt-6 bg-white p-6 rounded-lg shadow-md">
            <h3 class="text-lg font-semibold">Informasi Magang</h3>
            <div class="grid grid-cols-2 gap-4 mt-4">
                <div class="p-4 bg-green-100 rounded-lg">
                    <p class="font-medium">Nama Perusahaan</p>
                    <p class="text-green-700">PT Contoh</p>
                </div>
                <div class="p-4 bg-green-100 rounded-lg">
                    <p class="font-medium">Posisi Magang</p>
                    <p class="text-green-700">Web Developer</p>
                </div>
            </div>
        </div>

        @include('components.cek-status')
        @include('components.ajukan-magang')
        @includeWhen(isset($reports), 'components.unggah-laporan', ['reports' => $reports ?? []])
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
    </script>
</body>
</html>
