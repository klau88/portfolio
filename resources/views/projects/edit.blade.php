@extends('layout')

@section('content')
    <form method="post" action="{{ route('projects.update', compact('project')) }}" id="project-form">
        <div class="row mt-3">
            <h3 class="col-sm-10 col-xs-12 text-sm-left text-center">{{ trans('form.edit') }} {{ trans('app.project') }}</h3>
            <div class="col-sm-2 col-xs-12 text-sm-right text-center">
                <a class="btn btn-success" href="{{ route('projects.index') }}">{{ trans('form.overview') }}</a>
                <a class="btn btn-primary" href="{{ route('projects.show', ['id' => $project->id]) }}">{{ trans('form.show') }}</a>
            </div>
        </div>

        <hr>

        @csrf
        @method('PATCH')

        @include('inputs.text', ['field' => 'title', 'value' => $project->title, 'placeholder' => trans('form.title')])

        @include('inputs.textarea', ['field' => 'description', 'value' => $project->description, 'placeholder' => trans('form.description')])

        @include('inputs.date', ['field' => 'start', 'value'=> $project->start, 'placeholder' => trans('form.start')])

        @include('inputs.date', ['field' => 'end', 'value'=> $project->end, 'placeholder' => trans('form.end')])
    </form>

    @include('images.upload', ['imageableType' => 'App\Project', 'imageableId' => $project->id])

    @foreach($project->images as $image)
        <div class="d-flex justify-content-around">
            <img width="500" src="{{ asset('images/'.$image->name) }}">
        </div>
    @endforeach

    <div class="form-group row">
        <div class="col-sm-10">
            <button class="btn btn-primary" type="submit" form="project-form">{{ trans('form.update') }}</button>
        </div>
    </div>
    <form method="post" action="{{ route('projects.destroy', compact('project')) }}">
        @csrf
        @method('DELETE')

        <button class="btn btn-danger">{{ trans('form.delete') }}</button>
    </form>
@endsection
