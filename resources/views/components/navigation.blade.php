<div class="flex-column d-none d-md-flex flex-shrink-0 p-3 text-white bg-dark " style="width: 280px; min-height: 100vh">
    <p href="/" class="mt-4 d-flex justify-content-center text-center d-flex align-items-center mb-3 mb-md-0 text-white text-decoration-none">
        <img src="{{asset('assets/logo.png')}}" alt="" style="width: 2rem;">&nbsp;
        <span class="fs-4 text-end">Barangay 660-A</span>
    </p>
    <p class="mb-0 text-center fs-5 mt-2">Welcome! {{Auth::user()->fname}} {{Auth::user()->lname}}</p>
    <hr>
    @php
    $currentRoute = isset(explode('/', url()->current())[4]) ? explode('/', url()->current())[4] : 'login';
    $src = Auth::user()->image == "" ? asset('assets/unset.webp') : asset('/uploads/'.Auth::user()->image);
    @endphp
    <ul class="nav nav-pills flex-column mb-auto">
        <li class="nav-item">
            <a href="{{route('dashboard')}}" class="nav-link
                @if($currentRoute == 'login')
                    active
                @else
                    text-white
                @endif"
                aria-current="page">
                <svg class="bi me-2" width="16" height="16"><use xlink:href="#home"></use></svg>
                Dashboard
            </a>
        </li>
        <li>
            <a href="{{route('profile')}}" class="nav-link
                @if($currentRoute == 'profile')
                    active
                @else
                    text-white
                @endif">
                <svg class="bi me-2" width="16" height="16"><use xlink:href="#speedometer2"></use></svg>
                Profile
            </a>
        </li>
        <li>
            <a href="{{route('events')}}" class="nav-link
                @if($currentRoute == 'events')
                    active
                @else
                    text-white
                @endif">
                <svg class="bi me-2" width="16" height="16"><use xlink:href="#table"></use></svg>
                Events
            </a>
        </li>
        @if(Auth::user()->user_access == 'admin')
        <li>
            <a href="{{route('residents')}}" class="nav-link
                @if($currentRoute == 'residents')
                    active
                @else
                    text-white
                @endif">
                <svg class="bi me-2" width="16" height="16"><use xlink:href="#grid"></use></svg>
                Residents
            </a>
        </li>
        @endif
        <li>
            <a href="{{route('calendar')}}" class="nav-link
                @if($currentRoute == 'calendar')
                    active
                @else
                    text-white
                @endif">
                <svg class="bi me-2" width="16" height="16"><use xlink:href="#people-circle"></use></svg>
                Calendar
            </a>
        </li>
    </ul>
    <hr>
    <div class="dropdown">
        <a href="#" class="d-flex justify-content-center align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
            <img src="{{$src}}" alt="" width="32" height="32" class="rounded-circle me-2">
            <strong>{{Auth::user()->fname}} {{Auth::user()->lname}}</strong>
        </a>
        <ul class="dropdown-menu dropdown-menu-dark text-small shadow" aria-labelledby="dropdownUser1">
{{--            <li><a class="dropdown-item" href="#">Profile</a></li>--}}
{{--            <li><hr class="dropdown-divider"></li>--}}
            <li><a class="dropdown-item" href="{{route('logout')}}">Sign out</a></li>
        </ul>
    </div>
</div>
