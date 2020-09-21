<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Shop Homepage - Start Bootstrap Template</title>

  <!-- Bootstrap core CSS -->
  <link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="{{ asset('css/shop-homepage.css') }}" rel="stylesheet">

</head>

<body>

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
      <a class="navbar-brand" href="#">Start Bootstrap</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item active">
            <a class="nav-link" href="#">Home
              <span class="sr-only">(current)</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">About</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Services</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Contact</a>
          </li>
        </ul>


        <!-- Auth buttons -->
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                  <!-- Left Side Of Navbar -->
                  <ul class="navbar-nav mr-auto">

                  </ul>

                  <!-- Right Side Of Navbar -->
                  <ul class="navbar-nav ml-auto">
                      <!-- Authentication Links -->
                      <p> &nbsp;  &nbsp;</p>
                     @if (Route::has('login'))

                        @auth

                            <!-- <a href="{{ url('/dashboard') }}" class="text-sm text-gray-700 underline">Dashboard</a> -->
                        @else
                            <p> &nbsp;  &nbsp;</p>
                            <a href="{{ route('login') }}" class="btn btn-success">Already have an account? Login</a>  
                            <p> &nbsp;  &nbsp;</p>
                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="btn btn-success">Register to start shopping</a>
                            @endif
                        @endif
                      @endif
                  </ul>

                    

              </div>



              <p> &nbsp;  &nbsp;</p>

              @if(Auth::user())
                 <a href="{{ route('cart_show') }}" style="width: 150px" type="button" class="btn btn-block btn-danger btn-xs">Cart: 
                    <strong>
                      {{ Shop::cart_count() }}
                    </strong>
                 </a>

                 <p> &nbsp;  &nbsp;</p>

                 <form action="/logout" method="post">
                    @csrf
                    <button type="submit" class="btn btn-warning btn-xs"  onclick="sweetalert(event)">Logout</button>
                 </form>

              @endif

              @if(!(Auth::user()))
                <!--  <a style="width: 150px" type="button" class="btn btn-block btn-danger btn-xs">Cart</a> -->
              @endif

      </div>
    </div>
  </nav>



  @yield('content')



  <br><br><br>
  <!-- Footer -->
  <footer class="py-3 bg-dark" style=" position: fixed; left: 0; bottom: 0; width: 100%;">
    <div class="container">
      <p class="m-0 text-center text-white">Copyright &copy; Your Website 2020</p>
    </div>
    <!-- /.container -->
  </footer>

 <!-- alert script -->
  <!-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>

  <script type="text/javascript">
    function sweetalert(e) {
      e.preventDefault();
      Swal.fire('Any fool can use a computer');
      window.location = e.target.getAttribute("button");
    }
  </script> -->

  <!-- Bootstrap core JavaScript -->
  <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
  <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

</body>

</html>
