    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <title>@yield('title', 'Best Cleaning Services in Dubai | Eco-Friendly Home & Office Cleaning - Dubai Cleanup & Maintenance')</title>
        <link rel="icon" type="image/png" href="https://www.dubaicleanupcare.com/assets/logo/logo.png">
        <meta name="description" content="Discover top-rated cleaning services in Dubai. Eco-friendly, affordable, and reliable home & office cleaning in Dubai Marina, JBR, and beyond. Book same-day service now for spotless results." />
        <meta name="keywords" content="cleaning services Dubai, deep cleaning Dubai, home cleaning Dubai, office cleaning Dubai, eco-friendly cleaning UAE, maintenance services Dubai" />
        <meta name="robots" content="index, follow" />
        <link rel="canonical" href="https://www.dubaicleanupcare.com/" />
        <!-- Open Graph / Facebook -->
        <meta property="og:type" content="website" />
        <meta property="og:url" content="https://www.dubaicleanupcare.com/" />
        <meta property="og:title" content="Best Cleaning Services in Dubai | Dubai Cleanup & Maintenance" />
        <meta property="og:description" content="Transform your space with expert, eco-friendly cleaning and maintenance services in Dubai. Trusted by 5000+ homes for spotless results and flexible booking." />
        <meta property="og:image" content="https://www.dubaicleanupcare.com/assets/logo/logo.png" />
        <!-- Twitter -->
        <meta name="twitter:card" content="summary_large_image" />
        <meta name="twitter:title" content="Best Cleaning Services in Dubai | Dubai Cleanup & Maintenance" />
        <meta name="twitter:description" content="Transform your space with expert, eco-friendly cleaning and maintenance services in Dubai. Trusted by 5000+ homes for spotless results and flexible booking." />
        <meta name="twitter:image" content="https://www.dubaicleanupcare.com/assets/logo/logo.png" />
        <link href="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4" rel="stylesheet">
        <script src="https://cdn.tailwindcss.com"></script>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
    </head>
    <style>
        /* Custom subtle scrollbar */
        ::-webkit-scrollbar {
            width: 10px;
            height: 10px;
        }
        ::-webkit-scrollbar-thumb {
            background: #36a3dc;
            border-radius: 9999px;
        }
        ::-webkit-scrollbar-track {
            background: #f1f5f9;
        }

        /* Smooth transitions and hover effects */
        .nav-link {
            position: relative;
            transition: color 0.3s ease;
        }
        .nav-link::after {
            content: '';
            position: absolute;
            width: 0;
            height: 2px;
            bottom: -4px;
            left: 0;
            background: #36a3dc;
            transition: width 0.3s ease;
        }
        .nav-link:hover::after {
            width: 100%;
        }

        /* Gradient button */
        .gradient-btn {
            background: #36a3dc;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        .gradient-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 20px rgba(54, 163, 220, 0.3);
        }

        /* Hero section animation */
        @keyframes fadeInUp {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .animate-fade-in-up {
            animation: fadeInUp 0.8s ease-out forwards;
        }
    </style>
</head>
<body class="bg-gradient-to-b from-gray-50 to-gray-100 text-gray-900 font-poppins min-h-screen flex flex-col antialiased">

<!-- Header -->
    <header class="bg-gradient-to-r from-white to-[#f8fafc] backdrop-blur-2xl shadow-[0_4px_20px_rgba(54,163,220,0.1)] sticky top-0 z-50 border-b border-[#36a3dc]/10">
        <div class="max-w-7xl mx-auto flex items-center justify-between px-6 py-4">
            <!-- Logo -->
            <a href="/" class="relative group hover:scale-105 transition-transform duration-300 focus:outline-none focus:ring-2 focus:ring-[#36a3dc] rounded" aria-label="Homepage">
                <img src="/assets/logo/logo.png" alt="Dubai Cleanup & Maintenance Logo" class="h-20 w-auto" style="filter: drop-shadow(0_3px_6px_rgba(54,163,220,0.2));">
                <span class="absolute inset-0 bg-gradient-to-r from-[#36a3dc]/0 to-[#36a3dc]/10 rounded-full opacity-0 group-hover:opacity-100 transition-opacity duration-300"></span>
            </a>
            <!-- Hamburger Menu Button (Mobile) -->
            <button id="menu-toggle" class="md:hidden text-gray-700 focus:outline-none focus:ring-2 focus:ring-[#36a3dc] rounded p-2 hover:bg-[#36a3dc]/10 transition-colors duration-200" aria-label="Toggle Navigation">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                </svg>
            </button>
            <!-- Navigation (Desktop) -->
            <nav id="nav-menu" class="hidden md:flex md:items-center text-gray-800 font-semibold text-base">
                <a href="/" class="nav-link relative px-5 py-2.5 rounded-full hover:bg-[#36a3dc]/10 hover:text-[#36a3dc] transition-all duration-300 flex items-center gap-2 {{ Route::currentRouteName() === '' ? 'bg-[#36a3dc]/20 text-[#36a3dc] animate-pulse' : '' }}" aria-current="{{ Route::currentRouteName() === '' ? 'page' : 'false' }}">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" /></svg>
                    Home
                    <span class="absolute bottom-0 left-1/2 w-0 h-1 bg-[#36a3dc] group-hover:w-1/2 transition-all duration-300 transform -translate-x-1/2"></span>
                </a>
                <a href="/services" class="nav-link relative px-5 py-2.5 rounded-full hover:bg-[#36a3dc]/10 hover:text-[#36a3dc] transition-all duration-300 flex items-center gap-2 {{ Route::currentRouteName() === 'services' ? 'bg-[#36a3dc]/20 text-[#36a3dc] animate-pulse' : '' }}" aria-current="{{ Route::currentRouteName() === 'services' ? 'page' : 'false' }}">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 20"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0v6l-8 4-8-4V7m8 4v10" /></svg>
                    Services
                    <span class="absolute bottom-0 left-1/2 w-0 h-1 bg-[#36a3dc] group-hover:w-1/2 transition-all duration-300 transform -translate-x-1/2"></span>
                </a>
                <a href="/about" class="nav-link relative px-5 py-2.5 rounded-full hover:bg-[#36a3dc]/10 hover:text-[#36a3dc] transition-all duration-300 flex items-center gap-2 {{ Route::currentRouteName() === 'about' ? 'bg-[#36a3dc]/20 text-[#36a3dc] animate-pulse' : '' }}" aria-current="{{ Route::currentRouteName() === 'about' ? 'page' : 'false' }}">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                    About
                    <span class="absolute bottom-0 left-1/2 w-0 h-1 bg-[#36a3dc] group-hover:w-1/2 transition-all duration-300 transform -translate-x-1/2"></span>
                </a>
                <a href="/booking" class="nav-link relative px-5 py-2.5 rounded-full hover:bg-[#36a3dc]/10 hover:text-[#36a3dc] transition-all duration-300 flex items-center gap-2 {{ Route::currentRouteName() === 'booking' ? 'bg-[#36a3dc]/20 text-[#36a3dc] animate-pulse' : '' }}" aria-current="{{ Route::currentRouteName() === 'booking' ? 'page' : 'false' }}">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" /></svg>
                    Booking
                    <span class="absolute bottom-0 left-1/2 w-0 h-1 bg-[#36a3dc] group-hover:w-1/2 transition-all duration-300 transform -translate-x-1/2"></span>
                </a>
                <a href="/portfolio" class="nav-link relative px-5 py-2.5 rounded-full hover:bg-[#36a3dc]/10 hover:text-[#36a3dc] transition-all duration-300 flex items-center gap-2 {{ Route::currentRouteName() === 'portfolio' ? 'bg-[#36a3dc]/20 text-[#36a3dc] animate-pulse' : '' }}" aria-current="{{ Route::currentRouteName() === 'portfolio' ? 'page' : 'false' }}">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4-4 4 4 4-4 4 4m-16 4h16" /></svg>
                    Portfolio
                    <span class="absolute bottom-0 left-1/2 w-0 h-1 bg-[#36a3dc] group-hover:w-1/2 transition-all duration-300 transform -translate-x-1/2"></span>
                </a>
                <!-- Account Mega Dropdown -->
                <div class="relative" id="account-dropdown">
                    <button class="nav-link relative px-5 py-2.5 rounded-full hover:bg-[#36a3dc]/10 hover:text-[#36a3dc] transition-all duration-300 flex items-center gap-2 focus:outline-none focus:ring-2 focus:ring-[#36a3dc]" aria-haspopup="true" aria-expanded="false" id="account-toggle">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" /></svg>
                        Account
                        <svg class="w-4 h-4 ml-1 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24" id="account-chevron"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" /></svg>
                    </button>
                    <div class="absolute right-0 top-full w-64 bg-white/95 backdrop-blur-lg rounded-xl shadow-[0_10px_30px_rgba(54,163,220,0.2)] border border-[#36a3dc]/10 opacity-0 translate-y-4 transition-all duration-300 z-40 pointer-events-none" role="menu" aria-labelledby="account-toggle" id="account-menu">
                        <div class="py-2">
                            @guest
                                <a href="/login" class="flex items-center gap-2 px-4 py-3 text-gray-800 hover:bg-[#36a3dc]/10 hover:text-[#36a3dc] transition-all duration-200 focus:bg-[#36a3dc]/10 focus:text-[#36a3dc] focus:outline-none" role="menuitem" aria-label="Login">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1" /></svg>
                                    Login
                                </a>
                                <div class="h-px bg-gray-200/50 mx-4 my-1"></div>
                                <a href="/register" class="flex items-center gap-2 px-4 py-3 text-gray-800 hover:bg-[#36a3dc]/10 hover:text-[#36a3dc] transition-all duration-200 focus:bg-[#36a3dc]/10 focus:text-[#36a3dc] focus:outline-none" role="menuitem" aria-label="Register">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z" /></svg>
                                    Register
                                </a>
                            @endguest
                            @auth
                                <div class="px-4 py-2 text-sm text-gray-500 font-medium border-b border-gray-200/50">Logged in as {{ Auth::user()->name }}</div>
                                <form action="/logout" method="POST" role="menuitem">
                                    @csrf
                                    <button type="submit" class="w-full flex items-center gap-2 px-4 py-3 text-red-500 hover:bg-[#36a3dc]/10 hover:text-red-600 transition-all duration-200 focus:bg-[#36a3dc]/10 focus:text-red-600 focus:outline-none text-left" aria-label="Logout">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" /></svg>
                                        Logout
                                    </button>
                                </form>
                            @endauth
                        </div>
                    </div>
                </div>
                <!-- CTA Button -->
                <a href="/booking" class="gradient-btn px-6 py-2.5 rounded-full bg-[#36a3dc] text-white hover:bg-[#2b8cc4] hover:scale-105 transition-all duration-300 flex items-center gap-2 shadow-[0_4px_15px_rgba(54,163,220,0.3)] focus:outline-none focus:ring-2 focus:ring-[#36a3dc]" aria-label="Book Now">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                    Book Now
                </a>
            </nav>
        </div>
        <!-- JavaScript for Dropdown -->
        <script>
            document.addEventListener('DOMContentLoaded', () => {
                const accountDropdown = document.getElementById('account-dropdown');
                const accountToggle = document.getElementById('account-toggle');
                const accountMenu = document.getElementById('account-menu');
                const accountChevron = document.getElementById('account-chevron');
                let leaveTimeout;

                if (accountDropdown && accountToggle && accountMenu && accountChevron) {
                    // Initialize dropdown as hidden
                    accountMenu.classList.add('opacity-0', 'translate-y-4', 'pointer-events-none');
                    accountToggle.setAttribute('aria-expanded', 'false');

                    // Show dropdown on hover
                    accountDropdown.addEventListener('mouseenter', () => {
                        clearTimeout(leaveTimeout);
                        accountMenu.classList.remove('opacity-0', 'translate-y-4', 'pointer-events-none');
                        accountMenu.classList.add('opacity-100', 'translate-y-0', 'pointer-events-auto');
                        accountToggle.setAttribute('aria-expanded', 'true');
                        accountChevron.classList.add('rotate-180');
                    });

                    // Hide dropdown with delay on leave
                    accountDropdown.addEventListener('mouseleave', () => {
                        leaveTimeout = setTimeout(() => {
                            accountMenu.classList.remove('opacity-100', 'translate-y-0', 'pointer-events-auto');
                            accountMenu.classList.add('opacity-0', 'translate-y-4', 'pointer-events-none');
                            accountToggle.setAttribute('aria-expanded', 'false');
                            accountChevron.classList.remove('rotate-180');
                        }, 200);
                    });

                    // Show dropdown on focus
                    accountToggle.addEventListener('focus', () => {
                        clearTimeout(leaveTimeout);
                        accountMenu.classList.remove('opacity-0', 'translate-y-4', 'pointer-events-none');
                        accountMenu.classList.add('opacity-100', 'translate-y-0', 'pointer-events-auto');
                        accountToggle.setAttribute('aria-expanded', 'true');
                        accountChevron.classList.add('rotate-180');
                    });

                    // Hide dropdown when focus leaves
                    accountDropdown.addEventListener('focusout', (e) => {
                        if (!accountDropdown.contains(e.relatedTarget)) {
                            accountMenu.classList.remove('opacity-100', 'translate-y-0', 'pointer-events-auto');
                            accountMenu.classList.add('opacity-0', 'translate-y-4', 'pointer-events-none');
                            accountToggle.setAttribute('aria-expanded', 'false');
                            accountChevron.classList.remove('rotate-180');
                        }
                    });
                }
            });
        </script>
    </header>

    <!-- Conditionally Display Hero Section -->
    @if (in_array(Route::currentRouteName(), ['login', 'showRegister']))
        <section class="max-w-7xl mx-auto px-6 py-20 text-center">
            <h1 class="text-5xl md:text-6xl font-bold animate-fade-in-up" style="color:#203e78">Welcome to Dubai Cleanup & Maintenance</h1>
            <p class="mt-6 text-lg md:text-xl text-gray-600 max-w-2xl mx-auto animate-fade-in-up" style="animation-delay: 0.2s;">Experience a world-class platform designed for elegance and performance, tailored to your needs.</p>
        </section>
    @endif
    <!-- Full-Width Content Section -->
    @yield('full-width-content')
    <!-- Main Content -->
    @if (View::hasSection('content'))
        <main class="flex-grow max-w-4xl mx-auto w-full px-8 py-12 bg-white rounded-2xl shadow-xl mt-8 mb-16 transform hover:scale-[1.01] transition-transform duration-300">
            @yield('content')
        </main>
    @endif
    <a href="https://wa.me/+971525881279" target="_blank" style="position: fixed; bottom: 24px; right: 24px; background: linear-gradient(135deg, #25D366 0%, #128C7E 100%); color: white; padding: 16px; border-radius: 50%; box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2), 0 0 0 4px rgba(54, 163, 220, 0.1); transition: all 0.3s ease; animation: pulse 2s infinite; display: flex; align-items: center; justify-content: center; z-index: 50;" onmouseover="this.style.transform='scale(1.1) translateY(-4px)'; this.style.boxShadow='0 8px 24px rgba(0, 0, 0, 0.3), 0 0 0 6px rgba(54, 163, 220, 0.2)';" onmouseout="this.style.transform='scale(1) translateY(0)'; this.style.boxShadow='0 4px 12px rgba(0, 0, 0, 0.2), 0 0 0 4px rgba(54, 163, 220, 0.1)';" aria-label="Chat on WhatsApp">
    <svg style="width: 24px; height: 24px; fill: currentColor;" viewBox="0 0 24 24"><path d="M12.04 2C6.58 2 2.13 6.45 2.13 11.91c0 1.33.27 2.59.75 3.72L1.5 22l6.42-1.35c1.13.48 2.39.75 3.72.75 5.46 0 9.91-4.45 9.91-9.91S17.5 2 12.04 2zm0 18.17c-1.16 0-2.29-.22-3.36-.64l-.24-.13-3.8.8.81-3.71-.15-.25c-.47-1.1-.73-2.29-.73-3.55 0-4.76 3.88-8.64 8.64-8.64s8.64 3.88 8.64 8.64-3.88 8.64-8.64 8.64zm4.92-6.44c-.27-.14-1.61-.8-1.86-.89-.24-.09-.42-.14-.61.14-.18.27-.7.89-.86 1.07-.16.18-.32.2-.59.07-.27-.14-1.14-.42-2.17-1.34-.8-.71-1.34-1.59-1.5-1.86-.16-.27-.02-.42.12-.55.12-.12.27-.32.41-.48.14-.16.18-.27.27-.45.09-.18.05-.34-.02-.48-.07-.14-.61-1.48-.84-2.03-.22-.53-.44-.45-.61-.45-.16 0-.34-.02-.52-.02s-.48.07-.73.34c-.24.27-.94.91-.94 2.22s.96 2.58 1.09 2.76c.14.18 1.88 2.88 4.56 4.04.64.27 1.13.43 1.52.55.64.2 1.22.18 1.68.11.51-.08 1.61-.66 1.84-1.29.22-.64.22-1.18.16-1.29-.07-.11-.25-.18-.52-.32z"/></svg>
    <span style="position: absolute; right: 64px; top: 50%; transform: translateY(-50%); background: #ffffff; color: #1a3266; padding: 6px 12px; border-radius: 12px; font-size: 14px; font-weight: 500; opacity: 0; pointer-events: none; transition: opacity 0.3s ease, transform 0.3s ease; box-shadow: 0 2px 8px rgba(0, 0, 0, 0.15);" onmouseover="this.style.opacity='1'; this.style.transform='translateY(-50%) translateX(-8px)';" onmouseout="this.style.opacity='0'; this.style.transform='translateY(-50%)';">Chat on WhatsApp</span>
</a>
<style>
@keyframes pulse {
    0% { transform: scale(1); }
    50% { transform: scale(1.05); }
    100% { transform: scale(1); }
}
</style>
<footer class="bg-gradient-to-br from-[#1a3266] to-[#2b8cc4] text-white py-12 mt-auto">
    <div class="max-w-7xl mx-auto px-6">
        <!-- Footer Top -->
        <div class="grid grid-cols-1 md:grid-cols-4 gap-8 mb-10">
            <!-- Brand Info -->
            <div class="space-y-4">
                <a href="/" class="relative group hover:scale-105 transition-transform duration-300 focus:outline-none focus:ring-2 focus:ring-[#36a3dc] rounded -ml-4" aria-label="Homepage">
                    <img src="/assets/logo/logoblack.png" alt="Dubai Cleanup & Maintenance Logo" class="w-40 h-auto">
                </a>
                <p class="text-sm leading-relaxed">Transforming spaces with world-class cleaning and maintenance services across Dubai since 2010.</p>
                <div class="flex space-x-4">
                    <a href="#" class="hover:bg-[#36a3dc] p-2 rounded-full transition-colors duration-300" aria-label="Twitter">
                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24"><path d="M24 4.6c-.9.4-1.8.7-2.8.8 1-.6 1.8-1.6 2.2-2.7-.9.6-2 1-3.1 1.2-1.9-2-5-2.6-7.6-.8-1.4 1-2.2 2.6-2.1 4.3-3.6-.2-6.9-1.9-9-4.7-.4.7-.6 1.5-.6 2.4 0 1.7.8 3.1 2.1 4-.8 0-1.6-.2-2.3-.6v.1c0 2.3 1.6 4.3 3.8 4.7-.7.2-1.4.3-2.1.3-.5 0-1 0-1.5-.1 1 3.2 3.9 5.5 7.3 5.6-2.7 2.1-6.1 3.3-9.8 3.3-.6 0-1.3 0-1.9-.1 3.5 2.3 7.7 3.6 12.2 3.6 14.6 0 22.6-12.1 22.6-22.6 0-.3 0-.7-.1-1 .6-.4 1.2-.9 1.7-1.5z"/></svg>
                    </a>
                    <a href="#" class="hover:bg-[#36a3dc] p-2 rounded-full transition-colors duration-300" aria-label="Facebook">
                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24"><path d="M22.5 0h-21C.7 0 0 .7 0 1.5v21C0 23.3.7 24 1.5 24h12v-9.4h-3.2v-3.6h3.2V8.3c0-3.2 1.9-4.9 4.8-4.9 1.4 0 2.6.1 2.9.2v3.4h-2c-1.6 0-1.9.8-1.9 1.9v2.5h3.8l-.5 3.6h-3.3V24h6.5c.8 0 1.5-.7 1.5-1.5v-21C24 .7 23.3 0 22.5 0z"/></svg>
                    </a>
                    <a href="#" class="hover:bg-[#36a3dc] p-2 rounded-full transition-colors duration-300" aria-label="LinkedIn">
                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24"><path d="M20.5 0h-17C1.7 0 0 1.7 0 3.5v17C0 22.3 1.7 24 3.5 24h17c1.8 0 3.5-1.7 3.5-3.5v-17C24 1.7 22.3 0 20.5 0zM7.6 20.4H4.8V9h2.8v11.4zM6.2 7.6c-.9 0-1.6-.7-1.6-1.6s.7-1.6 1.6-1.6 1.6.7 1.6 1.6-.7 1.6-1.6 1.6zm14.2 12.8h-2.8v-6.1c0-1.5-.5-2.5-1.8-2.5-1 0-1.6.7-1.9 1.3v7.3H10V9h2.7v1.5c.4-.6 1.1-1.4 2.7-1.4 2 0 3.5 1.3 3.5 4.1v7.2z"/></svg>
                    </a>
                    <a href="#" class="hover:bg-[#36a3dc] p-2 rounded-full transition-colors duration-300" aria-label="Instagram">
                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24"><path d="M12 0C8.7 0 8.3 0 7.1.1 5.8.2 4.8.4 4 .7c-.8.3-1.5.7-2.1 1.3C1.3 2.5.9 3.2.7 4c-.3.8-.5 1.8-.6 3C0 8.3 0 8.7 0 12s0 3.7.1 4.9c.1 1.3.3 2.3.6 3.1.3.8.7 1.5 1.3 2.1.6.6 1.3 1 2.1 1.3.8.3 1.8.5 3.1.6 1.2.1 1.6.1 4.9.1s3.7 0 4.9-.1c1.3-.1 2.3-.3 3.1-.6.8-.3 1.5-.7 2.1-1.3.6-.6 1-1.3 1.3-2.1.3-.8.5-1.8.6-3.1.1-1.2.1-1.6.1-4.9s0-3.7-.1-4.9c-.1-1.3-.3-2.3-.6-3.1-.3-.8-.7-1.5-1.3-2.1-.6-.6-1.3-1-2.1-1.3-.8-.3-1.8-.5-3.1-.6C15.7 0 15.3 0 12 0zm0 2.2c3.3 0 3.7 0 5 .1 1.2.1 1.8.2 2.2.4.6.2 1 .5 1.4.9.4.4.7.8.9 1.4.2.4.4 1 .4 2.2.1 1.3.1 1.7.1 5s0 3.7-.1 5c-.1 1.2-.2 1.8-.4 2.2-.2.6-.5 1-.9 1.4-.4.4-.8.7-1.4.9-.4.2-1 .4-2.2.4-1.3.1-1.7.1-5 .1s-3.7 0-5-.1c-1.2-.1-1.8-.2-2.2-.4-.6-.2-1-.5-1.4-.9-.4-.4-.7-.8-.9-1.4-.2-.4-.4-1-.4-2.2-.1-1.3-.1-1.7-.1-5s0-3.7.1-5c.1-1.2.2-1.8.4-2.2.2-.6.5-1 .9-1.4.4-.4.8-.7 1.4-.9.4-.2 1-.4 2.2-.4 1.3-.1 1.7-.1 5-.1zm0 3.7c-3.3 0-6 2.7-6 6s2.7 6 6 6 6-2.7 6-6-2.7-6-6-6zm0 10c-2.2 0-4-1.8-4-4s1.8-4 4-4 4 1.8 4 4-1.8 4-4 4zm6.2-10.5c-.8 0-1.4-.6-1.4-1.4s.6-1.4 1.4-1.4 1.4.6 1.4 1.4-.6 1.4-1.4 1.4z"/></svg>
                    </a>
                </div>
            </div>
            <!-- Quick Links -->
            <div>
                <h4 class="text-lg font-semibold mb-4">Quick Links</h4>
                <ul class="space-y-2 text-sm">
                    <li><a href="/terms" class="hover:text-[#36a3dc] transition-colors duration-300">Term & Conditions</a></li>
                    <li><a href="/services" class="hover:text-[#36a3dc] transition-colors duration-300">Services</a></li>
                    <li><a href="/about" class="hover:text-[#36a3dc] transition-colors duration-300">About Us</a></li>
                    <li><a href="/booking" class="hover:text-[#36a3dc] transition-colors duration-300">Book Now</a></li>
                    
                </ul>
            </div>
            <!-- Contact Info -->
            <div>
                <h4 class="text-lg font-semibold mb-4">Contact Us</h4>
                <ul class="space-y-2 text-sm">
                    <li class="flex items-center">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l9-6 9 6v12a2 2 0 01-2 2H5a2 2 0 01-2-2V8z"/></svg>
                        <span>Al Quoz Industrial Area, UAE</span>
                    </li>
                    <li class="flex items-center">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.3a1 1 0 01.7.3l3 3a1 1 0 010 1.4l-3 3a1 1 0 01-.7.3H5a2 2 0 01-2-2V5zm18 0a2 2 0 00-2-2h-3.3a1 1 0 00-.7.3l-3 3a1 1 0 000 1.4l3 3a1 1 0 00.7.3H19a2 2 0 002-2V5z"/></svg>
                        <a href="mailto:dubaicleanupcare@gmail.com" class="hover:text-[#36a3dc] transition-colors duration-300">dubaicleanupcare@gmail.com</a>
                    </li>
                    <li class="flex items-center">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5h12a2 2 0 012 2v12a2 2 0 01-2 2H3a2 2 0 01-2-2V7a2 2 0 012-2zm9 4l4 4-4 4m-4-4h8"/></svg>
                        <a href="tel:+971123456789" class="hover:text-[#36a3dc] transition-colors duration-300">+971 12 345 6789</a>
                    </li>
                </ul>
            </div>
            <!-- Newsletter Signup -->
            <div>
                <h4 class="text-lg font-semibold mb-4">Stay Updated</h4>
                <p class="text-sm mb-4">Subscribe to our newsletter for the latest tips and offers.</p>
                <form action="/newsletter" method="POST" class="flex flex-col space-y-3">
                    @csrf
                    <input type="email" name="email" placeholder="Your Email" class="px-4 py-2 rounded-lg bg-white/10 border border-white/20 text-white placeholder-gray-300 focus:outline-none focus:ring-2 focus:ring-[#36a3dc] transition-colors duration-300" required>
                    <button type="submit" class="bg-[#36a3dc] hover:bg-[#2b8cc4] text-white font-semibold py-2 rounded-lg transition-all duration-300">Subscribe</button>
                </form>
            </div>
        </div>
        <!-- Footer Bottom -->
        <div class="border-t border-white/20 pt-6 text-center">
            <p class="text-sm">© {{ date('Y') }} Dubai Cleanup & Maintenance. All rights reserved.</p>
            <div class="mt-2 space-x-4 text-sm">
                <a href="/privacy" class="hover:text-[#36a3dc] transition-colors duration-300">Privacy Policy</a>
                <span>|</span>
                <a href="/terms" class="hover:text-[#36a3dc] transition-colors duration-300">Terms of Service</a>
            </div>
        </div>
    </div>
</footer>
    <!-- Scripts Section -->
    <script src="{{ asset('js/nav.js') }}"></script>
    @yield('scripts')
    
</body>
</html>
