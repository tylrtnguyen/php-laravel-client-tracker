@extends('layouts.app')

@section('content')
    <h1>Clients</h1>
    <a href="/client/create"><button type="button" class="btn btn-warning btn-lg">Add client</button></a>
    <hr>
    @if(!$clients->isEmpty())
    <table class="table table-hover">
        <thead>
            <tr>
                <th>ID</th>
                <th>Company Name</th>
                <th>Business Number</th>
                <th>Cell Number</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Status</th>
                <th>Website</th>
            </tr>
        </thead>
        @foreach ($clients as $client)
        <tbody>
            <tr>
                <td>{{$client->id}}</td>
                <td>{{$client->company_name}}</td>
                <td>{{$client->business_number}}</td>
                <td>{{$client->cell_number}}</td>
                <td>{{$client->firstname}}</td>
                <td>{{$client->last_name}}</td>
                <td>{{$client->status}}</td>
                <td>{{$client->website}}</td>
                <td>
                    <a href="/client/{{$client->id}}"><button type="button" class="btn btn-info btn-sm">View</button></a>
                </td>
                <td>
                    <a href="/client/{{$client->id}}/edit"><button type="button" class="btn btn-success btn-sm">Edit</button></a>
                </td>
                <td>
                    <form action="/client/{{$client->id}}" method="POST">
                        {{ csrf_field() }}
                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        <input type="hidden" name="_method" value="DELETE">
                    </form>
                </td>
            </tr>
        </tbody>
        @endforeach
        @else
            <p>No clients found</p>
        @endif
    </table>
    {{$clients->links()}}
@endsection
