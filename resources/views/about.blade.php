@extends('layouts.master')

@section('title', 'About Us | Dubai Cleanup & Maintenance')
@section('head')
    <link rel="canonical" href="https://dubaicleanupcare.com/about" />
    <meta name="description" content="Learn about Dubai Cleanup & Maintenance, the best cleaning service in Dubai. Trusted for affordable home & office cleaning in Dubai Marina, JBR, and more." />
    <meta property="og:url" content="https://dubaicleanupcare.com/about" />
@endsection
@section('full-width-content')
    <section class="relative bg-gradient-to-b from-[#f8fafc] to-[#f1f5f9] overflow-hidden" role="region" aria-label="About Us Page">
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
                @keyframes counter {
                    from { transform: translateY(10px); opacity: 0; }
                    to { transform: translateY(0); opacity: 1; }
                }
                .counter {
                    animation: counter 1s ease-out forwards;
                }
                .team-card:hover {
                    transform: translateY(-5px);
                    box-shadow: 0 10px 20px rgba(54, 163, 220, 0.3);
                }
                .testimonial-carousel .carousel-inner {
                    transition: transform 0.5s ease;
                }
                .carousel-dot.active {
                    background-color: #36a3dc;
                    transform: scale(1.2);
                }
                @media (prefers-reduced-motion: reduce) {
                    .counter, .team-card, .carousel-inner, .carousel-dot { animation: none; transition: none; }
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
            <div class="relative max-w-7xl mx-auto text-center gradient-hero" role="banner" aria-label="About Us Hero">
                <h2 class="text-5xl md:text-6xl font-bold animate-fade-in-up text-shadow-lg">About Dubai Cleanup & Maintenance</h2>
                <div class="mt-6 text-3xl md:text-4xl text-gray-100 max-w-4xl mx-auto flex justify-center flex-wrap gap-2">
                    <span class="crystal-text font-semibold" style="animation-delay: 0.2s;">Excellence</span>
                    <span class="crystal-text font-semibold text-[#36a3dc]" style="animation-delay: 0.4s;">in Every Detail</span>
                    <span class="crystal-text font-semibold" style="animation-delay: 0.6s;">Since 2010</span>
                </div>
                <p class="mt-4 text-lg text-gray-200 max-w-2xl mx-auto animate-fade-in-up" style="animation-delay: 0.8s;">Delivering world-class cleaning and maintenance with passion and precision.</p>
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

            <!-- Our Story -->
            <div class="mb-20">
                <h3 class="text-3xl md:text-4xl font-bold text-[#203e78] text-center mb-8 animate-fade-in-up">Our Story</h3>
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                    <div class="animate-fade-in-up" style="animation-delay: 0.2s;">
                        <p class="text-lg text-gray-600 leading-relaxed">Founded in 2010, Dubai Cleanup & Maintenance was born from a vision to transform spaces into pristine, welcoming environments. Starting as a small team in Dubai Marina, we’ve grown into a trusted name across the UAE, serving over 5,000 homes and businesses with unparalleled dedication.</p>
                        <p class="mt-4 text-lg text-gray-600 leading-relaxed">Our commitment to eco-friendly practices, certified professionals, and client satisfaction has made us a leader in cleaning and maintenance, delivering world-class service with a personal touch.</p>
                    </div>
                    <div class="relative h-80 lg:h-96 rounded-2xl overflow-hidden shadow-xl animate-fade-in-up" style="animation-delay: 0.4s;">
                        <div class="w-full h-full bg-gradient-to-br from-[#36a3dc] to-[#203e78] flex items-center justify-center">
                            <svg class="w-24 h-24 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                            </svg>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Mission & Vision -->
            <div class="mb-20">
                <h3 class="text-3xl md:text-4xl font-bold text-[#203e78] text-center mb-8 animate-fade-in-up">Our Mission & Vision</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    <div class="bg-white rounded-2xl shadow-lg p-8 animate-fade-in-up" style="animation-delay: 0.2s;">
                        <h4 class="text-2xl font-semibold text-[#203e78] mb-4">Mission</h4>
                        <p class="text-gray-600 leading-relaxed">To provide eco-friendly, high-quality cleaning and maintenance services that enhance the beauty and functionality of every space, delivering exceptional value to our clients.</p>
                    </div>
                    <div class="bg-white rounded-2xl shadow-lg p-8 animate-fade-in-up" style="animation-delay: 0.4s;">
                        <h4 class="text-2xl font-semibold text-[#203e78] mb-4">Vision</h4>
                        <p class="text-gray-600 leading-relaxed">To be the UAE’s most trusted name in cleaning and maintenance, setting global standards for sustainability, innovation, and client satisfaction.</p>
                    </div>
                </div>
            </div>

            <!-- Core Values -->
            <div class="mb-20">
                <h3 class="text-3xl md:text-4xl font-bold text-[#203e78] text-center mb-8 animate-fade-in-up">Our Core Values</h3>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                    <div class="bg-white rounded-2xl shadow-lg p-6 text-center animate-fade-in-up" style="animation-delay: 0.2s;">
                        <svg class="w-12 h-12 text-[#36a3dc] mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                        <h4 class="text-lg font-semibold text-[#203e78] mb-2">Integrity</h4>
                        <p class="text-gray-600 text-sm">We uphold honesty and transparency in every service we provide.</p>
                    </div>
                    <div class="bg-white rounded-2xl shadow-lg p-6 text-center animate-fade-in-up" style="animation-delay: 0.4s;">
                        <svg class="w-12 h-12 text-[#36a3dc] mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <h4 class="text-lg font-semibold text-[#203e78] mb-2">Excellence</h4>
                        <p class="text-gray-600 text-sm">We strive for perfection in every detail of our work.</p>
                    </div>
                    <div class="bg-white rounded-2xl shadow-lg p-6 text-center animate-fade-in-up" style="animation-delay: 0.6s;">
                        <svg class="w-12 h-12 text-[#36a3dc] mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                        </svg>
                        <h4 class="text-lg font-semibold text-[#203e78] mb-2">Sustainability</h4>
                        <p class="text-gray-600 text-sm">We prioritize eco-friendly practices to protect our planet.</p>
                    </div>
                    <div class="bg-white rounded-2xl shadow-lg p-6 text-center animate-fade-in-up" style="animation-delay: 0.8s;">
                        <svg class="w-12 h-12 text-[#36a3dc] mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 005.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                        </svg>
                        <h4 class="text-lg font-semibold text-[#203e78] mb-2">Teamwork</h4>
                        <p class="text-gray-600 text-sm">Our united team delivers exceptional results together.</p>
                    </div>
                </div>
            </div>

            <!-- Our Team -->
            <div class="mb-20">
                <h3 class="text-3xl md:text-4xl font-bold text-[#203e78] text-center mb-8 animate-fade-in-up">Meet Our Team</h3>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                    <div class="team-card bg-white rounded-2xl shadow-lg overflow-hidden transition-all duration-300 animate-fade-in-up" style="animation-delay: 0.2s;">
                        <div class="relative h-64 bg-gradient-to-br from-[#36a3dc] to-[#203e78] flex items-center justify-center">
                            <svg class="w-16 h-16 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                            </svg>
                        </div>
                        <div class="p-6 text-center">
                            <h4 class="text-xl font-semibold text-[#203e78] mb-2">Ahmed Al-Mansoori</h4>
                            <p class="text-gray-600 text-sm">Founder & CEO</p>
                        </div>
                    </div>
                    <div class="team-card bg-white rounded-2xl shadow-lg overflow-hidden transition-all duration-300 animate-fade-in-up" style="animation-delay: 0.4s;">
                        <div class="relative h-64 bg-gradient-to-br from-[#36a3dc] to-[#203e78] flex items-center justify-center">
                            <svg class="w-16 h-16 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                            </svg>
                        </div>
                        <div class="p-6 text-center">
                            <h4 class="text-xl font-semibold text-[#203e78] mb-2">Sara Khan</h4>
                            <p class="text-gray-600 text-sm">Operations Manager</p>
                        </div>
                    </div>
                    <div class="team-card bg-white rounded-2xl shadow-lg overflow-hidden transition-all duration-300 animate-fade-in-up" style="animation-delay: 0.6s;">
                        <div class="relative h-64 bg-gradient-to-br from-[#36a3dc] to-[#203e78] flex items-center justify-center">
                            <svg class="w-16 h-16 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                            </svg>
                        </div>
                        <div class="p-6 text-center">
                            <h4 class="text-xl font-semibold text-[#203e78] mb-2">Mohammed Ali</h4>
                            <p class="text-gray-600 text-sm">Head of Quality Control</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Achievements -->
            <div class="mb-20">
                <h3 class="text-3xl md:text-4xl font-bold text-[#203e78] text-center mb-8 animate-fade-in-up">Our Achievements</h3>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                    <div class="bg-white rounded-2xl shadow-lg p-6 text-center counter" style="animation-delay: 0.2s;">
                        <h4 class="text-4xl font-bold text-[#36a3dc] mb-2">5,000+</h4>
                        <p class="text-gray-600 text-sm">Homes & Businesses Served</p>
                    </div>
                    <div class="bg-white rounded-2xl shadow-lg p-6 text-center counter" style="animation-delay: 0.4s;">
                        <h4 class="text-4xl font-bold text-[#36a3dc] mb-2">15</h4>
                        <p class="text-gray-600 text-sm">Years of Excellence</p>
                    </div>
                    <div class="bg-white rounded-2xl shadow-lg p-6 text-center counter" style="animation-delay: 0.6s;">
                        <h4 class="text-4xl font-bold text-[#36a3dc] mb-2">98%</h4>
                        <p class="text-gray-600 text-sm">Client Satisfaction Rate</p>
                    </div>
                    <div class="bg-white rounded-2xl shadow-lg p-6 text-center counter" style="animation-delay: 0.8s;">
                        <h4 class="text-4xl font-bold text-[#36a3dc] mb-2">50+</h4>
                        <p class="text-gray-600 text-sm">Certified Professionals</p>
                    </div>
                </div>
            </div>

            @if($reviews && $reviews->where('status', 1)->count() > 0)
            <div class="mb-20">
                <h3 class="text-3xl md:text-4xl font-bold text-[#203e78] text-center mb-12 animate-fade-in-up" style="animation: fadeInUp 0.8s ease-out;">What Our Clients Say</h3>
                <div class="relative max-w-6xl mx-auto" style="perspective: 1000px;">
                    <style>
                        @keyframes cardFlip {
                            0% { transform: rotateY(-10deg) translateY(20px); opacity: 0; }
                            100% { transform: rotateY(0) translateY(0); opacity: 1; }
                        }
                        @keyframes glowPulse {
                            0%, 100% { box-shadow: 0 0 10px rgba(54, 163, 220, 0.3); }
                            50% { box-shadow: 0 0 20px rgba(54, 163, 220, 0.6); }
                        }
                        @keyframes dotScale {
                            0% { transform: scale(1); }
                            50% { transform: scale(1.3); }
                            100% { transform: scale(1); }
                        }
                        .review-card {
                            background: linear-gradient(145deg, rgba(255,255,255,0.95), rgba(240,248,255,0.9));
                            backdrop-filter: blur(8px);
                            border: 1px solid rgba(255,255,255,0.2);
                            border-radius: 20px;
                            transition: transform 0.4s ease, box-shadow 0.4s ease;
                            animation: cardFlip 0.6s ease-out forwards;
                            transform-origin: center;
                        }
                        .review-card:hover {
                            transform: translateY(-8px) scale(1.02);
                            box-shadow: 0 12px 24px rgba(54,163,220,0.3);
                            animation: glowPulse 1.5s infinite;
                        }
                        .carousel-inner {
                            display: flex;
                            transition: transform 0.6s cubic-bezier(0.68, -0.55, 0.27, 1.55);
                        }
                        .carousel-dot {
                            width: 12px;
                            height: 12px;
                            background: #d1d5db;
                            border-radius: 50%;
                            transition: all 0.3s ease;
                            cursor: pointer;
                        }
                        .carousel-dot.active {
                            background: #36a3dc;
                            animation: dotScale 0.5s ease;
                        }
                        .carousel-dot:hover {
                            transform: scale(1.2);
                            background: #2b8cc4;
                        }
                        .star-rating svg {
                            transition: transform 0.3s ease;
                        }
                        .star-rating svg:hover {
                            transform: scale(1.2);
                        }
                        @media (prefers-reduced-motion: reduce) {
                            .review-card, .carousel-inner, .carousel-dot, .star-rating svg {
                                animation: none;
                                transition: none;
                            }
                        }
                    </style>
                    <div class="relative max-w-5xl mx-auto testimonial-carousel overflow-hidden" style="padding: 0 16px;">
                        <div class="carousel-inner" id="carouselInner">
                            @foreach($reviews->where('status', 1) as $review)
                                <div class="carousel-item min-w-[90%] sm:min-w-[50%] lg:min-w-[33.33%] px-3" style="flex-shrink: 0;">
                                    <div class="review-card p-8" style="animation-delay: {{ $loop->index * 0.15 }}s; margin: 0 auto;">
                                        <div class="star-rating flex justify-center mb-6">
                                            @for($i = 0; $i < 5; $i++)
                                                <svg class="w-6 h-6 {{ $i < $review->rating ? 'text-yellow-400' : 'text-gray-300' }}" fill="currentColor" viewBox="0 0 20 20" style="margin: 0 2px;">
                                                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.286 3.97a1 1 0 00.95.69h4.15c.969 0 1.371 1.24.588 1.81l-3.357 2.44a1 1 0 00-.364 1.118l1.287 3.97c.3.921-.755 1.688-1.54 1.118l-3.357-2.44a1 1 0 00-1.175 0l-3.357 2.44c-.784.57-1.838-.197-1.54-1.118l1.287-3.97a1 1 0 00-.364-1.118L2.85 9.397c-.783-.57-.38-1.81.588-1.81h4.15a1 1 0 00.95-.69l1.286-3.97z"/>
                                                </svg>
                                            @endfor
                                        </div>
                                        <p class="text-gray-700 text-base leading-relaxed mb-6 text-center" style="font-style: italic; line-height: 1.8; max-height: 120px; overflow: hidden; text-overflow: ellipsis;">"{{ Str::limit($review->comment, 120) }}"</p>
                                        <p class="text-sm font-bold text-[#203e78] text-center" style="letter-spacing: 0.05em;">{{ $review->user->name ?? 'Anonymous' }}</p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="flex justify-center mt-8 space-x-3">
                            @foreach($reviews->where('status', 1) as $index => $review)
                                <button class="carousel-dot {{ $index === 0 ? 'active' : '' }}" data-index="{{ $index }}" aria-label="Go to testimonial {{ $index + 1 }}" style="transition: all 0.3s ease;"></button>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        @endif

            <!-- CTA Banner -->
            <div class="bg-gradient-to-r from-[#203e78] to-[#36a3dc] text-white py-16 px-8 rounded-2xl shadow-xl text-center animate-fade-in-up">
                <h3 class="text-3xl md:text-4xl font-bold mb-6">Ready to Experience Our Expertise?</h3>
                <p class="text-lg mb-8 max-w-2xl mx-auto">Join thousands of satisfied clients and transform your space with our premium services.</p>
                <a href="/booking" class="gradient-btn inline-block px-10 py-4 text-white font-semibold text-lg rounded-full shadow-lg focus:outline-none focus:ring-2 focus:ring-white transition-all duration-300 hover:scale-105 animate-pulse">Book Now</a>
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

    // Testimonials Carousel
    const carouselInner = document.querySelector('#carouselInner');
    const carouselDots = document.querySelectorAll('.carousel-dot');
    let currentIndex = 0;
    let autoSlide = setInterval(nextSlide, 5000);

    function getVisibleItems() {
        if (window.innerWidth >= 1024) return 3; // lg: 3 items
        if (window.innerWidth >= 640) return 2; // sm: 2 items
        return 1; // mobile: 1 item
    }

    function nextSlide() {
        const totalItems = carouselDots.length;
        const visibleItems = getVisibleItems();
        currentIndex = (currentIndex + 1) % (totalItems - visibleItems + 1);
        updateCarousel();
    }

    function updateCarousel() {
        const visibleItems = getVisibleItems();
        const itemWidthPercent = 100 / visibleItems;
        carouselInner.style.transform = `translateX(-${currentIndex * itemWidthPercent}%)`;
        carouselDots.forEach((dot, index) => {
            dot.classList.toggle('active', index === currentIndex);
        });
    }

    carouselDots.forEach(dot => {
        dot.addEventListener('click', () => {
            currentIndex = Math.min(parseInt(dot.dataset.index), carouselDots.length - getVisibleItems());
            updateCarousel();
            clearInterval(autoSlide);
            autoSlide = setInterval(nextSlide, 5000);
        });
    });

    document.querySelector('.testimonial-carousel').addEventListener('mouseenter', () => clearInterval(autoSlide));
    document.querySelector('.testimonial-carousel').addEventListener('mouseleave', () => autoSlide = setInterval(nextSlide, 5000));

    // Handle window resize
    window.addEventListener('resize', () => {
        updateCarousel();
    });

    // Initialize
    document.addEventListener('DOMContentLoaded', () => {
        updateCarousel();
    });
    </script>
@endsection