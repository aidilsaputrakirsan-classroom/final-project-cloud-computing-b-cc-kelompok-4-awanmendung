import { supabase } from "./supabaseClient.js";
import ActivityLogController from "./controllers/ActivityLogController.js";

// 🔗 Supabase client sudah diimport dari supabaseClient.js

// 🔍 Ambil ID kategori dari URL
const urlParams = new URLSearchParams(window.location.search);
const kategoriId = urlParams.get("id");

// 🚀 Fungsi ambil data kategori
async function loadKategori() {
    if (!kategoriId) {
        alert("ID kategori tidak ditemukan!");
        window.location.href = "kategori";
        return;
    }

    const { data, error } = await supabase
        .from("kategori")
        .select("*")
        .eq("id", kategoriId)
        .maybeSingle();

    if (error) {
        console.error(error);
        alert("Gagal mengambil data kategori!");
        return;
    }

    if (data) {
        document.getElementById("namaKategori").value = data.nama_kategori;
    } else {
        alert("Kategori tidak ditemukan!");
        window.location.href = "kategori";
    }

    // 🔄 Log buka halaman edit
    const {
        data: { user },
    } = await supabase.auth.getUser();
    await ActivityLogController.log(
        "Buka halaman edit kategori",
        { id: kategoriId },
        user?.id,
        user?.email
    );
}

// 💾 Simpan perubahan
document
    .getElementById("formEditKategori")
    .addEventListener("submit", async (e) => {
        e.preventDefault();

        const namaBaru = document.getElementById("namaKategori").value.trim();
        if (!namaBaru) {
            alert("Nama kategori tidak boleh kosong!");
            return;
        }

        const { error } = await supabase
            .from("kategori")
            .update({ nama_kategori: namaBaru })
            .eq("id", kategoriId);

        if (error) {
            console.error(error);
            alert("❌ Gagal memperbarui kategori!");
        } else {
            // 🔄 Log update
            const {
                data: { user },
            } = await supabase.auth.getUser();
            await ActivityLogController.log(
                "Edit kategori",
                { id: kategoriId, namaBaru },
                user?.id,
                user?.email
            );

            alert("✅ Kategori berhasil diperbarui!");
            window.location.href = "kategori";
        }
    });

// ⏳ Jalankan load saat halaman dibuka
loadKategori();
