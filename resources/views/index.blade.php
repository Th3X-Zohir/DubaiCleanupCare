@extends('layouts.master')

@section('title', 'Home - Dubai Cleanup & Maintenance')

@section('full-width-content')
<!-- Hero Section -->
<!-- Hero Section -->
<section class="relative bg-gradient-to-br from-[#1a3266] to-[#2b8cc4] text-white py-52 px-4 sm:px-6 lg:px-8 mb-16 overflow-hidden" role="region" aria-label="Hero Section">
    <!-- Inline CSS for Swiper and Custom Styles -->
    <style>
        @keyframes slideIn {
            from { transform: translateY(20px); opacity: 0; }
            to { transform: translateY(0); opacity: 1; }
        }
        @keyframes pulse {
            0% { transform: scale(1); }
            50% { transform: scale(1.05); }
            100% { transform: scale(1); }
        }
        .swiper-container {
            width: 100%;
            height: 100%;
            position: absolute;
            top: 0;
            left: 0;
            z-index: 1;
        }
        .swiper-wrapper {
            display: flex;
        }
        .swiper-slide {
            flex-shrink: 0;
            width: 100%;
            height: 100%;
            position: relative;
            transition: opacity 0.7s ease, transform 0.7s ease;
        }
        .swiper-slide div {
            width: 100%;
            height: 100%;
            min-height: 800px;
            background-size: cover;
            background-position: center;
            position: relative;
            overflow: hidden;
        }
        .swiper-slide div::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(to bottom, rgba(0, 0, 0, 0.3), rgba(0, 0, 0, 0.5));
            z-index: 2;
        }
        .swiper-pagination {
            position: absolute;
            bottom: 2.5rem;
            left: 50%;
            transform: translateX(-50%);
            z-index: 10;
            display: flex;
            gap: 8px;
        }
        .swiper-pagination-bullet {
            background: rgba(255, 255, 255, 0.6);
            width: 10px;
            height: 10px;
            border-radius: 50%;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
        }
        .swiper-pagination-bullet-active {
            background: #ffffff;
            width: 14px;
            height: 14px;
            transform: scale(1.1);
        }
        .swiper-pagination-bullet:hover {
            background: rgba(255, 255, 255, 0.9);
        }
        .gradient-btn {
            background: linear-gradient(90deg, #2b8cc4, #36a3dc);
            transition: all 0.3s ease;
        }
        .gradient-btn:hover {
            background: linear-gradient(90deg, #36a3dc, #2b8cc4);
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.3);
        }
        .secondary-btn {
            background: transparent;
            border: 2px solid #ffffff;
            transition: all 0.3s ease;
        }
        .secondary-btn:hover {
            background: #ffffff;
            color: #1a3266;
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.3);
        }
        .animate-slide-in {
            animation: slideIn 1.2s ease-out forwards;
        }
        .content-container {
            opacity: 0;
            animation: slideIn 1s ease-out 0.5s forwards;
        }
    </style>

    <!-- Swiper Slider -->
    <div class="swiper-container">
        <div class="swiper-wrapper">
            @forelse($sliders as $slider)
                <div class="swiper-slide" data-title="{{ $slider->title }}" data-description="{{ $slider->short_description }}">
                    <div class="bg-[url('{{ asset('storage/' . $slider->image_path) }}')] opacity-85" style="min-height: 800px;" alt="{{ $slider->title }}"></div>
                </div>
            @empty
                <div class="swiper-slide">
                    <div class="bg-gradient-to-br from-[#1a3266]/60 to-[#2b8cc4]/60 opacity-40" style="min-height: 800px;" alt="No slider images available"></div>
                </div>
            @endforelse
        </div>
        <!-- Pagination Dots -->
        <div class="swiper-pagination"></div>
    </div>

    <!-- Content -->
    <div class="relative max-w-7xl mx-auto text-center content-container" style="z-index: 10;">
        <h2 id="slider-title" class="text-3xl sm:text-4xl md:text-5xl font-extrabold tracking-tight animate-slide-in" style="font-family: 'Inter', sans-serif; text-shadow: 0 2px 8px rgba(0, 0, 0, 0.3);">{{ $sliders->first()->title ?? '7000+ Homes Sparkling Clean' }}</h2>
        <p id="slider-description" class="mt-6 text-xl md:text-2xl text-gray-100 max-w-3xl mx-auto animate-slide-in" style="font-family: 'Inter', sans-serif; line-height: 1.8; animation-delay: 0.2s;">{{ $sliders->first()->short_description ?? 'Transforming spaces in Dubai Marina, JBR, and beyond with world-class cleaning and maintenance.' }}</p>
        <div class="mt-10 flex justify-center gap-6 animate-slide-in" style="animation-delay: 0.4s;">
            <a href="/booking" class="gradient-btn inline-block px-10 py-4 rounded-xl text-white font-semibold text-lg tracking-wide animate-pulse" style="font-family: 'Inter', sans-serif; box-shadow: 0 4px 15px rgba(0, 0, 0, 0.3);">Book Now</a>
            <a href="#services" class="secondary-btn inline-block px-10 py-4 rounded-xl text-white font-semibold text-lg tracking-wide" style="font-family: 'Inter', sans-serif; box-shadow: 0 4px 15px rgba(0, 0, 0, 0.3);">Learn More</a>
        </div>
    </div>

    <!-- Swiper JS and Initialization -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const swiper = new Swiper('.swiper-container', {
                loop: {{ $sliders->count() > 1 ? 'true' : 'false' }},
                autoplay: {
                    delay: 4000,
                    disableOnInteraction: false,
                },
                pagination: {
                    el: '.swiper-pagination',
                    clickable: true,
                    bulletClass: 'swiper-pagination-bullet',
                    bulletActiveClass: 'swiper-pagination-bullet-active',
                },
                effect: 'fade',
                fadeEffect: {
                    crossFade: true,
                },
                on: {
                    slideChange: function () {
                        const activeSlide = this.slides[this.activeIndex];
                        const title = activeSlide.getAttribute('data-title') || '{{ $sliders->first()->title ?? '5000+ Homes Sparkling Clean' }}';
                        const description = activeSlide.getAttribute('data-description') || '{{ $sliders->first()->short_description ?? 'Transforming spaces in Dubai Marina, JBR, and beyond with world-class cleaning and maintenance.' }}';
                        document.getElementById('slider-title').textContent = title;
                        document.getElementById('slider-description').textContent = description;
                    },
                },
            });

            // Initialize with first slide content
            const initialSlide = swiper.slides[0];
            if (initialSlide) {
                document.getElementById('slider-title').textContent = initialSlide.getAttribute('data-title') || '{{ $sliders->first()->title ?? '5000+ Homes Sparkling Clean' }}';
                document.getElementById('slider-description').textContent = initialSlide.getAttribute('data-description') || '{{ $sliders->first()->short_description ?? 'Transforming spaces in Dubai Marina, JBR, and beyond with world-class cleaning and maintenance.' }}';
            }
        });
    </script>
