@extends('layouts.master')

@section('title', 'Our Services | Dubai Cleanup & Maintenance')
@section('head')
    <link rel="canonical" href="https://www.dubaicleanupcare.com/services" />
@endsection
@section('full-width-content')
    <section class="relative bg-gradient-to-b from-[#f8fafc] to-[#f1f5f9] overflow-hidden" role="region" aria-label="Services Page">
        <!-- Hero Banner with Crystal Text Effect -->
        <div class="relative bg-gradient-to-r from-[#203e78] to-[#36a3dc] text-white py-28 px-4 sm:px-6 lg:px-8 mb-16">
            <style>
                @keyframes gradientShift {
                    0% { background-position: 0% 50%; }
                    50% { background-position: 100% 50%; }
                    100% { background-position: 0% 50%; }
                }
                .gradient-hero {
                    /* background: linear-gradient(90deg, #203e78, #36a3dc, #203e78); */
                    background-size: 200% 200%;
                    animation: gradientShift 15s ease infinite;
                }
                @keyframes orbitParticle {
                    0% { transform: translate(0, 0) scale(1); opacity: 0.8; }
                    50% { transform: translate(30px, -20px) scale(1.2); opacity: 0.4; }
                    100% { transform: translate(0, 0) scale(1); opacity: 0.8; }
                }
                .particle {
                    position: absolute;
                    background: rgba(255, 255, 255, 0.4);
                    border-radius: 50%;
                    animation: orbitParticle linear infinite;
                }
                @keyframes textCrystal {
                    0% { opacity: 0; transform: translateY(20px); }
                    100% { opacity: 1; transform: translateY(0); }
                }
                .crystal-text {
                    background: rgba(255, 255, 255, 0.1);
                    backdrop-filter: blur(4px);
                    border: 1px solid rgba(255, 255, 255, 0.2);
                    padding: 2px 8px;
                    border-radius: 4px;
                    text-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
                    transition: transform 0.3s ease, box-shadow 0.3s ease;
                    animation: textCrystal 0.8s ease-out forwards;
                }
                .crystal-text:hover {
                    transform: scale(1.05);
                    box-shadow: 0 0 15px rgba(54, 163, 220, 0.6);
                }
                @media (prefers-reduced-motion: reduce) {
                    .gradient-hero { animation: none; }
                    .particle { animation: none; }
                    .crystal-text { animation: none; opacity: 1; transform: none; }
                }
            </style>
            <div class="absolute inset-0 opacity-20">
                <svg class="w-full h-full" viewBox="0 0 1440 320" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path fill="#ffffff" fill-opacity="0.3" d="M0,192L48,181.3C96,171,192,149,288,154.7C384,160,480,192,576,202.7C672,213,768,202,864,186.7C960,171,1056,149,1152,144C1248,139,1344,149,1392,154.7L1440,160L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path>
                </svg>
                <!-- Orbiting Particles -->
                <div class="particle w-2 h-2 top-12 left-16" style="animation-duration: 5s;"></div>
                <div class="particle w-3 h-3 top-36 right-24" style="animation-duration: 6s; animation-delay: 1s;"></div>
                <div class="particle w-2 h-2 bottom-16 left-40" style="animation-duration: 4s; animation-delay: 2s;"></div>
                <div class="particle w-3 h-3 top-20 right-48" style="animation-duration: 7s; animation-delay: 3s;"></div>
                <div class="particle w-2 h-2 bottom-24 left-64" style="animation-duration: 5s; animation-delay: 4s;"></div>
            </div>
            <div class="relative max-w-7xl mx-auto text-center gradient-hero" role="banner" aria-label="Service Hero">
                <h2 class="text-5xl md:text-6xl font-bold animate-fade-in-up text-shadow-lg">Premium Services for a Spotless Space</h2>
                <div class="mt-6 text-3xl md:text-4xl text-gray-100 max-w-4xl mx-auto flex justify-center flex-wrap gap-2">
                    <span class="crystal-text font-semibold" style="animation-delay: 0.2s;">Expert</span>
                    <span class="crystal-text font-semibold text-[#36a3dc]" style="animation-delay: 0.4s;">Cleaning & Maintenance</span>
                    <span class="crystal-text font-semibold" style="animation-delay: 0.6s;">for Dubai</span>
                </div>
                <p class="mt-4 text-lg text-gray-200 max-w-2xl mx-auto animate-fade-in-up" style="animation-delay: 0.8s;">World-class solutions tailored for your home or business.</p>
                <a href="/booking" class="gradient-btn inline-block mt-8 px-10 py-4 text-white font-semibold text-lg rounded-full shadow-lg focus:outline-none focus:ring-2 focus:ring-white transition-all duration-300 hover:scale-105 animate-pulse" aria-label="Book a Service">Book Now</a>
            </div>
        </div>

        <!-- Main Content -->
        <div class="py-16 px-4 sm:px-6 lg:px-8 relative max-w-7xl mx-auto">
            <!-- Background Wave with Parallax -->
            <div class="absolute inset-0 opacity-10 pointer-events-none parallax" data-speed="0.5">
                <svg class="w-full h-full" viewBox="0 0 1440 320" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path fill="#36a3dc" fill-opacity="0.2" d="M0,192L48,181.3C96,171,192,149,288,154.7C384,160,480,192,576,202.7C672,213,768,202,864,186.7C960,171,1056,149,1152,144C1248,139,1344,149,1392,154.7L1440,160L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path>
                </svg>
            </div>

            <!-- Search and Filtering -->
            <div class="mb-12">
                <div class="relative max-w-md mx-auto mb-6">
                    <input type="text" id="serviceSearch" class="w-full px-4 py-3 rounded-full shadow-md border border-gray-300 focus:outline-none focus:ring-2 focus:ring-[#36a3dc] transition-all duration-300" placeholder="Search services..." oninput="searchServices()">
                    <svg class="absolute right-4 top-1/2 transform -translate-y-1/2 w-5 h-5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                </div>
                <div class="flex justify-center space-x-4" role="tablist">
                    <button id="allTab" class="px-8 py-3 text-lg font-semibold text-[#203e78] bg-white rounded-full shadow-md hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-[#36a3dc] transition-all duration-300 active" role="tab" aria-selected="true" aria-controls="all-panel" onclick="filterServices('all')">All Services</button>
                    <button id="cleaningTab" class="px-8 py-3 text-lg font-semibold text-[#203e78] bg-white rounded-full shadow-md hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-[#36a3dc] transition-all duration-300" role="tab" aria-selected="false" aria-controls="cleaning-panel" onclick="filterServices('cleaning')">Cleaning</button>
                    <button id="maintenanceTab" class="px-8 py-3 text-lg font-semibold text-[#203e78] bg-white rounded-full shadow-md hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-[#36a3dc] transition-all duration-300" role="tab" aria-selected="false" aria-controls="maintenance-panel" onclick="filterServices('maintenance')">Maintenance</button>
                </div>
            </div>

            <!-- Services Grid with Shimmer Loader -->
            <div id="servicesGrid" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 animate-fade-in-up relative" style="animation-delay: 0.4s;">
                <div id="shimmerLoader" class="hidden absolute inset-0 bg-gray-200 animate-pulse rounded-2xl"></div>
                @foreach($services as $service)
                    <a href="/services/{{ $service->id }}" class="service-card {{ $service->type === 'Cleaning' ? 'cleaning' : 'maintenance' }} bg-white rounded-2xl shadow-lg overflow-hidden transform transition-all duration-500" data-tilt style="animation-delay: {{ $loop->index * 0.1 }}s;">
                        <div class="relative h-80">
                            @if($service->image)
                                <img src="/storage/{{ $service->image }}" class="w-full h-full object-cover" alt="{{ $service->title }}">
                            @else
                                <div class="w-full h-full flex items-center justify-center bg-gradient-to-br from-[#36a3dc] to-[#203e78]">
                                    <svg class="w-16 h-16 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                    </svg>
                                </div>
                            @endif
                            <div class="absolute inset-0 bg-black bg-opacity-0 hover:bg-opacity-40 transition-opacity duration-300 flex items-center justify-center opacity-0 hover:opacity-100">
                                <div class="text-center text-white">
                                    <span class="font-semibold text-lg">Explore {{ $service->title }}</span>
                                </div>
                            </div>
                        </div>
                        <div class="p-6">
                            <h4 class="text-xl font-semibold text-[#203e78] mb-2">{{ $service->title }}</h4>
                            <p class="text-gray-600 text-sm" style="line-height: 1.6;">{{ Str::limit($service->description, 100) }}</p>
                        </div>
                    </a>
                @endforeach
            </div>

            <!-- Features Showcase -->
            <div class="mt-20 mb-16">
                <h3 class="text-3xl md:text-4xl font-bold text-[#203e78] text-center mb-10 animate-fade-in-up">Why Choose Us?</h3>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
                    <div class="bg-white rounded-xl shadow-lg p-6 text-center animate-fade-in-up" style="animation-delay: 0.2s;">
                        <svg class="w-12 h-12 text-[#36a3dc] mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                        <h4 class="text-lg font-semibold text-[#203e78] mb-2">Eco-Friendly Solutions</h4>
                        <p class="text-gray-600 text-sm">Sustainable, non-toxic products for a safe, clean space.</p>
                    </div>
                    <div class="bg-white rounded-xl shadow-lg p-6 text-center animate-fade-in-up" style="animation-delay: 0.4s;">
                        <svg class="w-12 h-12 text-[#36a3dc] mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <h4 class="text-lg font-semibold text-[#203e78] mb-2">On-Time Delivery</h4>
                        <p class="text-gray-600 text-sm">Prompt service without compromising quality.</p>
                    </div>
                    <div class="bg-white rounded-xl shadow-lg p-6 text-center animate-fade-in-up" style="animation-delay: 0.6s;">
                        <svg class="w-12 h-12 text-[#36a3dc] mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 005.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                        </svg>
                        <h4 class="text-lg font-semibold text-[#203e78] mb-2">Certified Professionals</h4>
                        <p class="text-gray-600 text-sm">Skilled team delivering exceptional results.</p>
                    </div>
                    <div class="bg-white rounded-xl shadow-lg p-6 text-center animate-fade-in-up" style="animation-delay: 0.8s;">
                        <svg class="w-12 h-12 text-[#36a3dc] mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                        </svg>
                        <h4 class="text-lg font-semibold text-[#203e78] mb-2">Tailored Services</h4>
                        <p class="text-gray-600 text-sm">Customized solutions for your unique needs.</p>
                    </div>
                </div>
            </div>

            <!-- Personalized Recommendations -->
            <div class="mt-20 mb-16">
                <h3 class="text-3xl md:text-4xl font-bold text-[#203e78] text-center mb-10 animate-fade-in-up">Recommended for You</h3>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach($services->shuffle()->take(3) as $service)
                        <a href="/services/{{ $service->id }}" class="bg-white rounded-xl shadow-lg overflow-hidden transform hover:scale-105 hover:shadow-2xl transition-all duration-500 animate-fade-in-up" style="animation-delay: {{ $loop->index * 0.2 }}s;">
                            <div class="relative h-64">
                                @if($service->image)
                                    <img src="/storage/{{ $service->image }}" class="w-full h-full object-cover" alt="{{ $service->title }}">
                                @else
                                    <div class="w-full h-full flex items-center justify-center bg-gradient-to-br from-[#36a3dc] to-[#203e78]">
                                        <svg class="w-12 h-12 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                        </svg>
                                    </div>
                                @endif
                                <div class="absolute inset-0 bg-black bg-opacity-0 hover:bg-opacity-30 transition-opacity duration-300 flex items-center justify-center opacity-0 hover:opacity-100">
                                    <span class="text-white font-semibold">Learn More</span>
                                </div>
                            </div>
                            <div class="p-6">
                                <h4 class="text-xl font-semibold text-[#203e78] mb-2">{{ $service->title }}</h4>
                                <p class="text-gray-600 text-sm" style="line-height: 1.6;">{{ Str::limit($service->description, 80) }}</p>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>

            <!-- FAQ Accordion with Progress -->
            <div class="mt-20 mb-16">
                <h3 class="text-3xl md:text-4xl font-bold text-[#203e78] text-center mb-10 animate-fade-in-up">Frequently Asked Questions</h3>
                <div class="max-w-3xl mx-auto">
                    <div class="accordion-item bg-white rounded-xl shadow-lg mb-4 overflow-hidden">
                        <button class="accordion-toggle w-full px-6 py-4 text-left text-lg font-semibold text-[#203e78] flex justify-between items-center focus:outline-none" onclick="toggleAccordion(this)">
                            <span>How do I book a service?</span>
                            <svg class="w-6 h-6 transform transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                            </svg>
                        </button>
                        <div class="accordion-content hidden px-6 pb-4 text-gray-600">
                            <p>Click "Book Now," fill out the form, and select your time slot. Our team will confirm promptly.</p>
                        </div>
                    </div>
                    <div class="accordion-item bg-white rounded-xl shadow-lg mb-4 overflow-hidden">
                        <button class="accordion-toggle w-full px-6 py-4 text-left text-lg font-semibold text-[#203e78] flex justify-between items-center focus:outline-none" onclick="toggleAccordion(this)">
                            <span>Are your cleaning products safe?</span>
                            <svg class="w-6 h-6 transform transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                            </svg>
                        </button>
                        <div class="accordion-content hidden px-6 pb-4 text-gray-600">
                            <p>We use eco-friendly, non-toxic products safe for families, pets, and the environment.</p>
                        </div>
                    </div>
                    <div class="accordion-item bg-white rounded-xl shadow-lg mb-4 overflow-hidden">
                        <button class="accordion-toggle w-full px-6 py-4 text-left text-lg font-semibold text-[#203e78] flex justify-between items-center focus:outline-none" onclick="toggleAccordion(this)">
                            <span>What areas do you serve?</span>
                            <svg class="w-6 h-6 transform transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                            </svg>
                        </button>
                        <div class="accordion-content hidden px-6 pb-4 text-gray-600">
                            <p>We serve Dubai Marina, JBR, Downtown Dubai, and more. Contact us for your location.</p>
                        </div>
                    </div>
                    <div class="accordion-item bg-white rounded-xl shadow-lg mb-4 overflow-hidden">
                        <button class="accordion-toggle w-full px-6 py-4 text-left text-lg font-semibold text-[#203e78] flex justify-between items-center focus:outline-none" onclick="toggleAccordion(this)">
                            <span>What’s included in a deep clean?</span>
                            <svg class="w-6 h-6 transform transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                            </svg>
                        </button>
                        <div class="accordion-content hidden px-6 pb-4 text-gray-600">
                            <p>Our deep clean includes thorough cleaning of all surfaces, appliances, and hard-to-reach areas.</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- CTA Banner -->
            <div class="bg-gradient-to-r from-[#203e78] to-[#36a3dc] text-white py-16 px-8 rounded-2xl shadow-xl text-center animate-fade-in-up mb-16">
                <h3 class="text-3xl md:text-4xl font-bold mb-6">Ready to Experience a Spotless Space?</h3>
                <p class="text-lg mb-8 max-w-2xl mx-auto">Our expert team delivers premium cleaning and maintenance tailored to your needs.</p>
                <a href="/booking" class="gradient-btn inline-block px-10 py-4 text-white font-semibold text-lg rounded-full shadow-lg focus:outline-none focus:ring-2 focus:ring-white transition-all duration-300 animate-pulse">Book Your Service Today</a>
            </div>
        </div>
    </section>
@endsection

@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/vanilla-tilt@1.7.2/dist/vanilla-tilt.min.js"></script>
    <script>
        // Parallax Effect
        window.addEventListener('scroll', () => {
            const parallax = document.querySelector('.parallax');
            const offset = window.pageYOffset;
            parallax.style.transform = `translateY(${offset * 0.5}px)`;
        });

        // Filter and Search Services
        function filterServices(type) {
            const cards = document.querySelectorAll('.service-card');
            const tabs = document.querySelectorAll('[role="tab"]');
            const shimmer = document.getElementById('shimmerLoader');
            shimmer.classList.remove('hidden');
            setTimeout(() => {
                shimmer.classList.add('hidden');
                tabs.forEach(tab => {
                    tab.classList.remove('active');
                    if (tab.id === `${type}Tab` || (type === 'all' && tab.id === 'allTab')) {
                        tab.classList.add('active');
                    }
                });
                cards.forEach(card => {
                    card.classList.add('opacity-0', 'translate-y-4');
                    setTimeout(() => {
                        card.style.display = 'none';
                        if (type === 'all' || card.classList.contains(type)) {
                            if (!document.getElementById('serviceSearch').value || card.querySelector('h4').textContent.toLowerCase().includes(document.getElementById('serviceSearch').value.toLowerCase())) {
                                card.style.display = 'block';
                                card.classList.remove('opacity-0', 'translate-y-4');
                                card.classList.add('opacity-100', 'translate-y-0');
                            }
                        }
                    }, 200);
                });
            }, 300);
        }

        function searchServices() {
            const searchValue = document.getElementById('serviceSearch').value.toLowerCase();
            const cards = document.querySelectorAll('.service-card');
            const shimmer = document.getElementById('shimmerLoader');
            shimmer.classList.remove('hidden');
            setTimeout(() => {
                shimmer.classList.add('hidden');
                cards.forEach(card => {
                    card.classList.add('opacity-0', 'translate-y-4');
                    setTimeout(() => {
                        card.style.display = 'none';
                        const title = card.querySelector('h4').textContent.toLowerCase();
                        const type = card.classList.contains('cleaning') ? 'cleaning' : 'maintenance';
                        const activeTab = document.querySelector('.active').id.replace('Tab', '');
                        if (title.includes(searchValue) && (activeTab === 'all' || activeTab === type)) {
                            card.style.display = 'block';
                            card.classList.remove('opacity-0', 'translate-y-4');
                            card.classList.add('opacity-100', 'translate-y-0');
                        }
                    }, 200);
                });
            }, 300);
        }

        // Accordion Toggle
        function toggleAccordion(button) {
            const content = button.nextElementSibling;
            const icon = button.querySelector('svg');
            const isOpen = !content.classList.contains('hidden');
            document.querySelectorAll('.accordion-content').forEach(item => {
                item.classList.add('hidden');
                item.previousElementSibling.querySelector('svg').classList.remove('rotate-180');
            });
            if (!isOpen) {
                content.classList.remove('hidden');
                icon.classList.add('rotate-180');
            }
        }

        // 3D Tilt Effect
        VanillaTilt.init(document.querySelectorAll('[data-tilt]'), {
            max: 15,
            speed: 400,
            glare: true,
            'max-glare': 0.3
        });

        // Initialize
        document.addEventListener('DOMContentLoaded', () => {
            filterServices('all');
        });
    </script>
    <style>
        .active {
            background-color: #36a3dc;
            color: white;
        }
        .active:hover {
            background-color: #2b8cc4;
        }
        .service-card {
            transition: opacity 0.3s ease, transform 0.3s ease;
        }
        .accordion-content {
            transition: max-height 0.3s ease;
        }
        [data-tilt] {
            transform-style: preserve-3d;
        }
        [data-tilt]:hover {
            border: 2px solid #36a3dc;
            box-shadow: 0 0 15px rgba(54, 163, 220, 0.5);
        }
    </style>
@endsection