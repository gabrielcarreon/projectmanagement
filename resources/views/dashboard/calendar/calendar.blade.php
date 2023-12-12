@extends('layouts.index')
@section('content')

    <div class="d-flex">
        @include('components.navigation')
        <div class="container">
            @include('components.navbar')
            <script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.10/index.global.min.js"></script>
            <div class="container">
                <row>
                    <div class="col-12">
                        <div id='calendar' class="mt-2"></div>
                    </div>
                </row>
            </div>
        </div>
    </div>
    <script>
        jQuery(() => {
            var calendarEl = document.getElementById('calendar');
            var calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth'
            });
            calendar.batchRendering(function () {
                calendar.changeView('dayGridMonth');
                // calendar.addEvent({ title: 'new event', start: '2023-12-18', end: '2023-12-20' })
                // calendar.addEvent({ title: 'new event', start: '2023-12-19', end: '2023-12-22' });

                @if(!is_null($events))
                    @foreach($events as $event)
                    // calendar.addEvent({ title: 'new event', start: '2023-12-18', end: '2023-12-20' })
                        calendar.addEvent({title: '{{$event->event_name}}',
                            start: '{{date('Y-m-d', strtotime($event->event_start))}}',
                            end: '{{date('Y-m-d', strtotime($event->event_end))}}'});
                    @endforeach
                @endif
            });
            calendar.render();
        })
    </script>
@endsection
