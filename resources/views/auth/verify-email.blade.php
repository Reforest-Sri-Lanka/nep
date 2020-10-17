@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif

                <p class="login-card-description">You must verify your email address, please check your email for a verification</p>
                    <form method="POST" action="{{ route('verification.send') }}">
                        @csrf
                        <input name="resend-verification" id="resend-verification" class="btn btn-block login-btn mb-4" type="submit" value="Resend Email">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
