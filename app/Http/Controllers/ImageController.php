<?php

namespace App\Http\Controllers;

use App\Http\Controllers\BaseController;
use Illuminate\Http\Request;
use App\Models\Album;
use App\Models\Image;

class ImageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($id = null)
    {
        if ($id) {
            return view("admin.pages.image.index", [
                'images' => Image::where("album_id", $id)->latest()->paginate(15),
            ]);
        }

        return view("admin.pages.image.index", [
            'images' => Image::latest()->paginate(15),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("admin.pages.image.create", [
            'albums' => Album::latest()->get(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'album_id' => 'required',
            'image' => 'sometimes',
        ]);

        if ($request->image) {
            for ($i = 0; $i < count($request->image); $i++) {
                $image = new Image();
                $image->album_id = $request->album_id;
                $image->image = $this->uploadImage('upload/gallery/', $request->image[$i]);
                $image->save();
            }
        }

        // check either the request have youtube id or not, if yes then store it in different row with type video
        if ($request->yt_id) {
            $image = new Image();
            $image->album_id = $request->album_id;
            $image->video = $request->yt_id;
            $image->type = 'video';
            $image->save();
        }

        return redirect()->back()->with('success', 'Image created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $image = Image::findOrFail($id);
        $image->delete();

        return redirect()->back()->with('success', 'Image deleted successfully');
    }
}
