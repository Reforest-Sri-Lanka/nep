<!DOCTYPE html>
<html lang="en">
<head>
  <title>Dark Home</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
  <style>
    .inline{
        display: inline;
      }
  </style>
</head>

<body class="bg-secondary">

<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
<!-- Brand/logo -->
<a class="navbar-brand" href="#">
  <img src="Logo.jpeg" alt="logo" style="width:70px;">
</a>
<!--Toggler-->
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav mr-auto">
        <li class="nav-item">
          <a class="nav-link" href="#">About</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Blogs</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Events</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Maps</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Project Approval</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Reports</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Volunteer</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Contact Us</a>
        </li>
        </ul>
        @if (Route::has('login'))
        <ul class="navbar-nav">
            <li class="nav-item">
            @auth
                <a class="nav-link" href="{{ url('/test3') }}">Home</a>
            </li>
            <li class="nav-item">
            @else
                
                <a class="nav-link" href="{{ route('login') }}">Login</a>
            </li>
            @if (Route::has('register'))
                <a class="nav-link" href="{{ route('register') }}">Register</a>
            @endif
          @endif
        </ul>
        @endif
    </div>
</nav>

<br>

<div class="d-flex p-3">
  <div class="p-2 border bg-light border-secondary rounded-lg flex-shrink-3">
    <h5>Facts About the National Environment Platform</h5><br>
    <ul>
      <li>Is a volunteer initiative under the guidance and initiative of the Ministry of Environment</li>
      <li>Promotes environmental protection and good governance by active citizen participation with public administration</li>
      <li>Aims to stop devastations at the inceptions clearly identifying  protected areas </li>
      <li>Aims to increase data clarity and remove information silos in environment public administration and policy making. </li>
    </ul>
  </div>
  <div class="p-2 border bg-light border-secondary rounded-lg ml-2">
    <h5>Ministry of Environment</h5>
    <p>The Minister of Environment and the government of Sri Lanka promotes a vision of environmental protection and the NEP is a core platform in achieving it. <br>We help automate:</p>
    <ul>
      <li>Land Parcel Mapping.</li>
      <li>Protected Area Mapping.</li>
      <li>Tree removal process automation.</li>
      <li>Environmental restoration projects.</li>
      <li>Development project process.</li>
      <li>Species mapping.</li>
    </ul>
    <div class="d-flex p-2 justify-content-end">
      <a href="#">Read More</a>
    </div>
  </div>
</div>

<br>

<div class="container-fluid p-20">  
  <div class="row">
    <div class="col-7 bg-light border bg-light border-secondary rounded-lg ml-3 mr-2">
      <h5 class="p-2">Blogs</h5><br>
      <div class="card-columns">
        <div class="card bg-secondary">
          <div class="card-body text-center">
            <p class="card-text">Some text <br> inside the <br> first card</p>
          </div>
        </div>
        <div class="card bg-secondary">
          <div class="card-body text-center">
            <p class="card-text">Some text <br> inside the <br> second card</p>
          </div>
        </div>
        <div class="card bg-secondary">
          <div class="card-body text-center">
            <p class="card-text">Some text <br> inside the <br> third card</p>
          </div>
        </div>
        <div class="card bg-secondary">
          <div class="card-body text-center">
            <p class="card-text">Some text <br> inside the <br> fourth card</p>
          </div>
        </div>
        <div class="card bg-secondary">
          <div class="card-body text-center">
            <p class="card-text">Some text <br> inside the <br> fifth card</p>
          </div>
        </div>
        <div class="card bg-secondary">
          <div class="card-body text-center">
            <p class="card-text">Some text <br> inside the <br> sixth card</p>
          </div>
        </div>
    </div>
    </div>


    <div class="col border bg-light border-secondary rounded-lg bg-light mr-3">
      <h5 class="p-2">Events</h5><br>
      <div id="accordion">

        <div class="card">
          <div class="card-header">
            <a class="card-link" data-toggle="collapse" href="#collapseOne">
              Event #1
            </a>
          </div>
          <div id="collapseOne" class="collapse show" data-parent="#accordion">
            <div class="card-body">
              event event event event event event event event event event event event event event event event event event
            </div>
          </div>
        </div>

        <div class="card">
          <div class="card-header">
            <a class="collapsed card-link" data-toggle="collapse" href="#collapseTwo">
            Event #2
            </a>
          </div>
          <div id="collapseTwo" class="collapse" data-parent="#accordion">
            <div class="card-body">
            event event event event event event event event event event event event event event event event event event
            </div>
          </div>
        </div>

        <div class="card">
          <div class="card-header">
            <a class="collapsed card-link" data-toggle="collapse" href="#collapseThree">
            Event #3
            </a>
          </div>
          <div id="collapseThree" class="collapse" data-parent="#accordion">
            <div class="card-body">
            event event event event event event event event event event event event event event event event event event
            </div>
          </div>
        </div>
    </div>
  </div>
