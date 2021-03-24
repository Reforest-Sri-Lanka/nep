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
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">  
  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"
   integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A=="
   crossorigin=""/>
   
   <script src='https://api.tiles.mapbox.com/mapbox.js/plugins/leaflet-omnivore/v0.3.1/leaflet-omnivore.min.js'></script>
   
   <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"
   integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA=="
   crossorigin=""></script>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/leaflet.draw/1.0.4/leaflet.draw-src.css" integrity="sha512-vJfMKRRm4c4UupyPwGUZI8U651mSzbmmPgR3sdE3LcwBPsdGeARvUM5EcSTg34DK8YIRiIo+oJwNfZPMKEQyug==" crossorigin="anonymous" />
   <script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet.draw/1.0.4/leaflet.draw.js" integrity="sha512-ozq8xQKq6urvuU6jNgkfqAmT7jKN2XumbrX1JiB3TnF7tI48DPI4Gy1GXKD/V3EExgAs1V+pRO7vwtS1LHg0Gw==" crossorigin="anonymous"></script>

  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
  <link href="{{ url('/css/app.css') }}" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
  <style>
   .inline{
      display: inline;
    }

    .remove-all-margin{
      margin:0 ! important;
    }
    .container{ 
      padding: 0px;
    }
    .input-group>.input-group-prepend {
      flex: 0 0 30%;
    }
    .input-group .input-group-text {
      width: 100%;
    }
    .footer {
      position: relative;
      bottom: 0;
      width: 100%;
      height: 75px;
      line-height: 15px;
    }
  </style>
  <link href="{{ url('/css/app.css') }}" rel="stylesheet">
  <!-- Fonts -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
  <!-- Icons -->
  <link href="{{ url('/vendor/nucleo/css/nucleo.css') }}" rel="stylesheet" type="text/css">
  <link href="{{ url('/vendor/@fortawesome/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
  <!-- Argon CSS -->
  <link href="{{ url('/css/argon.css') }}" rel="stylesheet" type="text/css">

</head>

