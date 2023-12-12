<?php

namespace App\Http\Controllers;

use App\Http\Requests\AdminRequest;
use App\Http\Requests\EventRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class EventController extends Controller
{
    public function list(AdminRequest $request, $id){
        $registration = DB::table('registration')
            ->join('events', 'registration.event_id', '=', 'events.id')
            ->join('users', 'registration.user_id', '=', 'users.id')
            ->where('registration.event_id', $id)
            ->get();
        return view('dashboard.events.eventsregistration', compact('registration'));
    }
    public function events(){
        return DB::table('events')->get();
    }
    public function latestEvent(){
        return DB::table('events')->orderBy('event_start', 'asc')->get()->first();
    }
    public function index(Request $request){
        $events = !is_null($request->status)
            ? DB::table('events')
                ->where('status', $request->status)->get()
            : DB::table('events')
                ->get();
        return view('dashboard.events.events', ['events' => $events, 'filter' => $request->status]);
    }
    public function show(Request $request, $id){
        Validator::make(['id'=> $id], [
           'id' => ['required' ,'string']
        ])->validate();
        $event = DB::table('events')->where('id', $request->id)->get();
        $registration = DB::table('registration')
            ->where('user_id', Auth::user()->id)
            ->where('event_id', $id)
            ->count();
        if(!$event) return redirect()->route('events')->with(['message', 'Event not found'], ['status' => 'error']);
        return view('dashboard.events.viewevent', compact('event', 'registration'));
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
                'description' => $request->description,
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
    public function update(AdminRequest $request, $id){
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
        $imgUpdate = false;
        if($request->hasFile('eventImage')){
            $image = $request->file('eventImage');
            $imageName = time().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('uploads'), $imageName);
            $imgUpdate = DB::table('events')->where('id', $id)->update(['image' => $imageName]);
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
        if($rst || $imgUpdate){
            return redirect()->route('event.view', $id)->with('message', 'Event updated successfully')->with('status' , 'success');

        }
        return redirect()->route('event.view', $id)->with('message', 'Event update failed')->with('status' , 'error');
    }
}
