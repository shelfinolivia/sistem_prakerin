<!-- Sidebar -->
<div id="sidebar" class="w-64 bg-blue-900 text-white p-5 flex flex-col justify-between min-h-screen fixed top-0 left-0 transition-transform duration-300 z-50">
    <!-- Menu -->
    <div>
        <h2 class="text-2xl font-bold text-center mt-10">SISWA</h2>
        <ul class="space-y-4 mt-20">
            <li class="p-2 rounded-md sidebar-item dashboard">
                <a href="{{ route('dashboard') }}" class="block" onclick="setActive(this)">Dashboard</a>
            </li>
            <li class="p-2 rounded-md sidebar-item">
                <a href="{{ route('internship.ajukan') }}" class="block" onclick="setActive(this)">Ajukan Magang</a>
            </li>
            <li class="p-2 rounded-md sidebar-item">
                <a href="{{ route('internship.status') }}" class="block" onclick="setActive(this)">Cek Status</a>
            </li>
            <li class="p-2 rounded-md sidebar-item">
                <a href="{{ route('report.form') }}" class="block" onclick="setActive(this)">Unggah Laporan</a>
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

<!-- Tombol Menu (Bars) -->
<div id="menu-icon" class="fixed left-5 top-5 text-2xl text-white bg-blue-900 p-3 rounded-full cursor-pointer transition-all duration-300 z-50" onclick="toggleSidebar()">
    <i class="fa-solid fa-bars"></i>
</div>

<!-- Script untuk Sidebar -->
<script>
    document.addEventListener("DOMContentLoaded", function () {
    let sidebar = document.getElementById('sidebar');
    let menuIcon = document.getElementById('menu-icon');

    // Pastikan sidebar muncul saat pertama kali membuka halaman
    sidebar.classList.remove("-translate-x-full");

    // Hapus semua kelas aktif terlebih dahulu
    document.querySelectorAll(".sidebar-item").forEach(item => {
        item.classList.remove("active");
    });

    // Cek URL saat ini dan aktifkan menu yang sesuai
    let currentUrl = window.location.href;
    document.querySelectorAll(".sidebar-item a").forEach(link => {
        if (link.href === currentUrl) {
            link.parentElement.classList.add("active");
        }
    });

    // Cek apakah halaman saat ini adalah Dashboard
    let dashboardLink = document.querySelector(".sidebar-item.dashboard a");
    if (dashboardLink && dashboardLink.href === currentUrl) {
        dashboardLink.parentElement.classList.add("active");
    }

    // Tambahkan event listener untuk setiap menu sidebar
    document.querySelectorAll(".sidebar-item a").forEach(link => {
        link.addEventListener("click", function () {
            setActive(this);
        });
    });
});

function setActive(element) {
    // Hapus kelas aktif dari semua item
    document.querySelectorAll(".sidebar-item").forEach(item => {
        item.classList.remove("active");
    });

    // Tambahkan kelas aktif ke elemen yang diklik
    element.parentElement.classList.add("active");

    // Simpan menu yang aktif di localStorage agar tetap aktif saat reload halaman
    localStorage.setItem("activeMenu", element.getAttribute("href"));
}



</script>

<style>
    /* Efek hover untuk semua sidebar-item */
.sidebar-item {
    transition: background-color 0.3s, color 0.3s;
}

/* Hover untuk semua menu sidebar */
.sidebar-item:hover {
    background-color: #2563eb !important;
    color: white !important;
}

/* Warna menu aktif */
.sidebar-item.active {
    background-color: #1d4ed8 !important;
    color: white !important;
}

/* Pastikan Dashboard tidak selalu aktif jika bukan di halaman Dashboard */
.sidebar-item.dashboard {
    background-color: transparent !important;
}

/* Dashboard hanya aktif jika berada di halaman Dashboard */
.sidebar-item.dashboard.active {
    background-color: #1d4ed8 !important;
}

/* Dashboard tetap bisa di-hover */
.sidebar-item.dashboard:hover {
    background-color: #2563eb !important;
}

/* Saat sidebar tersembunyi, geser ke kiri */
#sidebar.-translate-x-full {
    transform: translateX(-100%);
}

/* Animasi agar lebih halus */
#sidebar {
    transition: transform 0.3s ease-in-out;
}



</style>
