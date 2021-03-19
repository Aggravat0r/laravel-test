@extends('adminlte::page')

@section('title', __("messages.client_create"))

@section('content_header')
    <h1 class="m-0 text-dark">{{__("messages.client_create") }}</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <form method="POST" action="{{ url("/admin/clients") }}">
                    @csrf
                    <div class="card-body">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul class="mb-0">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <div class="form-group">
                            <label for="fullname">{{ __("messages.fullname") }}</label>
                            <input type="text" class="form-control @error('fullname') is-invalid @enderror" id="fullname" name="fullname" maxlength="255" value="{{ old('fullname') }}">
                        </div>
                        <div class="form-group">
                            <label for="city_name">{{ __("messages.city") }}</label>
                            <input type="text" class="form-control @error('city') is-invalid @enderror" id="city_name" name="city" maxlength="255" value="{{ old('city') }}">
                        </div>
                        <div class="form-group">
                            <label for="phone">{{ __("messages.phone") }}</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">+38</span>
                                </div>
                                <input type="text" name="phone" class="form-control @error('phone') is-invalid @enderror" id="phone" value="{{ old('phone') }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="email">{{ __("messages.email") }}</label>
                            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email" value="{{ old('email') }}">
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-info">{{ __("messages.create") }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@stop