</div>

<br><br>


<div class="container-fluid p-20">  
  <div class="row mb-3">
    <div class="col bg-light border bg-light border-secondary rounded-lg mr-2">
      <h5 class="p-2">Gazette Updates</h5><br>
        <div class="list-group list-group-flush">
          <a href="#" class="list-group-item list-group-item-action">Gazette Update1</a>
          <a href="#" class="list-group-item list-group-item-action">Gazette Update2</a>
          <a href="#" class="list-group-item list-group-item-action">Gazette Update3</a>
        </div>
    </div>


    <div class="col border bg-light border-secondary rounded-lg bg-light mr-2">
      <h5 class="p-2">Projects</h5><br>
        <div class="list-group list-group-flush">
          <a href="#" class="list-group-item list-group-item-action">Project1</a>
          <a href="#" class="list-group-item list-group-item-action">Project2</a>
          <a href="#" class="list-group-item list-group-item-action">Project3</a>
        </div>
    </div>

    <div class="col border bg-light border-secondary rounded-lg bg-light">
      <h5 class="p-2">Resolved Crimes</h5><br>
      <div id="demo" class="carousel slide" data-ride="carousel">

        <!-- Indicators -->
        <ul class="carousel-indicators">
          <li data-target="#demo" data-slide-to="0" class="active"></li>
          <li data-target="#demo" data-slide-to="1"></li>
          <li data-target="#demo" data-slide-to="2"></li>
        </ul>

        <!-- The slideshow -->
        <div class="carousel-inner">
          <div class="carousel-item active">
            crime1 crime1 crime1 crime1 crime1 crime1 crime1 <br>
            crime crime crime crime crime crime crime <br>
            crime crime crime crime crime crime crime <br>
            crime crime crime crime crime crime crime <br>
          </div>
          <div class="carousel-item">
            crime2 crime2 crime2 crime2 crime2 crime2 crime2 <br>
            crime crime crime crime crime crime crime <br>
            crime crime crime crime crime crime crime <br>
            crime crime crime crime crime crime crime <br>
          </div>
          <div class="carousel-item">
            crime3 crime3 crime3 crime3 crime3 crime3 crime3 <br>
            crime crime crime crime crime crime crime <br>
            crime crime crime crime crime crime crime <br>
            crime crime crime crime crime crime crime <br>
          </div>
        </div>

        <!-- Left and right controls -->
        <a class="carousel-control-prev" href="#demo" data-slide="prev">
          <span class="carousel-control-prev-icon"></span>
        </a>
        <a class="carousel-control-next" href="#demo" data-slide="next">
          <span class="carousel-control-next-icon"></span>
        </a>

      </div>

    </div>
  </div>
</div>

<br>
<div class="d-flex  bg-light justify-content-end">
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
<div class="d-flex  bg-light justify-content-center">
  <h5 class="text-secondary"><i class="far fa-copyright"></i> 2020 by Reforest Sri Lanka</h5><br>
</div>
<div class="d-flex  bg-light justify-content-center">
  <h6>All rights reserved</h6>
</div>

</body>
</html>