<div class="form-group row">
    <label class="col-sm-2 col-form-label" for="{{ $field }}">{{ trans('form.'.$field) }}</label>
    <div class="col-sm-10">
        <select name="{{ $field }}" class="form-control {{ $errors->has($field) ? 'border-danger' : '' }}">
            @foreach($collection as $item)
                <option value="{{ $item->id }}" {{ isset($value) && $value == $item->id ? 'selected' : '' }}>{{ $item->name }}</option>
            @endforeach
        </select>
    </div>
</div>

@error($field)
<div class="alert alert-danger">{{ $message }}</div>
@enderror
