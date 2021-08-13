<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

   <style>

   .oval {
    height: 100px;
    width: 100px;
    background-color: #555;
    border-radius: 50%;
}
.rectangle {
  height: 50px;
  width: 100px;
  background-color: #555;
}
   </style>

   
</head>
<body>
@include('include.BuyerNavBar')

<div class="container">
<div class="row"> 
    <div class="col-md-3 mt-4">
      <button class="btn bg-warning oval" type="button" data-toggle="collapse" data-target="#Orders" aria-expanded="false" aria-controls="collapseExample">
          Orders
          <br>
          <i class="fa fa-phone-square" aria-hidden="true"></i>
          </button>
            </p>
        <div class="collapse" id="Orders">
            <div class="card card-body">
            The service enables you to order any item online. We are also making sure that packages are at customers' doorstep wherever possible.
            </div>
         </div>     
     </div>

    <div class="col-md-3 mt-4">
    <button class="btn bg-warning oval" type="button" data-toggle="collapse" data-target="#Payments" aria-expanded="false" aria-controls="collapseExample">
           Payments
           <br>
           <i class="fa fa-money" aria-hidden="true"></i>
          </button>
            </p>
        <div class="collapse" id="Payments">
            <div class="card card-body">
            Pre-payment is 100% safe and easy.However, Sams & Sams also offers you the Payment facility is provided using MasterCard, Paypal and VISA to pay for any Items.
            </div>
         </div>                       
    </div>
  
    <div class="col-md-3 mt-4">
    <button class="btn bg-warning oval" type="button" data-toggle="collapse" data-target="#Delivery" aria-expanded="false" aria-controls="collapseExample">
    Shipping & Delivery
           <br>
           <i class="fa fa-truck" aria-hidden="true"></i>
          </button>
            </p>
        <div class="collapse" id="Delivery">
            <div class="card card-body">
            Only products marked as 'Express Delivery' at the time of checkout are eligible for Express Delivery. Products will be delivered according to the times specified on the checkout page for 'Standard Delivery'.
            </div>
         </div>                         
     </div> 
     <div class="col-md-3 mt-4">
    <button class="btn bg-warning oval" type="button" data-toggle="collapse" data-target="#Returns" aria-expanded="false" aria-controls="collapseExample">
          Returns
          <br>
          <i class="fa fa-reply" aria-hidden="true"></i>
          </button>
            </p>
        <div class="collapse" id="Returns">
            <div class="card card-body">
            Customers will receive a receipt from the post office with a reference number as proof of return. The Items obtained within a month should be delivered and the Items will not be accepted after one month.
            </div>
         </div>                     
    </div>   
   </div>  
  
   <div class="row"> 
      
    <div class="col-md-3 mt-4">
    <button class="btn bg-warning oval" type="button" data-toggle="collapse" data-target="#Refunds" aria-expanded="false" aria-controls="collapseExample">
           Refunds
           <br>
           <i class="fa fa-deviantart" aria-hidden="true"></i>
          </button>
            </p>
        <div class="collapse" id="Refunds">
            <div class="card card-body">
            When you fill out the Return Form, you have the option of selecting a refund method. The shipping fee, as well as the amount paid for the returned item, is refunded.
            </div>
         </div>                     
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