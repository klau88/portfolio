@extends('layout')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="row mt-3">
                <h3 class="col-sm-10 col-xs-12 text-sm-left text-center">{{ $project->title }}</h3>
                <div class="col-sm-2 col-xs-12 text-sm-right text-center">
                    <a class="btn btn-success" href="{{ route('projects.index') }}">{{ trans('form.back') }}</a>
                    <a class="btn btn-primary" href="{{ route('projects.edit', ['id' => $project->id]) }}">{{ trans('form.edit') }}</a>
                </div>
                <div class="col-sm-8 col-12">
                    <span class="text-info">{{ $project->start }} - {{ $project->end }}</span>
                    <div class="text-dark">
                        {{ $project->description }}
                    </div>
                </div>
                <div class="col-sm-4 col-12">
                    @foreach($project->images as $image)
                        <img width="100%" src="{{ asset('images/'.$image->name) }}">
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
