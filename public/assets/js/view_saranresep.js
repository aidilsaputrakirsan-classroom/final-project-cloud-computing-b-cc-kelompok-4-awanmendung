document.addEventListener("DOMContentLoaded", () => {
    const feedbackEl = document.getElementById("feedbackData");
    if (!feedbackEl) {
        console.error("Data feedback tidak ditemukan di DOM.");
        return;
    }

    const data = JSON.parse(feedbackEl.textContent);

    // Kontak
    const kontakList = document.getElementById("kontak_resep");
    kontakList.innerHTML = data.contact_number
        ? data.contact_number
              .split("\n")
              .map((n) => `<li>${n}</li>`)
              .join("")
        : "<li>-</li>";

    // Bahan
    const bahanList = document.getElementById("bahan_resep");
    bahanList.innerHTML = data.main_ingredients
        ? data.main_ingredients
              .split("\n")
              .map((n) => `<li>${n}</li>`)
              .join("")
        : "<li>-</li>";

    // Langkah
    const langkahList = document.getElementById("langkah_resep");
    langkahList.innerHTML = data.cooking_steps
        ? data.cooking_steps
              .split("\n")
              .map((n) => `<li>${n}</li>`)
              .join("")
        : "<li>-</li>";
});
