@extends('home')

@section('cont')
<h3 class="p-3 display-4" style="display:inline">Reporting Module</h3>
<nav class="navbar navbar-expand-lg navbar-light justify-content-around">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link h4" href="/general/pending">Overview<span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link h4" href="">Tree Removal</a>
            </li>
            <li class="nav-item">
                <a class="nav-link h4" href="/dev-project/applicationForm">Development Project</a>
            </li>
            <li class="nav-item">
                <a class="nav-link h4" href="/env-restoration/create">Restoration</a>
            </li>
            <li class="nav-item">
                <a class="nav-link h4" href="/crime-report/crimehome">Complaints</a>
            </li>
            <li class="nav-item">
                <a class="nav-link h4" href="">Other</a>
            </li>
        </ul>
    </div>
</nav>
<div class="col-md">
    @yield('reporting')
</div>

@endsection