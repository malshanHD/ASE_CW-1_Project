<!-- start navbar start-->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

<nav class="navbar navbar-expand-lg navbar-dark bg-primary" style="background: linear-gradient(90deg, rgba(233,255,4,1) 0%, rgba(1,21,81,1) 0%, rgba(1,21,81,1) 30%, rgba(1,21,81,1) 61%, rgba(1,21,81,1) 100%);">
<a class="navbar-brand" href="/"><img src="SystemImage/logov1.png" style="width: 200px;" alt=""></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>   
  <div class="collapse navbar-collapse justify-content-center text-uppercase font-weight-bold" id="navbarNavDropdown">
    <ul class="navbar-nav">
      <li class="nav-item active"> 
        <a class="nav-link" href="/Saledashboard">Dashboard</a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="/ItemInsert">New Item</a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" data-toggle="modal" data-target=".bd-inspect-modal-lg" href="#">Inspection Request <span class="badge badge-primary">{{$inspectnotify}}</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="/ItemDelete">Item Delete </a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" data-toggle="modal" data-target=".bd-notify-modal-lg" href="#">New Orders  <span class="badge badge-primary">{{$ordersCount}}</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="#">Check Feedbacks</a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="#">Messages</a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="/sellerProfle">Profile</a>
      </li>
      <li class="nav-item dropdown">
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
    </ul>
  </div>
</nav>
<!-- nav-bar end-->

<div class="modal fade bd-notify-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content ">
      <div class="container mt-4">
        <h4>Notifications</h4><hr>
        <div class="row">
        @foreach($orderDetails as $pay)
          <div class="col-12">
            
              <p>The item you submitted for the bid (Item Code {{$pay->itemCode}}) was won by a client named {{$pay->buyusername}}. {{$pay->buyusername}} has already paid for this and please activate the delivery process. <a  href="/delivery/{{$pay->id}}">Click here to activate delivery process</a></p><hr style="border-top: 1px solid silver;">
           
          </div>
          
          @endforeach
          
        </div>
      </div>
    </div>
  </div>
</div>

<div class="modal fade bd-inspect-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content ">
      <div class="container mt-4">
        <h4>Notifications</h4><hr>
        <div class="row">
        
          <div class="col-12">
          
          @foreach($inspectData as $inspect)

          <table class="table table-bordered table-dark">
              <thead>
                <tr>
                  <th scope="col">Item Code</th>
                  <th scope="col">Date</th>
                  <th scope="col">Time</th>
                  <th scope="col">Email</th>
                  <th scope="col">confirm</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>{{$inspect->itemCode}}</td>
                  <td>{{$inspect->Date}}</td>
                  <td>{{$inspect->Time}}</td>
                  <td><a href="mailto:{{$inspect->Email}}">{{$inspect->Email}}</a></td>
                  <td><a href="#" ><i class="fa fa-check-circle text-success text-center" aria-hidden="true"></i></a></td>
                </tr>
               
              </tbody>
          </table>

          @endforeach

          </div>
                  
          
          
        </div>
      </div>
    </div>
  </div>
</div>
