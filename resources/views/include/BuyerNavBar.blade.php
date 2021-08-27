<nav class="navbar navbar-expand-lg navbar-dark bg-primary" style="background: linear-gradient(90deg, rgba(233,255,4,1) 0%, rgba(1,21,81,1) 0%, rgba(1,21,81,1) 30%, rgba(1,21,81,1) 61%, rgba(1,21,81,1) 100%);">
<a class="navbar-brand" href="/"><img src="SystemImage/logov1.png" style="width: 200px;" alt=""></a>
<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse justify-content-end text-uppercase font-weight-bold" id="navbarNavDropdown">
    <ul class="navbar-nav">
    <li class="nav-item active">
        <a class="nav-link" href="/">Home</a>
      </li>
    <li class="nav-item active">
        <a class="nav-link" href="#">Language</a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" data-toggle="modal" data-target=".bd-mycol-modal-lg" href="#">My store</a>
      </li>
     
      <li class="nav-item active">
        <a class="nav-link" data-toggle="modal" data-target=".bd-orderTrack-modal-lg" href="#">Track my order <span class="badge badge-primary">{{$orderTrackNoti}}</span></a>
      </li>

      <li class="nav-item active">
        <a class="nav-link" href="/Help">Help</a>
      </li>
      
      @guest
                            @if (Route::has('login'))
                                <li class="nav-item active">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                            <li class="nav-item dropdown active">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                  Register
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                  <a class="dropdown-item" href="/SignUpseller">As a Seller</a>
                                  <a class="dropdown-item" href="/Buyersignup">As a Customer</a>
                                </div>
                              </li>
                            @endif
                        @else
                        <li class="nav-item active">
                          <a class="nav-link" href="/BuyerProfile/{{ Auth::user()->name }}">Account</a>
                        </li>
                        <li class="nav-item active">
                          <a class="nav-link" data-toggle="modal" data-target=".bd-example-modal-lg" href="#">Wish List <span class="badge badge-primary">{{$categories}}</span></a>
                        </li>
                            <li class="nav-item dropdown active">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
      
    </ul>
  </div>
</nav>

<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content ">
      <div class="container mt-4">
      <h4>Wish list</h4><hr>
        <div class="row">
        @foreach($items as $wishlist)
          <div class="col-6">
            
              <a  href="/BuyItem/{{$wishlist->itemCode}}/{{$wishlist->seller}}"><p>{{$wishlist->itemName}}</p></a><hr style="border-top: 1px solid silver;">
           
          </div>
          <div class="col-6">
              <p class="text-secondary">{{$wishlist->created_at}} <a href="/wishlistremove/{{$wishlist->id}}"><i class="fa fa-times text-danger" aria-hidden="true"></i></a></p><hr style="border-top: 1px solid silver;">
            
          </div>
          
          @endforeach
          
        </div>
      </div>
    </div>
  </div>
</div>

<!-- order tracking data -->
<div class="modal fade bd-orderTrack-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content ">
      <div class="container mt-4">
      <h4>Order tracking</h4><hr>
        <div class="row">
        @foreach($orderTrackDetails as $tracking)
          <div class="col-12">
            
            <p>Your parcel (Item code {{$tracking->id}}) ready to shipped. <a class="text-primary" href="/ordertrack/{{$tracking->id}}">Track my order</a> {{$tracking->created_at}}</p>
              
           
          </div>
          
          @endforeach
          
        </div>
      </div>
    </div>
  </div>
</div>

<!-- my collection data -->
<div class="modal fade bd-mycol-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content ">
      <div class="container mt-4">
      <h4>My Collection</h4><hr>
        <div class="row">
        @foreach($mycol as $myCollection)
          <div class="col-12">
            
            <p>Your parcel (Item code {{$myCollection->id}}) ready to shipped. <a class="text-primary" href="/ordertrack/{{$myCollection->id}}">Track my order</a> {{$myCollection->created_at}}</p>
              
           
          </div>
          
          @endforeach
          
        </div>
      </div>
    </div>
  </div>
</div>