<?php include 'header.php'; ?>

<div class="min-h-[calc(100vh-10rem)] flex items-center justify-center py-12 px-4">
    <div class="w-full max-w-lg">

        <div class="bg-white rounded-2xl shadow-lg border border-gray-100 p-8">

            <div class="text-center mb-8">
                <div class="w-14 h-14 bg-blue-600 rounded-2xl flex items-center justify-center mx-auto mb-4 shadow-md">
                    <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"/>
                    </svg>
                </div>
                <h1 class="text-2xl font-bold text-gray-900">สมัครสมาชิก</h1>
                <p class="text-gray-500 text-sm mt-1">สร้างบัญชีใหม่ของคุณ</p>
            </div>

            <?php if (isset($data['error'])): ?>
                <div class="mb-5 flex items-center gap-3 bg-red-50 border border-red-200 text-red-700 px-4 py-3 rounded-xl text-sm">
                    <svg class="w-5 h-5 shrink-0" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/>
                    </svg>
                    <?= htmlspecialchars($data['error']) ?>
                </div>
            <?php endif; ?>

            <form action="/register" method="POST" class="space-y-4">

                <!-- Name Row -->
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1.5">ชื่อ</label>
                        <input type="text" name="firstname" required placeholder="ชื่อจริง"
                            class="w-full px-4 py-2.5 border border-gray-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition bg-gray-50">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1.5">นามสกุล</label>
                        <input type="text" name="lastname" required placeholder="นามสกุล"
                            class="w-full px-4 py-2.5 border border-gray-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition bg-gray-50">
                    </div>
                </div>

                <!-- Gender & Birthday -->
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1.5">เพศ</label>
                        <select name="gender" required
                            class="w-full px-4 py-2.5 border border-gray-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition bg-gray-50">
                            <option value="">-- เลือกเพศ --</option>
                            <option value="male">ชาย</option>
                            <option value="female">หญิง</option>
                            <option value="other">อื่นๆ</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1.5">วันเกิด</label>
                        <input type="date" name="birthday" required
                            class="w-full px-4 py-2.5 border border-gray-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition bg-gray-50">
                    </div>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1.5">อีเมล</label>
                    <input type="email" name="email" required placeholder="example@email.com"
                        class="w-full px-4 py-2.5 border border-gray-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition bg-gray-50">
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1.5">รหัสผ่าน</label>
                    <input type="password" name="password" required placeholder="••••••••"
                        class="w-full px-4 py-2.5 border border-gray-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition bg-gray-50">
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1.5">ที่อยู่ / จังหวัด</label>
                    <input type="text" name="address" required placeholder="ที่อยู่หรือจังหวัด"
                        class="w-full px-4 py-2.5 border border-gray-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition bg-gray-50">
                </div>

                <button type="submit"
                    class="w-full py-3 bg-gradient-to-r from-blue-600 to-blue-700 hover:from-blue-700 hover:to-blue-800 text-white font-semibold rounded-xl transition-all shadow-sm hover:shadow-md text-sm mt-2">
                    ยืนยันการสมัคร
                </button>
            </form>

            <p class="text-center text-sm text-gray-500 mt-6">
                มีบัญชีแล้ว?
                <a href="/login" class="text-blue-600 font-medium hover:underline">เข้าสู่ระบบ</a>
            </p>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>