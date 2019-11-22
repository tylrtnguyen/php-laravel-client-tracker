@extends('layouts.app')

@section('content')
    <h1>Log View</h1>
    <hr>
    @if(!$logs->isEmpty())
    <table class="table table-hover">
        <thead>
            <tr>
                <th>ID</th>
                <th>User</th>
                <th>Module Name</th>
                <th>Action</th>
                <th>Date</th>
                <th>IP Address</th>
            </tr>
        </thead>
        @foreach ($logs as $log)
        <tbody>
            <tr>
                <td>{{$log->id}}</td>
                <td>{{$log->user_info}}</td>
                <td>{{$log->module_name}}</td>
                <td>{{$log->action}}</td>
                <td>{{$log->date_time}}</td>
                <td>{{$log->IP}}</td>
            </tr>
        </tbody>
        @endforeach
        @else
            <p>No logs found</p>
        @endif
    </table>
    {{$logs->links()}}
@endsection
