<!DOCTYPE html>
<html lang="en">

<head>

  <title>NEP - Beta</title>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
  <style>
    .inline {
      display: inline;
    }

    * {
      margin: 0;
      padding: 0;
      outline: 0
    }

    body {
      font: 11px/18px Segoe UI,Roboto,Helvetica Neue,Arial,Noto Sans,sans-serif;
      background: #f4f4f4 url(../images/bg.jpg) no-repeat center top;
      color: #777;
    }

    a {
      text-decoration: none;
      color: #89A213;
    }

    a:hover {
      color: #556314;
    }

    p {
      margin: 0 0 15px;
      line-height: 1.2em;
	  font-size: 0.9em;
    }

    h1 {
      float: left;
      width: 80%;
      line-height: 1.5em;
      font-size: 2em;
      color: #fff;
      margin: 0 0 20px;
      text-shadow: #89A213 1px 1px 1px;
    }

    h2 {
      margin: 0 0 15px;
      font-size: 1.3em;
      color: #89A213;
    }

    h3 {
      margin: 0 0 7px;
      font-size: 1.1em;
      clear: both;
      color: #444;
      line-height: 1.1em;
    }

    h4 {
      margin: 0 0 10px;
      font-size: 1em;
    }

    h5 h6 {
      margin: 0 0 10px;
      font-size: 0.8em;
    }

    img {
      border: 0;
    }

    .x {
      clear: both;
    }

    #content {
      margin: 0 auto;
      width: 960px;
    }

    #header {
      height: 350px;
    }

    .pitch {
      clear: left;
      float: left;
      width: 90%;
      font-size: 1.2em;
      padding: 20px 0 0;
      color: #59690C;
      margin: 0 0 60px;
    }

    .menu {
      float: right;
      margin: 10px 15px 0 0;
    }

    .menu li {
      display: inline;
    }

    .menu li a {
      float: left;
      color: #EFF4D7;
      font-size: 1.2em;
      margin: 0 0 0 0px;
      padding: 4px;
    }

    .menu li a:hover,
    .menu li a.current {
      color: #fff;
      border-bottom: 1px solid #A5BE2E;
    }

    @media screen and (max-width: 400px) {
  .menu.responsive {position: relative;}
  .menu.responsive a.icon {
    position: absolute;
    right: 0;
    top: 0;
  }
  .menu.responsive a {
    float: none;
    display: block;
    text-align: left;
  }
}


    #cols {
      clear: both;
    }

    .col {
      float: left;
      width: 300px;
      margin: 0 39px 30px 0;
    }

    .last {
      position: relative;
      float: right;
      margin: -76px 0 0;
      background: #fff;
      width: 280px;
    }

    .col.last div {
      padding: 12px;
    }

    .img {
      clear: both;
      margin: 0 0 15px;
      border: 1px solid #ddd;
      padding: 5px;
    }

    .date {
      margin: 0 0 12px;
      color: #444;
    }

    .col h4 {
      background: #a46cb8;
      padding: 15px;
      color: #fff;
    }

    .main {
      clear: both;
      font-size: 1.2em;
	  margin: 0 auto;
      width: 80%;
    }

    #secondmain {
      clear: both;
      font-size: 1.2em;
      margin: auto;
      width: 80%;
    }

    .left {
      float: left;
      margin: 0 30px 10px 0;
    }

    #main p {
      text-align: justify;
      font: 1.2em "Segoe UI";
    }

    #footer {
      font-size: 0.8em;
      clear: both;
      border-top: 1px solid #ddd;
      color: #999;
      padding: 35px 0 15px 0;
    }

    #footer a {
	  font-size: 0.8em;
      margin: 0;
      color: #999;
    }

    #footer .left {
      float: left;
    }

    #footer .right {
      float: right;
    }

    .lightpurp {
      background-color: #5F9EA0;
    }
  </style>
</head>

