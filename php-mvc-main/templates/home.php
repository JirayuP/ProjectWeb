<?php include 'header.php'; ?>

<?php if (!isset($_SESSION['user_id'])): ?>
    <!-- Guest Landing Hero -->
    <section class="bg-gradient-to-br from-blue-600 to-blue-800 text-white py-20 px-4">
        <div class="max-w-3xl mx-auto text-center">
            <h1 class="text-4xl md:text-5xl font-bold mb-4">ค้นหาและเข้าร่วมกิจกรรม</h1>
            <p class="text-blue-100 text-lg mb-8">แพลตฟอร์มกิจกรรมออนไลน์สำหรับทุกคน สมัครและติดตามกิจกรรมที่คุณสนใจได้ง่ายๆ</p>
            <div class="flex flex-wrap gap-3 justify-center">
                <a href="/register" class="px-6 py-3 bg-white text-blue-700 font-semibold rounded-xl shadow hover:shadow-md hover:-translate-y-0.5 transition-all">
                    สมัครสมาชิกฟรี
                </a>
                <a href="/login" class="px-6 py-3 bg-blue-500/40 text-white font-semibold rounded-xl border border-white/30 hover:bg-blue-500/60 transition-all">
                    เข้าสู่ระบบ
                </a>
            </div>
        </div>
    </section>
<?php else: ?>

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">

 
    <!-- Section Header -->
    <div class="flex items-center justify-between mb-6">
        <div>
            <h2 class="text-2xl font-bold text-gray-900">กิจกรรมที่เปิดรับสมัคร</h2>
            <p class="text-gray-500 text-sm mt-1">กิจกรรมทั้งหมดที่พร้อมให้ลงทะเบียน</p>
        </div>
        <?php if (!empty($data['events'])): ?>
            <span class="bg-blue-100 text-blue-700 text-sm font-medium px-3 py-1 rounded-full">
                <?= count($data['events']) ?> กิจกรรม
            </span>
        <?php endif; ?>
    </div>

    <!-- Events Grid -->
    <?php if (empty($data['events'])): ?>
        <div class="text-center py-20">
            <div class="w-20 h-20 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-4">
                <svg class="w-10 h-10 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                </svg>
            </div>
            <h3 class="text-lg font-semibold text-gray-600 mb-1">ยังไม่มีกิจกรรม</h3>
            <p class="text-gray-400 text-sm">ยังไม่มีกิจกรรมในขณะนี้ กรุณากลับมาตรวจสอบในภายหลัง</p>
        </div>
    <?php else: ?>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            <?php foreach ($data['events'] as $event): ?>
                <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden hover:shadow-md hover:-translate-y-1 transition-all duration-200 flex flex-col">

                    <!-- Event Image -->
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

                    <!-- Card Body -->
                    <div class="p-5 flex flex-col flex-1">
                        <h3 class="font-semibold text-gray-900 text-base leading-snug mb-3">
                            <?= htmlspecialchars($event['event_name']) ?>
                        </h3>

                        <div class="space-y-2 text-sm text-gray-500 flex-1">
                            <div class="flex items-center gap-2">
                               <p><strong>ช่วงเวลา:</strong> 
                                  <?= date('d/m/Y', strtotime($event['start_date'])) ?> - 
                                  <?= date('d/m/Y', strtotime($event['end_date'])) ?>
                               </p>s
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
                                ลงทะเบียนเข้าร่วม
                            </a>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>

</div>

<?php endif; ?>

<?php include 'footer.php'; ?>

<script>
    const urlParams = new URLSearchParams(window.location.search);
    if (urlParams.get('error') === 'already') {
        const toast = document.createElement('div');
        toast.className = 'fixed bottom-6 right-6 bg-red-500 text-white px-5 py-3 rounded-xl shadow-lg text-sm font-medium z-50 animate-bounce';
        toast.textContent = 'คุณได้ลงทะเบียนกิจกรรมนี้ไปแล้ว';
        document.body.appendChild(toast);
        setTimeout(() => toast.remove(), 4000);
        window.history.replaceState({}, document.title, "/home");
    }
</script>