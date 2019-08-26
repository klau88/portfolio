@extends('layout')

@section('content')
    <div class="row">
        Logged in!

        {{ auth()->user() }}
    </div>
@endsection
