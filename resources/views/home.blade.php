@extends('layouts.app')

@section('content')
<div class="jumbotron">
<h1 class="display-3">Hello, {{Auth::user()->firstname}} {{Auth::user()->lastname}}!</h1>
        <p class="lead">ClientTracker is pleasure to have you as an user</p>
        <hr class="my-4">
        @if(Auth::user()->position == 'Manager')
            <a  href="/log"><button type="button" class="btn btn-primary btn-lg">View System Logs</button></a>
            <a  href="/database"><button type="button" class="btn btn-danger btn-lg">Backup Database</button></a>
        @endif
</div>
@endsection
