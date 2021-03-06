<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Home Page</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

  <style>
    hr {
      border-top: 2px solid orange;
    }
    
  </style>

</head>
<body>

@include('include.guestnav')
@include('include.searchform')

<div class="container-fluid mt-4 ">
  <div class="row">
  <div class="col-md-0 col-lg-0 col-xl-1 bg-warning"></div>
  <div class="col-12 col-md-3 col-lg-3 col-xl-2">
    
      <div class="" >
        <ul class="list-group list-group-flush">
          <li class="list-group-item font-weight-bold"><a class="text-dark dropdown-toggle " href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" >Women's Fashion</a>

            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                @foreach($womSub as $womensSubCat)
                    <a class="dropdown-item" href="catlist/{{$womensSubCat->subcat_id }}">{{$womensSubCat->subcategoryName}}</a>
                @endforeach
            </div>
        </li>

        <li class="list-group-item font-weight-bold"><a class="text-dark dropdown-toggle " href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" >Men's Fashion</a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                @foreach($menSub as $mensSubCat)
                    <a class="dropdown-item" href="catlist/{{$mensSubCat->subcat_id }}">{{$mensSubCat->subcategoryName}}</a>
                @endforeach
            </div>
        </li>

        <li class="list-group-item font-weight-bold"><a class="text-dark dropdown-toggle " href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" >Jewellery Items</a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                @foreach($jewllerySub as $jewllerySubCat)
                    <a class="dropdown-item" href="catlist/{{$jewllerySubCat->subcat_id }}">{{$jewllerySubCat->subcategoryName}}</a>
                @endforeach
            </div>
        </li>

          <li class="list-group-item font-weight-bold"><a class="text-dark dropdown-toggle " href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" >Baby Items</a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                  @foreach($babySub as $babySubCat)
                      <a class="dropdown-item" href="catlist/{{$babySubCat->subcat_id }}">{{$babySubCat->subcategoryName}}</a>
                  @endforeach
            </div>       
          </li>

          <li class="list-group-item font-weight-bold"><a class="text-dark dropdown-toggle " href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" >Furnitures</a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                  @foreach($FurnituresSub as $FurnituresSubCat)
                      <a class="dropdown-item" href="catlist/{{$FurnituresSubCat->subcat_id }}">{{$FurnituresSubCat->subcategoryName}}</a>
                  @endforeach
            </div> 
          </li>

          <li class="list-group-item font-weight-bold"><a class="text-dark dropdown-toggle " href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" >Books</a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                  @foreach($BooksSub as $BooksSubCat)
                      <a class="dropdown-item" href="catlist/{{$BooksSubCat->subcat_id }}">{{$BooksSubCat->subcategoryName}}</a>
                  @endforeach
            </div> 
          </li>
          <li class="list-group-item font-weight-bold"><a class="text-dark dropdown-toggle " href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" >Electronic Items</a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                  @foreach($ElectronicSub as $ElectronicSubCat)
                      <a class="dropdown-item" href="catlist/{{$ElectronicSubCat->subcat_id }}">{{$ElectronicSubCat->subcategoryName}}</a>
                  @endforeach
            </div>
          </li>
        </ul>
      </div>
    </div>

  
    <div class="col-12 col-md-9 col-lg-9 col-xl-9  align-self-end">
      
          <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
              <div class="carousel-item active">
                <img class="d-block w-100" src="SliderImage/add.JPG" alt="First slide">
              </div>
              <div class="carousel-item">
                <img class="d-block w-100" src="SliderImage/add1.JPG" alt="Second slide">
              </div>
              <div class="carousel-item">
                <img class="d-block w-100" src="SliderImage/add2.JPG" alt="Third slide">
              </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="sr-only">Next</span>
            </a>
          </div>

    </div>
  </div>
       
</div>

<div class="container mt-5" style="background: rgb(241,241,241);">
    <div class="row">
          <div class="col-12 col-md-3 mt-2">
            <h5 class="font-weight-bold"><i class="fa fa-female" aria-hidden="true"></i> Women's Fashion</h5>
            <hr>
          </div>
    </div>
    <div class="row">
    @foreach($WomensFashion as $womencat)
          <div class="col-12 col-md-3 mb-2">
            <div class="card" style="width: 100%;">
              <div class="card-body">
                <img class="card-img-top" src="{{asset('AddItemsImages/'.$womencat->mainImage)}}" style="width:100%; height:100%;" alt="Card image cap"> 
                   <p><b><a href="/BuyItem/{{$womencat->itemCode}}/{{$womencat->seller}}">{{$womencat->itemName}}</a></b></p>
                   <span>
                      <p>LKR {{$womencat->itemPrice}}</p>
                   </span>         
              </div>
            </div>
          </div> 
      @endforeach 
    </div>
</div>

<div class="container mt-3" style="background: rgb(241,241,241);">
    <div class="row">
          <div class="col-12 col-md-3 mt-2">
              <h5 class="font-weight-bold"><i class="fa fa-male" aria-hidden="true"></i> Men's Fashion</h5>
              <hr>
          </div>
    </div>

    <div class="row">
    @foreach($MensFashion as $mensfa)
          <div class="col-12 col-md-3 mb-2">
            <div class="card" style="width: 100%;">
              <div class="card-body">
                <img class="card-img-top" src="{{asset('AddItemsImages/'.$mensfa->mainImage)}}" style="width:100%; height:100%;" alt="Card image cap"> 
                   <p><b><a href="/BuyItem/{{$mensfa->itemCode}}/{{$mensfa->seller}}">{{$mensfa->itemName}}</a></b></p>
                   <span>
                      <p>LKR {{$mensfa->itemPrice}}</p>
                   </span>         
              </div>
            </div>
          </div> 
      @endforeach 
    </div>
