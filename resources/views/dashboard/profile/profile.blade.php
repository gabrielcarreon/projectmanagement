@extends('layouts.index')
<div class="d-flex">
    @php
        $months = [];
        $days = [];
        $years = [];
        $maritalStatus = [
            ['name' => 1, 'label' => 'Single'],
            ['name' => 2, 'label' => 'Married'],
            ['name' => 3, 'label' => 'Widowed'],
        ];
        for ($m=1; $m<=12; $m++) {
            $month = date('F', mktime(0,0,0,$m, 1));
            $months[] = ['name' => $m,
            'label' => $month];
        }
        for($y = date('Y'); $y >= 1950; $y--){
            $years[] = ['name' => $y, 'label' => $y];
        }
        for($d=1; $d <= 30; $d++){
            $days[] = ['name' => $d, 'label' => $d];
        }
        $src = Auth::user()->image == "" ? asset('assets/unset.webp') : asset('/uploads/'.Auth::user()->image);
    @endphp
@include('components.navigation')

    <div class="container">
        <div class="row mt-2">
            <div class="col-12 mt-5">
                <div class="card stripe-box-shadow p-4">
                    <form action="{{route('profile.update')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                    <div class="d-flex justify-content-center flex-column align-items-center">
                        <img src="{{$src}}" class="rounded-circle" style="background-size:contain; height:150px; width: 150px;"
                             alt="Avatar"/>
                        <input type="file" accept="image/png, image/jpeg" name="image"/>
                        <h3 class="mt-2 fw-semibold mb-0">{{Auth::user()->lname}}, {{Auth::user()->fname}} {{Auth::user()->mname}}</h3>
                        <p class="fs-4">{{ucwords(Auth::user()->user_access)}}</p>
                    </div>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-8">
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
                                                value="{{Auth::user()->month}}"
                                                ></x-forms.select>
                                        </div>
                                        <div class="col-4 px-1">
                                            <x-forms.select
                                                id="day"
                                                label="Day"
                                                margin="0"
                                                :options="$days"
                                                name="day"
                                                ></x-forms.select>
                                        </div>
                                        <div class="col-4 pe-0">
                                            <x-forms.select
                                                id="year"
                                                label="Year"
                                                margin="0"
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
                                        name="maritalStatus"></x-forms.select>
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
                        <div class="modal fade" id="confirmModal" tabindex="-1" aria-labelledby="confirmModalLabel" aria-hidden="true">
                            <div class="modal-dialog  modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="confirmModalLabel">Confirm</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        Are you sure you want to update your information?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary" style="min-width: 5rem;">Save</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
