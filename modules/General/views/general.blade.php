@extends('home')

@section('cont')
<h3 class="p-3 display-5" style="display:inline">General</h3>
<nav class="navbar navbar-expand-lg navbar-light justify-content-around">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item {{ Route::currentRouteName() == 'pending' ? 'active' : '' }}">
                <a class="nav-link h5" href="{{ route('pending') }}">Pending Request<span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item {{ Route::currentRouteName() == 'treeremoval' ? 'active' : '' }}">
                <a class="nav-link h5" href="{{ route('treeremoval') }}">Tree Removal</a>
            </li>
            <li class="nav-item {{ Route::currentRouteName() == 'devproject' ? 'active' : '' }}">
                <a class="nav-link h5" href="{{ route('devproject') }}">Development Project</a>
            </li>
            <li class="nav-item {{ Route::currentRouteName() == 'envrestoration' ? 'active' : '' }}">
                <a class="nav-link h5" href="{{ route('envrestoration') }}">Environment Restoration</a>
            </li>
            <li class="nav-item {{ Route::currentRouteName() == 'land' ? 'active' : '' }}">
                <a class="nav-link h5" href="{{ route('land') }}">Register Land</a>
            </li>

            <li class="nav-item {{ Route::currentRouteName() == 'crime' ? 'active' : '' }}">
                <a class="nav-link h5" href="{{ route('crime') }}">Crime Reporting</a>

            </li>
        </ul>
    </div>
</nav>
<div class="col-md">
    @yield('general')
</div>

@endsection