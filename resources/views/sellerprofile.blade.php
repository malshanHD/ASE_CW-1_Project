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
                
                <p class="text-center"><a class="text-danger font-weight-bold" href="/ReportSeller/{{$data->username}}">Report this seller <i class="fa fa-ban" aria-hidden="true"></i></a></p>
                
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
                <form action="/sellerFeedback" method="post">
                {{csrf_field()}}
                <input type="hidden" name="sellerName" value="{{$data->username}}">
                <input type="hidden" name="user" value="{{ Auth::user()->name }}">
                    <div class="row">
                        <div class="col mt-4">
                        <label><b>Feedback</b></label>
                                <textarea name="feedback" id="feedback" class="form-control" rows="5"></textarea>
                        </div>
                    </div>
                    <div class="container">
                        <div class="row">
                            <div class="col">
                                <button type="submit" class="btn btn-primary mt-3 mr-4"> {{ __('Add Comment') }}</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            
        </div>
        </div>
    </div>
</div>
<div class="container mt-5">
    <div class="row">
    @foreach($feedbacks as $feedbacks)
        <div class="col-12 mt-4">
            <div class="card">
                <h5 class="card-header">{{$feedbacks->user}} <span><i class="fa fa-thumbs-up text-success" aria-hidden="true"></i> <i class="fa fa-thumbs-down text-danger" aria-hidden="true"></i></span></h5>
                <div class="card-body">
                    <p>{{$feedbacks->Feedback}}</p>
                </div>
                <div class="card-footer text-muted">
                    <p>{{$feedbacks->created_at}}</p>
                </div>
            </div>
        </div>
    @endforeach
    </div>
</div>
<div class="container mt-3" style="background: rgb(241,241,241);">
    <div class="row">
          <div class="col-12 col-md-6 mt-2">
              <h5 class="font-weight-bold">{{$data->comapnyname}} Current Bid running items</h5>
              <hr>
          </div>
    </div>

    <div class="row">
    @foreach($items as $item)
          <div class="col-12 col-md-2 mb-2">
            <div class="card" style="width: 100%;">
              <div class="card-body">
                <img class="card-img-top" src="{{asset('AddItemsImages/'.$item->mainImage)}}" style="width:100%; height:100%;" alt="Card image cap"> 
                   <p><b><a href="/BuyItem/{{$item->itemCode}}/{{$item->seller}}">{{$item->itemName}}</a></b></p>
                   <span>
                      <p>${{$item->itemPrice}}</p>
                   </span>         
              </div>
            </div>
          </div> 
      @endforeach 
    </div>
</div>

<div class="container mt-3" style="background: rgb(241,241,241);">
    <div class="row">
          <div class="col-12 col-md-6 mt-2">
              <h5 class="font-weight-bold">{{$data->comapnyname}} Past Bid Items</h5>
              <hr>
          </div>
    </div>

    <div class="row">
    @foreach($endBid as $item)
          <div class="col-12 col-md-2 mb-2">
            <div class="card" style="width: 100%;">
              <div class="card-body">
                <img class="card-img-top" src="{{asset('AddItemsImages/'.$item->mainImage)}}" style="width:100%; height:100%;" alt="Card image cap"> 
                   <p><b><a href="/bidwinner/{{$item->itemCode}}">{{$item->itemName}}</a></b></p>  
              </div>
            </div>
          </div> 
      @endforeach 
    </div>
</div>

@endforeach 

@include('include.footer')

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
</body>
</html>