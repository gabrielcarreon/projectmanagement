@php
    $currentRoute = isset(explode('/', url()->current())[4]) ? explode('/', url()->current())[4] : 'login';
    $src = Auth::user()->image == "" ? asset('assets/unset.webp') : asset('/uploads/'.Auth::user()->image);
@endphp
<nav class="navbar bg-body-tertiary navbar-expand-lg  d-block d-md-none">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Brgy 660-A</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link
                    @if($currentRoute == 'login')
                    active
                    @endif" aria-current="page" href="{{route('dashboard')}}">Dashboard</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link
                    @if($currentRoute == 'profile')
                    active
                    @endif" href="{{route('profile')}}">Profile</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link
                    @if($currentRoute == 'events')
                    active
                    @endif" href="{{route('events')}}">Events</a>
                </li>
                @if(Auth::user()->user_access == 'admin')
                <li class="nav-item">
                    <a class="nav-link
                    @if($currentRoute == 'residents')
                    active
                    @endif" href="{{route('residents')}}">Residents</a>
                </li>
                @endif
                <li class="nav-item">
                    <a class="nav-link" href="{{route('logout')}}" aria-disabled="true">Logout</a>
                </li>
            </ul>

        </div>
    </div>
</nav>
