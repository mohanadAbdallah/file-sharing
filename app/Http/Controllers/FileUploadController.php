<?php

namespace App\Http\Controllers;

use App\Events\FileDownloaded;
use App\Http\Requests\FileUploadRequest;
use App\Models\FileSharing;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Str;
use Illuminate\View\View;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class FileUploadController extends Controller
{
    public function viewFiles(): View
    {
        $files = FileSharing::all();

        return \view('files.index', compact('files'));
    }

    public function uploadPage(): View
    {
        return view('files.upload');
    }

    public function upload(FileUploadRequest $request): RedirectResponse
    {
        $validatedData = $request->validated();

        if ($request->hasFile('file')) {
            $filename = Str::random(8) . '.' . $request->file('file')->getClientOriginalName();
            $request->file('file')->storeAs('uploads', $filename, 'local');
            $validatedData['file'] = $filename;
        }

        FileSharing::create($validatedData);
        return redirect()->route('files.view')->with('success', 'File uploaded successfully');

    }

    public function download($file): BinaryFileResponse|RedirectResponse
    {

        $filePath = storage_path('app/uploads/' . $file);
        if (FileSharing::exists($filePath)) {
            $fileDownloaded = FileSharing::where('file', $file)->first();

            event(new FileDownloaded($fileDownloaded));
            return Response::download($filePath);
        } else {
            return redirect()->back()->with('danger', 'File not found');
        }

    }

    public function signedDownload($file): BinaryFileResponse|RedirectResponse
    {

        $filePath = storage_path('app/uploads/' . $file);
        if (FileSharing::exists($filePath)) {
            $fileDownloaded = FileSharing::where('file', $file)->first();

            event(new FileDownloaded($fileDownloaded));
            return Response::download($filePath);
        } else {
            return redirect()->back()->with('danger', 'File not found');
        }

    }

    public function share($id): View
    {
        $file = FileSharing::findOrFail($id);

        $url = URL::temporarySignedRoute(
            'files.signedDownload', now()->addHour(), ['file' => $file->file, 'name' => $file->name]);

        return view('files.share', compact('url', 'file'));
    }

    public function destroy($id): RedirectResponse
    {
        $file = FileSharing::findOrFail($id);
        $filePath = storage_path('app/uploads/' . $file->file);

        if (file_exists($filePath)) {
            unlink($filePath);
        }
        $file->delete();

        return redirect()->route('files.view')->with('danger', 'File deleted successfully');
    }


    public function deleteSelected(Request $request): RedirectResponse
    {
        $selectedFiles = $request->input('selected_files');
        FileSharing::whereIn('id', $selectedFiles)->delete();

        return redirect()->route('files.view')->with('success', 'All files deleted successfully.');

    }
}
