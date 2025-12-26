@extends('layout.Auth')

@section('content')
    <!-- Login Form -->
    <form action="{{ route('process.login') }}" method="POST" class="bg-gray-900 border border-gray-800 rounded-lg p-8 space-y-6">
        @csrf
        <!-- Username Field -->
        <div>
            <label for="email" class="block text-sm font-medium text-white mb-2">Username</label>
            <div class="relative">
                <svg class="absolute left-3 top-3.5 w-5 h-5 text-gray-500" fill="none" stroke="currentColor"
                    viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                </svg>
                <input type="text" id="email" placeholder="username" name="username"
                    class="w-full bg-gray-800 border border-gray-700 rounded pl-10 pr-4 py-2.5 text-gray-100 placeholder-gray-500 focus:outline-none focus:border-white focus:ring-1 focus:ring-white transition"
                    required>
            </div>
        </div>

        <!-- Password Field -->
        <div>
            <div class="relative">
                <svg class="absolute left-3 top-3.5 w-5 h-5 text-gray-500" fill="none" stroke="currentColor"
                    viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                </svg>
                <input type="password" id="password" placeholder="Masukkan password" name="password"
                    class="w-full bg-gray-800 border border-gray-700 rounded pl-10 pr-10 py-2.5 text-gray-100 placeholder-gray-500 focus:outline-none focus:border-white focus:ring-1 focus:ring-white transition"
                    required>
                <button type="button" onclick="togglePassword()"
                    class="absolute right-3 top-3.5 text-gray-500 hover:text-gray-300 transition">
                    <svg class="w-5 h-5" id="eyeIcon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                    </svg>
                </button>
            </div>
        </div>


        <!-- Submit Button -->
        <button type="submit"
            class="w-full bg-white text-gray-950 font-semibold py-2.5 rounded hover:bg-gray-100 transition active:scale-95 duration-150">
            Login
        </button>
    </form>
@endsection
