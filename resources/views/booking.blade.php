@extends('layouts.master')

@section('title', 'Book a Service | Dubai Cleanup & Maintenance')

@section('full-width-content')
    <section class="relative bg-gradient-to-b from-[#f8fafc] to-[#f1f5f9] overflow-hidden" role="region" aria-label="Booking Page">
        <!-- Hero Banner with Crystal Text Effect -->
        <div class="relative bg-gradient-to-r from-[#203e78] to-[#36a3dc] text-white py-28 px-4 sm:px-6 lg:px-8 mb-16">
            <style>
                @keyframes gradientShift {
                    0% { background-position: 0% 50%; }
                    50% { background-position: 100% 50%; }
                    100% { background-position: 0% 50%; }
                }
                .gradient-hero {
                
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
                .form-input {
                    background: rgba(255, 255, 255, 0.9);
                    backdrop-filter: blur(6px);
                    border: 1px solid rgba(54, 163, 220, 0.3);
                    transition: all 0.3s ease;
                }
                .form-input:focus {
                    border-color: #36a3dc;
                    box-shadow: 0 0 10px rgba(54, 163, 220, 0.3);
                }
                .submit-btn {
                    background: linear-gradient(90deg, #203e78, #36a3dc);
                    transition: all 0.3s ease;
                }
                .submit-btn:hover {
                    transform: translateY(-2px);
                    box-shadow: 0 8px 16px rgba(54, 163, 220, 0.4);
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
            <div class="relative max-w-7xl mx-auto text-center gradient-hero" role="banner" aria-label="Booking Hero">
                <h2 class="text-5xl md:text-6xl font-bold animate-fade-in-up text-shadow-lg">Book Your Service Today</h2>
                <div class="mt-6 text-3xl md:text-4xl text-gray-100 max-w-4xl mx-auto flex justify-center flex-wrap gap-2">
                    <span class="crystal-text font-semibold" style="animation-delay: 0.2s;">Hassle-Free</span>
                    <span class="crystal-text font-semibold text-[#36a3dc]" style="animation-delay: 0.4s;">Scheduling</span>
                    <span class="crystal-text font-semibold" style="animation-delay: 0.6s;">in Minutes</span>
                </div>
                <p class="mt-4 text-lg text-gray-200 max-w-2xl mx-auto animate-fade-in-up" style="animation-delay: 0.8s;">Choose your service, pick a time, and let us transform your space.</p>
                
            </div>
        </div>

        <!-- Main Content -->
        <div class="px-4 sm:px-6 lg:px-8 relative max-w-7xl mx-auto">
            <!-- Background Wave with Parallax -->
            <div class="absolute inset-0 opacity-10 pointer-events-none parallax" data-speed="0.5">
                <svg class="w-full h-full" viewBox="0 0 1440 320" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path fill="#36a3dc" fill-opacity="0.2" d="M0,192L48,181.3C96,171,192,149,288,154.7C384,160,480,192,576,202.7C672,213,768,202,864,186.7C960,171,1056,149,1152,144C1248,139,1344,149,1392,154.7L1440,160L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path>
                </svg>
            </div>

            <!-- Success/Error Messages -->
            @if (session('success'))
                <div class="mb-6 p-4 bg-green-100 text-green-700 rounded-lg text-sm" role="alert">
                    {{ session('success') }}
                </div>
            @endif
            @if ($errors->any())
                <div class="mb-6 p-4 bg-red-100 text-red-700 rounded-lg text-sm" role="alert">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <!-- Booking Form -->
            <div class="mb-20" id="bookingForm">
                <h3 class="text-3xl md:text-4xl font-bold text-[#203e78] text-center mb-8 animate-fade-in-up">Schedule Your Service</h3>
                <form action="/booking/submit" method="POST" class="max-w-3xl mx-auto bg-white rounded-2xl shadow-xl p-8 animate-fade-in-up" style="animation-delay: 0.2s;">
                    @csrf
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                        <div>
                            <label for="name" class="block text-sm font-semibold text-[#203e78] mb-2">Full Name</label>
                            <input type="text" id="name" name="name" 
                                value="{{ old('name', Auth::check() ? Auth::user()->name : '') }}" 
                                required class="form-input w-full px-4 py-3 rounded-lg focus:outline-none" 
                                placeholder="Enter your name" aria-required="true"
                                {{ Auth::check() ? 'readonly' : '' }}>
                        </div>
                        <div>
                            <label for="email" class="block text-sm font-semibold text-[#203e78] mb-2">Email Address</label>
                            <input type="email" id="email" name="email" 
                                value="{{ old('email', Auth::check() ? Auth::user()->email : '') }}" 
                                required class="form-input w-full px-4 py-3 rounded-lg focus:outline-none" 
                                placeholder="Enter your email" aria-required="true"
                                {{ Auth::check() ? 'readonly' : '' }}>
                        </div>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                        <div>
                            <label for="number" class="block text-sm font-semibold text-[#203e78] mb-2">Phone Number</label>
                            <input type="text" id="number" name="number" 
                                value="{{ old('number', Auth::check() ? Auth::user()->number : '') }}" 
                                required class="form-input w-full px-4 py-3 rounded-lg focus:outline-none" 
                                placeholder="Enter your phone number" aria-required="true"
                                {{ Auth::check() ? 'readonly' : '' }}>
                        </div>
                        <div>
                            <label for="service" class="block text-sm font-semibold text-[#203e78] mb-2">Service Type</label>
                            <select id="service" name="service_id" required class="form-input w-full px-4 py-3 rounded-lg focus:outline-none" aria-required="true">
                                <option value="" disabled {{ old('service_id') ? '' : 'selected' }}>Select a service</option>
                                @foreach($services as $service)
                                    <option value="{{ $service->id }}" {{ old('service_id') == $service->id ? 'selected' : '' }}>{{ $service->title }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                        <div>
                            <label for="date" class="block text-sm font-semibold text-[#203e78] mb-2">Preferred Date</label>
                            <input type="date" id="date" name="date" value="{{ old('date') }}" required class="form-input w-full px-4 py-3 rounded-lg focus:outline-none" aria-required="true">
                        </div>
                        <div>
                            <label for="time" class="block text-sm font-semibold text-[#203e78] mb-2">Preferred Time</label>
                            <input type="time" id="time" name="time" value="{{ old('time') }}" required class="form-input w-full px-4 py-3 rounded-lg focus:outline-none" aria-required="true">
                        </div>
                    </div>
                    <div class="mb-6">
                        <label for="notes" class="block text-sm font-semibold text-[#203e78] mb-2">Additional Notes</label>
                        <textarea id="notes" name="notes" class="form-input w-full px-4 py-3 rounded-lg focus:outline-none" rows="4" placeholder="Any specific requirements?">{{ old('notes') }}</textarea>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="submit-btn inline-block px-10 py-4 text-white font-semibold text-lg rounded-full shadow-lg focus:outline-none focus:ring-2 focus:ring-[#36a3dc] transition-all duration-300 animate-pulse">Request Booking</button>
                    </div>
                </form>
            </div>

            <!-- Features -->
            <div class="mb-20">
                <h3 class="text-3xl md:text-4xl font-bold text-[#203e78] text-center mb-8 animate-fade-in-up">Why Book with Us?</h3>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                    <div class="bg-white rounded-2xl shadow-lg p-6 text-center animate-fade-in-up" style="animation-delay: 0.2s;">
                        <svg class="w-12 h-12 text-[#36a3dc] mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <h4 class="text-lg font-semibold text-[#203e78] mb-2">Flexible Scheduling</h4>
                        <p class="text-gray-600 text-sm">Choose a date and time that suits your busy lifestyle.</p>
                    </div>
                    <div class="bg-white rounded-2xl shadow-lg p-6 text-center animate-fade-in-up" style="animation-delay: 0.4s;">
                        <svg class="w-12 h-12 text-[#36a3dc] mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                        <h4 class="text-lg font-semibold text-[#203e78] mb-2">Trusted Quality</h4>
                        <p class="text-gray-600 text-sm">Our certified professionals deliver exceptional results.</p>
                    </div>
                    <div class="bg-white rounded-2xl shadow-lg p-6 text-center animate-fade-in-up" style="animation-delay: 0.6s;">
                        <svg class="w-12 h-12 text-[#36a3dc] mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                        </svg>
                        <h4 class="text-lg font-semibold text-[#203e78] mb-2">Eco-Friendly</h4>
                        <p class="text-gray-600 text-sm">Sustainable products for a safe, clean environment.</p>
                    </div>
                </div>
            </div>

            <!-- CTA Banner -->
            <div class="bg-gradient-to-r from-[#203e78] to-[#36a3dc] text-white py-16 px-8 rounded-2xl shadow-xl text-center animate-fade-in-up mb-16">
                <h3 class="text-3xl md:text-4xl font-bold mb-6">Ready to Transform Your Space?</h3>
                <p class="text-lg mb-8 max-w-2xl mx-auto">Book now and experience our premium cleaning and maintenance services.</p>
                <a href="#bookingForm" class="gradient-btn inline-block px-10 py-4 text-white font-semibold text-lg rounded-full shadow-lg focus:outline-none focus:ring-2 focus:ring-white transition-all duration-300 animate-pulse">Book Again</a>
            </div>
        </div>
    </section>
@endsection

@section('scripts')
    <script>
        // Parallax Effect
        window.addEventListener('scroll', () => {
            const parallax = document.querySelector('.parallax');
            const offset = window.pageYOffset;
            parallax.style.transform = `translateY(${offset * 0.5}px)`;
        });

        // Testimonials Carousel
        const carouselInner = document.querySelector('#carouselInner');
        let carouselDots = document.querySelectorAll('.carousel-dot');
        let currentIndex = 0;
        let autoSlide = setInterval(nextSlide, 5000);

        function getVisibleItems() {
            if (window.innerWidth >= 1024) return 3; // lg: 3 items
            if (window.innerWidth >= 640) return 2; // sm: 2 items
            return 1; // mobile: 1 item
        }

        function nextSlide() {
            const totalItems = document.querySelectorAll('.carousel-item').length;
            const visibleItems = getVisibleItems();
            const maxIndex = Math.max(0, totalItems - visibleItems);
            currentIndex = (currentIndex + 1) % (maxIndex + 1);
            updateCarousel();
        }

        function updateCarousel() {
            const totalItems = document.querySelectorAll('.carousel-item').length;
            const visibleItems = getVisibleItems();
            const maxIndex = Math.max(0, totalItems - visibleItems);
            currentIndex = Math.min(currentIndex, maxIndex);
            const itemWidthPercent = 100 / visibleItems;
            carouselInner.style.transform = `translateX(-${currentIndex * itemWidthPercent}%)`;
            carouselDots.forEach((dot, index) => {
                dot.classList.toggle('active', index === currentIndex);
            });
        }

        function bindDotEvents() {
            carouselDots = document.querySelectorAll('.carousel-dot');
            carouselDots.forEach(dot => {
                dot.addEventListener('click', () => {
                    currentIndex = parseInt(dot.dataset.index);
                    updateCarousel();
                    clearInterval(autoSlide);
                    autoSlide = setInterval(nextSlide, 5000);
                });
            });
        }

        document.querySelector('.testimonial-carousel').addEventListener('mouseenter', () => clearInterval(autoSlide));
        document.querySelector('.testimonial-carousel').addEventListener('mouseleave', () => autoSlide = setInterval(nextSlide, 5000));

        // Handle window resize
        window.addEventListener('resize', () => {
            updateCarousel();
        });

        // Initialize
        document.addEventListener('DOMContentLoaded', () => {
            bindDotEvents();
            updateCarousel();
        });
    </script>
@endsection