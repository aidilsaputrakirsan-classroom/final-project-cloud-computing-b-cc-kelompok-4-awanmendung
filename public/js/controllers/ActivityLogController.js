import { supabase } from "../supabaseClient.js";

export default class ActivityLogController {
    static async log(description, detail = {}, userId = null) {
        try {
            const { data, error } = await supabase
                .from("activity_logs")
                .insert([
                    {
                        description,
                        detail,
                        user_id: userId,
                    },
                ]);

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
