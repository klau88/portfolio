@extends('layout')

@section('content')
    <div class="row mt-3">
        <h3 class="col-sm-10 col-xs-12 text-sm-left text-center">{{ trans('app.projects') }}</h3>
        <div class="col-sm-2 col-xs-12 text-sm-right text-center">
            <a class="btn btn-primary" href="{{ route('projects.create') }}">{{ trans('form.create') }}</a>
        </div>
    </div>

    <hr>

    <div class="row">
        @foreach($projects as $project)
            <div class="col-12">
                <header class="row d-flex justify-content-between">
                    <h3 class="col-sm-9 col-xs-12">{{ $project->title }}</h3>
                    <div class="col-sm-3 col-xs-12 text-sm-right text-center">
                        <form id="delete-project" class="form form-inline" method="post" action="{{ route('projects.destroy', compact('project')) }}">
                            @csrf
                            @method('DELETE')
                        </form>

                        <a class="btn btn-info" href="{{ route('projects.show', $project) }}"><i class="fas fa-info-circle"></i></a>
                        <a class="btn btn-primary" href="{{ route('projects.edit', $project) }}"><i class="fas fa-edit"></i></a>
                        <button class="btn btn-danger" form="delete-project"><i class="fas fa-trash"></i></button>
                    </div>
                </header>

                <div class="row">
                    <div class="col-12">
                        {{ $project->description }}
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
