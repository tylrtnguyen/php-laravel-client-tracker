@extends('layouts.app')

@section('content')
<div class="container">
<h1>View Notification ID:{{$notification->id}}</h1>
    <form id="viewForm">
        <!-- Add form token -->
        {{ csrf_field() }}
        <div class="form-group">
            <label class="col-form-label" for="notiName">Name</label>
            <textarea name="notiName" class="form-control" id="exampleTextarea" rows="3" readonly>{{$notification->name}}</textarea>
            {{-- <input type="text" value={{$notification->name}} name="notiName" class="form-control" id="notiName"> --}}
        </div>
        <div class="form-group">
                <label class="col-form-label" for="notiType">Type</label>
                {{ Form::select ('notiType', ['Email' => 'Email', 'SMS' => 'SMS'], $notification->type , ['id' =>'typeSlect', 'class'=>'custom-select','disabled'=>true]) }}
        </div>
        <div class="form-group">
                <label class="col-form-label" for="notiStatus">Status</label>
                {{ Form::select ('notiStatus', ['Enabled' => 'Enabled', 'Disabled' => 'Disabled'], $notification->status , ['id' =>'statusSelect', 'class'=>'custom-select','disabled'=>true]) }}
        </div>
        <input type="hidden" name="_method" value="PUT">
    </form>
<a href="/notification/{{$notification->id}}/edit"><button type="submit" form="editForm" class="btn btn-primary">Edit</button></a>
            <a href="/notification"><button type="button" class="btn btn-secondary">Cancel</button></a>
</div>
@endsection
