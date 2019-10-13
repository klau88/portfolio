@extends('layout')

@section('content')
    <form method="post" action="{{ route('projects.store') }}">
        <h1>{{ trans('form.create') }} {{ trans('app.project') }}</h1>
        <hr>

        @csrf

        @include('inputs.text', ['field' => 'title', 'placeholder' => trans('form.title')])

        @include('inputs.textarea', ['field' => 'description', 'placeholder' => trans('form.description')])

        @include('inputs.date', [ 'field' => 'start', 'value' => old('start'), 'placeholder' => trans('form.start')])

        @include('inputs.date', [ 'field' => 'end', 'value' => old('end'), 'placeholder' => trans('form.end')])

        @include('inputs.submit', ['text' => trans('form.create')])
    </form>
@endsection
