@extends('layouts.index')
@section('content')
    <div class="d-flex">
        @include('components.navigation')
        <div class="container">

            @include('components.navbar')
            @php
                $eventStatus = [
                    ['name' => 'scheduled', 'label' => 'Scheduled'],
                    ['name' => 'on-going', 'label' => 'On-going'],
                    ['name' => 'done', 'label' => 'Done'],
                ];
                $disabled = $event[0]->status == "done" ? true : false;
            @endphp
            <div class="row">
                <a href="{{route('events')}}" style="width: fit-content"
                   class=" d-flex align-items-center text-black fw-bold mt-2 fs-1">
                    <svg xmlns="http://www.w3.org/2000/svg" height="36" viewBox="0 -960 960 960" width="36">
                        <path d="M560-240 320-480l240-240 56 56-184 184 184 184-56 56Z"/>
                    </svg>
                    Events</a>
                <hr class="mb-0">
                <div class="col-12 px-0">
                    @if($errors->any())
                        <div class="alert alert-danger">{{$errors->all()[0]}}</div>
                    @endif
                    @if(session('message'))
                        <div id="alert" class="">
                            <div class="alert
                                             @if(session('status') == 'success')
                                             alert-success
                                             @else
                                             alert-danger
                                             @endif
                                             rounded-0">{{session('message')}}</div>
                            <script>
                                jQuery(() => {
                                    setTimeout(() => {
                                        $(`#alert`).remove();
                                    }, 3000)
                                })
                            </script>
                        </div>
                    @endif
                    <div class="container mt-3">
                        <div class="row justify-content-center">
                            <div class="col-12 col-md-10 ">
                                @if(Auth::user()->user_access == 'admin')
                                    <form enctype="multipart/form-data" method="POST"
                                          action="{{route('event.update', $event[0]->id)}}">
                                        @else
                                            <form method="POST"
                                                  action="{{route('register.store', $event[0]->id)}}">
                                                @endif

                                                @csrf
                                                <div class="container">
                                                    <div class="row">
                                                        <div class="col-12 col-md-10">
                                                            <div class="form-floating mb-3 input-group-lg">
                                                                <input name="eventName" type="text" class="form-control"
                                                                       @if($disabled || Auth::user()->user_access != 'admin') disabled
                                                                       @endif
                                                                       id="eventName" value="{{$event[0]->event_name}}">
                                                                <label for="eventName">Event Name</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-12 col-md-2">
                                                            <x-forms.select
                                                                id="eventStatus"
                                                                label="Event Status"
                                                                margin="0"
                                                                :disabled="$disabled || Auth::user()->user_access != 'admin'"
                                                                :options="$eventStatus"
                                                                :value="$event[0]->status"
                                                                name="eventStatus">

                                                            </x-forms.select>
                                                        </div>

                                                    </div>
                                                </div>
                                                <div
                                                    class="d-flex flex-column align-items-center justify-content-center">
                                                    <x-forms.image
                                                        id="eventImage"
                                                        acceptedTypes="images/"
                                                        src="uploads/{{$event[0]->image}}"
                                                        :disabled="$disabled || Auth::user()->user_access != 'admin'">

                                                    </x-forms.image>
                                                </div>
                                                <div class="form-floating mx-2">
                                        <textarea name="description" class="form-control"
                                                  placeholder="Leave a comment here" id="description"
                                                  @if($disabled || Auth::user()->user_access != 'admin') disabled @endif
                                                  style="height: 150px">{{$event[0]->description}}</textarea>
                                                    <label for="description">Event Description</label>
                                                </div>
                                                <div class="container-fluid mt-2">
                                                    <div class="row">
                                                        <div class="col-12 col-md-4">
                                                            <x-forms.input
                                                                type="text"
                                                                label="Location"
                                                                name="Location"
                                                                field="location"
                                                                value="{{$event[0]->location}}"
                                                                :disabled="$disabled || Auth::user()->user_access != 'admin'"
                                                                placeholder="event"></x-forms.input>
                                                        </div>
                                                        <div class="col-12 col-md-4">
                                                            <x-forms.input
                                                                type="date"
                                                                label="Event Start"
                                                                name="Event Start"
                                                                field="startDate"
                                                                placeholder="startDate"
                                                                :disabled="$disabled || Auth::user()->user_access != 'admin'"
                                                                :value="date('Y-m-d', strtotime($event[0]->event_start))">
                                                            </x-forms.input>
                                                        </div>
                                                        <div class="col-12 col-md-4">
                                                            <x-forms.input
                                                                type="date"
                                                                label="Event End"
                                                                name="Event End"
                                                                field="endDate"
                                                                placeholder="endDate"
                                                                :disabled="$disabled || Auth::user()->user_access != 'admin'"
                                                                :value="date('Y-m-d', strtotime($event[0]->event_end))">
                                                            </x-forms.input>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="d-flex justify-content-center mt-4">
                                                    @if($event[0]->status != 'done'  && Auth::user()->user_access == 'admin')

                                                        <x-buttons.primary
                                                            label="Save Changes"
                                                            btnType="success"
                                                            type="submit"
                                                            name="Approve"
                                                            class="btn btn-success"
                                                            value="Approve"
                                                            style="width: 50%"
                                                            id="approve">
                                                        </x-buttons.primary>
                                                    @endif
                                                    @if(Auth::user()->user_access == 'resident')
                                                        @if(($event[0]->status == 'scheduled') && $registration == 0)
                                                            <button type="button"
                                                                    class="btn btn-success rounded-0 px-5 small"
                                                                    data-bs-toggle="modal"
                                                                    data-bs-target="#confirmModal"
                                                                    style="min-width: 10rem;">Register
                                                            </button>
                                                                <x-modal.confirmation
                                                                    message="Are you sure you want to register?"></x-modal.confirmation>
                                                        @else

                                                            <button type="button"
                                                                    class="btn btn-secondary rounded-0 px-5 small disabled"
                                                                    style="min-width: 10rem;">Registered
                                                            </button>
                                                        @endif
                                                    @endif
                                                </div>
                                            </form>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <style>
        .event-image {
            height: 200px;
        }
    </style>
@endsection
