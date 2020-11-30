@extends('home')

@section('cont')

<kbd><a href="/organization/index" class="text-white font-weight-bolder"><i class="fas fa-chevron-left"></i></i> BACK</a></kbd>
<div class="container">
    <h2 style="text-align:center;" class="text-dark">Edit&nbsp;{{$organization->title}}</h2>
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
                        <span class="input-group-text">Country</span>
                    </div>
                    <input type="text" class="form-control" name="country" value="{{$organization->country}}">
                </div>
                @error('country')
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
                <br>
                <br>
                <h6 style="text-align:left;" class="text-dark">Contact Details</h6>
                <br>
                <br>
                <table class="table table-light table-striped border-secondary rounded-lg mr-4">
                    <thead>
                        <tr>
                        <th scope="col">Type</th>
                        <th scope="col">Signature</th>
                    </thead>
                    <tbody>
                        @foreach ($contact as $key => $value)
                        <tr>
                            <td><input type="text" class="form-control" name="city" value="{{$value->type}}"></td>
                            <td><input type="text" class="form-control" name="city" value="{{$value->contact_signature}}"></td>
                        </tr>
                        @endforeach

                    </tbody>
                </table>

                <div style="float:right;">
                    <button type="submit" class="btn btn-warning">Submit</button>
                </div>
            </form>
        </div>
    </div>
   
</div>

@endsection