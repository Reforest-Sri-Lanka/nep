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
                        <span class="input-group-text">Organization Name</span>
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
                        <span class="input-group-text">Organization Type</span>
                    </div>
                    <select name="org_type" class="custom-select">
                    @switch($organization->type_id)
                    @case('1')
                    <option value="1" selected >Government</option>
                    <option value="2" >Non-profit organization </option>
                    <option value="3" >Semi-government</option>
                    <option value="4" >Private</option>
                    <option value="5" >Public</option>
                    @break;
                    @case('2')
                    <option value="1"  >Government</option>
                    <option value="2" selected >Non-profit organization </option>
                    <option value="3" >Semi-government</option>
                    <option value="4" >Private</option>
                    <option value="5" >Public</option>
                    @break;
                    @case('3')
                    <option value="1"  >Government</option>
                    <option value="2"  >Non-profit organization </option>
                    <option value="3" selected>Semi-government</option>
                    <option value="4" >Private</option>
                    <option value="5" >Public</option>
                    @break;
                    @case('4')
                    <option value="1"  >Government</option>
                    <option value="2"  >Non-profit organization </option>
                    <option value="3" >Semi-government</option>
                    <option value="4"selected >Private</option>
                    <option value="5" >Public</option>
                    @break;
                    @case('5')
                    <option value="1"  >Government</option>
                    <option value="2"  >Non-profit organization </option>
                    <option value="3" >Semi-government</option>
                    <option value="4" >Private</option>
                    <option value="5" selected>Public</option>
                    @break;

                    @endswitch                        
                     </select>
                </div>
                @error('org_type')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror

                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Description</span>
                    </div>
                    <input type="text" class="form-control" name="description" value="{{$organization->description}}">
                </div>
                @error('description')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror


                {{-- <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Country</span>
                    </div>
                    <input type="text" class="form-control" name="country" value="{{$organization->country}}">
                </div>
                @error('country')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror --}}

                
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Organization Status</span>
                    </div>
                    <select name="status" class="custom-select">
                    @switch($organization->status)
                    @case('0')
                    <option value="0" selected >Inactive</option>
                    <option value="1" >Active</option>
                    @break;
                    @case('1')
                    <option value="1" selected>Active</option>
                    <option value="0">Inactive</option>
                    @break;
                    @endswitch                        
                     </select>
                </div>
                @error('status')
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
                        <th scope="col">Primary</th>
                    </thead>
                    <tbody>
                        @foreach ($contact as $key => $value)
                        <tr>
                            <td><input type="text" class="form-control" name="type" value="{{$value->type}}"></td>
                            <td><input type="text" class="form-control" name="contact_signature" value="{{$value->contact_signature}}"></td>
                            <td><input type="text" class="form-control" name="primary" value="{{$value->primary}}"></td>

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