@extends('layouts.index')
@php
$months = [];
$days = [];
$years = [];
$maritalStatus = [
    ['name' => 1, 'label' => 'Single'],
    ['name' => 2, 'label' => 'Married'],
    ['name' => 3, 'label' => 'Widowed'],
];
$sex = [
    ['name' => 1, 'label' => "Male"],
    ['name' => 2, 'label' => "Female"]
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
@endphp
@vite('resources/css/main.css')
<div class="landing-bg pt-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-10 col-md-8 col-lg-6">
                <div class="card p-4 mx-4" style="max-width: 50rem;">
                    <div class="d-flex pt-5 pb-4 d-flex justify-content-center">
                        <img class="logo" src="{{asset('assets/logo.png')}}" alt="">
                    </div>
                    @if($errors->any())
                        {!! implode('', $errors->all('<div>:message</div>')) !!}
                    @endif
                    @if(session('message'))
                        <div class="alert alert-danger">{{session('message')}}</div>
                    @endif
                    <div class="px-4">
                        <h3 class="text-center">Registration</h3>
                        <form action="/register" method="POST">
                            @csrf
                            <x-forms.input
                                type="email"
                                placeholder="email"
                                name="Email"
                                field="email"></x-forms.input>
                            <x-forms.input
                                type="text"
                                placeholder="email"
                                name="First Name"
                                field="fname"></x-forms.input>
                            <x-forms.input
                                type="text"
                                placeholder="email"
                                name="Middle Name (Optional)"
                                :required="false"
                                field="mname"></x-forms.input>
                            <x-forms.input
                                type="text"
                                placeholder="email"
                                name="Last Name"
                                field="lname"></x-forms.input>
                            <x-forms.input
                                type="text"
                                placeholder="email"
                                name="Address"
                                field="address"></x-forms.input>
                            <x-forms.input
                                type="text"
                                placeholder="email"
                                name="Contact Number"
                                field="contact"
                                max="11"></x-forms.input>
                            <x-forms.input
                                type="text"
                                placeholder="password"
                                name="Password"
                                field="password"></x-forms.input>
                            <x-forms.input
                                type="text"
                                placeholder="password"
                                name="Confirm Password"
                                field="confirmPassword"></x-forms.input>
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-4 px-0">
                                        <x-forms.select
                                            id="month"
                                            label="Month"
                                            margin="0"
                                            :options="$months"
                                            name="month" ></x-forms.select>
                                    </div>
                                    <div class="col-4 px-1"> <x-forms.select
                                            id="day"
                                            label="Day"
                                            margin="0"
                                            :options="$days"
                                            name="day"></x-forms.select>
                                    </div>
                                    <div class="col-4 px-0">
                                        <x-forms.select
                                            id="year"
                                            label="Year"
                                            margin="0"
                                            :options="$years"
                                            name="year"></x-forms.select>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-2">
                                <x-forms.select
                                    id="maritalStatus"
                                    label="Marital Status"
                                    margin="0"
                                    :options="$maritalStatus"
                                    name="maritalStatus"></x-forms.select>
                            </div>
                            <div class="mt-2">
                                <x-forms.select
                                    id="sex"
                                    label="Sex"
                                    margin="0"
                                    :options="$sex"
                                    name="sex"></x-forms.select>
                            </div>
                            <div class="d-flex justify-content-center mt-3">
                            <x-buttons.primary
                                label="Register"
                                type="submit"
                                btnType="primary"></x-buttons.primary>
                            </div>
                            <div class="d-flex justify-content-center mt-1">
                                <x-buttons.primary
                                    label="Login"
                                    type="button"
                                    redirect="true"
                                    href="/"
                                    btnType="secondary"></x-buttons.primary>
                            </div>
                        </form>
                        <p class="text-center">©2023</p>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
