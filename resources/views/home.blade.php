@extends('layouts.master')

@section('content')
<h1>{{ $title }}</h1>
<form action="classes">
    <label for="employee">Choose teacher</label>
    <select name="employee" onchange="this.form.submit()">
        <option>-</option>
        @foreach ($staff as $employee)
            <option value="{{ $employee['id'] }}" >
                {{ $employee['forename'] . ' ' . $employee['surname'] }}
            </option>
        @endforeach
    </select>
</form>
@endsection
