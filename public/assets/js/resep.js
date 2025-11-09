// --- Hapus Resep ---
let resepTerpilih = null;

// Fungsi untuk menampilkan konfirmasi hapus
function konfirmasiHapus(namaResep, idResep) {
    resepTerpilih = idResep;
    document.getElementById("namaResepHapus").textContent = namaResep;
    const hapusModal = new bootstrap.Modal(
        document.getElementById("hapusModal")
    );
    hapusModal.show();
}

// Saat tombol konfirmasi ditekan
document.addEventListener("DOMContentLoaded", () => {
    const btnKonfirmasi = document.getElementById("btnKonfirmasiHapus");
    if (btnKonfirmasi) {
        btnKonfirmasi.addEventListener("click", () => {
            if (resepTerpilih) {
                const baris = document.getElementById("resep-" + resepTerpilih);
                if (baris) baris.remove();

                const hapusModal = bootstrap.Modal.getInstance(
                    document.getElementById("hapusModal")
                );
                hapusModal.hide();

                alert("Resep berhasil dihapus!");
            }
        });
    }
});
