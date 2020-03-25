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
        <div class="col-12">
            <form method="post" action="{{ route('experiences.update', compact('experience')) }}" id="experience-form">
                @csrf
                @method('PATCH')

                @include('inputs.date', ['field' => 'start', 'value' => $experience->start, 'placeholder' => trans('form.start')])

                @include('inputs.date', ['field' => 'end', 'value' => $experience->end, 'placeholder' => trans('form.end')])

                @include('inputs.select', ['field' => 'type_id', 'value' => $experience->type_id, 'placeholder' => trans('form.type'), 'collection' => $types])

                @include('inputs.text', ['field' => 'position', 'value' => $experience->position, 'placeholder' => trans('form.position')])

                @include('inputs.text', ['field' => 'company', 'value' => $experience->company, 'placeholder' => trans('form.company')])

                @include('inputs.textarea', ['field' => 'description', 'value' => $experience->description, 'placeholder' => trans('form.description')])
            </form>
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
