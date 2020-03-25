@extends('layout')

@section('content')
    <form method="post" action="{{ route('experiences.store') }}">
        <h1>{{ trans('form.create') }} {{ trans('app.experience') }}</h1>
        <hr>

        @csrf

        @include('inputs.date', ['field' => 'start', 'value' => old('start'), 'placeholder' => trans('form.start')])

        @include('inputs.date', ['field' => 'end', 'value' => old('end'), 'placeholder' => trans('form.end')])

        @include('inputs.select', ['field' => 'type_id', 'placeholder' => trans('form.type'), 'collection' => $types])

        @include('inputs.text', ['field' => 'position', 'placeholder' => trans('form.position')])

        @include('inputs.text', ['field' => 'company', 'placeholder' => trans('form.company')])

        @include('inputs.textarea', ['field' => 'description', 'placeholder' => trans('form.description')])

        @include('inputs.submit', ['text' => trans('form.create')])
    </form>
@endsection
