<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        kanit: ['Kanit', 'sans-serif'],
                    }
                }
            }
        }
    </script>
    <style>
        body { font-family: 'Kanit', sans-serif; }
        .nav-link { transition: color 0.2s, background 0.2s; }
        .dropdown:hover .dropdown-menu { display: block; }
        .dropdown-menu { display: none; }
    </style>
</head>
<body class="bg-gray-50 text-gray-800 min-h-screen flex flex-col">

<?php
$isOrganizer = (isset($_SESSION['user_id']) && $_SESSION['user_id'][0] === 'O');
$isMember    = (isset($_SESSION['user_id']) && $_SESSION['user_id'][0] === 'M');
$isLoggedIn  = isset($_SESSION['user_id']);
?>

<nav class="bg-white shadow-sm border-b border-gray-100 sticky top-0 z-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between h-16">

            <!-- Brand -->
            <a href="/home" class="flex items-center space-x-2 group">
                <div class="w-9 h-9 bg-gradient-to-br from-blue-600 to-blue-700 rounded-lg flex items-center justify-center shadow-sm group-hover:shadow-md transition-shadow">
                    <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"/>
                    </svg>
                </div>
                <span class="text-lg font-semibold text-gray-900">EventHub</span>
            </a>

            <!-- Desktop Menu -->
            <div class="hidden md:flex items-center space-x-1">
                <a href="/home" class="nav-link px-4 py-2 rounded-lg text-sm font-medium text-gray-600 hover:text-blue-600 hover:bg-blue-50">
                    หน้าแรก
                </a>

                <?php if ($isLoggedIn): ?>
                    <?php if ($isMember): ?>
                        <!-- Member badge -->
                        <span class="px-2 py-1 bg-blue-100 text-blue-700 text-xs font-medium rounded-full">สมาชิก</span>
                        <a href="/my_events" class="nav-link px-4 py-2 rounded-lg text-sm font-medium text-gray-600 hover:text-blue-600 hover:bg-blue-50">
                            กิจกรรมของฉัน
                        </a>
                    <?php endif; ?>

                    <?php if ($isOrganizer): ?>
                        <!-- Organizer badge -->
                        <span class="px-2 py-1 bg-purple-100 text-purple-700 text-xs font-medium rounded-full">ผู้จัดงาน</span>
                        <a href="/create_event" class="nav-link px-4 py-2 rounded-lg text-sm font-medium text-gray-600 hover:text-purple-600 hover:bg-purple-50">
                            สร้างกิจกรรม
                        </a>
                        <a href="/participants" class="nav-link px-4 py-2 rounded-lg text-sm font-medium text-gray-600 hover:text-purple-600 hover:bg-purple-50">
                            จัดการผู้สมัคร
                        </a>
                    <?php endif; ?>

                    <!-- User Dropdown -->
                    <div class="relative dropdown ml-2">
                        <button class="flex items-center space-x-2 px-3 py-2 rounded-lg bg-gray-100 hover:bg-gray-200 transition-colors text-sm font-medium">
                            <div class="w-7 h-7 bg-blue-600 rounded-full flex items-center justify-center">
                                <span class="text-white text-xs font-bold"><?= strtoupper(substr($_SESSION['user_id'] ?? 'U', 0, 1)) ?></span>
                            </div>
                            <span class="text-gray-700"><?= htmlspecialchars($_SESSION['first_name'] . ' ' . $_SESSION['last_name'] ?? '') ?></span>
                            <svg class="w-4 h-4 text-gray-500" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"/>
                            </svg>
                        </button>
                        <div class="dropdown-menu absolute right-0 mt-1 w-48 bg-white rounded-xl shadow-lg border border-gray-100 py-1 z-50">
                            <a href="/profile" class="flex items-center px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 transition-colors">
                                <svg class="w-4 h-4 mr-3 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                </svg>
                                <span>โปรไฟล์</span>
                            </a>
                            <a href="/change_password" class="flex items-center px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 transition-colors">
                                <svg class="w-4 h-4 mr-3 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 7a2 2 0 012 2m4 0a6 6 0 01-7.743 5.743L11 17H9v2H7v2H4a1 1 0 01-1-1v-2.586a1 1 0 01.293-.707l5.964-5.964A6 6 0 1121 9z"/></svg>
                                เปลี่ยนรหัสผ่าน
                            </a>
                            <hr class="my-1 border-gray-100">
                            <a href="/logout" class="flex items-center px-4 py-2 text-sm text-red-600 hover:bg-red-50">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/></svg>
                                ออกจากระบบ
                            </a>
                        </div>
                    </div>

                <?php else: ?>
                    <a href="/login" class="nav-link px-4 py-2 rounded-lg text-sm font-medium text-gray-600 hover:text-blue-600 hover:bg-blue-50">
                        เข้าสู่ระบบ
                    </a>
                    <a href="/register" class="px-4 py-2 rounded-lg text-sm font-semibold text-white bg-blue-600 hover:bg-blue-700 transition-colors shadow-sm">
                        สมัครสมาชิก
                    </a>
                <?php endif; ?>
            </div>

            <!-- Mobile Hamburger -->
            <button id="mobile-menu-btn" class="md:hidden p-2 rounded-lg text-gray-500 hover:bg-gray-100">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                </svg>
            </button>
        </div>

        <!-- Mobile Menu -->
        <div id="mobile-menu" class="hidden md:hidden pb-4 space-y-1">
            <a href="/home" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-50 rounded-lg">หน้าแรก</a>
            <?php if ($isLoggedIn): ?>
                <?php if ($isMember): ?>
                    <a href="/my_events" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-50 rounded-lg">กิจกรรมของฉัน</a>
                <?php endif; ?>
                <?php if ($isOrganizer): ?>
                    <a href="/create_event" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-50 rounded-lg">สร้างกิจกรรม</a>
                    <a href="/participants" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-50 rounded-lg">จัดการผู้สมัคร</a>
                <?php endif; ?>
                <a href="/change_password" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-50 rounded-lg">เปลี่ยนรหัสผ่าน</a>
                <a href="/logout" class="block px-4 py-2 text-sm text-red-600 hover:bg-red-50 rounded-lg">ออกจากระบบ</a>
                
            <?php else: ?>
                <a href="/login" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-50 rounded-lg">เข้าสู่ระบบ</a>
                <a href="/register" class="block px-4 py-2 text-sm font-medium text-blue-600 hover:bg-blue-50 rounded-lg">สมัครสมาชิก</a>
            <?php endif; ?>
        </div>
    </div>
