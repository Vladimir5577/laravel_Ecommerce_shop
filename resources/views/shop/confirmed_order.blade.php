@extends('layouts.shop_layout')


@section('content')



  <!-- Page Content -->
  <div class="container">

    <div class="row">

      <div class="col-lg-9">

        <br>

        <div class="alert alert-success">
          <h1>Your order has been confirmed successfully</h1>
        </div>

        <a href="{{ route('shop') }}" class="btn btn-success btn-lg btn-block">Back to shoping</a>
        


        <div class="row">
  
        </div>
        <!-- /.row -->
        <br>
      </div>
      <!-- /.col-lg-9 -->

    </div>
    <!-- /.row -->

  </div>
  <!-- /.container -->



@endsection