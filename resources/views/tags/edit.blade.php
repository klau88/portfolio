@extends('layout')

@section('content')
    <div class="row mt-3">
        <h3 class="col-sm-10 col-xs-12 text-sm-left text-center">{{ trans('form.edit') }} {{ trans('app.tags') }}</h3>
        <div class="col-sm-2 col-xs-12 text-sm-right text-center">
            <a class="btn btn-success" href="{{ route('tags.index') }}">{{ trans('form.overview') }}</a>
            <a class="btn btn-primary" href="{{ route('tags.show', ['id' => $tag->id]) }}">{{ trans('form.show') }}</a>
        </div>
    </div>

    <hr>

    <div class="row">
        <div class="col-sm-6 col-12">
            <form method="post" action="{{ route('tags.update', compact('tag')) }}" id="tag-form">
                @csrf
                @method('PATCH')

                @include('inputs.text', ['field' => 'title', 'value' => $tag->name, 'placeholder' => trans('form.title')])
            </form>
        </div>
    </div>

    <div class="form-group row">
        <div class="col-sm-10">
            <button class="btn btn-primary" type="submit" form="tag-form">{{ trans('form.update') }}</button>
        </div>
    </div>
    <form method="post" action="{{ route('tags.destroy', compact('tag')) }}">
        @csrf
        @method('DELETE')

        <button class="btn btn-danger">{{ trans('form.delete') }}</button>
    </form>
@endsection
