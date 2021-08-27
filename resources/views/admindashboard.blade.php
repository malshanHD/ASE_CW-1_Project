<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sales dashboard</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
</head>
<body>
<!-- Start admin nav-bar-->
<nav class="navbar navbar-expand-lg navbar-dark bg-primary" style="background: linear-gradient(90deg, rgba(233,255,4,1) 0%, rgba(1,21,81,1) 0%, rgba(1,21,81,1) 30%, rgba(1,21,81,1) 61%, rgba(1,21,81,1) 100%);">
<a class="navbar-brand" href="/"><img src="SystemImage/logov1.png" style="width: 200px;" alt=""></a>
<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse justify-content-end  font-weight-bold" id="navbarNavDropdown">
    <ul class="navbar-nav">
      <li class="nav-item ">
        <a class="nav-link active" href="/ChangeAdvertiestment">Slide Change</a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="#">Buyer Manage</a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="#">Seller Manage</a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="/Admindashboard">Dashboard</a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="/CategoryAdd">Category Add</a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="/adminReg">New Admin</a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="#">Account</a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="/reportData"> Reports <span class="text-danger">{{$report}}</span></a>
      </li>
      <li class="nav-item dropdown">
       <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
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
    </ul>
  </div>
</nav>
<!-- end admin nav-bar-->


<div class="container">
    <Div class="row">
        <div class="col-4 mt-3">
        
        <div class="card" style="width: 18rem; background-color:#0fd6a5;">
            <div class="card-body">
                <h5 class="card-title">Buyers</h5>
                
                <p class="card-text">1534</p>
                
            </div>
        </div>

        </div>
        <div class="col-4 mt-3">
        
        <div class="card" style="width: 18rem; background-color: #e2ee0b;">
            <div class="card-body">
                <h5 class="card-title">Sellers</h5>
                
                <p class="card-text">125</p>
                
            </div>
        </div>

        </div>
        <div class="col-4 mt-3">
        
        <div class="card" style="width: 18rem; background-color:#f272ed;">
            <div class="card-body">
                <h5 class="card-title">Items Selling Income</h5>
                
                <p class="card-text">LK 300,000</p>
                
            </div>
        </div>

        </div>
        <div class="col-4 mt-3">
        
        <div class="card" style="width: 18rem; background-color:#69ba28;">
            <div class="card-body">
                <h5 class="card-title">Total Income</h5>
                
                <p class="card-text">LK 440,500</p>
                
            </div>
        </div>

        </div>
        <div class="col-4 mt-3">
        
        <div class="card" style="width: 18rem; background-color:#eb3c42;">
            <div class="card-body">
                <h5 class="card-title">Rgistration Income</h5>
                
                <p class="card-text">LK 140,500</p>
                
            </div>
        </div>

        </div>
        <div class="col-4 mt-3">
        
        <div class="card" style="width: 18rem; background-color:#4e3bdb;">
            <div class="card-body">
                <h5 class="card-title">Rating</h5>
                
                <p class="card-text">80%</p>
                
            </div>
        </div>

        </div>
    </Div>
</div>

<!--footer start-->
@include('include.footer')
<!--footer end-->


    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
</body>
</html>