<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>VAULTIO – Your Personal Cloud Drive</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://cdn.tailwindcss.com"></script>    <style>
        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-20px); }
        }
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        @keyframes slideInRight {
            from {
                opacity: 0;
                transform: translateX(30px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }
        @keyframes pulse-glow {
            0%, 100% { opacity: 0.5; }
            50% { opacity: 1; }
        }
        .animate-float {
            animation: float 6s ease-in-out infinite;
        }
        .animate-fadeInUp {
            animation: fadeInUp 0.8s ease-out forwards;
        }
        .animate-slideInRight {
            animation: slideInRight 0.8s ease-out forwards;
        }
        .delay-100 { animation-delay: 0.1s; }
        .delay-200 { animation-delay: 0.2s; }
        .delay-300 { animation-delay: 0.3s; }
        .delay-400 { animation-delay: 0.4s; }
        
        .gradient-bg {
            background: radial-gradient(circle at 20% 50%, rgba(99, 102, 241, 0.1) 0%, transparent 50%),
                        radial-gradient(circle at 80% 80%, rgba(139, 92, 246, 0.1) 0%, transparent 50%);
        }
        
        .glass-effect {
            background: rgba(17, 24, 39, 0.7);
            backdrop-filter: blur(12px);
            border: 1px solid rgba(255, 255, 255, 0.1);
        }
        
        .feature-card {
            transition: all 0.3s ease;
        }
        .feature-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 40px rgba(99, 102, 241, 0.2);
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
    </style>
</head>

<body class="bg-gray-950 text-white overflow-x-hidden">
    <!-- Background gradient overlay -->
    <div class="fixed inset-0 gradient-bg pointer-events-none"></div>
    
    <!-- Animated background elements -->
    <div class="fixed top-20 left-10 w-72 h-72 bg-indigo-600 rounded-full mix-blend-multiply filter blur-3xl opacity-10 animate-float"></div>
    <div class="fixed bottom-20 right-10 w-96 h-96 bg-purple-600 rounded-full mix-blend-multiply filter blur-3xl opacity-10 animate-float" style="animation-delay: 2s;"></div>

    <!-- Navbar -->
    <header class="fixed top-0 left-0 right-0 z-50 glass-effect border-b border-gray-800">
        <div class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">
            <a href="/" class="flex items-center space-x-2 group">
    <div class="w-10 h-10 bg-gradient-to-br  rounded-lg flex items-center justify-center transform group-hover:scale-110 transition-transform duration-300">
        <img src="vaultio2.png" alt="Vaultio Logo" class="w-6 h-6 text-white" />
    </div>
    <span class="text-xl font-bold bg-gradient-to-r from-indigo-400 to-purple-400 bg-clip-text text-transparent">Vaultio</span>
</a>

            <nav class="flex items-center space-x-3 text-sm">
                <!-- Replace these with your Laravel Blade conditionals -->
                <a href="/login" class="px-5 py-2 rounded-lg glass-effect hover:bg-gray-800 transition-all duration-300 transform hover:scale-105">
                    Login
                </a>
                <a href="/register" class="px-5 py-2 rounded-lg bg-gradient-to-r from-indigo-600 to-purple-600 hover:from-indigo-700 hover:to-purple-700 font-medium transition-all duration-300 transform hover:scale-105 shadow-lg shadow-indigo-500/50">
                    Register Free
                </a>
            </nav>
        </div>
    </header>

    <!-- Hero Section -->
    <section class="relative max-w-7xl mx-auto px-6 pt-32 pb-20 grid lg:grid-cols-2 gap-16 items-center min-h-screen">
        
        <div class="space-y-8 opacity-0 animate-fadeInUp">
            <div class="inline-flex items-center space-x-2 px-4 py-2 rounded-full glass-effect border border-indigo-500/30 hover:border-indigo-500/60 transition-all duration-300">
                <span class="w-2 h-2 bg-green-400 rounded-full animate-pulse"></span>
                <span class="text-sm font-medium">Secure • Fast • Anywhere</span>
            </div>

            <h1 class="text-5xl lg:text-7xl font-black leading-tight">
                Store & Access<br>
                Your Files <br>
                <span class="bg-gradient-to-r from-indigo-400 via-purple-400 to-pink-400 bg-clip-text text-transparent">
                    Anywhere
                </span>
            </h1>

            <p class="text-gray-400 text-xl leading-relaxed max-w-xl">
                A personal cloud drive to safely upload, manage, and download your files.
                Built for simplicity and privacy — <span class="text-indigo-400 font-semibold">no ads, no clutter</span>.
            </p>

            <div class="flex flex-wrap gap-4">
                <a href="/register" class="btn-primary group px-8 py-4 rounded-xl bg-gradient-to-r from-indigo-600 to-purple-600 hover:from-indigo-700 hover:to-purple-700 text-white font-bold text-lg shadow-2xl shadow-indigo-500/50 transition-all duration-300 transform hover:scale-105 flex items-center space-x-2">
                    <span>Create Your Drive</span>
                    <svg class="w-5 h-5 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                    </svg>
                </a>
                <a href="/login" class="px-8 py-4 rounded-xl glass-effect hover:bg-gray-800 transition-all duration-300 text-gray-300 font-medium transform hover:scale-105 border border-gray-700">
                    Login Instead
                </a>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 pt-8">
                <div class="flex items-center space-x-3 p-4 rounded-xl glass-effect opacity-0 animate-fadeInUp delay-100">
                    <div class="w-12 h-12 bg-indigo-500/20 rounded-lg flex items-center justify-center">
                        <svg class="w-6 h-6 text-indigo-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                    </div>
                    <div>
                        <p class="font-semibold text-white">Free Storage</p>
                        <p class="text-sm text-gray-400">Unlimited uploads</p>
                    </div>
                </div>
                
                <div class="flex items-center space-x-3 p-4 rounded-xl glass-effect opacity-0 animate-fadeInUp delay-200">
                    <div class="w-12 h-12 bg-purple-500/20 rounded-lg flex items-center justify-center">
                        <svg class="w-6 h-6 text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                        </svg>
                    </div>
                    <div>
                        <p class="font-semibold text-white">Secure</p>
                        <p class="text-sm text-gray-400">Protected files</p>
                    </div>
                </div>
                
                <div class="flex items-center space-x-3 p-4 rounded-xl glass-effect opacity-0 animate-fadeInUp delay-300">
                    <div class="w-12 h-12 bg-pink-500/20 rounded-lg flex items-center justify-center">
                        <svg class="w-6 h-6 text-pink-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9"></path>
                        </svg>
                    </div>
                    <div>
                        <p class="font-semibold text-white">Anywhere</p>
                        <p class="text-sm text-gray-400">Access globally</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Preview Card -->
        <div class="opacity-0 animate-slideInRight delay-200 relative">
            <div class="absolute -inset-4 bg-gradient-to-r from-indigo-500 to-purple-500 rounded-3xl blur-2xl opacity-20 animate-pulse"></div>
            <div class="relative rounded-3xl glass-effect shadow-2xl p-6 transform hover:scale-105 transition-all duration-500">
                <div class="absolute top-8 right-8 flex space-x-2">
                    <div class="w-3 h-3 bg-red-500 rounded-full"></div>
                    <div class="w-3 h-3 bg-yellow-500 rounded-full"></div>
                    <div class="w-3 h-3 bg-green-500 rounded-full"></div>
                </div>
                <img src="frontlogo.png"
                     alt="Vaultio UI Preview"
                     class="rounded-2xl shadow-2xl border border-gray-700/50 mt-8">
                <div class="absolute -bottom-6 -right-6 w-32 h-32 bg-gradient-to-br from-indigo-500 to-purple-600 rounded-full blur-3xl opacity-30"></div>
            </div>
        </div>

    </section>

    <!-- Features Section -->
    <section class="max-w-7xl mx-auto px-6 py-20">
        <div class="text-center mb-16 opacity-0 animate-fadeInUp">
            <h2 class="text-4xl lg:text-5xl font-bold mb-4">Why Choose <span class="bg-gradient-to-r from-indigo-400 to-purple-400 bg-clip-text text-transparent">Vaultio</span>?</h2>
            <p class="text-gray-400 text-lg">Everything you need for modern cloud storage</p>
        </div>

        <div class="grid md:grid-cols-3 gap-8">
            <div class="feature-card p-8 rounded-2xl glass-effect opacity-0 animate-fadeInUp delay-100">
                <div class="w-16 h-16 bg-gradient-to-br from-indigo-500 to-indigo-600 rounded-2xl flex items-center justify-center mb-6">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                    </svg>
                </div>
                <h3 class="text-2xl font-bold mb-3">Lightning Fast</h3>
                <p class="text-gray-400">Upload and download your files at blazing speeds with our optimized infrastructure.</p>
            </div>

            <div class="feature-card p-8 rounded-2xl glass-effect opacity-0 animate-fadeInUp delay-200">
                <div class="w-16 h-16 bg-gradient-to-br from-purple-500 to-purple-600 rounded-2xl flex items-center justify-center mb-6">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                    </svg>
                </div>
                <h3 class="text-2xl font-bold mb-3">Military-Grade Security</h3>
                <p class="text-gray-400">Your files are encrypted and protected with industry-leading security protocols.</p>
            </div>

            <div class="feature-card p-8 rounded-2xl glass-effect opacity-0 animate-fadeInUp delay-300">
                <div class="w-16 h-16 bg-gradient-to-br from-pink-500 to-pink-600 rounded-2xl flex items-center justify-center mb-6">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z"></path>
                    </svg>
                </div>
                <h3 class="text-2xl font-bold mb-3">Access Anywhere</h3>
                <p class="text-gray-400">Seamlessly access your files from any device, anywhere in the world, anytime.</p>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="max-w-7xl mx-auto px-6 py-20">
        <div class="relative rounded-3xl glass-effect p-12 text-center overflow-hidden">
            <div class="absolute inset-0 bg-gradient-to-r from-indigo-600/20 to-purple-600/20"></div>
            <div class="relative z-10">
                <h2 class="text-4xl lg:text-5xl font-bold mb-6">Ready to Get Started?</h2>
                <p class="text-xl text-gray-300 mb-8 max-w-2xl mx-auto">Join thousands of users who trust Vaultio for their cloud storage needs.</p>
                <a href="/register" class="btn-primary inline-flex items-center space-x-2 px-10 py-5 rounded-xl bg-gradient-to-r from-indigo-600 to-purple-600 hover:from-indigo-700 hover:to-purple-700 text-white font-bold text-xl shadow-2xl shadow-indigo-500/50 transition-all duration-300 transform hover:scale-105">
                    <span>Create Free Account</span>
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                    </svg>
                </a>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="border-t border-gray-800 glass-effect py-8 text-center">
        <div class="max-w-7xl mx-auto px-6">
            <div class="flex items-center justify-center space-x-2 mb-4">
                <div class="w-8 h-8 rounded-lg flex items-center justify-center">
                    <img src="vaultio2.png">
                </div>
                <span class="text-lg font-bold bg-gradient-to-r from-indigo-400 to-purple-400 bg-clip-text text-transparent">Vaultio</span>
            </div>
            <p class="text-gray-500 text-sm">
                © 2025 Vaultio — Powered by 
                <a href="https://xlearate.com/" class="hover:underline text-gray-600 font-medium transition duration-150 ease-in-out" target="_blank">
                    Xlearate.com
                </a>
            </p>
        </div>
    </footer>

</body>
</html>