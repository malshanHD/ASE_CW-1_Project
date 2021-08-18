<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seller Profile</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <style>
    hr {
      border-top: 2px solid orange;
    }
    .checked {
    color: orange;
    }

    
  </style>

</head>
<body>
 <!-- nav start-->
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
        <a class="nav-link" href="#">Dashboard</a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="/adminReg">New Admin</a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="#">Account</a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="#"> Reports <span class="text-danger">{{$report}}</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="#">Logout</a>
      </li>
    </ul>
  </div>
</nav>
<!-- nav end-->


@foreach($info as $data)
<div class="container-fluid">
    <div class="row ">
        <div class="col-12">
        
        <div class="card mt-4" style="width: 100%; ">
            <div class="card-body text-center">
                
                <img src="{{asset('/seller_images/'.$data->profilePicture)}}" style=" height:100%;" alt="">

            </div>
        </div>
        
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-12">
        <div class="card mt-2 border-dark" style="width:100%; background: rgb(241,241,241);">
                <h5 class="card-title ml-2 mr-2 mt-3 text-dark">{{$data->comapnyname}}</h5>
                
                <p class="card-text ml-2 mr-2 text-dark">{{$data->description}}</p>
                <p class="card-text ml-2 mr-2 text-dark">Feedback Ratings <i class="fa fa-commenting" aria-hidden="true"></i></p>

                
                <h5 class="card-text ml-2 mr-2 text-dark">
                @for ($i=1; $i<=$avgStar; $i++)	
                    <span class="fa fa-star checked"></span>
                @endfor
                </h5>
                
                <p class="text-center"><a class=" btn btn-danger btn-block text-light font-weight-bold" href="/blcokUser/{{$data->username}}">Block Seller <i class="fa fa-ban" aria-hidden="true"></i></a></p>
                
            </div>
            <div class="container">
                <div class="row">
                    <div class="col mt-3">
                    <label><b>Give your Ratings <i class="fa fa-star" aria-hidden="true"></i></b></label> 
                    <p>
                   

                        <a href="/rate/1/{{ Auth::user()->name }}/{{$data->username}}"><span class="fa fa-star"></span></a>
                        <a href="/rate/2/{{ Auth::user()->name }}/{{$data->username}}"><span class="fa fa-star"></span></a>
                        <a href="/rate/3/{{ Auth::user()->name }}/{{$data->username}}"><span class="fa fa-star"></span></a>
                        <a href="/rate/4/{{ Auth::user()->name }}/{{$data->username}}"><span class="fa fa-star"></span></a>
                        <a href="/rate/5/{{ Auth::user()->name }}/{{$data->username}}"><span class="fa fa-star"></span></a>
                
                    </p>
                    </div>
                    </div>
                </div>
            </div>
        
            <div class="container">
                <div class="row">
                    <div class="col mt-4">
                    <label><b>Feedback</b></label>
                              <textarea name="" id="" class="form-control" rows="5"></textarea>
                    </div>
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col">
                        <button type="submit" class="btn btn-primary mt-3 mr-4"> {{ __('Add Comment') }}
                    </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </div>
</div>

@endforeach 

@include('include.footer')

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
</body>
</html>