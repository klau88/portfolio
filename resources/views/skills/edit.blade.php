@extends('layout')

@section('content')
    <form method="post" action="{{ route('skills.update', compact('skill')) }}" id="skill-form">
        <div class="row mt-3">
            <h3 class="col-sm-10 col-xs-12 text-sm-left text-center">{{ trans('form.edit') }} {{ trans('app.skill') }}</h3>
            <div class="col-sm-2 col-xs-12 text-sm-right text-center">
                <a class="btn btn-success" href="{{ route('skills.index') }}">{{ trans('form.overview') }}</a>
                <a class="btn btn-primary" href="{{ route('skills.show', ['id' => $skill->id]) }}">{{ trans('form.show') }}</a>
            </div>
        </div>

        <hr>

        @csrf
        @method('PATCH')

        @include('inputs.text', ['field' => 'title', 'value' => $skill->title, 'placeholder' => trans('form.title')])

        @include('inputs.textarea', ['field' => 'description', 'value' => $skill->description, 'placeholder' => trans('form.description')])
    </form>

    <div class="form-group row">
        <div class="col-sm-10">
            <button class="btn btn-primary" type="submit" form="skill-form">{{ trans('form.update') }}</button>
        </div>
    </div>
    <form method="post" action="{{ route('skills.destroy', compact('skill')) }}">
        @csrf
        @method('DELETE')

        <button class="btn btn-danger">{{ trans('form.delete') }}</button>
    </form>
@endsection
