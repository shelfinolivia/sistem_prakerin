<!-- Status Pengajuan -->
<div id="status-pengajuan" class="mt-6 bg-white p-6 rounded-lg shadow-md" style="display: none;">
    <h3 class="text-lg font-semibold">Status Pengajuan</h3>
    <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mt-4">
        <div class="p-4 bg-blue-100 rounded-lg">
            <p class="font-medium">Status Magang</p>
            <p id="status-magang" class="text-blue-700">Menunggu</p>
        </div>
        <div class="p-4 bg-blue-100 rounded-lg">
            <p class="font-medium">Pembimbing</p>
            <p id="pembimbing" class="text-blue-700">Belum Ditentukan</p>
        </div>
        <div class="p-4 bg-blue-100 rounded-lg">
            <p class="font-medium">Tanggal Mulai</p>
            <p id="tanggal-mulai" class="text-blue-700">-</p>
        </div>
        <div class="p-4 bg-blue-100 rounded-lg">
            <p class="font-medium">Tanggal Selesai</p>
            <p id="tanggal-selesai" class="text-blue-700">-</p>
        </div>
    </div>
    <button onclick="showForm()" class="mt-4 bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">
        Update Status
    </button>
</div>

<!-- Form Update Status -->
<div id="form-status" class="mt-6 bg-white p-6 rounded-lg shadow-md hidden">
    <h3 class="text-lg font-semibold">Update Status Pengajuan</h3>
    <form onsubmit="updateStatus(event)" class="mt-4">
        <label class="block mb-2 font-medium">Status Magang</label>
        <input type="text" id="input-status" class="w-full p-2 border rounded mb-4" placeholder="Masukkan status magang" required>

        <label class="block mb-2 font-medium">Pembimbing</label>
        <input type="text" id="input-pembimbing" class="w-full p-2 border rounded mb-4" placeholder="Masukkan nama pembimbing" required>

        <label class="block mb-2 font-medium">Tanggal Mulai</label>
        <input type="date" id="input-tanggal-mulai" class="w-full p-2 border rounded mb-4" required>

        <label class="block mb-2 font-medium">Tanggal Selesai</label>
        <input type="date" id="input-tanggal-selesai" class="w-full p-2 border rounded mb-4" required>

        <div class="flex gap-4">
            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Simpan</button>
            <button type="button" onclick="hideForm()" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">Batal</button>
        </div>
    </form>
</div>

<script>
    function showForm() {
        document.getElementById("form-status").classList.remove("hidden");
    }

    function hideForm() {
        document.getElementById("form-status").classList.add("hidden");
    }

    function updateStatus(event) {
        event.preventDefault();

        let statusMagang = document.getElementById("input-status").value.trim();
        let pembimbing = document.getElementById("input-pembimbing").value.trim();
        let tanggalMulai = document.getElementById("input-tanggal-mulai").value;
        let tanggalSelesai = document.getElementById("input-tanggal-selesai").value;

        if (!statusMagang || !pembimbing || !tanggalMulai || !tanggalSelesai) {
            alert("Harap isi semua kolom sebelum menyimpan!");
            return;
        }

        document.getElementById("status-magang").textContent = statusMagang;
        document.getElementById("pembimbing").textContent = pembimbing;
        document.getElementById("tanggal-mulai").textContent = tanggalMulai;
        document.getElementById("tanggal-selesai").textContent = tanggalSelesai;

        hideForm();
    }
</script>
