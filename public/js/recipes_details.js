// Import Supabase
import { createClient } from "https://cdn.jsdelivr.net/npm/@supabase/supabase-js@2/+esm";

// Konfigurasi Supabase
const SUPABASE_URL = "https://mybfahpmnpasjmhutmcr.supabase.co";
const SUPABASE_KEY =
    "eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpc3MiOiJzdXBhYmFzZSIsInJlZiI6Im15YmZhaHBtbnBhc2ptaHV0bWNyIiwicm9sZSI6InNlcnZpY2Vfcm9sZSIsImlhdCI6MTc2MTMyODUwOCwiZXhwIjoyMDc2OTA0NTA4fQ.W6jf7DpnbdTmOAWBhV0NwFlfhKGQC62crCT-rfKoap8";
const supabase = createClient(SUPABASE_URL, SUPABASE_KEY);

// Ambil ID resep dari URL
const params = new URLSearchParams(window.location.search);
const id = params.get("id");

// Target elemen HTML
const titleEl = document.getElementById("nama_resep");
const categoryEl = document.getElementById("kategori_resep");
const imageEl = document.getElementById("gambar_resep");
const alatEl = document.getElementById("alat_resep");
const bahanEl = document.getElementById("bahan_resep");
const langkahEl = document.getElementById("langkah_resep");

// Load data Supabase
async function loadRecipeDetail() {
    const { data, error } = await supabase
        .from("resep")
        .select("*")
        .eq("id", id)
        .single();

    if (error || !data) {
        titleEl.textContent = "Resep Tidak Ditemukan!";
        return;
    }

    // Set konten ke HTML
    titleEl.textContent = data.nama_resep;
    categoryEl.textContent = data.kategori || "-";
    imageEl.src = data.gambar || "assets/img/no-image.jpg";

    // List Alat Memasak
    try {
        const alatList = JSON.parse(data.alat);
        alatEl.innerHTML = alatList.map((item) => `<li>${item}</li>`).join("");
    } catch {
        alatEl.innerHTML = `<li>${data.alat || "-"}</li>`;
    }

    // List Bahan
    try {
        const bahanList = JSON.parse(data.bahan);
        bahanEl.innerHTML = bahanList
            .map((item) => `<li>${item}</li>`)
            .join("");
    } catch {
        bahanEl.innerHTML = `<li>${data.bahan || "-"}</li>`;
    }

    // Langkah Memasak
    try {
        const langkahList = JSON.parse(data.deskripsi);
        langkahEl.innerHTML = langkahList
            .map((item) => `<li>${item}</li>`)
            .join("");
    } catch {
        langkahEl.innerHTML = `<li>${data.deskripsi || "-"}</li>`;
    }
}

// Run saat halaman dimuat
loadRecipeDetail();
