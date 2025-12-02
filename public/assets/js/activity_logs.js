// Import Supabase
import ActivityLogController from "./controllers/ActivityLogController.js";
import { supabase } from "./supabaseClient.js";

document.addEventListener("DOMContentLoaded", async () => {
    const {
        data: { user },
    } = await supabase.auth.getUser();
    await ActivityLogController.log(
        "Buka halaman activity logs",
        {},
        user?.id,
        user?.email
    );
});

// ==========================
// LOAD DATA (TABEL)
// ==========================
async function loadResep(searchText = "") {
    const tableBody = document.getElementById("activityTableBody");
    tableBody.innerHTML = `<tr><td colspan="7">Loading...</td></tr>`;

    const { data, error } = await supabase
        .from("activity_logs")
        .select("id, detail, user_id, description, email, created_at")
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
            (item.email || "").toLowerCase().includes(s)
        );
    }

    tableBody.innerHTML = "";

    if (!list || list.length === 0) {
        tableBody.innerHTML = `
            <tr><td colspan="7" class="text-center fw-bold">Data tidak tersedia</td></tr>
        `;
        return;
    }

    list.forEach((item) => {
        const tr = document.createElement("tr");

        // Email
        const tdEmail = document.createElement("td");
        tdEmail.textContent = item.email;
        tr.appendChild(tdEmail);

        // View button
        const tdView = document.createElement("td");
        tdView.className = "text-center";
        const aView = document.createElement("a");
        aView.href = `view_activitylogs?id=${item.id}`;
        aView.className = "btn btn-info px-3 py-3";
        aView.innerHTML = `<i class="fa-solid fa-eye"></i> View`;
        tdView.appendChild(aView);
        tr.appendChild(tdView);

        // Delete button
        const tdDelete = document.createElement("td");
        const btnDelete = document.createElement("button");
        btnDelete.className = "btn btn-danger px-3 py-3";
        btnDelete.innerHTML = `<i class="fa-solid fa-trash"></i>`;
        btnDelete.addEventListener("click", () =>
            konfirmasiHapus(item.email, item.id)
        );
        tdDelete.appendChild(btnDelete);
        tr.appendChild(tdDelete);

        tableBody.appendChild(tr);
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
    const modalNama = document.getElementById("namaActivityHapus");
    const modalId = document.getElementById("idActivityHapus");

    modalNama.innerText = nama;
    modalId.value = id;

    const modal = new bootstrap.Modal(
        document.getElementById("modalHapusActivity")
    );
    modal.show();
};

async function hapusActivityFinal() {
    const id = document.getElementById("idActivityHapus").value;

    const { error } = await supabase
        .from("activity_logs")
        .delete()
        .eq("id", id);

    if (error) {
        console.error(error);
        alert("Gagal menghapus data!");
        return;
    }

    const modal = bootstrap.Modal.getInstance(
        document.getElementById("modalHapusActivity")
    );
    modal.hide();

    // 🔄 Log hapus activity log
    const {
        data: { user },
    } = await supabase.auth.getUser();
    await ActivityLogController.log(
        "Hapus activity_logs",
        { id },
        user?.id,
        user?.email
    );

    loadResep();
}

const btnHapusAkhir = document.getElementById("btnHapusActivityFinal");
if (btnHapusAkhir) {
    btnHapusAkhir.addEventListener("click", hapusActivityFinal);
}
