<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <title>Delivery Process</title>
    <style>
        body{margin-top:20px;}
        .timeline {
            border-left: 3px solid #727cf5;
            border-bottom-right-radius: 4px;
            border-top-right-radius: 4px;
            background: rgba(114, 124, 245, 0.09);
            margin: 0 auto;
            letter-spacing: 0.2px;
            position: relative;
            line-height: 1.4em;
            font-size: 1.03em;
            padding: 50px;
            list-style: none;
            text-align: left;
            max-width: 70%;
        }

        @media (max-width: 767px) {
            .timeline {
                max-width: 98%;
                padding: 25px;
            }
        }

        .timeline h1 {
            font-weight: 300;
            font-size: 1.4em;
        }

        .timeline h2,
        .timeline h3 {
            font-weight: 600;
            font-size: 1rem;
            margin-bottom: 10px;
        }

        .timeline .event {
            border-bottom: 1px dashed #e8ebf1;
            padding-bottom: 25px;
            margin-bottom: 25px;
            position: relative;
        }

        @media (max-width: 767px) {
            .timeline .event {
                padding-top: 30px;
            }
        }

        .timeline .event:last-of-type {
            padding-bottom: 0;
            margin-bottom: 0;
            border: none;
        }

        .timeline .event:before,
        .timeline .event:after {
            position: absolute;
            display: block;
            top: 0;
        }

        .timeline .event:before {
            left: -207px;
            content: attr(data-date);
            text-align: right;
            font-weight: 100;
            font-size: 0.9em;
            min-width: 120px;
        }

        @media (max-width: 767px) {
            .timeline .event:before {
                left: 0px;
                text-align: left;
            }
        }

        .timeline .event:after {
            -webkit-box-shadow: 0 0 0 3px #727cf5;
            box-shadow: 0 0 0 3px #727cf5;
            left: -55.8px;
            background: #fff;
            border-radius: 50%;
            height: 9px;
            width: 9px;
            content: "";
            top: 5px;
        }

        @media (max-width: 767px) {
            .timeline .event:after {
                left: -31.8px;
            }
        }

        .rtl .timeline {
            border-left: 0;
            text-align: right;
            border-bottom-right-radius: 0;
            border-top-right-radius: 0;
            border-bottom-left-radius: 4px;
            border-top-left-radius: 4px;
            border-right: 3px solid #727cf5;
        }

        .rtl .timeline .event::before {
            left: 0;
            right: -170px;
        }

        .rtl .timeline .event::after {
            left: 0;
            right: -55.8px;
        }
    </style>
</head>
<body>
    <!-- start navbar start-->
@include('include.sellerNavbar')

@foreach($itemDetails as $delivery)
<div class="container">
    <div class="row">
        <div class="col-4">
            <div class="card" style="width: 100%; background: rgb(241,241,241);">
                        <div class="card-header card-title">{{$delivery->itemName}}</div>
                        <div class="card-body">
                            
                        <img class="card-img-top" src="{{asset('AddItemsImages/'.$delivery->mainImage)}}" style="width:100%; height:100%;" alt="Card image cap"> 
                            <p class="card-text"></p>
                            
                    </div>
            </div>
        </div>
        
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Delivery Process</h6>
                    <div id="content">
                        <ul class="timeline">
                            <li class="event">
                                <h3>Start</h3>
                                <form action="/packaged" method="post">
                                    {{csrf_field()}}
                                        <input type="hidden" name="paymentID" id="paymentID" value="{{$delivery->id}}">
                                        <input type="hidden" name="itemCode" id="itemCode" value="{{$delivery->itemCode}}">
                                        <input type="hidden" name="buyerName" id="buyerName" value="{{$delivery->username}}">
                                        <input type="submit" value="Click to start" class="btn btn-success btn-block">
                                </form>
                            </li>
                            @foreach($deliveryDetails as $timeline)
                            <li class="event" >
                                <h3>Packaged</h3>
                                @if(!$timeline->packaging)
                                <a href="/shipped/{{$delivery->id}}" class="btn btn-success btn-block">Shipped</a>
                                @else
                                <p>{{$timeline->created_at}}</p>
                                @endif
                            </li>
                            <li class="event" >
                                <h3>Shipped</h3>
                                @if(!$timeline->shipped)
                                <a href="/shipped/{{$delivery->id}}" class="btn btn-success btn-block">Shipped</a>
                                @else
                                <p>{{$timeline->shippedTime}}</p>
                                @endif
                            </li>
                            <li class="event" >
                                <h3>Arrived to currier</h3>
                                @if(!$timeline->arrivedToCurrier)
                                <a href="/arrived/{{$timeline->paymentID}}" class="btn btn-success btn-block">Arrived to currier</a>
                                @else
                                <p>{{$timeline->arrivedToCurrierTime}}</p>
                                @endif
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
</div>
@endforeach

@include('include.footer')
</body>
</html>