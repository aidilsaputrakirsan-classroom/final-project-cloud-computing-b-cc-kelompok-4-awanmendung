// ==========================
// Ambil token & info user Supabase
// ==========================
async function getSupabaseUser() {
    if (window.supabase && supabase.auth) {
        const sessionResp = await supabase.auth.getSession();
        const user = sessionResp?.data?.session?.user;
        if (user) {
            return { user_id: user.id, email: user.email };
        }
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

        const csrfToken = document
            .querySelector('meta[name="csrf-token"]')
            ?.getAttribute("content");

        await fetch("/activity_logs/log", {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
                Accept: "application/json",
                "X-CSRF-TOKEN": csrfToken || "",
            },
            body: JSON.stringify(payload),
            credentials: "same-origin",
        });
    } catch (err) {
        console.error("Error log activity:", err);
    }
}

// ==========================
// Load kategori
// ==========================
async function loadKategori() {
    const select = document.getElementById("categoryFilter");
    try {
        const res = await fetch("/kategori/list");
        const result = await res.json();
        if (!result.success || !result.data.length) return;

        result.data.forEach((kat) => {
            const option = document.createElement("option");
            option.value = kat.nama_kategori;
            option.textContent = kat.nama_kategori;
            select.appendChild(option);
        });
    } catch (error) {
        console.error("Error load kategori:", error);
    }
}

// ==========================
// Load resep
// ==========================
async function loadResep(kategoriFilter = "", searchText = "") {
    const tableBody = document.getElementById("resepTableBody");
    tableBody.innerHTML = `<tr><td colspan="5">Loading...</td></tr>`;

    const params = new URLSearchParams();
    if (kategoriFilter) params.append("kategori", kategoriFilter);

    try {
        const res = await fetch("/resep/list?" + params.toString());
        const result = await res.json();

        if (!result.success || !result.data.length) {
            tableBody.innerHTML = `<tr><td colspan="5" class="text-center fw-bold">Resep tidak tersedia</td></tr>`;
            return;
        }

        let list = result.data;
        if (searchText.trim() !== "") {
            const s = searchText.toLowerCase();
            list = list.filter((item) =>
                item.nama_resep.toLowerCase().includes(s)
            );
        }

        // Render tabel sekaligus untuk performa
        let html = "";
        list.forEach((resep) => {
            html += `
            <tr>
                <td>${resep.nama_resep}</td>
                <td>${resep.kategori}</td>
                <td class="text-center"><img src="${resep.gambar}" width="70" class="rounded"></td>
                <td class="text-center">
                    <button class="btn btn-info px-3 py-3 view-resep-btn" 
                        data-id="${resep.id}" data-nama="${resep.nama_resep}">
                        <i class="fa-solid fa-eye"></i> View
                    </button>
                </td>
                <td>
                    <a href="edit_resep?id=${resep.id}" class="btn btn-warning px-3 py-3"><i class="fa-solid fa-pen"></i></a>
                    <button class="btn btn-danger px-3 py-3 delete-resep-btn" 
                        data-id="${resep.id}" data-nama="${resep.nama_resep}">
                        <i class="fa-solid fa-trash"></i>
                    </button>
                </td>
            </tr>`;
        });
        tableBody.innerHTML = html;

        // ==========================
        // Attach listener setelah render
        // ==========================
        document.querySelectorAll(".view-resep-btn").forEach((btn) => {
            btn.addEventListener("click", async () => {
                const id = btn.dataset.id;
                const nama = btn.dataset.nama;
                await logActivity("View resep", { id, nama });
                window.location.href = `view_resep?id=${id}`;
            });
        });

        document.querySelectorAll(".delete-resep-btn").forEach((btn) => {
            btn.addEventListener("click", () => {
                const id = btn.dataset.id;
                const nama = btn.dataset.nama;
                konfirmasiHapus(nama, id);
            });
        });
    } catch (error) {
        console.error("Error load resep:", error);
        tableBody.innerHTML = `<tr><td colspan="5" class="text-center fw-bold text-danger">Terjadi kesalahan</td></tr>`;
    }
}

// ==========================
// Log buka halaman
// ==========================
async function logPageOpen() {
    await logActivity("Buka halaman resep");
}

// ==========================
// Konfirmasi hapus resep
// ==========================
window.konfirmasiHapus = function (nama, id) {
    document.getElementById("namaResepHapus").textContent = nama;
    document.getElementById("idResepHapus").value = id;
    const modal = new bootstrap.Modal(
        document.getElementById("modalHapusResep")
    );
    modal.show();
};

// ==========================
// Hapus resep final
// ==========================
document
    .getElementById("btnHapusResepFinal")
    .addEventListener("click", async () => {
        const id = document.getElementById("idResepHapus").value;
        const nama = document.getElementById("namaResepHapus").textContent;

        try {
            const csrfToken = document
                .querySelector('meta[name="csrf-token"]')
                ?.getAttribute("content");

            const res = await fetch("/resep/delete/" + id, {
                method: "DELETE",
                headers: {
                    "Content-Type": "application/json",
                    Accept: "application/json",
                    "X-CSRF-TOKEN": csrfToken || "",
                },
                credentials: "same-origin", // wajib agar cookie CSRF ikut
            });

            const result = await res.json();
            if (result.success) {
                await logActivity("Hapus resep", { id, nama });

                loadResep(
                    document.getElementById("categoryFilter").value,
                    document.getElementById("searchInput").value
                );

                bootstrap.Modal.getInstance(
                    document.getElementById("modalHapusResep")
                ).hide();
            } else {
                alert("Gagal hapus resep");
            }
        } catch (error) {
            console.error("Error hapus resep:", error);
        }
    });

// ==========================
// DOMContentLoaded
// ==========================
document.addEventListener("DOMContentLoaded", async () => {
    await logPageOpen();
    await loadKategori();
    await loadResep();
});
