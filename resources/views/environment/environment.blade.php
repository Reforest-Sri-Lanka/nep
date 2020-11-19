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
<div class="row border-secondary rounded-lg ml-3">
    <h5 class="p-3">Pending Requests</h5>
    <table class="table table-dark table-striped mr-4">
        <thead>
            <tr>
                <th>Category</th>
                <th>Date Submitted</th>
                <th>Organization</th>
                <th>Check</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Eco system Data gathering</td>
                <td>2020/12/12</td>
                <td>Saman Perera</td>
                <td><a href="#" class="text-muted">Go to request</a></td>
            </tr>
            <tr>
                <td>Species data gathering</td>
                <td>2020/11/14</td>
                <td>Asel Perera</td>
                <td><a href="#" class="text-muted">Go to request</a></td>
            </tr>
            <tr>
                <td>Species data gathering</td>
                <td>2020/10/5</td>
                <td>Sharuka Perera</td>
                <td><a href="#" class="text-muted">Go to request</a></td>
            </tr>
          
        </tbody>
    </table>
</div>
@endsection