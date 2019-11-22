@extends('layouts.app')

@section('content')
    <h1>Users</h1>
    <a href="/user/create"><button type="button" class="btn btn-warning btn-lg">Add user</button></a>
    <hr>
    @if(count($users)>=1)
    <table class="table table-hover">
        <thead>
            <tr>
                <th>ID</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>Cell Number</th>
                <th>Position</th>
                <th>Status</th>
                <th>Address</th>
            </tr>
        </thead>
        @foreach ($users as $user)
        <tbody>
            <tr>
                <td>{{$user->id}}</td>
                <td>{{$user->firstname}}</td>
                <td>{{$user->lastname}}</td>
                <td>{{$user->email}}</td>
                <td>{{$user->cell_number}}</td>
                <td>{{$user->position}}</td>
                <td>{{$user->status}}</td>
                <td>{{$user->address}}</td>
                <td>
                    <a href="/user/{{$user->id}}">
                        <button type="button" class="btn btn-info  btn-sm">View</button>
                    </a>
                </td>
                <td>
                    <a href="/user/{{$user->id}}/edit">
                        <button type="button" class="btn btn-success btn-sm">Edit</button>
                    </a>
                </td>
                <td>
                    <form action="/user/{{$user->id}}" method="POST">
                        {{ csrf_field() }}
                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        <input type="hidden" name="_method" value="DELETE">
                    </form>
                </td>
            </tr>
        </tbody>
        @endforeach
        @else
            <p>No users found</p>
        @endif
    </table>
    {{$users->links()}}
@endsection
