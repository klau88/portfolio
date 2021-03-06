@extends('layout')

@section('content')
    <div class="row mt-3">
        <h3 class="col-sm-10 col-xs-12 text-sm-left text-center">{{ trans('app.tags') }}</h3>
        <div class="col-sm-2 col-xs-12 text-sm-right text-center">
            <a class="btn btn-primary" href="{{ route('tags.create') }}">{{ trans('form.create') }}</a>
        </div>
    </div>

    <hr>

    <div class="row">
        @foreach($tags as $tag)
            <div class="col-12">
                <header class="row d-flex justify-content-between">
                    <h3 class="col-sm-9 col-xs-12">{{ $tag->name }}</h3>
                    <div class="col-sm-3 col-xs-12 text-sm-right text-center">
                        <a class="btn btn-info" href="{{ route('tags.show', $tag) }}"><i class="fas fa-info-circle"></i></a>
                        <a class="btn btn-primary" href="{{ route('tags.edit', $tag) }}"><i class="fas fa-edit"></i></a>
                        <a class="btn btn-danger" href="{{ route('tags.destroy', compact('tag')) }}"><i class="fas fa-trash"></i></a>
                    </div>
                </header>

                <div class="row">
                    <div class="col-12">
                        {{ $tag->description }}
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
