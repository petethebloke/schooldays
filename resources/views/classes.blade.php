@extends('layouts.master')

@section('content')
<h1>{{ $title }}</h1>

<h2>Classes</h2>
        @foreach ($students as $class => $attendees)
            <h3>{{ $class }}</h3>
            @foreach ($attendees as $attendee)
                {{ $attendee }} <br/>
            @endforeach
        @endforeach
@endsection
