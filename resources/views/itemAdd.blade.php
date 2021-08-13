<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Item Add</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
 
</head>
<body>
<!-- start navbar start-->
@include('include.sellerNavbar')
<!-- nav-bar end-->
<div class="container mt-5">
    <div class="row">
        <div class="col">
            <h1 class="text-uppercase">Item Add</h1>
        </div>
    </div>
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
    
    <form action="/itemUpload" method="post" enctype="multipart/form-data">
    {{csrf_field()}}
    <div class="row mt-3 font-weight-bold">
        <div class="col-4">
            <div class="form-group">
                <label for="itemCode">Item Code</label> <span class="text-danger">*</span>
                <input type="text" class="form-control border border-primary" id="itemCode"  placeholder="Item Code" name="code">
            </div>
        </div>
        <div class="col-6">
            <div class="form-group">
                <label for="itemName">Item Name</label> <span class="text-danger">*</span>
                <input type="text" class="form-control border border-primary" id="itemName"  placeholder="Item Name" name="name">
            </div>
        </div>
        <div class="col-12">
            <div class="form-group mt-2">
                <label for="itemDes">Item Description</label> <span class="text-danger">*</span>
                <!-- <input type="text" class="form-control border border-primary" id="itemDes"  placeholder="Item Description" name="description"> -->
                <textarea name="description" id="description" class="form-control border border-primary" rows="6"></textarea>

            </div>
        </div>
        <div class="form-group col-md-6">
                <label for="category">Main Category</label> <span class="text-danger">*</span>
                <select id="category" class="form-control border border-primary maincategory"  name="category">
                    <option value="">--- Select Category ---</option>
                    @foreach ($categoryType as $key => $value)
                    <option value="{{ $key }}">{{ $value }}</option>
                    @endforeach
                </select>
        </div>
        <input type="hidden" name="rowCOunt" value="{{$count2}}" id="rowCOunt">
        <div class="form-group col-md-6">
                <label for="Subcategory">Sub Category</label> <span class="text-danger">*</span>
                <select id="Subcategory" class="form-control border border-primary subcate" id="subcate" name="subcate" >
                    <option selected>Choose...</option>
                    <option>...</option>
                </select>
        </div>
        <div class="col-4">
            <div class="form-group mt-2">
                <label for="itemWarranty">Warranty (Monthly)</label> <span class="text-danger">*</span>
                <input type="text" class="form-control border border-primary" id="itemWarranty"  placeholder="Item Warranty" name="Warranty" onchange="icode()">
            </div>
         </div>
         <div class="col-4">
            <div class="form-group mt-2">
                <label for="itemQuantity">Quantity</label> <span class="text-danger">*</span>
                <input type="number" class="form-control border border-primary" id="itemQuantity"  placeholder="Item Quantity" name="Quantity">
            </div>
         </div>
         <div class="col-4">
            <div class="form-group mt-2">
                <label for="itemPrice">Starting BID</label> <span class="text-danger">*</span>
                <input type="text" class="form-control border border-primary" id="itemPrice"  placeholder="Item Price" name="Price" required>
            </div>
         </div>
        
        <div class="col-8">
            <div class="form-group mt-2">
                <label for="mainPic">Main Picture</label> <span class="text-danger">*</span>
                <input type="file" class="form-control border border-primary"  id="mainPic" name="mainPic">
            </div>
        </div>
        <div class="col-8">
            <div class="form-group mt-2">
                <label for="itemPic">Side Pictures</label> <span class="text-danger">*</span>
                <input type="file" class="form-control border border-primary"  id="itemPic" name="pictures[]" multiple="true">
            </div>
        </div>
    </div>
    <div class="row mt-5">
        <div class="col-3">
            <input type="submit" class="btn btn-primary btn-block" value="Add">
        </div>
        <div class="col-3">
            <input type="submit" class="btn btn-success btn-block" value="Update">
        </div>
        <div class="col-3">
            <input type="submit" class="btn btn-danger btn-block" value="Delete">
        </div>
        <div class="col-3">
            <input type="submit" class="btn btn-warning btn-block" value="Clear">
        </div>
    </div>
    </form>
</div>



@include('include.footer')

<script type="text/javascript">
    jQuery(document).ready(function ()
    {
            jQuery('select[name="category"]').on('change',function(){
               var catID = jQuery(this).val();
               if(catID)
               {
                  jQuery.ajax({
                     url : 'dropdownlist/getstates/' +catID,
                     type : "GET",
                     dataType : "json",
                     success:function(data)
                     {
                        // console.log(data);
                        jQuery('select[name="subcate"]').empty();
                        jQuery.each(data, function(key,value){
                            console.log(key);
                            console.log(value);
                           $('select[name="subcate"]').append('<option value="'+ key +'">'+ value +'</option>');
                        });
                     }
                  });
               }
               else
               {
                  $('select[name="subcate"]').empty();
               }
            });
    });
    </script>

    <script>
        function icode(){
            
            concateText = document.getElementById("category").value + document.getElementById("rowCOunt").value;

            document.getElementById("itemCode").value = concateText;
            
           
        
        }
    </script>

    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
</body>
</html>