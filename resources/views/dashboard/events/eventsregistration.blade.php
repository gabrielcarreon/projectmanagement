@extends('layouts.index')
@section('content')
    <div class="d-flex">
        <link href="https://cdn.datatables.net/v/bs5/dt-1.13.8/r-2.5.0/sc-2.3.0/datatables.min.css" rel="stylesheet">

        <script src="https://cdn.datatables.net/v/bs5/dt-1.13.8/r-2.5.0/sc-2.3.0/datatables.min.js"></script>
        @include('components.navigation')
        <div class="container">
            @include('components.navbar')
            <div class="row">
                <div class="col-12">
                    <h1 class="fw-bold mt-2">Registration List</h1>
                    <hr>
                    <div class="p-4 rounded-5">
                        <table class="table table-bordered" id="residentsTable">
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
                            @if(count($registration) > 0)
                                @foreach($registration as $user)
                                    <tr>
                                        <td scope="col" class="text-center">{{$user->lname}}
                                            , {{$user->fname}} {{$user->mname}}</td>
                                        <td scope="col"
                                            class="text-center">{{date('F d, Y', strtotime($user->birthdate))}}</td>
                                        <td scope="col" class="text-center">{{$user->gender == 1 ? "Male" : "Female"}}</td>
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
    <script>
        jQuery(()=>{
            $(`#residentsTable`).DataTable();
        })
    </script>
@endsection
