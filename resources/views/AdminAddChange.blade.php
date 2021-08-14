<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Advertisement Change</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

</head>
<body>
<!--Navbar start-->
@include('include.adminNavBar')
<!--Navbar end-->  

<!--Start form-->
<div class="container mt-5">
  <div class="row justify-content-center">
    <div class="col-4">
      <h3>Welcome to Sams & Sams!</h3>
    </div>
    <div class="col-4 mt-2">
    </div>
  </div>
  <div class="row mt-3 justify-content-center">
      <div class="col-8" style="background: rgb(201,241,211);">
            <div class="form-group mt-5 ml-2 mr-2">
                <div class="form-group mt-2">
                <label for="image">Image</label> <span class="text-danger">*</span>
                <input type="file" class="form-control border border-primary"  id="image" name="image">
                </div>
            </div>
              <div class="form-group ml-2 mr-2">
                <label for="Description">Description :</label> <span class="text-danger">*</span>
                <input type="text" class="form-control border border-primary" id="Description"  placeholder="Description" name="Description">
            </div>
    <div class="row mt-5">
        <div class="col-6">
            <input type="submit" class="btn btn-primary btn-block" value="Add">
             </div>
             <div class="col-6">
            <input type="submit" class="btn btn-danger btn-block" value="Delete">
        </div>
    </div>  
    </div>
</div>
</div>
<!--end form-->

<!--footer start-->
@include('include.footer')
<!--footer end-->

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>

</body>
</html>