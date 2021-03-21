<!DOCTYPE html>
<html lang="en">

<head>
    <title>National Environment Platform</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.2/bootstrap3-typeahead.min.js" integrity="sha512-HWlJyU4ut5HkEj0QsK/IxBCY55n5ZpskyjVlAoV9Z7XQwwkqXoYdCIC93/htL3Gu5H3R4an/S0h2NXfbZk3g7w==" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    @livewireStyles
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A==" crossorigin="" />

    <script src='https://api.tiles.mapbox.com/mapbox.js/plugins/leaflet-omnivore/v0.3.1/leaflet-omnivore.min.js'></script>

    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js" integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA==" crossorigin=""></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/leaflet.draw/1.0.4/leaflet.draw-src.css" integrity="sha512-vJfMKRRm4c4UupyPwGUZI8U651mSzbmmPgR3sdE3LcwBPsdGeARvUM5EcSTg34DK8YIRiIo+oJwNfZPMKEQyug==" crossorigin="anonymous" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet.draw/1.0.4/leaflet.draw.js" integrity="sha512-ozq8xQKq6urvuU6jNgkfqAmT7jKN2XumbrX1JiB3TnF7tI48DPI4Gy1GXKD/V3EExgAs1V+pRO7vwtS1LHg0Gw==" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <link href="{{ url('/css/app.css') }}" rel="stylesheet">
    <style>
        .inline {
            display: inline;
        }

        .remove-all-margin {
            margin: 0 ! important;
        }

        .container {
            padding: 0px;
        }

        .input-group>.input-group-prepend {
            flex: 0 0 30%;
        }

        .input-group .input-group-text {
            width: 100%;
        }

        html {
            position: relative;
            min-height: 100%;
        }

        body {
            margin-bottom: 60px;
        }

        .footer {
            position: absolute;
            bottom: 0;
            width: 100%;
            height: 75px;
            line-height: 15px;
        }


        /* Add a background color to the button if it is clicked on (add the .active class with JS), and when you move the mouse over it (hover) */
    </style>
</head>

<body class="bg-secondary">
    @livewireScripts
    <nav class="navbar navbar-expand-sm bd-navbar navbar-dark">
        <!-- Brand/logo -->
        <a class="navbar-brand mr-auto" href="#">
            <img src="/Logo.jpeg" alt="logo" style="width:70px;">
        </a>

        <a href="#" class="text-secondary mr-1">Help |</a>


        
        <span>
        <li class="nav-item dropdown">
            <a id="navbarDropdown" class="nav-link dropdown-toggle text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                <i class="fas fa-bell mr-1"></i>
                @if(auth()->user()->notifications)
                <span class="badge badge-light">{{auth()->user()->notifications->count()}}</span> 
                @endif
            </a>

            <ol class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                    <li><a href="#">Notify</a></li>
                    @foreach(auth()->user()->notifications as $notification)
                    @if($notification->type == "App\Notifications\StaffAssigned")
                    <li><a href="/approval-item/investigate/{{$notification->data['process_id']}}"><p> {{$notification->data['type']}} application No {{$notification->data['form_id']}} {{$notification->data['action']}}</p></a></i>
                    @endif
                    @if($notification->type == "App\Notifications\AssignOrg")
                    <li><a href="/approval-item/assignstaff/{{$notification->data['process_id']}}"><p> {{$notification->data['type']}} application No {{$notification->data['form_id']}} {{$notification->data['action']}}</p></a></i>
                    @endif
                    @if($notification->type == "App\Notifications\ApplicationMade")
                    <li><a href="/approval-item/assignorganization/{{$notification->data['process_id']}}"><p>New {{$notification->data['type']}} application No {{$notification->data['form_id']}} has been made.</p></a></i>
                    @endif
                    @endforeach
                </ol>
        </li>
        </span>



        <a href="/admin/passwordReset" class="text-secondary">
            <i class="fas fa-cog mr-1"> |</i>
        </a>


        <ul class="navbar-nav">
            <!-- Authentication Links -->
            @guest
            <li class="nav-item">
                <a class="nav-link text-light" href="{{ route('login') }}">{{ __('Login') }}</a>
            </li>
            @if (Route::has('register'))
            <li class="nav-item">
                <a class="nav-link text-light" href="{{ route('register') }}">{{ __('Register') }}</a>
            </li>
            @endif
            @else
            <li class="nav-item dropdown">
                <a id="navbarDropdown" class="nav-link dropdown-toggle text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                    {{ Auth::user()->name }}
                </a>

                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
            </li>
            @endguest
        </ul>
    </nav>



    <br>

    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-2">
                <!--if screen size goes below large then start stacking-->
                <div class="p-2 border bg-dark border-dark rounded-lg flex-shrink-3">
                    <!-- A vertical navbar -->
                    <nav class="navbar bg-dark">
                        <!-- Links -->
                        <ul class="navbar-nav nav-tabs">
                            <li class="nav-item">
                                <a class="nav-link text-light font-italic p-2" href="/general/pending">General Module</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-light font-italic p-2" href="/user/index">User Management</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-light font-italic p-2" href="/environment/generalenv">Environment Module</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-light font-italic p-2" href="/organization/index">Admin Module</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-light font-italic p-2" href="#">Security Module</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-light font-italic p-2" href="#">Update Map</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-light font-italic p-2" href="/approval-item/showRequests">Requests</a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
            <div style="background-color:#f0f0f7" class="col-md p-2 border border-secondary rounded-lg ml-2 mr-3">
                @yield('cont')
            </div>
        </div>
    </div>
    <br>

    {{-- sticky footer --}}
    <footer class="footer">
        <div class="d-flex  bg-light justify-content-end">
            <br>
            <a href="#" class="text-secondary mr-2">
                <i class="fab fa-facebook-square"></i> Facebook |
            </a>
            <a href="#" class="text-secondary mr-2">
                <i class="fab fa-twitter-square"></i> Twitter |
            </a>
            <a href="#" class="text-secondary mr-2">
                <i class="fab fa-instagram"></i> Instagram
            </a>
        </div>
        <div class="d-flex bg-light justify-content-center">
            <h5 class="text-secondary"><i class="far fa-copyright"></i> 2021 by RFSL - LSF - Ministry of Environment</h5><br>
        </div>
        <div class="d-flex bg-light justify-content-center">
            <h6>All rights reserved</h6>
        </div>

    </footer>

</body>

</html>