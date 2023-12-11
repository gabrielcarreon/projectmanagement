@extends('layouts.index')
@section('content')

<div class="d-flex">
    @include('components.navigation')
    <div class="container-fluid">
        @include('components.navbar')
        <div class="row mt-0 mt-md-3">
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
                            <div class="col-12 col-md-6">
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
                            <div class="col-12 col-md-6 mt-5 mt-md-4">
                                <div class="card position-relative stripe-box-shadow previous-event" style="min-height: 25vh; border-radius: 36px;">
                                    <div class="position-absolute bottom-0 start-0">
                                        <div class="container my-0" style="background-color: rgba(0,0,0, .6); border-radius: 0 28px 0 28px;">
                                            <div class="row">
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

                </div>
                <div class="modal fade" id="addEventModal" tabindex="-1" aria-labelledby="addEventModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5 mt-0" id="addEventModalLabel">Add Event</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="container">
                                    <div class="row justify-content-center">
                                        <div class="col-12 col-md-8">
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
                                            <div class="d-flex justify-content-center my-3">
                                                <div class="avatar-upload">
                                                    <div class="avatar-edit">
                                                        <input type='file' id="imageUpload" accept=".png, .jpg, .jpeg" />
                                                        <label for="imageUpload"></label>
                                                    </div>
                                                    <div class="avatar-preview  d-flex justify-content-center">
                                                        <div id="imagePreview" style="background-image: url('{{asset('assets/unset.webp')}}');">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
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

    .avatar-upload {
        position: relative;
        max-width: 300px;
        .avatar-edit {
            position: absolute;
            right: 0px;
            z-index: 1;
            top: 0px;
            input {
                display: none;
                + label {
                    display: inline-block;
                    width: 34px;
                    height: 34px;
                    margin-bottom: 0;
                    background: #FFFFFF;
                    border: 1px solid transparent;
                    box-shadow: 0px 2px 4px 0px rgba(0, 0, 0, 0.12);
                    cursor: pointer;
                    font-weight: normal;
                    transition: all .2s ease-in-out;
                    &:hover {
                        background: #f1f1f1;
                        border-color: #d6d6d6;
                    }
                    &:after {
                        content: "\f040";
                        color: #757575;
                        position: absolute;
                        top: 10px;
                        left: 0;
                        right: 0;
                        text-align: center;
                        margin: auto;
                    }
                }
            }
        }
        .avatar-preview {
            width: 300px;
            height: 192px;
            position: relative;
            border: 6px solid #F8F8F8;
            box-shadow: 0px 2px 4px 0px rgba(0, 0, 0, 0.1);
            > div {
                width: 150%;
                height: 100%;
                background-size: cover;
                background-repeat: no-repeat;
                background-position: center;
            }
        }
    }
</style>
<script>
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#imagePreview').css('background-image', 'url('+e.target.result +')');
                $('#imagePreview').hide();
                $('#imagePreview').fadeIn(650);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
    $("#imageUpload").change(function() {
        readURL(this);
    });

</script>
@endsection
