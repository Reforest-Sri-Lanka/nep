@extends('home')

@section('cont')

<kbd><a href="/user/index" class="text-white font-weight-bolder"><i class="fas fa-chevron-left"></i></i> BACK</a></kbd>
<div class="container">
    <h2 style="text-align:center;" class="text-dark">Change Password of {{Auth::user()->name}}</h2>
    <hr>
    <div class="row justify-content-md-center border p-4 bg-white">
        <div class="col-6 ml-3">
            <form method="post" action="admin/alterPassword">
                @csrf

                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Current Password</span>
                    </div>
                    <input type="password" class="form-control" name="currentpassword">
                </div>
                @error('currentpassword')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror

                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text">New Password</span>
                    </div>
                    <input type="password" class="form-control" name="newpassword">
                </div>
                @error('newpassword')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror

                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Confirm Password</span>
                    </div>
                    <input type="password" class="form-control" name="confirmpassword">
                </div>
                @error('confirmpassword')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror

                <div style="float:right;">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection