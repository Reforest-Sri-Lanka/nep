<!DOCTYPE html>
<html lang="en">

<head>

  <title>NEP - Beta</title>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="shortcut icon" href="https://neplk.com/Logo.jpeg" type="image/x-icon"> 

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,700,900|Ubuntu:400,700" rel="stylesheet">

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="../resources/css/styles.css">


  <!-- Font Awsome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">

  <!--greensock lib -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/2.1.2/TweenMax.min.js"></script>
    
   <style>
    html {
    scroll-behavior: smooth;
    overflow-x: hidden;
  }
      body {
      font-family: 'Product Sans', sans-serif;
      text-align: center;
      scroll-behavior: smooth;
 
  }
  h1, h2, h3 {
      font-family: 'Product Sans', sans-serif;
      font-weight: bold;
  }
  h3 {
      font-size: 1.5rem;
  }
  #title .container-fluid {
      padding: 3% 15% 7%;
      text-align: left;
      height: 100vh;
  }
  /* Headings */
  .big-heading {
      font-size: 3.5rem;
      font-weight: 900;
      line-height: 1.5;
  }
  .container-fluid {
      padding: 4% 15%;
  }
  .container-fluids {
      padding: 0% 15%;
  }
  /* Sections */
  .colored-section {
      background-color: #00b894;
      height: 768px;
      color: #fff;
  }
  .white-section {
      background-color: #fff;
  }
  /* navigation Bar */
  .navbar {
      padding: 0 0 4.5rem;
  }
  .navbar-brand {
      font-family: 'Product Sans', sans-serif;
      font-size: 1.5rem;
      font-weight: none;
  }
  .nav-item {
      padding: 0 18px;
  }
  .nav-link {
      font-size: 1.2rem;
      font-weight: 300;
  }
  /* Download Buttons */
  .download-button {
      margin: 5% 3% 5% 0;
    
  }
  /* Title Section */
  #title .container-fluid {
      padding: 3% 15% 7%;
      text-align: left;
  }
  /* Title image */
  .title-image {
      right: 30%;
      /* transform: rotate(25deg); */
      width: 80%;
  }

  #links {
      padding: 2% 0% 2% 0%;
  }
  .card-title{
    font-size: 1.3rem;
    font-weight: bold;
  }
  .card-title_text{
    color: #8f8f8f;
  }


  #features {
      padding: 2% 0% 0% 0%;
      margin: auto;
      width: 100%;
      height:100%;
  }

  .feature-title {
      font-size: 1.5rem;
  }
 .feature-box {
      padding: 4%;
      text-align: center;
  }
  .feature-box2 {
      padding: 4%;
      text-align: center;
  }
  .feature-box p {
      color: #8f8f8f;
  }
  .icon {
      color: #00b894;
      margin-bottom: 1rem;
  }
  .icon:hover {
      color: #00b456;
  }
  /* Testimonials Section */
  #testimonials {
    padding: 7% 15%;
    background-color: #ef8172;
    text-align: center;
  }
  .testimonial-text {
      font-size: 3.5rem;
      line-height: 1.5;
  }
  .testimonial-image {
      border-radius: 100%;
      margin: 20px;
      width: 10%;
  }
  /* Press Section */
  #press {
      background-color: #ef8172;
      padding-bottom: 3%;
  }
  .press-logo {
      margin: 20px 20px 50px;
      width: 15%;
  }
  /* Pricing Section */
  #pricing {
      padding: 100px;
  }
  .price-text {
      font-size: 3rem;
      line-height: 1.6;
  }
  .section-heading {
      font-size: 3.5rem;
      line-height: 1.5;
  }
  .pricing-column {
      padding: 3% 2%;
  }
  /* cta */
  #cta{
    background-color: #00b894;
    color: #fff;
    padding: 7% 15%;
    text-align: center;
  }
  .cta-heading{
    font-family: 'Product Sans';
    font-size: 3.5rem;
    line-height: 1.5;
  }
  /* Footer */
  #footer {
      font-family: 'Product Sans', sans-serif;
  }
  .social-icon {
      margin: 20px 10px;
  }
  @media (max-width: 1028px) {
    #title{
      text-align: center;
    }
    .title-image{
      position: static;
      transform: rotate(0);
      width : 40%;
    }
  }

  @media (max-width: 785px) {
    #title{
      text-align: center;
    }
    .title-image{
      position: static;
      transform: rotate(0);
      width : 40%;
    }
  }

  @media (max-width: 500px) {
    #title{
      text-align: center;
    }
    .title-image{
      visibility: hidden;
    }
  }

  /**scroll bar*/
  /* width */
  ::-webkit-scrollbar {
    width: 10px;
  }

  /* Track */
  ::-webkit-scrollbar-track {
    box-shadow: inset 0 0 5px grey; 
    border-radius: 0px;
  }
  
  /* Handle */
  ::-webkit-scrollbar-thumb {
    background: gray; 
    border-radius: 0px;
  }

  /* Handle on hover */
  ::-webkit-scrollbar-thumb:hover {
    background: #515151; 
  }

  /*animations*/
  .product-img {
    transform: translate(-50%, -40%);
    animation: fly 4s ease-in-out infinite;
  }
  @keyframes fly {
    0% {
      transform: translate(-50%, -46%);
    }
    50% {
      transform: translate(-50%, -54%);
    }
    100% {
      transform: translate(-50%, -46%);
    }
  }
  </style>
 

