<?php

namespace App\Http\Controllers;

use App\Http\Requests\FileUploadRequest;
use App\Mail\ShareLink;
use App\Models\FileSharing;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class FileUploadController extends Controller
{
    public function upload(FileUploadRequest $request): RedirectResponse
    {
        $validatedData = $request->validated();

        if ($request->hasFile('file')) {
            $path = $request->file('file')->store();
            $validatedData['file'] = $path;
        }

        FileSharing::create($validatedData);

        return redirect()->back()->with(['link' => $path]);
    }

    public function sendEmail(FileUploadRequest $request): RedirectResponse
    {
        $validatedData = $request->validated();

        if ($request->hasFile('file')) {
            $path = $request->file('file')->store();
            $validatedData['file'] = $path;
        }

        FileSharing::create($validatedData);

        Mail::to($request->email)
            ->send(new ShareLink($request->message, $validatedData, $path));

        return redirect()->back()
            ->with('success', 'Link Sent to the Email you entered');
    }

    public function downloadPage(): View
    {
        return view('files.download');
    }

    public function download(Request $request)
    {
        $request->validate([
            'path' => ['required']
        ]);
        $path = $request->input('path');

        if (Storage::exists($path))
        {
            return Storage::download($path);
        }
        return back()->with('error', 'File Doesnt Exist.');

    }
}
