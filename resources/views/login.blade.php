@extends('layout.app')

@section('title')
    Register Page
@endsection

@section('hero')
    <div class="w-full max-w-md bg-white rounded-xl shadow-lg p-8">
        @session('registerSuccesful')
            <div class="rounded-full bg-green-100 p-3">
                <!-- Check Icon -->
                <svg xmlns="http://www.w3.org/2000/svg"
                    class="h-6 w-6 text-green-600"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M5 13l4 4L19 7"/>
                </svg>

                {{ $value }}
            </div>
        @endsession
        
        @session('error')
            <div class="rounded-full bg-red-100 p-3">
                <!-- Check Icon -->
                {{ $value }}
            </div>
        @endsession


        <div class="text-center my-6">
            <h1 class="text-3xl font-bold text-gray-800">Welcome Back </h1>
            <p class="text-gray-500 mt-2">Log into your account to continue.</p>
        </div>

        <form action="{{ route('login') }}" method="POST" class="space-y-5">
        @csrf
        

            <!-- Email -->
            <div>
                <label for="email" class="block text-sm font-medium text-gray-700 mb-1">
                    Email Address
                </label>
                <input
                    type="email"
                    id="email"
                    name="email"
                    placeholder="john@example.com"
                    value="{{ old('email') }}"
                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition"
                >
                @error('email')
                    <span class="text-red-500">
                        {{ $message }}*
                    </span>
                @enderror

            </div>

            <!-- Password -->
            <div>
                <label for="password" class="block text-sm font-medium text-gray-700 mb-1">
                    Password
                </label>
                <input
                    type="password"
                    id="password"
                    name="password"
                    placeholder="••••••••"
                    
                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition"
                >
                @error('password')
                    <span class="text-red-500">
                        {{ $message }}*
                    </span>
                @enderror

            </div>

        
            <!-- Submit Button -->
            <button
                type="submit"
                class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-3 rounded-lg transition duration-200"
            >
                Login
            </button>

        </form>

        <p class="text-center text-sm text-gray-600 mt-6">
           Don't have an account?
            <a href="{{ route('register') }}" class="text-blue-600 hover:underline font-medium">
                Register
            </a>
        </p>
    </div>
@endsection


