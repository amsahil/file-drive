<?php

namespace App\Http\Controllers;

use App\Models\FileUpload;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class FileUploadController extends Controller
{
    public function index()
    {
        $files = FileUpload::where('user_id', Auth::id())
            ->latest()
            ->get();

        return view('files.index', compact('files'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'file' => 'required|file|max:51200', // 50 MB
        ]);

        $file = $request->file('file');

        // store file on configured disk
        $path = $file->store('user-files/' . Auth::id(), 'public');

        $record = FileUpload::create([
            'user_id'       => Auth::id(),
            'original_name' => $file->getClientOriginalName(),
            'stored_path'   => $path,
            'mime_type'     => $file->getClientMimeType(),
            'size'          => $file->getSize(),
        ]);

        return redirect()
            ->route('files.index')
            ->with('success', 'File uploaded successfully!');
    }

    public function download(FileUpload $fileUpload)
    {
        // Make sure user owns this file
        abort_if($fileUpload->user_id !== Auth::id(), 403);

        if (!Storage::disk('public')->exists($fileUpload->stored_path)) {
            return redirect()
                ->route('files.index')
                ->with('error', 'File not found on server.');
        }

        return Storage::disk('public')->download(
            $fileUpload->stored_path,
            $fileUpload->original_name
        );
    }

    public function destroy(FileUpload $fileUpload)
    {
        abort_if($fileUpload->user_id !== Auth::id(), 403);

        Storage::disk('public')->delete($fileUpload->stored_path);
        $fileUpload->delete();

        return redirect()
            ->route('files.index')
            ->with('success', 'File deleted successfully.');
    }
}
