// Ambil ID resep dari URL
const params = new URLSearchParams(window.location.search);
const id = params.get("id");

// Elemen HTML
const titleEl = document.getElementById("nama_resep");
const categoryEl = document.getElementById("kategori_resep");
const imageEl = document.getElementById("gambar_resep");
const alatEl = document.getElementById("alat_resep");
const bahanEl = document.getElementById("bahan_resep");
const langkahEl = document.getElementById("langkah_resep");

// Load data dari controller
async function loadRecipeDetail() {
    if (!id) {
        titleEl.textContent = "ID Resep tidak ditemukan!";
        return;
    }

    try {
        const res = await fetch(`/recipes/details?id=${id}`);
        const result = await res.json();

        if (!result.success || !result.data) {
            titleEl.textContent = "Resep Tidak Ditemukan!";
            return;
        }

        const data = result.data;

        // Set konten HTML
        titleEl.textContent = data.nama_resep;
        categoryEl.textContent = data.kategori || "-";
        imageEl.src = data.gambar || "assets/img/no-image.jpg";

        alatEl.innerHTML = (data.alat || "-")
            .split("\n")
            .map((i) => `<li>${i}</li>`)
            .join("");
        bahanEl.innerHTML = (data.bahan || "-")
            .split("\n")
            .map((i) => `<li>${i}</li>`)
            .join("");
        langkahEl.innerHTML = (data.deskripsi || "-")
            .split("\n")
            .map((i) => `<li>${i}</li>`)
            .join("");
    } catch (err) {
        console.error("Gagal load resep:", err);
        titleEl.textContent = "Terjadi kesalahan!";
    }
}

// Jalankan
loadRecipeDetail();
