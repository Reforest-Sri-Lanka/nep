<!DOCTYPE html>
<html lang="en">
<head>
  <title>Dark Dashboard</title>
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
<a class="navbar-brand mr-auto" href="#">
  <img src="Logo.jpeg" alt="logo" style="width:70px;">
</a>

<a href="#" class="text-secondary mr-1">Help          |</a>

<a href="#" class="text-secondary">
    <i class="fas fa-bell mr-1"> <span class="badge badge-light">4</span>        |</i>
</a>

<a href="#" class="text-secondary">
    <i class="fas fa-cog mr-1">          |</i>
</a>



@if (Route::has('logout'))
<ul class="navbar-nav">
    <li class="nav-item">
    @auth
        <a class="nav-link" href="{{ url('/test2') }}">Logout</a>
    @endif
    </li>
@endif
</ul>
</nav>


<br>

<div class="container-fluid">
    <div class="row">
    <div class="col-2">
        <div class="p-2 border bg-dark border-dark rounded-lg flex-shrink-3">
            <h4 class="p-2 border border-light rounded-lg text-white">Navigation Bar</h5>
            <!-- A vertical navbar -->
            <nav class="navbar bg-dark">
            <!-- Links -->
            <ul class="navbar-nav nav-tabs">
            <li class="nav-item">
                <a class="nav-link text-light font-italic p-2" href="#">General Module</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-light font-italic p-2" href="#">User Management</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-light font-italic p-2" href="#">Environment Module</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-light font-italic p-2" href="#">Admin Module</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-light font-italic p-2" href="#">Security Module</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-light font-italic p-2" href="#">Update Map</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-light font-italic p-2" href="#">Requests</a>
            </li>
            </ul>
            </nav>
        </div>
    </div>


    <div class="col p-2 border justify-content-around bg-light border-secondary rounded-lg ml-2 mr-3">
    <h3 class="p-3 display-4">Dashboard</h3><hr>
    <div class="row justify-content-center">
        <div class="col-3">
            <div class="card bg-dark text-light">
                <div class="card-header text-center">Tree Removals This Month</div>
                    <div class="card-body text-center text-light">
                        <p class="card-text display-1">12</p>
                    </div>
            </div>
        </div>
        <div class="col-3">
        <div class="card bg-dark text-light">
            <div class="card-header text-center">Tree Removals This Month</div>
            <div class="card-body text-center text-light">
                <p class="card-text display-1">5</p>
            </div>
        </div>
        </div>
    </div>
    <hr>
    <div class="row border-secondary rounded-lg ml-3">
      <h5 class="p-3">Pending Requests</h5>
      <table class="table table-dark table-striped mr-4">
        <thead>
        <tr>
            <th>Category</th>
            <th>Date Submitted</th>
            <th>User</th>
            <th>Check</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td>Tree Removal</td>
            <td>2020/12/12</td>
            <td>Saman Perera</td>
            <td><a href="#" class="text-muted">Go to request</a></td>
        </tr>
        <tr>
            <td>Development Project</td>
            <td>2020/11/14</td>
            <td>Asel Perera</td>
            <td><a href="#" class="text-muted">Go to request</a></td>
        </tr>
        <tr>
            <td>Tree Removal</td>
            <td>2020/10/5</td>
            <td>Sharuka Perera</td>
            <td><a href="#" class="text-muted">Go to request</a></td>
        </tr>
        <tr>
            <td>Environment Restoration</td>
            <td>2020/10/4</td>
            <td>Sharuka Perera</td>
            <td><a href="#" class="text-muted">Go to request</a></td>
        </tr>
        </tbody>
    </table>
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
<div class="d-flex bg-light justify-content-center">
  <h5 class="text-secondary"><i class="far fa-copyright"></i> 2020 by Reforest Sri Lanka</h5><br>
</div>
<div class="d-flex bg-light justify-content-center">
  <h6>All rights reserved</h6>
</div>

</body>
</html>