// Import Supabase
import ActivityLogController from "./controllers/ActivityLogController.js";
import { supabase } from "./supabaseClient.js";

document.addEventListener("DOMContentLoaded", async () => {
    const {
        data: { user },
    } = await supabase.auth.getUser();
    await ActivityLogController.log(
        "Buka halaman saran",
        {},
        user?.id,
        user?.email
    );
});

// ==========================
// LOAD KATEGORI DROPDOWN (FORM INPUT)
// ==========================
async function loadKategori() {
    const select = document.getElementById("kategoriSelect");
    if (!select) return;

    select.innerHTML = `<option value="">Memuat kategori...</option>`;

    const { data, error } = await supabase.from("feedback").select("category");

    if (error) {
        console.error("Gagal memuat kategori:", error);
        select.innerHTML = `<option value="">Gagal memuat kategori</option>`;
        return;
    }

    // Ambil kategori unik
    const uniqueCategories = [...new Set(data.map((row) => row.category))];

    select.innerHTML = `<option value="">Pilih kategori...</option>`;

    uniqueCategories.forEach((cat) => {
        select.innerHTML += `<option value="${cat}">${cat}</option>`;
    });
}

document.addEventListener("DOMContentLoaded", loadKategori);

// ==========================
// LOAD DATA FEEDBACK (TABEL)
// ==========================
async function loadResep(kategoriFilter = "", searchText = "") {
    const tableBody = document.getElementById("saranTableBody");
    tableBody.innerHTML = `<tr><td colspan="7">Loading...</td></tr>`;

    let query = supabase
        .from("feedback")
        .select("id, name, email, category, message, created_at")
        .order("id", { ascending: true });

    if (kategoriFilter !== "") query = query.eq("category", kategoriFilter);

    const { data, error } = await query;

    if (error) {
        console.error("Error mengambil data:", error);
        tableBody.innerHTML = `<tr><td colspan="7">Gagal mengambil data</td></tr>`;
        return;
    }

    let list = data;

    // SEARCH
    if (searchText.trim() !== "") {
        const s = searchText.toLowerCase();
        list = list.filter(
            (item) =>
                item.name.toLowerCase().includes(s) ||
                item.category.toLowerCase().includes(s)
        );
    }

    if (!list || list.length === 0) {
        tableBody.innerHTML = `
            <tr><td colspan="7" class="text-center fw-bold">Data tidak tersedia</td></tr>
        `;
        return;
    }

    tableBody.innerHTML = "";

    list.forEach((item) => {
        const row = `
            <tr>
                <td>${item.name}</td>
                <td>${item.category}</td>

                <td class="text-center">
                    <a href="view_saran?id=${item.id}" 
                        class="btn btn-info px-3 py-3">
                        <i class="fa-solid fa-eye"></i> View
                    </a>
                </td>

                <td>
                    <button class="btn btn-danger px-3 py-3" 
                        onclick="konfirmasiHapus('${item.name}', ${item.id})">
                        <i class="fa-solid fa-trash"></i>
                    </button>
                </td>
            </tr>
        `;
        tableBody.innerHTML += row;
    });
}

// ==========================
// LOAD FILTER KATEGORI (SARAN PAGE)
// ==========================
async function loadKategoriFilter() {
    const filter = document.getElementById("categoryFilter");
    if (!filter) return;

    const { data, error } = await supabase.from("feedback").select("category");

    if (error) {
        console.error("Error memuat filter:", error);
        return;
    }

    const uniqueCategories = [...new Set(data.map((row) => row.category))];

    filter.innerHTML = `<option value="">Semua Kategori</option>`;

    uniqueCategories.forEach((cat) => {
        filter.innerHTML += `<option value="${cat}">${cat}</option>`;
    });
}

// ==========================
// EVENT FILTER + SEARCH
// ==========================
document.addEventListener("DOMContentLoaded", () => {
    loadKategoriFilter();
    loadResep();

    const filter = document.getElementById("categoryFilter");
    const searchInput = document.getElementById("searchInput");

    if (filter)
        filter.addEventListener("change", () =>
            loadResep(filter.value, searchInput.value)
        );

    if (searchInput)
        searchInput.addEventListener("keyup", () =>
            loadResep(filter.value, searchInput.value)
        );
});

// ===================================================================
// ========================== FITUR HAPUS ============================
// ===================================================================
window.konfirmasiHapus = function (nama, id) {
    const modalNama = document.getElementById("namaSaranHapus");
    const modalId = document.getElementById("idSaranHapus");

    modalNama.innerText = nama;
    modalId.value = id;

    const modal = new bootstrap.Modal(
        document.getElementById("modalHapusSaran")
    );
    modal.show();
};

async function hapusSaranFinal() {
    const id = document.getElementById("idSaranHapus").value;

    const { error } = await supabase.from("feedback").delete().eq("id", id);

    if (error) {
        console.error(error);
        alert("Gagal menghapus data!");
        return;
    }

    const modal = bootstrap.Modal.getInstance(
        document.getElementById("modalHapusSaran")
    );
    modal.hide();

    // 🔄 Log hapus saran
    const {
        data: { user },
    } = await supabase.auth.getUser();
    await ActivityLogController.log(
        "Hapus saran",
        { id },
        user?.id,
        user?.email
    );

    loadResep();
}

const btnHapusAkhir = document.getElementById("btnHapusSaranFinal");

if (btnHapusAkhir) {
    btnHapusAkhir.addEventListener("click", hapusSaranFinal);
}
