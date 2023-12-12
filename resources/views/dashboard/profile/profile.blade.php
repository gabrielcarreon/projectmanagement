@extends('layouts.index')
@section('content')

    <div class="d-flex">
        @php
            $months = [];
            $days = [];
            $years = [];
            $maritalStatus = [
                ['name' => '1', 'label' => 'Single'],
                ['name' => '2', 'label' => 'Married'],
                ['name' => '3', 'label' => 'Widowed'],
            ];
            $sex = [
                ['name' => 1, 'label' => "Male"],
                ['name' => 2, 'label' => "Female"]
            ];
            for ($m=1; $m<=12; $m++) {
                $month = date('F', mktime(0,0,0,$m, 1));
                $months[] = [
                    'name' => $m,
                    'label' => $month
                ];
            }
            for($y = date('Y'); $y >= 1950; $y--){
                $years[] = [
                    'name' => $y,
                    'label' => $y
                    ];
            }
            for($d=1; $d <= 30; $d++){
                $days[] = ['name' => $d, 'label' => $d];
            }
            $src = Auth::user()->image == "" ? asset('assets/unset.webp') : asset('/uploads/'.Auth::user()->image);
        @endphp
        @include('components.navigation')
        <div class="container-fluid">
            @include('components.navbar')
            <div class="row mt-0 mt-md-2">
                <div class="col-12">
                    <div class="card stripe-box-shadow p-4">
                        <form action="{{route('profile.update')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="d-flex justify-content-center flex-column align-items-center">
                                <x-forms.image
                                        acceptedTypes="image/*"
                                        id="image"
                                        src="uploads/{{Auth::user()->image}}">

                                </x-forms.image>
                                {{--                        <img src="{{$src}}" class="rounded-circle" style="background-size:contain; height:150px; width: 150px;"--}}
                                {{--                             alt="Avatar"/>--}}
                                {{--                        <input type="file" accept="image/png, image/jpeg" name="image"/>--}}
                                <h3 class="mt-2 fw-semibold mb-0">{{Auth::user()->lname}}
                                    , {{Auth::user()->fname}} {{Auth::user()->mname}}</h3>
                                <p class="fs-4">{{ucwords(Auth::user()->user_access)}}</p>
                            </div>
                            <div class="container">
                                <div class="row justify-content-center">
                                    <div class="col-12 col-md-8">
                                        <x-forms.input
                                                type="text"
                                                value="{{Auth::user()->fname}}"
                                                placeholder="First Name"
                                                name="First Name"
                                                field="fname"></x-forms.input>
                                        <x-forms.input
                                                type="text"
                                                placeholder="middleName"
                                                name="Middle Name"
                                                value="{{Auth::user()->mname}}"
                                                :required="false"
                                                field="mname"></x-forms.input>
                                        <x-forms.input
                                                type="text"
                                                placeholder="Last Name"
                                                name="Last Name"
                                                value="{{Auth::user()->lname}}"
                                                field="lname"></x-forms.input>
                                        <div class="container-fluid my-1">
                                            <div class="row">
                                                <div class="col-4 ps-0">
                                                    <x-forms.select
                                                            id="month"
                                                            label="Month"
                                                            margin="0"
                                                            :options="$months"
                                                            name="month"
                                                            value="{{explode('-', Auth::user()->birthdate)[1]}}"
                                                    ></x-forms.select>
                                                </div>
                                                <div class="col-4 px-1">
                                                    <x-forms.select
                                                            id="day"
                                                            label="Day"
                                                            margin="0"
                                                            :options="$days"
                                                            value="{{explode('-', Auth::user()->birthdate)[2]}}"
                                                            name="day"
                                                    ></x-forms.select>
                                                </div>
                                                <div class="col-4 pe-0">
                                                    <x-forms.select
                                                            id="year"
                                                            label="Year"
                                                            margin="0"
                                                            value="{{explode('-', Auth::user()->birthdate)[0]}}"
                                                            :options="$years"
                                                            name="year"></x-forms.select>
                                                </div>
                                            </div>


                                        </div>
                                        <x-forms.input
                                                type="email"
                                                placeholder="Email Address"
                                                name="Email Address"
                                                value="{{Auth::user()->email}}"
                                                field="email"></x-forms.input>
                                        <x-forms.input
                                                type="text"
                                                placeholder="Address"
                                                value="{{Auth::user()->address}}"
                                                name="Address"
                                                field="address"></x-forms.input>
                                        <x-forms.input
                                                type="text"
                                                placeholder="Contact"
                                                value="{{Auth::user()->contact}}"
                                                name="Contact"
                                                field="contact"
                                                maxlength="11"></x-forms.input>
                                        <div class="mt-2">
                                            <x-forms.select
                                                    id="maritalStatus"
                                                    label="Marital Status"
                                                    margin="0"
                                                    :options="$maritalStatus"
                                                    value="{{Auth::user()->marital_status}}"
                                                    name="maritalStatus"></x-forms.select>
                                        </div>
                                        <div class="mt-2">
                                            <x-forms.select
                                                    id="sex"
                                                    label="Sex"
                                                    margin="0"
                                                    :options="$sex"
                                                    value="{{Auth::user()->gender}}"
                                                    name="sex"></x-forms.select>
                                        </div>
                                        @if($errors->any())
                                            <div class="alert alert-danger mt-2">{{$errors->all()[0]}}</div>
                                        @endif
                                        @if(session('message'))
                                            <div class="alert alert-success mt-2">
                                                {{session('message')}}
                                            </div>
                                        @endif
                                <div class="d-flex justify-content-center mt-2">
                                    <button type="button" class="btn btn-primary rounded-0" data-bs-toggle="modal" data-bs-target="#confirmModal" style="min-width: 10rem;">Save</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <x-modal.confirmation message="Are you sure you want to update your information?"></x-modal.confirmation>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
