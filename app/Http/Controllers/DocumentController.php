<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Document;

class DocumentController extends Controller
{
    public function index()
    {
        return view('admin.pages.document.index', [
            "documents" =>  Document::all()
        ]);
    }

    public function create() {
        return view('admin.pages.document.create');
    }

    public function store(Request $request) {

        // return $request;
        $request->validate([
            'type'  =>  'required|string|min:3',
            'file'  =>  'required|mimes:pdf|max:2048',
        ]);

        $download = new Document();
        $download->type = $request->type;

        if($request->hasFile('file')) {
            $file = $request->file('file');
            $fileName = time() . '.' . $file->getClientOriginalExtension();
            $file->move('uploads/document/', $fileName);
            $download->pdf = $fileName;
        } else {
            return "File not found";
        }

        $download->save();

        return redirect()->back()->with('message', 'Document created successfully');
    }

    public function destroy($id) {
        $document = Document::findOrFail($id);
        $document->delete();
        return redirect()->back()->with('message', 'Document deleted successfully');
    }
}
