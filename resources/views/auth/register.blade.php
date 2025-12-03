<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Register - Vaultio</title>
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
        @keyframes scaleIn {
            from {
                opacity: 0;
                transform: scale(0.95);
            }
            to {
                opacity: 1;
                transform: scale(1);
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
        .animate-scaleIn {
            animation: scaleIn 0.6s ease-out forwards;
        }
        .delay-100 { animation-delay: 0.1s; }
        .delay-200 { animation-delay: 0.2s; }
        .delay-300 { animation-delay: 0.3s; }
        .delay-400 { animation-delay: 0.4s; }
        
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

        .progress-step {
            position: relative;
        }
        .progress-step::after {
            content: '';
            position: absolute;
            top: 50%;
            left: 100%;
            width: 100%;
            height: 2px;
            background: linear-gradient(to right, #4F46E5, transparent);
            transform: translateY(-50%);
        }
        .progress-step:last-child::after {
            display: none;
        }
    </style>
</head>

<body class="bg-gray-950 text-white min-h-screen flex items-center justify-center overflow-hidden py-8">
    <!-- Background gradient overlay -->
    <div class="fixed inset-0 gradient-bg pointer-events-none"></div>
    
    <!-- Animated background elements -->
    <div class="fixed top-20 left-10 w-72 h-72 bg-indigo-600 rounded-full mix-blend-multiply filter blur-3xl opacity-20 animate-float"></div>
    <div class="fixed bottom-20 right-10 w-96 h-96 bg-purple-600 rounded-full mix-blend-multiply filter blur-3xl opacity-20 animate-float" style="animation-delay: 2s;"></div>
    <div class="fixed top-1/2 left-1/2 w-80 h-80 bg-pink-600 rounded-full mix-blend-multiply filter blur-3xl opacity-10 animate-float" style="animation-delay: 4s;"></div>

    <!-- Main Container -->
    <div class="relative z-10 w-full max-w-6xl mx-auto px-6">
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
                    Start Your<br>
                    <span class="bg-gradient-to-r from-indigo-400 via-purple-400 to-pink-400 bg-clip-text text-transparent">
                        Journey
                    </span>
                </h1>
                
                <p class="text-gray-400 text-lg mb-8 leading-relaxed">
                    Join thousands of users who trust Vaultio for secure, reliable cloud storage. Get started in seconds.
                </p>

                <!-- Progress Steps -->
                <div class="space-y-6 mb-8">
                    <div class="flex items-start space-x-4 opacity-0 animate-slideIn delay-100">
                        <div class="flex-shrink-0 w-10 h-10 bg-gradient-to-br from-indigo-500 to-indigo-600 rounded-full flex items-center justify-center font-bold shadow-lg shadow-indigo-500/50">
                            1
                        </div>
                        <div>
                            <p class="font-semibold text-white mb-1">Create Your Account</p>
                            <p class="text-sm text-gray-400">Quick and easy registration process</p>
                        </div>
                    </div>
                    
                    <div class="flex items-start space-x-4 opacity-0 animate-slideIn delay-200">
                        <div class="flex-shrink-0 w-10 h-10 bg-gradient-to-br from-purple-500 to-purple-600 rounded-full flex items-center justify-center font-bold shadow-lg shadow-purple-500/50">
                            2
                        </div>
                        <div>
                            <p class="font-semibold text-white mb-1">Verify Your Email</p>
                            <p class="text-sm text-gray-400">Secure your account with verification</p>
                        </div>
                    </div>
                    
                    <div class="flex items-start space-x-4 opacity-0 animate-slideIn delay-300">
                        <div class="flex-shrink-0 w-10 h-10 bg-gradient-to-br from-pink-500 to-pink-600 rounded-full flex items-center justify-center font-bold shadow-lg shadow-pink-500/50">
                            3
                        </div>
                        <div>
                            <p class="font-semibold text-white mb-1">Start Uploading</p>
                            <p class="text-sm text-gray-400">Access your files from anywhere</p>
                        </div>
                    </div>
                </div>

                <!-- Benefits -->
                <div class="glass-effect rounded-2xl p-6 space-y-3 opacity-0 animate-scaleIn delay-400">
                    <div class="flex items-center space-x-3 text-sm">
                        <svg class="w-5 h-5 text-green-400 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                        <span class="text-gray-300">Free unlimited uploads</span>
                    </div>
                    <div class="flex items-center space-x-3 text-sm">
                        <svg class="w-5 h-5 text-green-400 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                        <span class="text-gray-300">Bank-level encryption</span>
                    </div>
                    <div class="flex items-center space-x-3 text-sm">
                        <svg class="w-5 h-5 text-green-400 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                        <span class="text-gray-300">24/7 access from any device</span>
                    </div>
                    <div class="flex items-center space-x-3 text-sm">
                        <svg class="w-5 h-5 text-green-400 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                        <span class="text-gray-300">No credit card required</span>
                    </div>
                </div>
            </div>

            <!-- Right Side - Register Form -->
            <div class="opacity-0 animate-fadeIn delay-200">
                <!-- Mobile Logo -->
                <div class="lg:hidden mb-8">
                    <a href="/" class="inline-flex items-center space-x-3 group">
                        <div class="w-12 h-12 rounded-xl flex items-center justify-center transform group-hover:scale-110 transition-transform duration-300">
                            <img src="vaultio2.png">
                        </div>
                        <span class="text-2xl font-bold bg-gradient-to-r from-indigo-400 to-purple-400 bg-clip-text text-transparent">Vaultio</span>
                    </a>
                </div>

                <div class="glass-effect rounded-3xl p-8 lg:p-10 shadow-2xl">
                    <div class="mb-8">
                        <h2 class="text-3xl font-bold mb-2">Create Account</h2>
                        <p class="text-gray-400">Join Vaultio and start storing your files securely</p>
                    </div>

                    <form method="POST" action="/register" class="space-y-5">
                    @csrf                        
                        <!-- Name -->
                        <div>
                            <label for="name" class="block text-sm font-semibold text-gray-300 mb-2">
                                Full Name
                            </label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                    <svg class="w-5 h-5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                    </svg>
                                </div>
                                <input 
                                    id="name" 
                                    type="text" 
                                    name="name" 
                                    required 
                                    autofocus 
                                    autocomplete="name"
                                    class="input-field w-full pl-12 pr-4 py-3.5 bg-gray-900/50 border border-gray-700 rounded-xl text-white placeholder-gray-500 focus:outline-none focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500/50"
                                    placeholder="John Doe"
                                >
                            </div>
                            <!-- Error message - Replace with your Laravel error component -->
                            <p class="mt-2 text-sm text-red-400 hidden" id="name-error">
                                <!-- Name error messages go here -->
                            </p>
                        </div>

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
                                    autocomplete="new-password"
                                    class="input-field w-full pl-12 pr-12 py-3.5 bg-gray-900/50 border border-gray-700 rounded-xl text-white placeholder-gray-500 focus:outline-none focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500/50"
                                    placeholder="Create a strong password"
                                >
                                <button 
                                    type="button" 
                                    onclick="togglePassword('password')"
                                    class="absolute inset-y-0 right-0 pr-4 flex items-center text-gray-500 hover:text-gray-300 transition-colors"
                                >
                                    <svg id="eye-icon-password" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                    </svg>
                                </button>
                            </div>
                            <!-- Password strength indicator -->
                            <div class="mt-2 flex items-center space-x-2">
                                <div class="flex-1 h-1.5 bg-gray-700 rounded-full overflow-hidden">
                                    <div id="password-strength" class="h-full bg-gray-600 rounded-full transition-all duration-300" style="width: 0%"></div>
                                </div>
                                <span id="password-strength-text" class="text-xs text-gray-500">Weak</span>
                            </div>
                            <!-- Error message - Replace with your Laravel error component -->
                            <p class="mt-2 text-sm text-red-400 hidden" id="password-error">
                                <!-- Password error messages go here -->
                            </p>
                        </div>

                        <!-- Confirm Password -->
                        <div>
                            <label for="password_confirmation" class="block text-sm font-semibold text-gray-300 mb-2">
                                Confirm Password
                            </label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                    <svg class="w-5 h-5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                </div>
                                <input 
                                    id="password_confirmation" 
                                    type="password" 
                                    name="password_confirmation" 
                                    required 
                                    autocomplete="new-password"
                                    class="input-field w-full pl-12 pr-12 py-3.5 bg-gray-900/50 border border-gray-700 rounded-xl text-white placeholder-gray-500 focus:outline-none focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500/50"
                                    placeholder="Confirm your password"
                                >
                                <button 
                                    type="button" 
                                    onclick="togglePassword('password_confirmation')"
                                    class="absolute inset-y-0 right-0 pr-4 flex items-center text-gray-500 hover:text-gray-300 transition-colors"
                                >
                                    <svg id="eye-icon-confirmation" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                    </svg>
                                </button>
                            </div>
                            <!-- Error message - Replace with your Laravel error component -->
                            <p class="mt-2 text-sm text-red-400 hidden" id="confirmation-error">
                                <!-- Confirmation error messages go here -->
                            </p>
                        </div>

                        <!-- Terms & Privacy -->
                        <div class="text-xs text-gray-400 bg-gray-900/30 rounded-lg p-3 border border-gray-800">
                            By creating an account, you agree to our 
                            <a href="#" class="text-indigo-400 hover:text-indigo-300 underline">Terms of Service</a> 
                            and 
                            <a href="#" class="text-indigo-400 hover:text-indigo-300 underline">Privacy Policy</a>
                        </div>

                        <!-- Submit Button -->
                        <button 
                            type="submit"
                            class="btn-primary w-full py-4 rounded-xl bg-gradient-to-r from-indigo-600 to-purple-600 hover:from-indigo-700 hover:to-purple-700 text-white font-bold text-lg shadow-lg shadow-indigo-500/50 transition-all duration-300 transform hover:scale-[1.02] hover:shadow-xl hover:shadow-indigo-500/50 flex items-center justify-center space-x-2"
                        >
                            <span>Create Account</span>
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                            </svg>
                        </button>

                        <!-- Divider -->
                        <div class="relative">
                            <div class="absolute inset-0 flex items-center">
                                <div class="w-full border-t border-gray-700"></div>
                            </div>
                            <div class="relative flex justify-center text-sm">
                                <span class="px-4 bg-gray-900 text-gray-400">Already have an account?</span>
                            </div>
                        </div>

                        <!-- Login Link -->
                        <a 
                            href="/login" 
                            class="block w-full py-4 rounded-xl border-2 border-gray-700 hover:border-indigo-500 text-center text-gray-300 hover:text-white font-semibold transition-all duration-300 hover:bg-gray-800/50"
                        >
                            Sign In Instead
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
        function togglePassword(fieldId) {
            const passwordInput = document.getElementById(fieldId);
            const eyeIcon = document.getElementById(`eye-icon-${fieldId === 'password' ? 'password' : 'confirmation'}`);
            
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

        // Password strength indicator
        const passwordInput = document.getElementById('password');
        const strengthBar = document.getElementById('password-strength');
        const strengthText = document.getElementById('password-strength-text');

        passwordInput.addEventListener('input', function() {
            const password = this.value;
            let strength = 0;
            
            if (password.length >= 8) strength += 25;
            if (password.length >= 12) strength += 25;
            if (/[a-z]/.test(password) && /[A-Z]/.test(password)) strength += 25;
            if (/\d/.test(password)) strength += 15;
            if (/[^a-zA-Z0-9]/.test(password)) strength += 10;
            
            strengthBar.style.width = strength + '%';
            
            if (strength <= 25) {
                strengthBar.className = 'h-full bg-red-500 rounded-full transition-all duration-300';
                strengthText.textContent = 'Weak';
                strengthText.className = 'text-xs text-red-400';
            } else if (strength <= 50) {
                strengthBar.className = 'h-full bg-orange-500 rounded-full transition-all duration-300';
                strengthText.textContent = 'Fair';
                strengthText.className = 'text-xs text-orange-400';
            } else if (strength <= 75) {
                strengthBar.className = 'h-full bg-yellow-500 rounded-full transition-all duration-300';
                strengthText.textContent = 'Good';
                strengthText.className = 'text-xs text-yellow-400';
            } else {
                strengthBar.className = 'h-full bg-green-500 rounded-full transition-all duration-300';
                strengthText.textContent = 'Strong';
                strengthText.className = 'text-xs text-green-400';
            }
        });
    </script>

</body>
</html>