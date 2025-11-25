// ==========================
// CONNECT SUPABASE
// ==========================
import { createClient } from "https://cdn.jsdelivr.net/npm/@supabase/supabase-js@2/+esm";

const SUPABASE_URL = "https://mybfahpmnpasjmhutmcr.supabase.co";
const SUPABASE_KEY =
    "eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpc3MiOiJzdXBhYmFzZSIsInJlZiI6Im15YmZhaHBtbnBhc2ptaHV0bWNyIiwicm9sZSI6InNlcnZpY2Vfcm9sZSIsImlhdCI6MTc2MTMyODUwOCwiZXhwIjoyMDc2OTA0NTA4fQ.W6jf7DpnbdTmOAWBhV0NwFlfhKGQC62crCT-rfKoap8";

export const supabase = createClient(SUPABASE_URL, SUPABASE_KEY);

const tableBody = document.getElementById("activityTableBody");

// ==========================
// GET CURRENT USER
// ==========================
async function getCurrentUser() {
    const { data, error } = await supabase.auth.getUser();
    if (error) {
        console.error("Get user error:", error);
        return null;
    }
    return data.user;
}

// ==========================
// LOG ACTIVITY
// ==========================
export async function logActivity(description, detail = {}) {
    const user = await getCurrentUser();

    if (!user) {
        console.warn("User belum login → aktivitas tidak dicatat.");
        return;
    }

    const { error } = await supabase.from("activity_logs").insert({
        description: description,
        detail: detail,
        user_id: user.id,
    });

    if (error) {
        console.error("Gagal mencatat aktivitas:", error);
    } else {
        console.log("Aktivitas tercatat:", description);
    }
}

// ==========================
// LOAD DATA ACTIVITY LOG
// ==========================
async function loadActivity(filterText = "") {
    tableBody.innerHTML = `<tr><td colspan="5" class="text-center">Loading...</td></tr>`;

    let query = supabase
        .from("activity_logs")
        .select("*")
        .order("created_at", { ascending: false });

    if (filterText.trim() !== "") {
        query = query.ilike("description", `%${filterText}%`);
    }

    const { data, error } = await query;

    if (error) {
        tableBody.innerHTML = `<tr><td colspan="5" class="text-danger text-center">Error: ${error.message}</td></tr>`;
        return;
    }

    if (!data || data.length === 0) {
        tableBody.innerHTML = `<tr><td colspan="5" class="text-center">Belum ada aktivitas</td></tr>`;
        return;
    }

    tableBody.innerHTML = "";
    data.forEach((row) => {
        tableBody.innerHTML += `
      <tr>
        <td>${row.user_id ?? "-"}</td>
        <td>${row.description}</td>
        <td><pre>${JSON.stringify(row.detail, null, 2)}</pre></td>
        <td>${new Date(row.created_at).toLocaleString()}</td>
        <td>
          <button class="btn btn-danger btn-sm" onclick="deleteLog('${
              row.id
          }')">
            Hapus
          </button>
        </td>
      </tr>
    `;
    });
}

// ==========================
// DELETE ACTIVITY
// ==========================
window.deleteLog = async function (id) {
    if (!confirm("Yakin ingin menghapus log ini?")) return;

    const { error } = await supabase
        .from("activity_logs")
        .delete()
        .eq("id", id);

    if (error) {
        alert("Gagal menghapus: " + error.message);
        return;
    }

    loadActivity();
};

// ==========================
// SEARCH INPUT
// ==========================
document.getElementById("searchInput").addEventListener("input", function () {
    loadActivity(this.value);
});

// ==========================
// AUTO LOG: OPEN PAGE
// ==========================
logActivity("Membuka halaman Activity Log", {
    page: "activity_log",
    timestamp: Date.now(),
});

// ==========================
// LOAD AWAL DATA TABEL
// ==========================
loadActivity();
