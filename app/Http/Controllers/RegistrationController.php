<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class RegistrationController extends Controller
{
    public function store(Request $request, $id){
        $event = DB::table('events')->where('id', $id)->count();
        $registration = DB::table('registration')->where('user_id', Auth::user()->id)->where('event_id', $id)->count();
//        return var_dump($event, $registration);
        if($event == 0 || $registration > 0) return redirect()
            ->route('event.view', $id)
            ->with('message', "You're already registered!")->with('status', "error");
        $rst = DB::table('registration')->insert([
           'user_id' => Auth::user()->id,
           'event_id' => $id,
        ]);
        $returnMessage = is_null($rst) ? "Registration failed" : "Registration success";
        $status = is_null($rst) ? "error" : "success";
        return redirect()->route('event.view', $id)->with('message', $returnMessage)->with('status', $status);
    }
}
