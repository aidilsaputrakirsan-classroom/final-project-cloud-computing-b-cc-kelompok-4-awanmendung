import ActivityLogController from "./controllers/ActivityLogController.js";

document.addEventListener("DOMContentLoaded", async () => {
    await logPageOpen();
    setupSearch();
    setupDelete();
    loadActivityLogs();
});

// ==========================
// Log buka halaman
// ==========================
async function logPageOpen() {
    const userId = document.body.dataset.userId || null;
    const userEmail = document.body.dataset.userEmail || null;

    await ActivityLogController.log(
        "Buka halaman activity logs",
        {},
        userId,
        userEmail
    );
}

// ==========================
// Load tabel activity logs
// ==========================
async function loadActivityLogs(searchText = "") {
    const tableBody = document.getElementById("activityTableBody");
    tableBody.innerHTML = `<tr><td colspan="7">Loading...</td></tr>`;

    try {
        const res = await fetch("/activity_logs/list");
        const result = await res.json();

        if (!result.success) throw new Error("Gagal load data");

        let list = result.data;

        if (searchText.trim() !== "") {
            const s = searchText.toLowerCase();
            list = list.filter((item) =>
                (item.email || "").toLowerCase().includes(s)
            );
        }

        tableBody.innerHTML = "";

        if (!list || list.length === 0) {
            tableBody.innerHTML = `<tr><td colspan="7" class="text-center fw-bold">Data tidak tersedia</td></tr>`;
            return;
        }

        // Bangun tabel secara dinamis tanpa inline onclick
        list.forEach((item) => {
            const tr = document.createElement("tr");

            // View
            const tdView = document.createElement("td");
            tdView.className = "text-center";
            const aView = document.createElement("a");
            aView.href = `/activity_logs/view/${item.id}`;
            aView.className = "btn btn-info";
            aView.innerHTML = `<i class="fa-solid fa-eye"></i> View`;
            tdView.appendChild(aView);
            tr.appendChild(tdView);

            // Delete
            const tdDelete = document.createElement("td");
            const btnDelete = document.createElement("button");
            btnDelete.className = "btn btn-danger";
            btnDelete.innerHTML = `<i class="fa-solid fa-trash"></i>`;
            btnDelete.addEventListener("click", () =>
                konfirmasiHapus(item.email, item.id)
            );
            tdDelete.appendChild(btnDelete);
            tr.appendChild(tdDelete);

            tableBody.appendChild(tr);
        });
    } catch (err) {
        console.error(err);
        tableBody.innerHTML = `<tr><td colspan="7">Gagal mengambil data</td></tr>`;
    }
}

// ==========================
// Search
// ==========================
function setupSearch() {
    const searchInput = document.getElementById("searchInput");
    if (!searchInput) return;

    searchInput.addEventListener("keyup", () => {
        loadActivityLogs(searchInput.value);
    });
}

// ==========================
// Hapus
// ==========================
window.konfirmasiHapus = function (nama, id) {
    document.getElementById("namaActivityHapus").textContent = nama;
    document.getElementById("idActivityHapus").value = id;

    const modal = new bootstrap.Modal(
        document.getElementById("modalHapusActivity")
    );
    modal.show();
};

function setupDelete() {
    const btnHapus = document.getElementById("btnHapusActivityFinal");
    if (!btnHapus) return;

    btnHapus.addEventListener("click", hapusActivityFinal);
}

async function hapusActivityFinal() {
    const id = document.getElementById("idActivityHapus").value;

    try {
        const res = await fetch(`/activity_logs/delete/${id}`, {
            method: "DELETE",
            headers: {
                "X-CSRF-TOKEN": document
                    .querySelector('meta[name="csrf-token"]')
                    .getAttribute("content"),
                Accept: "application/json",
            },
        });

        // Pastikan response JSON
        let result;
        try {
            result = await res.json();
        } catch (e) {
            const text = await res.text();
            console.error("Response bukan JSON:", text);
            alert("Gagal menghapus data. Response tidak valid.");
            return;
        }

        if (!result.success) {
            alert("Gagal hapus data!");
            return;
        }

        // Tutup modal
        const modal = bootstrap.Modal.getInstance(
            document.getElementById("modalHapusActivity")
        );
        modal.hide();

        // Log hapus activity
        const userId = document.body.dataset.userId || null;
        const userEmail = document.body.dataset.userEmail || null;

        await ActivityLogController.log(
            "Hapus activity_logs",
            { id },
            userId,
            userEmail
        );

        // Refresh tabel
        loadActivityLogs();
    } catch (err) {
        console.error(err);
        alert("Gagal menghapus data!");
    }
}
