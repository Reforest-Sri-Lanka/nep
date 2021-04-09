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
                <a class="nav-link h4" href="/reporting/overview">Overview<span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link h4" href="/reporting/tree-removal">Tree Removal</a>
            </li>
            <li class="nav-item">
                <a class="nav-link h4" href="/reporting/dev-proj">Development Project</a>
            </li>
            <li class="nav-item">
                <a class="nav-link h4" href="/reporting/env-restoration">Restoration</a>
            </li>
            <li class="nav-item">
                <a class="nav-link h4" href="/reporting/complaints">Complaints</a>
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