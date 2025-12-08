document.addEventListener("DOMContentLoaded", () => {
    // Ambil data dari blade (controller sudah kirim $feedback)
    const emailList = document.getElementById("email_resep");
    const saranList = document.getElementById("saran_resep");

    // Reset konten
    emailList.innerHTML = "";
    saranList.innerHTML = "";

    emailList.style.listStyle = "none";
    emailList.style.paddingLeft = "0";

    saranList.style.listStyle = "none";
    saranList.style.paddingLeft = "0";

    // Ambil data dari elemen data-* yang dikirim blade
    const feedbackData = document.getElementById("feedbackData");
    if (!feedbackData) return;

    const feedback = JSON.parse(feedbackData.value);

    // Tampilkan email
    if (feedback.email) {
        feedback.email.split("\n").forEach((item) => {
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

    // Tampilkan saran
    if (feedback.message) {
        feedback.message.split("\n").forEach((item) => {
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
});
