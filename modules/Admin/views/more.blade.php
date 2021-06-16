@extends('home')

@section('cont')

<kbd><a href="/user/index" class="text-white font-weight-bolder"><i class="fas fa-chevron-left"></i></i> BACK</a></kbd>

<div class="container">
    <h2 style="text-align:center;" class="text-dark">Details of {{$user->name}}</h2>
    @if($user->status == 1)
    <div class="row justify-content-md-center border p-4 bg-white">
        <a href="/security/user/{{$user->id}}" class="btn btn-outline-warning" role="button">Audit</a>
    </div>
    @endif
    <div class="row justify-content-md-center border p-4 bg-white">
        <div class="col-6 ml-3">
            <form>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Name</span>
                    </div>
                    <input type="text" class="form-control" placeholder="{{$user->name}}" readonly>
                </div>

                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Email</span>
                    </div>
                    <input type="text" class="form-control" placeholder="{{$user->email}}" readonly>
                </div>

                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Role</span>
                    </div>
                    @if($user->role == NULL)
                    <input type="text" class="form-control" placeholder="Unassigned" readonly>
                    @else
                    <input type="text" class="form-control" placeholder="{{$user->role->title}}" readonly>
                    @endif
                </div>

                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Organization</span>
                    </div>
                    @if($user->organization == NULL)
                    <input type="text" class="form-control" placeholder="Unassigned" readonly>
                    @else
                    <input type="text" class="form-control" placeholder="{{$user->organization->title}}" readonly>
                    @endif
                </div>

                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Designation</span>
                    </div>
                    @if($user->designation == NULL)
                    <input type="text" class="form-control" placeholder="Unassigned" readonly>
                    @else
                    <input type="text" class="form-control" placeholder="{{$user->designation->designation}}" readonly>
                    @endif
                </div>

                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Status</span>
                    </div>
                    @switch($user->status)
                    @case('0')
                    <input type="text" class="form-control" placeholder="Not Activated" readonly>
                    @break;
                    @case('1')
                    <input type="text" class="form-control" placeholder="Activated" readonly>
                    @break;
                    @endswitch
                </div>

                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Email Status</span>
                    </div>
                    @if($user->email_verified_at)
                    <input type="text" class="form-control" placeholder="Verified" readonly>
                    @else
                    <input type="text" class="form-control" placeholder="Unverified" readonly>
                    @endif
                </div>


            </form>
        </div>
    </div>
</div>

@endsection