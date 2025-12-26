<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - LotzzBlog</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-950 text-gray-100">
    <div class="min-h-screen flex items-center justify-center px-4">
        <div class="w-full max-w-md">

            <!-- Logo & Title -->
            <div class="text-center mb-10">
                <h1 class="text-3xl font-bold text-white mb-2 italic">LotzzBlog</h1>
                <p class="text-gray-400">Platform Manajemen Blog Modern</p>
            </div>

            <div>
                @yield('content')
            </div>



            <!-- Footer Links -->
            <div
            class="flex items-center justify-center gap-4 text-xs text-gray-500 mt-8 pt-8 border-t border-gray-800">
            <a href="#" class="hover:text-gray-300 transition">Syarat & Ketentuan</a>
            <span>•</span>
            <a href="#" class="hover:text-gray-300 transition">Kebijakan Privasi</a>
            <span>•</span>
            <a href="#" class="hover:text-gray-300 transition">Kontak Support</a>
        </div>

    </div>

    <!-- Background Decoration -->
    <div class="fixed inset-0 -z-10 overflow-hidden">
        <div class="absolute top-20 left-10 w-72 h-72 bg-white/5 rounded-full blur-3xl"></div>
        <div class="absolute bottom-32 right-10 w-96 h-96 bg-white/5 rounded-full blur-3xl"></div>
    </div>
    </div>

    {{-- <script>
        function togglePassword() {
            const passwordInput = document.getElementById('password');
            const eyeIcon = document.getElementById('eyeIcon');

            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                eyeIcon.innerHTML =
                    `<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-4.803m5.596-3.856a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0M15 12a3 3 0 11-6 0 3 3 0 016 0zm6 0a9 9 0 11-18 0 9 9 0 0118 0z" />`;
            } else {
                passwordInput.type = 'password';
                eyeIcon.innerHTML =
                    `<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" /><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />`;
            }
        }

        // Form submission
        document.querySelector('form').addEventListener('submit', function(e) {
            e.preventDefault();
            const email = document.getElementById('email').value;
            const password = document.getElementById('password').value;
            const remember = document.getElementById('remember').checked;

            console.log('Login dengan:', {
                email,
                password,
                remember
            });
            // Kirim ke backend
        });

        // Email validation
        const emailInput = document.getElementById('email');
        emailInput.addEventListener('blur', function() {
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (this.value && !emailRegex.test(this.value)) {
                this.classList.add('border-red-500');
            } else {
                this.classList.remove('border-red-500');
            }
        });
    </script> --}}

</body>

</html>
