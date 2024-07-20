<nav class="navbar navbar-expand-lg navbar-light" style="background-color: orange">
  <div class="container">
  <div class="navbar-header">
          <!-- FOR MOBILE VIEW COLLAPSED BUTTON -->
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbarNav" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>

          <!-- LOGO -->       

          <!--  Image based logo  -->
          <!-- <a class="navbar-brand" href="index.html"><img src="assets/img/logo.png" alt="Logo img"></a>  --> 
          
          <!--  Text based logo  -->
           <a class="navbar-brand" href="{{ url('/') }}"><h2 style="font-family:fantasy" class="animate__animated animate__backInLeft"><b><span>RuchitTraders</span></b></h2></a>        

        
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{ url('/') }}">Home</a>
          </li>
        <li class="nav-item">
          <a class="nav-link " href="#">Aboutus</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ url('/category') }}">Category</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ url('/cart') }}">Cart
            <sup><span class="position-relative badge rounded-pill bg-primary cart-count">0</span><sup>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ url('/wishlist') }}">Wishlist
            <sup><span class="position-relative badge rounded-pill bg-danger wishlist-count">0</span><sup>
          </a>
        </li>
        
       <!-- Authentication Links -->
        @guest
          @if (Route::has('login'))
              <li class="nav-item">
                  <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
              </li>
          @endif

          @if (Route::has('register'))
              <li class="nav-item">
                  <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
          </li>
          @endif
        @else
          <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  {{ Auth::user()->name }}
              </a>
              <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <li>
                    <a class="dropdown-item" href="{{ url('my-orders') }}">
                      My Order
                    </a>
                  </li>
                  <li>
                    <a class="dropdown-item" href="#">
                      My Profile
                    </a>
                  </li>
                  <li>
                    <a class="dropdown-item" href="{{ route('logout') }}"
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                    </a>
                      <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                      </form>
                  </li>
              </ul>
        @endguest
        </ul>
          </div>
      </div>
  </div>
</nav>