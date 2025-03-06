<div id="unggah-laporan" class="mt-6 bg-white p-6 rounded-lg shadow-md" style="display: none;">
    <h3 class="text-lg font-semibold">Unggah Laporan Prakerin</h3>
    <form id="form-unggah-laporan" action="{{ route('report.upload') }}" method="POST" enctype="multipart/form-data" class="mt-4" onsubmit="return validateUpload()">
        @csrf
        <input type="file" id="report" name="report" class="w-full p-2 border rounded" required>
        <button type="submit" class="mt-4 bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">Unggah</button>
    </form>
</div>

<script>
    function validateUpload() {
        let fileInput = document.getElementById("report").value.trim();

        if (!fileInput) {
            alert("Harap pilih file sebelum mengunggah laporan!");
            return false; // Mencegah form dikirim jika tidak ada file yang dipilih
        }
        return true;
    }
</script>