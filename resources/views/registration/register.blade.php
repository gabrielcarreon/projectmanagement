@extends('layouts.index')
@section('content')
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
            <div class="col-12 col-md-8 col-lg-6 mb-5">
                <div class="card p-4 mx-4" style="max-width: 50rem;">
                    <div class="d-flex pt-5 pb-4 d-flex justify-content-center">
                        <img class="logo" src="{{asset('assets/logo.png')}}" alt="">
                    </div>

                    <div class="px-4">
                        <h3 class="text-center">Registration</h3>
                        @if($errors->any())
                            {!! implode('', $errors->all('<div>:message</div>')) !!}
                        @endif
                        @if(session('message'))
                            <div class="alert alert-danger">{{session('message')}}</div>
                        @endif
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

                            <div class="input-group my-1">
                                <div class="form-floating">
                                    <input id="password" placeholder="password" name="password" type="password" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                                    <label for="password">Password</label>
                                </div>
                                <span class="cursor-pointer input-group-text toggle-password" data-toggle-target="#password">
                                    <svg xmlns="http://www.w3.org/2000/svg" height="20" viewBox="0 -960 960 960" width="20"><path d="M480-320q75 0 127.5-52.5T660-500q0-75-52.5-127.5T480-680q-75 0-127.5 52.5T300-500q0 75 52.5 127.5T480-320Zm0-72q-45 0-76.5-31.5T372-500q0-45 31.5-76.5T480-608q45 0 76.5 31.5T588-500q0 45-31.5 76.5T480-392Zm0 192q-146 0-266-81.5T40-500q54-137 174-218.5T480-800q146 0 266 81.5T920-500q-54 137-174 218.5T480-200Zm0-300Zm0 220q113 0 207.5-59.5T832-500q-50-101-144.5-160.5T480-720q-113 0-207.5 59.5T128-500q50 101 144.5 160.5T480-280Z"/></svg>
                                </span>
                            </div>
                            <div class="input-group my-1">
                                <div class="form-floating">
                                    <input id="confirmPassword" placeholder="confirmPassword" name="confirmPassword" type="password" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                                    <label for="confirmPassword">Confirm Password</label>
                                </div>
                                <span class="cursor-pointer input-group-text toggle-password" data-toggle-target="#confirmPassword">
                                    <svg xmlns="http://www.w3.org/2000/svg" height="20" viewBox="0 -960 960 960" width="20"><path d="M480-320q75 0 127.5-52.5T660-500q0-75-52.5-127.5T480-680q-75 0-127.5 52.5T300-500q0 75 52.5 127.5T480-320Zm0-72q-45 0-76.5-31.5T372-500q0-45 31.5-76.5T480-608q45 0 76.5 31.5T588-500q0 45-31.5 76.5T480-392Zm0 192q-146 0-266-81.5T40-500q54-137 174-218.5T480-800q146 0 266 81.5T920-500q-54 137-174 218.5T480-200Zm0-300Zm0 220q113 0 207.5-59.5T832-500q-50-101-144.5-160.5T480-720q-113 0-207.5 59.5T128-500q50 101 144.5 160.5T480-280Z"/></svg>
                                </span>
                            </div>



{{--                            <x-forms.input--}}
{{--                                type="text"--}}
{{--                                placeholder="password"--}}
{{--                                name="Password"--}}
{{--                                field="password"></x-forms.input>--}}
{{--                            <x-forms.input--}}
{{--                                type="text"--}}
{{--                                placeholder="password"--}}
{{--                                name="Confirm Password"--}}
{{--                                field="confirmPassword"></x-forms.input>--}}
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
<script>
    jQuery(()=>{
        const toggleOff =`<svg xmlns="http://www.w3.org/2000/svg" height="20" viewBox="0 -960 960 960" width="20"><path d="m644-428-58-58q9-47-27-88t-93-32l-58-58q17-8 34.5-12t37.5-4q75 0 127.5 52.5T660-500q0 20-4 37.5T644-428Zm128 126-58-56q38-29 67.5-63.5T832-500q-50-101-143.5-160.5T480-720q-29 0-57 4t-55 12l-62-62q41-17 84-25.5t90-8.5q151 0 269 83.5T920-500q-23 59-60.5 109.5T772-302Zm20 246L624-222q-35 11-70.5 16.5T480-200q-151 0-269-83.5T40-500q21-53 53-98.5t73-81.5L56-792l56-56 736 736-56 56ZM222-624q-29 26-53 57t-41 67q50 101 143.5 160.5T480-280q20 0 39-2.5t39-5.5l-36-38q-11 3-21 4.5t-21 1.5q-75 0-127.5-52.5T300-500q0-11 1.5-21t4.5-21l-84-82Zm319 93Zm-151 75Z"/></svg>`;
        const toggleOn = `<svg xmlns="http://www.w3.org/2000/svg" height="20" viewBox="0 -960 960 960" width="20"><path d="M480-320q75 0 127.5-52.5T660-500q0-75-52.5-127.5T480-680q-75 0-127.5 52.5T300-500q0 75 52.5 127.5T480-320Zm0-72q-45 0-76.5-31.5T372-500q0-45 31.5-76.5T480-608q45 0 76.5 31.5T588-500q0 45-31.5 76.5T480-392Zm0 192q-146 0-266-81.5T40-500q54-137 174-218.5T480-800q146 0 266 81.5T920-500q-54 137-174 218.5T480-200Zm0-300Zm0 220q113 0 207.5-59.5T832-500q-50-101-144.5-160.5T480-720q-113 0-207.5 59.5T128-500q50 101 144.5 160.5T480-280Z"/></svg>`

        $(`.toggle-password`).on(`click`, function(){
            let target = $(this).attr(`data-toggle-target`);
            let type = $(target).attr(`type`);
            if(type === `text`){
                $(target).attr(`type`, `password`);
                $(this).html(toggleOn);
            }else{
                $(target).attr(`type`, `text`);
                $(this).html(toggleOff);
            }
            // console.log(type)
        });
    })
</script>
@endsection
