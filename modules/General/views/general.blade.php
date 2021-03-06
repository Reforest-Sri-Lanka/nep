@extends('home')

@section('cont')
<h3 class="p-3 display-4" style="display:inline">General Module</h3>
<span>
    <h3 class="text-center bg-success text-light">{{session('message')}}</h3>
</span>
<nav class="navbar navbar-expand-lg navbar-light justify-content-around">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="#">Pending Request <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/tree-removal/form">Tree Removal</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/dev-project/applicationForm">Development Project</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Restoration</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/land/form">Register Land</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/crime-report/crimehome">Complaints</a>
            </li>
        </ul>
    </div>
</nav>
<div class="col-md">
    @yield('general')
</div>

@endsection