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
            <h4>Winner</h4>
        </div>
    </div>
</div>
<div class="container">
    <div class="row  justify-content-center " >
    @foreach($datas as $data)
        <div class="col-6 mt-2">
            <div class="card" style="width:100%;">
                <div class="card-body">
                    <img src="{{asset('AddItemsImages/'.$data->mainImage)}}" style="width:100%" alt="">
                </div>
            </div>
        </div>
        <div class="col-6 mt-2 align-self-center">
            
        <div class="card" style="width: 100%; height:100%; background: rgb(241,241,241)">
            <div class="card-body">
                <h5 class="card-title text-center">{{$data->itemName}}</h5>
    
                    @foreach($winner as $winner)
                    <h4 class="text-center">Bid Winner</h4> <hr>
                    <h3 class="text-center"><span class="font-weight-bold text-success">{{$winner->buyerUsername}}</span> </h3>
                    <hr>
            </div>
        </div>
    </div>
    @endforeach
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
          
     @endforeach
        </div>
    </div>
</div>
@endforeach
@include('include.footer')

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
</body>
</html>



