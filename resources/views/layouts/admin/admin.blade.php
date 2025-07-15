<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>@yield('title', 'Admin - Dubai Cleanup & Maintenance')</title>
    <link href="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
    <style>
        /* Custom Scrollbar */
        ::-webkit-scrollbar {
            width: 6px;
            height: 6px;
        }
        ::-webkit-scrollbar-thumb {
            background: linear-gradient(180deg, #36a3dc, #203e78);
            border-radius: 9999px;
        }
        ::-webkit-scrollbar-track {
            background: #f1f5f9;
        }

        /* Animations */
        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }
        @keyframes sparklePulse {
            0%, 100% { transform: scale(1); opacity: 0.6; }
            50% { transform: scale(1.3); opacity: 0.9; }
        }

        /* Header and Nav */
        .nav-link {
            position: relative;
            transition: color 0.3s ease;
        }
        .nav-link::after {
            content: '';
            position: absolute;
            width: 0;
            height: 2px;
            bottom: -2px;
            left: 0;
            background: #203e78;
            transition: width 0.3s ease;
        }
        .nav-link:hover::after, .nav-link:focus::after {
            width: 100%;
        }
        .nav-link:hover, .nav-link:focus {
            color: #203e78;
        }

        /* Sidebar */
        .sidebar-link {
            transition: color 0.3s ease;
            border-radius: 6px;
            padding: 10px 14px;
            display: flex;
            align-items: center;
        }
        .sidebar-link:hover, .sidebar-link:focus {
            color: #36a3dc;
        }
        .sidebar-link.active {
            color: #203e78;
            font-weight: 600;
        }
        .sidebar-link::after {
            content: '';
            position: absolute;
            width: 0;
            height: 2px;
            bottom: -2px;
            left: 0;
            background: #203e78;
            transition: width 0.3s ease;
        }
        .sidebar-link:hover::after, .sidebar-link.active::after {
            width: 100%;
        }

        /* Sparkle Effect */
        .sparkle {
            position: absolute;
            background: radial-gradient(circle, #203e78 10%, transparent 50%);
            border-radius: 50%;
            animation: sparklePulse 3s ease-in-out infinite;
        }

        /* Glassmorphism */
        .glassmorphic {
            background: rgba(255, 255, 255, 0.85);
            backdrop-filter: blur(8px);
            border: 1px solid rgba(255, 255, 255, 0.1);
            box-shadow: 0 4px 16px rgba(0, 0, 0, 0.05);
        }

        /* Button Ripple */
        .gradient-btn {
            position: relative;
            overflow: hidden;
            transition: transform 0.3s ease;
            background: linear-gradient(90deg, #203e78, #36a3dc);
        }
        .gradient-btn:hover, .gradient-btn:focus {
            transform: translateY(-1px);
            box-shadow: 0 6px 12px rgba(54, 163, 220, 0.2);
        }
        .gradient-btn::after {
            content: '';
            position: absolute;
            width: 150px;
            height: 150px;
            background: rgba(255, 255, 255, 0.2);
            border-radius: 50%;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%) scale(0);
            transition: transform 0.4s ease;
        }
        .gradient-btn:hover::after, .gradient-btn:focus::after {
            transform: translate(-50%, -50%) scale(1.5);
        }

        /* Focus States */
        button:focus, a:focus {
            outline: none;
            box-shadow: 0 0 0 2px #203e78;
        }

        /* Tooltip */
        [data-tooltip]::before {
            content: attr(data-tooltip);
            position: absolute;
            top: -2rem;
            left: 50%;
            transform: translateX(-50%) scale(0);
            background: #203e78;
            color: white;
            text-align: center;
            padding: 4px 8px;
            border-radius: 4px;
            font-size: 12px;
            white-space: nowrap;
            transition: transform 0.2s ease, opacity 0.2s ease;
            opacity: 0;
            z-index: 50;
        }
        [data-tooltip]:hover::before, [data-tooltip]:focus::before {
            transform: translateX(-50%) scale(1);
            opacity: 1;
        }

        @media (prefers-reduced-motion: reduce) {
            .animate-fade-in, .sidebar-link, .gradient-btn, .sparkle {
                animation: none;
                transition: none;
            }
        }
    </style>
</head>
<body class="bg-gradient-to-b from-[#f8fafc] to-[#e6eff9] text-gray-900 font-poppins min-h-screen flex flex-col antialiased relative">
    <!-- Background Sparkle -->
    <div class="fixed inset-0 pointer-events-none z-0">
        <div class="sparkle w-3 h-3 top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2"></div>
    </div>

    @auth
        @if (auth()->user()->is_admin)
            <!-- Header -->
            <header class="bg-white/95 backdrop-blur-md sticky top-0 z-50 border-b border-gradient-to-r from-[#203e78] to-[#36a3dc]">
                <div class="max-w-7xl mx-auto flex items-center justify-between px-6 py-4">
                    <a href="/admin/dashboard" class="hover:scale-105 transition-transform duration-200" aria-label="Admin Dashboard">
                        <img src="/assets/logo/logo.png" alt="Dubai Cleanup & Maintenance Logo" class="w-auto h-12 animate-fade-in">
                    </a>
                    <nav class="flex items-center space-x-6 text-gray-700 font-semibold relative">
                        <div class="group relative">
                            <button class="nav-link flex items-center space-x-2 focus:outline-none" aria-haspopup="true" aria-expanded="false">
                                <span class="text-gray-600">Welcome, {{ auth()->user()->name }}</span>
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                                </svg>
                            </button>
                            <div class="hidden group-hover:block absolute right-0 mt-2 w-44 glassmorphic rounded-lg shadow-lg border border-gray-100 z-50 animate-fade-in">
                                <a href="/admin/profile" class="block px-4 py-2 text-gray-700 hover:text-[#203e78] transition-colors">Profile</a>
                                <form action="/logout" method="POST" class="inline">
                                    @csrf
                                    <button type="submit" class="block w-full text-left px-4 py-2 text-red-500 hover:text-red-600 transition-colors">Logout</button>
                                </form>
                            </div>
                        </div>
                    </nav>
                </div>
            </header>

            <!-- Main Content with Sidebar -->
            <div class="flex flex-1 max-w-7xl mx-auto w-full px-6 py-8 relative">
                <!-- Sidebar -->
                <aside id="sidebar" class="w-64 glassmorphic rounded-xl p-6 mr-6 transition-all duration-300 md:w-64 md:block">
                    <div class="flex items-center justify-between mb-6">
                        <h2 class="text-lg font-semibold text-gray-800">
                            <a href="/admin/dashboard" class="hover:text-[#203e78] transition-colors">Admin Dashboard</a>
                        </h2>
                        <button id="sidebarToggle" class="md:hidden text-gray-600 hover:text-[#36a3dc] focus:outline-none">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                            </svg>
                        </button>
                    </div>
                    <nav class="space-y-1 hidden md:block" id="sidebarNav">
                        <a href="/admin/users" class="sidebar-link block text-gray-700 font-medium relative {{ request()->is('admin/users*') ? 'active' : '' }}" data-tooltip="Manage Users" aria-current="{{ request()->is('admin/users*') ? 'page' : '' }}">
                            <svg class="w-4 h-4 mr-2 inline" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.5v15m7.5-7.5h-15" />
                            </svg>
                            User 
                        </a>
                        <a href="/admin/bookings" class="sidebar-link block text-gray-700 font-medium relative {{ request()->is('admin/bookings*') ? 'active' : '' }}" data-tooltip="Manage Bookings" aria-current="{{ request()->is('admin/bookings*') ? 'page' : '' }}">
                            <svg class="w-4 h-4 mr-2 inline" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>
                            Booking
                        </a>
                        <a href="/admin/services" class="sidebar-link block text-gray-700 font-medium relative {{ request()->is('admin/services*') ? 'active' : '' }}" data-tooltip="Manage Services" aria-current="{{ request()->is('admin/services*') ? 'page' : '' }}">
                            <svg class="w-4 h-4 mr-2 inline" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            Service 
                        </a>
                        <a href="/admin/sliders" class="sidebar-link block text-gray-700 font-medium relative {{ request()->is('admin/sliders*') ? 'active' : '' }}" data-tooltip="Manage Sliders" aria-current="{{ request()->is('admin/sliders*') ? 'page' : '' }}">
                            <svg class="w-4 h-4 mr-2 inline" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                            </svg>
                            Slider 
                        </a>
                        <a href="/admin/reviews" class="sidebar-link block text-gray-700 font-medium relative {{ request()->is('admin/reviews*') ? 'active' : '' }}" data-tooltip="Manage Reviews" aria-current="{{ request()->is('admin/reviews*') ? 'page' : '' }}">
                            <svg class="w-4 h-4 mr-2 inline" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15.828H9v-2.828l8.586-8.586z" />
                            </svg>
                            Review 
                        </a>
                        <a href="/admin/portfolios" class="sidebar-link block text-gray-700 font-medium relative {{ request()->is('admin/portfolios*') ? 'active' : '' }}" data-tooltip="Manage Sliders" aria-current="{{ request()->is('admin/sliders*') ? 'page' : '' }}">
                            <svg class="w-4 h-4 mr-2 inline" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                            </svg>
                            Portfolio 
                        </a>
                    </nav>
                </aside>

                <!-- Content -->
                <main class="flex-1 glassmorphic rounded-xl p-8 animate-fade-in relative z-10" style="animation-delay: 0.2s;">
                    @yield('content')
                </main>
            </div>

            <!-- Footer -->
            <footer class="bg-[#203e78] text-white mt-auto relative overflow-hidden">
                <div class="absolute inset-0 opacity-10">
                    <svg class="w-full h-full" viewBox="0 0 1440 320" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill="#203e78" fill-opacity="0.2" d="M0,192L48,181.3C96,171,192,149,288,154.7C384,160,480,192,576,202.7C672,213,768,202,864,186.7C960,171,1056,149,1152,144C1248,139,1344,149,1392,154.7L1440,160L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path>
                    </svg>
                </div>
                <div class="max-w-7xl mx-auto px-6 py-6 text-center relative z-10">
                    <div class="flex justify-center space-x-4 mb-3">
                        <a href="#" class="hover:text-[#203e78] transition-colors" aria-label="Twitter">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M24 4.6c-.9.4-1.8.7-2.8.8 1-.6 1.8-1.6 2.2-2.7-.9.6-2 1-3.1 1.2-1.9-2-5-2.6-7.6-.8-1.4 1-2.2 2.6-2.1 4.3-3.6-.2-6.9-1.9-9-4.7-.4.7-.6 1.5-.6 2.4 0 1.7.8 3.1 2.1 4-.8 0-1.6-.2-2.3-.6v.1c0 2.3 1.6 4.3 3.8 4.7-.7.2-1.4.3-2.1.3-.5 0-1 0-1.5-.1 1 3.2 3.9 5.5 7.3 5.6-2.7 2.1-6.1 3.3-9.8 3.3-.6 0-1.3 0-1.9-.1 3.5 2.3 7.7 3.6 12.2 3.6 14.6 0 22.6-12.1 22.6-22.6 0-.3 0-.7-.1-1 .6-.4 1.2-.9 1.7-1.5z"/></svg>
                        </a>
                        <a href="#" class="hover:text-[#203e78] transition-colors" aria-label="Facebook">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M22.5 0h-21C.7 0 0 .7 0 1.5v21C0 23.3.7 24 1.5 24h12v-9.4h-3.2v-3.6h3.2V8.3c0-3.2 1.9-4.9 4.8-4.9 1.4 0 2.6.1 2.9.2v3.4h-2c-1.6 0-1.9.8-1.9 1.9v2.5h3.8l-.5 3.6h-3.3V24h6.5c.8 0 1.5-.7 1.5-1.5v-21C24 .7 23.3 0 22.5 0z"/></svg>
                        </a>
                    </div>
                    <p class="text-sm select-none hover:text-[#203e78] transition-colors">© {{ date('Y') }} Dubai Cleanup & Maintenance. All rights reserved.</p>
                </div>
            </footer>
        @else
            <div class="max-w-7xl mx-auto px-6 py-20 text-center animate-fade-in">
                <h1 class="text-3xl font-bold text-red-600 mb-4">Unauthorized Access</h1>
                <p class="text-lg text-gray-600 mb-6">You do not have admin privileges.</p>
                <a href="/" class="gradient-btn text-white px-6 py-2 rounded-lg text-base font-medium" aria-label="Return to Home">Return to Home</a>
            </div>
        @endif
    @else
        <div class="max-w-7xl mx-auto px-6 py-20 text-center animate-fade-in">
            <h1 class="text-3xl font-bold text-red-600 mb-4">Please Log In</h1>
            <p class="text-lg text-gray-600 mb-6">You need to be logged in to access the admin area.</p>
            <a href="/login" class="gradient-btn text-white px-6 py-2 rounded-lg text-base font-medium" aria-label="Login">Login</a>
        </div>
    @endauth

    <!-- Scripts -->
    <script>
        // Sidebar Toggle
        document.getElementById('sidebarToggle')?.addEventListener('click', () => {
            const sidebarNav = document.getElementById('sidebarNav');
            sidebarNav.classList.toggle('hidden');
        });

        // Keyboard Accessibility
        document.querySelectorAll('.sidebar-link, .nav-link, .gradient-btn').forEach(el => {
            el.addEventListener('keydown', (e) => {
                if (e.key === 'Enter' || e.key === ' ') {
                    e.preventDefault();
                    el.click();
                }
            });
        });
    </script>
</body>
</html>