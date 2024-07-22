<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DCalendar;
use Carbon\Carbon;

class DistrictCalenderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->has('date')) {
            $carbonDate = Carbon::parse($request->date);
            $formattedDate = $carbonDate->format('Y-m');

            $events = DCalendar::where('event_month', $formattedDate)->get();
        } else {
            $events = DCalendar::all();
        }

        return view("admin.pages.districtcalendar.index", [
            'events' => $events,
        ]);
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.pages.districtcalendar.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return $request->month;
        $carbonToday = Carbon::today()->format('Y-m');

        $dcalender = new DCalendar();
        $dcalender->event_title = $request->name;
        $dcalender->event_location = $request->location;

        if ($request->month < $carbonToday) {
            return "You can't add event for past date";
        }

        $dcalender->event_month = $request->month;
        $dcalender->event_day = $request->day;
        $dcalender->save();

        return redirect()->back()->with('message', 'Event added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('admin.pages.districtcalendar.edit', [
            'event' => DCalendar::findOrFail($id),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $carbonToday = Carbon::today()->format('Y-m');

        $dcalender = DCalendar::findOrFail($id);
        $dcalender->event_title = $request->name;
        $dcalender->event_location = $request->location;

        if ($request->month < $carbonToday) {
            return "You can't add event for past date";
        }

        $dcalender->event_month = $request->month;
        $dcalender->event_day = $request->day;
        $dcalender->update();

        return redirect()->back()->with('message', 'Event added successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $dcalender = DCalendar::findOrFail($id);
        $dcalender->delete();

        return redirect()->back()->with('message', 'Event deleted successfully');
    }
}
