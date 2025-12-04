// Import Supabase
import { createClient } from "https://cdn.jsdelivr.net/npm/@supabase/supabase-js@2/+esm";

// Konfigurasi Supabase kamu
const SUPABASE_URL = "https://mybfahpmnpasjmhutmcr.supabase.co";
const SUPABASE_KEY =
    "eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpc3MiOiJzdXBhYmFzZSIsInJlZiI6Im15YmZhaHBtbnBhc2ptaHV0bWNyIiwicm9sZSI6ImFub24iLCJpYXQiOjE3NjEzMjg1MDgsImV4cCI6MjA3NjkwNDUwOH0.E_VI8-raJ3jRPAQc079j6jAhluiC4lSCmtIN9gMND6g";
const supabase = createClient(SUPABASE_URL, SUPABASE_KEY);

// Element container
const recipeContainer = document.getElementById("home_resep");
const moreButtonContainer = document.getElementById("resep_lainnya_btn");
const favoriteContainer = document.getElementById("favorite_recipes_container");

// =========================================
// 🚀 Load Resep Terbaru
// =========================================
async function loadRecipes() {
    const { data, error, count } = await supabase
        .from("resep")
        .select("id, nama_resep, kategori, gambar", {
            count: "exact",
            head: false,
        })
        .order("id", { ascending: false })
        .limit(3);

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
                    <img src="${item.gambar || "assets/img/no-image.jpg"}" 
                        alt="${item.nama_resep}">
                </div>
                <h3 class="recipe_title">${item.nama_resep}</h3>
                <span class="recipe_category">
                    ${item.kategori ?? "Tanpa kategori"}
                </span>
                <a href="recipes_details?id=${item.id}" class="line_btn">
                    Lihat Resep Lengkap
                </a>
            </div>
        </div>`
        )
        .join("");

    if (count > 3) {
        moreButtonContainer.innerHTML = `
            <div class="text-center mt-4">
                <a href="recipes" class="boxed-btn3">Lihat Resep Lainnya</a>
            </div>`;
    }
}

loadRecipes();

// =========================================
// ❤️ FAVORIT BERDASARKAN LIKE
// =========================================
async function loadFavoriteRecipes() {
    const { data: likesData, error } = await supabase
        .from("recipe_likes")
        .select("recipe_slug");

    if (error) {
        console.error("Gagal memuat likes:", error.message);
        return;
    }

    const likeCount = {};
    likesData.forEach((like) => {
        likeCount[like.recipe_slug] = (likeCount[like.recipe_slug] || 0) + 1;
    });

    const sorted = Object.entries(likeCount)
        .sort((a, b) => b[1] - a[1])
        .slice(0, 3);

    favoriteContainer.innerHTML = "";

    for (let i = 0; i < sorted.length; i++) {
        const rawSlug = sorted[i][0]; // contoh: "a23f4...:1"

        // FIX: ambil ID as UUID string
        const recipeId = rawSlug.split(":")[0];

        const count = sorted[i][1];

        const { data: resepData, error: resepError } = await supabase
            .from("resep")
            .select("id, nama_resep, gambar")
            .eq("id", recipeId)
            .single();

        if (resepError || !resepData) continue;

        favoriteContainer.innerHTML += `
        <a href="recipes_details?id=${recipeId}" class="favorite_card">
            <div class="single_dish text-center">
                <div class="favorite_badge">
                    <i class="fa fa-heart"></i> #${i + 1}
                </div>
                <div class="thumb">
                    <img src="${resepData.gambar || "assets/img/no-image.jpg"}" 
                         alt="${resepData.nama_resep}">
                </div>
                <h3>${resepData.nama_resep}</h3>
                <span class="favorite_rank">${count} Likes</span>
            </div>
        </a>`;
    }
}

loadFavoriteRecipes();
