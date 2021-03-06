<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Physical Inspection</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
</head>
<body>
@include('include.BuyerNavBar')
<form action="/PhyInspect" method="POST">
{{csrf_field()}}

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-6 ">
            <h1 class="text-uppercase">Physical Inspection</h1>
        </div>
    </div>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-6 mt-2">
                <label for="itemCode"><b>Item Code</b></label> <span class="text-danger">*</span>
                <input type="text" value="{{$inspectItem}}" class="form-control border border-primary" id="itemCode"  placeholder="Item Code" name="code">
        </div>
    </div>
</div>
<div class="container">
   <div class="row justify-content-center">
        <div class="col-6 mt-2 ">
        <label for="inputMDEx1"><b>Choose your time<b></label><span class="text-danger">*</span>
        <input type="time" class="form-control border border-primary" id="inputMDEx1" placeholder="Choose your time" name="time" >
        </div>
    </div>
    </div>
</div>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-6 mt-2">
                <label for="date"><b>Date</b></label> <span class="text-danger">*</span>
                <input type="date" class="form-control border border-primary" id="date"  placeholder="Date" name="date">
        </div>
    </div>
</div>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-6 mt-2">
                <label for="email"><b>Email</b></label> <span class="text-danger">*</span>
                <input type="text" class="form-control border border-primary" id="email"  placeholder="email" name="email">
        </div>
    </div>
</div>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-2 mt-5">
        <input type="submit" class="btn btn-primary btn-block btn-danger" value="Fix">
        </div>
    </div>
</div>
</div>

<input type="hidden" name="seller" value="{{$sellerName}}">

</form>


@include('include.footer')
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
</body>
</html>