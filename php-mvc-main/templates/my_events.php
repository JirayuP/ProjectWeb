<?php include 'header.php'; ?>

<div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 py-8">

    <!-- Page Header -->
    <div class="flex items-center justify-between mb-8">
        <div>
            <h1 class="text-2xl font-bold text-gray-900">กิจกรรมของฉัน</h1>
            <p class="text-gray-500 text-sm mt-1">ประวัติการลงทะเบียนและสถานะการเข้าร่วม</p>
        </div>
        <a href="/home" class="flex items-center gap-2 text-sm text-blue-600 hover:text-blue-700 font-medium">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
            </svg>
            หน้าแรก
        </a>
    </div>

    <?php if (empty($data['myEvents'])): ?>
        <div class="text-center py-20 bg-white rounded-2xl border border-gray-100 shadow-sm">
            <div class="w-20 h-20 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-4">
                <svg class="w-10 h-10 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                </svg>
            </div>
            <h3 class="text-lg font-semibold text-gray-600 mb-2">ยังไม่มีประวัติการลงทะเบียน</h3>
            <p class="text-gray-400 text-sm mb-6">คุณยังไม่ได้ลงทะเบียนกิจกรรมใดๆ</p>
            <a href="/home" class="inline-block px-5 py-2.5 bg-blue-600 hover:bg-blue-700 text-white text-sm font-semibold rounded-xl transition-colors">
                ดูกิจกรรมทั้งหมด
            </a>
        </div>
    <?php else: ?>
        <!-- Table Card -->
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-100">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">ชื่อกิจกรรม</th>
                            <th class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">วันที่จัดงาน</th>
                            <th class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">สถานะการเข้าร่วม</th>
                            <th class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">รหัสเข้างาน / OTP</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-50">
                        <?php foreach ($data['myEvents'] as $event): ?>
                            <tr class="hover:bg-gray-50 transition-colors">
                                <td class="px-6 py-4">
                                    <span class="font-medium text-gray-900 text-sm"><?= htmlspecialchars($event['event_name']) ?></span>
                                </td>
                                <td class="px-6 py-4 text-sm text-gray-500"><?= date('d/m/Y', strtotime($event['start_date'])) ?> - <?= date('d/m/Y', strtotime($event['end_date'])) ?></td>
                                <td class="px-6 py-4">
                                    <?php if ($event['status'] == 'pending'): ?>
                                        <span class="inline-flex items-center gap-1.5 px-2.5 py-1 bg-yellow-100 text-yellow-700 text-xs font-semibold rounded-full">
                                            <span class="w-1.5 h-1.5 bg-yellow-500 rounded-full"></span>
                                            รอการอนุมัติ
                                        </span>
                                    <?php elseif ($event['status'] == 'approved'): ?>
                                        <span class="inline-flex items-center gap-1.5 px-2.5 py-1 bg-green-100 text-green-700 text-xs font-semibold rounded-full">
                                            <span class="w-1.5 h-1.5 bg-green-500 rounded-full"></span>
                                            อนุมัติแล้ว
                                        </span>
                                    <?php elseif ($event['status'] == 'rejected'): ?>
                                        <span class="inline-flex items-center gap-1.5 px-2.5 py-1 bg-red-100 text-red-700 text-xs font-semibold rounded-full">
                                            <span class="w-1.5 h-1.5 bg-red-500 rounded-full"></span>
                                            ถูกปฏิเสธ
                                        </span>
                                    <?php endif; ?>
                                </td>
                                <td class="px-6 py-4">
                                    <?php if ($event['status'] == 'approved'): ?>
                                        <?php if ($event['check_in_status'] == 'Checked-in'): ?>
                                            <span class="inline-flex items-center gap-1.5 px-2.5 py-1 bg-blue-100 text-blue-700 text-xs font-semibold rounded-full">
                                                <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20">
                                                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                                                </svg>
                                                เข้างานแล้ว
                                            </span>
                                        <?php else: ?>
                                            <?php
                                                $now = date('Y-m-d H:i:s');
                                                if (!empty($event['otp_code']) && $event['otp_expire_time'] > $now):
                                            ?>
                                                <!-- OTP Display Block -->
                                                <div class="bg-gradient-to-r from-gray-50 to-gray-100 border-2 border-dashed border-gray-300 rounded-xl p-3 text-center min-w-[140px] inline-block">
                                                    <p class="text-xs text-gray-500 mb-1">รหัสเข้างาน</p>
                                                    <p class="text-3xl font-bold tracking-widest text-gray-900 font-mono"><?= $event['otp_code'] ?></p>
                                                    <p class="text-xs text-red-500 mt-1 flex items-center justify-center gap-1">
                                                        <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20">
                                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd"/>
                                                        </svg>
                                                        หมดอายุ: <?= $event['otp_expire_time'] ?>
                                                    </p>
                                                </div>
                                            <?php else: ?>
                                                <a href="/request_otp?event_id=<?= $event['event_id'] ?>"
                                                   class="inline-flex items-center gap-1.5 px-3 py-2 bg-orange-500 hover:bg-orange-600 text-white text-xs font-semibold rounded-lg transition-colors shadow-sm">
                                                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 7a2 2 0 012 2m4 0a6 6 0 01-7.743 5.743L11 17H9v2H7v2H4a1 1 0 01-1-1v-2.586a1 1 0 01.293-.707l5.964-5.964A6 6 0 1121 9z"/>
                                                    </svg>
                                                    ขอรหัสเข้างาน (OTP)
                                                </a>
                                            <?php endif; ?>
                                        <?php endif; ?>
                                    <?php else: ?>
                                        <span class="text-gray-300 text-sm">—</span>
                                    <?php endif; ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    <?php endif; ?>
</div>

<?php include 'footer.php'; ?>