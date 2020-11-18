@extends('home')

@section('cont')
<span>
<h3 class="p-3 display-4">Complaints</h3>
</span>
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
        <a href="/newcrime" class="btn btn-info mr-4" role="button">Make new complaint</a>
    </div>
    <div class="col-md-3 ">
        <form action="\trackcrime" method="get">
            @csrf
            <input type="hidden" class="form-control" name="create_by" value="{{ Auth::user()->id }}">
            <button type="submit" class="btn btn-primary">Track my complaints</button>
        </form>
    </div>
    <div class="col-md-3 ">
        <a href="#" class="btn btn-info mr-4" role="button" data-toggle="modal" data-target="#complaintLog">How it works</a>
    </div>
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