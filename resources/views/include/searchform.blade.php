<form class="md-form form-sm mt-0 text-center" action="/Searchitem" method="get">
            {{csrf_field()}}
      <div class="container mt-3">
        <div class="row justify-content-center"        >
            <div class="col-md-8">        
                <div class="input-group">     
                    <!-- search box    -->
                    <input type="search" class="form-control rounded input-lg" name="Search" placeholder="Search" aria-label="Search" aria-describedby="search-addon" />
                    <!-- search button -->
                    <button type="submit" class="btn btn-warning"><i class="fa fa-search"></i></button>
                </div>        
            </div> 
                    
        </div>        
      </div>      
</form>