@extends('layout')

@section('content')
    <div class="row">
        <div class="col-md-4 offset-md-4 col-xs-12">
            <form method="post" action="{{ route('login.post') }}">
                @csrf
                <div class="form-group">
                    <label for="name" class="form-">{{ trans('auth.admin.login.name') }}</label>
                    <input type="email" class="form-control" name="email" placeholder="{{ trans('auth.admin.login.name') }}">
                </div>
                <div class="form-group">
                    <label for="password">{{ trans('auth.admin.login.password') }}</label>
                    <input type="password" class="form-control" name="password" placeholder="{{ trans('auth.admin.login.password') }}">
                </div>
                <button class="btn btn-primary" type="submit">{{ trans('auth.admin.login.submit') }}</button>
            </form>
        </div>
    </div>
@endsection
