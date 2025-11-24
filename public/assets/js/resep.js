// Import Supabase
import { createClient } from "https://cdn.jsdelivr.net/npm/@supabase/supabase-js@2/+esm";

// Konfigurasi Supabase
const SUPABASE_URL = "https://mybfahpmnpasjmhutmcr.supabase.co";
const SUPABASE_KEY =
    "eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpc3MiOiJzdXBhYmFzZSIsInJlZiI6Im15YmZhaHBtbnBhc2ptaHV0bWNyIiwicm9sZSI6InNlcnZpY2Vfcm9sZSIsImlhdCI6MTc2MTMyODUwOCwiZXhwIjoyMDc2OTA0NTA4fQ.W6jf7DpnbdTmOAWBhV0NwFlfhKGQC62crCT-rfKoap8";

const supabase = createClient(SUPABASE_URL, SUPABASE_KEY);

// ==========================
// LOAD KATEGORI DROPDOWN
// ==========================
async function loadKategori() {
    const select = document.getElementById("kategoriSelect");
    if (!select) return;

    select.innerHTML = `<option value="">Memuat kategori...</option>`;

    const { data, error } = await supabase
        .from("kategori")
        .select("*")
        .order("id", { ascending: true });

    if (error) {
        console.error("Gagal memuat kategori:", error);
        select.innerHTML = `<option value="">Gagal memuat kategori</option>`;
        return;
    }

    select.innerHTML = `<option value="">Pilih kategori...</option>`;
    data.forEach((k) => {
        select.innerHTML += `<option value="${k.nama_kategori}">${k.nama_kategori}</option>`;
    });
}

document.addEventListener("DOMContentLoaded", loadKategori);

// ==========================
// PREVIEW GAMBAR
// ==========================
const gambarInput = document.getElementById("gambarInput");

if (gambarInput) {
    gambarInput.addEventListener("change", function () {
        const img = document.getElementById("previewImg");
        img.src = URL.createObjectURL(this.files[0]);
        img.classList.remove("d-none");
    });
}

// ==========================
// SUBMIT FORM RESEP
// ==========================
const form = document.getElementById("formTambahResep");

if (form) {
    form.addEventListener("submit", async (e) => {
        e.preventDefault();

        const nama_resep = e.target.nama_resep.value;
        const kategori = e.target.kategori.value;
        const deskripsi = e.target.deskripsi.value;
        const file = document.getElementById("gambarInput").files[0];

        if (!file) return alert("Gambar belum diupload!");

        const fileName = `resep_${Date.now()}_${file.name}`;

        const { error: uploadErr } = await supabase.storage
            .from("gambar")
            .upload(fileName, file);

        if (uploadErr) {
            console.error(uploadErr);
            return alert("Gagal upload gambar!");
        }

        const { data: urlData } = supabase.storage
            .from("gambar")
            .getPublicUrl(fileName);

        const gambar_url = urlData.publicUrl;

        const { error } = await supabase.from("resep").insert({
            nama_resep,
            kategori,
            deskripsi,
            gambar: gambar_url,
        });

        if (error) {
            console.error(error);
            return alert("Gagal menyimpan resep!");
        }

        alert("Resep berhasil disimpan!");
        window.location.href = "dashboard";
    });
}

// ==========================
// LOAD DATA RESEP (FILTER + SEARCH)
// ==========================
async function loadResep(kategoriFilter = "", searchText = "") {
    const tableBody = document.getElementById("resepTableBody");
    tableBody.innerHTML = `<tr><td colspan="5">Loading...</td></tr>`;

    let query = supabase
        .from("resep")
        .select("id, nama_resep, kategori, deskripsi, gambar");

    if (kategoriFilter !== "") query = query.eq("kategori", kategoriFilter);

    const { data, error } = await query;

    if (error) {
        console.error("Error mengambil data:", error);
        tableBody.innerHTML = `<tr><td colspan="5">Gagal mengambil data</td></tr>`;
        return;
    }

    let list = data;

    if (searchText.trim() !== "") {
        const s = searchText.toLowerCase();
        list = list.filter((item) => item.nama_resep.toLowerCase().includes(s));
    }

    if (!list || list.length === 0) {
        tableBody.innerHTML = `
            <tr><td colspan="5" class="text-center fw-bold">Resep tidak tersedia</td></tr>
        `;
        return;
    }

    tableBody.innerHTML = "";

    list.forEach((resep) => {
        const row = `
            <tr>
              <td>${resep.nama_resep}</td>
              <td>${resep.kategori}</td>
              <td class="text-center">
                <img src="${resep.gambar}" width="70" class="rounded">
              </td>
              <td>${resep.deskripsi.replace(/\n/g, "<br>")}</td>
              <td>
                <a href="edit_resep?id=${
                    resep.id
                }" class="btn btn-warning px-3 py-3">
                    <i class="fa-solid fa-pen"></i>
                </a>

                <button class="btn btn-danger px-3 py-3" 
                        onclick="konfirmasiHapus('${resep.nama_resep}', ${
            resep.id
        })">
                    <i class="fa-solid fa-trash"></i>
                </button>
              </td>
            </tr>
        `;
        tableBody.innerHTML += row;
    });
}

