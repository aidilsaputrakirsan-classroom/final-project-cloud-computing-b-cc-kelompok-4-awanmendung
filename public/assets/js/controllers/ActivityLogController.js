import { supabase } from "../supabaseClient.js";

export default class ActivityLogController {
    static async log(
        description,
        detail = {},
        userId = null,
        userEmail = null
    ) {
        try {
            const payload = {
                description: description,
                detail: detail,
                user_id: userId,
                email: userEmail,
            };

            const { data, error } = await supabase
                .from("activity_logs")
                .insert([payload]);

            if (error) {
                console.error("Gagal menyimpan log:", error);
                return { success: false, error };
            }

            return { success: true, data };
        } catch (err) {
            console.error("Error log exception:", err);
            return { success: false, error: err };
        }
    }
}
