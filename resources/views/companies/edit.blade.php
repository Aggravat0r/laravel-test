@extends('adminlte::page')

@section('title', __("messages.company_edit"))

@section('content_header')
    <h1 class="m-0 text-dark">{{__("messages.company_edit")." ".$company->name }}</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <form method="POST" action="{{ url("/admin/companies/{$company->id}") }}">
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
                            <label for="name">{{ __("messages.title") }}</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" maxlength="255" value="{{ $company->name }}">
                        </div>
                        <div class="form-group">
                            <label for="city_name">{{ __("messages.city_name") }}</label>
                            <input type="text" class="form-control @error('city_name') is-invalid @enderror" id="city_name" name="city_name" maxlength="255" value="{{ $company->city_name }}">
                        </div>
                        <div class="form-group">
                            <label for="name">{{ __("messages.phone") }}</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">+38</span>
                                </div>
                                <input type="text" name="phone" class="form-control @error('phone') is-invalid @enderror" value="{{ $company->phone }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">{{ __("messages.email") }}</label>
                            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="exampleInputEmail1" value="{{ $company->email }}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">{{ __("messages.website") }}</label>
                            <input type="text" name="website" class="form-control @error('website') is-invalid @enderror" id="exampleInputEmail1" value="{{ $company->website }}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">{{ __("messages.category") }}</label>
                            <select name="category" class="form-control @error('category') is-invalid @enderror">
                                @foreach($categories as $category)
                                    <option @if($category == $company->category) selected @endif>{{ $category }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group mb-0">
                            <label for="exampleInputEmail1">{{ __("messages.subcategory") }}</label>
                            <select name="subcategory" class="form-control @error('subcategory') is-invalid @enderror">
                                @foreach($subcategories as $subcategory)
                                    <option @if($subcategory == $company->subcategory) selected @endif>{{ $subcategory }}</option>
                                @endforeach
                            </select>
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
