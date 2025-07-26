@extends('layouts.master')

@section('title', $service->title . ' | Dubai Cleanup & Maintenance')

@section('full-width-content')
    @php
        $whatsapp_number = '+971522515407';
        $message = "Hello, I would like to book the " . $service->title . " service.";
        $encoded_message = urlencode($message);
        $whatsapp_url = "whatsapp://send?phone={$whatsapp_number}&text={$encoded_message}";
        $fallback_url = "https://wa.me/{$whatsapp_number}?text={$encoded_message}";
    @endphp
    <section class="py-20 px-4 sm:px-6 lg:px-8 relative bg-gradient-to-b from-[#f8fafc] to-[#f1f5f9] overflow-hidden" role="region" aria-label="Service Details">
        <!-- Background Wave -->
        <div class="absolute inset-0 opacity-10 pointer-events-none">
            <svg class="w-full h-full" viewBox="0 0 1440 320" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path fill="#36a3dc" fill-opacity="0.2" d="M0,192L48,181.3C96,171,192,149,288,154.7C384,160,480,192,576,202.7C672,213,768,202,864,186.7C960,171,1056,149,1152,144C1248,139,1344,149,1392,154.7L1440,160L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path>
            </svg>
        </div>
        <div class="relative max-w-7xl mx-auto">
            <!-- Hero Section -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center mb-16">
                <!-- Image -->
                <div class="animate-fade-in-up">
                    @if($service->image)
                        <img src="/storage/{{ $service->image }}" class="w-full h-[450px] object-cover rounded-2xl shadow-xl" alt="{{ $service->title }}">
                    @else
                        <div class="w-full h-[450px] flex items-center justify-center bg-gradient-to-br from-[#36a3dc] to-[#203e78] rounded-2xl shadow-xl">
                            <svg class="w-20 h-20 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                            </svg>
                        </div>
                    @endif
                </div>
                <!-- Details -->
                <div class="animate-fade-in-up" style="animation-delay: 0.2s;">
                    <h2 class="text-4xl md:text-5xl font-bold text-[#203e78] mb-4">{{ $service->title }}</h2>
                    <p class="text-lg text-gray-600 mb-6" style="line-height: 1.8;">{{ $service->description }}</p>
                    <p class="text-md text-gray-500 mb-8">Service Type: <span class="font-semibold text-[#36a3dc]">{{ $service->type }}</span></p>
                    <a href="{{ $whatsapp_url }}" onclick="window.open('{{ $fallback_url }}', '_blank'); return !window.WhatsApp;" class="gradient-btn inline-block px-8 py-4 text-white font-semibold text-lg rounded-full shadow-lg focus:outline-none focus:ring-2 focus:ring-[#36a3dc] transition-all duration-300">Book This Service</a>
                </div>
            </div>

            <!-- Features Section -->
            <div class="mb-16">
                <h3 class="text-3xl font-bold text-[#203e78] text-center mb-8 animate-fade-in-up">Why Choose {{ $service->title }}?</h3>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                    <div class="bg-white rounded-xl shadow-lg p-6 text-center animate-fade-in-up" style="animation-delay: 0.2s;">
                        <svg class="w-12 h-12 text-[#36a3dc] mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                        <h4 class="text-xl font-semibold text-[#203e78] mb-2">Premium Quality</h4>
                        <p class="text-gray-600">Our {{ $service->type }} services use top-tier equipment and eco-friendly products for exceptional results.</p>
                    </div>
                    <div class="bg-white rounded-xl shadow-lg p-6 text-center animate-fade-in-up" style="animation-delay: 0.4s;">
                        <svg class="w-12 h-12 text-[#36a3dc] mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <h4 class="text-xl font-semibold text-[#203e78] mb-2">Timely Service</h4>
                        <p class="text-gray-600">We respect your schedule, delivering prompt and efficient {{ $service->type }} solutions.</p>
                    </div>
                    <div class="bg-white rounded-xl shadow-lg p-6 text-center animate-fade-in-up" style="animation-delay: 0.6s;">
                        <svg class="w-12 h-12 text-[#36a3dc] mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 005.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                        </svg>
                        <h4 class="text-xl font-semibold text-[#203e78] mb-2">Expert Team</h4>
                        <p class="text-gray-600">Our skilled professionals are trained to handle all your {{ $service->type }} needs with precision.</p>
                    </div>
                </div>
            </div>

            <!-- Call-to-Action Banner -->
            <div class="bg-gradient-to-r from-[#203e78] to-[#36a3dc] text-white py-12 px-8 rounded-2xl shadow-xl text-center mb-16 animate-fade-in-up">
                <h3 class="text-3xl font-bold mb-4">Ready to Transform Your Space?</h3>
                <p class="text-lg mb-6 max-w-2xl mx-auto">Book our {{ $service->title }} service today and experience the difference of a spotless, well-maintained environment.</p>
                <a href="/booking" class="gradient-btn inline-block px-8 py-4 text-white font-semibold text-lg rounded-full shadow-lg focus:outline-none focus:ring-2 focus:ring-white transition-all duration-300">Get Started Now</a>
            </div>

            <!-- Testimonials Section -->
            @if($service->reviews && $service->reviews->count() > 0)
                <div class="mb-16">
                    <h3 class="text-3xl font-bold text-[#203e78] text-center mb-8 animate-fade-in-up">What Our Clients Say</h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                        @foreach($service->reviews->take(2) as $review)
                            <div class="bg-white rounded-xl shadow-lg p-6 animate-fade-in-up" style="animation-delay: {{ $loop->index * 0.2 }}s;">
                                <div class="flex items-center mb-4">
                                    @for($i = 0; $i < 5; $i++)
                                        <svg class="w-5 h-5 {{ $i < $review->rating ? 'text-yellow-400' : 'text-gray-300' }}" fill="currentColor" viewBox="0 0 20 20">
                                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.286 3.97a1 1 0 00.95.69h4.15c.969 0 1.371 1.24.588 1.81l-3.357 2.44a1 1 0 00-.364 1.118l1.287 3.97c.3.921-.755 1.688-1.54 1.118l-3.357-2.44a1 1 0 00-1.175 0l-3.357 2.44c-.784.57-1.838-.197-1.54-1.118l1.287-3.97a1 1 0 00-.364-1.118L2.45 9.397c-.784-.57-.38-1.81.588-1.81h4.15a1 1 0 00.95-.69l1.286-3.97z"/>
                                        </svg>
                                    @endfor
                                </div>
                                <p class="text-gray-600 mb-4" style="line-height: 1.6;">"{{ $review->comment }}"</p>
                                <p class="text-sm font-semibold text-[#203e78]">{{ $review->user->name ?? 'Anonymous' }}</p>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif

            <!-- Review Submission Form -->
            @auth
                <div class="mb-16">
                    <h3 class="text-3xl font-bold text-[#203e78] text-center mb-8 animate-fade-in-up">Leave Your Review</h3>
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
                    <form action="/services/{{ $service->id }}/review" method="POST" class="max-w-3xl mx-auto bg-white rounded-2xl shadow-xl p-8 animate-fade-in-up" style="animation-delay: 0.2s;">
                        @csrf
                        <input type="hidden" name="service_id" value="{{ $service->id }}">
                        <input type="hidden" name="user_id" value="{{ auth()->id() }}">
                        <div class="mb-6">
                            <label for="rating" class="block text-sm font-semibold text-[#203e78] mb-2">Rating</label>
                            <select id="rating" name="rating" required class="form-input w-full px-4 py-3 rounded-lg focus:outline-none border-gray-300 focus:ring-2 focus:ring-[#36a3dc]" aria-required="true">
                                <option value="" disabled selected>Select a rating</option>
                                @for($i = 1; $i <= 5; $i++)
                                    <option value="{{ $i }}" {{ old('rating') == $i ? 'selected' : '' }}>{{ $i }} Star{{ $i > 1 ? 's' : '' }}</option>
                                @endfor
                            </select>
                        </div>
                        <div class="mb-6">
                            <label for="comment" class="block text-sm font-semibold text-[#203e78] mb-2">Comment</label>
                            <textarea id="comment" name="comment" required class="form-input w-full px-4 py-3 rounded-lg focus:outline-none border-gray-300 focus:ring-2 focus:ring-[#36a3dc]" rows="4" placeholder="Share your experience..." aria-required="true">{{ old('comment') }}</textarea>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="gradient-btn inline-block px-8 py-4 text-white font-semibold text-lg rounded-full shadow-lg focus:outline-none focus:ring-2 focus:ring-[#36a3dc] transition-all duration-300 animate-pulse">Submit Review</button>
                        </div>
                    </form>
                </div>
            @else
                <div class="mb-16 text-center">
                    <p class="text-lg text-gray-600 animate-fade-in-up">Please <a href="/login" class="text-[#36a3dc] hover:underline font-semibold">log in</a> to leave a review for {{ $service->title }}.</p>
                </div>
            @endauth

            <!-- Related Services Section -->
            @if($relatedServices && $relatedServices->count() > 0)
                <div>
                    <h3 class="text-3xl font-bold text-[#203e78] text-center mb-8 animate-fade-in-up">Explore More Services</h3>
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                        @foreach($relatedServices as $relatedService)
                            <a href="/services/{{ $relatedService->id }}" class="bg-white rounded-xl shadow-lg overflow-hidden transform hover:scale-105 hover:shadow-2xl transition-all duration-500 animate-fade-in-up" style="animation-delay: {{ $loop->index * 0.2 }}s;">
                                <div class="relative h-64">
                                    @if($relatedService->image)
                                        <img src="/storage/{{ $relatedService->image }}" class="w-full h-full object-cover" alt="{{ $relatedService->title }}">
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
                                    <h4 class="text-xl font-semibold text-[#203e78] mb-2">{{ $relatedService->title }}</h4>
                                    <p class="text-gray-600 text-sm" style="line-height: 1.6;">{{ Str::limit($relatedService->description, 80) }}</p>
                                </div>
                            </a>
                        @endforeach
                    </div>
                </div>
            @endif
        </div>
    </section>

    <style>
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
    </style>
@endsection