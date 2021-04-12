@extends('home')

@section('cont')
<h3 class="p-3 display-4" style="display:inline">Dashboard</h3>
<nav class="navbar navbar-expand-lg navbar-light justify-content-around">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item {{ Route::currentRouteName() == 'treeremoval' ? 'active' : '' }}">
                <a class="nav-link h4" href="{{ route('treeremoval') }}">Tree Removal</a>
            </li>
            <li class="nav-item {{ Route::currentRouteName() == 'devproject' ? 'active' : '' }}">
                <a class="nav-link h4" href="{{ route('devproject') }}">Development Project</a>
            </li>
            <li class="nav-item {{ Route::currentRouteName() == 'envrestoration' ? 'active' : '' }}">
                <a class="nav-link h4" href="{{ route('envrestoration') }}">Environment Restoration</a>
            </li>
            <li class="nav-item {{ Route::currentRouteName() == 'land' ? 'active' : '' }}">
                <a class="nav-link h4" href="{{ route('land') }}">Register Land</a>
            </li>
            <li class="nav-item {{ Route::currentRouteName() == 'crime' ? 'active' : '' }}">
                <a class="nav-link h4" href="{{ route('crime') }}">Crime Reporting</a>
            </li>
        </ul>
    </div>
</nav>
<div class="col-md">
    <div class="row justify-content-center">
        <div class="col-md-3">
            <div class="card">
                <div class="card-header bg-white text-center">Tree Removals This Month</div>
                <div class="card-body text-center">
                    <p class="card-text display-1">{{$tree_removals}}</p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card">
                <div class="card-header bg-white text-center">Development Projects This Month</div>
                <div class="card-body text-center">
                    <p class="card-text display-1">{{$dev_projects}}</p>
                </div>
            </div>
        </div>
    </div>
</div>

    
@endsection