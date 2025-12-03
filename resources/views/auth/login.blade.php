<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Login - Vaultio</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://cdn.tailwindcss.com"></script>    <style>
        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-20px); }
        }
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        @keyframes slideIn {
            from {
                opacity: 0;
                transform: translateX(-20px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }
        .animate-float {
            animation: float 6s ease-in-out infinite;
        }
        .animate-fadeIn {
            animation: fadeIn 0.6s ease-out forwards;
        }
        .animate-slideIn {
            animation: slideIn 0.6s ease-out forwards;
        }
        .delay-100 { animation-delay: 0.1s; }
        .delay-200 { animation-delay: 0.2s; }
        .delay-300 { animation-delay: 0.3s; }
        
        .gradient-bg {
            background: radial-gradient(circle at 20% 50%, rgba(99, 102, 241, 0.15) 0%, transparent 50%),
                        radial-gradient(circle at 80% 80%, rgba(139, 92, 246, 0.15) 0%, transparent 50%);
        }
        
        .glass-effect {
            background: rgba(17, 24, 39, 0.8);
            backdrop-filter: blur(16px);
            border: 1px solid rgba(255, 255, 255, 0.1);
        }
        
        .input-field {
            transition: all 0.3s ease;
        }
        .input-field:focus {
            transform: translateY(-2px);
            box-shadow: 0 10px 30px rgba(99, 102, 241, 0.3);
        }
        
        .btn-primary {
            position: relative;
            overflow: hidden;
        }
        .btn-primary::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent);
            transition: left 0.5s;
        }
        .btn-primary:hover::before {
            left: 100%;
        }
        
        .checkbox-custom {
            appearance: none;
            width: 20px;
            height: 20px;
            border: 2px solid #4F46E5;
            border-radius: 4px;
            background-color: transparent;
            cursor: pointer;
            position: relative;
            transition: all 0.3s ease;
        }
        .checkbox-custom:checked {
            background-color: #4F46E5;
            border-color: #4F46E5;
        }
        .checkbox-custom:checked::after {
            content: '✓';
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            color: white;
            font-size: 14px;
            font-weight: bold;
        }
        .checkbox-custom:hover {
            border-color: #6366F1;
            box-shadow: 0 0 10px rgba(99, 102, 241, 0.5);
        }
    </style>
</head>

