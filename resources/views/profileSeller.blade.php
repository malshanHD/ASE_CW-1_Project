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
        body{
    
    background:#f5f5f5;
    }
    /**
    * Panels
    */
    /*** General styles ***/
    .panel {
    box-shadow: none;
    }
    .panel-heading {
    border-bottom: 0;
    }
    .panel-title {
    font-size: 17px;
    }
    .panel-title > small {
    font-size: .75em;
    color: #999999;
    }
    .panel-body *:first-child {
    margin-top: 0;
    }
    .panel-footer {
    border-top: 0;
    }

    .panel-default > .panel-heading {
        color: #333333;
        background-color: transparent;
        border-color: rgba(0, 0, 0, 0.07);
    }

    /**
    * Profile
    */
    /*** Profile: Header  ***/
    .profile__avatar {
    float: left;
    width: 60px;
    height: 60px;
    border-radius: 50%;
    margin-right: 20px;
    overflow: hidden;
    }
    @media (min-width: 768px) {
    .profile__avatar {
        width: 100px;
        height: 100px;
    }
    }
    .profile__avatar > img {
    width: 100%;
    height: auto;
    }
    .profile__header {
    overflow: hidden;
    }
    .profile__header p {
    margin: 20px 0;
    }
    /*** Profile: Table ***/
    @media (min-width: 992px) {
    .profile__table tbody th {
        width: 200px;
    }
    }
    /*** Profile: Recent activity ***/
    .profile-comments__item {
    position: relative;
    padding: 15px 16px;
    border-bottom: 1px solid rgba(0, 0, 0, 0.05);
    }
    .profile-comments__item:last-child {
    border-bottom: 0;
    }
    .profile-comments__item:hover,
    .profile-comments__item:focus {
    background-color: #f5f5f5;
    }
    .profile-comments__item:hover .profile-comments__controls,
    .profile-comments__item:focus .profile-comments__controls {
    visibility: visible;
    }
    .profile-comments__controls {
    position: absolute;
    top: 0;
    right: 0;
    padding: 5px;
    visibility: hidden;
    }
    .profile-comments__controls > a {
    display: inline-block;
    padding: 2px;
    color: #999999;
    }
    .profile-comments__controls > a:hover,
    .profile-comments__controls > a:focus {
    color: #333333;
    }
    .profile-comments__avatar {
    display: block;
    float: left;
    margin-right: 20px;
    width: 40px;
    height: 40px;
    border-radius: 50%;
    overflow: hidden;
    }
    .profile-comments__avatar > img {
    width: 100%;
    height: auto;
    }
    .profile-comments__body {
    overflow: hidden;
    }
    .profile-comments__sender {
    color: #333333;
    font-weight: 500;
    margin: 5px 0;
    }
    .profile-comments__sender > small {
    margin-left: 5px;
    font-size: 12px;
    font-weight: 400;
    color: #999999;
    }
    @media (max-width: 767px) {
    .profile-comments__sender > small {
        display: block;
        margin: 5px 0 10px;
    }
    }
    .profile-comments__content {
    color: #999999;
    }
    /*** Profile: Contact ***/
    .profile__contact-btn {
    padding: 12px 20px;
    margin-bottom: 20px;
    }
    .profile__contact-hr {
    position: relative;
    border-color: rgba(0, 0, 0, 0.1);
    margin: 40px 0;
    }
    .profile__contact-hr:before {
    content: "OR";
    display: block;
    padding: 10px;
    position: absolute;
    top: 50%;
    left: 50%;
    -webkit-transform: translate(-50%, -50%);
    transform: translate(-50%, -50%);
    background-color: #f5f5f5;
    color: #c6c6cc;
    }
    .profile__contact-info-item {
    margin-bottom: 30px;
    }
    .profile__contact-info-item:before,
    .profile__contact-info-item:after {
    content: " ";
    display: table;
    }
    .profile__contact-info-item:after {
    clear: both;
    }
    .profile__contact-info-item:before,
    .profile__contact-info-item:after {
    content: " ";
    display: table;
    }
    .profile__contact-info-item:after {
    clear: both;
    }
    .profile__contact-info-icon {
    float: left;
    font-size: 18px;
    color: #999999;
    }
    .profile__contact-info-body {
    overflow: hidden;
    padding-left: 20px;
    color: #999999;
    }
    .profile__contact-info-body a {
    color: #999999;
    }
    .profile__contact-info-body a:hover,
    .profile__contact-info-body a:focus {
    color: #999999;
    text-decoration: none;
    }
    .profile__contact-info-heading {
    margin-top: 2px;
    margin-bottom: 5px;
    font-weight: 500;
    color: #999999;
    }
    </style>

</head>
<body>
    <!-- start navbar start-->
@include('include.sellerNavbar')

