@extends('layouts.app')

@section('content')
<div class="container">
    <h1>New Clients</h1>
    <form id="addForm" action='/client' method="POST">
        <!-- Add form token -->
        {{ csrf_field() }}
        <div class="form-group">
            <label class="col-form-label" for="companyName">Company Name</label>
            <input type="text" name="comName" class="form-control" placeholder="Company Name" id="comName">
        </div>
        <div class="form-group">
                <label class="col-form-label" for="businessNumber">Business Number</label>
                <input type="text" name="busiNum" class="form-control" placeholder="Business Number" id="busiNum">
        </div>
        <div class="form-group">
                <label class="col-form-label" for="cellNum">Cell Number</label>
                <input type="text" name="cellNum" class="form-control" placeholder="Cell Number" id="cellNum">
        </div>
        <div class="form-group">
                <label class="col-form-label" for="firstName">First Name</label>
                <input type="text" name="fName" class="form-control" placeholder="First Name" id="fName">
            </div>
        <div class="form-group">
            <label class="col-form-label" for="lastName">Last Name</label>
            <input type="text" name="lName" class="form-control" placeholder="Last Name" id="lName">
        </div>
        <div class="form-group">
                <label class="col-form-label" for="status">Status</label>
                <select name="status" class="custom-select">
                  <option value="Active">Active</option>
                  <option value="Archive">Archive</option>
                </select>
              </div>
        <div class="form-group">
                <label class="col-form-label" for="comWebsite">Company Website</label>
                <input type="text" name="comWeb" class="form-control" placeholder="Company Website" id="comWeb">
        </div>
    </form>
    <button type="submit" form="addForm" class="btn btn-primary">Add</button>
            <a href="/client"><button type="button" class="btn btn-secondary">Cancel</button></a>
</div>
@endsection
