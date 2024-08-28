<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sliders = Slider::all();

        return view('admin.pages.slider.index', [
            'sliders'   =>  $sliders,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pages.slider.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            // 'text'          =>  'required | string | min:5 |',
            'photo'         =>  'required | mimes:jpg,png,jpeg | max:10240',
            // 'link'          =>  'required | string | min:5 |',
            'switchValue'   =>  'boolean',
            // 'subheading'    =>  'nullable',
        ]);

        if ($validate) {
            $slider = new Slider;

            // $slider->text       =   $request->input('text');
            $switchValue        =   $request->input('switchValue');
            $slider->status     =   $switchValue ? 0 : 1;
            // $slider->link       =   $request->input('link');
            // $slider->subheading =   $request->input('subheading');


            //for slider image
            $photo = $request->file('photo');
            $filename = Str::uuid()->toString() . '-' . time() . '.' . $photo->getClientOriginalExtension();
            // move photo to folder
            $photo->move('uploads/slider/', $filename);
            $slider->photo = $filename;

            $slider->save();
        }

        return redirect()->route('admin.slider.index')->with('status', 'Added!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Slider $slider)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Slider $slider)
    {
        return view('admin.pages.slider.edit', compact('slider'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Slider $slider)
    {
        $validate = $request->validate([
            // 'text'          =>  'required | string | min:5 |',
            'photo'         =>  'mimes:jpg,png,jpeg | max:5120',
            // 'link'          =>  'required | string | min:5 |',
            'switchValue'   =>  'boolean',
            // 'subheading'    =>  'nullable',
        ]);

        if ($validate) {

            // $slider->text       =   $request->input('text');
            $switchValue        =   $request->input('switchValue');
            $slider->status     =   $switchValue ? 0 : 1;
            // $slider->link       =   $request->input('link');
            // $slider->subheading =   $request->input('subheading');

            if ($request->file('photo')) {
                //delete previous photo
                // File::delete('uploads/slider/'.$slider->photo);
                // unlink('uploads/slider/'.$slider->photo);
                $photo = $request->file('photo');
                $filename = Str::uuid()->toString() . '-' . time() . '.' . $photo->getClientOriginalExtension();
                // move photo to folder
                $photo->move('uploads/slider/', $filename);
                $slider->photo = $filename;
            }

            $slider->save();
        }

        return redirect()->route('admin.slider.index')->with('status', 'Update!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Slider $slider)
    {
        $slider->delete();

        return redirect()->route('admin.slider.index')->with('status', 'Deleted!');
    }
}
