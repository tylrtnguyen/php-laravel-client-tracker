@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>About this project</h2>
        <p class="lead">This project is created using the LAMP stack with L in this case not Linux but Laravel. The client tracker project has 4 models:</p>
        <ul class="list-group">
            <li class="list-group-item d-flex justify-content-between align-items-center">
                Client
                <span class="badge badge-success">DONE</span>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-center">
                Notification
                <span class="badge badge-success">DONE</span>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-center">
                Event
                <span class="badge badge-success">DONE</span>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-center">
                User
                <span class="badge badge-success">DONE</span>
            </li>
        </ul>
        <p class="lead">Some additional functions:</p>
        <ul class="list-group">
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    Upload image for user: inside the user profile when user successfully logged in
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    Backup database for user only
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    User management: for user who is manager only
                </li>
        </ul>
    </div>

@endsection
