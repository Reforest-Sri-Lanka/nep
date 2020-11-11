@extends('home')

@section('cont')

<kbd><a href="/admin/index" class="text-white font-weight-bolder"><i class="fas fa-chevron-left"></i></i> BACK</a></kbd>
<div class="container">
    <h2 style="text-align:center;" class="text-dark">Details of {{$user->name}}</h2><hr>
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
                        <input type="text" class="form-control" placeholder="{{$user->role}}" readonly>
                    @endif
                </div>

                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Organization</span>
                    </div>
                    @if($user->organization == NULL)
                        <input type="text" class="form-control" placeholder="Unassigned" readonly>
                    @else
                        <input type="text" class="form-control" placeholder="{{$user->organization}}" readonly>
                    @endif
                </div>

                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Designation</span>
                    </div>
                    @if($user->designation == NULL)
                        <input type="text" class="form-control" placeholder="Unassigned" readonly>
                    @else
                        <input type="text" class="form-control" placeholder="{{$user->designation}}" readonly>
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

                <div class="form-check border-secondary rounded-lg" style="background-color:#ebeef0">
                    <label class="mt-2"> Modules Allowed: </label>
                    <hr>
                    <fieldset disabled>
                        <input type="checkbox" name="modules[]" value="general" checked><label class="ml-2" checked />General Module</label> <br>
                        <input type="checkbox" name="modules[]" value="user" checked><label class="ml-2" checked />User Module</label> <br>
                        <input type="checkbox" name="modules[]" value="admin"><label class="ml-2">Administrator Module</label> <br>
                        <input type="checkbox" name="modules[]" value="security"><label class="ml-2">Security Module</label> <br>
                        <input type="checkbox" name="modules[]" value="env"><label class="ml-2">Environmental Module</label> <br>
                    </fieldset>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection