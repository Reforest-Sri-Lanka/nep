@extends('home')

@section('cont')

<kbd><a href="/organization/index" class="text-white font-weight-bolder"><i class="fas fa-chevron-left"></i></i> BACK</a></kbd>
<div class="container">
    <h2 style="text-align:center;" class="text-dark">Edit {{$organization->title}}</h2>
    <hr>
    <div class="row justify-content-md-center border p-4 bg-white">
        <div class="col-6 ml-3">
            <form method="post" action="/organization/update/{{$organization->id}}">

            <h6 style="text-align:left;" class="text-dark">Organization Details</h6>
                @csrf
                @method('patch')
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Title</span>
                    </div>
                    <!-- Fill in the input fields with the current values of the organization -->
                    <input type="text" class="form-control" name="title" value="{{$organization->title}}">
                </div>
                @error('title')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror

                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text">City</span>
                    </div>
                    <input type="text" class="form-control" name="city" value="{{$organization->city}}">
                </div>
                @error('city')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror

            


              
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Description</span>
                    </div>
                    <input type="text" class="form-control" name="country" value="{{$organization->description}}">
                </div>
                @error('description')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror

                <h6 style="text-align:left;" class="text-dark">Contact Details</h6>
                <div style="float:right;">
                    <button type="submit" class="btn btn-warning">Submit</button>
                </div>
            </form>
        </div>
    </div>
   
</div>

@endsection