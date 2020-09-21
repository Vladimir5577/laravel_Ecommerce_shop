@extends('layouts.shop_layout')


@section('content')



  <!-- Page Content -->
  <div class="container">

    <div class="row">

      @include('layouts.side_nav')

      <div class="col-lg-9"> 

        <h1>My Cart</h1>

          @if(session('deleted_cart_item'))
            <div class="alert alert-success">
              <h3>{{ session('deleted_cart_item') }}</h3>
            </div>
          @endif
      
        <div class="row">

           <table class="table table-hover">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Photo</th>
                <th scope="col">Name</th>
                <th scope="col">Price</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>

              @php 
                $i = 0; 
                $total_sum = [];
                $user_products = [];
              @endphp

              @foreach($products as $key => $value)

                <tr>
                  <th scope="row">@php $i++; @endphp {{ $i }}</th>

                  <td>
                    <img style="height:130px; width: 150px" class="card-img-top" src="{{ asset('images/' . $value->photo) }}" alt="">
                  </td>

                  <td>{{ $value->name }}</td>

                  <td>
                    {{ $value->price }} 
                    @php array_push($total_sum, $value->price) @endphp
                  </td>

                  <td>
                    <a href="{{ route('cart_delete_product', $value->id) }}" class="btn btn-danger btn-sm" onclick="sweetalert(event)">Delete</a>
                  </td>

                  @php
                    array_push($user_products, $value->id)
                  @endphp

                </tr>

              @endforeach

            </tbody>
          </table>

          @php 
            $total = array_sum($total_sum);
            $user_products_serialize = serialize($user_products);
            session()->put('total_sum', $total) ; 
            session()->put('user_products', $user_products_serialize);
          @endphp

          <h2>Total sum: <strong>{{ $total }}</strong> $</h2>
          <p>&nbsp; &nbsp; &nbsp;</p>
          <a href="{{ route('shop') }}" class="btn btn-primary">Continue shoping</a>


        </div>
        <!-- /.row -->
        <br>

        @if(Auth::user())
          @if(Shop::cart_count() > 0)
            <a href="{{ route('submit_order_page') }}" class="btn btn-success btn-lg btn-block" >Submit order</a>
          @else
            <div class="alert alert-warning">
              <h3>Your cart is empty</h3>
            </div>
          @endif
        @endif

      </div>
      <!-- /.col-lg-9 -->

    </div>
    <!-- /.row -->

  </div>
  <!-- /.container -->

  <br><br>

   <!-- alert script -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
  <!-- alert -->
  <script type="text/javascript">
    function sweetalert(e) {
      e.preventDefault();
      const swalWithBootstrapButtons = Swal.mixin({
        customClass: {
          confirmButton: 'btn btn-success',
          cancelButton: 'btn btn-danger'
        },
        buttonsStyling: false
      })

      swalWithBootstrapButtons.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Yes, delete it!',
        cancelButtonText: 'No, cancel!',
        reverseButtons: true
      }).then((result) => {
        if (result.value) {
          swalWithBootstrapButtons.fire(
            'Deleted!',
            'Your file has been deleted.',
            'success'
          )
          window.location = e.target.getAttribute("href");
        } else if (
          /* Read more about handling dismissals below */
          result.dismiss === Swal.DismissReason.cancel
        ) {
          swalWithBootstrapButtons.fire(
            'Cancelled',
            'Your imaginary file is safe :)',
            'error'
          )
        }
      })
    }
  </script>



@endsection