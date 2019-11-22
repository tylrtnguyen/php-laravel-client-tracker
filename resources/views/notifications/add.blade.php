@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Add new notification</h1>
    <form id="editForm" action='/notification' method="POST">
        {{ csrf_field() }}
        <!-- Add form token -->
        <div class="form-group">
            <label class="col-form-label" for="notiName">Name</label>
            <textarea name="notiName" class="form-control @error('notiName') is-invalid @enderror" id="exampleTextarea" rows="3"></textarea>
            {{-- <input type="text" value={{$notification->name}} name="notiName" class="form-control" id="notiName"> --}}
        </div>
        <div class="form-group">
                <label class="col-form-label" for="notiType">Type</label>
                <select name="notiType" class="custom-select @error('notiType') is-invalid @enderror" required>
                        <option selected="">Select Type</option>
                        <option value="Email">Email</option>
                        <option value="SMS">SMS</option>
                </select>
        </div>
        <div class="form-group">
                <label class="col-form-label" for="notiStatus">Type</label>
                <select name="notiStatus" class="custom-select @error('notiStatus') is-invalid @enderror" required>
                        <option selected="">Select Status</option>
                        <option value="Enabled">Enabled</option>
                        <option value="Disabled">Disabled</option>
                </select>
        </div>
    </form>
    <br>
    <button type="submit" form="editForm" class="btn btn-primary">Add</button>
            <a href="/notification"><button type="button" class="btn btn-secondary">Cancel</button></a>
</div>
@endsection