// ==========================
// LOAD KATEGORI FILTER
// ==========================
async function loadKategoriFilter() {
    try {
        const res = await fetch(
            "https://mybfahpmnpasjmhutmcr.supabase.co/rest/v1/kategori?select=*",
            {
                headers: {
                    apikey: SUPABASE_KEY,
                    Authorization: "Bearer " + SUPABASE_KEY,
                },
            }
        );

        const data = await res.json();

        const filter = document.getElementById("categoryFilter");
        filter.innerHTML = `<option value="">Semua Kategori</option>`;

        data.forEach((k) => {
            filter.innerHTML += `<option value="${k.nama_kategori}">${k.nama_kategori}</option>`;
        });
    } catch (error) {
        console.error("Error memuat filter:", error);
    }
}

// ==========================
// EVENT FILTER + SEARCH
// ==========================
document.addEventListener("DOMContentLoaded", () => {
    loadKategoriFilter();
    loadResep();

    const filter = document.getElementById("categoryFilter");
    const searchInput = document.getElementById("searchInput");

    if (filter)
        filter.addEventListener("change", () =>
            loadResep(filter.value, searchInput.value)
        );

    if (searchInput)
        searchInput.addEventListener("keyup", () =>
            loadResep(filter.value, searchInput.value)
        );
});

// ==========================
// EDIT RESEP
// ==========================
const urlParams = new URLSearchParams(window.location.search);
const editId = urlParams.get("id");

const editNama = document.getElementById("editNamaResep");
const editKategori = document.getElementById("editKategori");
const editDeskripsi = document.getElementById("editDeskripsi");
const editGambarInput = document.getElementById("editGambarInput");
const editPreviewImg = document.getElementById("editPreviewImg");
const editForm = document.getElementById("formEditResep");

async function loadKategoriEdit() {
    if (!editKategori) return;

    const { data, error } = await supabase
        .from("kategori")
        .select("*")
        .order("id");

    if (error) return console.error("Gagal load kategori edit:", error);

    editKategori.innerHTML = `<option value="">Pilih kategori...</option>`;

    data.forEach((k) => {
        editKategori.innerHTML += `<option value="${k.nama_kategori}">${k.nama_kategori}</option>`;
    });
}

async function loadDataEditResep() {
    if (!editId || !editForm) return;

    const { data, error } = await supabase
        .from("resep")
        .select("*")
        .eq("id", editId)
        .single();

    if (error) return;

    editNama.value = data.nama_resep;
    editKategori.value = data.kategori;
    editDeskripsi.value = data.deskripsi;

    if (data.gambar) {
        editPreviewImg.src = data.gambar;
        editPreviewImg.classList.remove("d-none");
    }
}

if (editGambarInput) {
    editGambarInput.addEventListener("change", function () {
        editPreviewImg.src = URL.createObjectURL(this.files[0]);
        editPreviewImg.classList.remove("d-none");
    });
}

if (editForm) {
    editForm.addEventListener("submit", async (e) => {
        e.preventDefault();

        const nama_resep = editNama.value;
        const kategori = editKategori.value;
        const deskripsi = editDeskripsi.value;

        let gambar_url = null;

        if (editGambarInput.files.length > 0) {
            const file = editGambarInput.files[0];
            const fileName = `resep_${Date.now()}_${file.name}`;

            const { error: uploadErr } = await supabase.storage
                .from("gambar")
                .upload(fileName, file);

            if (uploadErr) {
                console.error(uploadErr);
                return alert("Gagal upload gambar baru!");
            }

            const { data: urlData } = supabase.storage
                .from("gambar")
                .getPublicUrl(fileName);

            gambar_url = urlData.publicUrl;
        }

        const updateData = {
            nama_resep,
            kategori,
            deskripsi,
        };

        if (gambar_url) updateData.gambar = gambar_url;

        const { error } = await supabase
            .from("resep")
            .update(updateData)
            .eq("id", editId);

        if (error) {
            console.error(error);
            return alert("Gagal update resep!");
        }

        alert("Resep berhasil diperbarui!");
        window.location.href = "dashboard";
    });
}

if (editId) {
    loadKategoriEdit();
    loadDataEditResep();
}

// ===================================================================
// ========================== FITUR HAPUS ============================
// ===================================================================

// BUKA MODAL KONFIRMASI
window.konfirmasiHapus = function (nama, id) {
    const modalNama = document.getElementById("namaResepHapus");
    const modalId = document.getElementById("idResepHapus");

    modalNama.innerText = nama;
    modalId.value = id;

    const modal = new bootstrap.Modal(
        document.getElementById("modalHapusResep")
    );
    modal.show();
};

// HAPUS DATA DI SUPABASE
async function hapusResepFinal() {
    const id = document.getElementById("idResepHapus").value;

    const { error } = await supabase.from("resep").delete().eq("id", id);

    if (error) {
        console.error(error);
        alert("Gagal menghapus resep!");
        return;
    }

    const modal = bootstrap.Modal.getInstance(
        document.getElementById("modalHapusResep")
    );
    modal.hide();

    loadResep(); // refresh tabel
}

// TOMBOL HAPUS
const btnHapusAkhir = document.getElementById("btnHapusResepFinal");

if (btnHapusAkhir) {
    btnHapusAkhir.addEventListener("click", hapusResepFinal);
}
