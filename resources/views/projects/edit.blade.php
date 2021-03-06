@extends('layout')

@section('content')
    <div class="row mt-3">
        <h3 class="col-sm-10 col-xs-12 text-sm-left text-center">{{ trans('form.edit') }} {{ trans('app.project') }}</h3>
        <div class="col-sm-2 col-xs-12 text-sm-right text-center">
            <a class="btn btn-success" href="{{ route('projects.index') }}">{{ trans('form.overview') }}</a>
            <a class="btn btn-primary" href="{{ route('projects.show', ['id' => $project->id]) }}">{{ trans('form.show') }}</a>
        </div>
    </div>

    <hr>

    <div class="row">
        <div class="col-sm-6 col-12">
            <form method="post" action="{{ route('projects.update', compact('project')) }}" id="project-form">
                @csrf
                @method('PATCH')

                @include('inputs.text', ['field' => 'title', 'value' => $project->title, 'placeholder' => trans('form.title')])

                @include('inputs.textarea', ['field' => 'description', 'value' => $project->description, 'placeholder' => trans('form.description')])

                @include('inputs.date', ['field' => 'start', 'value'=> $project->start, 'placeholder' => trans('form.start')])

                @include('inputs.date', ['field' => 'end', 'value'=> $project->end, 'placeholder' => trans('form.end')])
            </form>
        </div>

        <div class="col-sm-6 col-12">
            @include('images.upload', ['imageableType' => 'App\Project', 'imageableId' => $project->id])

            @foreach($project->images as $image)
                <div class="d-flex justify-content-around">
                    <img width="100%" src="{{ asset('images/'.$image->name) }}">
                </div>
            @endforeach
        </div>
    </div>

    <div class="form-group row">
        <div class="col-sm-10">
            <button class="btn btn-primary" type="submit" form="project-form">{{ trans('form.update') }}</button>
        </div>
    </div>

    <form method="post" action="{{ route('projects.destroy', $project) }}">
        @csrf
        @method('DELETE')

        <button class="btn btn-danger">{{ trans('form.delete') }}</button>
    </form>
@endsection