<body>
  <!-- Sidenav -->
  <nav class="sidenav navbar navbar-vertical  fixed-left  navbar-expand-xs navbar-light bg-white" id="sidenav-main">
    <div class="scrollbar-inner">
      <div class="sidenav-header  align-items-center">
        <a class="navbar-brand" href="javascript:void(0)">
          <img src="{{ url('/img/Logo.png') }}" class="navbar-brand-img" alt="...">
        </a>
      </div>
      <div class="navbar-inner">
        <!-- Collapse -->
        <div class="collapse navbar-collapse" id="sidenav-collapse-main">
          <!-- Nav items -->
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link " href="">National Environment Platform</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/general/pending">
                <i class="ni ni-app text-orange"></i>
                <span class="nav-link-text">General</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/user/index">
                <i class="ni ni-single-02 text-yellow"></i>
                <span class="nav-link-text">User Management</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/organization/index">
                <i class="ni ni-badge text-info"></i>
                <span class="nav-link-text">Admin</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/environment/generalenv">
                <i class="fa fa-tree text-green"></i>
                <span class="nav-link-text">Environment Management</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/approval-item/showRequests">
                <i class="ni ni-send text-warning"></i>
                <span class="nav-link-text">Requests</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/reporting/overview">
                <i class="ni ni-single-copy-04 text-primary"></i>
                <span class="nav-link-text">Reports</span>
              </a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </nav>
  <!-- Main content -->
  <div class="main-content" id="panel">
    <!-- Topnav -->
    <nav class="navbar navbar-top navbar-expand navbar-dark bg-success border-bottom">
      <div class="container-fluid">
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <!-- Navbar links -->
          <ul class="navbar-nav align-items-center  ml-md-auto ">
            <li class="nav-item d-xl-none">
              <!-- Sidenav toggler -->
              <div class="pr-3 sidenav-toggler sidenav-toggler-dark" data-action="sidenav-pin" data-target="#sidenav-main">
                <div class="sidenav-toggler-inner">
                  <i class="sidenav-toggler-line"></i>
                  <i class="sidenav-toggler-line"></i>
                  <i class="sidenav-toggler-line"></i>
                </div>
              </div>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="ni ni-bell-55"></i>
              </a>
              <div class="dropdown-menu dropdown-menu-xl  dropdown-menu-right  py-0 overflow-hidden">
                <!-- Dropdown header -->
                <div class="px-3 py-3">
                  <h6 class="text-sm text-muted m-0">You have <strong class="text-primary">13</strong> notifications.</h6>
                </div>
                <!-- List group -->
                <div class="list-group list-group-flush">
                  <a href="#!" class="list-group-item list-group-item-action">
                    <div class="row align-items-center">
                      <div class="col ml--2">
                        <div class="d-flex justify-content-between align-items-center">
                          <div>
                            <h4 class="mb-0 text-sm">Module giving notification</h4>
                          </div>
                          <div class="text-right text-muted">
                            <small>2 hrs ago</small>
                          </div>
                        </div>
                        <p class="text-sm mb-0">The notification text</p>
                      </div>
                    </div>
                  </a>
                </div>
                <!-- View all -->
                <a href="#!" class="dropdown-item text-center text-primary font-weight-bold py-3">View all</a>
              </div>
            </li>
          </ul>
          <ul class="navbar-nav align-items-center  ml-auto ml-md-0 ">
            <li class="nav-item dropdown">
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
              <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <div class="media align-items-center">
                  <span class="avatar avatar-sm rounded-circle">
                    <img alt="Image placeholder" src="{{ url('/img/theme/team-4.png') }}">
                  </span>
                  <div class="media-body  ml-2  d-none d-lg-block">
                    <span class="mb-0 text-sm  font-weight-bold">{{ Auth::user()->name }}</span>
                  </div>
                </div>
              </a>
              <div class="dropdown-menu  dropdown-menu-right ">
                <div class="dropdown-header noti-title">
                  <h6 class="text-overflow m-0">Welcome!</h6>
                </div>
                <a href="#!" class="dropdown-item">
                  <i class="ni ni-single-02"></i>
                  <span>User</span>
                </a>
                <a href="/admin/passwordReset" class="dropdown-item">
                  <i class="ni ni-settings-gear-65"></i>
                  <span>Change my password</span>
                </a>
                <a href="#!" class="dropdown-item">
                  <i class="ni ni-calendar-grid-58"></i>
                  <span>Activity</span>
                </a>
                <a href="#!" class="dropdown-item">
                  <i class="ni ni-support-16"></i>
                  <span>Support</span>
                </a>
                <div class="dropdown-divider"></div>
                <a href="{{ route('logout') }}" class="dropdown-item" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                        
                  <i class="ni ni-user-run"></i>
                  {{ __('Logout') }}
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                     @csrf
                    </form>
                </a>
              </div>
            </li>
            @endguest
          </ul>
        </div>
      </div>
    </nav>
    <!-- Page content -->
    <div class="col-md p-2 border border-secondary rounded-lg ml-2 mr-3">
      @yield('cont')
    </div>
  </div>
  <div class="footer" style="background-color:#f0f0f7">
    <footer>
      <div class="d-flex  bg-success justify-content-end">
        <a href="#" class="text-secondary mr-2">
          <i class="fab fa-facebook-square"></i> Facebook |
        </a>
        <a href="#" class="text-secondary mr-2">
          <i class="fab fa-twitter-square"></i> Twitter |
        </a>
        <a href="#" class="text-secondary mr-2">
          <i class="fab fa-instagram"></i>  Instagram
        </a>
        </div>
        <div class="d-flex bg-success justify-content-center">
          <h5 class="text-secondary"><i class="far fa-copyright"></i> 2021 by RFSL - LSF - Ministry of Environment</h5><br>
        </div>
        <div class="d-flex bg-success justify-content-center">
          <h6>All rights reserved</h6>
        </div>
      <div>  
    </footer>         
  </div>
  <!-- Argon Scripts -->
  <!-- Core -->  
  <script src="{{ url('/vendor/js-cookie/js.cookie.js') }}"></script>
  <script src="{{ url('/vendor/jquery.scrollbar/jquery.scrollbar.min.js') }}"></script>
  <script src="{{ url('/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js') }}"></script>
  <script src="{{ url('/vendor/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>

  <!-- Argon JS -->
  <script src="{{ url('/js/argon.js?v=1.2.0') }} "></script>

  <!--chart js -->
  <script src="{{ url('/vendor/chart.js/dist/Chart.min.js') }}"></script>
  <script src="{{ url('/vendor/chart.js/dist/Chart.extension.js') }}"></script>
  <script src="{{ url('/vendor/create-charts.js' ) }}"></script>
</body>
</html>
