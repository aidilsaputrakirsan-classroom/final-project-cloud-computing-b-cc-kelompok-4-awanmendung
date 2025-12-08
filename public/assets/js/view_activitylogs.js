document.addEventListener("DOMContentLoaded", async () => {
    // Ambil segment terakhir URL
    const pathParts = window.location.pathname.split("/");
    const id = pathParts[pathParts.length - 1]; // contoh: 1141

    if (!id) {
        console.error("ID tidak ditemukan dalam URL.");
        return;
    }

    try {
        const res = await fetch(`/activity_logs/api/${id}`);
        if (!res.ok) throw new Error("Gagal mengambil data.");

        const data = await res.json();

        // ========================
        // Tampilkan Detail sebagai tabel
        // ========================
        const detailList = document.getElementById("detail_resep");
        detailList.innerHTML = "";

        // Pastikan element ada
        if (detailList) {
            let details = [];

            // Jika detail adalah object, ubah jadi array key-value
            if (
                typeof data.detail === "object" &&
                !Array.isArray(data.detail)
            ) {
                for (const key in data.detail) {
                    if (data.detail.hasOwnProperty(key)) {
                        details.push(`${key}: ${data.detail[key]}`);
                    }
                }
            } else if (Array.isArray(data.detail)) {
                details = data.detail;
            } else if (typeof data.detail === "string") {
                details = [data.detail];
            }

            if (details.length > 0) {
                details.forEach((item) => {
                    const li = document.createElement("li");
                    li.textContent = item;
                    li.style.listStyle = "none";
                    li.style.paddingLeft = "0";
                    detailList.appendChild(li);
                });
            } else {
                detailList.textContent = "-";
            }
        }

        // ========================
        // Tampilkan Description sebagai list
        // ========================
        const descriptionEl = document.getElementById("description_resep");
        descriptionEl.innerHTML = "";
        if (data.description) {
            const ul = document.createElement("ul");
            ul.className = "list-group list-group-flush";
            data.description.split("\n").forEach((item) => {
                if (item.trim() !== "") {
                    const li = document.createElement("li");
                    li.style.listStyle = "none";
                    li.textContent = item;
                    ul.appendChild(li);
                }
            });
            descriptionEl.appendChild(ul);
        } else {
            descriptionEl.textContent = "-";
        }
    } catch (error) {
        console.error("Gagal memuat data:", error);
    }
});
