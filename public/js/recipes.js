// Import Supabase
import { createClient } from "https://cdn.jsdelivr.net/npm/@supabase/supabase-js@2/+esm";

// Konfigurasi Supabase kamu
const SUPABASE_URL = "https://mybfahpmnpasjmhutmcr.supabase.co";
const SUPABASE_KEY =
    "eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpc3MiOiJzdXBhYmFzZSIsInJlZiI6Im15YmZhaHBtbnBhc2ptaHV0bWNyIiwicm9sZSI6InNlcnZpY2Vfcm9sZSIsImlhdCI6MTc2MTMyODUwOCwiZXhwIjoyMDc2OTA0NTA4fQ.W6jf7DpnbdTmOAWBhV0NwFlfhKGQC62crCT-rfKoap8";
const supabase = createClient(SUPABASE_URL, SUPABASE_KEY);

// Element container resep
const recipeContainer = document.getElementById("recipes_resep");

// Load resep dari database
async function loadRecipes() {
    const { data, error } = await supabase
        .from("resep")
        .select("id, nama_resep, kategori, gambar")
        .order("id", { ascending: false });

    if (error) {
        console.error("Gagal memuat resep:", error.message);
        recipeContainer.innerHTML = `<p>Gagal memuat data.</p>`;
        return;
    }

    recipeContainer.innerHTML = data
        .map(
            (item) => `
        <div class="col-xl-4 col-lg-4 col-md-6">
            <div class="single_recepie text-center">
                <div class="recepie_thumb">
                    <img src="${
                        item.gambar || "assets/img/no-image.jpg"
                    }" alt="${item.nama_resep}">
                </div>
                <h3 class="recipe_title">${item.nama_resep}</h3>
                <span class="recipe_category">${
                    item.kategori ?? "Tanpa kategori"
                }</span>
                <a href="recipes_details?id=${
                    item.id
                }" class="line_btn recipe-btn">
                    Lihat Resep Lengkap
                </a>
            </div>
        </div>
        `
        )
        .join("");
}

// Jalankan saat halaman dimuat
loadRecipes();
