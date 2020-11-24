<!DOCTYPE html>
<html lang="en">
<head>
  <title>Dashboard</title>
  <meta charset="utf-8">
  <script src="{!!url('/js/jquery.min.js')!!}"></script>
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
  </style>
</head>

<body>

    <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
        <!-- Brand/logo -->
        <a class="navbar-brand mr-auto" href="#">
        <img src="Logo.jpeg" alt="logo" style="width:70px;">
        </a>

        <a href="#" class="text-secondary mr-1">Help          |</a>

        <a href="#" class="text-secondary">
            <i class="fas fa-bell mr-1"> <span class="badge badge-light">4</span>        |</i>
        </a>

        <a href="user/passwordReset" class="text-secondary">
            <i class="fas fa-cog mr-1">          |</i>
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
                    <a class="dropdown-item" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
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


	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-2 pl-0 pr-0 ml-0 mr-0">      <!--if screen size goes below large then start stacking-->
				<div class="bg-dark border-dark">
					<!-- A vertical navbar -->
					<nav class="navbar bg-dark">
					<!-- Links -->
					<ul class="navbar-nav nav-tabs">
          <br>
          <br>
          <br>
					<li class="nav-item">
						<a class="nav-link text-light font-italic p-2" href="/general">General Module</a>
					</li>
          <br>
					<li class="nav-item">
						<a class="nav-link text-light font-italic p-2" href="/user/index">User Management</a>
					</li>
          <br>
					<li class="nav-item">
						<a class="nav-link text-light font-italic p-2" href="#">Environment Module</a>
					</li>
          <br>
					<li class="nav-item">
						<a class="nav-link text-light font-italic p-2" href="/organization/index">Admin Module</a>
					</li>
          <br>
					<li class="nav-item">
						<a class="nav-link text-light font-italic p-2" href="#">Security Module</a>
					</li>
          <br>
					<li class="nav-item">
						<a class="nav-link text-light font-italic p-2" href="#">Update Map</a>
					</li>
          <br>
					<li class="nav-item">
						<a class="nav-link text-light font-italic p-2" href="#">Requests</a>
					</li>
          <br>
          <br>
          <br>
          <br>
					</ul>
					</nav>
				</div>
			</div>


			<div style="background-color:#ECF0F1" class="col no-float pl-0 pr-0 ml-0 mr-0">
			  @yield('cont')
			</div>
		</div>
	</div>

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
	<div class="d-flex bg-light justify-content-center">
	  <h5 class="text-secondary"><i class="far fa-copyright"></i> 2020 by Reforest Sri Lanka</h5><br>
	</div>
	<div class="d-flex bg-light justify-content-center">
	  <h6>All rights reserved</h6>
	</div>

</body>
</html>