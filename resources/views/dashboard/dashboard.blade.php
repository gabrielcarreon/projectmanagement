@extends('layouts.index')
@section('content')

    <div class="d-flex">
        @include('components.navigation')
        <div class="container">
            @include('components.navbar')
            <div class="row mt-0 mt-md-3">
                <div class="col-12">
                    <div class="card stripe-box-shadow p-4" style="border-radius: 32px;">
                        <div class="container-fluid">
                            <div class="row" style="min-height: 30vh;">
                                <div class="col-12
                            @if(Auth::user()->user_access == 'admin')
                            col-md-4
                            @else
                            col-md-6
                            @endif  mt-5 mt-md-4">
                                    <a href="{{route('events')}}"
                                       class="card position-relative stripe-box-shadow previous-event"
                                       style="min-height: 25vh; border-radius: 36px;">
                                        <div class="position-absolute bottom-0 start-0">
                                            <div class="container my-0"
                                                 style="background-color: rgba(0,0,0, .6); border-radius: 0 28px 0 28px;">
                                                <div class="row">
                                                    <div class="col-12 p-3">
                                                        <h4 class="text-white mb-0 ">Events</h4>
                                                        <h1 class="text-white mb-0 fw-semibold small">Previous
                                                            events</h1>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-12
                            @if(Auth::user()->user_access == 'admin')
                            col-md-4
                            @else
                            col-md-6
                            @endif  mt-5 mt-md-4">
                                    <a href="{{route('calendar')}}" class="card position-relative stripe-box-shadow"
                                       style="background-size: cover; background-position: center; background-image: url({{asset('assets/calendar.jpg')}}); min-height: 25vh; border-radius: 36px;">
                                        <div class="position-absolute bottom-0 start-0">
                                            <div class="container my-0"
                                                 style="background-color: rgba(0,0,0, .6); border-radius: 0 28px 0 28px;">
                                                <div class="row">
                                                    <div class="col-12 p-3">
                                                        <h4 class="text-white mb-0 ">Calendar</h4>
                                                        <h1 class="text-white mb-0 fw-semibold small">List of
                                                            events</h1>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                @if(Auth::user()->user_access == 'admin')
                                    <div class="col-12
                             @if(Auth::user()->user_access == 'admin')
                            col-md-4
                            @else
                            col-md-6
                            @endif
                            mt-5 mt-md-4">
                                        <a href="{{route('residents')}}"
                                           class="card position-relative stripe-box-shadow"
                                           style="background-size: cover; background-position: center; background-image: url({{asset('assets/residents.jpg')}}); min-height: 25vh; border-radius: 36px;">
                                            <div class="position-absolute bottom-0 start-0">
                                                <div class="container my-0"
                                                     style="background-color: rgba(0,0,0, .6); border-radius: 0 28px 0 28px;">
                                                    <div class="row">
                                                        <div class="col-12 p-3">
                                                            <h4 class="text-white mb-0 ">Residents</h4>
                                                            <h1 class="text-white mb-0 fw-semibold small">{{$residentCount}}
                                                                Residents</h1>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="container">
                            <div class="row">
                                <div class="col-12">
                                    @if(!is_null($latestEvent))

                                        <a href="{{route('event.view', $latestEvent->id)}}" class="card stripe-box-shadow position-relative " style="background-size:cover; background-position: center; min-height: 60vh; border-radius: 28px;
                                @if(!is_null($latestEvent))
                                background-image: url({{asset("uploads/$latestEvent->image")}})
                                @else
                                background-image: url({{asset('assets/placeholder2.jpg')}});

                                @endif
                                ">
                                            <div class="position-absolute bottom-0 left-0 p-4"
                                                 style="background-color: rgba(0,0,0, .6); border-radius: 0 28px 0 28px;">

                                                <h1 class="text-white"
                                                    style="font-size: 2rem;">{{$latestEvent->event_name}}</h1>
                                                <h2 class="text-white fw-semibold" style="font-size: 3rem;">Upcoming
                                                    Events</h2>
                                            </div>
                                            <div class="position-absolute bottom-0 end-0 p-4">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="64" height="64"
                                                     fill="white" class="bi bi-arrow-right-circle-fill cursor-pointer"
                                                     viewBox="0 0 16 16">
                                                    <path
                                                        d="M8 0a8 8 0 1 1 0 16A8 8 0 0 1 8 0M4.5 7.5a.5.5 0 0 0 0 1h5.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5z"/>
                                                </svg>
                                            </div>
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <style>
        .previous-event {
            background-image: url("{{asset('assets/placeholder1.jpeg')}}");
            background-size: cover;
            background-position: center;
        }
    </style>
@endsection
