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
        .from("activity_logs")
        .select("id, detail, user_id, description, email, created_at")
        .eq("id", id)
        .single();

    if (error) {
        console.error("Gagal memuat data:", error);
        return;
    }

    // ========================
    // Tampilkan User ID
    // ========================
    const useridList = document.getElementById("userid_resep");
    useridList.innerHTML = "";

    useridList.style.listStyle = "none";
    useridList.style.paddingLeft = "0";

    if (data.user_id) {
        data.user_id.split("\n").forEach((item) => {
            if (item.trim() !== "") {
                const li = document.createElement("li");
                li.textContent = item;
                li.style.listStyle = "none";
                useridList.appendChild(li);
            }
        });
    } else {
        useridList.innerHTML = "<li style='list-style:none;'>-</li>";
    }

    // ========================
    // Tampilkan Detail
    // ========================
    const detailList = document.getElementById("detail_resep");
    detailList.innerHTML = "";
    detailList.style.listStyle = "none";
    detailList.style.paddingLeft = "0";

    if (data.detail && Array.isArray(data.detail)) {
        data.detail.forEach((item) => {
            if (item && item.trim() !== "") {
                const li = document.createElement("li");
                li.textContent = item;
                li.style.listStyle = "none";
                detailList.appendChild(li);
            }
        });
    } else {
        detailList.innerHTML = "<li style='list-style:none;'>-</li>";
    }

    // ========================
    // Tampilkan Langkah
    // ========================
    const descriptionList = document.getElementById("description_resep");
    descriptionList.innerHTML = "";

    descriptionList.style.listStyle = "none";
    descriptionList.style.paddingLeft = "0";

    if (data.description) {
        data.description.split("\n").forEach((item) => {
            if (item.trim() !== "") {
                const li = document.createElement("li");
                li.textContent = item;
                li.style.listStyle = "none";
                descriptionList.appendChild(li);
            }
        });
    } else {
        descriptionList.innerHTML = "<li style='list-style:none;'>-</li>";
    }
}

document.addEventListener("DOMContentLoaded", loadABD);
