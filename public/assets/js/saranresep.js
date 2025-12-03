// Import Supabase
import ActivityLogController from "./controllers/ActivityLogController.js";
import { supabase } from "./supabaseClient.js";

document.addEventListener("DOMContentLoaded", async () => {
    const {
        data: { user },
    } = await supabase.auth.getUser();
    await ActivityLogController.log(
        "Buka halaman saran resep",
        {},
        user?.id,
        user?.email
    );
});

// ==========================
// LOAD DATA (TABEL)
// ==========================
async function loadResep(searchText = "") {
    const tableBody = document.getElementById("saranResepTableBody");
    tableBody.innerHTML = `<tr><td colspan="7">Loading...</td></tr>`;

    const { data, error } = await supabase
        .from("recipe_suggestions")
        .select(
            "id, recipe_name, main_ingredients, cooking_steps, contact_number, created_at"
        )
        .order("id", { ascending: true });

    if (error) {
        console.error("Error mengambil data:", error);
        tableBody.innerHTML = `<tr><td colspan="7">Gagal mengambil data</td></tr>`;
        return;
    }

    let list = data;

    // SEARCH
    if (searchText.trim() !== "") {
        const s = searchText.toLowerCase();
        list = list.filter((item) =>
            (item.recipe_name || "").toLowerCase().includes(s)
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
                <td>${item.recipe_name}</td>

                <td class="text-center">
                    <a href="view_saranresep?id=${item.id}" 
                        class="btn btn-info px-3 py-3">
                        <i class="fa-solid fa-eye"></i> View
                    </a>
                </td>

                <td>
                    <button class="btn btn-danger px-3 py-3" 
                        onclick="konfirmasiHapus('${item.recipe_name}', ${item.id})">
                        <i class="fa-solid fa-trash"></i>
                    </button>
                </td>
            </tr>
        `;
        tableBody.innerHTML += row;
    });
}

// ==========================
// EVENT SEARCH
// ==========================
document.addEventListener("DOMContentLoaded", () => {
    loadResep();

    const searchInput = document.getElementById("searchInput");

    if (searchInput)
        searchInput.addEventListener("keyup", () =>
            loadResep(searchInput.value)
        );
});

// ===================================================================
// ========================== FITUR HAPUS ============================
// ===================================================================
window.konfirmasiHapus = function (nama, id) {
    const modalNama = document.getElementById("namaSaranResepHapus");
    const modalId = document.getElementById("idSaranResepHapus");

    modalNama.innerText = nama;
    modalId.value = id;

    const modal = new bootstrap.Modal(
        document.getElementById("modalHapusSaranResep")
    );
    modal.show();
};

async function hapusSaranResepFinal() {
    const id = document.getElementById("idSaranResepHapus").value;

    // Hapus dari tabel recipe_suggestions (BUKAN feedback)
    const { error } = await supabase
        .from("recipe_suggestions")
        .delete()
        .eq("id", id);

    if (error) {
        console.error(error);
        alert("Gagal menghapus data!");
        return;
    }

    const modal = bootstrap.Modal.getInstance(
        document.getElementById("modalHapusSaranResep")
    );
    modal.hide();

    // 🔄 Log hapus saran resep
    const {
        data: { user },
    } = await supabase.auth.getUser();
    await ActivityLogController.log(
        "Hapus saran resep",
        { id },
        user?.id,
        user?.email
    );

    loadResep();
}

const btnHapusAkhir = document.getElementById("btnHapusSaranResepFinal");

if (btnHapusAkhir) {
    btnHapusAkhir.addEventListener("click", hapusSaranResepFinal);
}
