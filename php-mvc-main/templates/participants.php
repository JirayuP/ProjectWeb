<?php include 'header.php'; ?>

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">

    <!-- Page Header -->
    <div class="flex items-center justify-between mb-8">
        <div>
            <h1 class="text-2xl font-bold text-gray-900">จัดการผู้สมัคร</h1>
            <p class="text-gray-500 text-sm mt-1">ตรวจสอบและอนุมัติผู้สมัครเข้าร่วมกิจกรรม</p>
        </div>
        <a href="/home" class="flex items-center gap-2 text-sm text-blue-600 hover:text-blue-700 font-medium">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
            </svg>
            หน้าแรก
        </a>
    </div>

    <?php if (isset($data['mode']) && $data['mode'] === 'select_event'): ?>

        <h2 class="text-lg font-semibold text-gray-800 mb-4">เลือกกิจกรรมที่ต้องการจัดการ</h2>

        <?php if (empty($data['events'])): ?>
            <div class="text-center py-16 bg-white rounded-2xl border border-gray-100 shadow-sm">
                <div class="w-16 h-16 bg-purple-100 rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg class="w-8 h-8 text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 4v16m8-8H4"/>
                    </svg>
                </div>
                <p class="text-gray-500 mb-4">คุณยังไม่ได้สร้างกิจกรรมใดๆ</p>
                <a href="/create_event" class="inline-block px-5 py-2.5 bg-purple-600 hover:bg-purple-700 text-white text-sm font-semibold rounded-xl transition-colors">
                    สร้างกิจกรรมใหม่
                </a>
            </div>
        <?php else: ?>
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-100">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">ชื่อกิจกรรม</th>
                                <th class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">วันที่จัดงาน</th>
                                <th class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">การจัดการ</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-50">
                            <?php foreach ($data['events'] as $event): ?>
                                <tr class="hover:bg-gray-50 transition-colors">
                                    <td class="px-6 py-4 font-medium text-gray-900 text-sm"><?= htmlspecialchars($event['event_name']) ?></td>
                                    <td class="px-6 py-4 text-sm text-gray-500"><?= htmlspecialchars($event['start_date']) ?></td>
                                    <td class="px-6 py-4">
                                        <div class="flex flex-wrap items-center gap-2">
                                            <a href="/participants?event_id=<?= $event['event_id'] ?>"
                                               class="inline-flex items-center gap-1.5 px-3 py-1.5 bg-blue-100 hover:bg-blue-200 text-blue-700 text-xs font-semibold rounded-lg transition-colors">
                                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"/>
                                                </svg>
                                                ดูผู้สมัคร
                                            </a>
                                            <a href="/checkin?event_id=<?= $event['event_id'] ?>"
                                               class="inline-flex items-center gap-1.5 px-3 py-1.5 bg-green-100 hover:bg-green-200 text-green-700 text-xs font-semibold rounded-lg transition-colors">
                                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                                </svg>
                                                เช็คชื่อ
                                            </a>
                                            <a href="/edit_event?id=<?= $event['event_id'] ?>"
                                               class="inline-flex items-center gap-1.5 px-3 py-1.5 bg-orange-100 hover:bg-orange-200 text-orange-700 text-xs font-semibold rounded-lg transition-colors">
                                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                                </svg>
                                                แก้ไข
                                            </a>
                                            <a href="/delete_event?id=<?= $event['event_id'] ?>"
                                               onclick="return confirm('แน่ใจหรือไม่? การลบไม่สามารถกู้คืนได้')"
                                               class="inline-flex items-center gap-1.5 px-3 py-1.5 bg-red-100 hover:bg-red-200 text-red-700 text-xs font-semibold rounded-lg transition-colors">
                                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                                </svg>
                                                ลบ
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        <?php endif; ?>

    <?php elseif (isset($data['mode']) && $data['mode'] === 'list_participants'): ?>

        <div class="mb-5">
            <a href="/participants" class="inline-flex items-center gap-2 text-sm text-gray-500 hover:text-blue-600 font-medium transition-colors">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                </svg>
                ย้อนกลับไปเลือกกิจกรรมอื่น
            </a>
        </div>
        <h2 class="text-lg font-semibold text-gray-800 mb-4">รายชื่อผู้สมัครเข้าร่วมกิจกรรม</h2>

        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-100">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-5 py-4 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">User ID</th>
                            <th class="px-5 py-4 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">ชื่อ-นามสกุล</th>
                            <th class="px-5 py-4 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">อีเมล</th>
                            <th class="px-5 py-4 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">จังหวัด</th>
                            <th class="px-5 py-4 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">วันที่ลงทะเบียน</th>
                            <th class="px-5 py-4 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">สถานะ</th>
                            <th class="px-5 py-4 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">การจัดการ</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-50">
                        <?php if (empty($data['participants'])): ?>
                            <tr>
                                <td colspan="7" class="px-5 py-12 text-center text-gray-400 text-sm">ยังไม่มีผู้สมัครในกิจกรรมนี้</td>
                            </tr>
                        <?php else: ?>
                            <?php foreach ($data['participants'] as $p): ?>
                                <tr class="hover:bg-gray-50 transition-colors">
                                    <td class="px-5 py-4 text-xs text-gray-400 font-mono"><?= htmlspecialchars($p['user_id']) ?></td>
                                    <td class="px-5 py-4 font-medium text-gray-900 text-sm"><?= htmlspecialchars($p['firstname'] . ' ' . $p['lastname']) ?></td>
                                    <td class="px-5 py-4 text-sm text-gray-500"><?= htmlspecialchars($p['email']) ?></td>
                                    <td class="px-5 py-4 text-sm text-gray-500"><?= htmlspecialchars($p['province']) ?></td>
                                    <td class="px-5 py-4 text-sm text-gray-500"><?= htmlspecialchars($p['registered_at']) ?></td>
                                    <td class="px-5 py-4">
                                        <?php if ($p['status'] === 'pending'): ?>
                                            <span class="inline-flex items-center gap-1 px-2.5 py-1 bg-yellow-100 text-yellow-700 text-xs font-semibold rounded-full">
                                                <span class="w-1.5 h-1.5 bg-yellow-500 rounded-full"></span> รอดำเนินการ
                                            </span>
                                        <?php elseif ($p['status'] === 'approved'): ?>
                                            <span class="inline-flex items-center gap-1 px-2.5 py-1 bg-green-100 text-green-700 text-xs font-semibold rounded-full">
                                                <span class="w-1.5 h-1.5 bg-green-500 rounded-full"></span> อนุมัติแล้ว
                                            </span>
                                        <?php elseif ($p['status'] === 'rejected'): ?>
                                            <span class="inline-flex items-center gap-1 px-2.5 py-1 bg-red-100 text-red-700 text-xs font-semibold rounded-full">
                                                <span class="w-1.5 h-1.5 bg-red-500 rounded-full"></span> ปฏิเสธแล้ว
                                            </span>
                                        <?php endif; ?>
                                    </td>
                                    <td class="px-5 py-4">
                                        <?php if ($p['status'] === 'pending'): ?>
                                            <div class="flex gap-2">
                                                <a href="/approve?id=<?= $p['registration_id'] ?>&status=approved&event_id=<?= $data['eventId'] ?>"
                                                   onclick="return confirm('ยืนยันการอนุมัติ?')"
                                                   class="inline-flex items-center gap-1 px-3 py-1.5 bg-green-600 hover:bg-green-700 text-white text-xs font-semibold rounded-lg transition-colors shadow-sm">
                                                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                                    </svg>
                                                    อนุมัติ
                                                </a>
                                                <a href="/approve?id=<?= $p['registration_id'] ?>&status=rejected&event_id=<?= $data['eventId'] ?>"
                                                   onclick="return confirm('ยืนยันการปฏิเสธ?')"
                                                   class="inline-flex items-center gap-1 px-3 py-1.5 bg-red-600 hover:bg-red-700 text-white text-xs font-semibold rounded-lg transition-colors shadow-sm">
                                                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                                                    </svg>
                                                    ปฏิเสธ
                                                </a>
                                            </div>
                                        <?php else: ?>
                                            <span class="text-gray-400 text-xs">ดำเนินการแล้ว</span>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>

    <?php endif; ?>
</div>

<?php include 'footer.php'; ?>