</nav>
<?php if ($isLoggedIn): ?>
<!-- Search Bar -->
<div class="bg-gray-50 border-b border-gray-100 px-4 py-3">
    <div class="max-w-7xl mx-auto">
        <form action="/search" method="GET">
            <div class="flex flex-col sm:flex-row gap-2 items-center">
                <div class="flex-1 relative w-full">
                    <svg class="absolute left-3 top-1/2 -translate-y-1/2 w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                    </svg>
                    <input type="text" name="keyword" placeholder="ค้นหาชื่อกิจกรรม..."
                        class="w-full pl-9 pr-3 py-2 border border-gray-200 rounded-lg text-sm bg-white focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition">
                </div>
                <div class="flex items-center gap-2 shrink-0">
                    <label class="text-xs text-gray-500 whitespace-nowrap">ตั้งแต่:</label>
                    <input type="date" name="start_date"
                        class="py-2 px-2.5 border border-gray-200 rounded-lg text-sm bg-white focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition">
                </div>
                <div class="flex items-center gap-2 shrink-0">
                    <label class="text-xs text-gray-500 whitespace-nowrap">ถึง:</label>
                    <input type="date" name="end_date"
                        class="py-2 px-2.5 border border-gray-200 rounded-lg text-sm bg-white focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition">
                </div>
                <button type="submit"
                    class="px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white text-sm font-semibold rounded-lg transition-colors shadow-sm whitespace-nowrap shrink-0">
                    ค้นหา
                </button>
            </div>
        </form>
    </div>
</div>
<?php endif; ?>
<script>
    document.getElementById('mobile-menu-btn')?.addEventListener('click', function() {
        const menu = document.getElementById('mobile-menu');
        menu.classList.toggle('hidden');
    });
</script>

<main class="flex-1">