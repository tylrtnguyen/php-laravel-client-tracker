@extends('layouts.app')

@section('content')
<div class="container">
<div class="jumbotron">
  <h1 class="display-3">Welcome to Client Management Platform</h1>
  <p class="lead">Please login to start using application</p>
  <hr>
  <h4><strong>Please use the information below for testing:</strong></h4>
  <table class="table table-hover">
    <thead>
      <tr>
        <th scope="col">E-Mail Address</th>
        <th scope="col">Password</th>
        <th scope="col">Account Type</th>
      </tr>
    </thead>
    <tbody>
      <tr class="table-secondary">
        <td>jurgen.klopp@gmail.com</td>
        <td>Jurgen1234</td>
        <td>Manager</td>
      </tr>
      <tr class="table-default">
        <td>john.smith@gmail.com</td>
        <td>John1234</td>
        <td>Consultant</td>
      </tr>
    </tbody>
  </table>
  <a href="/login"><button type="button" class="btn btn-primary btn-lg">Login</button></a>
</div>
</div>
@endsection

