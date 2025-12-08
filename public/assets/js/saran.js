document.addEventListener("DOMContentLoaded", () => {
    // Load kategori dropdown dan tabel
    loadKategori();
    loadResep();

    const categorySelect = document.getElementById("categoryFilter");
    const searchInput = document.getElementById("searchInput");

    // Event listener filter kategori
    if (categorySelect) {
        categorySelect.addEventListener("change", () => {
            loadResep(
                categorySelect.value,
                searchInput ? searchInput.value : ""
            );
        });
    }

    // Event listener search
    if (searchInput) {
        searchInput.addEventListener("input", () => {
            loadResep(
                categorySelect ? categorySelect.value : "",
                searchInput.value
            );
        });
    }

    // Event listener tombol hapus final
    const btnHapus = document.getElementById("btnHapusSaranFinal");
    if (btnHapus) {
        btnHapus.addEventListener("click", hapusSaranFinal);
    }
});

// Fungsi konfirmasi hapus (dipanggil dari tombol delete)
function konfirmasiHapus(nama, id) {
    document.getElementById("namaSaranHapus").textContent = nama;
    document.getElementById("idSaranHapus").value = id;
    const modal = new bootstrap.Modal(
        document.getElementById("modalHapusSaran")
    );
    modal.show();
}

// Load kategori dropdown
async function loadKategori() {
    const select = document.getElementById("categoryFilter");
    if (!select) return;

    select.innerHTML = `<option value="">Memuat kategori...</option>`;

    try {
        const res = await fetch("/saran/list");
        const result = await res.json();

        if (!result.success) throw new Error("Gagal load kategori");

        const uniqueCategories = [
            ...new Set(result.data.map((r) => r.category)),
        ];

        select.innerHTML = `<option value="">Semua Kategori</option>`;
        uniqueCategories.forEach((cat) => {
            select.innerHTML += `<option value="${cat}">${cat}</option>`;
        });
    } catch (err) {
        console.error(err);
        select.innerHTML = `<option value="">Gagal memuat kategori</option>`;
    }
}

// Load data tabel saran
async function loadResep(kategoriFilter = "", searchText = "") {
    const tableBody = document.getElementById("saranTableBody");
    tableBody.innerHTML = `<tr><td colspan="7">Loading...</td></tr>`;

    try {
        let url = "/saran/list";
        if (kategoriFilter)
            url += `?kategori=${encodeURIComponent(kategoriFilter)}`;

        const res = await fetch(url);
        const result = await res.json();

        if (!result.success) throw new Error("Gagal mengambil data");

        let list = result.data;

        // Filter search di frontend
        if (searchText.trim()) {
            const s = searchText.toLowerCase();
            list = list.filter(
                (item) =>
                    (item.name || "").toLowerCase().includes(s) ||
                    (item.category || "").toLowerCase().includes(s)
            );
        }

        if (!list.length) {
            tableBody.innerHTML = `<tr><td colspan="7" class="text-center fw-bold">Data tidak tersedia</td></tr>`;
            return;
        }

        tableBody.innerHTML = "";
        list.forEach((item) => {
            tableBody.innerHTML += `
                <tr>
                    <td>${item.name}</td>
                    <td>${item.category}</td>
                    <td class="text-center">
                        <a href="/saran/view/${item.id}" class="btn btn-info px-3 py-3">
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
        });
    } catch (err) {
        console.error(err);
        tableBody.innerHTML = `<tr><td colspan="7">Gagal mengambil data</td></tr>`;
    }
}

// Hapus saran
async function hapusSaranFinal() {
    const id = document.getElementById("idSaranHapus").value;
    const token = document
        .querySelector('meta[name="csrf-token"]')
        .getAttribute("content");

    try {
        const res = await fetch(`/saran/delete/${id}`, {
            method: "DELETE",
            headers: {
                "Content-Type": "application/json",
                "X-CSRF-TOKEN": token,
            },
        });
        const result = await res.json();

        if (!result.success) throw new Error("Gagal menghapus data");

        // Tutup modal
        const modal = bootstrap.Modal.getInstance(
            document.getElementById("modalHapusSaran")
        );
        modal.hide();

        // Refresh tabel
        const categorySelect = document.getElementById("categoryFilter");
        const searchInput = document.getElementById("searchInput");
        loadResep(
            categorySelect ? categorySelect.value : "",
            searchInput ? searchInput.value : ""
        );
    } catch (err) {
        console.error(err);
        alert("Gagal menghapus data!");
    }
}

window.konfirmasiHapus = function (nama, id) {
    document.getElementById("namaSaranHapus").textContent = nama;
    document.getElementById("idSaranHapus").value = id;
    const modal = new bootstrap.Modal(
        document.getElementById("modalHapusSaran")
    );
    modal.show();
};
