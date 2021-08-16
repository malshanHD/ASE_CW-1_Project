<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buyer Profile</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <style>
    hr {
      border-top: 2px solid orange;
    }
  

    
  </style>

</head>
<body>
@include('include.BuyerNavBar')
<form class="md-form form-sm mt-0 text-center" action="" method="get">
            {{csrf_field()}}
      <div class="container mt-3">
        <div class="row justify-content-center"        >
        
            <div class="col-md-8">        
                <div class="input-group">        
                    <input type="search" class="form-control rounded input-lg" name="Search" placeholder="Search" aria-label="Search" aria-describedby="search-addon" />
                    <button type="submit" class="btn btn-warning"><i class="fa fa-search"></i></button>
                </div>        
            </div> 
                    
        </div>        
      </div>      
</form>
</head>
<body>
<div class="container-fluid">
    <div class="row ">
        <div class="col-12">
        <div class="card mt-4" style="width: 100%; ">
            <div class="card-body">
                <img src="itemimage/banner.PNG " style="width:100%; height:175px;" alt="">
            </div>
        </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-12">
        <div class="card mt-2 border-dark" style="width:100%; background: rgb(241,241,241);">

                <h5 class="card-title ml-2 mr-2 mt-3 text-dark"><i class="fa fa-user-circle-o" aria-hidden="true"></i> Buyer Image</h5>
                
                    <div class="text ml-2 mr-2 mt-3 float-left">
                    <img src="itemimage/user.jpg" class="rounded " alt="...">
                    
                    </div>
                                    
  
            
              <h5 class="card-title ml-2 mr-2 mt-3 text-dark"></h5>
            <p class="text-center"><a class="text-danger font-weight-bold" href="#">Report this buyer<i class="fa fa-ban" aria-hidden="true"></i></a></p>


            </div> 
          </div>
        </div>


                
             </div>
            
          </div>
        </div>
    </div>
</div>
<div class="container">
                <div class="row">
                    <div class="col mt-3">
                    <label><b>Bid Items </b></label> 
                    </div>
                    </div>
                </div>
            </div>
<div class="container">
  <div class="row">
    <div class="col-3 mt-3">
    <div class="card" style="width: 100%; background: rgb(241,241,241);">
            <div class="card-body">
                <h5 class="card-title"></h5>
                
                <p class="card-text"></p>
                
            </div>
        </div>
        
    </div>
    <div class="col-3 mt-3">
    <div class="card" style="width: 100%; background: rgb(241,241,241);">
            <div class="card-body">
                <h5 class="card-title"></h5>
                
                <p class="card-text"></p>
                
            </div>
        </div>
        
    </div>
    <div class="col-3 mt-3">
    <div class="card" style="width: 100%; background: rgb(241,241,241);">
            <div class="card-body">
                <h5 class="card-title"></h5>
                
                <p class="card-text"></p>
                
            </div>
        </div>
        
    </div>
    <div class="col-3 mt-3">
    <div class="card" style="width: 100%; background: rgb(241,241,241);">
            <div class="card-body">
                <h5 class="card-title"></h5>
                
                <p class="card-text"></p>
                
            </div>
        </div>
        
    </div>
  </div>
</div>
<div class="container">
                <div class="row">
                    <div class="col mt-3">
                    <label><b>Winning Items </b></label> 
                    </div>
                    </div>
                </div>
            </div>
            <div class="container">
  <div class="row">
    <div class="col-3 mt-3">
    <div class="card" style="width: 100%; background: rgb(241,241,241);">
            <div class="card-body">
                <h5 class="card-title"></h5>
                
                <p class="card-text"></p>
                
            </div>
        </div>
        
    </div>
    <div class="col-3 mt-3">
    <div class="card" style="width: 100%; background: rgb(241,241,241);">
            <div class="card-body">
                <h5 class="card-title"></h5>
                
                <p class="card-text"></p>
                
            </div>
        </div>
        
    </div>
    <div class="col-3 mt-3">
    <div class="card" style="width: 100%; background: rgb(241,241,241);">
            <div class="card-body">
                <h5 class="card-title"></h5>
                
                <p class="card-text"></p>
                
            </div>
        </div>
        
    </div>
    <div class="col-3 mt-3">
    <div class="card" style="width: 100%; background: rgb(241,241,241);">
            <div class="card-body">
                <h5 class="card-title"></h5>
                
                <p class="card-text"></p>
                
            </div>
        </div>
        
    </div>
  </div>
</div>



@include('include.footer')

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
</body>
</html>