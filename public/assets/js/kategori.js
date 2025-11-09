// --- Hapus Kategori ---
let kategoriTerpilih = null;

// Fungsi untuk menampilkan konfirmasi hapus
function konfirmasiHapus(namaKategori, idKategori) {
    kategoriTerpilih = idKategori;
    document.getElementById("namaKategoriHapus").textContent = namaKategori;
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
            if (kategoriTerpilih) {
                const baris = document.getElementById(
                    "kategori-" + kategoriTerpilih
                );
                if (baris) baris.remove();

                const hapusModal = bootstrap.Modal.getInstance(
                    document.getElementById("hapusModal")
                );
                hapusModal.hide();

                alert("Kategori berhasil dihapus!");
            }
        });
    }
});
