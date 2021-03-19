@extends('adminlte::page')

@section('title', __("messages.companies_list"))

@section('content_header')
    <h1 class="m-0 text-dark">{{__("messages.clients_list")}}</h1>
    <a class="btn btn-info" href="{{ url("/admin/clients/create") }}">Добавить клиента <i class="fas fa-plus"></i></a>
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
                            <th>{{__("messages.fullname")}}</th>
                            <th>{{__("messages.city_name")}}</th>
                            <th>{{__("messages.phone")}}</th>
                            <th>{{__("messages.email")}}</th>
                            <td colspan="2"></td>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach ($clients as $client)
                                <tr>
                                    <td>{{ $client->id }}</td>
                                    <td>{{ $client->fullname }}</td>
                                    <td>{{ $client->city }}</td>
                                    <td>+38{{ $client->phone }}</td>
                                    <td>{{ $client->email }}</td>
                                    <td><a href="{{ url("/admin/clients/{$client->id}/edit") }}"><i class="fas fa-fw fa-edit"></i></a></td>
                                    <td>
                                        <form action="{{ url("/admin/clients/{$client->id}") }}" method="POST">
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
                    {{ $clients->links() }}
                </div>
            </div>
        </div>
    </div>
@stop
