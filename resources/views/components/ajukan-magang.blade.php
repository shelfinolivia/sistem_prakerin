<div id="ajukan-magang" class="mt-6 bg-white p-6 rounded-lg shadow-md" style="display: none;">
    <h3 class="text-lg font-semibold">Ajukan Magang</h3>
    <form id="form-ajukan-magang" action="{{ route('internship.apply') }}" method="POST" class="mt-4" onsubmit="return validateForm()">
        @csrf
        <label class="block mb-2 font-medium">Nama Perusahaan</label>
        <input type="text" id="company" name="company" class="w-full p-2 border rounded mb-4" placeholder="Masukkan nama perusahaan" required>
        
        <label class="block mb-2 font-medium">Posisi Magang</label>
        <input type="text" id="position" name="position" class="w-full p-2 border rounded mb-4" placeholder="Masukkan posisi magang" required>
        
        <div class="flex gap-4">
            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Ajukan</button>
            <button type="button" onclick="clearForm()" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">Batal</button>
        </div>
    </form>
</div>

<script>
    function validateForm() {
        let company = document.getElementById("company").value.trim();
        let position = document.getElementById("position").value.trim();

        if (!company || !position) {
            alert("Harap isi semua kolom sebelum mengajukan magang!");
            return false; // Mencegah form dikirim jika ada input yang kosong
        }
        return true;
    }

    function clearForm() {
        document.getElementById("company").value = "";
        document.getElementById("position").value = "";
    }
</script>