<body class="bg-gray-950 text-white min-h-screen flex items-center justify-center overflow-hidden">
    <!-- Background gradient overlay -->
    <div class="fixed inset-0 gradient-bg pointer-events-none"></div>
    
    <!-- Animated background elements -->
    <div class="fixed top-20 left-10 w-72 h-72 bg-indigo-600 rounded-full mix-blend-multiply filter blur-3xl opacity-20 animate-float"></div>
    <div class="fixed bottom-20 right-10 w-96 h-96 bg-purple-600 rounded-full mix-blend-multiply filter blur-3xl opacity-20 animate-float" style="animation-delay: 2s;"></div>

    <!-- Main Container -->
    <div class="relative z-10 w-full max-w-6xl mx-auto px-6 py-12">
        <div class="grid lg:grid-cols-2 gap-12 items-center">
            
            <!-- Left Side - Branding -->
            <div class="hidden lg:block opacity-0 animate-fadeIn">
                <a href="/" class="inline-flex items-center space-x-3 mb-8 group">
                    <div class="w-12 h-12 rounded-xl flex items-center justify-center transform group-hover:scale-110 transition-transform duration-300">
                        <img src="vaultio2.png">
                    </div>
                    <span class="text-2xl font-bold bg-gradient-to-r from-indigo-400 to-purple-400 bg-clip-text text-transparent">Vaultio</span>
                </a>
                
                <h1 class="text-5xl font-black leading-tight mb-6">
                    Welcome<br>
                    <span class="bg-gradient-to-r from-indigo-400 via-purple-400 to-pink-400 bg-clip-text text-transparent">
                        Back
                    </span>
                </h1>
                
                <p class="text-gray-400 text-lg mb-8 leading-relaxed">
                    Access your personal cloud drive securely. Your files are waiting for you, anytime, anywhere.
                </p>
                
                <div class="space-y-4">
                    <div class="flex items-center space-x-3 opacity-0 animate-slideIn delay-100">
                        <div class="w-12 h-12 bg-indigo-500/20 rounded-lg flex items-center justify-center flex-shrink-0">
                            <svg class="w-6 h-6 text-indigo-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                            </svg>
                        </div>
                        <div>
                            <p class="font-semibold text-white">Secure Login</p>
                            <p class="text-sm text-gray-400">Protected with encryption</p>
                        </div>
                    </div>
                    
                    <div class="flex items-center space-x-3 opacity-0 animate-slideIn delay-200">
                        <div class="w-12 h-12 bg-purple-500/20 rounded-lg flex items-center justify-center flex-shrink-0">
                            <svg class="w-6 h-6 text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                            </svg>
                        </div>
                        <div>
                            <p class="font-semibold text-white">Instant Access</p>
                            <p class="text-sm text-gray-400">Get to your files quickly</p>
                        </div>
                    </div>
                    
                    <div class="flex items-center space-x-3 opacity-0 animate-slideIn delay-300">
                        <div class="w-12 h-12 bg-pink-500/20 rounded-lg flex items-center justify-center flex-shrink-0">
                            <svg class="w-6 h-6 text-pink-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9"></path>
                            </svg>
                        </div>
                        <div>
                            <p class="font-semibold text-white">Access Anywhere</p>
                            <p class="text-sm text-gray-400">From any device, globally</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right Side - Login Form -->
            <div class="opacity-0 animate-fadeIn delay-200">
                <!-- Mobile Logo -->
                <div class="lg:hidden mb-8">
                    <a href="/" class="inline-flex items-center space-x-3 group">
                        <div class="w-12 h-12 bg-gradient-to-br rounded-xl flex items-center justify-center transform group-hover:scale-110 transition-transform duration-300">
                            <img src="vaultio2.png">
                        </div>
                        <span class="text-2xl font-bold bg-gradient-to-r from-indigo-400 to-purple-400 bg-clip-text text-transparent">Vaultio</span>
                    </a>
                </div>

                <div class="glass-effect rounded-3xl p-8 lg:p-10 shadow-2xl">
                    <div class="mb-8">
                        <h2 class="text-3xl font-bold mb-2">Sign In</h2>
                        <p class="text-gray-400">Enter your credentials to access your account</p>
                    </div>

                    <!-- Session Status - Replace with your Laravel component -->
                    <div class="mb-6 p-4 bg-green-500/10 border border-green-500/30 rounded-xl text-green-400 text-sm hidden" id="status-message">
                        <!-- Session status messages go here -->
                    </div>

                    <form method="POST" action="{{ route('login') }}" class="space-y-6">
                    @csrf

                        
                        <!-- Email Address -->
                        <div>
                            <label for="email" class="block text-sm font-semibold text-gray-300 mb-2">
                                Email Address
                            </label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                    <svg class="w-5 h-5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207"></path>
                                    </svg>
                                </div>
                                <input 
                                    id="email" 
                                    type="email" 
                                    name="email" 
                                    required 
                                    autofocus 
                                    autocomplete="username"
                                    class="input-field w-full pl-12 pr-4 py-3.5 bg-gray-900/50 border border-gray-700 rounded-xl text-white placeholder-gray-500 focus:outline-none focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500/50"
                                    placeholder="you@example.com"
                                >
                            </div>
                            <!-- Error message - Replace with your Laravel error component -->
                            <p class="mt-2 text-sm text-red-400 hidden" id="email-error">
                                <!-- Email error messages go here -->
                            </p>
                        </div>

                        <!-- Password -->
                        <div>
                            <label for="password" class="block text-sm font-semibold text-gray-300 mb-2">
                                Password
                            </label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                    <svg class="w-5 h-5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                                    </svg>
                                </div>
                                <input 
                                    id="password" 
                                    type="password" 
                                    name="password" 
                                    required 
                                    autocomplete="current-password"
                                    class="input-field w-full pl-12 pr-12 py-3.5 bg-gray-900/50 border border-gray-700 rounded-xl text-white placeholder-gray-500 focus:outline-none focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500/50"
                                    placeholder="Enter your password"
                                >
                                <button 
                                    type="button" 
                                    onclick="togglePassword()"
                                    class="absolute inset-y-0 right-0 pr-4 flex items-center text-gray-500 hover:text-gray-300 transition-colors"
                                >
                                    <svg id="eye-icon" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                    </svg>
                                </button>
                            </div>
                            <!-- Error message - Replace with your Laravel error component -->
                            <p class="mt-2 text-sm text-red-400 hidden" id="password-error">
                                <!-- Password error messages go here -->
                            </p>
                        </div>

                        <!-- Remember Me & Forgot Password -->
                        <div class="flex items-center justify-between">
                            <label class="inline-flex items-center cursor-pointer group">
                                <input 
                                    id="remember_me" 
                                    type="checkbox" 
                                    name="remember"
                                    class="checkbox-custom"
                                >
                                <span class="ml-3 text-sm text-gray-400 group-hover:text-gray-300 transition-colors">
                                    Remember me
                                </span>
                            </label>

                            <a 
                                href="/password/reset" 
                                class="text-sm text-indigo-400 hover:text-indigo-300 font-medium transition-colors"
                            >
                                Forgot password?
                            </a>
                        </div>

                        <!-- Submit Button -->
                        <button 
                            type="submit"
                            class="btn-primary w-full py-4 rounded-xl bg-gradient-to-r from-indigo-600 to-purple-600 hover:from-indigo-700 hover:to-purple-700 text-white font-bold text-lg shadow-lg shadow-indigo-500/50 transition-all duration-300 transform hover:scale-[1.02] hover:shadow-xl hover:shadow-indigo-500/50 flex items-center justify-center space-x-2"
                        >
                            <span>Sign In</span>
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                            </svg>
                        </button>

                        <!-- Divider -->
                        <div class="relative">
                            <div class="absolute inset-0 flex items-center">
                                <div class="w-full border-t border-gray-700"></div>
                            </div>
                            <div class="relative flex justify-center text-sm">
                                <span class="px-4 bg-gray-900 text-gray-400">Don't have an account?</span>
                            </div>
                        </div>

                        <!-- Register Link -->
                        <a 
                            href="/register" 
                            class="block w-full py-4 rounded-xl border-2 border-gray-700 hover:border-indigo-500 text-center text-gray-300 hover:text-white font-semibold transition-all duration-300 hover:bg-gray-800/50"
                        >
                            Create New Account
                        </a>
                    </form>
                </div>

                <!-- Back to Home -->
                <div class="mt-6 text-center">
                    <a href="/" class="inline-flex items-center space-x-2 text-gray-400 hover:text-white transition-colors group">
                        <svg class="w-4 h-4 group-hover:-translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                        </svg>
                        <span class="text-sm">Back to Home</span>
                    </a>
                </div>
            </div>

        </div>
    </div>

    <script>
        function togglePassword() {
            const passwordInput = document.getElementById('password');
            const eyeIcon = document.getElementById('eye-icon');
            
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                eyeIcon.innerHTML = `
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21"></path>
                `;
            } else {
                passwordInput.type = 'password';
                eyeIcon.innerHTML = `
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                `;
            }
        }
    </script>

</body>
</html>