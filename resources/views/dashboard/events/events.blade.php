@extends('layouts.index')
@section('content')
    <div class="d-flex">
        @include('components.navigation')
        <div class="container">
            @include('components.navbar')
            @php
            $status = [
                ['name' => 'scheduled', 'label' => 'Scheduled'],
                ['name' => 'on-going', 'label' => 'On-Going'],
                ['name' => 'done', 'label' => 'Done'],
            ];
            @endphp
            <div class="row">
                @if(session('message'))
                    <div id="alert">
                        <div class="alert
                         @if(session('status') == 'success')
                         success
                         @else
                         error
                         @endif
                         rounded-0">{{session('message')}}</div>
                        <script>
                            jQuery(()=>{
                                setTimeout(()=>{
                                    $(`#alert`).remove();
                                },1500)
                            })
                        </script>
                    </div>
                @endif

                <h1 class="fw-bold mt-2">Events</h1>
                <hr>
                <div class="col-12 d-flex justify-content-end">
                    <button class="btn btn-primary me-2" data-bs-toggle="modal" data-bs-target="#filterModal">Filters</button>
                    <button style="width: fit-content" class="btn btn-success" data-bs-toggle="modal"
                            data-bs-target="#addEventModal">Add Event
                    </button>
                </div>
                <div class="col-12">
                    <div class="container">
                        <div class="row mt-3">
                            @if(count($events) > 0)
                                @foreach($events as $event)
                                    <div class="mt-3 col-12 col-mg-6 col-lg-3 d-flex justify-content-center">
                                        <div class="card stripe-box-shadow" style="width: 18rem;">
                                            <div class="overflow-hidden" style="max-height: 200px;">
                                                <img src="{{asset("uploads/$event->image")}}" class="card-img-top" alt="...">
                                            </div>
                                            <div class="card-body">
                                                <h5 class="card-title">{{$event->event_name}}</h5>
                                                <p class="card-text-custom card-text">
                                                    {{$event->description}}
                                                </p>
                                                <div class="d-flex justify-content-end">
                                                    <a href="{{route('event.view', $event->id)}}" class="btn btn-primary">View Event</a>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach

                            @else
                                <h1 class="text-center fw-semibold">No events yet.</h1>
                            @endif
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
                    <h1 class="modal-title fs-5 mt-0" id="addEventModalLabel">Add Event</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{route('event.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-12 col-md-10">
                                    <x-forms.input
                                        type="text"
                                        label="Event Name"
                                        name="Event Name"
                                        field="eventName"
                                        placeholder="eventName">

                                    </x-forms.input>
                                </div>
                            </div>
                            <div class="row justify-content-center">
                                <div class="col-12 col-md-10">
                                    <x-forms.image
                                        acceptedTypes=".png, .jpeg, .jpg"
                                        id="eventImage">
                                    </x-forms.image>
                                    <x-forms.input
                                        type="text"
                                        label="Description"
                                        name="Description"
                                        field="description"
                                        placeholder="description">

                                    </x-forms.input>
                                    <x-forms.input
                                        type="text"
                                        label="Location"
                                        name="Location"
                                        field="location"
                                        placeholder="location">

                                    </x-forms.input>
                                </div>
                                <div class="col-12 col-md-5">
                                    <x-forms.input
                                        type="date"
                                        label="Start Date"
                                        name="Start Date"
                                        field="startDate"
                                        placeholder="startDate">
                                    </x-forms.input>
                                </div>
                                <div class="col-12 col-md-5">
                                    <x-forms.input
                                        type="date"
                                        label="End Date"
                                        name="End Date"
                                        field="endDate"
                                        placeholder="endDate">
                                    </x-forms.input>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Add event</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
    <div class="modal fade" id="filterModal" tabindex="-1" aria-labelledby="filterModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="filterModalLabel">Filters</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{route('events')}}" method="POST">
                @csrf

                <div class="modal-body">
                    <x-forms.select
                    :options="$status"
                    label="Status"
                    id="status"
                    margin="0"
                    name="status">
                    </x-forms.select>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Apply Filters</button>
                </div>
                </form>

            </div>
        </div>
    </div>

    <style>
        .card-img-top{
            background-position: center;
            background-size: cover;
            width: 100%;
        }
        .card-text-custom{
            margin: 0;
            height: 40px;
            min-height: 40px;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }
        .event-card {
            border-width: 1px 1px 0px 1px;

        }

        .event-card p {
            text-overflow: ellipsis;
            overflow: hidden;
        }
    </style>

@endsection
