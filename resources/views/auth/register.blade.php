@extends('layouts.master')

@section('title', 'Register')

@section('content')
    <div class="max-w-md mx-auto bg-white p-8 rounded-lg shadow-lg">
        <h2 class="text-3xl font-semibold text-center text-[#203e78] mb-6">Register</h2>

        @if ($errors->any())
            <div class="mb-4 p-3 bg-red-100 text-red-700 rounded border border-red-300">
                <ul class="list-disc list-inside">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ url('/register') }}" class="space-y-6">
            @csrf

            <div>
                <label for="name" class="block mb-2 font-medium text-gray-700">Name</label>
                <input
                    type="text"
                    name="name"
                    id="name"
                    value="{{ old('name') }}"
                    required
                    autofocus
                    class="w-full px-3 py-2 bg-white border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#36a3dc]"
                >
            </div>

            <div>
                <label for="block mb-2 font-semibold text-gray-600">Email</label>
                <input
                    type="email"
                    name="email"
                    value="{{ old('email') }}"
                    required
                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#36a3dc]"
                >
            </div>

            <div>
                <label for="number" class="block mb-2 font-medium text-gray-700">Number</label>
                <input
                    type="number"
                    name="number"
                    id="number"
                    value="{{ old('number') }}"
                    required
                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#36a3dc]"
                >
            </div>

            <div>
                <label for="password" class="block mb-2 font-medium text-gray-700">Password</label>
                <input
                    type="password"
                    name="password"
                    id="password"
                    required
                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#36a3dc]"
                >
            </div>

            <div>
                <label for="password_confirmation" class="block mb-2 font-medium text-gray-700">Confirm Password</label>
                <input
                    type="password"
                    name="password_confirmation"
                    id="password_confirmation"
                    required
                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#36a3dc]"
                >
            </div>

            <button
                type="submit"
                class="w-full py-3 bg-[#36a3dc] hover:bg-[#203e78] text-white font-semibold rounded transition"
            >
                Register
            </button>
        </form>

        <p class="mt-6 text-center text-gray-600">
            Already have an account? 
            <a href="{{ url('/login') }}" class="text-[#203e78] hover:text-[#2a8cc0] font-semibold">Login</a>
        </p>
    </div>
@endsection