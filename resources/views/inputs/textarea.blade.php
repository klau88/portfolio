<div class="form-group row">
    <label class="col-sm-2 col-form-label" for="{{ $field }}">{{ trans('form.'.$field) }}</label>
    <div class="col-sm-10">
        <textarea class="form-control {{ $errors->has($field) ? 'border-danger' : '' }}" name="{{ $field }}" placeholder="{{ $placeholder }}" required>{{ $value ?? old($field) }}</textarea>
    </div>
</div>

@error($field)
<div class="alert alert-danger">{{ $message }}</div>
@enderror