</div>

<div class="container mt-3" style="background: rgb(241,241,241);">
    <div class="row">
          <div class="col-12 col-md-3 mt-2">
            <h5 class="font-weight-bold"><i class="fa fa-diamond" aria-hidden="true"></i> Jewellery Items</h5>
            <hr>
          </div>
    </div>
    <div class="row">
    @foreach($Jewelleryitems as $jewellitem)
          <div class="col-12 col-md-3 mb-2">
            <div class="card" style="width: 100%;">
              <div class="card-body">
                <img class="card-img-top" src="{{asset('AddItemsImages/'.$jewellitem->mainImage)}}" style="width:100%; height:100%;" alt="Card image cap"> 
                   <p><b><a href="/BuyItem/{{$jewellitem->itemCode}}/{{$jewellitem->seller}}">{{$jewellitem->itemName}}</a></b></p>
                   <span>
                      <p>LKR {{$jewellitem->itemPrice}}</p>
                   </span>         
              </div>
            </div>
          </div> 
      @endforeach 
    </div>
 </div>

 <div class="container mt-3" style="background: rgb(241,241,241);"> 
    <div class="row">
          <div class="col-12 col-md-3 mt-2">
            <h5 class="font-weight-bold"><i class="fa fa-child" aria-hidden="true"></i> Baby Items</h5>
            <hr>
          </div>
    </div>
    <div class="row">
    @foreach($Babyitems as $babyitem)
          <div class="col-12 col-md-3 mb-2">
            <div class="card" style="width: 100%;">
              <div class="card-body">
                <img class="card-img-top" src="{{asset('AddItemsImages/'.$babyitem->mainImage)}}" style="width:100%; height:100%;" alt="Card image cap"> 
                   <p><b><a href="/BuyItem/{{$babyitem->itemCode}}/{{$babyitem->seller}}">{{$babyitem->itemName}}</a></b></p>
                   <span>
                      <p>LKR {{$babyitem->itemPrice}}</p>
                   </span>         
              </div>
            </div>
          </div> 
      @endforeach 
    </div>
</div>

<div class="container mt-3" style="background: rgb(241,241,241);">
    <div class="row">
          <div class="col-12 col-md-3 mt-2">
            <h5 class="font-weight-bold"><i class="fa fa-bed" aria-hidden="true"></i> Furnitures</h5>
            <hr>
          </div>
    </div>
    <div class="row">
    @foreach($Furnitures as $furniture)
          <div class="col-12 col-md-3 mb-2">
            <div class="card" style="width: 100%;">
              <div class="card-body">
                <img class="card-img-top" src="{{asset('AddItemsImages/'.$furniture->mainImage)}}" style="width:100%; height:100%;" alt="Card image cap"> 
                   <p><b><a href="/BuyItem/{{$furniture->itemCode}}/{{$furniture->seller}}">{{$furniture->itemName}}</a></b></p>
                   <span>
                      <p>LKR {{$furniture->itemPrice}}</p>
                   </span>         
              </div>
            </div>
          </div> 
      @endforeach 
    </div>
</div>
<div class="container mt-3" style="background: rgb(241,241,241);">
    <div class="row">
          <div class="col-12 col-md-3 mt-2">
            <h5 class="font-weight-bold"><i class="fa fa-book" aria-hidden="true"></i> Books</h5>
            <hr>
          </div>
    </div>
    <div class="row">
    @foreach($Books as $books)
          <div class="col-12 col-md-3 mb-2">
            <div class="card" style="width: 100%;">
              <div class="card-body">
                <img class="card-img-top" src="{{asset('AddItemsImages/'.$books->mainImage)}}" style="width:100%; height:100%;" alt="Card image cap"> 
                   <p><b><a href="/BuyItem/{{$books->itemCode}}/{{$books->seller}}">{{$books->itemName}}</a></b></p>
                   <span>
                      <p>LKR {{$books->itemPrice}}</p>
                   </span>         
              </div>
            </div>
          </div> 
      @endforeach 
    </div>
</div>
<div class="container mt-3" style="background: rgb(241,241,241);">
    <div class="row ">
          <div class="col-12 col-md-3 mt-2">
            <h5 class="font-weight-bold"><i class="fa fa-mobile" aria-hidden="true"></i> Electronic Items</h5>
            <hr>
          </div>
    </div>
    <div class="row">
    @foreach($Electronicitems as $elecitems)
          <div class="col-12 col-md-3 mb-2">
            <div class="card" style="width: 100%;">
              <div class="card-body">
                <img class="card-img-top" src="{{asset('AddItemsImages/'.$elecitems->mainImage)}}" style="width:100%; height:100%;" alt="Card image cap"> 
                   <p><b><a href="/BuyItem/{{$elecitems->itemCode}}/{{$elecitems->seller}}">{{$elecitems->itemName}}</a></b></p>
                   <span>
                      <p>LKR {{$elecitems->itemPrice}}</p>
                   </span>         
              </div>
            </div>
          </div> 
      @endforeach 
      </div>
</div>
    
@include('include.footer')





    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
  
</body>
</html>