// --- Supabase Connection ---
import { createClient } from "https://cdn.jsdelivr.net/npm/@supabase/supabase-js@2/+esm";

const SUPABASE_URL = "https://mybfahpmnpasjmhutmcr.supabase.co";
const SUPABASE_KEY =
    "eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpc3MiOiJzdXBhYmFzZSIsInJlZiI6Im15YmZhaHBtbnBhc2ptaHV0bWNyIiwicm9sZSI6InNlcnZpY2Vfcm9sZSIsImlhdCI6MTc2MTMyODUwOCwiZXhwIjoyMDc2OTA0NTA4fQ.W6jf7DpnbdTmOAWBhV0NwFlfhKGQC62crCT-rfKoap8";
const supabase = createClient(SUPABASE_URL, SUPABASE_KEY);

// ==========================
// LOAD NAMA
// ==========================
async function loadABD() {
    const params = new URLSearchParams(window.location.search);
    const id = params.get("id");

    if (!id) {
        console.error("ID tidak ditemukan dalam URL.");
        return;
    }

    const { data, error } = await supabase
        .from("recipe_suggestions")
        .select("contact_number, main_ingredients, cooking_steps")
        .eq("id", id)
        .single();

    if (error) {
        console.error("Gagal memuat data:", error);
        return;
    }

    // ========================
    // Tampilkan Kontak
    // ========================
    const kontakList = document.getElementById("kontak_resep");
    kontakList.innerHTML = "";

    kontakList.style.listStyle = "none";
    kontakList.style.paddingLeft = "0";

    if (data.contact_number) {
        data.contact_number.split("\n").forEach((item) => {
            if (item.trim() !== "") {
                const li = document.createElement("li");
                li.textContent = item;
                li.style.listStyle = "none";
                kontakList.appendChild(li);
            }
        });
    } else {
        kontakList.innerHTML = "<li style='list-style:none;'>-</li>";
    }

    // ========================
    // Tampilkan Bahan
    // ========================
    const bahanList = document.getElementById("bahan_resep");
    bahanList.innerHTML = "";

    bahanList.style.listStyle = "none";
    bahanList.style.paddingLeft = "0";

    if (data.main_ingredients) {
        data.main_ingredients.split("\n").forEach((item) => {
            if (item.trim() !== "") {
                const li = document.createElement("li");
                li.textContent = item;
                li.style.listStyle = "none";
                bahanList.appendChild(li);
            }
        });
    } else {
        bahanList.innerHTML = "<li style='list-style:none;'>-</li>";
    }

    // ========================
    // Tampilkan Langkah
    // ========================
    const langkahList = document.getElementById("langkah_resep");
    langkahList.innerHTML = "";

    langkahList.style.listStyle = "none";
    langkahList.style.paddingLeft = "0";

    if (data.cooking_steps) {
        data.cooking_steps.split("\n").forEach((item) => {
            if (item.trim() !== "") {
                const li = document.createElement("li");
                li.textContent = item;
                li.style.listStyle = "none";
                langkahList.appendChild(li);
            }
        });
    } else {
        langkahList.innerHTML = "<li style='list-style:none;'>-</li>";
    }
}

document.addEventListener("DOMContentLoaded", loadABD);
