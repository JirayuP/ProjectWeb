<?php include 'header.php'; ?>

<div class="max-w-lg mx-auto px-4 sm:px-6 py-8">

    <div class="flex items-center justify-between mb-6">
        <div>
            <h1 class="text-2xl font-bold text-gray-900">ตรวจสอบรหัส OTP</h1>
            <p class="text-gray-500 text-sm mt-1">สแกน OTP เพื่อยืนยันการเข้างาน</p>
        </div>
        <a href="/participants" class="flex items-center gap-2 text-sm text-blue-600 hover:text-blue-700 font-medium">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
            </svg>
            กลับหน้าจัดการ
        </a>
    </div>

    <?php if (isset($data['error'])): ?>
        <div class="mb-5 flex items-center gap-3 bg-red-50 border border-red-200 text-red-700 px-4 py-3 rounded-xl text-sm">
            <svg class="w-5 h-5 shrink-0" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/>
            </svg>
            <?= htmlspecialchars($data['error']) ?>
        </div>
    <?php endif; ?>

    <?php if (isset($data['success'])): ?>
        <div class="mb-5 flex items-center gap-3 bg-green-50 border border-green-200 text-green-700 px-4 py-3 rounded-xl text-sm">
            <svg class="w-5 h-5 shrink-0" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
            </svg>
            <?= htmlspecialchars($data['success']) ?>
        </div>
    <?php endif; ?>

    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-8">
        <div class="text-center mb-6">
            <div class="w-14 h-14 bg-green-100 rounded-2xl flex items-center justify-center mx-auto mb-4">
                <svg class="w-7 h-7 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                </svg>
            </div>
            <p class="text-gray-500 text-sm">กรอกรหัส OTP 6 หลักที่ผู้เข้าร่วมแสดง</p>
        </div>

        <form action="/checkin" method="POST" class="space-y-5">
            <input type="hidden" name="event_id" value="<?= htmlspecialchars($data['event_id'] ?? '') ?>">
            <div>
                <input type="text" name="otp_code" required maxlength="6"
                    placeholder="000000"
                    class="w-full px-4 py-5 border-2 border-gray-200 rounded-2xl text-4xl font-bold text-center tracking-[0.5em] font-mono focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-green-500 transition bg-gray-50 placeholder-gray-300"
                    oninput="this.value = this.value.replace(/[^0-9]/g, '')">
            </div>
            <button type="submit"
                class="w-full py-3 bg-gradient-to-r from-green-600 to-green-700 hover:from-green-700 hover:to-green-800 text-white font-semibold rounded-xl transition-all shadow-sm hover:shadow-md text-sm">
                ยืนยันการเข้างาน
            </button>
        </form>
    </div>
</div>

<?php include 'footer.php'; ?>