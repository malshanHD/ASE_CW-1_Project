<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Item Delete Page</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

  </head>
   <body>
       <!-- nav start-->
@include('include.sellerNavbar')
      <!-- nav end-->
      
      <div class ="container">
       <div class="text-center">
           <h1><u>ITEM DELETE</u></h1>
           <div class="row">
              <div class="col-md-12 mt-3">
              <table class="table table-striped">
                <thead>
                    <tr>
                    <th scope="col">ITEM CODE</th>
                    <th scope="col">ITEM NAME</th>
                    <th scope="col">ITEM PRICE</th>
                    <th scope="col">WARRENTY</th>
                    <th scope="col">ITEM QTY</th>
                    <th scope="col">ACTION</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                    @foreach($items as $DeleteItem)  
                    <th >{{$DeleteItem->itemCode}}</th>
                    <th >{{$DeleteItem->itemName}}</th>
                    <th >{{$DeleteItem->itemPrice}}</th>
                    <th >{{$DeleteItem->itemWarrenty}}</th>
                    <th >{{$DeleteItem->itemQTY}}</th>
                    <th ><a href="/itemdelete/{{$DeleteItem->itemCode}}" class="btn btn-danger">Delete</a></th>
                    </tr>
                    @endforeach
                </tbody>
                </table>

              </div>
           </div>
        
       </div>
      </div>

      @include('include.footer')

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
  
</body>
</html>