const recipeContainer = document.getElementById("recipes_resep");
const searchInput = document.getElementById("searchInput");
const categoryFilter = document.getElementById("kategoriFilter");

// =======================
// LOAD KATEGORI OTOMATIS
// =======================
async function loadCategories() {
    try {
        const res = await fetch("/kategori/list"); // endpoint kategori
        const result = await res.json();

        if (!result.success || !result.data.length) return;

        result.data.forEach((kat) => {
            const opt = document.createElement("option");
            opt.value = kat.nama_kategori;
            opt.textContent = kat.nama_kategori;
            categoryFilter.appendChild(opt);
        });
    } catch (err) {
        console.error("Gagal load kategori:", err);
    }
}

// =======================
// LOAD RESEP DENGAN FILTER
// =======================
async function loadRecipes() {
    const searchText = searchInput.value.trim().toLowerCase();
    const selectedCat = categoryFilter.value;

    const params = new URLSearchParams();
    if (selectedCat) params.append("kategori", selectedCat);

    try {
        const res = await fetch("/recipes/list?" + params.toString());
        const result = await res.json();

        if (!result.success || !result.data.length) {
            recipeContainer.innerHTML = `<p>Resep tidak tersedia.</p>`;
            return;
        }

        let data = result.data;

        // Filter search di sisi client
        if (searchText !== "") {
            data = data.filter((item) =>
                item.nama_resep.toLowerCase().includes(searchText)
            );
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
                        item.kategori || "Tanpa kategori"
                    }</span>
                    <a href="recipes_details?id=${
                        item.id
                    }" class="line_btn recipe-btn">Lihat Resep Lengkap</a>
                </div>
            </div>`
            )
            .join("");
    } catch (err) {
        console.error("Gagal load resep:", err);
        recipeContainer.innerHTML = `<p>Terjadi kesalahan saat memuat resep.</p>`;
    }
}

// Event listener
searchInput.addEventListener("input", loadRecipes);
categoryFilter.addEventListener("change", loadRecipes);

// Jalankan pertama kali
loadCategories();
loadRecipes();
