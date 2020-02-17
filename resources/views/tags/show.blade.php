@extends('layout')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="row mt-3">
                <h3 class="col-sm-10 col-xs-12 text-sm-left text-center">{{ $tag->name }}</h3>
                <div class="col-sm-2 col-xs-12 text-sm-right text-center">
                    <a class="btn btn-success" href="{{ route('tags.index') }}">{{ trans('form.back') }}</a>
                    <a class="btn btn-primary" href="{{ route('tags.edit', $tag) }}">{{ trans('form.edit') }}</a>
                </div>
            </div>
        </div>
    </div>
@endsection
