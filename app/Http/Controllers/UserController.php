<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\ProfileRequest;
use App\View\Components\Buttons\Primary;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Mockery\Matcher\Any;

class UserController extends Controller
{
    public function index(Request $request){
        $users = DB::table('users')->where('user_access', '=', 'resident')->get('*');
        return view('dashboard.residents.residents', compact('users'));
    }
    public function authenticate(Request $request) : RedirectResponse
    {
        $credentials = $request->validate([
            'username' => ['required', 'string', 'max:50'],
            'password' => ['required']
        ]);
        if(Auth::attempt($credentials)){
            $request->session()->regenerate();
            $user = Auth::user();
            session_start();
            return redirect()->intended('dashboard');
        }
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.'
        ])->onlyInput('email');
    }

    public function store(LoginRequest $request){
        if($request->input('password') != $request->input('confirmPassword')) return redirect()->route('register/failed')->with('message', 'Password does not match.');
        $user = DB::table('users')->insert([
            'username' => $request->email,
            'email' => $request->email,
            'fname' => $request->input('fname'),
            'mname' => $request->mname ?? "",
            'lname' => $request->input('lname'),
            'password' => Hash::make($request->password),
            'birthdate' => $request->input('year')."-".$request->input('month')."-".$request->input('day'),
            "contact" => $request->input('contact'),
            'address' => $request->input('address'),
            'marital_status' => $request->input('maritalStatus'),
            'user_access' => 'resident',
        ]);
        return redirect()->route('registrationsuccess');
    }
    public function logout(Request $request) :RedirectResponse{
        Auth::logout();
        return redirect('/login');
    }
    public function update(ProfileRequest $request) :RedirectResponse{
        $userId = Auth::id();
        if($request->hasFile('image')){
            $image = $request->file('image');
            $imageName = time().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('uploads'), $imageName);
            DB::table('users')
                ->where('id', $userId)
                ->update([
                    'image' => $imageName
            ]);
        }
        DB::table('users')
            ->where('id', $userId)
            ->update([
                'fname'=> $request->fname,
                'mname' => $request->mname ?? "",
                'lname'=> $request->lname,
                'birthdate' => $request->year."-".$request->month."-".$request->day,
                'email' => $request->email,
                'address' => $request->address,
                'contact' => $request->contact,
                'marital_status' => $request->maritalStatus,
        ]);

        return redirect()->route('profile')->with('message', 'Profile updated successfully');
    }
}
