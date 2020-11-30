@extends('home')

@section('cont')

<kbd><a href="/organization/index" class="text-white font-weight-bolder"><i class="fas fa-chevron-left"></i></i> BACK</a></kbd>
<div class="container">
    <h2 style="text-align:center;" class="text-dark">Create Organization</h2>
    <hr>
    <div class="row justify-content-md-center border p-4 bg-white">
        <div class="col-6 ml-3">

<!--Organizaion Details -->        
        <h6 style="text-align:left;" class="text-dark">Organization Details</h6>
            <form method="post" action="/organization/store">
            
                @csrf
                <!-- Title. -->
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Title</span>
                    </div>
                    <input type="text" class="form-control" name="title" placeholder="Enter Title">
                </div>
                @error('title')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror

                <!-- City. -->
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text">City</span>
                    </div>
                    <input type="text" class="form-control" name="city" placeholder="Enter City">
                </div>
                @error('city')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror

                <!-- Select Organization Type. -->
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Type</span>
                        <select name="type" class="custom-select">
                            <option selected>Select Organization Type</option>
                            <option value=1>Government</option>
                            <option value=2>NGO</option>
                            <option value=3>Semi Government</option>
                            <option value=4>Public</option>
                            <option value=5>Private</option>
                        </select>
                    </div>
                </div>
                @error('type')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror

                <!-- Country field. -->
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Country</span>
                    </div>
                    <input type="text" class="form-control" name="country" placeholder="Enter Country">
                </div>
                @error('country')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror



                 <!-- Description field. -->
                 <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Description</span>
                    </div>
                    <input type="text" class="form-control" name="description" placeholder="Enter Description">
                </div>
                @error('description')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror


<!--Contact Details. -->
                <h6 style="text-align:left;" class="text-dark">Contact Details</h6>


                 <!--pass in the user's organization id as well -->
                <input type="hidden" class="form-control" name="created_by" value="{{Auth::user()->id}}">

                <div style="float:right;">
                
                <button type="submit" name="status" value="1" class="btn btn-primary">Create</button>

                </div>
            </form>
        </div>
    </div>
</div>
@endsection