document.addEventListener("DOMContentLoaded", () => {
    loadKategori(); // ambil kategori dari Supabase
    setupForm();
});

// ==========================
// Load kategori ke select
// ==========================
async function loadKategori() {
    const select = document.getElementById("kategoriSelect");
    try {
        const res = await fetch("/kategori/list");
        const result = await res.json();
        console.log("Kategori:", result);

        select.innerHTML = '<option value="">Pilih kategori</option>';

        if (result.success && result.data.length) {
            result.data.forEach((kat) => {
                const option = document.createElement("option");
                option.value = kat.nama_kategori;
                option.textContent = kat.nama_kategori;
                select.appendChild(option);
            });
        }
    } catch (error) {
        console.error("Error load kategori:", error);
        select.innerHTML = '<option value="">Gagal memuat kategori</option>';
    }
}

// ==========================
// Preview gambar sebelum upload
// ==========================
document.getElementById("gambarInput").addEventListener("change", function () {
    const file = this.files[0];
    const preview = document.getElementById("previewImg");
    if (file) {
        const reader = new FileReader();
        reader.onload = (e) => {
            preview.src = e.target.result;
            preview.classList.remove("d-none");
        };
        reader.readAsDataURL(file);
    } else {
        preview.src = "";
        preview.classList.add("d-none");
    }
});

// ==========================
// Setup submit form
// ==========================
function setupForm() {
    const form = document.getElementById("formTambahResep");

    form.addEventListener("submit", async (e) => {
        e.preventDefault();

        const formData = new FormData(form);
        const data = {
            nama_resep: formData.get("nama_resep"),
            kategori: formData.get("kategori"),
            alat: formData.get("alat"),
            bahan: formData.get("bahan"),
            deskripsi: formData.get("deskripsi"),
            gambar: "", // nanti akan diisi base64
        };

        // Convert file gambar ke base64
        const file = document.getElementById("gambarInput").files[0];
        if (file) {
            data.gambar = await toBase64(file);
        }

        try {
            // Ambil CSRF token dari meta tag
            const token = document
                .querySelector('meta[name="csrf-token"]')
                .getAttribute("content");

            const res = await fetch("/resep/store", {
                method: "POST",
                headers: {
                    "X-CSRF-TOKEN": token,
                    Accept: "application/json",
                    "Content-Type": "application/json",
                },
                body: JSON.stringify(data),
                credentials: "same-origin",
            });

            const result = await res.json();
            if (result.success) {
                // ==========================
                // Log aktivitas tambah resep
                // ==========================
                if (typeof logActivity === "function") {
                    await logActivity("Tambah resep", data);
                }

                alert("Resep berhasil ditambahkan!");
                window.location.href = "/dashboard"; // redirect ke dashboard
            } else {
                alert("Gagal menambahkan resep");
            }
        } catch (error) {
            console.error("Error tambah resep:", error);
            alert("Terjadi kesalahan saat menambahkan resep");
        }
    });
}

// ==========================
// Helper konversi file ke base64
// ==========================
function toBase64(file) {
    return new Promise((resolve, reject) => {
        const reader = new FileReader();
        reader.readAsDataURL(file);
        reader.onload = () => resolve(reader.result);
        reader.onerror = (error) => reject(error);
    });
}
