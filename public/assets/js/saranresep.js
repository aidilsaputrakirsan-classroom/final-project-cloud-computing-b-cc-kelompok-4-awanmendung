document.addEventListener("DOMContentLoaded", () => {
    loadResep();

    const searchInput = document.getElementById("searchInput");
    if (searchInput) {
        searchInput.addEventListener("keyup", () =>
            loadResep(searchInput.value)
        );
    }

    const btnHapus = document.getElementById("btnHapusSaranResepFinal");
    if (btnHapus) btnHapus.addEventListener("click", hapusSaranResepFinal);
});

async function loadResep(searchText = "") {
    const tableBody = document.getElementById("saranResepTableBody");
    tableBody.innerHTML = `<tr><td colspan="3">Loading...</td></tr>`;

    try {
        let url = "/saran_resep/list";
        const res = await fetch(url);
        const result = await res.json();

        if (!result.success) throw new Error("Gagal load data");

        let list = result.data;

        if (searchText.trim() !== "") {
            const s = searchText.toLowerCase();
            list = list.filter((item) =>
                (item.recipe_name || "").toLowerCase().includes(s)
            );
        }

        if (!list || list.length === 0) {
            tableBody.innerHTML = `<tr><td colspan="3" class="text-center fw-bold">Data tidak tersedia</td></tr>`;
            return;
        }

        tableBody.innerHTML = "";
        list.forEach((item) => {
            tableBody.innerHTML += `
                <tr>
                    <td>${item.recipe_name}</td>
                    <td class="text-center">
                        <a href="/saran_resep/view/${item.id}" class="btn btn-info">
                            <i class="fa-solid fa-eye"></i> View
                        </a>
                    </td>
                    <td>
                        <button class="btn btn-danger" onclick="konfirmasiHapus('${item.recipe_name}', ${item.id})">
                            <i class="fa-solid fa-trash"></i>
                        </button>
                    </td>
                </tr>
            `;
        });
    } catch (err) {
        console.error(err);
        tableBody.innerHTML = `<tr><td colspan="3">Gagal mengambil data</td></tr>`;
    }
}

window.konfirmasiHapus = function (nama, id) {
    document.getElementById("namaSaranResepHapus").textContent = nama;
    document.getElementById("idSaranResepHapus").value = id;
    const modal = new bootstrap.Modal(
        document.getElementById("modalHapusSaranResep")
    );
    modal.show();
};

async function hapusSaranResepFinal() {
    const id = document.getElementById("idSaranResepHapus").value;
    const token = document
        .querySelector('meta[name="csrf-token"]')
        .getAttribute("content");

    try {
        const res = await fetch(`/saran_resep/delete/${id}`, {
            method: "DELETE",
            headers: {
                "X-CSRF-TOKEN": token,
                Accept: "application/json",
                "Content-Type": "application/json",
            },
        });

        const result = await res.json();

        if (!result.success) throw new Error("Gagal hapus data");

        // Tutup modal
        const modal = bootstrap.Modal.getInstance(
            document.getElementById("modalHapusSaranResep")
        );
        modal.hide();

        // Refresh tabel
        loadResep();
    } catch (err) {
        console.error(err);
        alert("Gagal menghapus data!");
    }
}
