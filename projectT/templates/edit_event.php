<?php include 'header.php'; ?>

<div class="max-w-2xl mx-auto px-4 sm:px-6 py-8">

    <div class="flex items-center justify-between mb-6">
        <div>
            <h1 class="text-2xl font-bold text-gray-900">แก้ไขกิจกรรม</h1>
            <p class="text-gray-500 text-sm mt-1">แก้ไขรายละเอียดกิจกรรมของคุณ</p>
        </div>
        <a href="/participants" class="flex items-center gap-2 text-sm text-blue-600 hover:text-blue-700 font-medium">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
            </svg>
            จัดการกิจกรรม
        </a>
    </div>

    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-8">
        <form action="/edit_event" method="POST" class="space-y-5">
            <input type="hidden" name="event_id" value="<?= htmlspecialchars($data['event']['event_id']) ?>">

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1.5">ชื่อกิจกรรม <span class="text-red-500">*</span></label>
                <input type="text" name="event_name" required
                    value="<?= htmlspecialchars($data['event']['event_name']) ?>"
                    class="w-full px-4 py-2.5 border border-gray-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition bg-gray-50">
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1.5">รายละเอียดกิจกรรม</label>
                <textarea name="description" rows="4"
                    class="w-full px-4 py-2.5 border border-gray-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition bg-gray-50 resize-none"><?= htmlspecialchars($data['event']['description']) ?></textarea>
            </div>

            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1.5">วันเวลาเริ่มต้น <span class="text-red-500">*</span></label>
                    <input type="datetime-local" name="start_date" required
                        value="<?= htmlspecialchars($data['event']['start_date']) ?>"
                        class="w-full px-4 py-2.5 border border-gray-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition bg-gray-50">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1.5">วันเวลาสิ้นสุด <span class="text-red-500">*</span></label>
                    <input type="datetime-local" name="end_date" required
                        value="<?= htmlspecialchars($data['event']['end_date']) ?>"
                        class="w-full px-4 py-2.5 border border-gray-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition bg-gray-50">
                </div>
            </div>

            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1.5">สถานที่จัดงาน</label>
                    <input type="text" name="location"
                        value="<?= htmlspecialchars($data['event']['location']) ?>"
                        class="w-full px-4 py-2.5 border border-gray-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition bg-gray-50">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1.5">จำนวนผู้เข้าร่วมสูงสุด</label>
                    <input type="number" name="max_participants"
                        value="<?= htmlspecialchars($data['event']['max_participants']) ?>"
                        class="w-full px-4 py-2.5 border border-gray-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition bg-gray-50">
                </div>
            </div>

            <button type="submit"
                class="w-full py-3 bg-gradient-to-r from-orange-500 to-orange-600 hover:from-orange-600 hover:to-orange-700 text-white font-semibold rounded-xl transition-all shadow-sm hover:shadow-md text-sm mt-2">
                บันทึกการแก้ไข
            </button>
        </form>
    </div>
</div>

<?php include 'footer.php'; ?>