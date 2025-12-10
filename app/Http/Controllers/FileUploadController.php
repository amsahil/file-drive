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
            'file' => 'required|file|max:102400', // 100 MB (in kilobytes)
        ]);

        $file = $request->file('file');

        // Use configured disk (r2, s3, public, etc.)
        $disk = env('FILESYSTEM_DISK', config('filesystems.default', 'public'));

        // Create a safe, unique filename to avoid collisions
        $ext = $file->getClientOriginalExtension();
        $uniqueName = now()->format('YmdHis') . '_' . Str::random(8) . '.' . $ext;
        $storePath = 'user-files/' . Auth::id() . '/' . $uniqueName;

        try {
            // Put the file on the configured disk
            // If you need to set visibility, you can pass ['visibility' => 'public']
            $stored = Storage::disk($disk)->putFileAs(
                dirname($storePath),
                $file,
                basename($storePath)
            );

            if (! $stored) {
                Log::error('File store returned falsy result', ['disk' => $disk, 'path' => $storePath]);
                return back()->with('error', 'Upload failed — storage put returned false.');
            }

            $record = FileUpload::create([
                'user_id'       => Auth::id(),
                'original_name' => $file->getClientOriginalName(),
                'stored_path'   => $storePath,
                'mime_type'     => $file->getClientMimeType(),
                'size'          => $file->getSize(),
            ]);

            return redirect()
                ->route('files.index')
                ->with('success', 'File uploaded successfully!');

        } catch (\Exception $e) {
            Log::error('File upload exception', ['message' => $e->getMessage(), 'trace' => $e->getTraceAsString()]);
            return back()->with('error', 'Upload failed: ' . $e->getMessage());
        }
    }

    public function download(FileUpload $fileUpload)
    {
        // authorization
        abort_if($fileUpload->user_id !== Auth::id(), 403);

        $disk = env('FILESYSTEM_DISK', config('filesystems.default', 'public'));
        $path = $fileUpload->stored_path;

        Log::info('Download attempt', [
            'user_id' => Auth::id(),
            'disk' => $disk,
            'path' => $path,
        ]);

        try {
            // check exists
            if (! Storage::disk($disk)->exists($path)) {
                Log::warning('File missing on disk', ['disk' => $disk, 'path' => $path]);
                return redirect()->route('files.index')->with('error', 'File not found on server.');
            }

            $driver = config("filesystems.disks.{$disk}.driver", null);

            // If S3/R2 style drivers are used, generate a temporary URL
            if (in_array($driver, ['s3', 'r2', 's3-compatible'])) {
                // default to 30 minutes
                $expires = now()->addMinutes(30);
                try {
                    $url = Storage::disk($disk)->temporaryUrl($path, $expires);
                    return redirect()->away($url);
                } catch (\Exception $ex) {
                    // fallback to streaming download
                    Log::warning('temporaryUrl failed, falling back to stream', ['error' => $ex->getMessage()]);
                }
            }

            // Default: stream/download from disk
            return Storage::disk($disk)->download($path, $fileUpload->original_name);

        } catch (\Exception $e) {
            Log::error('Download exception', ['message' => $e->getMessage(), 'trace' => $e->getTraceAsString()]);
            return redirect()->route('files.index')->with('error', 'Download failed. See logs for details.');
        }
    }

    public function destroy(FileUpload $fileUpload)
    {
        abort_if($fileUpload->user_id !== Auth::id(), 403);

        $disk = env('FILESYSTEM_DISK', config('filesystems.default', 'public'));
        try {
            if (Storage::disk($disk)->exists($fileUpload->stored_path)) {
                Storage::disk($disk)->delete($fileUpload->stored_path);
            } else {
                Log::warning('File not found while trying to delete', ['disk' => $disk, 'path' => $fileUpload->stored_path]);
            }

            $fileUpload->delete();

            return redirect()->route('files.index')->with('success', 'File deleted successfully.');
        } catch (\Exception $e) {
            Log::error('Delete exception', ['message' => $e->getMessage(), 'trace' => $e->getTraceAsString()]);
            return redirect()->route('files.index')->with('error', 'Failed to delete file.');
        }
    }
}
