<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order tracking</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <style>
        .main-timeline{
                overflow: hidden;
                position: relative;
            }
            .main-timeline .timeline{
                position: relative;
                margin-top: -79px;
            }
            .main-timeline .timeline:first-child{ margin-top: 0; }
            .main-timeline .timeline:before,
            .main-timeline .timeline:after{
                content: "";
                display: block;
                width: 100%;
                clear: both;
            }
            .main-timeline .timeline:before{
                content: "";
                width: 100%;
                height: 100%;
                box-shadow: -8px 0 5px -5px rgba(0, 0, 0, 0.5) inset;
                position: absolute;
                top: 0;
                right: 0;
                z-index: 2;
            }
            .main-timeline .timeline-icon{
                width: 210px;
                height: 210px;
                border-radius: 50%;
                border: 25px solid transparent;
                border-top-color: #f44556;
                border-right-color: #f44556;
                margin: auto;
                position: absolute;
                top: 0;
                left: 0;
                bottom: 0;
                right: 0;
                z-index: 1;
                transform: rotate(45deg);
            }
            .main-timeline .year{
                display: block;
                width: 110px;
                height: 110px;
                line-height: 110px;
                border-radius: 50%;
                background: #fff;
                box-shadow: 0 0 20px rgba(0,0,0,0.4);
                margin: auto;
                font-size: 10px;
                font-weight: bold;
                color: #f44556;
                text-align: center;
                position: absolute;
                top: 0;
                left: 0;
                bottom: 0;
                right: 0;
                transform: rotate(-45deg);
            }
            .main-timeline .timeline-content{
                width: 35%;
                float: right;
                background: #f44556;
                padding: 30px 20px;
                margin: 50px 0;
                z-index: 1;
                position: relative;
            }
            .main-timeline .timeline-content:before{
                content: "";
                width: 20%;
                height: 15px;
                background: #f44556;
                position: absolute;
                top: 50%;
                left: -20%;
                z-index: -1;
                transform: translateY(-50%);
            }
            .main-timeline .title{
                font-size: 20px;
                font-weight: bold;
                color: #fff;
                margin: 0 0 10px 0;
            }
            .main-timeline .description{
                font-size: 16px;
                color: #fff;
                line-height: 24px;
                margin: 0;
            }
            .main-timeline .timeline:nth-child(2n):before{ box-shadow: 8px 0 5px -5px rgba(0, 0, 0, 0.5) inset; }
            .main-timeline .timeline:nth-child(2n) .timeline-icon{ transform: rotate(-135deg); }
            .main-timeline .timeline:nth-child(2n) .year{ transform: rotate(135deg); }
            .main-timeline .timeline:nth-child(2n) .timeline-content{ float: left; }
            .main-timeline .timeline:nth-child(2n) .timeline-content:before{
                left: auto;
                right: -20%;
            }
            .main-timeline .timeline:nth-child(2n) .timeline-icon{
                border-top-color: #e97e2e;
                border-right-color: #e97e2e;
            }
            .main-timeline .timeline:nth-child(2n) .year{ color: #e97e2e; }
            .main-timeline .timeline:nth-child(2n) .timeline-content,
            .main-timeline .timeline:nth-child(2n) .timeline-content:before{ background: #e97e2e; }
            .main-timeline .timeline:nth-child(3n) .timeline-icon{
                border-top-color: #13afae;
                border-right-color: #13afae;
            }
            .main-timeline .timeline:nth-child(3n) .year{ color: #13afae; }
            .main-timeline .timeline:nth-child(3n) .timeline-content,
            .main-timeline .timeline:nth-child(3n) .timeline-content:before{ background: #13afae; }
            .main-timeline .timeline:nth-child(4n) .timeline-icon{
                border-top-color: #105572;
                border-right-color: #105572;
            }
            .main-timeline .timeline:nth-child(4n) .year{ color: #105572; }
            .main-timeline .timeline:nth-child(4n) .timeline-content,
            .main-timeline .timeline:nth-child(4n) .timeline-content:before{ background: #105572; }
            @media only screen and (max-width: 1199px){
                .main-timeline .timeline{ margin-top: -103px; }
                .main-timeline .timeline-content:before{ left: -18%; }
                .main-timeline .timeline:nth-child(2n) .timeline-content:before{ right: -18%; }
            }
            @media only screen and (max-width: 990px){
                .main-timeline .timeline{ margin-top: -127px; }
                .main-timeline .timeline-content:before{ left: -2%; }
                .main-timeline .timeline:nth-child(2n) .timeline-content:before{ right: -2%; }
            }
            @media only screen and (max-width: 767px){
                .main-timeline .timeline{
                    margin-top: 0;
                    overflow: hidden;
                }
                .main-timeline .timeline:before,
                .main-timeline .timeline:nth-child(2n):before{
                    box-shadow: none;
                }
                .main-timeline .timeline-icon,
                .main-timeline .timeline:nth-child(2n) .timeline-icon{
                    margin-top: -30px;
                    margin-bottom: 20px;
                    position: relative;
                    transform: rotate(135deg);
                }
                .main-timeline .year,
                .main-timeline .timeline:nth-child(2n) .year{ transform: rotate(-135deg); }
                .main-timeline .timeline-content,
                .main-timeline .timeline:nth-child(2n) .timeline-content{
                    width: 100%;
                    float: none;
                    border-radius: 0 0 20px 20px;
                    text-align: center;
                    padding: 25px 20px;
                    margin: 0 auto;
                }
                .main-timeline .timeline-content:before,
                .main-timeline .timeline:nth-child(2n) .timeline-content:before{
                    width: 15px;
                    height: 25px;
                    position: absolute;
                    top: -22px;
                    left: 50%;
                    z-index: -1;
                    transform: translate(-50%,0);
                }
            }
    </style>
</head>
<body>
@include('include.BuyerNavBar')

@include('include.searchform')
@foreach($track as $data)
<div class="container mt-3">
    <div class="row">
        <div class="col-4">
            <div class="card" style="width:100%;">
                <div class="card-header">
                    <h4>{{$data->itemName}}</h4>
                </div>
                <div class="card-body">
                    <img src="{{asset('AddItemsImages/'.$data->mainImage)}}" style="width:100%" alt="">
                    <hr>
                </div>
            </div>
        </div>
        <div class="col-8">
            <h4><strong>Shipping address</strong></h4><hr>
            <div class="row">
                <div class="col-4">
                    <strong>
                        <p>Contact number</p>
                        <p>Country</p>
                        <p>Street Address 1</p>
                        <p>Street Address 2</p>
                        <p>City</p>
                        <p>Province</p>
                        <p>Zip code</p>
                    </strong>
                </div>
                <div class="col-4">
                    <p>: {{$data->phnNumber}}</p>
                    <p>: {{$data->country}}</p>
                    <p>: {{$data->streetadd01}}</p>
                    <p>: {{$data->streetadd02}}</p>
                    <p>: {{$data->city}}</p>
                    <p>: {{$data->province}}</p>
                    <p>: {{$data->zipcode}}</p>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="main-timeline">
                <div class="timeline">
                    <div class="timeline-icon"><span class="year">{{$data->created_at}}</span></div>
                    <div class="timeline-content">
                        <h3 class="title">Packaged</h3>
                        <p class="description">
                            Your parcel is packed and ready to ship
                        </p>
                        <p class="description">
                            your tracking ID is : {{$data->id}}
                        </p>
                       
                    </div>
                </div>

                @if($data->shipped)
                <div class="timeline">
                    <div class="timeline-icon"><span class="year">{{$data->shippedTime}}</span></div>
                    <div class="timeline-content">
                        <h3 class="title">Shipped</h3>
                        <p class="description">
                            Your parcel was shipped. You can quickly collect your parcel.Your package has been shipped by our currier service. If you have any inquiry please contact our customer care.
                        </p>
                    </div>
                </div>
                @else
                <div class="timeline">
                    <div class="timeline-icon"><span class="year">{{$data->shippedTime}}</span></div>
                    <div class="timeline-content">
                        <h3 class="title">Shipped</h3>
                        <p class="description">
                            In progress
                        </p>
                    </div>
                </div>
                @endif

                @if($data->arrivedToCurrier)
                <div class="timeline">
                    <div class="timeline-icon"><span class="year">{{$data->arrivedToCurrierTime}}</span></div>
                    <div class="timeline-content">
                        <h3 class="title">Arrived to Currier</h3>
                        <p class="description">
                            Very close. Your parcel is now delivered to the courier and will be delivered to you shortly. 
                        </p>
                    </div>
                </div>
                @else
                <div class="timeline">
                    <div class="timeline-icon"><span class="year">{{$data->arrivedToCurrierTime}}</span></div>
                    <div class="timeline-content">
                        <h3 class="title">Arrived to Currier</h3>
                        <p class="description">
                        In progress
                        </p>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endforeach
@include('include.footer')

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>

</body>
</html>