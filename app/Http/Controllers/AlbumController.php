<?php

namespace App\Http\Controllers;

use App\Http\Controllers\BaseController;
use Illuminate\Http\Request;
use App\Models\Album;
use Illuminate\Support\Str;

class AlbumController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("admin.pages.album.index", [
            'albums' => Album::latest()->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("admin.pages.album.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // return $request;
        $request->validate([
            'name' => 'required',
            'slug' =>  $this->slugValidate('albums'),
            'status' => $this->statusValidate,
        ]);

        $service = new Album();
        $service->name = $request->name;
        $service->slug = Str::slug($request->slug);
        $service->status = $this->status($request->status);
        $service->save();

        return redirect()->back()->with('success', 'Album created successfully');
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
        return view("admin.pages.album.edit", [
            'album' => Album::findOrFail($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $service = Album::findOrfail($id);

        $request->validate([
            'name' => 'required',
            'slug' =>  $this->slugValidate('albums', $service->id),
            'status' => $this->statusValidate,
        ]);

        $service->name = $request->name;
        $service->slug = Str::slug($request->slug);
        $service->status = $this->status($request->status);
        $service->save();

        return redirect()->back()->with('success', 'Album updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $album = Album::findOrFail($id);
        $album->delete();

        return redirect()->back()->with('success', 'Album deleted successfully');
    }
}
