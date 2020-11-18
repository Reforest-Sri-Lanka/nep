@extends('home')

@section('cont')
<h3 class="p-3 display-4" style="display:inline">General Module</h3>
<span>
    <h3 class="text-center bg-success text-light">{{session('message')}}</h3>
</span>
<hr>
<div class="row justify-content-center">
    <div class="col-md-3">
        <div class="card bg-dark text-light">
            <div class="card-header text-center">
                <a class="nav-link text-light font-italic p-2" href="#">Tree cutting</a>

            </div>
            <div class="card-body text-center text-light">
                <p class="card-text p-2">Quick links</p>
                <a class="nav-link text-light font-italic p-2" href="#">Application form</a>
                <a class="nav-link text-light font-italic p-2" href="#">Check status</a>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card bg-dark text-light">
            <div class="card-header text-center">
                <a class="nav-link text-light font-italic p-2" href="/dev-project/openAssign">Development project </a>
            </div>
            <div class="card-body text-center text-light">
                <p class="card-text p-2">Quick links</p>
                <a class="nav-link text-light font-italic p-2" href="/dev-project/applicationForm">Application form</a>
                <a class="nav-link text-light font-italic p-2" href="#">Check status</a>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card bg-dark text-light">
            <div class="card-header text-center">
                <a class="nav-link text-light font-italic p-2" href="#">Reforest Project</a>
            </div>
            <div class="card-body text-center text-light">
                <p class="card-text p-2">Quick links</p>
                <a class="nav-link text-light font-italic p-2" href="/env-restoration/envRestorationCreate">Register new project</a>
                <a class="nav-link text-light font-italic p-2" href="/env-restoration/index">Check for reforest details</a>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card bg-dark text-light">
            <div class="card-header text-center">
                <a class="nav-link text-light font-italic p-2" href="#">Complaints</a>
            </div>
            <div class="card-body text-center text-light">
                <p class="card-text p-2">Quick links</p>
                <a class="nav-link text-light font-italic p-2" href="/dashboard/complaint">Make a complaint</a>
                <a class="nav-link text-light font-italic p-2" href="#">Check status</a>
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
                <th>User</th>
                <th>Check</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Tree Removal</td>
                <td>2020/12/12</td>
                <td>Saman Perera</td>
                <td><a href="#" class="text-muted">Go to request</a></td>
            </tr>
            <tr>
                <td>Development Project</td>
                <td>2020/11/14</td>
                <td>Asel Perera</td>
                <td><a href="#" class="text-muted">Go to request</a></td>
            </tr>
            <tr>
                <td>Tree Removal</td>
                <td>2020/10/5</td>
                <td>Sharuka Perera</td>
                <td><a href="#" class="text-muted">Go to request</a></td>
            </tr>
            <tr>
                <td>Environment Restoration</td>
                <td>2020/10/4</td>
                <td>Sharuka Perera</td>
                <td><a href="#" class="text-muted">Go to request</a></td>
            </tr>
        </tbody>
    </table>
</div>
@endsection