@extends('home')

@section('cont')

<kbd><a href="/user/index" class="text-white font-weight-bolder"><i class="fas fa-chevron-left"></i></i> BACK</a></kbd>
<div class="container">
    <!-- If user status is 0 -> Not activated then prevent access to the edit view -->
    @if($user->status == 0)
    <div class="container p-3 my-3 bg-primary text-white">
        <h2>This user is not activated. Please activate the user prior to editing details.</h2>
    </div>
    @else
    <h2 style="text-align:center;" class="text-dark">Edit Privileges of {{$user->name}}</h2>
    <hr>
    <div class="row justify-content-md-center border p-4 bg-white">
        <div class="col-6 ml-3">
            <form method="post" action="/admin/savePrivilege/{{$user->id}}">
                @csrf
                @method('patch')

                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text">ID</span>
                    </div>
                    <input type="text" class="form-control" name="id" value="{{$user->id}}" readonly>
                </div>

                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Name</span>
                    </div>
                    <input type="text" class="form-control" name="name" value="{{$user->name}}" readonly>
                </div>



                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Role</span>
                    </div>
                    <select name="role" class="custom-select">
                        @if($user->role == NULL)
                        <option selected value="NULL">Select Role</option>
                        @else
                        <option selected value="{{$user->role_id}}">{{$user->role->title}}</option>
                        @endif
                        <option value=2>Admin</option>
                        <option value=3>Head Of Organization</option>
                        <option value=4>Manager</option>
                        <option value=5>Staff</option>
                        <option value=6>Citizen</option>
                    </select>
                </div>


                <!-- <div class="form-check border-secondary rounded-lg mb-4" style="background-color:#ebeef0">
                    <label class="mt-2"> Modules Allowed: </label>
                    <hr>
                    <fieldset>
                        <input type="checkbox" name="modules[]" value="general" checked><label class="ml-2" />General Module</label> <br>
                        <input type="checkbox" name="modules[]" value="user" checked><label class="ml-2" />User Module</label> <br>
                        <input type="checkbox" name="modules[]" value="admin"><label class="ml-2">Administrator Module</label> <br>
                        <input type="checkbox" name="modules[]" value="security"><label class="ml-2">Security Module</label> <br>
                        <input type="checkbox" name="modules[]" value="env"><label class="ml-2">Environmental Module</label> <br>
                    </fieldset>
                </div> -->
                <div style="float:right;">
                    <button type="submit" class="btn btn-warning">Submit</button>
                </div>
            </form>
        </div>
        @endif
    </div>
</div>

@endsection