<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

    <style>
       blockquote {
               border-left: 4px solid;
               margin: 10px 0 25px;
               padding: 10px 10px 10px 20px;
               color: #555;
               }

.container {
  padding: 10px 30px;
}

.country-container {
  display: flex;
}

.flag {
  background-size: 50px 30px;
  height: 30px;
  width: 50px;
  display: inline-block;
  margin: 0 10px 0 0;
  flex: 0 0 50px;
}

.countries {
  width: 90%;
  max-width: 400px;
}


    </style>

</head>
<body>
 <!-- nav start-->
 @include('include.guestnav')
<!-- nav end-->

<!-- Sign-up form start-->
<div class="container mt-3"> 
    <div class="col-md-3"></div>
    <div class="col-md-12" id="form">
      <form method="post" action="/buyerSave" enctype="multipart/form-data">
      {{csrf_field()}}
           <h1>Welcome to Sams & Sams!</h1>

           <!-- error message -->
            @foreach($errors->all() as $error)
               <div class="alert alert-danger" role="alert">
                  {{$error}}
               </div>
            @endforeach
            
            @if(session()->has('message'))
               <div class="alert alert-success">
               {{ session()->get('message') }}
               </div>
            @endif

                  <div class="row">
                           <div class="col-md-4 mt-5">
                              <label>Username:</label>
                              <input type="text" name="usernames" placeholder="Username" class="form-control border border-primary"  required="">
                           </div>

                           <div class="col-md-4 mt-5">
                              <label>Frist Name:</label>
                              <input type="text" name="fname" placeholder="Frist Name" class="form-control border border-primary"  required="">
                           </div>

                           <div class="col-md-4 mt-5">
                              <label>Last Name:</label>
                              <input type="text" name="Lname" placeholder="Last Name" class="form-control border-primary" required="">
                           </div>
                  </div>
                  

                <div class="row">
                        <div class="col-md-3 mt-4">
                           <label>Gender:</label>                       
                           <select class="form-control border-primary" name="gender" id="gender">
                              <option value="" selected>Choose</option>
                              <option value="Male">Male</option>
                              <option value="Female">Female</option>
                           </select>
                          
                        </div>  

                        <div class="col-md-5 mt-4">
                           <label>Date of Birth:</label>
                           <input type="date" placeholder="" name="dob" class="form-control border-primary" required="">
                        </div>
               </div>   
               <hr class="mt-4">
                 <div class="row">
                           <div class="col-md-6">
                              <label>Email:</label>
                              <input type="email" name="email" placeholder="Email" class="form-control border-primary" required="">
                           </div>

                        <div class="col-md-4">
                           <label>Contact no:</label>
                              <input type="text" name="contact" placeholder="Contact no" class="form-control border-primary" required="">
                        </div>
                 </div>

                 <div class="row">
                        <div class="col-md-4 mt-3">
                           <label>Country :</label>
                              <select class="countries form-control border-primary" name="countries" id="countries">
                                 <option value="" id="countries"></option>
                              </select>
                        </div>
                        <div class="col-md-1 mt-4">
                           <label></label>
                              <span class="flag" id="flag"></span> 
                        </div>
                 </div>
                
                <div class="row">
                        <div class="col-md-5 mt-3">
                           <label>Street Address 1:</label>
                           <input type="text" name="stAdd01" placeholder="Street Address 1" class="form-control border-primary" required="">
                        </div>

                        <div class="col-md-5 mt-3">
                              <label>Street Address 2:</label>
                              <input type="text" name="stAdd02" placeholder="Street Address 2" class="form-control border-primary" required="">
                        </div>
                  </div>  
               
                <div class="row"> 
                        <div class="col-md-4 mt-4">
                           <label>City:</label>
                           <input type="text" name="city" placeholder="City" class="form-control border-primary" required="">
                        </div>

                        <div class="col-md-4 mt-4">
                              <label>State:</label>
                              <input type="text" name="state" placeholder="State" class="form-control border-primary" required="">
                           </div>

                        <div class="col-md-4 mt-4">
                           <label>Zip Code:</label>
                           <input type="text" name="zipcode" placeholder="Zip Code" class="form-control border-primary" required="">
                        </div>    
                </div>   
                <hr class="mt-4">

                  <div class="row">
                     <div class="col-md-6">
                        <label>User Image:</label>
                        <input type="file" name="picture" id="picture" class="form-control border-primary">
                     </div>
                  </div>

                <hr class="mt-4">
                <input type="submit" value="Save" class="btn btn-primary" name="btnSave">

      </form>
      </div>
     </div>
    </div>
  <!-- Sign-up form end-->

    <!--footer start-->
    @include('include.footer')
    <!--footer end-->

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>


    <script>
          const xhttp = new XMLHttpRequest();
          const select = document.getElementById("countries");
          const flag = document.getElementById("flag");

            let countries;

            xhttp.onreadystatechange = function() {
              if (this.readyState == 4 && this.status == 200) {
                countries = JSON.parse(xhttp.responseText);
                assignValues();
                handleCountryChange();
              }
            };
            xhttp.open("GET", "https://restcountries.eu/rest/v2/all", true);
            xhttp.send();

            function assignValues() {
              countries.forEach(country => {
                const option = document.createElement("option");
                option.value = country.alpha2Code;
                option.textContent = country.name;
                select.appendChild(option);
              });
            }

            function handleCountryChange() {
              const countryData = countries.find(
                country => select.value === country.alpha2Code
              );
              flag.style.backgroundImage = `url(${countryData.flag})`;
            }

            select.addEventListener("change", handleCountryChange.bind(this));

      </script>

</body>
</html>