<?php

namespace App\Http\Controllers;

use App\Http\Requests\EventRequest;
use Illuminate\Support\Facades\DB;

class EventController extends Controller
{
    public function store(EventRequest $request){
        $imageName = "";
        var_dump($request->all());
        if($request->hasFile('eventImage')){
            $image = $request->file('eventImage');
            $imageName = time().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('uploads'), $imageName);

        }
        return "TEST0";
        $rst = DB::table('events')
            ->insert([
                'event_name' => $request->eventName,
                'description' => $request->descriptiion,
                'event_start' => $request->startDate,
                'event_end' => $request->endDate,
                'location' => $request->location,
                'image' => $imageName
            ]);

        if($rst){
            return redirect()->route('events')->with('message', 'Event created successfully');
        }
        return redirect()->route('events')->with('message', 'Event creation failed');
    }
}
