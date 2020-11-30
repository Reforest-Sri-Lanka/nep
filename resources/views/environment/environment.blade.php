@extends('home')

@section('cont')
<h3 class="p-3 display-4">Environment  Module</h3>
<hr>
<div class="row justify-content-center">
    <div class="col-md-5">
        <div class="card bg-dark text-light">
            <div class="card-header text-center">
                <a class="nav-link text-light font-italic p-2" href="/neweco">Eco System Management</a>

            </div>
            <div class="card-body text-center text-light">
              
                <a class="nav-link text-light font-italic p-2" href="#">Info</a>
               
                <a class="nav-link text-light font-italic p-2" href="/createrequest">Application form</a>
                <a class="nav-link text-light font-italic p-2" href="/updatedata">Check status</a>
                <p class="card-text p-2">Quick links</p>
            </div>
        </div>
    </div>
    <div class="col-md-5">
        <div class="card bg-dark text-light">
            <div class="card-header text-center">
                <a class="nav-link text-light font-italic p-2" href="/newrequest">Species Management </a>
            </div>
            <div class="card-body text-center text-light">
               
            <a class="nav-link text-light font-italic p-2" href="#">Info</a>
                <a class="nav-link text-light font-italic p-2" href="/requestspecies">Application form</a>
                <a class="nav-link text-light font-italic p-2" href="/updatedataspecies">Check status</a>
                <p class="card-text p-2">Quick links</p>
            </div>
        </div>
    </div>

    

</div>
<hr>

@endsection