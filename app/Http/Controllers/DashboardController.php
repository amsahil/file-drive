<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\FileUpload;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        // Fetch user stats
        $totalFiles = FileUpload::where('user_id', $user->id)->count();
        $totalSize = FileUpload::where('user_id', $user->id)->sum('size');

        // Convert size to MB
        $totalSizeMB = number_format($totalSize / 1024 / 1024, 2);

        // Recent 5 uploads
        $recentUploads = FileUpload::where('user_id', $user->id)
            ->latest()
            ->take(5)
            ->get();

        return view('dashboard', compact('user', 'totalFiles', 'totalSizeMB', 'recentUploads'));
    }
}
