@extends('adminlte::page')

@section('title', __("messages.client_edit"))

@section('content_header')
    <h1 class="m-0 text-dark">{{__("messages.client_edit") }}</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <form method="POST" action="{{ url("/admin/clients/{$client->id}") }}">
                    @method('PUT')
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
                            <label for="fullname">{{ __("messages.title") }}</label>
                            <input type="text" class="form-control @error('fullname') is-invalid @enderror" id="fullname" name="fullname" maxlength="255" value="{{ $client->fullname }}">
                        </div>
                        <div class="form-group">
                            <label for="city_name">{{ __("messages.city_name") }}</label>
                            <input type="text" class="form-control @error('city') is-invalid @enderror" id="city_name" name="city" maxlength="255" value="{{ $client->city }}">
                        </div>
                        <div class="form-group">
                            <label for="name">{{ __("messages.phone") }}</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">+38</span>
                                </div>
                                <input type="text" name="phone" class="form-control @error('phone') is-invalid @enderror" value="{{ $client->phone }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">{{ __("messages.email") }}</label>
                            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="exampleInputEmail1" value="{{ $client->email }}">
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-info">{{ __("messages.save") }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@stop
