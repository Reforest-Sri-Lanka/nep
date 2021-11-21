@extends('home')

@section('cont')
<h3 class="p-3 display-5" style="display:inline">Document Manager</h3>
<nav class="navbar navbar-expand-lg navbar-light justify-content-around">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item {{ Route::currentRouteName() == 'land' ? 'active' : '' }}">
                <a class="nav-link mr-4" href="{{ route('land') }}">New Document</a>
            </li>
            <li class="nav-item {{ Route::currentRouteName() == 'land' ? 'active' : '' }}">
                <a class="nav-link mr-4" href="{{ route('land') }}">My Documents</a>
            </li>
            <li class="nav-item {{ Route::currentRouteName() == 'land' ? 'active' : '' }}">
                <a class="nav-link mr-4" href="{{ route('land') }}">Tasks Assigned</a>
            </li>
        </ul>
    </div>
</nav>
<div class="col-md">
<div class="flex row border-secondary rounded-lg ml-3 justify-content-between">
    <!-- Sessions to display success or failure -->
    <span>
        <h3 class="text-center bg-success text-light">{{session('message')}}</h3>
    </span>
    <span>
        <h3 class="text-center bg-danger text-light">{{session('warning')}}</h3>
    </span>
    <span>
</div>
    @yield('general')
</div>

@endsection