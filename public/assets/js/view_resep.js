document.addEventListener("DOMContentLoaded", loadResepView);

async function loadResepView() {
    const params = new URLSearchParams(window.location.search);
    const id = params.get("id");

    if (!id) {
        console.error("ID resep tidak ditemukan di URL.");
        return;
    }

    try {
        // Panggil controller Laravel untuk ambil resep
        const res = await fetch(`/resep/view/${id}`);
        const result = await res.json();
        console.log(result);

        if (!result.success || !result.data) {
            alert("Resep tidak ditemukan!");
            return;
        }

        const data = result.data;

        // ========================
        // Tampilkan Alat
        // ========================
        const alatList = document.getElementById("alat_resep");
        alatList.innerHTML = "";
        if (data.alat) {
            data.alat.split("\n").forEach((item) => {
                if (item.trim() !== "") {
                    const li = document.createElement("li");
                    li.textContent = item;
                    li.style.listStyle = "none";
                    li.style.paddingLeft = "0";
                    alatList.appendChild(li);
                }
            });
        } else {
            alatList.innerHTML = "<li>-</li>";
        }

        // ========================
        // Tampilkan Bahan
        // ========================
        const bahanList = document.getElementById("bahan_resep");
        bahanList.innerHTML = "";
        if (data.bahan) {
            data.bahan.split("\n").forEach((item) => {
                if (item.trim() !== "") {
                    const li = document.createElement("li");
                    li.textContent = item;
                    li.style.listStyle = "none";
                    li.style.paddingLeft = "0";
                    bahanList.appendChild(li);
                }
            });
        } else {
            bahanList.innerHTML = "<li>-</li>";
        }

        // ========================
        // Tampilkan Deskripsi
        // ========================
        const desc = document.getElementById("deskripsi_resep");
        desc.innerHTML = data.deskripsi
            ? data.deskripsi.replace(/\n/g, "<br>")
            : "-";
    } catch (error) {
        console.error("Gagal load resep:", error);
        alert("Terjadi kesalahan saat memuat resep");
    }
}
