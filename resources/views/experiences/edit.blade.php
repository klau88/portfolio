@extends('layout')

@section('content')

    <div class="row mt-3">
        <h3 class="col-sm-10 col-xs-12 text-sm-left text-center">{{ trans('form.edit') }} {{ trans('app.experiences') }}</h3>
        <div class="col-sm-2 col-xs-12 text-sm-right text-center">
            <a class="btn btn-success" href="{{ route('experiences.index') }}">{{ trans('form.overview') }}</a>
            <a class="btn btn-primary" href="{{ route('experiences.show', $experience) }}">{{ trans('form.show') }}</a>
        </div>
    </div>

    <hr>

    <div class="row">
        <div class="col-sm-6 col-12">
            <form method="post" action="{{ route('experiences.update', compact('experience')) }}" id="experience-form">
                @csrf
                @method('PATCH')

                @include('inputs.text', ['field' => 'title', 'value' => $experience->title, 'placeholder' => trans('form.title')])

                @include('inputs.textarea', ['field' => 'description', 'value' => $experience->description, 'placeholder' => trans('form.description')])

                @include('inputs.date', ['field' => 'start', 'value'=> $experience->start, 'placeholder' => trans('form.start')])

                @include('inputs.date', ['field' => 'end', 'value'=> $experience->end, 'placeholder' => trans('form.end')])
            </form>
        </div>

        <div class="col-sm-6 col-12">
            @include('images.upload', ['imageableType' => 'App\Project', 'imageableId' => $experience->id])

            @foreach($experience->images as $image)
                <div class="d-flex justify-content-around">
                    <img width="100%" src="{{ asset('images/'.$image->name) }}">
                </div>
            @endforeach
        </div>
    </div>

    <div class="form-group row">
        <div class="col-sm-10">
            <button class="btn btn-primary" type="submit" form="experience-form">{{ trans('form.update') }}</button>
        </div>
    </div>
    <form method="post" action="{{ route('experiences.destroy', compact('experience')) }}">
        @csrf
        @method('DELETE')

        <button class="btn btn-danger">{{ trans('form.delete') }}</button>
    </form>
@endsection
