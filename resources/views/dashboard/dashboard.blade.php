@extends('layouts.index')
@section('content')

<div class="d-flex">
    @include('components.navigation')
    <div class="container">
        @include('components.navbar')
        <div class="row mt-0 mt-md-5">
            <div class="col-12 col-lg-6">
                <a href="{{route('events')}}" class="text-decoration-none card rounded-lg p-4 stripe-box-shadow" style="min-height: 25vh; border-radius: 36px;">
                    <h1>Events</h1>
                </a>
            </div>
            <div class="col-12 col-lg-6">
                <a href="{{route('calendar')}}" class="text-decoration-none card rounded-lg p-4 stripe-box-shadow" style="min-height: 25vh; border-radius: 36px;">
                    <h1>Calendar</h1>
                </a>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-12">
                <div class="card position-relative stripe-box-shadow" style="min-height: 50vh; border-radius: 36px;">
                    <div class="position-absolute bottom-0 left-0">
                        <div class="container">
                            <div class="col-12 p-3">
                                <h2 class="mb-0 fw-semibold fs-1">Name of Event</h2>
                                <h1 class="mb-o fw-bold" style="font-size: 3rem;">Previous Events</h1>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