</section>

    <!-- <div class="h-px bg-gradient-to-r from-transparent via-[#e2e8f0] to-transparent mb-12"></div>


 
    <div class="h-px bg-gradient-to-r from-transparent via-[#e2e8f0] to-transparent mb-12"></div> -->

    <!-- Services Grid -->
    <section class="px-4 sm:px-6 lg:px-8 mb-12 relative bg-gradient-to-b from-[#f8fafc] to-[#f1f5f9] overflow-hidden" role="region" aria-label="Services Section" id="services">
    <!-- Background Wave -->
    <div class="absolute inset-0 opacity-10 pointer-events-none">
        <svg class="w-full h-full" viewBox="0 0 1440 320" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path fill="#36a3dc" fill-opacity="0.2" d="M0,192L48,181.3C96,171,192,149,288,154.7C384,160,480,192,576,202.7C672,213,768,202,864,186.7C960,171,1056,149,1152,144C1248,139,1344,149,1392,154.7L1440,160L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path>
        </svg>
    </div>
    <div class="relative max-w-[1600px] mx-auto">
        <h3 class="text-4xl md:text-5xl font-bold text-center text-[#203e78] mb-4 animate-fade-in-up">Our Premium Services</h3>
        <p class="text-lg text-gray-600 text-center max-w-2xl mx-auto mb-8 animate-fade-in-up" style="animation-delay: 0.2s;">Discover our world-class cleaning and maintenance solutions tailored for Dubai’s finest homes and businesses.</p>
        <!-- Search Bar -->
        <div class="relative max-w-md mx-auto mb-8">
            <input type="text" id="serviceSearch" class="w-full px-4 py-3 rounded-full shadow-md border border-gray-300 focus:outline-none focus:ring-2 focus:ring-[#36a3dc] transition-all duration-300" placeholder="Search services..." oninput="searchServices()">
            <svg class="absolute right-4 top-1/2 transform -translate-y-1/2 w-5 h-5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
            </svg>
        </div>
        <!-- Tabs -->
        <div class="flex justify-center mb-8 space-x-4" role="tablist">
            <button id="cleaningTab" class="px-8 py-3 text-lg font-semibold text-[#203e78] bg-white rounded-full shadow-md hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-[#36a3dc] transition-all duration-300" role="tab" aria-selected="true" aria-controls="cleaning-panel">Cleaning</button>
            <button id="maintenanceTab" class="px-8 py-3 text-lg font-semibold text-[#203e78] bg-white rounded-full shadow-md hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-[#36a3dc] transition-all duration-300" role="tab" aria-selected="false" aria-controls="maintenance-panel">Maintenance</button>
        </div>
        <!-- Services Grid -->
        <div id="servicesGrid" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 animate-fade-in-up" style="animation-delay: 0.4s;">
            @foreach($services as $service)
                <a href="/services/{{ $service->id }}" class="service-card {{ $service->type === 'Cleaning' ? 'cleaning' : 'maintenance' }} bg-white rounded-2xl shadow-lg overflow-hidden transform hover:scale-105 hover:shadow-2xl transition-all duration-500 {{ $service->type !== 'Cleaning' ? 'hidden' : '' }} w-full block" style="animation-delay: {{ $loop->index * 0.1 }}s;" data-title="{{ $service->title }}" data-description="{{ $service->description }}">
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
                        <div class="absolute inset-0 bg-black bg-opacity-0 hover:bg-opacity-30 transition-opacity duration-300 flex items-center justify-center opacity-0 hover:opacity-100">
                            <span class="text-white font-semibold">Learn More</span>
                        </div>
                    </div>
                    <div class="p-6">
                        <h4 class="text-xl font-semibold text-[#203e78] mb-2">{{ $service->title }}</h4>
                        <p class="text-gray-600 text-sm" style="line-height: 1.6;">{{ Str::limit($service->description, 80) }}</p>
                        <span class="inline-block mt-4 px-4 py-2 bg-[#36a3dc] text-white font-semibold text-sm rounded-lg hover:bg-[#2b8cc4] transition-all duration-300">View Details</span>
                    </div>
                </a>
            @endforeach
        </div>
        <div class="text-center mt-12">
            <a href="/services" class="inline-block px-8 py-4 bg-[#36a3dc] text-white font-semibold text-lg rounded-full shadow-lg hover:bg-[#2b8cc4] hover:scale-105 focus:outline-none focus:ring-2 focus:ring-[#36a3dc] transition-all duration-300 animate-pulse">View All Services</a>
        </div>
    </div>
