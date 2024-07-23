<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Download;

class DownloadController extends Controller
{
    public function index() {
        return view("admin.pages.download.index", [
            "downloads" => Download::latest()->get(),
        ]);
    }

    public function create() {
        return view("admin.pages.download.create");
    }

    public function store(Request $request) {
        $request->validate([
            'name'  =>  'required|string|min:3',
            // 'category'  =>  'required|string',
            'file'  =>  'required|mimes:pdf|max:2048',
        ]);

        $download = new Download();
        $download->name = $request->name;
        // $download->category = $request->category;

        $download->lion_year = env('lion_year');

        if($request->hasFile('file')) {
            $file = $request->file('file');
            $fileName = time() . '.' . $file->getClientOriginalExtension();
            $file->move('uploads/download/', $fileName);
            $download->file = $fileName;
        } else {
            return "File not found";
        }

        $download->save();
        return redirect()->back()->with('message', 'Download added successfully');
    }

    public function destroy($id) {
        $download = Download::findOrFail($id);
        $download->delete();
        return redirect()->back()->with('message', 'Download deleted successfully');
    }
}
