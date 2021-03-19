@extends('adminlte::page')

@section('title', __("messages.companies_list"))

@section('content_header')
    <h1 class="m-0 text-dark">{{__("messages.companies_list")}}</h1>
    <a class="btn btn-info" href="{{ url("/admin/companies/create") }}">Добавить компанию <i class="fas fa-plus"></i></a>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover text-nowrap">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>{{__("messages.title")}}</th>
                            <th>{{__("messages.city_name")}}</th>
                            <th>{{__("messages.phone")}}</th>
                            <th>{{__("messages.email")}}</th>
                            <th>{{__("messages.website")}}</th>
                            <th>{{__("messages.category")}}</th>
                            <th>{{__("messages.subcategory")}}</th>
                            <td colspan="2"></td>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach ($companies as $company)
                                <tr>
                                    <td>{{ $company->id }}</td>
                                    <td>{{ $company->name }}</td>
                                    <td>{{ $company->city_name }}</td>
                                    <td>+38{{ $company->phone }}</td>
                                    <td>{{ $company->email }}</td>
                                    <td>{{ $company->website }}</td>
                                    <td>{{ $company->category }}</td>
                                    <td style="max-width: 200px; text-overflow: ellipsis; overflow: hidden;">{{ $company->subcategory }}</td>
                                    <td><a href="{{ url("/admin/companies/{$company->id}/edit") }}"><i class="fas fa-fw fa-edit"></i></a></td>
                                    <td>
                                        <form action="{{ url("/admin/companies/{$company->id}") }}" method="POST">
                                            @method('DELETE')
                                            @csrf
                                            <a href="" onclick="if(confirm('Вы уверены?')) {this.closest('form').submit(); return false; }else{event.preventDefault();}"><i class="fas fa-trash"></i></a>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="card-footer clearfix">
                    {{ $companies->links() }}
                </div>
            </div>
        </div>
    </div>
@stop