</section>

        <!-- Tagline + CTA Block -->
    <section class="text-center py-16 px-4 sm:px-6 lg:px-8 mb-12 bg-[#f8fafc]" role="region" aria-label="Tagline Section">
        <h3 class="text-3xl md:text-4xl font-bold text-[#203e78] mb-4">Your Trusted Partner for a Spotless Future</h3>
        <p class="text-lg text-gray-600 max-w-3xl mx-auto" style="line-height: 1.6;">Book top-tier cleaning and maintenance services with ease across Dubai.</p>
        <a href="/booking" class="gradient-btn inline-block mt-6 px-8 py-3 rounded-lg text-white font-semibold text-lg hover:scale-105 transition-transform duration-300" style="background: radial-gradient(circle, #36a3dc, #203e78); min-height: 48px;">Get Started Now</a>
    </section>

    
    <section class="py-16 px-4 sm:px-6 lg:px-8 mb-12 bg-[#f8fafc]" role="region" aria-label="Features Section">
        <h3 class="text-3xl md:text-4xl font-bold text-center text-[#203e78] mb-8">Why Choose Us?</h3>
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 max-w-7xl mx-auto">
            @foreach([
                ['title' => 'Expert Team', 'items' => ['Certified professionals with years of experience.', 'Trained to handle any cleaning or maintenance challenge.', 'Committed to delivering exceptional results.'], 'icon' => 'M12 14l9-5-9-5-9 5 9 5z'],
                ['title' => 'Eco-Friendly Solutions', 'items' => ['Green cleaning products safe for your family.', 'Sustainable practices to protect the environment.', 'Effective results without harmful chemicals.'], 'icon' => 'M4 8h4v4H4zM8 4h4v4H8zM12 8h4v4h-4zM8 12h4v4H8z'],
                ['title' => 'Flexible Scheduling', 'items' => ['Book services at your convenience.', 'Same-day appointments available.', '24/7 customer support for urgent needs.'], 'icon' => 'M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z'],
                ['title' => 'Affordable Pricing', 'items' => ['Transparent pricing with no hidden fees.', 'Customized plans to fit your budget.', 'High-quality service at competitive rates.'], 'icon' => 'M12 8c-2.2 0-4 1.8-4 4s1.8 4 4 4 4-1.8 4-4-1.8-4-4-4z']
            ] as $feature)
                <div class="bg-white p-6 rounded-lg shadow-md hover:shadow-xl hover:scale-105 transition-all duration-300" style="background: linear-gradient(145deg, #ffffff, #f1f5f9);">
                    <h4 class="text-xl font-semibold text-[#203e78] mb-4 flex items-center">
                        <svg class="w-6 h-6 text-[#36a3dc] mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $feature['icon'] }}" />
                        </svg>
                        {{ $feature['title'] }}
                    </h4>
                    <ul class="text-gray-600 list-none space-y-2">
                        @foreach($feature['items'] as $item)
                            <li class="flex items-start">
                                <svg class="w-5 h-5 text-[#36a3dc] mr-2 mt-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                </svg>
                                <span style="line-height: 1.6;">{{ $item }}</span>
                            </li>
                        @endforeach
                    </ul>
                </div>
            @endforeach
        </div>
    </section>

    <!-- Divider -->
    <div class="h-px bg-gradient-to-r from-transparent via-[#e2e8f0] to-transparent mb-12"></div>

    <!-- Testimonials -->
