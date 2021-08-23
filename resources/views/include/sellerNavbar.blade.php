<!-- start navbar start-->
<nav class="navbar navbar-expand-lg navbar-dark bg-primary" style="background: linear-gradient(90deg, rgba(233,255,4,1) 0%, rgba(1,21,81,1) 0%, rgba(1,21,81,1) 30%, rgba(1,21,81,1) 61%, rgba(1,21,81,1) 100%);">
<a class="navbar-brand" href="/"><img src="SystemImage/logov1.png" style="width: 200px;" alt=""></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse justify-content-center text-uppercase font-weight-bold" id="navbarNavDropdown">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="/Saledashboard">Sales Dashboard</a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="/ItemInsert">New Item </a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="#">Check Orders</a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="#">Check Feedbacks</a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="#">Messages</a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="/Help">Help</a>
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