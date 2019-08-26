@extends('layout')

@section('content')
    <form method="post" action="{{ route('projects.store') }}">
        <h1>Create Project</h1>
        <hr>
        
        @csrf

        <div class="form-group row">
            <label class="col-sm-2 col-form-label" for="title">{{ trans('form.title') }}</label>
            <div class="col-sm-10">
                <input type="text" class="form-control {{ $errors->has('title') ? 'border-danger' : '' }}" name="title" placeholder="Title" value="{{ old('title') }}" required>
            </div>
        </div>

        @error('title')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        <div class="form-group row">
            <label class="col-sm-2 col-form-label" for="description">{{ trans('form.description') }}</label>
            <div class="col-sm-10">
                <textarea class="form-control {{ $errors->has('description') ? 'border-danger' : '' }}" name="description" placeholder="Description" required>{{ old('description') }}</textarea>
            </div>
        </div>

        @error('description')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <div class="form-group row">
            <div class="col-sm-10">
                <button class="btn btn-primary" type="submit">{{ trans('form.create') }}</button>
            </div>
        </div>
    </form>
@endsection
