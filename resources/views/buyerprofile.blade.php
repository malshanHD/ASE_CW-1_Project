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

@foreach($info as $data)
<div class="container-fluid">
    <div class="row ">
        <div class="col-12">
        <div class="card mt-4" style="width: 20%; ">
            <div class="card-body">
                <img src="{{asset('/buyer_images/'.$data->profilePicture)}}" style="width:100%; height:175px;" alt="">
            </div>
        </div>
        </div>
    </div>
</div>
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-2 align-self-center">
            <div class="card mt-2 border-dark" style="width:100%; background: rgb(241,241,241);">
                <h5 class="card-title ml-2 mr-2 mt-3 text-dark"><i class="fa fa-user-circle-o text-success" aria-hidden="true"></i> {{$data->firstname}} {{$data->lastname}}</h5>
                <div class="text ml-2 mr-2 mt-3 float-left">
                    <img src="{{asset('/buyer_images/'.$data->profilePicture)}}" style="width:100%;" class="rounded " alt="...">
                </div>
                 <h5 class="card-title ml-2 mr-2 mt-3 text-dark"></h5>
            </div> 
        </div>
        <div class="col-4 align-self-center" style="width:100%; background: rgb(241,241,241);">
            <p class="font-weight-bold mt-2">First Name : <span class="text-primary">{{$data->firstname}}</span></p>
            <p class="font-weight-bold">Last Name : <span class="text-primary">{{$data->lastname}}</span></p>
            <p class="font-weight-bold">Gender : <span class="text-primary">{{$data->gender}}</span></p>
            <p class="font-weight-bold">Email : <span class="text-primary">{{$data->email}}</span></p>
            <p class="font-weight-bold">Date of birthday : <span class="text-primary">{{$data->dob}}</span></p>
            <p class="font-weight-bold">Contact Number : <span class="text-primary">{{$data->phnNumber}}</span></p>
        </div>
        <div class="col-4 align-self-center" style="width:100%; background: rgb(241,241,241);">
            <p class="font-weight-bold mt-2">Country : <span class="text-primary">{{$data->country}}</span></p>
            <p class="font-weight-bold">Street Address 1 : <span class="text-primary">{{$data->streetadd01}}</span></p>
            <p class="font-weight-bold">Street Address 2 : <span class="text-primary">{{$data->streetadd02}}</span></p>
            <p class="font-weight-bold">City : <span class="text-primary">{{$data->city}}</span></p>
            <p class="font-weight-bold">Province : <span class="text-primary">{{$data->province}}</span></p>
            <p class="font-weight-bold">Zip code : <span class="text-primary">{{$data->zipcode}}</span></p>
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
            <label><b>Un-paid Items</b></label> 
        </div>
    </div>
</div>
<div class="container">
    <div class="row row-horizon">
    @foreach($unpaid as $unpaidItem)
        <form action="/bidwinPay" method="post">
        {{csrf_field()}}
            <div class="col-3 mt-3">
                <div class="">
                    <div class="card" style="width: 100%; background: rgb(241,241,241);">
                        <div class="card-header card-title">{{$unpaidItem->itemName}}</div>
                        <div class="card-body">
                            
                        <img class="card-img-top" src="{{asset('AddItemsImages/'.$unpaidItem->mainImage)}}" style="width:100%; height:100%;" alt="Card image cap"> 
                            <div class="card-footer">

                                <input type="hidden" value="{{$unpaidItem->bidAmount}}" name="totalPay">
                                <input type="hidden" value="{{$unpaidItem->deposite}}" name="deposite">
                                <input type="hidden" value="{{$unpaidItem->bidID}}" name="bidID">
                                <input type="hidden" value="{{$unpaidItem->buyerUsername}}" name="bidderName">
                                <input type="hidden" value="{{$unpaidItem->seller}}" name="sellerName">

                                <input type="submit" class="btn btn-block btn-success" value="LKR {{$unpaidItem->bidAmount}}">
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    @endforeach
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col mt-3">
            <label><b>Bid Items </b></label> 
        </div>
    </div>
</div>
<div class="container">
    <div class="row row-horizon">
    @foreach($itemData as $biddingItem)
        <div class="col-3 mt-3">
            <div class="">
                <div class="card" style="width: 100%; background: rgb(241,241,241);">
                    <div class="card-header card-title">{{$biddingItem->itemName}}</div>
                    <div class="card-body">
                        
                    <img class="card-img-top" src="{{asset('AddItemsImages/'.$biddingItem->mainImage)}}" style="width:100%; height:100%;" alt="Card image cap"> 
                        <p class="card-text"></p>
                        
                    </div>
                </div>
            </div>
        </div>
    @endforeach
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col mt-3">
            <label><b>Winning Items </b></label> 
        </div>
    </div>
</div>
<div class="container">
    <div class="row row-horizon">
    @foreach($winItem as $winner)
        <div class="col-3 mt-3">
        <div class="">
                <div class="card" style="width: 100%; background: rgb(241,241,241);">
                    <div class="card-header card-title">{{$winner->itemName}}</div>
                    <div class="card-body">
                        
                    <img class="card-img-top" src="{{asset('AddItemsImages/'.$winner->mainImage)}}" style="width:100%; height:100%;" alt="Card image cap"> 
                        <div class="card-footer">
                        <p class="card-text font-weight-blod text-center">LKR {{$winner->bidAmount}}</p>
                        </div>
                    </div>
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