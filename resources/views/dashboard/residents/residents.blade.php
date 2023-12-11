@extends('layouts.index')
<div class="d-flex">
@include('components.navigation')
    <div class="container">
        <div class="row mt-5">
            <div class="col-12">
                <div class="stripe-box-shadow p-4 rounded-5">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th scope="col" class="text-center bg-info-subtle">Name</th>
                                <th scope="col" class="text-center bg-info-subtle">Birthday</th>
                                <th scope="col" class="text-center bg-info-subtle">Gender</th>
                                <th scope="col" class="text-center bg-info-subtle">Contact</th>
                                <th scope="col" class="text-center bg-info-subtle">Civil Status</th>
                            </tr>
                        </thead>
                        <tbody>
                        @if(count($users) > 0)
                            @foreach($users as $user)
                                <tr>
                                    <td scope="col" class="text-center">{{$user->lname}}, {{$user->fname}} {{$user->mname}}</td>
                                    <td scope="col" class="text-center">{{date('F d, Y', strtotime($user->birthdate))}}</td>
                                    <td scope="col" class="text-center">Gender</td>
                                    <td scope="col" class="text-center">{{$user->contact}}</td>
                                    <td scope="col" class="text-center">
                                        @switch($user->marital_status)
                                            @case(1)
                                                Single
                                                @break
                                            @case(2)
                                                Married
                                                 @break
                                            @case(3)
                                                Widowed
                                                @break
                                        @endswitch</td>
                                </tr>
                            @endforeach
                        @endif
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
</div>


