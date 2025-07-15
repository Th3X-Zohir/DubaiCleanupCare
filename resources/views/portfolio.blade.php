@extends('layouts.master')

@section('title', 'Portfolio | Dubai Cleanup & Maintenance')

@section('full-width-content')
    <section class="relative bg-gradient-to-b from-[#f8fafc] to-[#f1f5f9] overflow-hidden" role="region" aria-label="Portfolio Page">
        <!-- Hero Banner -->
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
                    .gradient-hero, .particle, .crystal-text {
                        animation: none;
                    }
                    .crystal-text {
                        opacity: 1;
                        transform: none;
                    }
                }
                .portfolio-img {
                    cursor: pointer;
                    transition: transform 0.4s ease, box-shadow 0.4s ease;
                }
                .portfolio-img:hover {
                    transform: scale(1.03);
                    box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
                }
                #portfolio-lightbox {
                    position: fixed;
                    top: 0;
                    left: 0;
                    width: 100%;
                    height: 100%;
                    background: rgba(0, 0, 0, 0.85);
                    display: none;
                    align-items: center;
                    justify-content: center;
                    z-index: 1000;
                }
                #portfolio-lightbox img {
                    max-width: 90%;
                    max-height: 90%;
                    border-radius: 8px;
                    box-shadow: 0 0 20px rgba(255, 255, 255, 0.3);
                }
                #portfolio-lightbox-close {
                    position: absolute;
                    top: 20px;
                    right: 20px;
                    color: white;
                    font-size: 2rem;
                    cursor: pointer;
                    transition: color 0.3s ease;
                }
                #portfolio-lightbox-close:hover {
                    color: #36a3dc;
                }
                .portfolio-overlay {
                    pointer-events: none; /* Allows clicks to pass through to the image */
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
            <div class="relative max-w-7xl mx-auto text-center gradient-hero" role="banner" aria-label="Portfolio Hero">
                <h2 class="text-5xl md:text-6xl font-bold animate-fade-in-up text-shadow-lg">Our Portfolio</h2>
                <div class="mt-6 text-3xl md:text-4xl text-gray-100 max-w-4xl mx-auto flex justify-center flex-wrap gap-2">
                    <span class="crystal-text font-semibold" style="animation-delay: 0.2s;">Showcase</span>
                    <span class="crystal-text font-semibold text-[#36a3dc]" style="animation-delay: 0.4s;">of Excellence</span>
                    <span class="crystal-text font-semibold" style="animation-delay: 0.6s;">in Dubai</span>
                </div>
                <p class="mt-4 text-lg text-gray-200 max-w-2xl mx-auto animate-fade-in-up" style="animation-delay: 0.8s;">Discover our exceptional cleaning and maintenance projects.</p>
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

            <!-- Portfolio Gallery -->
            <div class="mb-20">
                <h3 class="text-3xl md:text-4xl font-bold text-[#203e78] text-center mb-8 animate-fade-in-up">Our Work</h3>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 animate-fade-in-up" style="animation-delay: 0.2s;">
                    @forelse($portfolios as $portfolio)
                        @if($portfolio->photos)
                            @foreach($portfolio->photos as $photo)
                                <div class="relative group overflow-hidden rounded-xl shadow-lg">
                                    <img src="{{ asset('storage/' . $photo) }}" class="portfolio-img w-full h-64 object-cover" alt="{{ $portfolio->service->title }} portfolio image" data-large="{{ asset('storage/' . $photo) }}">
                                    <div class="portfolio-overlay absolute inset-0 bg-black bg-opacity-0 group-hover:bg-opacity-40 transition-opacity duration-300 flex items-center justify-center">
                                        <div class="text-center text-white opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                                            <h4 class="text-lg font-semibold">{{ $portfolio->service->title }}</h4>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    @empty
                        <div class="col-span-full text-center py-12">
                            <p class="text-gray-600 italic text-lg">No portfolio images available yet.</p>
                        </div>
                    @endforelse
                </div>
            </div>


        <!-- Lightbox -->
        <div id="portfolio-lightbox" role="dialog" aria-label="Image Lightbox">
            <span id="portfolio-lightbox-close">×</span>
            <img id="portfolio-lightbox-image" src="" alt="Expanded portfolio image">
        </div>
    </section>
@endsection

@section('scripts')
    <script>
        // Parallax Effect
        window.addEventListener('scroll', () => {
            const parallax = document.querySelector('.parallax');
            if (parallax) {
                const offset = window.pageYOffset;
                parallax.style.transform = `translateY(${offset * 0.5}px)`;
            }
        });

        // Lightbox Functionality
        document.addEventListener('DOMContentLoaded', () => {
            const lightbox = document.getElementById('portfolio-lightbox');
            const lightboxImage = document.getElementById('portfolio-lightbox-image');
            const lightboxClose = document.getElementById('portfolio-lightbox-close');
            const images = document.querySelectorAll('.portfolio-img');

            images.forEach(img => {
                img.addEventListener('click', () => {
                    lightboxImage.src = img.dataset.large;
                    lightbox.style.display = 'flex';
                });
            });

            lightboxClose.addEventListener('click', () => {
                lightbox.style.display = 'none';
            });

            lightbox.addEventListener('click', (e) => {
                if (e.target === lightbox) {
                    lightbox.style.display = 'none';
                }
            });

            // Close lightbox with Escape key
            document.addEventListener('keydown', (e) => {
                if (e.key === 'Escape' && lightbox.style.display === 'flex') {
                    lightbox.style.display = 'none';
                }
            });
        });
    </script>
@endsection