@extends('home')

@section('cont')

<span>
<h3 class="p-3 display-4">New applications</h3>
<span>
<span>
    <h3 class="text-center bg-success text-light">{{session('message')}}</h3>
</span>
<span>
    <h3 class="text-center bg-danger text-light">{{session('danger')}}</h3>
</span>
<hr>
<div class="row justify-content-center border-secondary rounded-lg ml-3">
    </br>
    <div class="col-md-3 ">
        <a href="/crimeadmin" class="btn btn-info mr-4" role="button">Assign Authorities</a>
    </div>
</div>
</br>
</hr>

<span>
<h3 class="p-3 display-4">Crime Types</h3>
</span>
<span>
    <h3 class="text-center bg-success text-light">{{session('messagetypes')}}</h3>
</span>
<span>
    <h3 class="text-center bg-danger text-light">{{session('danger')}}</h3>
</span>
<hr>
<div class="row justify-content-center border-secondary rounded-lg ml-3">
    </br>
    <div class="col-md-3 ">
        <a href="/crime-report/crimeTypeCreate" class="btn btn-info mr-4" role="button" style="margin-bottom: 25px">Create New Crime Type</a>
        </br>
    </div>
    <table class="table table-hover table-light mr-4">
        <thead>
            <tr>
                <th>ID</th>
                <th>Crime type</th>
                <th> </th>
                <th> </th>
            </tr>
        </thead>
        <tbody>
            @foreach($crime_types as $crime_type)
            <tr>
                <td>{{$crime_type->id}}</td>
                <td>{{$crime_type->type}}</td>

                <!-- opent the edit view -->
                <td><a href="/crime-report/crimeTypeEdit/{{$crime_type->id}}" class="btn btn-outline-warning" role="button">Edit</a></td>

                <td>
                    <button class="btn btn-outline-danger" onclick="event.preventDefault();
                            document.getElementById('form-delete-{{$crime_type->id}}').submit()">Delete</button>

                    <form id="{{'form-delete-'.$crime_type->id}}" style="display:none" method="post" 
                        action="/crime-report/crimeTypeDelete/{{$crime_type->id}}">
                        @csrf
                        @method('delete');
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
</br>


</hr>

<h5 class="p-3 display-4">Contacts</h5>
<div class="row justify-content-center">
    <div class="col-md-3">

        <div class="card bg-dark text-light">
            <div class="card-header text-center">
                <a class="nav-link text-light font-italic p-2" href="#">Department of Wildlife Conservation</a>

            </div>
            <div class="card-body text-center text-light">
                <p class="card-text p-2">Hotline 0xxxx</p>
                <p class="card-text p-2">email 0xxxx@gmail.com</p>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card bg-dark text-light">
            <div class="card-header text-center">
                <a class="nav-link text-light font-italic p-2" href="#">Department of Forest Conservation</a>
            </div>
            <div class="card-body text-center text-light">
                <p class="card-text p-2">Hotline 0xxxx</p>
                <p class="card-text p-2">email 0xxxx@gmail.com</p>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card bg-dark text-light">
            <div class="card-header text-center">
                <a class="nav-link text-light font-italic p-2" href="#">Central Environment Authority</a>
            </div>
            <div class="card-body text-center text-light">
                <p class="card-text p-2">Hotline 0xxxx</p>
                <p class="card-text p-2">email 0xxxx@gmail.com</p>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card bg-dark text-light">
            <div class="card-header text-center">
                <a class="nav-link text-light font-italic p-2" href="#">List of regional offices</a>
            </div>
            <div class="card-body text-center text-light">
                <a class="nav-link text-light font-italic p-2" href="#">Forest officers</a>
                <a class="nav-link text-light font-italic p-2" href="#">Wildlife</a>
            </div>
        </div>
    </div>


</div>
<hr>
@endsection