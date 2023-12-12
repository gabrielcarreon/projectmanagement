<?php

namespace App\Http\Controllers;

use App\Http\Requests\EventRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use PHPUnit\Event\Event;

class EventController extends Controller
{
    public function index(){
        $events = DB::table('events')->get();
        return view('dashboard.events.events', ['events' => $events]);
    }
    public function show(Request $request, $id){

        Validator::make(['id'=> $id], [
           'id' => ['required' ,'string']
        ])->validate();
        $event = DB::table('events')->where('id', $request->id)->get();
        if(!$event) return redirect()->route('events')->with(['message', 'Event not found'], ['status' => 'error']);
        return view('dashboard.events.viewevent', compact('event'));
    }

    public function store(EventRequest $request){
        $imageName = "";
        if($request->hasFile('eventImage')){
            $image = $request->file('eventImage');
            $imageName = time().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('uploads'), $imageName);
        }
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
            return redirect()->route('events')->with(['message', 'Event created successfully'], ['status' => 'success']);
        }
        return redirect()->route('events')->with(['message', 'Event creation failed'], ['status' => 'error']);
    }
    public function update(Request $request, $id){
        Validator::make(['id'=> $id], [
            'id' => ['required' ,'string']
        ])->validate();
        if(!in_array($request->eventStatus, ['done', 'on-going', 'scheduled'])) return redirect()->route('events')->with(['message', 'Invalid event status'], ['status' => 'error']);
        $request->validate([
           'eventName' => ['required', 'string', 'max:255'],
           'description' => ['required', 'string', 'max:255'],
           'startDate' => ['required', 'date'],
           'endDate' => ['required', 'date'],
           'location' => ['required', 'string', 'max:255'],
            'eventStatus' => ['required', 'string', 'max:50'],
        ]);
        $imageName = "";
        if($request->hasFile('eventImage')){
            $image = $request->file('eventImage');
            $imageName = time().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('uploads'), $imageName);
            DB::table('event')->where('id', $id)->update(['image' => $imageName]);
        }
        $rst = DB::table('events')
            ->where('id', $id)
            ->where('status', '!=', 'done')
            ->update([
                'event_name' => $request->eventName,
                'description' => $request->description,
                'event_start' => $request->startDate,
                'event_end' => $request->endDate,
                'location' => $request->location,
                'status' => $request->eventStatus,
            ]);
        if($rst){
            return redirect()->route('event.view', $id)->with('message', 'Event updated successfully')->with('status' , 'success');

        }
        return redirect()->route('event.view', $id)->with('message', 'Event update failed')->with('status' , 'error');
    }
}