</head>

    <section class="colored-section" id="title">

    <div class="container-fluid mh-100">
      <nav class="navbar navbar-expand-lg navbar-dark ">
        <a class="navbar-brand" href="#">Nep - Beta </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link" href="#">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('crime') }}">Report</a>
            </li>
            @guest
            <li class="nav-item">
              <a class="nav-link" href="{{ route('login') }}">
                 Sign In
              </a>
            </li>
            @if (Route::has('register'))
            <li class="nav-item">
              <a class="nav-link" href="{{ route('register') }}">Register</a>
            </li>
          </ul>
        </div>

      </nav>


      <!-- Title -->
      <div class="row">
       
        <div class="col-lg-6"> <br> <br>
          <h1 class="big-heading product-title">The National Environment Platform (NEP)</h1>

          <a href="#features">
          <button type="button" class="btn btn-dark btn-lg download-button product-title"><i class="fab fa-leanpub"></i>&nbsp &nbspLearn More</button>
          </a>

          <a href="#links">
          <button type="button" class="btn btn-outline-light btn-lg download-button product-title"><i class="fa fa-link"></i>&nbsp &nbspQuick Links</button>
          </a>
    
        </div>
        <div class="col-lg-6 col-md-2">
          <img class="title-image product-title" src="/images/header-image.png" alt="Header Image Goes here">
        </div>
      </div>


    </div>
    </section>

