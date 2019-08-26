@extends('layout')

@section('content')
    <div class="row">
        @foreach($projects as $project)
            <div class="col-12">
                <h2>{{ $project->title }}</h2>
                <div>
                    {{ $project->description }}
                </div>
            </div>
        @endforeach
    </div>
@endsection
