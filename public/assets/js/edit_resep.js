// ==========================
// Ambil token & info user Supabase
// ==========================
async function getSupabaseUser() {
    if (window.supabase && supabase.auth) {
        const { data } = await supabase.auth.getSession();
        const user = data?.session?.user;
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
// DOMContentLoaded
// ==========================
document.addEventListener("DOMContentLoaded", async () => {
    const params = new URLSearchParams(window.location.search);
    const id = params.get("id");
    if (!id) return alert("ID resep tidak ditemukan.");

    await loadKategori(); // load dropdown kategori
    await loadResepData(id); // load data resep dari controller

    // submit form update
    document
        .getElementById("formEditResep")
        .addEventListener("submit", async (e) => {
            e.preventDefault();

            const formData = {
                nama_resep: document.getElementById("editNamaResep").value,
                kategori: document.getElementById("editKategori").value,
                alat: document.getElementById("editAlat").value,
                bahan: document.getElementById("editBahan").value,
                deskripsi: document.getElementById("editDeskripsi").value,
            };

            try {
                const token = document
                    .querySelector('meta[name="csrf-token"]')
                    .getAttribute("content");

                const res = await fetch(`/resep/update/${id}`, {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json",
                        "X-CSRF-TOKEN": token,
                    },
                    body: JSON.stringify(formData),
                    credentials: "same-origin",
                });

                const result = await res.json();
                if (result.success) {
                    // Log update resep
                    await logActivity("Update resep", { id, ...formData });

                    alert("Resep berhasil diperbarui!");
                    window.location.href = "/dashboard";
                } else {
                    alert("Gagal memperbarui resep.");
                }
            } catch (err) {
                console.error("Error update resep:", err);
            }
        });
});

// ==========================
// Load data resep ke form
// ==========================
async function loadResepData(id) {
    try {
        const res = await fetch(`/resep/edit/${id}`);
        const result = await res.json();
        if (!result.success || !result.data)
            return alert("Resep tidak ditemukan.");

        const data = result.data;
        document.getElementById("editNamaResep").value = data.nama_resep || "";
        document.getElementById("editKategori").value = data.kategori || "";
        document.getElementById("editAlat").value = data.alat || "";
        document.getElementById("editBahan").value = data.bahan || "";
        document.getElementById("editDeskripsi").value = data.deskripsi || "";

        if (data.gambar) {
            const img = document.getElementById("editPreviewImg");
            img.src = data.gambar;
            img.classList.remove("d-none");
        }
    } catch (err) {
        console.error("Gagal load resep:", err);
    }
}

// ==========================
// Load kategori dropdown
// ==========================
async function loadKategori() {
    const select = document.getElementById("editKategori");
    select.innerHTML = "<option value=''>Memuat kategori...</option>";

    try {
        const res = await fetch("/kategori/list");
        const result = await res.json();
        if (!result.success || !result.data.length) return;

        select.innerHTML = "";
        result.data.forEach((kat) => {
            const option = document.createElement("option");
            option.value = kat.nama_kategori;
            option.textContent = kat.nama_kategori;
            select.appendChild(option);
        });
    } catch (err) {
        console.error("Gagal load kategori:", err);
    }
}
