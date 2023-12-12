@extends('layouts.index')
@vite('resources/css/main.css')

<div class="landing-bg pt-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-md-8 col-lg-6">
                <div class="card p-4 mx-4" style="max-width: 50rem;">
                    <div class="d-flex pt-5 pb-4 d-flex justify-content-center">
                        <img class="logo" src="{{asset('assets/logo.png')}}" alt="">
                    </div>


                    <div class="px-4">
                        <h1 class="text-center">Login</h1>
                        <form action="/login" method="POST">
                            @csrf
                        <x-forms.input
                            type="text"
                            placeholder="email"
                            name="Username"
                            field="username"></x-forms.input>
                        <x-forms.input
                            type="password"
                            placeholder="password"
                            name="Password"
                            field="password"></x-forms.input>
                        <div class="mt-3 d-flex justify-content-center">
                            <x-forms.checkbox
                            checked=""
                            name="Remember"
                            label="Remember me?"></x-forms.checkbox>
                        </div>
                        <div class="d-flex justify-content-center">
                            <x-buttons.primary
                                label="Login"
                                type="submit"
                                btnType="primary"></x-buttons.primary>
                        </div>
                        </form>
                        <p class="text-center mt-3 mb-0">Don't have an account? <a href="/register" class="text-link">Register here.</a></p>
                        <p class="text-center"><a href="">Forgot your password?</a></p>
                        <p class="text-center">©2023</p>
                    </div>
                    @if($errors->any())
                        <div class="alert alert-danger text-center">
                            {{$errors->all()[0]}}
                        </div>
                    @endif
                </div>
            </div>

        </div>
    </div>
</div>
