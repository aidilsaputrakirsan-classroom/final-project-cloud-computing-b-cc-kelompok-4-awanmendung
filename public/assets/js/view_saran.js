// --- Supabase Connection ---
import { createClient } from "https://cdn.jsdelivr.net/npm/@supabase/supabase-js@2/+esm";

const SUPABASE_URL = "https://mybfahpmnpasjmhutmcr.supabase.co";
const SUPABASE_KEY =
    "eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpc3MiOiJzdXBhYmFzZSIsInJlZiI6Im15YmZhaHBtbnBhc2ptaHV0bWNyIiwicm9sZSI6InNlcnZpY2Vfcm9sZSIsImlhdCI6MTc2MTMyODUwOCwiZXhwIjoyMDc2OTA0NTA4fQ.W6jf7DpnbdTmOAWBhV0NwFlfhKGQC62crCT-rfKoap8";
const supabase = createClient(SUPABASE_URL, SUPABASE_KEY);

// ==========================
// LOAD ALAT – BAHAN – DESKRIPSI
// ==========================
async function loadABD() {
    const params = new URLSearchParams(window.location.search);
    const id = params.get("id");

    if (!id) {
        console.error("ID tidak ditemukan dalam URL.");
        return;
    }

    const { data, error } = await supabase
        .from("feedback")
        .select("email, message")
        .eq("id", id)
        .single();

    if (error) {
        console.error("Gagal memuat data:", error);
        return;
    }

    // ========================
    // Tampilkan Email
    // ========================
    const emailList = document.getElementById("email_resep");
    emailList.innerHTML = "";

    emailList.style.listStyle = "none";
    emailList.style.paddingLeft = "0";

    if (data.email) {
        data.email.split("\n").forEach((item) => {
            if (item.trim() !== "") {
                const li = document.createElement("li");
                li.textContent = item;
                li.style.listStyle = "none";
                emailList.appendChild(li);
            }
        });
    } else {
        emailList.innerHTML = "<li style='list-style:none;'>-</li>";
    }

    // ========================
    // Tampilkan Saran
    // ========================
    const saranList = document.getElementById("saran_resep");
    saranList.innerHTML = "";

    saranList.style.listStyle = "none";
    saranList.style.paddingLeft = "0";

    if (data.message) {
        data.message.split("\n").forEach((item) => {
            if (item.trim() !== "") {
                const li = document.createElement("li");
                li.textContent = item;
                li.style.listStyle = "none";
                saranList.appendChild(li);
            }
        });
    } else {
        saranList.innerHTML = "<li style='list-style:none;'>-</li>";
    }
}

document.addEventListener("DOMContentLoaded", loadABD);
