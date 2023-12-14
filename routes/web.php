<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\EventController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RegistrationController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
//    return $user ? view('dashboard.dashboard') : view('login.login');
    return Auth::id() ? redirect()->route('dashboard') : view('login.login');
})->name('login');

Route::prefix('register')->group(function(){
    Route::get('/', function(){
        return view('registration.register');
    })->name('register');
    Route::get('/success', function(){
        return view('registration.registrationsuccess');
    })->name('registrationsuccess');
});
Route::middleware(['auth'])->group(function (){
    Route::prefix('dashboard')->group(function(){
        Route::get('/', function(){

            $eventController = new EventController();
            $latestEvent = $eventController->latestEvent();

            $userController = new UserController();
            $residentCount = $userController->residentCount();
            return view('dashboard.dashboard', compact('latestEvent', 'residentCount'));
        })->name('dashboard');



//        user route group
        Route::controller(UserController::class)->group(function(){
            Route::post('/profile/save', 'update')->name('profile.update');
            Route::get('/logout', 'logout')->name('logout');
            Route::get('/residents', 'index')->name('residents');
        });

//        event route group
        Route::prefix('events')->group(function(){
            Route::controller(EventController::class)->group(function (){
                Route::get('/{status?}', 'index')->name('events');
                Route::prefix('view')->group(function(){
                    Route::get('/{id}', 'show')->name('event.view');
                    Route::post('/{id}/update', 'update')->name('event.update');
                    Route::get('/{id}/list', 'list')->name('eventlist.show');
                });
                Route::post('/new', 'store')->name('event.store');
            });
            Route::prefix('view')->group(function() {
                Route::controller(RegistrationController::class)->group(function () {
                    Route::post('/{id}/register', 'store')->name('register.store');
                });
            });
        });


        Route::get('/calendar', function(){
            $eventController = new EventController();
            $events = $eventController->events();
            return view('dashboard.calendar.calendar', compact('events'));
        })->name('calendar');

        Route::prefix('profile')->group(function(){
            Route::get('/', function(){
                return view('dashboard.profile.profile');
            })->name('profile');
        });
    });

});

Route::get('login', function(){
    return redirect('/');
});

Route::controller(UserController::class)->group(function(){
    Route::post('/login','authenticate')->name('authenticate');
    Route::post('/register', 'store')->name('register');

});
//Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
