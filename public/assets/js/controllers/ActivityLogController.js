export default class ActivityLogController {
    static async log(description, detail = {}) {
        try {
            const payload = { description, detail };

            // Kirim ke Laravel controller
            const res = await fetch("/activity_logs/log", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                    Accept: "application/json",
                    "X-CSRF-TOKEN": document
                        .querySelector('meta[name="csrf-token"]')
                        .getAttribute("content"),
                },
                body: JSON.stringify(payload),
                credentials: "same-origin", // penting supaya cookie CSRF ikut
            });

            const result = await res.json();

            if (!res.ok || !result.success) {
                console.error("Gagal menyimpan log:", result.error);
                return { success: false, error: result.error };
            }

            // Backend Laravel sudah otomatis menambahkan user_id dan email
            return { success: true, data: result.data };
        } catch (err) {
            console.error("Error log exception:", err);
            return { success: false, error: err.message };
        }
    }
}
