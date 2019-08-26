@extends('layout')

@section('content')
    <form method="post" action="{{ route('projects.update', compact('project')) }}">
        <h1>Edit Project</h1>
        <hr>

        @csrf
        @method('PATCH')

        <div class="form-group row">
            <label class="col-sm-2 col-form-label" for="title">{{ trans('form.title') }}</label>
            <div class="col-sm-10">
                <input type="text" class="form-control {{ $errors->has('title') ? 'border-danger' : '' }}" name="title" value="{{ $project->title }}" required>
            </div>
        </div>

        @error('title')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        <div class="form-group row">
            <label class="col-sm-2 col-form-label" for="description">{{ trans('form.description') }}</label>
            <div class="col-sm-10">
                <textarea class="form-control {{ $errors->has('description') ? 'border-danger' : '' }}" name="description" required>{{ $project->description }}</textarea>
            </div>
        </div>

        @error('description')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        <div class="form-group row">
            <div class="col-sm-10">
                <button class="btn btn-primary" type="submit">{{ trans('form.update') }}</button>
            </div>
        </div>
    </form>
    <form method="post" action="{{ route('projects.destroy', compact('project')) }}">
        @csrf
        @method('DELETE')

        <button class="btn btn-danger">{{ trans('form.delete') }}</button>
    </form>
@endsection
