<?php

namespace App\Http\Controllers;

use App\Models\FileUpload;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;

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

        $uploaded = $request->file('file');

        // disk from env (set FILESYSTEM_DISK=r2 or public)
        $disk = env('FILESYSTEM_DISK', 'public');

        // ensure unique name
        $filename = time() . '_' . Str::random(8) . '_' . $uploaded->getClientOriginalName();
        $path = 'user-files/' . Auth::id() . '/' . $filename;

        // Use stream to support remote disks (S3 / R2)
        $stream = fopen($uploaded->getRealPath(), 'r+');

        try {
            Storage::disk($disk)->put($path, $stream);
        } catch (\Exception $e) {
            // make sure to close stream before returning
            if (is_resource($stream)) {
                fclose($stream);
            }
            Log::error('File upload failed: ' . $e->getMessage());
            return redirect()->route('files.index')->with('error', 'Failed to upload file.');
        }

        if (is_resource($stream)) {
            fclose($stream);
        }

        // create DB record
        $record = FileUpload::create([
            'user_id'       => Auth::id(),
            'original_name' => $uploaded->getClientOriginalName(),
            'stored_path'   => $path,
            'mime_type'     => $uploaded->getClientMimeType(),
            'size'          => $uploaded->getSize(),
        ]);

        return redirect()
            ->route('files.index')
            ->with('success', 'File uploaded successfully!');
    }

    public function download(FileUpload $fileUpload)
    {
        // user authorization
        abort_if($fileUpload->user_id !== Auth::id(), 403);

        $disk = env('FILESYSTEM_DISK', 'public');
        $path = $fileUpload->stored_path;

        // If file doesn't exist on disk, show message
        if (! Storage::disk($disk)->exists($path)) {
            return redirect()
                ->route('files.index')
                ->with('error', 'File not found on server.');
        }

        // If disk driver is s3 (including Cloudflare R2), generate temporary URL and redirect
        $driver = config("filesystems.disks.{$disk}.driver");

        try {
            if ($driver === 's3') {
                // temporary URL (30 minutes)
                $url = Storage::disk($disk)->temporaryUrl($path, now()->addMinutes(30));
                return redirect()->away($url);
            } else {
                // local/public disk: trigger download through Laravel
                return Storage::disk($disk)->download($path, $fileUpload->original_name);
            }
        } catch (\Exception $e) {
            Log::error('Download failed: ' . $e->getMessage());
            return redirect()
                ->route('files.index')
                ->with('error', 'Could not prepare download.');
        }
    }

    public function destroy(FileUpload $fileUpload)
    {
        abort_if($fileUpload->user_id !== Auth::id(), 403);

        $disk = env('FILESYSTEM_DISK', 'public');

        try {
            Storage::disk($disk)->delete($fileUpload->stored_path);
        } catch (\Exception $e) {
            Log::warning('Failed to delete file from disk: ' . $e->getMessage());
            // continue to delete DB record anyway (or choose to abort)
        }

        $fileUpload->delete();

        return redirect()
            ->route('files.index')
            ->with('success', 'File deleted successfully.');
    }
}
