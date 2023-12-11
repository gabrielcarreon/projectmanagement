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

                    <div class="px-4">
                        <h1 class="text-center">Registration</h1>
                        <p class="mb-0 text-center">Registration success. You can now log in to your account.</p>
                        <div class="d-flex justify-content-center my-2">
                            <x-buttons.primary
                                label="Go back"
                                type="button"
                                redirect="true"
                                btnType="primary"
                                href="/"
                                ></x-buttons.primary>
                        </div>
                        <p class="text-center">©2023</p>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
