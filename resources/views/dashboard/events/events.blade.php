@extends('layouts.index')
<div class="d-flex">
    @include('components.navigation')
    <div class="container">
        <div class="row mt-3">
            <div class="col-12">
                <div class="card stripe-box-shadow p-4" style="border-radius: 32px;">
                    <div class="card stripe-box-shadow position-relative upcoming-events" style="min-height: 60vh; border-radius: 28px;">
                        <div class="position-absolute bottom-0 left-0 p-4" style="background-color: rgba(0,0,0, .6); border-radius: 0 28px 0 28px;">
                            <h1 class="text-white" style="font-size: 2rem;">Name of Event</h1>
                            <h2 class="text-white fw-semibold" style="font-size: 3rem;">Upcoming Events</h2>
                        </div>
                        <div class="position-absolute bottom-0 end-0 p-4">
                            <svg xmlns="http://www.w3.org/2000/svg" width="64" height="64" fill="white" class="bi bi-arrow-right-circle-fill cursor-pointer" viewBox="0 0 16 16">
                                <path d="M8 0a8 8 0 1 1 0 16A8 8 0 0 1 8 0M4.5 7.5a.5.5 0 0 0 0 1h5.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5z"/>
                            </svg>
                        </div>
                    </div>
                    <div class="container-fluid">
                        <div class="row mt-2" style="min-height: 30vh;">
                            <div class="col-6">
                                <div class="card mt-4 border-0">
                                @if(Auth::user()->user_access == 'admin')
                                    <button type="button" data-bs-toggle="modal" data-bs-target="#addEventModal" class="fs-1 rounded-pill btn btn-primary mt-2 p-3">
                                        Add Event
                                    </button>
                                    <button class="fs-1 rounded-pill btn btn-primary mt-2 p-3">
                                        Edit Event
                                    </button>
                                @else
                                    <button type="button"  class="fs-1 rounded-pill btn btn-primary mt-2 p-3">
                                        Register
                                    </button>
                                @endif
                                </div>

                            </div>
                            <div class="col-6">
                                <div class="card position-relative stripe-box-shadow previous-event" style="min-height: 100%; border-radius: 36px;">
                                    <div class="position-absolute bottom-0 left-0">
                                        <div class="container" style="background-color: rgba(0,0,0, .6); border-radius: 0 28px 0 28px;">
                                            <div class="col-12 p-3">
                                                <h4 class="text-white mb-0 fw-semibold">Name of Event</h4>
                                                <h1 class="text-white mb-0 fw-bold" style="font-size: 2rem;">Previous Events</h1>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="modal fade" id="addEventModal" tabindex="-1" aria-labelledby="addEventModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="addEventModalLabel">Add Event</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                ...
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary">Add event</button>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>
</div>

<style>
    .upcoming-events{
        background-image: url("{{asset('assets/placeholder2.jpg')}}");
        background-size: cover;
    }
    .previous-event{
        background-image: url("{{asset('assets/placeholder1.jpeg')}}");
        background-size: cover;
        background-position: center;
    }
</style>
