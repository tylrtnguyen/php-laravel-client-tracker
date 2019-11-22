@extends('layouts.app')

@section('content')
<div class="container main-secction">
        <div class="row">
            <div class="row user-left-part">
                <div class="col-md-3 col-sm-3 col-xs-12 user-profil-part pull-left">
                    <div class="row ">
                        <div class="col-md-12 col-md-12-sm-12 col-xs-12 user-image text-center">
                        <img src="/storage/user_images/{{$user->profile_picture}}">
                        </div>
                        <div class="col-md-12 col-sm-12 col-xs-12 user-detail-section1 text-center">
                        <button class="btn btn-defult follow "><i class="fa fa-user-o" aria-hidden="true"></i> {{$user->firstname}} {{$user->lastname}}</button>
                        </div>
                        <div class="row user-detail-row">
                            <div class="col-md-12 col-sm-12 user-detail-section2 pull-left">
                            <div class="border"></div>
                                <p>Email:</p>
                                <p class="text-primary">{{$user->email}}</p>
                            </div>
                            <div class="col-md-12 col-sm-12 user-detail-section2 pull-right">
                                <div class="border"></div>
                                <p>Phone:</p>
                                <p class="text-primary">{{$user->cell_number}}</p>
                            </div>
                            <div class="col-md-12 col-sm-12 user-detail-section2 pull-right">
                                    <div class="border"></div>
                                    <p>Status:</p>
                                    <p class="text-primary">{{$user->status}}</p>
                            </div>
                        </div>
                        <div class="col-md-12 user-detail-section2">
                            <div class="border"></div>
                            <p>Address</p>
                        <span>{{$user->address}}</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-9 col-sm-9 col-xs-12 pull-right profile-right-section">
                    <div class="row profile-right-section-row">
                        <div class="col-md-12 profile-header">
                            <div class="row">
                                <div class="col-md-8 col-sm-6 col-xs-6 profile-header-section1 pull-left">
                                    <h1>{{$user->firstname}} {{$user->lastname}}</h1>
                                    <p>{{$user->position}}</p>
                                    <div class="card border-primary mb-3" style="max-width: 20rem;">
                                            <div class="card-header">Introduction</div>
                                            <div class="card-body">
                                              <h4 class="card-title">Hello everyone</h4>
                                            <p class="card-text">My name is {{$user->firstname}} {{$user->lastname}}. I am working at <strong>ClientTracker</strong> as a {{$user->position}}</p>
                                            </div>
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-6 col-xs-6 profile-header-section1 text-right pull-rigth">
                                    <a href="/user/{{$user->id}}/edit"><button class="btn btn-warning req-btn"> Edit profile</button></a>
                                    <a href="/user"><button class="btn btn-info req-btn"> Back</button></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-8  profile-tag-section text-center">
                                    <div class="row">

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
