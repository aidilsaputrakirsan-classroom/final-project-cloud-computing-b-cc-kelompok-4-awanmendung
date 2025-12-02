// --- Supabase Connection ---
import ActivityLogController from "./controllers/ActivityLogController.js";
import { supabase } from "./supabaseClient.js";

// --- Variabel global ---
let kategoriTerpilih = null;

// --- Ambil data kategori dari Supabase ---
async function loadKategori() {
    const tableBody = document.querySelector("tbody");

    const { data, error } = await supabase
        .from("kategori")
        .select("*")
        .order("id", { ascending: true });

    if (error) {
        console.error("Gagal memuat kategori:", error);
        tableBody.innerHTML =
            '<tr><td colspan="2" class="text-center text-danger">Gagal memuat data</td></tr>';
        return;
    }

    tableBody.innerHTML = "";
    data.forEach((kategori) => {
        const tr = document.createElement("tr");
        tr.id = `kategori-${kategori.id}`;
        tr.innerHTML = `
      <td>${kategori.nama_kategori}</td>
      <td class="text-center">
        <a href="edit_kategori?id=${kategori.id}" class="btn btn-warning px-3 py-3">
          <i class="fa-solid fa-pen"></i>
        </a>
        <button class="btn btn-danger px-3 py-3" onclick="konfirmasiHapus('${kategori.nama_kategori}', ${kategori.id})">
          <i class="fa-solid fa-trash"></i>
        </button>
      </td>
    `;
        tableBody.appendChild(tr);
    });
}

// --- Fungsi Konfirmasi Hapus ---
window.konfirmasiHapus = function (namaKategori, idKategori) {
    kategoriTerpilih = idKategori;
    document.getElementById("namaKategoriHapus").textContent = namaKategori;
    const hapusModal = new bootstrap.Modal(
        document.getElementById("hapusModal")
    );
    hapusModal.show();
};

// --- Saat tombol konfirmasi ditekan ---
document.addEventListener("DOMContentLoaded", () => {
    const btnKonfirmasi = document.getElementById("btnKonfirmasiHapus");
    if (btnKonfirmasi) {
        btnKonfirmasi.addEventListener("click", async () => {
            if (kategoriTerpilih) {
                // Hapus dari database Supabase
                const { error } = await supabase
                    .from("kategori")
                    .delete()
                    .eq("id", kategoriTerpilih);

                if (error) {
                    alert("Gagal menghapus kategori: " + error.message);
                    return;
                }

                // Hapus dari tampilan tabel
                const baris = document.getElementById(
                    "kategori-" + kategoriTerpilih
                );
                if (baris) baris.remove();

                // Tutup
                const hapusModal = bootstrap.Modal.getInstance(
                    document.getElementById("hapusModal")
                );
                hapusModal.hide();

                // === LOG AKTIVITAS ===
                const {
                    data: { user },
                } = await supabase.auth.getUser();

                await ActivityLogController.log(
                    "Hapus kategori",
                    { id: kategoriTerpilih },
                    user?.id,
                    user?.email
                );
            }
        });
    }

    // Muat kategori pertama kali
    loadKategori();
});

// === LOG AKTIVITAS HALAMAN ===
const {
    data: { user },
} = await supabase.auth.getUser();

await ActivityLogController.log(
    "Buka halaman kategori",
    {},
    user?.id,
    user?.email
);

// --- Fungsi Pencarian Kategori ---
document.addEventListener("DOMContentLoaded", () => {
    const searchInput = document.getElementById("searchInput");
    const tableBody = document.querySelector("table tbody");

    if (searchInput && tableBody) {
        searchInput.addEventListener("keyup", () => {
            const filter = searchInput.value.toLowerCase();
            const rows = tableBody.getElementsByTagName("tr");

            for (let i = 0; i < rows.length; i++) {
                const namaKategori = rows[i].getElementsByTagName("td")[0];
                if (namaKategori) {
                    const textValue =
                        namaKategori.textContent || namaKategori.innerText;
                    rows[i].style.display = textValue
                        .toLowerCase()
                        .includes(filter)
                        ? ""
                        : "none";
                }
            }
        });
    }
});
