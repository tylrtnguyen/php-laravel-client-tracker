@extends('layouts.app')

@section('content')
<div class="container">
<h1>View Event ID:{{$event->id}}</h1>
<form id="viewForm">
        <!-- Add form token -->
        {{ csrf_field() }}
        <div class="form-group">
                <label class="col-form-label" for="client">Client</label>
                <select name="client" class="custom-select @error('client') is-invalid @enderror" required disabled='true'>
                <option selected="{{$event->client_id}}" value="{{$event->client_id}}">{{$selected_client->firstname}} {{$selected_client->last_name}} from
                    {{$selected_client->company_name}}</option>
                    @foreach ($clients as $client)
                        <option value="{{$client->id}}">{{$client->firstname}} {{$client->last_name}} from {{$client->company_name}}</option>
                    @endforeach
                </select>
        </div>
        <div class="form-group">
                <label class="col-form-label" for="notification">Notification</label>
                <select name="notification" class="custom-select @error('notification') is-invalid @enderror" required disabled='true'>
                        <option selected="{{$event->notification_id}}" value="{{$event->notification_id}}">{{$selected_noti->name}} ({{$selected_noti->type}})</option>
                    @foreach ($notifications as $notification)
                        <option value="{{$notification->id}}">{{$notification->name}} ({{$notification->type}}) </option>
                    @endforeach
                </select>
        </div>
        <div class="form-group">
                <label class="col-form-label" for="startDate">Start Date</label>
                <input value={{$event->start_date}} type="text" name="startDate" class="form-control" placeholder="YYYY-MM-DD" id="startDate" readonly>
        </div>
        <div class="form-group">
                <label class="col-form-label" for="frequency">Frequency</label>
                <select name="frequency" class="custom-select @error('frequency') is-invalid @enderror" required disabled='true' >
                        <option selected="{{$event->frequency}}" value="{{$event->frequency}}">{{$event->frequency}}</option>
                        <option value="Monthly">Monthly</option>
                        <option value="Quarterly">Quarterly</option>
                        <option value="Semi-annually">Semi-annually</option>
                        <option value="Anually">Anually</option>
                </select>
        </div>
        <div class="form-group">
                <label class="col-form-label" for="status">Status</label>
                {{ Form::select ('status', ['Active' => 'Active', 'Archive' => 'Archive'], $event->status , ['id' =>'eventStatus', 'class'=>'custom-select','disabled'=>true]) }}
        </div>
        <input type="hidden" name="_method" value="PUT">
    </form>
<a href="/event/{{$event->id}}/edit"><button type="button" class="btn btn-primary">Edit</button></a>
            <a href="/event"><button type="button" class="btn btn-secondary">Cancel</button></a>
</div>
@endsection
