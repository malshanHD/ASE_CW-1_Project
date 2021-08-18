<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Report This Seller</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
</head>
<body>
@include('include.BuyerNavBar')

<form class="md-form form-sm" action="/sellerReported" method="post">
{{csrf_field()}}
      
      <div class="container-fluid mt-5 ">
            <div class="row justify-content-center">
                <div class="col-4  align-self-center alert alert-primary" role="alert">
                <h5 class="text-center">Report this seller <i class="fa fa-ban" aria-hidden="true"></i></h5>
                <p>We created policies to make sure Sams & Sams is a safe place to buy and sell. If you have a problem with a seller because they’re not following our policies, let us know and we’ll look into it.</p>
                <div class="form-group">
                
                <input type="hidden" value="{{$seller}}" name="seller">
                <input type="hidden" value="{{Auth::user()->name}}" name="authuser">
                <label for="msgbox"> Reason: </label>
                    <select class="form-control border-primary" name="reason" id="reason">
                        <option value="" selected>Choose</option>
                        <option>My item hasn’t arrived</option>
                        <option>My item was already damaged when I received it.</option>
                        <option>The seller isn’t responding to me</option>
                        <option>They do not intend to complete the sale</option>
                        <option>They send threatening messages or use abusive or vulgar language</option>
                    </select>
                <label class="mt-3" for="msgbox"> Additional Comments: </label>
                <textarea class="form-control" name="additional" id="msgbox" rows="6"></textarea>
            </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-4 col-md-4">
                    <button type="submit" class="btn btn-primary text-right">Report</button>
                </div>
            </div>
      </div>




</form>
    
@include('include.footer')

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
</body>
</html>