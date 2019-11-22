@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Client</h1>
    <form id="addForm" action='/client/{{$client->id}}' method="POST">
        <!-- Add form token -->
        {{ csrf_field() }}
        <div class="form-group">
            <label class="col-form-label" for="companyName">Company Name</label>
            <input type="text" value={{$client->company_name}} name="comName" class="form-control" placeholder="Company Name" id="comName">
        </div>
        <div class="form-group">
                <label class="col-form-label" for="businessNumber">Business Number</label>
                <input type="text" value={{$client->business_number}} name="busiNum" class="form-control" placeholder="Business Number" id="busiNum">
        </div>
        <div class="form-group">
                <label class="col-form-label" for="cellNum">Cell Number</label>
                <input type="text" value={{$client->cell_number}} name="cellNum" class="form-control" placeholder="Cell Number" id="cellNum">
        </div>
        <div class="form-group">
                <label class="col-form-label" for="firstName">First Name</label>
                <input type="text" value={{$client->firstname}} name="fName" class="form-control" placeholder="First Name" id="fName">
            </div>
        <div class="form-group">
            <label class="col-form-label" for="lastName">Last Name</label>
            <input type="text" value={{$client->last_name}} name="lName" class="form-control" placeholder="Last Name" id="lName">
        </div>
        <div class="form-group">
                <label class="col-form-label" for="status">Status</label>
                <!-- Using laravel collected to make a dynamic select field -->
                {{ Form::select ('status', ['Active' => 'Active', 'Archive' => 'Archive'], $client->status , ['id' =>'myselect', 'class'=>'custom-select']) }}
        </div>

        <div class="form-group">
                <label class="col-form-label"for="comWebsite">Company Website</label>
                <input type="text" value={{$client->website}} name="comWeb" class="form-control" placeholder="Company Website" id="comWeb">
        </div>
        <input type="hidden" name="_method" value="PUT">
    </form>
    <button type="submit" form="addForm" class="btn btn-primary">Edit</button>
            <a href="/client"><button type="button" class="btn btn-secondary">Cancel</button></a>
</div>
@endsection
