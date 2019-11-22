@extends('layouts.app')

@section('content')
    <h1>Notifications</h1>
    <a href="/notification/create"><button type="button" class="btn btn-warning btn-lg">Add Notification</button></a>
    <hr>
    @if(!$notifications->isEmpty())
    <table class="table table-hover">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Type</th>
                <th>Status</th>
            </tr>
        </thead>
        @foreach ($notifications as $notification)
        <tbody>
            <tr>
                <td>{{$notification->id}}</td>
                <td>{{$notification->name}}</td>
                <td>{{$notification->type}}</td>
                <td>{{$notification->status}}</td>
                <td>
                    <a href="/notification/{{$notification->id}}"><button type="button" class="btn btn-info btn-sm">View</button></a>
                </td>
                <td>
                    <a href="/notification/{{$notification->id}}/edit"><button type="button" class="btn btn-success btn-sm">Edit</button></a>
                </td>
                <td>
                    <form action="/notification/{{$notification->id}}" method="POST">
                        {{ csrf_field() }}
                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        <input type="hidden" name="_method" value="DELETE">
                    </form>
                </td>
            </tr>
        </tbody>
        @endforeach
        @else
            <p>No notifications found</p>
        @endif
    </table>
    {{$notifications->links()}}
@endsection
