<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <div>
                <h2 class="font-bold text-2xl text-gray-800 dark:text-white leading-tight">
                    {{ __('Dashboard') }}
                </h2>
                <p class="text-sm text-gray-600 dark:text-gray-400 mt-1">Manage your files and storage</p>
            </div>
            <div class="hidden sm:flex items-center space-x-2 px-4 py-2 bg-white dark:bg-gray-800 rounded-xl shadow-md border border-gray-200 dark:border-gray-700">
                <svg class="w-5 h-5 text-indigo-600 dark:text-indigo-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
                <span class="text-sm font-medium text-gray-700 dark:text-gray-300">{{ now()->format('M j, Y') }}</span>
            </div>
        </div>
    </x-slot>

    <!-- Custom Styles -->
    <style>
        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-10px); }
        }
        @keyframes pulse-glow {
            0%, 100% { opacity: 0.5; }
            50% { opacity: 1; }
        }
        .animate-float {
            animation: float 3s ease-in-out infinite;
        }
        .stat-card {
            transition: all 0.3s ease;
        }
        .stat-card:hover {
            transform: translateY(-8px);
        }
        .action-card {
            transition: all 0.3s ease;
        }
        .action-card:hover {
            transform: translateX(5px);
        }
    </style>

    <div class="py-8 bg-gradient-to-br from-gray-50 via-indigo-50/30 to-purple-50/30 dark:from-gray-900 dark:via-gray-900 dark:to-gray-900 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            <!-- Welcome Card with Gradient -->
            <div class="mb-8 bg-gradient-to-r from-indigo-600 via-purple-600 to-pink-600 overflow-hidden shadow-2xl sm:rounded-3xl relative">
                <!-- Animated Background Circles -->
                <div class="absolute top-0 right-0 w-64 h-64 bg-white/10 rounded-full blur-3xl animate-float"></div>
                <div class="absolute bottom-0 left-0 w-48 h-48 bg-white/10 rounded-full blur-2xl" style="animation: float 4s ease-in-out infinite;"></div>
                
                <div class="relative p-8 md:p-10">
                    <div class="flex flex-col md:flex-row items-start md:items-center justify-between gap-6">
                        <div class="flex-1">
                            <div class="flex items-center space-x-3 mb-3">
                                <span class="text-5xl">👋</span>
                                <div>
                                    <h3 class="text-3xl md:text-4xl font-black text-white mb-1">Welcome back!</h3>
                                    <p class="text-lg text-white/90 font-medium">{{ Auth::user()->name }}</p>
                                </div>
                            </div>
                            <p class="text-indigo-100 text-base md:text-lg max-w-2xl">Your secure cloud storage is ready. Upload, manage, and access your files from anywhere in the world.</p>
                        </div>
                        <div class="hidden lg:block">
                            <div class="w-32 h-32 bg-white/10 backdrop-blur-sm rounded-3xl flex items-center justify-center transform hover:scale-110 transition-transform duration-300">
                                <svg class="w-20 h-20 text-white/80" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 15a4 4 0 004 4h9a5 5 0 10-.1-9.999 5.002 5.002 0 10-9.78 2.096A4.001 4.001 0 003 15z"></path>
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Stats Grid -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                <!-- Total Files -->
                <div class="stat-card bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-2xl border-2 border-transparent hover:border-indigo-500/50">
                    <div class="p-6">
                        <div class="flex items-center justify-between mb-4">
                            <div class="w-14 h-14 bg-gradient-to-br from-indigo-500 to-indigo-600 rounded-2xl flex items-center justify-center shadow-lg shadow-indigo-500/50">
                                <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z"></path>
                                </svg>
                            </div>
                        </div>
                        <div class="space-y-1">
                            <p class="text-4xl font-black text-gray-900 dark:text-white">{{ $totalFiles }}</p>
                            <p class="text-sm font-semibold text-gray-600 dark:text-gray-400">Files</p>
                        </div>
                    </div>
                    <div class="h-1.5 bg-gradient-to-r from-indigo-500 to-indigo-600"></div>
                </div>

                <!-- Storage Used -->
                <div class="stat-card bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-2xl border-2 border-transparent hover:border-purple-500/50">
                    <div class="p-6">
                        <div class="flex items-center justify-between mb-4">
                            <div class="w-14 h-14 bg-gradient-to-br from-purple-500 to-purple-600 rounded-2xl flex items-center justify-center shadow-lg shadow-purple-500/50">
                                <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 7v10c0 2.21 3.582 4 8 4s8-1.79 8-4V7M4 7c0 2.21 3.582 4 8 4s8-1.79 8-4M4 7c0-2.21 3.582-4 8-4s8 1.79 8 4"></path>
                                </svg>
                            </div>
                        </div>
                        <div class="space-y-1">
                            <p class="text-4xl font-black text-gray-900 dark:text-white">{{ $totalSizeMB }} MB</p>
                            <p class="text-sm font-semibold text-gray-600 dark:text-gray-400">Storage Used</p>
                        </div>
                    </div>
                    <div class="h-1.5 bg-gradient-to-r from-purple-500 to-purple-600"></div>
                </div>

                <!-- Recent Uploads -->
                <div class="stat-card bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-2xl border-2 border-transparent hover:border-green-500/50">
                    <div class="p-6">
                        <div class="flex items-center justify-between mb-4">
                            <div class="w-14 h-14 bg-gradient-to-br from-green-500 to-green-600 rounded-2xl flex items-center justify-center shadow-lg shadow-green-500/50">
                                <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path>
                                </svg>
                            </div>
                        </div>
                        <div class="space-y-1">
                            <p class="text-4xl font-black text-gray-900 dark:text-white">0</p>
                            <p class="text-sm font-semibold text-gray-600 dark:text-gray-400">Recent Uploads</p>
                        </div>
                    </div>
                    <div class="h-1.5 bg-gradient-to-r from-green-500 to-green-600"></div>
                </div>

                <!-- Shared Files -->
                <div class="stat-card bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-2xl border-2 border-transparent hover:border-pink-500/50">
                    <div class="p-6">
                        <div class="flex items-center justify-between mb-4">
                            <div class="w-14 h-14 bg-gradient-to-br from-pink-500 to-pink-600 rounded-2xl flex items-center justify-center shadow-lg shadow-pink-500/50">
                                <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.684 13.342C8.886 12.938 9 12.482 9 12c0-.482-.114-.938-.316-1.342m0 2.684a3 3 0 110-2.684m0 2.684l6.632 3.316m-6.632-6l6.632-3.316m0 0a3 3 0 105.367-2.684 3 3 0 00-5.367 2.684zm0 9.316a3 3 0 105.368 2.684 3 3 0 00-5.368-2.684z"></path>
                                </svg>
                            </div>
                        </div>
                        <div class="space-y-1">
                            <p class="text-4xl font-black text-gray-900 dark:text-white">0</p>
                            <p class="text-sm font-semibold text-gray-600 dark:text-gray-400">Shared Files</p>
                        </div>
                    </div>
                    <div class="h-1.5 bg-gradient-to-r from-pink-500 to-pink-600"></div>
                </div>
            </div>

            <!-- Main Content Grid -->
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                
                <!-- Quick Actions -->
                <div class="lg:col-span-1">
                    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-2xl border border-gray-200 dark:border-gray-700">
                        <div class="bg-gradient-to-r from-indigo-600 to-purple-600 px-6 py-4">
                            <h3 class="text-lg font-bold text-white flex items-center">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                                </svg>
                                Quick Actions
                            </h3>
                        </div>
                        <div class="p-6 space-y-3">
                            <a href="{{ route('files.index') }}" class="action-card flex items-center space-x-4 p-4 bg-gradient-to-r from-indigo-50 to-indigo-100 dark:from-indigo-900/20 dark:to-indigo-800/20 rounded-xl hover:shadow-lg transition-all duration-300 group border-2 border-indigo-200 dark:border-indigo-800">
                                <div class="w-12 h-12 bg-indigo-600 rounded-xl flex items-center justify-center group-hover:scale-110 transition-transform shadow-lg">
                                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path>
                                    </svg>
                                </div>
                                <div class="flex-1">
                                    <p class="font-bold text-gray-900 dark:text-white">Upload Files</p>
                                    <p class="text-sm text-gray-600 dark:text-gray-400">Add new files to storage</p>
                                </div>
                                <svg class="w-5 h-5 text-indigo-600 dark:text-indigo-400 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                </svg>
                            </a>

                            <a href="{{ route('files.index') }}" class="action-card flex items-center space-x-4 p-4 bg-gradient-to-r from-purple-50 to-purple-100 dark:from-purple-900/20 dark:to-purple-800/20 rounded-xl hover:shadow-lg transition-all duration-300 group border-2 border-purple-200 dark:border-purple-800">
                                <div class="w-12 h-12 bg-purple-600 rounded-xl flex items-center justify-center group-hover:scale-110 transition-transform shadow-lg">
                                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-6l-2-2H5a2 2 0 00-2 2z"></path>
                                    </svg>
                                </div>
                                <div class="flex-1">
                                    <p class="font-bold text-gray-900 dark:text-white">Browse Files</p>
                                    <p class="text-sm text-gray-600 dark:text-gray-400">View all your files</p>
                                </div>
                                <svg class="w-5 h-5 text-purple-600 dark:text-purple-400 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                </svg>
                            </a>

                            <a href="{{ route('profile.edit') }}" class="action-card flex items-center space-x-4 p-4 bg-gradient-to-r from-pink-50 to-pink-100 dark:from-pink-900/20 dark:to-pink-800/20 rounded-xl hover:shadow-lg transition-all duration-300 group border-2 border-pink-200 dark:border-pink-800">
                                <div class="w-12 h-12 bg-pink-600 rounded-xl flex items-center justify-center group-hover:scale-110 transition-transform shadow-lg">
                                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                    </svg>
                                </div>
                                <div class="flex-1">
                                    <p class="font-bold text-gray-900 dark:text-white">Settings</p>
                                    <p class="text-sm text-gray-600 dark:text-gray-400">Manage your account</p>
                                </div>
                                <svg class="w-5 h-5 text-pink-600 dark:text-pink-400 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Recent Activity & Storage -->
                <div class="lg:col-span-2 space-y-6">
                    <!-- Recent Activity -->
                    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-2xl border border-gray-200 dark:border-gray-700">
                        <div class="bg-gradient-to-r from-purple-600 to-pink-600 px-6 py-4">
                            <h3 class="text-lg font-bold text-white flex items-center">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                Recent Activity
                            </h3>
                        </div>
                        <div class="p-6">
                            <!-- Empty State -->
                            @if ($recentUploads->isEmpty())
                                <div class="text-center py-12">
                                    <h4 class="text-xl font-bold text-gray-900 dark:text-white mb-2">
                                        No Recent Activity
                                    </h4>
                                    <p class="text-gray-600 dark:text-gray-400">Upload your first file</p>
                                </div>
                            @else
                                <ul class="divide-y divide-gray-200 dark:divide-gray-700">
                                    @foreach ($recentUploads as $file)
                                        <li class="py-3 flex justify-between items-center">
                                            <div>
                                                <p class="font-medium text-gray-900 dark:text-white">
                                                    {{ $file->original_name }}
                                                </p>
                                                <p class="text-xs text-gray-500">
                                                    {{ $file->created_at->diffForHumans() }}
                                                </p>
                                            </div>
                                            <a href="{{ route('files.download', $file) }}"
                                            class="text-indigo-500 font-medium text-sm hover:underline">
                                                Download
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            @endif

                        </div>
                    </div>

                    <!-- Storage Overview -->
                    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-2xl border border-gray-200 dark:border-gray-700">
                        <div class="bg-gradient-to-r from-green-600 to-emerald-600 px-6 py-4">
                            <h3 class="text-lg font-bold text-white flex items-center">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 7v10c0 2.21 3.582 4 8 4s8-1.79 8-4V7M4 7c0 2.21 3.582 4 8 4s8-1.79 8-4M4 7c0-2.21 3.582-4 8-4s8 1.79 8 4"></path>
                                </svg>
                                Storage Overview
                            </h3>
                        </div>
                        <div class="p-6">
                            <div class="flex items-center justify-between mb-4">
                                <div>
                                    <p class="text-3xl font-black text-gray-900 dark:text-white">0 MB</p>
                                    <p class="text-sm text-gray-600 dark:text-gray-400 mt-1">of Unlimited used</p>
                                </div>
                                <div class="px-4 py-2 bg-green-100 dark:bg-green-900/30 rounded-xl">
                                    <p class="text-sm font-bold text-green-700 dark:text-green-400">Unlimited ∞</p>
                                </div>
                            </div>
                            <div class="w-full bg-gray-200 dark:bg-gray-700 rounded-full h-4 overflow-hidden shadow-inner">
                                <div class="bg-gradient-to-r from-green-500 via-emerald-500 to-teal-500 h-4 rounded-full transition-all duration-500 shadow-lg" style="width: 0%"></div>
                            </div>
                            <div class="mt-4 flex items-center justify-between text-sm">
                                <span class="flex items-center text-gray-600 dark:text-gray-400">
                                    <span class="w-3 h-3 bg-green-500 rounded-full mr-2"></span>
                                    Used: 0 MB
                                </span>
                                <span class="flex items-center text-gray-600 dark:text-gray-400">
                                    <span class="w-3 h-3 bg-gray-300 dark:bg-gray-600 rounded-full mr-2"></span>
                                    Available: Unlimited
                                </span>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>
</x-app-layout>