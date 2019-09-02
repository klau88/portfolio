@extends('layout')

@section('content')
    <form method="post" action="{{ route('skills.store') }}">
        <h1>{{ trans('form.create') }} {{ trans('app.skill') }}</h1>
        <hr>

        @csrf

        @include('inputs.text', ['field' => 'title', 'placeholder' => trans('form.title')])

        @include('inputs.textarea', ['field' => 'description', 'placeholder' => trans('form.description')])

        @include('inputs.submit', ['text' => trans('form.create')])

    </form>
@endsection
