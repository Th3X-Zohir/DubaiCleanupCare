@extends('layouts.master')

@section('title', 'Login')

@section('content')
    <div class="max-w-md mx-auto bg-white p-8 rounded-lg shadow-lg">
        <h2 class="text-3xl font-semibold text-center text-[#203e78] mb-6">Login</h2>

        @if ($errors->any())
            <div class="mb-4 p-3 bg-red-100 text-red-700 rounded border border-red-300">
                {{ $errors->first() }}
            </div>
        @endif

        <form method="POST" action="{{ url('/login') }}" class="space-y-6">
            @csrf

            <div>
                <label for="email" class="block mb-2 font-medium text-gray-700">Email</label>
                <input 
                    type="email" 
                    name="email" 
                    id="email" 
                    required 
                    autofocus
                    class="w-full px-4 py-3 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-[#36a3dc]"
                    value="{{ old('email') }}"
                >
            </div>

            <div>
                <label for="password" class="block mb-2 font-medium text-gray-700">Password</label>
                <input 
                    type="password" 
                    name="password" 
                    id="password" 
                    required 
                    class="w-full px-4 py-3 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-[#36a3dc]"
                >
            </div>

            <button 
                type="submit" 
                class="w-full py-3 bg-[#36a3dc] hover:bg-[#203e78] text-white font-semibold rounded transition"
            >
                Login
            </button>
        </form>

        <p class="mt-6 text-center text-gray-600">
            Don't have an account? 
            <a href="{{ url('/register') }}" class="text-[#203e78] hover:text-[#2a8cc0] font-semibold">Register</a>
        </p>
    </div>
@endsection