let csrf = null; // CSRF token
let kategoriTerpilih = null;

// ==========================
// Ambil token & info user Supabase
// ==========================
async function getSupabaseUser() {
    if (window.supabase && supabase.auth) {
        const sessionResp = await supabase.auth.getSession();
        const user = sessionResp?.data?.session?.user;
        if (user) return { user_id: user.id, email: user.email };
    }
    return { user_id: null, email: null };
}

// ==========================
// Fungsi log aktivitas ke controller
// ==========================
async function logActivity(description, detail = {}) {
    try {
        const { user_id, email } = await getSupabaseUser();
        if (typeof detail !== "object") detail = { value: detail };

        const payload = { description, detail, user_id, email };
        const csrfToken = csrf;

        await fetch("/activity_logs/log", {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
                Accept: "application/json",
                "X-CSRF-TOKEN": csrfToken || "",
            },
            body: JSON.stringify(payload),
            credentials: "same-origin", // penting untuk CSRF Laravel
        });
    } catch (err) {
        console.error("Error log activity:", err);
    }
}

// ==========================
// Load kategori via Laravel
// ==========================
async function loadKategori() {
    const tableBody = document.querySelector("tbody");

    try {
        const res = await fetch("/kategori/list");
        const result = await res.json();

        if (!result.success || !result.data.length) {
            tableBody.innerHTML =
                '<tr><td colspan="2" class="text-center text-danger">Tidak ada data</td></tr>';
            return;
        }

        tableBody.innerHTML = "";
        result.data.forEach((kategori) => {
            const tr = document.createElement("tr");
            tr.id = `kategori-${kategori.id}`;
            tr.innerHTML = `
                <td>${kategori.nama_kategori}</td>
                <td class="text-center">
                    <a href="edit_kategori?id=${kategori.id}" class="btn btn-warning px-3 py-3">
                        <i class="fa-solid fa-pen"></i>
                    </a>
                    <button class="btn btn-danger px-3 py-3 delete-kategori-btn"
                            data-id="${kategori.id}" data-nama="${kategori.nama_kategori}">
                        <i class="fa-solid fa-trash"></i>
                    </button>
                </td>
            `;
            tableBody.appendChild(tr);
        });

        // Tambahkan listener untuk tombol hapus
        document.querySelectorAll(".delete-kategori-btn").forEach((btn) => {
            btn.addEventListener("click", () => {
                const id = btn.dataset.id;
                const nama = btn.dataset.nama;
                konfirmasiHapus(nama, id);
            });
        });
    } catch (err) {
        console.error("Error load kategori:", err);
    }
}

// ==========================
// Hapus kategori
// ==========================
async function hapusKategori() {
    try {
        const res = await fetch(`/kategori/${kategoriTerpilih}`, {
            method: "DELETE",
            headers: { "X-CSRF-TOKEN": csrf },
            credentials: "same-origin",
        });

        const result = await res.json();
        if (!result.success) {
            alert("Gagal menghapus kategori!");
            return;
        }

        document.getElementById(`kategori-${kategoriTerpilih}`)?.remove();
        bootstrap.Modal.getInstance(
            document.getElementById("hapusModal")
        ).hide();

        // Log aktivitas menggunakan logActivity
        await logActivity("Hapus kategori", { id: kategoriTerpilih });
    } catch (err) {
        console.error("Error hapus kategori:", err);
    }
}

// ==========================
// Konfirmasi hapus
// ==========================
window.konfirmasiHapus = function (nama, id) {
    kategoriTerpilih = id;
    document.getElementById("namaKategoriHapus").textContent = nama;
    new bootstrap.Modal(document.getElementById("hapusModal")).show();
};

// ==========================
// DOMContentLoaded
// ==========================
document.addEventListener("DOMContentLoaded", () => {
    csrf = document.querySelector('meta[name="csrf-token"]').content;

    document
        .getElementById("btnKonfirmasiHapus")
        ?.addEventListener("click", hapusKategori);

    loadKategori();

    // Pencarian kategori
    const searchInput = document.getElementById("searchInput");
    searchInput?.addEventListener("keyup", () => {
        const filter = searchInput.value.toLowerCase();
        const rows = document.querySelectorAll("tbody tr");

        rows.forEach((row) => {
            const nama = row.children[0].innerText.toLowerCase();
            row.style.display = nama.includes(filter) ? "" : "none";
        });
    });
});
