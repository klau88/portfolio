@extends('layout')

@section('content')
    <form method="post" action="{{ route('projects.update', ['id' => $project->id]) }}">
        <h1>Edit Project</h1>
        <hr>

        @csrf
        @method('PATCH')

        <div class="form-group">
            <label class="col-form-label" for="title">{{ trans('form.title') }}</label>
            <input type="text" class="form-control {{ $errors->has('title') ? 'border-danger' : '' }}" name="title" value="{{ $project->title }}" required>
        </div>

        @error('title')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        <div class="form-group">
            <label class="col-form-label" for="description">{{ trans('form.description') }}</label>
            <textarea class="form-control {{ $errors->has('description') ? 'border-danger' : '' }}" name="description" required>{{ $project->description }}</textarea>
        </div>

        @error('description')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        <button class="btn btn-primary" type="submit">{{ trans('form.update') }}</button>
    </form>
@endsection
