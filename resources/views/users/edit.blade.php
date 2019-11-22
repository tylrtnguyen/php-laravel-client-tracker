@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Edit User') }}</div>

                <div class="card-body">
                <form method="POST" action="/user/{{$user->id}}" enctype="multipart/form-data">
                        @csrf
                        <!-- First name section -->
                        <div class="form-group row">
                            <label for="firstName" class="col-md-4 col-form-label text-md-right">First Name</label>
                            <div class="col-md-6">
                                <input id="fName" type="text" class="form-control @error('fName') is-invalid @enderror" name="fName" value="{{ $user->firstname }}" required autocomplete="fName" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <!-- Last name section -->
                        <div class="form-group row">
                            <label for="lastName" class="col-md-4 col-form-label text-md-right">Last Name</label>

                            <div class="col-md-6">
                                <input id="lName" type="text" class="form-control @error('lName') is-invalid @enderror" name="lName" value="{{ $user->lastname }}" required autocomplete="lName" autofocus>

                                @error('lName')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <!-- Email section -->
                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{$user->email }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <!-- Phone number section -->
                        <div class="form-group row">
                            <label for="cell_number" class="col-md-4 col-form-label text-md-right">Phone Number</label>

                            <div class="col-md-6">
                                <input id="cell_number" type="text" class="form-control @error('cell_number') is-invalid @enderror" name="cell_number" value="{{ $user->cell_number }}" required autocomplete="cell_number">

                                @error('cell_number')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <!-- Position dropdown list -->
                        <div class="form-group row">
                            <label for="position" class="col-md-4 col-form-label text-md-right">Position</label>

                            <div class="col-md-6">
                                {{-- <select name="position" class="custom-select @error('position') is-invalid @enderror" required>
                                    <option selected="">Select Role</option>
                                    <option value="Senior Consultant">Senior Consultant</option>
                                    <option value="Junior Consultant">Junior Consultant</option>
                                    <option value="Chartered Account">Chartered Account</option>
                                    <option value="Book Keeper">Book Keeper</option>
                                </select> --}}
                                <!-- Using laravel collected to make a dynamic select field -->
                                {{ Form::select ('position', ['Senior Consultant' => 'Senior Consultant', 'Junior Consultant' => 'Junior Consultant','Chartered Account' => 'Chartered Account','Book Keeper' => 'Book Keeper'], $user->position , ['id' =>'positionSelect', 'class'=>'custom-select']) }}
                                @error('position')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <!-- Status section -->
                        <div class="form-group row">
                                <label for="status" class="col-md-4 col-form-label text-md-right">Status</label>
                                <div class="col-md-6">
                                    {{ Form::select ('status', ['Active' => 'Active', 'Suspended' => 'Suspended'], $user->status , ['id' =>'statusSelect', 'class'=>'custom-select']) }}
                                    @error('status')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                        </div>

                        <!-- Address section -->
                        <div class="form-group row">
                            <label for="address" class="col-md-4 col-form-label text-md-right">Address</label>
                            <div class="col-md-6">
                                <input id="address" type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{$user->address }}" required autocomplete="address">

                                @error('address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <!-- Username section -->
                        <div class="form-group row">
                            <label for="address" class="col-md-4 col-form-label text-md-right">Username</label>

                            <div class="col-md-6">
                                <input id="user_name" type="text" class="form-control @error('user_name') is-invalid @enderror" name="user_name" value="{{ $user->user_name }}" required autocomplete="user_name">

                                @error('user_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <!-- Password section -->
                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <!-- Confirm Password -->
                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">Confirm Password</label>
                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>
                        <!-- Image section -->
                        <div class="form-group row">
                                <div class="input-group mb-3">
                                    <input type="file" name="image" class="form-control custom-file-input" id="image">
                                    <label class="custom-file-label" for="image">Upload profile picture</label>
                                </div>
                        </div>
                       <!-- Button section -->
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Edit') }}
                                </button>
                                <a href="/user"><button type="button" class="btn btn-secondary">Cancel</button></a>
                            </div>
                        </div>
                        <input type="hidden" name="_method" value="PUT">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
