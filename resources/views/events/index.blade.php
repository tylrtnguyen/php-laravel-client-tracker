@extends('layouts.app')

@section('content')
    <h1>Events</h1>
    <a href="/event/create"><button type="button" class="btn btn-warning btn-lg">Add event</button></a>
    <hr>
    @if(!$events->isEmpty())
    <table class="table table-hover">
        <thead>
            <tr>
                <th>ID</th>
                <th>Client</th>
                <th>Notification</th>
                <th>Start Date</th>
                <th>Frequency</th>
                <th>Status</th>
            </tr>
        </thead>
        @foreach ($events as $event)
        <tbody>
            <tr>
                <td>{{$event->id}}</td>
                <td>{{$event->client_id}}</td>
                <td>{{$event->notification_id}}</td>
                <td>{{$event->start_date}}</td>
                <td>{{$event->frequency}}</td>
                <td>{{$event->status}}</td>
                <td>
                    <a href="/event/{{$event->id}}"><button type="button" class="btn btn-info btn-sm">View</button></a>
                </td>
                <td>
                    <a href="/event/{{$event->id}}/edit"><button type="button" class="btn btn-success btn-sm">Edit</button></a>
                </td>
                <td>
                    <form action="/event/{{$event->id}}" method="POST">
                        {{ csrf_field() }}
                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        <input type="hidden" name="_method" value="DELETE">
                    </form>
                </td>
            </tr>
        </tbody>
        @endforeach
        @else
            <p>No events found</p>
        @endif
    </table>
    {{$events->links()}}
@endsection
