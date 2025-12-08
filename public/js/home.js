// Element container
const recipeContainer = document.getElementById("home_resep");
const moreButtonContainer = document.getElementById("resep_lainnya_btn");

async function loadRecipes() {
    try {
        const res = await fetch("/home/recipes");
        const result = await res.json();

        if (!result.success || !result.data.length) {
            recipeContainer.innerHTML = `<p>Resep tidak tersedia.</p>`;
            return;
        }

        const data = result.data;

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

        if (data.length >= 3) {
            moreButtonContainer.innerHTML = `
                <div class="text-center mt-4">
                    <a href="recipes" class="boxed-btn3">Lihat Resep Lainnya</a>
                </div>`;
        }
    } catch (err) {
        console.error("Gagal memuat resep:", err);
        recipeContainer.innerHTML = `<p>Terjadi kesalahan saat memuat resep.</p>`;
    }
}

document.addEventListener("DOMContentLoaded", loadRecipes);
