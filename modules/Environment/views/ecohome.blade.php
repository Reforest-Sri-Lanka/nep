@extends('home')

@section('cont')

<kbd><a href="/environment/generalenv" class="text-white font-weight-bolder"><i class="fas fa-chevron-left"></i></i> BACK</a></kbd>
  

<h3 class="p-3 display-4">Eco System Management</h3>
<hr>
<div class="row justify-content-center border-secondary rounded-lg ml-3">

    </br>
    <div class="col-md-3 ">
        <a href="/environment/createrequest" class="btn btn-outline-info mr-4" role="button">Make new Request</a>
    </div>
    <div class="col-md-3 ">
        <form action="/environment/trackrequsteco" method="get">
            @csrf
            <input type="hidden" class="form-control" name="createby" >
            <button type="submit" class="btn btn-outline-primary">Track my requests</button>
            <!-- <a href="/trackcrime" class="btn btn-info mr-4" role="button">Track my complaints</a> -->
        </form>
    </div>
    <div class="col-md-3 ">
        <a href="#" class="btn btn-outline-secondary mr-4" role="button" data-toggle="modal" data-target="#complaintLog">How it works</a>
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
                <p class="card-text p-2">Hotline 0112 888 585</p>
                <p class="card-text p-2">Email: dg@dwc.gov.lk</p>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card bg-dark text-light">
            <div class="card-header text-center">
                <a class="nav-link text-light font-italic p-2" href="#">Department of Forest Conservation</a>
            </div>
            <div class="card-body text-center text-light">
                <p class="card-text p-2">Hotline 0112 866 631</p>
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
                <p class="card-text p-2">Hotline 0112 877 277</p>
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