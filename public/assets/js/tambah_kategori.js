document.addEventListener("DOMContentLoaded", () => {
    const form = document.getElementById("formTambahKategori");

    form.addEventListener("submit", async (e) => {
        e.preventDefault();

        const namaKategori = document
            .getElementById("namaKategori")
            .value.trim();
        if (!namaKategori) {
            alert("Nama kategori wajib diisi!");
            return;
        }

        try {
            const res = await fetch("/kategori/store", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-TOKEN": document
                        .querySelector('meta[name="csrf-token"]')
                        .getAttribute("content"),
                },
                body: JSON.stringify({
                    nama_kategori: namaKategori,
                }),
            });

            const data = await res.json();

            if (!data.success) {
                throw new Error(data.message);
            }

            alert("✔ Kategori berhasil disimpan!");
            window.location.href = "/kategori";
        } catch (err) {
            console.error(err);
            alert("❌ Gagal menyimpan kategori!");
        }
    });
});
