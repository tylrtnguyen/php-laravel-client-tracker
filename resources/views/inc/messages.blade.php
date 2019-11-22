@if(count($errors)>0)
    <div class="alert alert-dismissible alert-danger">
        <strong>All fields are required</strong>
    </div>
@endif

@if(session('success'))
        <div class="alert alert-success">
            {{session('success')}}
        </div>
@endif

@if(session('error'))
        <div class="alert alert-danger">
            {{session('error')}}
        </div>
@endif