<body class="antialiased main">


  <!-- hero start -->
  <div class="row">
    
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
  
      <!-- Features -->

  <section  id="features">
    <div class="container-fluid">
    <h2 class="price-text block">What is the National Environment Platform (NEP)?</h2>
    <p class="block">A government cloud aimed for sustainable management of envrionmental resources of Sri Lanka. It automates</p>

      <div class="row">
        <div class="feature-box col-lg-4 col-md-6 block" data-move-y="200px" data-move-x="-200px">
          <i class="icon fa fa-tree fa-4x"></i>
          <h3 class="feature-title">Tree removal<br> process</h3>
          <p>Trees are removed at different locations under different authorities. Effective management shoud be aware of the loss of trees, why they are removed, which species are removed etc. better manage and monitor green cover.</p>
        </div>

        <div class="feature-box col-lg-4 col-md-6 block" data-move-y="200px" data-move-x="000px">
          <i class="icon fa fa-leaf fa-4x"></i>
          <h3 class="feature-title">Ecosystem restoration activities</h3>
          <p>Reforestation, Coral restoration, mangrove planting, Garbage clean ups etc. can be geographically added with the ability to log progress of sites for better monitoring and evaluation. Scientefic data analysis is a long term objective.</p>
        </div>

        <div class="feature-box col-lg-4 block" data-move-y="200px" data-move-x="200px">
          <i class="icon fa fa-building fa-4x"></i>
          <h3 class="feature-title">Development project site approvals</h3>
          <p>Add relevant development projects and log its life cycle. Better understand where protected areas exist via GIS mapping and connect gazette notifications for transparent open governance.</p>
        </div>

      </div>

    
    </div>
  </section>

  <!-- Quick Links -->

  <section id="links">
    <div class="container-fluids">
    <h2 class="price-text block">Quick Links</h2>
    <div class="row">

    <div class="feature-box2 col-lg-4 col-md-6">
      <div class="card block" data-move-y="200px" data-move-x="-200px">
          <img src="https://pcrtreeservice.com/wp-content/uploads/tree-trimming.jpg" style="height:180px;" class="card-img-top" alt="Tree Removals">
          <div class="card-body">
            <h5 class="card-title">Tree Removals</h5>
            <p class="card-title_text">If any project, maintainance, road development, housing project etc. require trees to be removed, please enter their details.</p>
              @if(auth()->user())
                @if(auth()->user()->role_id)
                <a href="{{ route('treeremoval') }}">Submit a Tree Removal Form</a>
                @endif
                @else
                <a href="{{ route('login') }}">Submit a Tree Removal Form</a>
                @endif
          </div>
        </div>
      </div>

      <div class="feature-box2 col-lg-4 col-md-6">
        <div class="card block" data-move-y="200px" data-move-x="000px">
          <img src="https://firebasestorage.googleapis.com/v0/b/projectone-fc395.appspot.com/o/Development%20Projects.jpeg?alt=media&token=78d18a83-a735-4bef-964e-2446694974ac" style="height:180px;" class="card-img-top" alt="Development Projects">
          <div class="card-body">
            <h5 class="card-title">Development Projects</h5>
            <p class="card-title_text">Add details of development projects such as markets, land sales, housing, roads, public infrastructure, ports</p>
            @if(auth()->user())
                @if(auth()->user()->role_id)
                <a href="{{ route('manage-development-projects') }}" >Submit a Development Request</a>
                @endif
                @else
                <a href="{{ route('login') }}" >Submit a Development Request</a>
                @endif
          </div>
        </div>
      </div>

      <div class="feature-box2 col-lg-4 col-md-6">
        <div class="card block" data-move-y="200px" data-move-x="200px">
          <img src="https://firebasestorage.googleapis.com/v0/b/projectone-fc395.appspot.com/o/Restorations.jpeg?alt=media&token=8647acb3-ac24-4f62-99b5-3e555e7aff41"  style="height:180px;" class="card-img-top" alt="Restorations">
          <div class="card-body">
            <h5 class="card-title">Restorations</h5>
            <p class="card-title_text">Add details of any environment restoration projects such as tree planting, mangrove planting, sea grass or coral restoration.</p>
            @if(auth()->user())
                @if(auth()->user()->role_id)
                <a href="{{ route('manage-environment-restorations') }}">Submit a Restoration Request</a>
                @endif
                @else
                <a href="{{ route('login') }}" >Submit a Restoration Request</a>
                @endif
          </div>
        </div>
      </div>

      <div class="feature-box2 col-lg-4 col-md-6">
        <div class="card block" data-move-y="200px" data-move-x="-200px">
          <img src="https://www.iucn.org/sites/dev/files/styles/850x500_no_menu_article/public/content/images/2018/6_.jpg?itok=kT7mWzRH" style="height:180px;" class="card-img-top" alt="Crime Report">
          <div class="card-body">
            <h5 class="card-title">Crime Report</h5>
            <p class="card-title_text">Add details of environmental crimes, poaching, trapping, dead animals, tree felling and others.</p>
            @if(auth()->user())
                @if(auth()->user()->role_id)
                <a href="{{ route('crime') }}">Make a Complaint</a>
                @endif
                @else
                <a href="{{ route('crime') }}">Make an Anonymous Complaint</a>
                @endif
          </div>
        </div>
      </div>

      <div class="feature-box2 col-lg-4 col-md-6">
        <div class="card block" data-move-y="200px" data-move-x="000px">
          <img src="https://ak.picdn.net/shutterstock/videos/17330839/thumb/1.jpg" style="height:180px;" class="card-img-top" alt="Track Complaint">
          <div class="card-body">
            <h5 class="card-title">Track Complaint</h5>
            <p class="card-title_text">Track the progress of any anonymous complaints logged using the reference ID given</p>
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
                @if($errors->any())
                  <h6>{{$errors->first()}}</h6>
                @endif
          </div>
        </div>
      </div>
    </div>
  </div>
  </section>
  <!-- End testing -->


  </div>

    <!-- Call to Action -->

    <section id="cta" >
    <h3 class="cta-heading block">The platform was made under guidance of the Ministry of Environment by volunteers. It has not been officially adopted yet and is up for beta testing.</h3><br><br>
    <p class="block">In addition NEP has a species database, ecosystems database and a module to manage system admin tasks.</p>
    </section>

   <!-- Footer -->

   <footer class="white-section" id="footer">
    <div class="container-fluid">
      <a href="https://www.facebook.com/reforestsrilanka/" target="_blank"><i class="fab fa-facebook-f social-icon"></i></a>
      <a href="https://www.linkedin.com/company/reforest-sri-lanka/" target="_blank"><i class="fab fa-linkedin social-icon"></i><a>
      <a href="https://www.instagram.com/reforest_srilanka/?hl=en" target="_blank"><i class="fab fa-instagram social-icon"></i></a>
      <a href="mailto:info@reforestsrilanka.com" target="_blank"><i class="fas fa-envelope social-icon"></i></a>
      <p>© 2021 by RFSL - for Ministry of Environment - All rights reserved</p>
      <small>Not officially launched <small>
    </div>
  </footer>

  <!--chart js -->
  <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
  <script src="../resources/js/jquery.smoove.js"></script>
  <script src="{{ url('/vendor/chart.js/dist/Chart.min.js') }}"></script>
  <script src="{{ url('/vendor/chart.js/dist/Chart.extension.js') }}"></script>
  <script src="{{ url('/vendor/welcomepage-charts.js' ) }}"></script>
    
  <script>
      $('.block').smoove({offset: '40%'});
  </script>

  <script type="text/javascript">
          TweenMax.from(".product-img", 3, {
            delay: 2,
            opacity: 0,
            y: 80,
            ease: Expo.easeInOut
          });
          TweenMax.from(".product-title", 3, {
            delay: 0.2,
            opacity: 0,
            y: 50,
            ease: Expo.easeInOut
          });
          TweenMax.from(".product-subtitle", 3, {
            delay: 0.4,
            opacity: 0,
            y: 50,
            ease: Expo.easeInOut
          });
  </script>

</body>

</html>
