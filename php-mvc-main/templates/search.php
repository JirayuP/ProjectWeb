<?php include 'header.php'; ?>

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">

    <!-- Page Header -->
    <div class="flex flex-wrap items-center justify-between gap-3 mb-6">
        <div>
            <h1 class="text-2xl font-bold text-gray-900">
                ผลการค้นหา:
                <span class="text-blue-600"><?= htmlspecialchars($data['keyword'] ?? '') ?></span>
            </h1>
            <?php if (!empty($data['events'])): ?>
                <p class="text-gray-500 text-sm mt-1">พบ <?= count($data['events']) ?> กิจกรรม</p>
            <?php endif; ?>
        </div>
        <a href="/home" class="flex items-center gap-2 text-sm text-blue-600 hover:text-blue-700 font-medium">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
            </svg>
            กลับหน้าแรก
        </a>
    </div>

    <?php if (empty($data['events'])): ?>
        <div class="text-center py-20 bg-white rounded-2xl border border-gray-100 shadow-sm">
            <div class="w-20 h-20 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-4">
                <svg class="w-10 h-10 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                </svg>
            </div>
            <h3 class="text-lg font-semibold text-gray-600 mb-2">ไม่พบกิจกรรม</h3>
            <p class="text-gray-400 text-sm">ไม่พบกิจกรรมที่ตรงตามเงื่อนไขที่คุณค้นหา</p>
        </div>
    <?php else: ?>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            <?php foreach ($data['events'] as $event): ?>
                <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden hover:shadow-md hover:-translate-y-1 transition-all duration-200 flex flex-col">

                    <!-- Image -->
                    <?php if (!empty($event['images'])): ?>
                        <div class="h-48 overflow-hidden bg-gray-100">
                            <img src="/<?= htmlspecialchars($event['images'][0]['image_path']) ?>"
                                 alt="<?= htmlspecialchars($event['event_name']) ?>"
                                 class="w-full h-full object-cover">
                        </div>
                    <?php else: ?>
                        <div class="h-48 bg-gradient-to-br from-blue-100 to-blue-200 flex items-center justify-center">
                            <svg class="w-16 h-16 text-blue-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                            </svg>
                        </div>
                    <?php endif; ?>

                    <div class="p-5 flex flex-col flex-1">
                        <h3 class="font-semibold text-gray-900 text-base leading-snug mb-3">
                            <?= htmlspecialchars($event['event_name']) ?>
                        </h3>
                        <div class="space-y-2 text-sm text-gray-500 flex-1">
                            <div class="flex items-center gap-2">
                                <svg class="w-4 h-4 text-blue-500 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                </svg>
                                <p><strong>ช่วงเวลา:</strong> 
                                    <?= date('d/m/Y', strtotime($event['start_date'])) ?> - 
                                    <?= date('d/m/Y', strtotime($event['end_date'])) ?>
                                </p>
                            </div>
                            <div class="flex items-center gap-2">
                                <svg class="w-4 h-4 text-blue-500 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                                </svg>
                                <span><?= htmlspecialchars($event['location'] ?? 'ไม่ได้ระบุ') ?></span>
                            </div>
                            <div class="flex items-center gap-2">
                                <svg class="w-4 h-4 text-blue-500 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"/>
                                </svg>
                                <span>รับสูงสุด <?= htmlspecialchars($event['max_participants']) ?> คน</span>
                            </div>
                        </div>

                        <p class="text-xs text-gray-400 mt-3 mb-4 line-clamp-2"><?= htmlspecialchars($event['description']) ?></p>

                        <?php if (isset($_SESSION['user_id']) && $_SESSION['user_id'][0] === 'M'): ?>
                            <a href="/join_event?event_id=<?= $event['event_id'] ?>"
                               onclick="return confirm('ยืนยันการส่งคำขอเข้าร่วมกิจกรรม?')"
                               class="block w-full text-center py-2.5 px-4 bg-blue-600 hover:bg-blue-700 text-white text-sm font-semibold rounded-xl transition-colors shadow-sm mt-auto">
                                ส่งคำขอเข้าร่วม
                            </a>
                        <?php elseif (!isset($_SESSION['user_id'])): ?>
                            <a href="/login"
                               class="block w-full text-center py-2.5 px-4 border-2 border-blue-600 text-blue-600 hover:bg-blue-50 text-sm font-semibold rounded-xl transition-colors mt-auto">
                                เข้าสู่ระบบเพื่อสมัคร
                            </a>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>

</div>

<?php include 'footer.php'; ?>