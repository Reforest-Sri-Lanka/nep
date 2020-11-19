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
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{$crime->id}}</td>
                    <td>{{$crime->crime_type}}</td>
                    <td>{{$crime->description}}</td>
                    <td>{{$crime->polygon}}</td>
                    <td>{{$crime->created_at}}</td>
                    <td>{{$crime->action_taken}}</td>
                    <td>{{$crime->status}}</td>
                    <!-- <td><a href='/edit/{{ $crime->id }}' class="btn btn-outline-warning" role="button" >Edit</a></td>
                    <td><a href="#" class="btn btn-outline-danger" role="button">Disable</a></td> -->
                </tr>
            </tbody>
        </table>
    </div>
</div>
</br>
</br>
<div class="row justify-content-between">
    <div class="col-md-3">
        <form action="\searchauth" method="get">
            @csrf
            <h6>Select Organization</h6>
            <div class="input-group mb-3">
                <select name="organization1" class="custom-select">
                    <option value="0">Select</option>
                    <option value=1>Reforest Sri Lanka</option>
                    <option value=2>Ministry of Environment</option>
                    <option value=3>Central Environmental Authority</option>
                    <option value=4>Ministry of Wilflife</option>
                    <option value=5>Road Development Agency</option>
                </select>
                @error('organization1')
                <div class="alert">
                    <strong>{{ "This field is mandatory" }}</strong>
                </div>
                @enderror
            </div>
            <h6>Select role</h6>
            <div class="input-group mb-3">
                <select name="role" class="custom-select">
                    <option value="0">Select</option>
                    <option value="2">Admin</option>
                    <option value="3">Head of Organization</option>
                    <option value="4">Manager</option>
                    <option value="5">Staff</option>
                </select>
                @error('role')
                <div class="alert">
                    <strong>{{ "This field is mandatory" }}</strong>
                </div>
                @enderror
            </div>
            <div class="form-submit">
                <input type="hidden" class="form-control" name="crimeid" value="{{$crime->id}}">
                <button type="submit" class="btn btn-primary">Search authorities</button>
            </div>
        </form>
    </div>
    <div class="col-md-8">
        <h6>Authority information</h6>
        <table class="table table-dark table-striped border-secondary rounded-lg mr-4">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>name</th>
                    <th>email</th>
                </tr>
            </thead>
            <tbody>
                @foreach($Users as $user)<tr>
                    <td>{{$user->id}}</td>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
</br>
<hr>
</br>
<h6>Assign Authorities</h6>
</br>
<div class="row justify-content-between">
    <div class="col-md-12">
        <form action="\assignauth" method="post">
            @csrf
            <h6>Crime report</h6>
            <div class="input-group mb-8">
                <div class="input-group-prepend">
                    <span class="input-group-text">Id</span>
                </div>
                <input type="text" class="form-control" name="crimeid" value="{{$crime->id}}">
                @error('crimeid')
                <div class="alert">
                    <strong>{{ $message }}</strong>
                </div>
                @enderror
                <input type="hidden" class="form-control" name="create_by" value="{{ Auth::user()->id }}">
            </div>
            <br>
            <h6>Authority Details</h6>
            <br>
            <h6>Select Organization</h6>
            <div class="input-group mb-3">
                <select name="organization" class="custom-select">
                    <option value="0">Select</option>
                    <option value=1>Reforest Sri Lanka</option>
                    <option value=2>Ministry of Environment</option>
                    <option value=3>Central Environmental Authority</option>
                    <option value=4>Ministry of Wilflife</option>
                    <option value=5>Road Development Agency</option>
                </select>
                @error('organization')
                <div class="alert">
                    <strong>{{ $message }}</strong>
                </div>
                @enderror
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">Authority Id</span>
                </div>
                <input type="text" class="form-control" name="authority_id">
                @error('authority_id')
                <div class="alert">
                    <strong>{{ $message }}</strong>
                </div>
                @enderror
            </div>
            <br>
            <h6>Additional details</h6>
            <br>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">Comments</span>
                </div>
                <input type="text" class="form-control" name="comment">
                @error('comment')
                <div class="alert">
                    <strong>{{ $message }}</strong>
                </div>
                @enderror
            </div>
            <div class="form-submit">
                <button type="submit" class="btn btn-primary">Assign authorities</button>
            </div>
        </form>
    </div>
</div>
@endsection

