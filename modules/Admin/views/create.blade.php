@extends('home')

@section('cont')

<kbd><a href="/user/index" class="text-white font-weight-bolder"><i class="fas fa-chevron-left"></i></i> BACK</a></kbd>
<div class="container">
    <h2 style="text-align:center;" class="text-dark">Create User</h2>
    <hr>
    <div class="row justify-content-md-center border p-4 bg-white">
        <div class="col-6 ml-3">
            <form method="post" action="/user/store" class="needs-validation" novalidate>
                @csrf
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Name</span>
                    </div>
                    <input type="text" class="form-control" name="name" value="{{ old('name') }}" placeholder="Enter Name" required>
                </div>
                <!-- @error('name')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror -->

                <div class="input-group mb-3">
                    <input type="text" class="form-control" name="email" value="{{ old('email') }}" placeholder="Enter Email" required>
                    <div class="input-group-append">
                        <span class="input-group-text">@example.com</span>
                    </div>
                </div>
                <!-- @error('email')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror -->

                @if(Auth::user()->role_id == 1 || Auth::user()->role_id == 2)
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Organization</span>
                    </div>
                      
                    <select name="organization" class="custom-select" required>
                        <option selected value="">Select</option>
                        @foreach($organizations as $org)
                        <option value="{{$org->id}}">{{$org->title}} -> {{$org->branch_type->title}}</option>
                        @endforeach
                    </select>
                </div>
                <!-- @error('organization')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror -->
                @endif

                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Designation</span>
                    </div>
                    <select name="designation" class="custom-select" required>
                        <option selected value="">Select</option>
                        @foreach($designations as $designation)
                        <option value="{{$designation->id}}">{{$designation->designation}}</option>
                        @endforeach
                    </select>
                </div>
                <!-- @error('designation')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror -->

                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Role</span>
                    </div>
                    <select name="role" class="custom-select" required>
                        <option selected value="">Select</option>
                        @if(Auth::user()->role_id == 1 ||Auth::user()->role_id == 2)
                        <option value=2>Admin</option>
                        <option value=3>Head Of Organization</option>
                        <option value=4>Manager</option>
                        @elseif(Auth::user()->role_id == 3)
                        <option value=4>Manager</option>
                        @endif
                        <option value=5>Staff</option>
                        <option value=6>Citizen</option>
                    </select>
                </div>
                <!-- @error('role')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror -->

                <!-- If the user is not super admin then pass in the user's organization id as well -->
                @if (Auth::user()->role_id == 3 ||Auth::user()->role_id == 4)
                <input type="hidden" class="form-control" name="organization" value="{{Auth::user()->organization_id}}">
                @endif

                <input type="hidden" class="form-control" name="created_by" value="{{Auth::user()->id}}">

                <div style="float:right;">

                    <!-- Status value of 1 will be sent to activate the user as soon as s/he is created by admin/HoO or Manager -->
                    <button type="submit" name="status" value="1" class="btn btn-primary">Create</button>
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