<body class="antialiased main">

  <div class="row">
    
  
   <div style="height:50px; display:block;" class="col-md-12 col-sm-12 justify-content-end"> 
    <nav class="navbar navbar-expand-lg navbar-expand-sm menu">
    <ul>
      <!-- Authentication Links -->
      <li class="nav-item">
        <a class="nav-link text-light mr-3" href="{{ route('crime') }}">
          <p class="h6">{{ __('Report') }}</p>
        </a>
      </li>

      @guest
      <li class="nav-item">
        <a class="nav-link text-light" href="{{ route('login') }}">
          <p class="h6">{{ __('Login') }}</p>
        </a>
      </li>
      @if (Route::has('register'))
      <li class="nav-item">
        <a class="nav-link text-light ml-3" href="{{ route('register') }}">
          <p class="h6">{{ __('Register') }}</p>
        </a>
      </li>
      @endif
      @else
      <li class="nav-item">
        <a class="nav-link text-light mr-3" href="/home">Home</a>
      </li>
      <li class="nav-item dropdown">
        <a id="navbarDropdown" class="nav-link dropdown-toggle text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
          {{ Auth::user()->name }}
        </a>

        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
          <a class="dropdown-item text-dark" href="{{ route('logout') }}" onclick="event.preventDefault();
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
    </div>
    </div>

    <div class="row">
		<div class="col-md-12 col-sm-12 mt-4" style="height:150px; display:block;">
		<h1 style="width:100%;">NEP - Beta</h1>
	   </div>
   </div>

    <div class="row">
		<div class="col-md-12 col-sm-12 pitch p-2" style="margin:0px auto; width: 100%; margin-top:1rem; margin-left:1rem; text-align:left;">

		  <h2>What is the National Environment Platform (NEP)? </h2>
		  <p>A government cloud aimed for sustainable management of envrionmental resources of Sri Lanka. It automates:</p>
		  <p>1. Tree removal process : Trees are removed at different locations under different authorities. Effective management shoud be aware of the loss of trees, why they are removed, which species are removed etc. better manage and monitor green cover. </p>
		  <p>2. Ecosystem restoration activities: Reforestation, Coral restoration, mangrove planting, Garbage clean ups etc. can be geographically added with the ability to log progress of sites for better monitoring and evaluation. Scientefic data analysis is a long term objective.</p>
		  <p>3. Development project site approvals: Add relevant development projects and log its life cycle. Better understand where protected areas exist via GIS mapping  and connect gazette notifications for transparent open governance. </p>
		  <p>In addition NEP has a species database, ecosystems database and a module to manage system admin tasks. </p>
      <p>The platform was made under guidance of the Ministry of Environment by volunteers. It has not been officially adopted yet and is up for beta testing.</p>
    </div>
    </div>

    <div class="row">
  <div class="col-md-12 col-sm-12" style="margin:0px auto; width: 100%; margin-top:1rem; text-align:left;">
    
	<h2 style="text-align: center;">Quick Links</h2>
    
	<div class="row justify-content-center">
	
      <div class="card m-2" style="width: 18rem;">
        <img class="card-img-top" style="height:250px; width:287px;" src="images/tree.jpg" alt="Card image cap">
        <div class="card-body">
          <h5 class="card-title">Tree Removals</h5>
          <p class="card-text">If any project, maintainance, road development, housing project etc. require trees to be removed, please enter their details.</p>
        </div>
        <div class="card-body">
          @if(auth()->user())
          @if(auth()->user()->role_id)
          <a href="{{ route('treeremoval') }}" class="btn lightpurp text-light">Submit a Tree Removal Form</a>
          @endif
          @else
          <a href="{{ route('login') }}" class="btn lightpurp text-light">Submit a Tree Removal Form</a>
          @endif
        </div>
      </div>

      <div class="card m-2" style="width: 18rem;">
        <img class="card-img-top" style="height:250px; width:287px;" src="images/dev.jpg" alt="Card image cap">
        <div class="card-body">
          <h5 class="card-title">Development Projects</h5>
          <p class="card-text">Add details of development projects such as markets, land sales, housing, roads, public infrastructure, ports</p>
        </div>
        <div class="card-body">
          @if(auth()->user())
          @if(auth()->user()->role_id)
          <a href="{{ route('devproject') }}" class="btn lightpurp text-light">Submit a Development Request</a>
          @endif
          @else
          <a href="{{ route('login') }}" class="btn lightpurp text-light">Submit a Development Request</a>
          @endif
        </div>
      </div>

      <div class="card m-2" style="width: 18rem;">
        <img class="card-img-top" style="height:250px; width:287px;" src="/images/restore2.jpg" alt="Card image cap">
        <div class="card-body">
          <h5 class="card-title">Restorations</h5>
          <p class="card-text">Add details of any environment restoration projects such as tree planting, mangrove planting, sea grass or coral restoration and others.</p>
        </div>
        <div class="card-body">
          @if(auth()->user())
          @if(auth()->user()->role_id)
          <a href="{{ route('envrestoration') }}" class="btn lightpurp text-light">Submit a Restoration Request</a>
          @endif
          @else
          <a href="{{ route('login') }}" class="btn lightpurp text-light">Submit a Restoration Request</a>
          @endif
        </div>
      </div>

      <div class="card m-2" style="width: 18rem;">
        <img class="card-img-top" style="height:250px; width:287px;" src="images/complain.jpg" alt="Card image cap">
        <div class="card-body">
          <h5 class="card-title">Crime Report</h5>
          <p class="card-text">Add details of environmental crimes, poaching, trapping, dead animals, tree felling and others.</p>
        </div>
        <div class="card-body">
          @if(auth()->user())
          @if(auth()->user()->role_id)
          <a href="{{ route('crime') }}" class="btn lightpurp text-light">Make a Complaint</a>
          @endif
          @else
          <a href="{{ route('crime') }}" class="btn lightpurp text-light">Make an Anonymous Complaint</a>
          @endif
        </div>
      </div>
      <div class="card m-2" style="width: 18rem;">
        <img class="card-img-top" style="height:250px; width:287px;" src="images/complain.jpg" alt="Card image cap">
        <div class="card-body">
          <h5 class="card-title">Track Complaint</h5>
          <p class="card-text">Track the progress of any anonymous complaints logged using the reference ID given</p>
        </div>
        <div class="card-body">
          <!-- Search Bar -->
          <form action="/crime-report/trackcrime" method="post">
            @csrf
              <div class="input-group">
                  <input type="search" class="form-control" name="reference_id" placeholder="Track Complaint">
                  <span class="form-group-button">
                      <button type="submit" class="btn btn-primary ml-2"><i class="fa fa-search" aria-hidden="true"></i></button>
                  </span>
              </div>
          </form>
          @error('reference_id')
            <div class="alert">                                   
                <strong>{{ $message }}</strong>
            </div>
          @enderror
        </div>
      </div>
    </div>
    </div>
    </div>

    <div class="row">
    <div class="col-md-12 col-sm-12" style="margin:0px auto; width: 100%; margin-top:1rem; text-align:left;">
  <h2 style="text-align: center;">Our Progress</h2>
  <div class="row justify-content-center mb-3">
    <div class="col-lg-11 card">
      <canvas id="TreeRemovalAreaChart"></canvas>
    </div>
  </div>
  <div class="row justify-content-center mb-3">
    <div class="col-lg-11 card">
      <canvas id="RestorationAreaChart"></canvas>
    </div>
  </div>
  <div class="row justify-content-center mb-3">
    <div class="col-lg-11 card">
      <canvas id="processItemTypeChart"></canvas>
    </div>
  </div>
  </div>

  </div>

  <div id="footer">
    <div class="d-flex  bg-light justify-content-end">
      <a href="https://www.facebook.com/reforestsrilanka/" class="text-secondary mr-2">
        <i class="fab fa-facebook-square"></i> Facebook |
      </a>
      <a href="https://www.linkedin.com/company/reforest-sri-lanka/" class="text-secondary mr-2">
        <i class="fab fa-linkedin"></i> LinkedIn |
      </a>
      <a href="https://www.instagram.com/reforest_srilanka/?hl=en" class="text-secondary mr-2">
        <i class="fab fa-instagram"></i> Instagram |
      </a>
      <a href="#" class="text-secondary mr-2">
        <i class="fab fa-medium"></i> Medium |
      </a>
    </div>
    <div class="d-flex bg-light justify-content-center">
      <p><i class="far fa-copyright"></i> 2021 by RFSL - for Ministry of Environment | Not officially launched | All rights reserved</p>
    </div>
  </div>
  <!--chart js -->
  <script src="{{ url('/vendor/chart.js/dist/Chart.min.js') }}"></script>
  <script src="{{ url('/vendor/chart.js/dist/Chart.extension.js') }}"></script>
  <script src="{{ url('/vendor/welcomepage-charts.js' ) }}"></script>
</body>

</html>