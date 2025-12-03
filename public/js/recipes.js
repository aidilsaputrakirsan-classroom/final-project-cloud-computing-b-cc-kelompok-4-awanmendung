// Import Supabase
import { createClient } from "https://cdn.jsdelivr.net/npm/@supabase/supabase-js@2/+esm";

// Konfigurasi Supabase
const SUPABASE_URL = "https://mybfahpmnpasjmhutmcr.supabase.co";
const SUPABASE_KEY =
    "eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpc3MiOiJzdXBhYmFzZSIsInJlZiI6Im15YmZhaHBtbnBhc2ptaHV0bWNyIiwicm9sZSI6InNlcnZpY2Vfcm9sZSIsImlhdCI6MTc2MTMyODUwOCwiZXhwIjoyMDc2OTA0NTA4fQ.W6jf7DpnbdTmOAWBhV0NwFlfhKGQC62crCT-rfKoap8";

const supabase = createClient(SUPABASE_URL, SUPABASE_KEY);

// Elemen HTML
const recipeContainer = document.getElementById("recipes_resep");
const searchInput = document.getElementById("searchInput");
const categoryFilter = document.getElementById("kategoriFilter");

// =======================
// LOAD KATEGORI OTOMATIS
// =======================
async function loadCategories() {
    const { data, error } = await supabase.from("resep").select("kategori");

    if (error) {
        console.error("Gagal memuat kategori:", error.message);
        return;
    }

    const uniqueCats = [...new Set(data.map((i) => i.kategori))];

    uniqueCats.forEach((cat) => {
        if (cat) {
            const opt = document.createElement("option");
            opt.value = cat;
            opt.textContent = cat;
            categoryFilter.appendChild(opt);
        }
    });
}

// =======================
// LOAD RESEP DENGAN FILTER
// =======================
async function loadRecipes() {
    let searchText = searchInput.value.trim().toLowerCase();
    let selectedCat = categoryFilter.value;

    let query = supabase
        .from("resep")
        .select("id, nama_resep, kategori, gambar")
        .order("id", { ascending: false });

    // Filter kategori
    if (selectedCat !== "") {
        query = query.eq("kategori", selectedCat);
    }

    const { data, error } = await query;

    if (error) {
        console.error("Error:", error);
        recipeContainer.innerHTML = `<p>Gagal memuat data.</p>`;
        return;
    }

    // Filter search di sisi client
    const filtered = data.filter((item) =>
        item.nama_resep.toLowerCase().includes(searchText)
    );

    // Render resep
    recipeContainer.innerHTML = filtered
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
                    item.kategori || "Tanpa kategori"
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

// =======================
// EVENT LISTENER (REALTIME)
// =======================
searchInput.addEventListener("input", loadRecipes);
categoryFilter.addEventListener("change", loadRecipes);

// Jalankan pertama kali
loadCategories();
loadRecipes();
