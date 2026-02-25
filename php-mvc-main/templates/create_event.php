<?php include 'header.php'; ?>

<div class="max-w-2xl mx-auto px-4 sm:px-6 py-8">

    <!-- Page Header -->
    <div class="flex items-center justify-between mb-6">
        <div>
            <h1 class="text-2xl font-bold text-gray-900">สร้างกิจกรรมใหม่</h1>
            <p class="text-gray-500 text-sm mt-1">กรอกรายละเอียดกิจกรรมของคุณ</p>
        </div>
        <a href="/home" class="flex items-center gap-2 text-sm text-blue-600 hover:text-blue-700 font-medium">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
            </svg>
            หน้าแรก
        </a>
    </div>

    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-8">
        <form action="/create_event" method="POST" enctype="multipart/form-data" class="space-y-5">

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1.5">ชื่อกิจกรรม <span class="text-red-500">*</span></label>
                <input type="text" name="event_name" required placeholder="ระบุชื่อกิจกรรม"
                    class="w-full px-4 py-2.5 border border-gray-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition bg-gray-50">
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1.5">รายละเอียดกิจกรรม</label>
                <textarea name="description" rows="4" placeholder="อธิบายรายละเอียดกิจกรรม..."
                    class="w-full px-4 py-2.5 border border-gray-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition bg-gray-50 resize-none"></textarea>
            </div>

            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1.5">วันเวลาเริ่มต้น <span class="text-red-500">*</span></label>
                    <input type="datetime-local" name="start_date" required
                        class="w-full px-4 py-2.5 border border-gray-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition bg-gray-50">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1.5">วันเวลาสิ้นสุด <span class="text-red-500">*</span></label>
                    <input type="datetime-local" name="end_date" required
                        class="w-full px-4 py-2.5 border border-gray-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition bg-gray-50">
                </div>
            </div>

            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1.5">สถานที่จัดงาน</label>
                    <input type="text" name="location" placeholder="ระบุสถานที่"
                        class="w-full px-4 py-2.5 border border-gray-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition bg-gray-50">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1.5">จำนวนผู้เข้าร่วมสูงสุด</label>
                    <input type="number" name="max_participants" placeholder="เช่น 100"
                        class="w-full px-4 py-2.5 border border-gray-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition bg-gray-50">
                </div>
            </div>

            <!-- File Upload -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1.5">รูปภาพกิจกรรม</label>
                <label for="images" class="flex flex-col items-center justify-center w-full h-32 border-2 border-dashed border-gray-300 rounded-xl cursor-pointer bg-gray-50 hover:bg-gray-100 hover:border-blue-400 transition-all">
                    <svg class="w-8 h-8 text-gray-400 mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                    </svg>
                    <p class="text-sm text-gray-500">คลิกเพื่ออัปโหลดรูปภาพ</p>
                    <p class="text-xs text-gray-400 mt-1">รองรับหลายรูป (PNG, JPG, WEBP)</p>
                </label>
                <input type="file" id="images" name="images[]" multiple accept="image/*" class="hidden">
                <p id="file-count" class="text-xs text-gray-400 mt-1.5 text-center"></p>
            </div>

            <button type="submit"
                class="w-full py-3 bg-gradient-to-r from-blue-600 to-blue-700 hover:from-blue-700 hover:to-blue-800 text-white font-semibold rounded-xl transition-all shadow-sm hover:shadow-md text-sm mt-2">
                สร้างกิจกรรม
            </button>
        </form>
    </div>
</div>

<script>
    document.getElementById('images')?.addEventListener('change', function() {
        const count = this.files.length;
        document.getElementById('file-count').textContent = count > 0 ? `เลือกไฟล์แล้ว ${count} ไฟล์` : '';
    });
</script>

<?php include 'footer.php'; ?>