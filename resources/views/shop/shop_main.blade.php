@extends('layouts.shop_layout')


@section('content')



  <!-- Page Content -->
  <div class="container">

    <div class="row">

      @include('layouts.side_nav')

      <div class="col-lg-9">

        <div id="carouselExampleIndicators" class="carousel slide my-4" data-ride="carousel">
          <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
          </ol>
          <div class="carousel-inner" role="listbox">
            <div class="carousel-item active">
              <img style="width: 900px; height: 350px" class="d-block img-fluid" src="{{ asset('shop_image/1_shop.jpeg') }}" alt="First slide">
            </div>
            <div class="carousel-item">
              <img style="width: 900px; height: 350px" class="d-block img-fluid" src="{{ asset('shop_image/2_shop.jpg') }}" alt="Second slide">
            </div>
            <div class="carousel-item">
              <img style="width: 900px; height: 350px" class="d-block img-fluid" src="{{ asset('shop_image/3_shop.png') }}" alt="Third slide">
            </div>
          </div>
          <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
        </div>

        @if(session('product_added'))
          <div class="alert alert-success">
            <h1>{{ session('product_added') }}</h1>
          </div>
        @endif

        @if(session('order_confirmed'))
          <div class="alert alert-success">
            <h1>{{ session('order_confirmed') }}</h1>
          </div>
        @endif

        <div class="row">

          @foreach($products as $key => $value)

            <div class="col-lg-4 col-md-6 mb-4">
              <div class="card h-100">
                <a href=""><img style="height:200px;" class="card-img-top" src="{{ asset('images/' . $value->photo) }}" alt=""></a>
                <div class="card-body">
                  <h4 class="card-title">
                    <a href="{{ route('show_item', $value->id) }}">{{ $value->name }}</a>
                  </h4>
                  <h5>$ {{ $value->price }}</h5>
                  <p class="card-text">{{ $value->description }}</p>
                </div>
                <div class="card-footer">
                  <small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9734;</small>

                  @if(Auth::user())
                    @if(Shop::product_in_cart($value->id))
                     <a href="{{ route('add_to_user_cart', $value->id) }}" class="btn btn-block btn-success btn-xs">Add to the card</a>
                    @else
                      <button type="button" class="btn btn-block btn-warning btn-xs">Product in your cart</button>
                    @endif
                  @endif

                  @if(!(Auth::user()))
                    <!-- <a href="" class="btn btn-block btn-primary btn-xs">Add to the card</a> -->
                  @endif

                </div>
              </div>
            </div>

          @endforeach


          

<!--           <div class="col-lg-4 col-md-6 mb-4">
            <div class="card h-100">
              <a href="#"><img class="card-img-top" src="http://placehold.it/700x400" alt=""></a>
              <div class="card-body">
                <h4 class="card-title">
                  <a href="#">Item Six</a>
                </h4>
                <h5>$24.99</h5>
                <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet numquam aspernatur!</p>
              </div>
              <div class="card-footer">
                <small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9734;</small>
              </div>
            </div>
          </div> -->

        </div>
        <!-- /.row -->

      </div>
      <!-- /.col-lg-9 -->

    </div>
    <!-- /.row -->

  </div>
  <!-- /.container -->



@endsection