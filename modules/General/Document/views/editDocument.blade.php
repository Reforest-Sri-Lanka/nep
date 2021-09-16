@extends('home')

@section('cont')

<kbd><a href="{{ url()->previous() }}" class="text-white font-weight-bolder"><i class="fas fa-chevron-left"></i></i> BACK</a></kbd>
<div class="container">
    @if($user->status == 0)
    <div class="container p-3 my-3 bg-primary text-white">
        <h2>This user is not activated. Please activate the user prior to editing details.</h2>
    </div>

    @else

    <h2 style="text-align:center;" class="text-dark">Edit {{$user->name}}</h2>
    <hr>
    <div class="row justify-content-md-center border p-4 bg-white">
        <div class="col-6 ml-3">
            <form method="post" action="/administrator/update/{{$user->id}}">
                @csrf
                @method('patch')
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Name</span>
                    </div>
                    <input type="text" class="form-control" name="name" value="{{$user->name}}">
                </div>

                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Email</span>
                    </div>
                    <input type="text" class="form-control" name="email" value="{{$user->email}}">
                </div>


                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Organization</span>
                        <select name="organization" class="custom-select">
                            @if($user->organization == NULL)
                            <option selected value="NULL">Select Organization</option>
                            @else
                            <option selected value="{{$user->organization_id}}">{{$user->organization->title}}</option>
                            @endif
                            <option value=1>Reforest Sri Lanka</option>
                            <option value=2>Ministry of Environment</option>
                            <option value=3>Central Environmental Authority</option>
                            <option value=4>Ministry of Wilflife</option>
                            <option value=5>Road Development Agency</option>
                        </select>
                    </div>

                </div>

                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Designation</span>
                        <select name="designation" class="custom-select">
                            @if($user->designation == NULL)
                            <option selected value="NULL">Select Designaion</option>
                            @else
                            <option selected value="{{$user->designation_id}}">{{$user->designation->title}}</option>
                            @endif
                            <option value=1>Additional Director</option>
                            <option value=2>Manager</option>
                            <option value=3>Director</option>
                            <option value=4>Staff Assistant</option>
                            <option value=5>Assistant Director</option>
                            <option value=6>Deputy Manager</option>
                            <option value=7>Assistant Manager</option>
                        </select>
                    </div>
                </div>


                <div style="float:right;">
                    <button type="submit" class="btn btn-warning">Submit</button>
                </div>
            </form>
        </div>
    </div>
    @endif
</div>

@endsection