<!-- Testimonials -->
    
    <!-- Back to Top Button -->
<button id="back-to-top" class="fixed right-8 bg-[#36a3dc] text-white p-3 rounded-full shadow-lg hover:bg-[#203e78] transition-colors duration-300 md:hidden" aria-label="Back to Top" style="bottom: 80px;">
    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18"/>
    </svg>
</button>
    <!-- Quick Quote Widget (Sticky Bottom Bar on Mobile) -->
    <!-- <div class="fixed bottom-0 left-0 right-0 bg-[#203e78] text-white p-4 md:hidden">
        <div class="max-w-7xl mx-auto flex justify-between items-center">
            <span class="text-lg font-semibold">Need a Quick Quote?</span>
            <a href="/booking" class="gradient-btn px-6 py-2 rounded-lg text-white font-semibold hover:scale-105 transition-transform duration-300" style="background: radial-gradient(circle, #36a3dc, #203e78);">Get Quote</a>
        </div>
    </div> -->
@endsection

@section('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            // Tab Switching Logic
            const cleaningTab = document.querySelector('#cleaningTab');
            const maintenanceTab = document.querySelector('#maintenanceTab');
            const serviceCards = document.querySelectorAll('.service-card');

            // Debug logs
            console.log('Tab-switching script initialized at:', new Date().toISOString());
            console.log('Cleaning tab found:', !!cleaningTab);
            console.log('Maintenance tab found:', !!maintenanceTab);
            console.log('Service cards found:', serviceCards.length);
            serviceCards.forEach((card, index) => {
                console.log(`Card ${index} classes:`, card.classList.toString());
            });

            if (!cleaningTab || !maintenanceTab) {
                console.error('Tabs not found. Check IDs #cleaningTab and #maintenanceTab');
                return;
            }

            const showCleaningServices = () => {
                console.log('Cleaning tab clicked at:', new Date().toISOString());
                cleaningTab.classList.add('active-tab');
                cleaningTab.setAttribute('aria-selected', 'true');
                maintenanceTab.classList.remove('active-tab');
                maintenanceTab.setAttribute('aria-selected', 'false');
                serviceCards.forEach((card, index) => {
                    card.style.display = card.classList.contains('cleaning') ? 'block' : 'none';
                    if (card.classList.contains('cleaning')) {
                        card.classList.add('animate-slide-in');
                    }
                    console.log(`Card ${index} visibility:`, card.style.display, 'Classes:', card.classList.toString());
                });
            };

            const showMaintenanceServices = () => {
                console.log('Maintenance tab clicked at:', new Date().toISOString());
                maintenanceTab.classList.add('active-tab');
                maintenanceTab.setAttribute('aria-selected', 'true');
                cleaningTab.classList.remove('active-tab');
                cleaningTab.setAttribute('aria-selected', 'false');
                serviceCards.forEach((card, index) => {
                    card.style.display = card.classList.contains('maintenance') ? 'block' : 'none';
                    if (card.classList.contains('maintenance')) {
                        card.classList.add('animate-slide-in');
                    }
                    console.log(`Card ${index} visibility:`, card.style.display, 'Classes:', card.classList.toString());
                });
            };

            cleaningTab.addEventListener('click', () => {
                console.log('Cleaning tab event triggered');
                showCleaningServices();
            });
            maintenanceTab.addEventListener('click', () => {
                console.log('Maintenance tab event triggered');
                showMaintenanceServices();
            });
            console.log('Event listeners attached to tabs');

            // Initialize with Cleaning tab
            showCleaningServices();

            // Back to Top Button Logic
            window.addEventListener('scroll', () => {
                const backToTop = document.getElementById('back-to-top');
                if (window.scrollY > 300) {
                    backToTop.classList.remove('hidden');
                } else {
                    backToTop.classList.add('hidden');
                }
            });

            // Smooth Scroll for Back to Top
            document.getElementById('back-to-top').addEventListener('click', () => {
                window.scrollTo({ top: 0, behavior: 'smooth' });
            });

            // Lazy Load Background Images
            document.querySelectorAll('.lazyload').forEach(el => {
                if ('IntersectionObserver' in window) {
                    const observer = new IntersectionObserver((entries, observer) => {
                        entries.forEach(entry => {
                            if (entry.isIntersecting) {
                                const bg = entry.target.dataset.bgset;
                                entry.target.style.backgroundImage = `url(${bg})`;
                                observer.unobserve(entry.target);
                            }
                        });
                    });
                    observer.observe(el);
                } else {
                    el.style.backgroundImage = `url(${el.dataset.bgset})`;
                }
            });
        });
        function searchServices() {
            const searchInput = document.getElementById('serviceSearch').value.toLowerCase();
            const serviceCards = document.querySelectorAll('.service-card');
            serviceCards.forEach(card => {
                const title = card.dataset.title.toLowerCase();
                const description = card.dataset.description.toLowerCase();
                const isVisible = title.includes(searchInput) || description.includes(searchInput);
                card.style.display = isVisible ? 'block' : 'none';
            });
        }
    </script>
    <script type="module">
    // Import the functions you need from the SDKs you need
    import { initializeApp } from "https://www.gstatic.com/firebasejs/11.9.1/firebase-app.js";
    import { getAnalytics } from "https://www.gstatic.com/firebasejs/11.9.1/firebase-analytics.js";
    // TODO: Add SDKs for Firebase products that you want to use
    // https://firebase.google.com/docs/web/setup#available-libraries

    // Your web app's Firebase configuration
    // For Firebase JS SDK v7.20.0 and later, measurementId is optional
    const firebaseConfig = {
        apiKey: "AIzaSyBCY1auEOglFZCks58zHo4U1gCOO6LFLP8",
        authDomain: "dubaicleanupcare-a6ce7.firebaseapp.com",
        projectId: "dubaicleanupcare-a6ce7",
        storageBucket: "dubaicleanupcare-a6ce7.firebasestorage.app",
        messagingSenderId: "872060458908",
        appId: "1:872060458908:web:3596e717261a76da281a59",
        measurementId: "G-7LP0JYQS8Q"
    };

    // Initialize Firebase
    const app = initializeApp(firebaseConfig);
    const analytics = getAnalytics(app);
    </script>
    <style>
        /* Slide-in animation for cards */
        @keyframes slideIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .animate-slide-in {
            animation: slideIn 0.5s ease-out forwards;
        }

        /* Active tab gradient effect */
        .active-tab {
            background: linear-gradient(145deg, #36a3dc, #2b8cc4);
            color: white;
            transform: scale(1.05);
            box-shadow: 0 4px 12px rgba(54, 163, 220, 0.3);
        }

        /* Tab transitions */
        #cleaningTab, #maintenanceTab {
            transition: background 0.3s ease, color 0.3s ease, transform 0.3s ease, box-shadow 0.3s ease;
        }

        /* Inactive tab hover effect */
        #cleaningTab:not(.active-tab):hover, #maintenanceTab:not(.active-tab):hover {
            background: #f1f5f9;
            transform: scale(1.02);
        }
    </style>
@endsection