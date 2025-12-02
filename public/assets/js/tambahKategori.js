// tambahKategori.js
import { supabase } from "./supabaseClient.js";
import ActivityLogController from "./controllers/ActivityLogController.js";

document.addEventListener("DOMContentLoaded", () => {
    const form = document.getElementById("formTambahKategori");
    if (!form) return;

    form.addEventListener("submit", async (e) => {
        e.preventDefault();

        const namaKategori = document
            .getElementById("namaKategori")
            .value.trim();
        if (!namaKategori) {
            alert("Nama kategori tidak boleh kosong!");
            return;
        }

        // Simpan ke Supabase
        const { error, data } = await supabase
            .from("kategori")
            .insert([{ nama_kategori: namaKategori }])
            .select();

        if (error) {
            console.error(error);
            alert("❌ Gagal menyimpan kategori!");
            return;
        }

        // Log aktivitas
        const {
            data: { user },
        } = await supabase.auth.getUser();
        await ActivityLogController.log(
            "Tambah kategori",
            { id: data[0].id, nama_kategori: data[0].nama_kategori },
            user?.id,
            user?.email
        );

        alert("✅ Kategori berhasil disimpan!");
        window.location.href = "kategori";
    });
});
