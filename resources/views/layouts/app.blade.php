<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Dashboard Siswa')</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/js/all.min.js" crossorigin="anonymous"></script>

    <style>
        .hidden { display: none; }
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
</head>
<body class="bg-gray-100 h-screen flex">
    
    @include('components.sidebar')

    <!-- Konten Utama -->
    <main id="main-content" class="w-full p-6 sidebar-open">
        @yield('content')
    </main>

    <script>
        function toggleSidebar() {
            let sidebar = document.getElementById('sidebar');
            let mainContent = document.getElementById('main-content');

            if (sidebar.classList.contains('-translate-x-full')) {
                sidebar.classList.remove('-translate-x-full');
                mainContent.classList.add('sidebar-open');
                mainContent.classList.remove('sidebar-closed');
            } else {
                sidebar.classList.add('-translate-x-full');
                mainContent.classList.remove('sidebar-open');
                mainContent.classList.add('sidebar-closed');
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

</body>
</html>
