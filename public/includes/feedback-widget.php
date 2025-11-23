<!-- ============================================ -->
<!-- File: public/includes/feedback-widget.php -->
<!-- Versi Preview - Tanpa Database Connection -->
<!-- Simpan di: public/includes/feedback-widget.php -->
<!-- ============================================ -->

<style>
    /* 🎨 Floating Button with Label */
    .feedback-floating-container {
        position: fixed;
        bottom: 30px;
        right: 30px;
        z-index: 999;
        display: flex;
        align-items: center;
        gap: 15px;
        animation: slideInRight 0.5s ease;
    }

    @keyframes slideInRight {
        from {
            transform: translateX(100px);
            opacity: 0;
        }
        to {
            transform: translateX(0);
            opacity: 1;
        }
    }

    .feedback-label {
        background: white;
        padding: 12px 20px;
        border-radius: 25px;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.15);
        font-size: 14px;
        font-weight: 600;
        color: #333;
        white-space: nowrap;
        opacity: 0;
        transform: translateX(20px);
        transition: all 0.3s ease;
        pointer-events: none;
    }

    .feedback-floating-container:hover .feedback-label {
        opacity: 1;
        transform: translateX(0);
    }

    .feedback-btn-main {
        width: 65px;
        height: 65px;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        border-radius: 50%;
        border: none;
        cursor: pointer;
        box-shadow: 0 8px 25px rgba(102, 126, 234, 0.4);
        transition: all 0.3s ease;
        display: flex;
        align-items: center;
        justify-content: center;
        position: relative;
        animation: pulse 2s infinite;
    }

    @keyframes pulse {
        0%, 100% {
            transform: scale(1);
            box-shadow: 0 8px 25px rgba(102, 126, 234, 0.4);
        }
        50% {
            transform: scale(1.05);
            box-shadow: 0 8px 30px rgba(102, 126, 234, 0.6);
        }
    }

    .feedback-btn-main:hover {
        transform: scale(1.1) rotate(90deg);
        box-shadow: 0 12px 35px rgba(102, 126, 234, 0.6);
    }

    .feedback-btn-main i {
        font-size: 28px;
        color: white;
    }

    /* 📝 Modal Overlay */
    .feedback-modal-overlay {
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.75);
        backdrop-filter: blur(5px);
        z-index: 1000;
        animation: fadeIn 0.3s ease;
    }

    .feedback-modal-overlay.active {
        display: flex;
        align-items: center;
        justify-content: center;
    }

    @keyframes fadeIn {
        from { opacity: 0; }
        to { opacity: 1; }
    }

    /* 📋 Modal Content */
    .feedback-modal {
        background: white;
        border-radius: 25px;
        padding: 0;
        max-width: 550px;
        width: 90%;
        max-height: 90vh;
        overflow: hidden;
        box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
        animation: slideUpBounce 0.4s ease;
        position: relative;
    }

    @keyframes slideUpBounce {
        0% {
            transform: translateY(100px) scale(0.9);
            opacity: 0;
        }
        60% {
            transform: translateY(-10px) scale(1.02);
        }
        100% {
            transform: translateY(0) scale(1);
            opacity: 1;
        }
    }

    /* Modal Header */
    .feedback-modal-header {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
        padding: 30px;
        position: relative;
        text-align: center;
    }

    .feedback-modal-header h3 {
        margin: 0 0 8px 0;
        font-size: 26px;
        font-weight: 700;
    }

    .feedback-modal-header p {
        margin: 0;
        opacity: 0.9;
        font-size: 14px;
    }

    .feedback-close-btn {
        position: absolute;
        top: 20px;
        right: 20px;
        background: rgba(255, 255, 255, 0.2);
        border: none;
        width: 40px;
        height: 40px;
        border-radius: 50%;
        cursor: pointer;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: all 0.3s ease;
    }

    .feedback-close-btn:hover {
        background: rgba(255, 255, 255, 0.3);
        transform: rotate(90deg);
    }

    .feedback-close-btn i {
        color: white;
        font-size: 20px;
    }

    /* Step Indicator */
    .step-indicator {
        display: flex;
        justify-content: center;
        padding: 20px 30px;
        background: #f8f9fa;
        gap: 15px;
    }

    .step-dot {
        width: 12px;
        height: 12px;
        border-radius: 50%;
        background: #ddd;
        transition: all 0.3s ease;
    }

    .step-dot.active {
        width: 35px;
        border-radius: 10px;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    }

    /* Modal Body */
    .feedback-modal-body {
        padding: 35px;
        overflow-y: auto;
        max-height: calc(90vh - 200px);
    }

    /* Choice Cards */
    .choice-container {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 20px;
        margin-top: 10px;
    }

    .choice-card {
        background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
        border: 3px solid transparent;
        border-radius: 20px;
        padding: 30px 20px;
        text-align: center;
        cursor: pointer;
        transition: all 0.3s ease;
        position: relative;
        overflow: hidden;
    }

    .choice-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        opacity: 0;
        transition: opacity 0.3s ease;
    }

    .choice-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 30px rgba(102, 126, 234, 0.3);
    }

    .choice-card:hover::before {
        opacity: 0.05;
    }

    .choice-card.selected {
        border-color: #667eea;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        transform: scale(1.05);
    }

    .choice-card.selected .choice-icon,
    .choice-card.selected .choice-title,
    .choice-card.selected .choice-desc {
        color: white;
    }

    .choice-icon {
        font-size: 48px;
        margin-bottom: 15px;
        color: #667eea;
        transition: all 0.3s ease;
        position: relative;
        z-index: 1;
    }

    .choice-title {
        font-size: 18px;
        font-weight: 700;
        margin-bottom: 8px;
        color: #333;
        position: relative;
        z-index: 1;
    }

    .choice-desc {
        font-size: 13px;
        color: #666;
        line-height: 1.5;
        position: relative;
        z-index: 1;
    }

    /* Form Styles */
    .form-step {
        display: none;
    }

    .form-step.active {
        display: block;
        animation: fadeInUp 0.4s ease;
    }

    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .form-group-fb {
        margin-bottom: 20px;
    }

    .form-group-fb label {
        display: block;
        font-weight: 600;
        color: #333;
        margin-bottom: 8px;
        font-size: 14px;
    }

    .form-group-fb label .required {
        color: #dc3545;
        margin-left: 3px;
    }

    .form-control-fb {
        width: 100%;
        padding: 14px 16px;
        border: 2px solid #e0e0e0;
        border-radius: 12px;
        font-size: 14px;
        transition: all 0.3s ease;
        font-family: inherit;
        background: #f8f9fa;
        box-sizing: border-box;
    }

    .form-control-fb:focus {
        outline: none;
        border-color: #667eea;
        background: white;
        box-shadow: 0 0 0 4px rgba(102, 126, 234, 0.1);
    }

    textarea.form-control-fb {
        resize: vertical;
        min-height: 120px;
    }

    .char-counter-fb {
        text-align: right;
        font-size: 12px;
        color: #999;
        margin-top: 5px;
    }

    /* Buttons */
    .btn-container {
        display: flex;
        gap: 10px;
        margin-top: 25px;
    }

    .btn-fb {
        flex: 1;
        padding: 14px;
        border: none;
        border-radius: 12px;
        font-size: 15px;
        font-weight: 700;
        cursor: pointer;
        transition: all 0.3s ease;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
    }

    .btn-primary-fb {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
    }

    .btn-primary-fb:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 20px rgba(102, 126, 234, 0.4);
    }

    .btn-secondary-fb {
        background: #f1f3f5;
        color: #495057;
    }

    .btn-secondary-fb:hover {
        background: #e9ecef;
    }

    .btn-fb:disabled {
        opacity: 0.5;
        cursor: not-allowed;
        transform: none;
    }

    /* Success Message */
    .success-container {
        display: none;
        text-align: center;
        padding: 40px 30px;
    }

    .success-container.active {
        display: block;
    }

    .success-icon-fb {
        width: 90px;
        height: 90px;
        background: linear-gradient(135deg, #56ab2f 0%, #a8e063 100%);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 25px;
        animation: successPop 0.6s ease;
    }

    @keyframes successPop {
        0% {
            transform: scale(0);
        }
        50% {
            transform: scale(1.1);
        }
        100% {
            transform: scale(1);
        }
    }

    .success-icon-fb i {
        color: white;
        font-size: 45px;
    }

    .success-container h4 {
        color: #333;
        margin-bottom: 12px;
        font-size: 26px;
    }

    .success-container p {
        color: #666;
        margin-bottom: 25px;
        line-height: 1.6;
    }

    /* Info Alert */
    .info-alert {
        background: #e7f3ff;
        border-left: 4px solid #2196F3;
        padding: 15px 18px;
        border-radius: 10px;
        margin-bottom: 20px;
        display: flex;
        align-items: flex-start;
        gap: 12px;
    }

    .info-alert i {
        color: #2196F3;
        font-size: 20px;
        margin-top: 2px;
    }

    .info-alert p {
        margin: 0;
        font-size: 13px;
        color: #1565c0;
        line-height: 1.6;
    }

    /* Mobile Responsive */
    @media (max-width: 768px) {
        .feedback-floating-container {
            bottom: 20px;
            right: 20px;
        }

        .feedback-label {
            display: none;
        }

        .feedback-btn-main {
            width: 60px;
            height: 60px;
        }

        .feedback-modal {
            width: 95%;
            border-radius: 20px;
        }

        .choice-container {
            grid-template-columns: 1fr;
            gap: 15px;
        }

        .feedback-modal-body {
            padding: 25px 20px;
        }

        .feedback-modal-header {
            padding: 25px 20px;
        }

        .feedback-modal-header h3 {
            font-size: 22px;
        }
    }
</style>

<!-- 🎯 Floating Button -->
<div class="feedback-floating-container">
    <div class="feedback-label">
        Ingin beri kritik saran atau saran resep?
    </div>
    <button class="feedback-btn-main" id="feedbackBtn">
        <i class="fa fa-comments"></i>
    </button>
</div>

<!-- 📝 Feedback Modal -->
<div class="feedback-modal-overlay" id="feedbackModal">
    <div class="feedback-modal">
        <!-- Modal Header -->
        <div class="feedback-modal-header">
            <h3 id="modalTitle">Kami Mendengarkan Anda</h3>
            <p id="modalSubtitle">Pilih jenis feedback yang ingin Anda berikan</p>
            <button class="feedback-close-btn" id="feedbackCloseBtn">
                <i class="fa fa-times"></i>
            </button>
        </div>

        <!-- Step Indicator -->
        <div class="step-indicator">
            <div class="step-dot active" data-step="1"></div>
            <div class="step-dot" data-step="2"></div>
        </div>

        <!-- Modal Body -->
        <div class="feedback-modal-body">
            <!-- Step 1: Choose Type -->
            <div class="form-step active" id="step1">
                <div class="choice-container">
                    <!-- Kritik & Saran -->
                    <div class="choice-card" data-type="feedback">
                        <div class="choice-icon">💬</div>
                        <div class="choice-title">Kritik & Saran</div>
                        <div class="choice-desc">Berikan masukan untuk membantu kami berkembang</div>
                    </div>

                    <!-- Saran Resep -->
                    <div class="choice-card" data-type="recipe">
                        <div class="choice-icon">🍳</div>
                        <div class="choice-title">Saran Resep</div>
                        <div class="choice-desc">Usulkan resep baru yang ingin Anda lihat</div>
                    </div>
                </div>

                <div class="btn-container">
                    <button class="btn-fb btn-primary-fb" id="nextBtn" disabled>
                        Lanjutkan <i class="fa fa-arrow-right"></i>
                    </button>
                </div>
            </div>

            <!-- Step 2: Form -->
            <div class="form-step" id="step2">
                <!-- Form Kritik & Saran -->
                <form id="feedbackForm" style="display:none;">
                    <div class="info-alert">
                        <i class="fa fa-info-circle"></i>
                        <p>Kritik dan saran Anda sangat berharga bagi kami untuk terus meningkatkan layanan.</p>
                    </div>

                    <div class="form-group-fb">
                        <label>Nama <span class="required">*</span></label>
                        <input type="text" class="form-control-fb" name="fb_name" placeholder="Nama Anda" required maxlength="100">
                    </div>

                    <div class="form-group-fb">
                        <label>Email <span class="required">*</span></label>
                        <input type="email" class="form-control-fb" name="fb_email" placeholder="email@example.com" required>
                    </div>

                    <div class="form-group-fb">
                        <label>Kategori</label>
                        <select class="form-control-fb" name="fb_category">
                            <option value="umum">Umum</option>
                            <option value="fitur">Fitur Website</option>
                            <option value="resep">Kualitas Resep</option>
                            <option value="lainnya">Lainnya</option>
                        </select>
                    </div>

                    <div class="form-group-fb">
                        <label>Kritik & Saran <span class="required">*</span></label>
                        <textarea class="form-control-fb" name="fb_message" placeholder="Tulis kritik dan saran Anda di sini..." required maxlength="1000"></textarea>
                        <div class="char-counter-fb">
                            <span id="fb_message_count">0</span>/1000
                        </div>
                    </div>

                    <div class="btn-container">
                        <button type="button" class="btn-fb btn-secondary-fb" id="backBtn1">
                            <i class="fa fa-arrow-left"></i> Kembali
                        </button>
                        <button type="submit" class="btn-fb btn-primary-fb" id="submitFeedbackBtn">
                            <i class="fa fa-paper-plane"></i> Kirim
                        </button>
                    </div>
                </form>

                <!-- Form Saran Resep -->
                <form id="recipeForm" style="display:none;">
                    <div class="info-alert">
                        <i class="fa fa-lightbulb-o"></i>
                        <p>Punya ide resep menarik? Bagikan dengan kami dan kami akan mempertimbangkannya!</p>
                    </div>

                    <div class="form-group-fb">
                        <label>Nama Resep <span class="required">*</span></label>
                        <input type="text" class="form-control-fb" name="recipe_name" placeholder="Contoh: Nasi Goreng Spesial" required maxlength="100">
                        <div class="char-counter-fb">
                            <span id="recipe_name_count">0</span>/100
                        </div>
                    </div>

                    <div class="form-group-fb">
                        <label>Bahan Utama <span class="required">*</span></label>
                        <textarea class="form-control-fb" name="main_ingredients" placeholder="Sebutkan bahan-bahan utama yang diperlukan..." required maxlength="300"></textarea>
                        <div class="char-counter-fb">
                            <span id="main_ingredients_count">0</span>/300
                        </div>
                    </div>

                    <div class="form-group-fb">
                        <label>Cara Membuat <span class="required">*</span></label>
                        <textarea class="form-control-fb" name="cooking_steps" placeholder="Jelaskan langkah-langkah pembuatan secara singkat..." required maxlength="500" style="min-height: 140px;"></textarea>
                        <div class="char-counter-fb">
                            <span id="cooking_steps_count">0</span>/500
                        </div>
                    </div>

                    <div class="form-group-fb">
                        <label>Nomor Kontak <span class="required">*</span></label>
                        <input type="tel" class="form-control-fb" name="contact_number" placeholder="+62 812-3456-7890" required pattern="[0-9+\-\s()]+">
                    </div>

                    <div class="btn-container">
                        <button type="button" class="btn-fb btn-secondary-fb" id="backBtn2">
                            <i class="fa fa-arrow-left"></i> Kembali
                        </button>
                        <button type="submit" class="btn-fb btn-primary-fb" id="submitRecipeBtn">
                            <i class="fa fa-paper-plane"></i> Kirim
                        </button>
                    </div>
                </form>
            </div>

            <!-- Success Message -->
            <div class="success-container" id="successMessage">
                <div class="success-icon-fb">
                    <i class="fa fa-check"></i>
                </div>
                <h4>Terima Kasih!</h4>
                <p id="successText">Feedback Anda telah berhasil dikirim. Kami akan segera meninjau dan merespons.</p>
                <button class="btn-fb btn-primary-fb" onclick="closeFeedbackModal()">
                    <i class="fa fa-check"></i> Tutup
                </button>
            </div>
        </div>
    </div>
</div>

<script>
(function() {
    // Elements
    const feedbackBtn = document.getElementById('feedbackBtn');
    const modal = document.getElementById('feedbackModal');
    const closeBtn = document.getElementById('feedbackCloseBtn');
    const step1 = document.getElementById('step1');
    const step2 = document.getElementById('step2');
    const nextBtn = document.getElementById('nextBtn');
    const backBtn1 = document.getElementById('backBtn1');
    const backBtn2 = document.getElementById('backBtn2');
    const modalTitle = document.getElementById('modalTitle');
    const modalSubtitle = document.getElementById('modalSubtitle');
    const feedbackForm = document.getElementById('feedbackForm');
    const recipeForm = document.getElementById('recipeForm');
    const successMessage = document.getElementById('successMessage');
    const successText = document.getElementById('successText');
    const stepDots = document.querySelectorAll('.step-dot');

    let selectedType = null;

    // Open modal
    feedbackBtn.addEventListener('click', function() {
        modal.classList.add('active');
        document.body.style.overflow = 'hidden';
    });

    // Close modal
    function closeFeedbackModal() {
        modal.classList.remove('active');
        document.body.style.overflow = 'auto';

        setTimeout(() => {
            resetModal();
        }, 300);
    }

    window.closeFeedbackModal = closeFeedbackModal;
    closeBtn.addEventListener('click', closeFeedbackModal);

    // Close on outside click
    modal.addEventListener('click', function(e) {
        if (e.target === modal) {
            closeFeedbackModal();
        }
    });

    // ESC key
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape' && modal.classList.contains('active')) {
            closeFeedbackModal();
        }
    });

    // Choice selection
    document.querySelectorAll('.choice-card').forEach(card => {
        card.addEventListener('click', function() {
            document.querySelectorAll('.choice-card').forEach(c => c.classList.remove('selected'));
            this.classList.add('selected');
            selectedType = this.dataset.type;
            nextBtn.disabled = false;
        });
    });

    // Next button
    nextBtn.addEventListener('click', function() {
        step1.classList.remove('active');
        step2.classList.add('active');
        updateStepIndicator(2);

        if (selectedType === 'feedback') {
            feedbackForm.style.display = 'block';
            recipeForm.style.display = 'none';
            modalTitle.textContent = 'Kritik & Saran';
            modalSubtitle.textContent = 'Bagikan pendapat Anda untuk membantu kami berkembang';
        } else {
            recipeForm.style.display = 'block';
            feedbackForm.style.display = 'none';
            modalTitle.textContent = 'Saran Resep';
            modalSubtitle.textContent = 'Bagikan ide resep yang ingin Anda lihat';
        }
    });

    // Back buttons
    [backBtn1, backBtn2].forEach(btn => {
        btn.addEventListener('click', function() {
            step2.classList.remove('active');
            step1.classList.add('active');
            updateStepIndicator(1);
            modalTitle.textContent = 'Kami Mendengarkan Anda';
            modalSubtitle.textContent = 'Pilih jenis feedback yang ingin Anda berikan';
        });
    });

    // Update step indicator
    function updateStepIndicator(step) {
        stepDots.forEach((dot, index) => {
            if (index < step) {
                dot.classList.add('active');
            } else {
                dot.classList.remove('active');
            }
        });
    }

    // Character counters
    function setupCharCounter(inputName, counterId) {
        const input = document.querySelector(`[name="${inputName}"]`);
        const counter = document.getElementById(counterId);
        if (input && counter) {
            input.addEventListener('input', function() {
                counter.textContent = this.value.length;
            });
        }
    }

    setupCharCounter('fb_message', 'fb_message_count');
    setupCharCounter('recipe_name', 'recipe_name_count');
    setupCharCounter('main_ingredients', 'main_ingredients_count');
    setupCharCounter('cooking_steps', 'cooking_steps_count');

    // Submit Feedback Form (DEMO - Tanpa Database)
    feedbackForm.addEventListener('submit', function(e) {
        e.preventDefault();
        const submitBtn = document.getElementById('submitFeedbackBtn');
        submitBtn.disabled = true;
        submitBtn.innerHTML = '<i class="fa fa-spinner fa-spin"></i> Mengirim...';

        // Simulasi pengiriman
        setTimeout(() => {
            console.log('Feedback submitted:', {
                name: feedbackForm.fb_name.value,
                email: feedbackForm.fb_email.value,
                category: feedbackForm.fb_category.value,
                message: feedbackForm.fb_message.value
            });
            showSuccess('Terima kasih atas kritik dan saran Anda! Kami akan segera meninjau masukan Anda.');
        }, 1500);
    });

    // Submit Recipe Form (DEMO - Tanpa Database)
    recipeForm.addEventListener('submit', function(e) {
        e.preventDefault();
        const submitBtn = document.getElementById('submitRecipeBtn');
        submitBtn.disabled = true;
        submitBtn.innerHTML = '<i class="fa fa-spinner fa-spin"></i> Mengirim...';

        // Simulasi pengiriman
        setTimeout(() => {
            console.log('Recipe submitted:', {
                name: recipeForm.recipe_name.value,
                ingredients: recipeForm.main_ingredients.value,
                steps: recipeForm.cooking_steps.value,
                contact: recipeForm.contact_number.value
            });
            showSuccess('Terima kasih atas saran resep Anda! Kami akan mempertimbangkan ide Anda.');
        }, 1500);
    });

    // Show success message
    function showSuccess(message) {
        step2.classList.remove('active');
        successMessage.classList.add('active');
        successText.textContent = message;
        updateStepIndicator(3);
    }

    // Reset modal
    function resetModal() {
        step1.classList.add('active');
        step2.classList.remove('active');
        successMessage.classList.remove('active');
        feedbackForm.reset();
        recipeForm.reset();
        document.querySelectorAll('.choice-card').forEach(c => c.classList.remove('selected'));
        selectedType = null;
        nextBtn.disabled = true;
        updateStepIndicator(1);
        modalTitle.textContent = 'Kami Mendengarkan Anda';
        modalSubtitle.textContent = 'Pilih jenis feedback yang ingin Anda berikan';

        // Reset submit buttons
        document.getElementById('submitFeedbackBtn').disabled = false;
        document.getElementById('submitFeedbackBtn').innerHTML = '<i class="fa fa-paper-plane"></i> Kirim';
        document.getElementById('submitRecipeBtn').disabled = false;
        document.getElementById('submitRecipeBtn').innerHTML = '<i class="fa fa-paper-plane"></i> Kirim';
    }
})();
</script>
