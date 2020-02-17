@extends('layout')

@section('content')
    <form method="post" action="{{ route('tags.store') }}">
        <h1>{{ trans('form.create') }} {{ trans('app.tag') }}</h1>
        <hr>

        @csrf

        @include('inputs.text', ['field' => 'name', 'placeholder' => trans('form.name')])

        @include('inputs.submit', ['text' => trans('form.create')])
    </form>
@endsection
