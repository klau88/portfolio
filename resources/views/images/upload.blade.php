<form method="post" action="{{ route('image.save', ['imageable_type' => $imageableType, 'imageable_id' => $imageableId]) }}" enctype="multipart/form-data">
    @csrf
    <div class="form-group row">
        <label class="col-sm-2" for="image">{{ trans('form.image') }}</label>
        <div class="col-sm-10 d-flex justify-content-between">
            <input type="file" class="form-control-file" name="image" placeholder="{{ trans('form.image') }}">
            <button class="btn btn-primary" type="submit">{{ trans('form.upload') }}</button>
        </div>
    </div>

    @error('image')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
</form>
