<?php

namespace App\Http\Controllers;

use App\Http\Requests\FileUploadRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class FileUploadController extends Controller
{
    public function upload(FileUploadRequest $request)
    {
        $request->validated();
        $link = null;

        if ($request->hasFile('file')){
            $path = $request->file('file')->store('images','public');
            $link = asset('storage/'.$path);
        }

        return redirect()->back()->with(['success' => 'Successfully Uploaded','link'=>$link]);
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

        if ($path){
            $file = Storage::disk('public')->has($path);
            dd($file);
            return response()->download($file);
        }
        return redirect()->back()->with('success','File Downloaded Successfully, Download More ?');
    }
}
