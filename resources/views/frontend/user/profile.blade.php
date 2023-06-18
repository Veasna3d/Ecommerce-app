@extends('layouts.app')

@section('title', 'My Profile')

@section('content')

<div class="container rounded bg-white shadow mt-3 mb-5">
    <div class="row">
        <div class="col-md-3 border-right">
            <div class="d-flex flex-column align-items-center text-center p-3 py-5"><img class="rounded-circle mt-5"
                    width="150px"
                    src="https://st3.depositphotos.com/15648834/17930/v/600/depositphotos_179308454-stock-illustration-unknown-person-silhouette-glasses-profile.jpg">
            </div>
        </div>
        <div class="col-md-9 border-right">
            <div class="p-3 py-5">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="text-right">Profile Settings</h4>
                </div>
                <form action="{{ url('/profile') }}" method="post">
                    @csrf

                    <div class="row mt-2">
                        <div class="col-md-12">
                            <label class="labels">Email</label>
                            <input type="email" name="email" value="{{ Auth::user()->email }}" class="form-control" placeholder="first name" value="">
                        </div>
                        <div class="col-md-12">
                            <label class="labels">Name</label>
                            <input type="text" name="name" value="{{ Auth::user()->name }}" class="form-control" placeholder="first name" value="">
                        </div>

                        <div class="col-md-6">
                            <label class="labels">Change Password</label>
                            <input type="text" name="password" class="form-control" value="" placeholder="password">
                        </div>
                        <div class="col-md-6">
                            <label class="labels">Confirm Password</label>
                            <input type="text" name="password_confirmation" class="form-control" value="" placeholder="password">
                        </div>
                    </div>
                    <div>
                        <button type="submit" class="btn btn-primary mt-4 mb-3 float-end">Update Profile</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