@foreach($info as $selInfo)
@if(!$selInfo->registrationPayment)
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
                               
                                <input type="hidden" name="first_name" value="{{$selInfo->comapnyname}}">
                                <input type="hidden" name="last_name" value="{{$selInfo->username}}"><br>
                                <input type="hidden" name="email" value="{{$selInfo->email}}">
                                <input type="hidden" name="phone" value="{{$selInfo->contactno}}"><br>
                                <input type="hidden" name="address" value="{{$selInfo->streetadd01}}">
                                <input type="hidden" name="city" value="{{$selInfo->city}}">
                                <input type="hidden" name="country" value="{{$selInfo->country}}"><br><br> 
                                <input type="submit" value="Pay" class="font-italic btn btn-warning text-light btn-lg btn-block">  
                            </form> 
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @else



<div class="container mt-4">
<div class="row">
      <div class="col-xs-12 col-sm-9">
        
        <!-- User profile -->
        <div class="panel panel-default">
          <div class="panel-heading">
          <h4 class="panel-title">Seller profile</h4>
          </div>
          <div class="panel-body">
            <div class="profile__avatar">
              <img src="{{asset('/seller_images/'.$selInfo->profilePicture)}}" alt="...">
            </div>
            <div class="profile__header">
              <h4>{{$selInfo->comapnyname}} <small>Authorized Seller</small></h4>
              <p class="text-muted">
                {{$selInfo->description}}
              </p>
              <p>
                {{$selInfo->country}}
              </p>
              <p class="card-text text-primary font-weight-bold">Ratings <i class="fa fa-commenting" aria-hidden="true"></i></p>
              <h5 class="card-text text-warning font-weight-bold">
              @for ($i=1; $i<=$avgStar; $i++)	
                  <span class="fa fa-star checked"></span>
              @endfor
              </h5>
              <hr>
            </div>
          </div>
        </div>

        <!-- User info -->
        <div class="panel panel-default">
          <div class="panel-heading">
          <h4 class="panel-title">Seller info</h4>
          </div>
          <div class="panel-body">
            <table class="table profile__table">
              <tbody>
                <tr>
                  <th><strong>Location</strong></th>
                  <td>{{$selInfo->country}}</td>
                </tr>
                <tr>
                  <th><strong>Company name</strong></th>
                  <td>{{$selInfo->comapnyname}}</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>

        <!-- Community -->
        <div class="panel panel-default">
          <div class="panel-heading">
          <h4 class="panel-title">Community</h4>
          </div>
          <div class="panel-body">
            <table class="table profile__table">
              <tbody>
              
                <tr>
                  <th><strong>Member since</strong></th>
                  <td>{{$selInfo->created_at}}</td>
                </tr>
               
              </tbody>
            </table>
            
          </div>
        </div>

      </div>
      
      <div class="col-xs-12 col-sm-3">
        
        <!-- Contact user -->
        <p>
          <a href="#" class="profile__contact-btn btn btn-lg btn-block btn-info" data-toggle="modal" data-target="#profile__contact-form">
            Contact Seller
          </a>
        </p>

        <hr class="profile__contact-hr">
        
        <!-- Contact info -->
        <div class="profile__contact-info">
          <div class="profile__contact-info-item">
            <div class="profile__contact-info-icon">
              <i class="fa fa-phone"></i>
            </div>
            <div class="profile__contact-info-body">
              <h5 class="profile__contact-info-heading">Work number</h5>
              {{$selInfo->contactno}}
            </div>
          </div>
          <div class="profile__contact-info-item">
            <div class="profile__contact-info-icon">
              <i class="fa fa-envelope-square"></i>
            </div>
            <div class="profile__contact-info-body">
              <h5 class="profile__contact-info-heading">E-mail address</h5>
              <a href="mailto:{{$selInfo->email}}">{{$selInfo->email}}</a>
            </div>
          </div>
          <div class="profile__contact-info-item">
            <div class="profile__contact-info-icon">
              <i class="fa fa-map-marker"></i>
            </div>
            <div class="profile__contact-info-body">
              <h5 class="profile__contact-info-heading">Work address</h5>
              <p>{{$selInfo->streetadd01}},</p>
              <p>{{$selInfo->streetadd02}},</p>
              <p>{{$selInfo->city}},{{$selInfo->state}},{{$selInfo->zipcode}}</p>
            </div>
          </div>
        </div>

      </div>
    </div>
</div>
<hr>
<div class="container ">
<p><Strong><a href="/sellerProfle">Profile</a></Strong></p>
<h3>Items</h3>
    <div class="row mb-5">
        
    @foreach($endBid as $items)
        <div class="col-2">
            <img class="card-img-top" src="{{asset('AddItemsImages/'.$items->mainImage)}}" style="width:100%; height:100%;" alt="Card image cap"> 
            <p class="bg-success  text-center mt-2 mb-2"><a class="text-light" href="bidWinner/{{$items->itemCode}}">{{$items->itemName}}</a></p>
        </div>
    @endforeach
    </div>
</div>

<div class="container mt-5">
  <h2>Feedbacks</h2><hr>
    <div class="row">
    @foreach($feedbacks as $feedbacks)
        <div class="col-12 mt-2">
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
@endif
@endforeach

@include('include.footer')
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>

</body>
</html>