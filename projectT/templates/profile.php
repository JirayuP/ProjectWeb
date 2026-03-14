<?php include 'header.php'; ?>

<div class="max-w-2xl mx-auto px-4 sm:px-6 py-8">
    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
        <div class="bg-blue-600 px-6 py-8 text-white text-center">
            <div class="w-24 h-24 bg-white text-blue-600 rounded-full mx-auto flex items-center justify-center text-4xl font-bold mb-4">
                <?= mb_substr($data['user']['firstname'], 0, 1) ?>
            </div>
            <h1 class="text-2xl font-bold"><?= htmlspecialchars($data['user']['firstname'] . ' ' . $data['user']['lastname']) ?></h1>
            <p class="opacity-80 text-sm mt-1">ID: <?= htmlspecialchars($data['user']['user_id']) ?></p>
        </div>

        <div class="p-6 space-y-4">
            <div class="flex border-b pb-2">
                <span class="w-1/3 font-semibold text-gray-600 text-sm">อีเมล</span>
                <span class="w-2/3 text-sm"><?= htmlspecialchars($data['user']['email']) ?></span>
            </div>
            <div class="flex border-b pb-2">
                <span class="w-1/3 font-semibold text-gray-600 text-sm">เพศ</span>
                <span class="w-2/3 text-sm"><?= $data['user']['gender'] === 'male' ? 'ชาย' : ($data['user']['gender'] === 'female' ? 'หญิง' : 'อื่นๆ') ?></span>
            </div>
            <div class="flex border-b pb-2">
                <span class="w-1/3 font-semibold text-gray-600 text-sm">วันเกิด</span>
                <span class="w-2/3 text-sm"><?= htmlspecialchars($data['user']['birthdate']) ?></span>
            </div>
            <div class="flex border-b pb-2">
                <span class="w-1/3 font-semibold text-gray-600 text-sm">ที่อยู่</span>
                <span class="w-2/3 text-sm"><?= htmlspecialchars($data['user']['province']) ?></span>
            </div>
        </div>

        <div class="p-6 bg-gray-50 text-center">
            <a href="/change_password" class="text-blue-600 hover:underline font-medium text-sm">เปลี่ยนรหัสผ่าน</a>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>