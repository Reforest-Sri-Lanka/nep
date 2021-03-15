@extends('home')

@section('cont')

<div class="row justify-content-between">
    <div class="col-md-12">
        <h6>Crime information</h6>
        <table class="table table-dark table-striped border-secondary rounded-lg mr-4">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>crime type</th>
                    <th>description</th>
                    <th>Location</th>
                    <th>Date complained logged</th>
                    <th>Action taken</th>
                    <th>Status</th>
                    <th>photo</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{$crime->id}}</td>
                    <td>{{$crime->crime_type->type}}</td>
                    <td>{{$crime->description}}</td>
                    <td>{{$crime->polygon}}</td>
                    <td>{{$crime->created_at}}</td>
                    <td>{{$crime->action_taken}}</td>
                    <td>a</td>
                    <th>a</th>
                    <!-- <td><a href='/edit/{{ $crime->id }}' class="btn btn-outline-warning" role="button" >Edit</a></td>
                    <td><a href="#" class="btn btn-outline-danger" role="button">Disable</a></td> -->
                </tr>
            </tbody>
        </table>
        </br>
        <div class="card-deck">
            @foreach($Photos as $photo)
            <div class="card" style="background-color:#99A3A4">
                <img class="card-img-top" src="{{asset('/storage/'.$photo)}}" alt="photo">
                <div class="card-body text-center">
                <a class="nav-link text-dark font-italic p-2" href="/crime-report/downloadimage/{{$photo}}">Download Image</a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    
</div>
</br>
<div class="row justify-content-between">
    <div class="col-md-3">
        <h6>Check relevant details</h6>
        <form action="#" method="get">
            @csrf
            <h6>Select permission type</h6>
            <div class="input-group mb-3">
                <select name="type" class="custom-select">
                    <option value="0">Select</option>
                    <option value="1">Tree cutting</option>
                    <option value="2">Development project</option>
                    <option value="3">Reforest project</option>
                    <option value="4">Crime reports</option>
                </select>
                @error('type')
                <div class="alert">
                    <strong>{{ "This field is mandatory" }}</strong>
                </div>
                @enderror
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">Location</span>
                </div>
                <input type="text" class="form-control" name="location">
                @error('location')
                <div class="alert">
                    <strong>{{ $message }}</strong>
                </div>
                @enderror
            </div>
            <div class="form-submit">
                <input type="hidden" class="form-control" name="crimeid" value="{{$crime->id}}">
                <button type="submit" class="btn btn-primary">Search details</button>
            </div>
        </form>
    </div>
    <div class="col-md-8">
        <h6>Previous permissions</h6>
        <table class="table table-dark table-striped border-secondary rounded-lg mr-4">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>name</th>
                    <th>status</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Id</td>
                    <td>name</td>
                    <td>status</td>
                </tr>
                
            </tbody>
        </table>
    </div>
</div>
@endsection

