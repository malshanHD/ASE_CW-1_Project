<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buy item</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
</head>

<style>
    .checked {
    color: orange;
    }
</style>

<body>
@include('include.BuyerNavBar')

<form class="md-form form-sm mt-0 text-center" action="" method="get">
            {{csrf_field()}}
      <div class="container mt-3">
        <div class="row justify-content-center">
            <div class="col-md-8">        
                <div class="input-group">        
                    <input type="search" class="form-control rounded" name="Search" placeholder="Search" aria-label="Search" aria-describedby="search-addon" />
                    <button type="submit" class="btn btn-warning"><i class="fa fa-search"></i></button>
                </div>        
            </div>         
        </div>        
      </div>      
</form>
<div class="container">
    <div class="row">
        <div class="col mt-5">
            <h4>Buy Items</h4>
        </div>
    </div>
</div>
<div class="container">
    <div class="row  justify-content-center" >
    @foreach($datas as $data)
        <div class="col-6 mt-2">
            <div class="card" style="width:100%;">
                <div class="card-body">
                    <img src="{{asset('AddItemsImages/'.$data->mainImage)}}" style="width:100%" alt="">
                </div>
            </div>
        </div>
        <div class="col-6 mt-2 ">
            
        <div class="card" style="width: 100%; height:100%; background: rgb(241,241,241)">
            <div class="card-body">
                <h5 class="card-title">{{$data->itemName}}</h5>
                <form method="post" action="https://sandbox.payhere.lk/pay/checkout"> 

                    <input type="hidden" name="merchant_id" value="1218301">   
                    <input type="hidden" name="return_url" value="http://meleven.ml/">
                    <input type="hidden" name="cancel_url" value="http://sample.com/cancel">
                    <input type="hidden" name="notify_url" value="localhost:8000/payment">  

                    <input type="hidden" name="order_id" value="Registration">
                    <input type="hidden" name="items" value="{{$data->itemName}}">
                    <input type="hidden" name="currency" value="LKR">

                    <p>BID Starting Price : LKR {{$data->itemPrice}} </p>
                    <input type="hidden" name="bidStart" value="{{$data->itemPrice}}" id="bidStart">
                    <input type="hidden" name="bdPer" id="bdPer" value="20">
                    <input type="hidden" name="amount" id="total">



                    <p>Current Bid Price : LKR 50 </p>
                    <input type="text" name="bidding" class="border border-primary" id="bidding" onchange="getPrice()">
                    <p>Enter LKR 51 or more</p>

                    @foreach($sellerInfo as $seller)
                    @if($seller->status)
                    <input type="submit" value="Buy Now">
                    @else 
                    <input type="submit" value="Buy Now" disabled>
                    @endif
                    @endforeach
                    <input type="hidden" name="first_name" value="Saman">
                    <input type="hidden" name="last_name" value="Perera"><br>
                    <input type="hidden" name="email" value="samanp@gmail.com">
                    <input type="hidden" name="phone" value="0771234567"><br>
                    <input type="hidden" name="address" value="No.1, Galle Road">
                    <input type="hidden" name="city" value="Colombo">
                    <input type="hidden" name="country" value="Sri Lanka">

                    
                    </form>

                <p><b>Shipping:</b> Free Shiping </p>
                <p><b>Delivery:</b> Estimated between Thu. Sep. 2 and Mon. Sep. 13 </p>
                <p><b>Payements:</b> Free Shiping </p>
                <p><b>Returns:</b> 30 day returns. Buyer pays for return shipping </p>
                
            </div>

            @foreach($sellerInfo as $seller)
            @if($seller->status)
            <div class="card" >
            <div class="card-body text-center">
                <h5><a class="text-dark" href="/sallerprofile/{{$data->seller}}">{{$data->seller}}</a></h5>
        
            </div>
            </div>
            @else
            <div class="card bg-danger" >
            <div class="card-body text-center">
                <h5><a class="text-light" href="/sallerprofile/{{$data->seller}}">{{$data->seller}}</a></h5>  
                <p class="text-light">Warning : This seller under Ban</p>             
            </div>
            </div>
            @endif
            @endforeach

            <p class="text-center"><a class="text-danger font-weight-bold" href="#">Report this seller <i class="fa fa-ban" aria-hidden="true"></i></a></p>

            <hr>



        </div>
        </div>
    @endforeach
    </div>
    <div class="row">
        <div class="col-6">

        <div class="row justify-content-center mt-2">
        
        @foreach($images as $img)
            <div class="col-3">
                <img src="{{ url('storage/avatars/'.basename($img->image)) }}" class="img-fluid" style="width:100%; height:100%;" alt="Avatar">
            </div>
        @endforeach
        </div>

        </div>
    
    </div>
</div>
<div class="container mt-4" >
    <div class="row justify-content-center">
    @foreach($datas as $data)
        <div class="col-9" style="background: rgb(241,241,241);">
            <h5 class="mt-2">Product Specification of the {{$data->itemName}}</h5>
            <hr>
            <p>{{$data->itemDescription}}</p>
            <p><b>Warrenty</b> : {{$data->itemWarrenty}} month</p>
            <p><b>Item code</b> : {{$data->itemCode}}</p>
            <p><b>Saller</b> : NuN</p>
            
            <!-- comment section -->
            <h5 class="mt-5">QnA Section</h5>
            <form action="/askQuize" method="post">
            {{csrf_field()}}
                <input type="text" name="email" id="">
                <input type="hidden" name="itemcode" value="{{$data->itemCode}}">
                <textarea name="quize" id="quize" class="form-control" rows="5"></textarea>
                <input type="submit" value="Ask" class="btn btn-warning text-light mt-2">
            </form>
            @endforeach
            @foreach($cmnt as $cmnts)
                <div class="card mt-3">
                    <p class="card-header"><b>{{$cmnts->email}}</b></p>
                    <div class="card-body">
                        <p class="card-text">{{$cmnts->quize}}</p>
                        <form action="/answer" method="post">
                        {{csrf_field()}}
                            <div class="input-group input-group-sm mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="inputGroup-sizing-sm">Reply</span>
                                </div>
                                <input type="hidden" name="mainCmtID" value="{{$cmnts->id}}">
                                <input type="hidden" name="email" value="user@123.com">
                                <input type="text" name="cmntreply" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm">
                            </div>
                            <input type="submit" value="Answer" class="btn btn-primary btn-sm text-light">
                            
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
    
    
        <div class="col-2 ml-2" style="background: rgb(241,241,241);">
            <h5 class="mt-2">Latest Items</h5> <hr>
            @foreach($item as $items)
            <div class="card" style="width: 100%;">
              <div class="card-body">
                <img class="card-img-top" src="{{asset('AddItemsImages/'.$items->mainImage)}}" style="width:100%; height:100%;" alt="Card image cap"> 
                   <p><b><a href="/BuyItem/{{$items->itemCode}}">{{$items->itemName}}</a></b></p>
                   <span>
                      <p>${{$items->itemPrice}}</p>
                   </span>         
              </div>
            </div>
            @endforeach
        </div>
    
    </div>
</div>

@include('include.footer')

<script>
        getPrice = function() {
            var numVal1 = Number(document.getElementById("bidStart").value);
            var numVal2 = Number(document.getElementById("bdPer").value) / 100;
            var totalValue =  (numVal1 * numVal2)
            document.getElementById("total").value = totalValue;
        }
</script>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
</body>
</html>



