@extends('layouts.master')

@section('title', 'Terms and Conditions | Dubai Cleanup & Maintenance')

@section('full-width-content')
    <section class="relative min-h-screen py-20 px-4 sm:px-6 lg:px-8 bg-gradient-to-b from-[#f8fafc] to-[#e2e8f0] overflow-hidden" role="region" aria-label="Terms and Conditions">
        <!-- Background Decorative Elements -->
        <div class="absolute inset-0 z-0">
            <div class="absolute top-10 left-10 w-80 h-80 bg-[#36a3dc] opacity-5 rounded-full filter blur-3xl"></div>
            <div class="absolute bottom-10 right-10 w-80 h-80 bg-[#203e78] opacity-5 rounded-full filter blur-3xl"></div>
        </div>

        <!-- Sticky Progress Indicator -->
        <div class="fixed top-0 left-0 w-full h-1 bg-gray-100 z-50">
            <div id="progressBar" class="h-full bg-gradient-to-r from-[#36a3dc] to-[#203e78] transition-all duration-300" style="width: 0;"></div>
        </div>

        <div class="relative max-w-4xl mx-auto z-10">
            <!-- Sticky Header with Dynamic Glow -->
            <div class="text-center mb-16 sticky top-0 bg-[#f8fafc]/90 backdrop-blur-md py-6 animate-fade-in-up relative">
                <div class="absolute inset-0 bg-gradient-to-r from-[#36a3dc]/20 to-[#203e78]/20 blur-2xl opacity-60 animate-pulse-glow"></div>
                <h1 class="text-5xl md:text-6xl font-bold text-[#203e78] mb-4 relative z-10">Terms & Conditions</h1>
                <p class="text-lg text-gray-600 max-w-2xl mx-auto leading-relaxed relative z-10">Discover the foundation of your seamless experience with Dubai Cleanup Care.</p>
                <p class="text-sm text-gray-500 mt-3 relative z-10">Effective Date: {{ date('F d, Y, g:i A T', strtotime('06:37 PM +06')) }}</p>
            </div>

            <!-- Enhanced Timeline Layout -->
            <div class="relative space-y-12 before:content-[''] before:absolute before:left-8 before:top-0 before:bottom-0 before:w-1 before:bg-gradient-to-b from-[#36a3dc] to-[#203e78] before:rounded-full md:before:left-1/2 md:before:-translate-x-1/2">
                <!-- Term 1 -->
                <div id="term-1" class="relative glass-card bg-white/80 backdrop-blur-lg rounded-xl shadow-lg p-6 transform transition-all duration-300 hover:scale-105 hover:shadow-2xl animate-fade-in-up md:ml-16 md:w-1/2" style="animation-delay: 0s;" data-tooltip="Details about our cleaning services">
                     
                    <div class="flex items-start space-x-4">
                        <div class="flex-shrink-0 bg-gradient-to-br from-[#36a3dc] to-[#203e78] p-3 rounded-full shadow-md">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0v6l-8 4-8-4V7m8 4v10" /></svg>
                        </div>
                        <div class="flex-1">
                            <h3 class="text-lg font-semibold text-[#203e78] mb-2">1. Services Offered</h3>
                            <p class="text-gray-600 text-sm leading-relaxed">Dubai Cleanup Care provides professional cleaning services in Dubai, including but not limited to residential, commercial, and specialized cleaning.</p>
                        </div>
                    </div>
                    <div class="tooltip absolute bg-white/90 text-[#203e78] text-xs p-2 rounded-md shadow-lg opacity-0 pointer-events-none transition-opacity duration-300">Details about our cleaning services</div>
                </div>
                <!-- Term 2 -->
                <div id="term-2" class="relative glass-card bg-white/80 backdrop-blur-lg rounded-xl shadow-lg p-6 transform transition-all duration-300 hover:scale-105 hover:shadow-2xl animate-fade-in-up md:mr-16 md:ml-auto md:w-1/2" style="animation-delay: 0.1s;" data-tooltip="How to book your appointment">
                     
                    <div class="flex items-start space-x-4">
                        <div class="flex-shrink-0 bg-gradient-to-br from-[#36a3dc] to-[#203e78] p-3 rounded-full shadow-md">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" /></svg>
                        </div>
                        <div class="flex-1">
                            <h3 class="text-lg font-semibold text-[#203e78] mb-2">2. Booking & Appointments</h3>
                            <p class="text-gray-600 text-sm leading-relaxed">Bookings can be made via our website, phone, or email. All bookings are subject to availability. You agree to provide accurate and complete information at the time of booking.</p>
                        </div>
                    </div>
                    <div class="tooltip absolute bg-white/90 text-[#203e78] text-xs p-2 rounded-md shadow-lg opacity-0 pointer-events-none transition-opacity duration-300">How to book your appointment</div>
                </div>
                <!-- Term 3 -->
                <div id="term-3" class="relative glass-card bg-white/80 backdrop-blur-lg rounded-xl shadow-lg p-6 transform transition-all duration-300 hover:scale-105 hover:shadow-2xl animate-fade-in-up md:ml-16 md:w-1/2" style="animation-delay: 0.2s;" data-tooltip="Pricing and payment details">
                     
                    <div class="flex items-start space-x-4">
                        <div class="flex-shrink-0 bg-gradient-to-br from-[#36a3dc] to-[#203e78] p-3 rounded-full shadow-md">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                        </div>
                        <div class="flex-1">
                            <h3 class="text-lg font-semibold text-[#203e78] mb-2">3. Pricing & Payment</h3>
                            <p class="text-gray-600 text-sm leading-relaxed">Prices for services are listed on our website and may change without notice. Payment is due upon completion of services unless otherwise agreed. We accept payments via cash, card, bank transfer.</p>
                        </div>
                    </div>
                    <div class="tooltip absolute bg-white/90 text-[#203e78] text-xs p-2 rounded-md shadow-lg opacity-0 pointer-events-none transition-opacity duration-300">Pricing and payment details</div>
                </div>
                <!-- Term 4 -->
                <div id="term-4" class="relative glass-card bg-white/80 backdrop-blur-lg rounded-xl shadow-lg p-6 transform transition-all duration-300 hover:scale-105 hover:shadow-2xl animate-fade-in-up md:mr-16 md:ml-auto md:w-1/2" style="animation-delay: 0.3s;" data-tooltip="Cancellation and refund policies">
                     
                    <div class="flex items-start space-x-4">
                        <div class="flex-shrink-0 bg-gradient-to-br from-[#36a3dc] to-[#203e78] p-3 rounded-full shadow-md">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" /></svg>
                        </div>
                        <div class="flex-1">
                            <h3 class="text-lg font-semibold text-[#203e78] mb-2">4. Cancellations & Refunds</h3>
                            <p class="text-gray-600 text-sm leading-relaxed">Cancellations must be made at least 24 hours in advance. Late cancellations or no-shows may incur a fee. Refunds will be issued in accordance with our refund policy.</p>
                        </div>
                    </div>
                    <div class="tooltip absolute bg-white/90 text-[#203e78] text-xs p-2 rounded-md shadow-lg opacity-0 pointer-events-none transition-opacity duration-300">Cancellation and refund policies</div>
                </div>
                <!-- Term 5 -->
                <div id="term-5" class="relative glass-card bg-white/80 backdrop-blur-lg rounded-xl shadow-lg p-6 transform transition-all duration-300 hover:scale-105 hover:shadow-2xl animate-fade-in-up md:ml-16 md:w-1/2" style="animation-delay: 0.4s;" data-tooltip="Your responsibilities as a customer">
                     
                    <div class="flex items-start space-x-4">
                        <div class="flex-shrink-0 bg-gradient-to-br from-[#36a3dc] to-[#203e78] p-3 rounded-full shadow-md">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" /></svg>
                        </div>
                        <div class="flex-1">
                            <h3 class="text-lg font-semibold text-[#203e78] mb-2">5. Customer Responsibilities</h3>
                            <p class="text-gray-600 text-sm leading-relaxed">Ensure access to the premises at the scheduled time. Secure valuables and inform us of any sensitive or fragile items. Provide clear instructions and disclose any hazards.</p>
                        </div>
                    </div>
                    <div class="tooltip absolute bg-white/90 text-[#203e78] text-xs p-2 rounded-md shadow-lg opacity-0 pointer-events-none transition-opacity duration-300">Your responsibilities as a customer</div>
                </div>
                <!-- Term 6 -->
                <div id="term-6" class="relative glass-card bg-white/80 backdrop-blur-lg rounded-xl shadow-lg p-6 transform transition-all duration-300 hover:scale-105 hover:shadow-2xl animate-fade-in-up md:mr-16 md:ml-auto md:w-1/2" style="animation-delay: 0.5s;" data-tooltip="Our liability terms">
                     
                    <div class="flex items-start space-x-4">
                        <div class="flex-shrink-0 bg-gradient-to-br from-[#36a3dc] to-[#203e78] p-3 rounded-full shadow-md">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" /></svg>
                        </div>
                        <div class="flex-1">
                            <h3 class="text-lg font-semibold text-[#203e78] mb-2">6. Liability</h3>
                            <p class="text-gray-600 text-sm leading-relaxed">While we take utmost care, Dubai Cleanup Care is not liable for pre-existing damage or incidental/consequential losses. Any claims must be reported within 24 hours of service completion.</p>
                        </div>
                    </div>
                    <div class="tooltip absolute bg-white/90 text-[#203e78] text-xs p-2 rounded-md shadow-lg opacity-0 pointer-events-none transition-opacity duration-300">Our liability terms</div>
                </div>
                <!-- Term 7 -->
                <div id="term-7" class="relative glass-card bg-white/80 backdrop-blur-lg rounded-xl shadow-lg p-6 transform transition-all duration-300 hover:scale-105 hover:shadow-2xl animate-fade-in-up md:ml-16 md:w-1/2" style="animation-delay: 0.6s;" data-tooltip="Guidelines for user behavior">
                     
                    <div class="flex items-start space-x-4">
                        <div class="flex-shrink-0 bg-gradient-to-br from-[#36a3dc] to-[#203e78] p-3 rounded-full shadow-md">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                        </div>
                        <div class="flex-1">
                            <h3 class="text-lg font-semibold text-[#203e78] mb-2">7. User Conduct</h3>
                            <p class="text-gray-600 text-sm leading-relaxed">You agree not to misuse our website, interfere with other users, or engage in any unlawful activity.</p>
                        </div>
                    </div>
                    <div class="tooltip absolute bg-white/90 text-[#203e78] text-xs p-2 rounded-md shadow-lg opacity-0 pointer-events-none transition-opacity duration-300">Guidelines for user behavior</div>
                </div>
                <!-- Term 8 -->
                <div id="term-8" class="relative glass-card bg-white/80 backdrop-blur-lg rounded-xl shadow-lg p-6 transform transition-all duration-300 hover:scale-105 hover:shadow-2xl animate-fade-in-up md:mr-16 md:ml-auto md:w-1/2" style="animation-delay: 0.7s;" data-tooltip="Intellectual property rights">
                     
                    <div class="flex items-start space-x-4">
                        <div class="flex-shrink-0 bg-gradient-to-br from-[#36a3dc] to-[#203e78] p-3 rounded-full shadow-md">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5z" /><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z" /></svg>
                        </div>
                        <div class="flex-1">
                            <h3 class="text-lg font-semibold text-[#203e78] mb-2">8. Intellectual Property</h3>
                            <p class="text-gray-600 text-sm leading-relaxed">All content on our website, including text, graphics, logos, and images, is the property of Dubai Cleanup Care and protected by copyright laws.</p>
                        </div>
                    </div>
                    <div class="tooltip absolute bg-white/90 text-[#203e78] text-xs p-2 rounded-md shadow-lg opacity-0 pointer-events-none transition-opacity duration-300">Intellectual property rights</div>
                </div>
                <!-- Term 9 -->
                <div id="term-9" class="relative glass-card bg-white/80 backdrop-blur-lg rounded-xl shadow-lg p-6 transform transition-all duration-300 hover:scale-105 hover:shadow-2xl animate-fade-in-up md:ml-16 md:w-1/2" style="animation-delay: 0.8s;" data-tooltip="Our privacy commitment">
                     
                    <div class="flex items-start space-x-4">
                        <div class="flex-shrink-0 bg-gradient-to-br from-[#36a3dc] to-[#203e78] p-3 rounded-full shadow-md">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 11c0-1.104-.896-2-2-2s-2 .896-2 2 2 4 2 4m2-4c0-1.104-.896-2-2-2s-2 .896-2 2 2 4 2 4m6-4c0-1.104-.896-2-2-2s-2 .896-2 2 2 4 2 4m-6-8V3m0 18v-3" /></svg>
                        </div>
                        <div class="flex-1">
                            <h3 class="text-lg font-semibold text-[#203e78] mb-2">9. Privacy Policy</h3>
                            <p class="text-gray-600 text-sm leading-relaxed">Please review our <a href="#" class="text-[#36a3dc] hover:underline">Privacy Policy</a> for information on how we collect, use, and protect your personal data.</p>
                        </div>
                    </div>
                    <div class="tooltip absolute bg-white/90 text-[#203e78] text-xs p-2 rounded-md shadow-lg opacity-0 pointer-events-none transition-opacity duration-300">Our privacy commitment</div>
                </div>
                <!-- Term 10 -->
                <div id="term-10" class="relative glass-card bg-white/80 backdrop-blur-lg rounded-xl shadow-lg p-6 transform transition-all duration-300 hover:scale-105 hover:shadow-2xl animate-fade-in-up md:mr-16 md:ml-auto md:w-1/2" style="animation-delay: 0.9s;" data-tooltip="Updates to these terms">
                     
                    <div class="flex items-start space-x-4">
                        <div class="flex-shrink-0 bg-gradient-to-br from-[#36a3dc] to-[#203e78] p-3 rounded-full shadow-md">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" /></svg>
                        </div>
                        <div class="flex-1">
                            <h3 class="text-lg font-semibold text-[#203e78] mb-2">10. Changes to Terms</h3>
                            <p class="text-gray-600 text-sm leading-relaxed">We may update these Terms at any time. Continued use of the website or services indicates acceptance of the revised Terms.</p>
                        </div>
                    </div>
                    <div class="tooltip absolute bg-white/90 text-[#203e78] text-xs p-2 rounded-md shadow-lg opacity-0 pointer-events-none transition-opacity duration-300">Updates to these terms</div>
                </div>
                <!-- Term 11 -->
                <div id="term-11" class="relative glass-card bg-white/80 backdrop-blur-lg rounded-xl shadow-lg p-6 transform transition-all duration-300 hover:scale-105 hover:shadow-2xl animate-fade-in-up md:ml-16 md:w-1/2" style="animation-delay: 1s;" data-tooltip="Legal jurisdiction details">
                     
                    <div class="flex items-start space-x-4">
                        <div class="flex-shrink-0 bg-gradient-to-br from-[#36a3dc] to-[#203e78] p-3 rounded-full shadow-md">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 14v3m4-3v3m4-3v3M3 21h18M3 10h18M3 7l9-4 9 4M4 10h16v11H4V10z" /></svg>
                        </div>
                        <div class="flex-1">
                            <h3 class="text-lg font-semibold text-[#203e78] mb-2">11. Governing Law</h3>
                            <p class="text-gray-600 text-sm leading-relaxed">These Terms shall be governed by and construed in accordance with the laws of the United Arab Emirates.</p>
                        </div>
                    </div>
                    <div class="tooltip absolute bg-white/90 text-[#203e78] text-xs p-2 rounded-md shadow-lg opacity-0 pointer-events-none transition-opacity duration-300">Legal jurisdiction details</div>
                </div>
            </div>

            <!-- Contact Section with Pulsing Wave -->
            <div class="mt-16 relative bg-gradient-to-r from-[#203e78] to-[#36a3dc] rounded-2xl shadow-2xl py-12 px-8 text-center animate-fade-in-up overflow-hidden">
                <div class="absolute inset-0 wave-bg"></div>
                <h3 class="text-3xl font-bold text-white mb-6 relative z-10">Need Help?</h3>
                <p class="text-base text-gray-200 mb-8 max-w-xl mx-auto relative z-10">Contact us for any questions about our Terms or services—your support is our priority.</p>
                <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 text-sm text-gray-200 relative z-10">
                    <div class="flex items-center justify-center space-x-2">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.3a1 1 0 01.7.3l3 3a1 1 0 010 1.4l-3 3a1 1 0 01-.7.3H5a2 2 0 01-2-2V5zm18 0a2 2 0 00-2-2h-3.3a1 1 0 00-.7.3l-3 3a1 1 0 000 1.4l3 3a1 1 0 00.7.3H19a2 2 0 002-2V5z"/></svg>
                        <a href="mailto:dubaicleanupcare@gmail.com" class="hover:underline hover:text-white">dubaicleanupcare@gmail.com</a>
                    </div>
                    <div class="flex items-center justify-center space-x-2">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5h12a2 2 0 012 2v12a2 2 0 01-2 2H3a2 2 0 01-2-2V7a2 2 0 012-2zm9 4l4 4-4 4m-4-4h8"/></svg>
                        <a href="tel:+971525881279" class="hover:underline hover:text-white">+971 52 588 1279</a>
                    </div>
                    <div class="flex items-center justify-center space-x-2">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l9-6 9 6v12a2 2 0 01-2 2H5a2 2 0 01-2-2V8z"/></svg>
                        <span>Dubai Marina, UAE</span>
                    </div>
                </div>
                <a href="#" class="inline-block mt-6 px-8 py-3 bg-white text-[#203e78] font-semibold text-base rounded-full shadow-lg hover:bg-[#36a3dc] hover:text-white hover:scale-105 focus:outline-none focus:ring-2 focus:ring-[#36a3dc]/50 transition-all duration-300 relative z-10 animate-pulse-cta">Contact Us</a>
            </div>
        </div>
    </section>

    <style>
        /* Glassmorphism and Animations */
        .glass-card {
            border: 1px solid rgba(255, 255, 255, 0.3);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        .glass-card:hover .tooltip {
            opacity: 1;
            pointer-events: auto;
        }
        .tooltip {
            top: -40px; left: 50%; transform: translateX(-50%);
        }
        @keyframes pulse-glow {
            0%, 100% { opacity: 0.6; }
            50% { opacity: 0.4; }
        }
        .animate-pulse-glow {
            animation: pulse-glow 6s ease-in-out infinite;
        }
        @keyframes pulse-dot {
            0%, 100% { transform: scale(1); }
            50% { transform: scale(1.1); }
        }
        .animate-pulse-dot {
            animation: pulse-dot 3s ease-in-out infinite;
        }
        @keyframes pulse-cta {
            0%, 100% { transform: scale(1); }
            50% { transform: scale(1.02); }
        }
        .animate-pulse-cta {
            animation: pulse-cta 4s ease-in-out infinite;
        }
        /* Animated Wave Background */
        .wave-bg {
            background: url('data:image/svg+xml,%3Csvg xmlns=%22http://www.w3.org/2000/svg%22 viewBox=%220 0 1440 320%22%3E%3Cpath fill=%22%23ffffff%22 fill-opacity=%220.2%22 d=%22M0,192L48,181.3C96,171,192,149,288,154.7C384,160,480,192,576,202.7C672,213,768,202,864,186.7C960,171,1056,149,1152,144C1248,139,1344,149,1392,154.7L1440,160L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z%22%3E%3C/path%3E%3C/svg%3E') bottom;
            background-size: 200% 100%;
            animation: wave 18s linear infinite;
        }
        @keyframes wave {
            0% { background-position: 0 0; }
            400% { background-position: 200% 0; }
        }
        /* Custom Scrollbar */
        ::-webkit-scrollbar {
            width: 6px;
        }
        ::-webkit-scrollbar-thumb {
            background: #36a3dc;
            border-radius: 3px;
        }
        ::-webkit-scrollbar-track {
            background: #e2e8f0;
        }
    </style>

    @section('scripts')
        <script>
            // Tooltip Functionality
            document.querySelectorAll('.glass-card').forEach(card => {
                const tooltip = card.querySelector('.tooltip');
                card.addEventListener('mouseenter', () => {
                    const rect = card.getBoundingClientRect();
                    tooltip.style.left = `${rect.left + rect.width / 2}px`;
                    tooltip.style.opacity = '1';
                    tooltip.style.pointerEvents = 'auto';
                });
                card.addEventListener('mouseleave', () => {
                    tooltip.style.opacity = '0';
                    tooltip.style.pointerEvents = 'none';
                });
            });

            // Reading Progress Bar
            window.addEventListener('scroll', () => {
                const winScroll = document.documentElement.scrollTop || document.body.scrollTop;
                const height = document.documentElement.scrollHeight - document.documentElement.clientHeight;
                const scrolled = (winScroll / height) * 100;
                document.getElementById('progressBar').style.width = scrolled + '%';
            });

            // Smooth Scroll for Anchor Links
            document.querySelectorAll('a[href^="#"]').forEach(anchor => {
                anchor.addEventListener('click', function(e) {
                    e.preventDefault();
                    document.querySelector(this.getAttribute('href')).scrollIntoView({
                        behavior: 'smooth'
                    });
                });
            });
        </script>
    @endsection
@endsection