const urlParams = new URLSearchParams(window.location.search);
const kategoriId = urlParams.get("id");
const csrf = document.querySelector('meta[name="csrf-token"]').content;

// ==========================
// Load data kategori
// ==========================
async function loadKategori() {
    const res = await fetch(`/kategori/get/${kategoriId}`);
    const json = await res.json();

    if (!json.success || !json.data) {
        alert("Kategori tidak ditemukan!");
        return (window.location.href = "/kategori");
    }

    document.getElementById("namaKategori").value = json.data.nama_kategori;
}

// ==========================
// Update kategori
// ==========================
document
    .getElementById("formEditKategori")
    .addEventListener("submit", async (e) => {
        e.preventDefault();

        const namaBaru = document.getElementById("namaKategori").value.trim();

        try {
            const res = await fetch(`/kategori/update/${kategoriId}`, {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-TOKEN": csrf,
                },
                body: JSON.stringify({ nama_kategori: namaBaru }),
                credentials: "same-origin",
            });

            const result = await res.json();

            if (!result.success) {
                return alert("❌ Gagal update kategori");
            }

            // ==========================
            // Log aktivitas update kategori
            // ==========================
            if (typeof logActivity === "function") {
                await logActivity("Update kategori", {
                    id: kategoriId,
                    nama_kategori: namaBaru,
                });
            }

            alert("✔ Kategori berhasil diperbarui!");
            window.location.href = "/kategori";
        } catch (err) {
            console.error("Error update kategori:", err);
            alert("❌ Terjadi kesalahan saat update kategori");
        }
    });

// ==========================
// Load kategori saat halaman dibuka
// ==========================
loadKategori();
