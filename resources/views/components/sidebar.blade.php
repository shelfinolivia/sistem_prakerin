<div id="sidebar" class="w-64 bg-blue-900 text-white p-5 flex flex-col justify-between min-h-screen fixed left-0 transition-all duration-300">
    <!-- Tombol Toggle -->
    <div class="absolute top-5 right-5 text-white text-2xl cursor-pointer" onclick="toggleSidebar()">
        <i class="fa-solid fa-bars"></i>
    </div>

    <!-- Menu -->
    <div>
        <h2 class="text-2xl font-bold text-center mt-10">SISWA</h2>
        <ul class="space-y-4 mt-20">
            <li class="p-2 rounded-md hover:bg-blue-700 sidebar-item" onclick="showSection('dashboard', this)">
                <a href="{{ route('dashboard') }}" class="block">Dashboard</a>
            </li>
            <li class="p-2 rounded-md hover:bg-blue-700 sidebar-item" onclick="showSection('ajukan-magang', this)">
                <a href="{{ route('internship.ajukan') }}" class="block">Ajukan Magang</a>
            </li>
            <li class="p-2 rounded-md hover:bg-blue-700 sidebar-item" onclick="showSection('status-pengajuan', this)">
                <a href="{{ route('internship.status') }}" class="block">Cek Status</a>
            </li>
            <li class="p-2 rounded-md hover:bg-blue-700 sidebar-item" onclick="showSection('unggah-laporan', this)">
                <a href="{{ route('report.form') }}" class="block">Unggah Laporan</a>
            </li>
        </ul>
    </div>

    <!-- Tombol Logout -->
    <div class="p-2 rounded-md hover:bg-blue-700">
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="w-full text-left p-2">Logout</button>
        </form>            
    </div>
</div>

<!-- Tombol Menu saat Sidebar tertutup -->
<div id="menu-icon" class="fixed left-5 top-5 text-2xl text-white bg-blue-900 p-3 rounded-full cursor-pointer transition-all duration-300 hidden" onclick="toggleSidebar()">
    <i class="fa-solid fa-bars"></i>
</div>

<!-- Script untuk Sidebar -->
<script>
    function toggleSidebar() {
        let sidebar = document.getElementById('sidebar');
        let menuIcon = document.getElementById('menu-icon');

        if (sidebar.classList.contains('-translate-x-full')) {
            sidebar.classList.remove('-translate-x-full');
            menuIcon.classList.add('hidden'); // Sembunyikan ikon menu saat sidebar muncul
        } else {
            sidebar.classList.add('-translate-x-full');
            menuIcon.classList.remove('hidden'); // Tampilkan ikon menu saat sidebar tersembunyi
        }
    }

    // function showSection(sectionId, element) {
    //     // Sembunyikan semua section
    //     document.querySelectorAll('.section').forEach(sec => sec.style.display = 'none');

    //     // Tampilkan section yang diklik
    //     let selectedSection = document.getElementById(sectionId);
    //     if (selectedSection) {
    //         selectedSection.style.display = 'block';
    //     }

    //     // Hapus kelas aktif dari semua item sidebar
    //     document.querySelectorAll('.sidebar-item').forEach(item => {
    //         item.classList.remove('bg-blue-800', 'text-white');
    //         item.classList.add('hover:bg-blue-700'); // Tambahkan efek hover kembali
    //     });

    //     // Tambahkan kelas aktif ke item yang diklik
    //     element.classList.add('bg-blue-800', 'text-white');
    //     element.classList.remove('hover:bg-blue-700'); // Hapus hover agar tidak konflik dengan warna aktif

    //     // Simpan state aktif ke localStorage agar tetap saat refresh
    //     localStorage.setItem('activeSection', sectionId);
    // }

    // // Pastikan dashboard terlihat saat halaman pertama kali dimuat
    // document.addEventListener("DOMContentLoaded", function () {
    //     let savedSection = localStorage.getItem('activeSection') || 'dashboard'; // Ambil dari localStorage atau default ke dashboard
    //     let activeItem = document.querySelector(`.sidebar-item[onclick*="${savedSection}"]`);
        
    //     if (activeItem) {
    //         showSection(savedSection, activeItem);
    //     }
    // });
</script>

<!-- CSS -->
<style>
    .hidden {
        display: none;
    }
    #sidebar {
        width: 16rem; /* 64px * 4 */
    }
    .-translate-x-full {
        transform: translateX(-100%);
    }
</style>
