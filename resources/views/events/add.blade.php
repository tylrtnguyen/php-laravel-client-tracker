@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Add new event</h1>
    <form id="addForm" action='/event' method="POST">
        <!-- Add form token -->
        {{ csrf_field() }}
        <div class="form-group">
                <label class="col-form-label" for="client">Client</label>
                <select name="client" class="custom-select @error('client') is-invalid @enderror" required>
                    <option value="" selected="">Select Client</option>
                    @foreach ($clients as $client)
                        <option value="{{$client->id}}">{{$client->firstname}} {{$client->last_name}} from {{$client->company_name}}</option>
                    @endforeach
                </select>
        </div>
        <div class="form-group">
                <label class="col-form-label" for="notification">Notification</label>
                <select name="notification" class="custom-select @error('notification') is-invalid @enderror" required>
                    <option value="" selected="">Select Notification</option>
                    @foreach ($notifications as $notification)
                        <option value="{{$notification->id}}">{{$notification->name}} ({{$notification->type}})</option>
                    @endforeach
                </select>
        </div>
        <div class="form-group">
                <label class="col-form-label" for="startDate">Start Date</label>
                <input type="text" name="startDate" class="form-control" placeholder="YYYY-MM-DD" id="startDate">
        </div>
        <div class="form-group">
                <label class="col-form-label" for="frequency">Frequency</label>
                <select name="frequency" class="custom-select @error('frequency') is-invalid @enderror" required>
                        <option value="" selected="">Select Frequency</option>
                        <option value="Monthly">Monthly</option>
                        <option value="Quarterly">Quarterly</option>
                        <option value="Semi-annually">Semi-annually</option>
                        <option value="Anually">Anually</option>
                </select>
        </div>
        <div class="form-group">
                <label class="col-form-label" for="status">Status</label>
                {{ Form::select ('status', ['Active' => 'Active', 'Archive' => 'Archive'], $client->status , ['id' =>'eventStatus', 'class'=>'custom-select']) }}
        </div>
    </form>
    <button type="submit" form="addForm" class="btn btn-primary">Add</button>
            <a href="/event"><button type="button" class="btn btn-secondary">Cancel</button></a>
</div>
@endsection
