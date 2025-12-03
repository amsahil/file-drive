<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <div>
                <h2 class="font-bold text-2xl text-gray-800 dark:text-white leading-tight flex items-center">
                    <svg class="w-7 h-7 mr-3 text-indigo-600 dark:text-indigo-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-6l-2-2H5a2 2 0 00-2 2z"/>
                    </svg>
                    Your Files
                </h2>
                <p class="text-sm text-gray-600 dark:text-gray-400 mt-1">Upload, manage and download your files</p>
            </div>
        </div>
    </x-slot>

    <!-- Custom Styles -->
    <style>
        @keyframes fade-in {
            from {
                opacity: 0;
                transform: translateY(-10px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        @keyframes slide-in {
            from {
                opacity: 0;
                transform: translateX(-20px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }
        .animate-fade-in {
            animation: fade-in 0.4s ease-out;
        }
        .animate-slide-in {
            animation: slide-in 0.4s ease-out;
        }
        .file-card {
            transition: all 0.3s ease;
        }
        .file-card:hover {
            transform: translateY(-4px);
        }
    </style>

    <div class="py-8 bg-gradient-to-br from-gray-50 via-indigo-50/30 to-purple-50/30 dark:from-gray-900 dark:via-gray-900 dark:to-gray-900 min-h-screen">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-6">

            {{-- Success Message --}}
            @if (session('success'))
                <div class="bg-gradient-to-r from-green-500 to-emerald-500 text-white px-6 py-4 rounded-2xl shadow-xl animate-fade-in border-2 border-green-400">
                    <div class="flex items-center">
                        <div class="w-10 h-10 bg-white/20 rounded-xl flex items-center justify-center mr-3">
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                            </svg>
                        </div>
                        <span class="font-semibold">{{ session('success') }}</span>
                    </div>
                </div>
            @endif

            {{-- Error Message --}}
            @if (session('error'))
                <div class="bg-gradient-to-r from-red-500 to-rose-500 text-white px-6 py-4 rounded-2xl shadow-xl animate-fade-in border-2 border-red-400">
                    <div class="flex items-center">
                        <div class="w-10 h-10 bg-white/20 rounded-xl flex items-center justify-center mr-3">
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/>
                            </svg>
                        </div>
                        <span class="font-semibold">{{ session('error') }}</span>
                    </div>
                </div>
            @endif

            {{-- Upload Card --}}
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-2xl rounded-3xl border-2 border-gray-200 dark:border-gray-700 hover:shadow-3xl transition-all duration-300">
                <div class="bg-gradient-to-r from-indigo-600 to-purple-600 px-6 py-4">
                    <div class="flex items-center">
                        <div class="w-12 h-12 bg-white/20 backdrop-blur-sm rounded-xl flex items-center justify-center mr-4">
                            <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"/>
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-xl font-bold text-white">Upload New File</h3>
                            <p class="text-indigo-100 text-sm">Choose a file from your device to upload</p>
                        </div>
                    </div>
                </div>

                <div class="p-6 sm:p-8">
                    <form action="{{ route('files.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                        @csrf

                        <div>
                            <label class="block text-sm font-bold text-gray-700 dark:text-gray-300 mb-3">
                                Choose File
                            </label>
                            <div class="relative">
                                <input type="file" name="file" id="file-input"
                                    class="block w-full text-sm text-gray-900 dark:text-gray-300 border-2 border-dashed border-gray-300 dark:border-gray-600 rounded-2xl cursor-pointer focus:outline-none focus:border-indigo-500 focus:ring-4 focus:ring-indigo-200 dark:focus:ring-indigo-900 transition-all duration-200 file:mr-4 file:py-4 file:px-6 file:rounded-l-2xl file:border-0 file:text-sm file:font-bold file:bg-gradient-to-r file:from-indigo-600 file:to-purple-600 file:text-white hover:file:from-indigo-700 hover:file:to-purple-700 file:transition-all file:duration-200 p-3 dark:bg-gray-900/50">
                                @error('file')
                                    <p class="mt-3 text-sm text-red-600 dark:text-red-400 flex items-center bg-red-50 dark:bg-red-900/20 px-4 py-2 rounded-xl">
                                        <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                                        </svg>
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>
                            <p class="mt-2 text-xs text-gray-500 dark:text-gray-400">Maximum file size: 100MB</p>
                        </div>

                        <button type="submit"
                            class="w-full sm:w-auto inline-flex items-center justify-center px-8 py-4 rounded-xl text-base font-bold bg-gradient-to-r from-indigo-600 to-purple-600 text-white hover:from-indigo-700 hover:to-purple-700 focus:outline-none focus:ring-4 focus:ring-indigo-300 transform hover:scale-105 transition-all duration-200 shadow-xl shadow-indigo-500/50 hover:shadow-2xl">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"/>
                            </svg>
                            Upload File
                        </button>
                    </form>
                </div>
            </div>

            {{-- Files List --}}
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-2xl rounded-3xl border-2 border-gray-200 dark:border-gray-700">
                <div class="bg-gradient-to-r from-purple-600 to-pink-600 px-6 py-4">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center">
                            <div class="w-12 h-12 bg-white/20 backdrop-blur-sm rounded-xl flex items-center justify-center mr-4">
                                <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                                </svg>
                            </div>
                            <div>
                                <h3 class="text-xl font-bold text-white">Your Uploaded Files</h3>
                                <p class="text-purple-100 text-sm">Manage and download your files</p>
                            </div>
                        </div>
                        @if (!$files->isEmpty())
                            <div class="hidden sm:flex items-center px-4 py-2 bg-white/20 backdrop-blur-sm rounded-xl">
                                <span class="text-sm font-bold text-white">
                                    {{ $files->count() }} {{ $files->count() === 1 ? 'File' : 'Files' }}
                                </span>
                            </div>
                        @endif
                    </div>
                </div>

                <div class="p-6 sm:p-8">
                    @if ($files->isEmpty())
                        <div class="text-center py-16">
                            <div class="w-32 h-32 bg-gradient-to-br from-indigo-100 to-purple-100 dark:from-indigo-900/30 dark:to-purple-900/30 rounded-3xl flex items-center justify-center mx-auto mb-6">
                                <svg class="w-16 h-16 text-indigo-400 dark:text-indigo-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z"/>
                                </svg>
                            </div>
                            <h4 class="text-2xl font-bold text-gray-900 dark:text-white mb-2">No Files Yet</h4>
                            <p class="text-gray-600 dark:text-gray-400 mb-6">Upload your first file to get started with Vaultio</p>
                            <div class="inline-flex items-center px-6 py-3 bg-gradient-to-r from-indigo-100 to-purple-100 dark:from-indigo-900/30 dark:to-purple-900/30 text-indigo-700 dark:text-indigo-400 rounded-xl font-semibold">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/>
                                </svg>
                                Upload a file above to begin
                            </div>
                        </div>
                    @else
                        {{-- Desktop Table View --}}
                        <div class="hidden md:block overflow-x-auto rounded-2xl border-2 border-gray-200 dark:border-gray-700">
                            <table class="min-w-full">
                                <thead class="bg-gradient-to-r from-gray-50 to-gray-100 dark:from-gray-800 dark:to-gray-900">
                                    <tr>
                                        <th class="py-4 px-6 text-left text-xs font-bold text-gray-700 dark:text-gray-300 uppercase tracking-wider">File Name</th>
                                        <th class="py-4 px-6 text-left text-xs font-bold text-gray-700 dark:text-gray-300 uppercase tracking-wider">Size</th>
                                        <th class="py-4 px-6 text-left text-xs font-bold text-gray-700 dark:text-gray-300 uppercase tracking-wider">Uploaded</th>
                                        <th class="py-4 px-6 text-right text-xs font-bold text-gray-700 dark:text-gray-300 uppercase tracking-wider">Actions</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-200 dark:divide-gray-700 bg-white dark:bg-gray-800">
                                    @foreach ($files as $file)
                                        <tr class="hover:bg-indigo-50 dark:hover:bg-gray-700/50 transition-colors duration-200 animate-slide-in">
                                            <td class="py-5 px-6">
                                                <div class="flex items-center">
                                                    <div class="w-12 h-12 bg-gradient-to-br from-indigo-500 to-purple-500 rounded-xl flex items-center justify-center mr-4 shadow-lg">
                                                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z"/>
                                                        </svg>
                                                    </div>
                                                    <span class="font-bold text-gray-900 dark:text-white">{{ $file->original_name }}</span>
                                                </div>
                                            </td>
                                            <td class="py-5 px-6">
                                                <span class="inline-flex items-center px-3 py-1 rounded-lg bg-indigo-100 dark:bg-indigo-900/30 text-indigo-700 dark:text-indigo-400 text-sm font-semibold">
                                                    {{ number_format($file->size / 1024, 2) }} KB
                                                </span>
                                            </td>
                                            <td class="py-5 px-6">
                                                <span class="inline-flex items-center text-gray-600 dark:text-gray-400 text-sm">
                                                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                                    </svg>
                                                    {{ $file->created_at->diffForHumans() }}
                                                </span>
                                            </td>
                                            <td class="py-5 px-6 text-right">
                                                <div class="flex items-center justify-end space-x-3">
                                                    <a href="{{ route('files.download', $file) }}"
                                                        class="inline-flex items-center px-5 py-2.5 text-sm font-bold rounded-xl bg-gradient-to-r from-indigo-600 to-indigo-700 text-white hover:from-indigo-700 hover:to-indigo-800 transition-all duration-200 shadow-lg hover:shadow-xl transform hover:scale-105">
                                                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/>
                                                        </svg>
                                                        Download
                                                    </a>

                                                    <form action="{{ route('files.destroy', $file) }}" method="POST" class="inline">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit"
                                                            onclick="return confirm('Are you sure? This will permanently delete your file.')"
                                                            class="inline-flex items-center px-5 py-2.5 text-sm font-bold rounded-xl bg-gradient-to-r from-red-600 to-red-700 text-white hover:from-red-700 hover:to-red-800 transition-all duration-200 shadow-lg hover:shadow-xl transform hover:scale-105">
                                                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                                            </svg>
                                                            Delete
                                                        </button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                        {{-- Mobile Card View --}}
                        <div class="md:hidden space-y-4">
                            @foreach ($files as $file)
                                <div class="file-card bg-gradient-to-br from-white to-gray-50 dark:from-gray-800 dark:to-gray-900 rounded-2xl p-5 border-2 border-gray-200 dark:border-gray-700 shadow-lg">
                                    <div class="flex items-start justify-between mb-4">
                                        <div class="flex items-center flex-1 min-w-0">
                                            <div class="w-14 h-14 bg-gradient-to-br from-indigo-500 to-purple-500 rounded-xl flex items-center justify-center mr-4 flex-shrink-0 shadow-lg">
                                                <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z"/>
                                                </svg>
                                            </div>
                                            <div class="min-w-0 flex-1">
                                                <p class="font-bold text-gray-900 dark:text-white truncate text-base">{{ $file->original_name }}</p>
                                                <span class="inline-flex items-center px-2 py-1 rounded-lg bg-indigo-100 dark:bg-indigo-900/30 text-indigo-700 dark:text-indigo-400 text-xs font-semibold mt-1">
                                                    {{ number_format($file->size / 1024, 2) }} KB
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="flex items-center text-xs text-gray-600 dark:text-gray-400 mb-4 pb-4 border-b-2 border-gray-200 dark:border-gray-700">
                                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                        </svg>
                                        <span class="font-medium">{{ $file->created_at->diffForHumans() }}</span>
                                    </div>

                                    <div class="grid grid-cols-2 gap-3">
                                        <a href="{{ route('files.download', $file) }}"
                                            class="inline-flex items-center justify-center px-4 py-3 text-sm font-bold rounded-xl bg-gradient-to-r from-indigo-600 to-indigo-700 text-white hover:from-indigo-700 hover:to-indigo-800 transition-all duration-200 shadow-lg transform hover:scale-105">
                                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/>
                                            </svg>
                                            Download
                                        </a>

                                        <form action="{{ route('files.destroy', $file) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                onclick="return confirm('Are you sure? This will permanently delete your file.')"
                                                class="w-full inline-flex items-center justify-center px-4 py-3 text-sm font-bold rounded-xl bg-gradient-to-r from-red-600 to-red-700 text-white hover:from-red-700 hover:to-red-800 transition-all duration-200 shadow-lg transform hover:scale-105">
                                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                                </svg>
                                                Delete
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>

        </div>
    </div>
</x-app-layout>