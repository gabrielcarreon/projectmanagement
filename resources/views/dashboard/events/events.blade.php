@extends('layouts.index')
@section('content')

    <div class="d-flex">
        @include('components.navigation')
        <div class="container">
            @include('components.navbar')
            <div class="row mt-4">
                <h1 class="fw-bold">Events</h1>
                <hr>
                <div class="col-12 d-flex justify-content-end">
                    <button style="width: fit-content" class="btn btn-primary" data-bs-toggle="modal"
                            data-bs-target="#addEventModal">Add Event
                    </button>
                </div>
                <div class="col-12">
                    <div class="container">
                        <div class="row mt-3">
                            @if(session('message'))
                                <div class="alert alert-danger">{{session('message')}}</div>
                            @endif
                            {{--                            <div class="col-4">--}}
                            {{--                                <div class="card" style="width: 18rem;">--}}
                            {{--                                    <img src="{{asset('assets/placeholder1.jpeg')}}" class="card-img-top" alt="...">--}}
                            {{--                                    <div class="card-body">--}}
                            {{--                                        <h5 class="card-title">Card title</h5>--}}
                            {{--                                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>--}}
                            {{--                                        <a href="{{route('event.edit')}}" class="btn btn-primary">Edit Event</a>--}}
                            {{--                                    </div>--}}
                            {{--                                </div>--}}
                            {{--                            </div>--}}
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

    <style>
        .event-card {
            border-width: 1px 1px 0px 1px;

        }

        .event-card p {
            text-overflow: ellipsis;
            overflow: hidden;
        }
    </style>

@endsection
