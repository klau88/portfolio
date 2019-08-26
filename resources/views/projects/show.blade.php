@extends('layout')

@section('content')
    <div class="row">
        <div class="col-12">
            <h2>{{ $project->title }}</h2>
            <div>
                {{ $project->description }}
            </div>
        </div>
    </div>
@endsection
