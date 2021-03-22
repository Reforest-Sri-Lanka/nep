@extends('home')

@section('cont')


<kbd><a href="/admin/showSelfRegistered" class="text-white font-weight-bolder"><i class="fas fa-chevron-left"></i></i> BACK</a></kbd>
<div class="container">
    <h2 style="text-align:center;" class="text-dark">Activate {{$user->name}}</h2>
    <hr>
    <div class="row justify-content-md-center border p-4 bg-white">
        <div class="col-6 ml-3">
            <form method="post" action="/admin/activate/{{$user->id}}" class="needs-validation" novalidate>
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

                <!-- Set the role, organization and designation to activate the user -->

                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Role</span>
                    </div>
                    <select name="role" class="custom-select" required>
                        <option selected value="">Select Role</option>
                        @foreach($roles as $role)
                        <option value="{{$role->id}}">{{$role->title}}</option>
                        @endforeach
                    </select>
                </div>
                @error('role')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror

                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Organization</span>
                    </div>
                    <select name="organization" class="custom-select" required>
                        <option selected value="">Select Organization</option>
                        @foreach($organizations as $organization)
                        <option value="{{$organization->id}}">{{$organization->title}}</option>
                        @endforeach
                    </select>
                </div>
                @error('organization')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror

                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Designation</span>
                    </div>
                    <select name="designation" class="custom-select" required>
                        <option selected value="">Select Designation</option>
                        @foreach($designations as $designation)
                        <option value="{{$designation->id}}">{{$designation->designation}}</option>
                        @endforeach
                    </select>
                </div>
                @error('designation')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror


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
                    <button type="submit" name="status" value="1" class="btn btn-success">Activate</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    // Disable form submissions if there are invalid fields
    (function() {
        'use strict';
        window.addEventListener('load', function() {
            // Get the forms we want to add validation styles to
            var forms = document.getElementsByClassName('needs-validation');
            // Loop over them and prevent submission
            var validation = Array.prototype.filter.call(forms, function(form) {
                form.addEventListener('submit', function(event) {
                    if (form.checkValidity() === false) {
                        event.preventDefault();
                        event.stopPropagation();
                    }
                    form.classList.add('was-validated');
                }, false);
            });
        }, false);
    })();
</script>
@endsection