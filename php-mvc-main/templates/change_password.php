<?php include 'header.php'; ?>

<div class="max-w-lg mx-auto px-4 sm:px-6 py-8">

    <div class="text-center mb-8">
        <div class="w-14 h-14 bg-blue-600 rounded-2xl flex items-center justify-center mx-auto mb-4 shadow-md">
            <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 7a2 2 0 012 2m4 0a6 6 0 01-7.743 5.743L11 17H9v2H7v2H4a1 1 0 01-1-1v-2.586a1 1 0 01.293-.707l5.964-5.964A6 6 0 1121 9z"/>
            </svg>
        </div>
        <h1 class="text-2xl font-bold text-gray-900">เปลี่ยนรหัสผ่าน</h1>
        <p class="text-gray-500 text-sm mt-1">กรอกรหัสผ่านเดิมและรหัสผ่านใหม่ของคุณ</p>
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
        <form action="/change_password" method="POST" class="space-y-5">
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1.5">รหัสผ่านเดิม</label>
                <input type="password" name="old_password" required placeholder="••••••••"
                    class="w-full px-4 py-2.5 border border-gray-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition bg-gray-50">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1.5">รหัสผ่านใหม่</label>
                <input type="password" name="new_password" required placeholder="••••••••"
                    class="w-full px-4 py-2.5 border border-gray-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition bg-gray-50">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1.5">ยืนยันรหัสผ่านใหม่</label>
                <input type="password" name="confirm_password" required placeholder="••••••••"
                    class="w-full px-4 py-2.5 border border-gray-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition bg-gray-50">
            </div>
            <button type="submit"
                class="w-full py-3 bg-gradient-to-r from-blue-600 to-blue-700 hover:from-blue-700 hover:to-blue-800 text-white font-semibold rounded-xl transition-all shadow-sm hover:shadow-md text-sm mt-2">
                บันทึกการเปลี่ยนแปลง
            </button>
        </form>

        <div class="text-center mt-5">
            <a href="/home" class="text-sm text-gray-400 hover:text-blue-600 transition-colors">← กลับหน้าหลัก</a>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>