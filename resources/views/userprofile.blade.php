<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

    <style>
        body{
                margin-top:20px;
                color: #1a202c;
                text-align: left;
                background-color: #e2e8f0;    
            }
            .main-body {
                padding: 15px;
            }
            .card {
                box-shadow: 0 1px 3px 0 rgba(0,0,0,.1), 0 1px 2px 0 rgba(0,0,0,.06);
            }

            .card {
                position: relative;
                display: flex;
                flex-direction: column;
                min-width: 0;
                word-wrap: break-word;
                background-color: #fff;
                background-clip: border-box;
                border: 0 solid rgba(0,0,0,.125);
                border-radius: .25rem;
            }

            .card-body {
                flex: 1 1 auto;
                min-height: 1px;
                padding: 1rem;
            }

            .gutters-sm {
                margin-right: -8px;
                margin-left: -8px;
            }

            .gutters-sm>.col, .gutters-sm>[class*=col-] {
                padding-right: 8px;
                padding-left: 8px;
            }
            .mb-3, .my-3 {
                margin-bottom: 1rem!important;
            }

            .bg-gray-300 {
                background-color: #e2e8f0;
            }
            .h-100 {
                height: 100%!important;
            }
            .shadow-none {
                box-shadow: none!important;
            }
    </style>
</head>
<body>
@include('include.BuyerNavBar')
@foreach($info as $data)
@if(!$data->registrationPayment)
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-8">
                    <div class="card">
                        <div class="card-header bg-danger text-center text-light">
                            <h5>You should pay Registration Fees</h5>
                        </div>
                        <div class="card-body">
                            <form method="post" action="https://sandbox.payhere.lk/pay/checkout">   
                                <input type="hidden" name="merchant_id" value="1218301">    <!-- Replace your Merchant ID -->
                                <input type="hidden" name="return_url" value="http://127.0.0.1:8000/sucess/{{ Auth::user()->name }}">
                                <input type="hidden" name="cancel_url" value="http://127.0.0.1:8000/fail">
                                <input type="hidden" name="notify_url" value="http://127.0.0.1:8000/sucess">  
                               
                                <input type="hidden" name="order_id" value="ItemNo12345">
                                <input type="hidden" name="items" value="Registration Payment"><br>
                                <input type="hidden" name="currency" value="LKR">
                                <input type="hidden" name="recurrence" value="1 Month">
                                <input type="hidden" name="duration" value="Forever">
                                <input type="hidden" name="amount" value="250">  

                                <h5 class="text-center font-weight-bold">LKR 250.00/=</h5>
                               
                                <input type="hidden" name="first_name" value="{{$data->firstname}}">
                                <input type="hidden" name="last_name" value="{{$data->lastname}}"><br>
                                <input type="hidden" name="email" value="{{$data->email}}">
                                <input type="hidden" name="phone" value="{{$data->phnNumber}}"><br>
                                <input type="hidden" name="address" value="{{$data->streetadd01}}">
                                <input type="hidden" name="city" value="{{$data->city}}">
                                <input type="hidden" name="country" value="{{$data->country}}"><br><br> 
                                <input type="submit" value="Pay" class="font-italic btn btn-warning text-light btn-lg btn-block">  
                            </form> 
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @else
<div class="container">
    <div class="main-body">
    
          <!-- Breadcrumb -->
          <nav aria-label="breadcrumb" class="main-breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="/">Home</a></li>
              <li class="breadcrumb-item"><a href="javascript:void(0)">User</a></li>
              <li class="breadcrumb-item active" aria-current="page">User Profile</li>
            </ol>
          </nav>
          <!-- /Breadcrumb -->
          
          <div class="row gutters-sm">
            <div class="col-md-4 mb-3">
              <div class="card">
                <div class="card-body">
                  <div class="d-flex flex-column align-items-center text-center">
                    <img src="{{asset('/buyer_images/'.$data->profilePicture)}}" alt="Admin" class="rounded-circle" width="150">
                    <div class="mt-3">
                      <h4>{{$data->firstname}} {{$data->lastname}}</h4>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card mt-3">
                <ul class="list-group list-group-flush">
                  <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                    <h6 class="mb-0"> Country</h6>
                    <span class="text-secondary">{{$data->country}}</span>
                  </li>
                  <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                    <h6 class="mb-0"> Street Addres 1</h6>
                    <span class="text-secondary">{{$data->streetadd01}}</span>
                  </li>
                  <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                    <h6 class="mb-0">Street Addres 2</h6>                    
                    <span class="text-secondary">{{$data->streetadd02}}</span>
                  </li>
                  <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                    <h6 class="mb-0"> City</h6>                    
                    <span class="text-secondary">{{$data->city}}</span>
                  </li>
                  <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                    <h6 class="mb-0"> Province</h6>                    
                    <span class="text-secondary">{{$data->province}}</span>
                  </li>
                  <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                    <h6 class="mb-0"> Zip Code</h6>                    
                    <span class="text-secondary">{{$data->zipcode}}</span>
                  </li>
                </ul>
              </div>
            </div>
            <div class="col-md-8">
              <div class="card mb-3">
                <div class="card-body">
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Full Name</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                    {{$data->firstname}} {{$data->lastname}}
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Email</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                    {{$data->email}}
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Phone</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                    {{$data->phnNumber}}
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Date of birthday</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                    {{$data->dob}}
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Gender</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                    {{$data->gender}}
                    </div>
                  </div>
                  <hr>
                </div>
              </div>

              <div class="row gutters-sm">
                <div class="col-sm-12 mb-3">
                  <div class="card h-100">
                    <div class="card-body">
                      <h6 class="d-flex align-items-center mb-3"><i class="material-icons text-info mr-2">Items</i>Bid History</h6>
                      <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                        <h6 class="mb-0">Winning Bid</h6>                    
                        <h6 class="text-secondary">{{$winItemCount}}</h6>
                      </li>

                      <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                        <h6 class="mb-0">Bid times</h6>                    
                        <h6 class="text-secondary">{{$bidCount}}</h6>
                      </li>

                      <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                        <h6 class="mb-0">Unsettle Payment</h6>            
                        <h6 class="text-secondary">{{$unpaidCount}}</h6>
                      </li>
                    
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
            <div class="col-sm-12">
                <div class="card">
                  <div class="card-body">
                      <h6 class="d-flex align-items-center mb-3"><i class="material-icons text-info mr-2">Items</i>unsettle Payment</h6>
                      
                  </div>
                </div>
            </div>
      </div>
      <div class="row">
      @foreach($unpaid as $unpaidItem)
        <form action="/bidwinPay" method="post">
        {{csrf_field()}}
            <div class="col-6 mt-3">
                <div class="">
                    <div class="card" style="width: 100%; background: rgb(241,241,241);">
                        <div class="card-header card-title">{{$unpaidItem->itemName}}</div>
                        <div class="card-body">
                            
                        <img class="card-img-top" src="{{asset('AddItemsImages/'.$unpaidItem->mainImage)}}" style="width:100%; height:100%;" alt="Card image cap"> 
                            <div class="card-footer">

                                <input type="hidden" value="{{$unpaidItem->itemCode}}" name="itemCode">
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

    <div class="container mt-5">
      <div class="row">
            <div class="col-sm-12 ">
                <div class="card">
                  <div class="card-body">
                      <h6 class="d-flex align-items-center"><i class="material-icons text-info mr-2">Items</i>Bid products</h6>
                      
                  </div>
                </div>
            </div>
      </div>
      <div class="row">
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

    <div class="container mt-5">
      <div class="row">
            <div class="col-sm-12 ">
                <div class="card">
                  <div class="card-body bg-success">
                      <h6 class="d-flex align-items-center text-light"><i class="material-icons text-light mr-2">Items</i>Winning</h6>
                      
                  </div>
                </div>
            </div>
      </div>
      <div class="row">
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
    @endif
    @endforeach
    @include('include.footer')

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>

</body>
</html>