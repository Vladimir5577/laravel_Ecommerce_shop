@extends('layouts.shop_layout')


@section('content')



  <!-- Page Content -->
  <div class="container">

    <div class="row">

      <div class="col-lg-9">

        <br>

        <h1>Form submission</h1>

        @php
          $total_sum = session()->pull('total_sum');
        @endphp

        <h3>Totall sum: {{ $total_sum }}</h3>

        <form action="{{ route('submit_user_order') }}" method="post">

          @csrf

          <input type="hidden" name="total_sum" value="{{ $total_sum }}">

          <!-- address -->
          <div class="form-group">
            <label for="address_field">Address</label>
            <input type="text" name="address" class="form-control" id="address_field" value="">
          </div>

          @error('address')
            <div class="alert alert-danger">
              {{ $message }}
            </div>
          @enderror

          <!-- phone -->
          <div class="form-group">
            <label for="phone_number">Phone number</label>
            <input type="number" name="phone" class="form-control" id="phone_number" value="">
          </div>

          @error('phone')
            <div class="alert alert-danger">
              {{ $message }}
            </div>
          @enderror

          <!-- Payment -->
          <div class="form-group">
            <label for="payment">Pay with</label>
            <select name="payment" class="form-control" id="payment">
              <option value="google">Google</option>  
              <option value="Yandex">Yandex</option>
              <option value="Credit card">Credir card</option>
            </select>
          </div>

          <!-- Payment -->
          <div class="form-group">
            <label for="payment">Delivery</label>
            <select name="delivery" class="form-control" id="delivery">
              <option value="Post">Post</option>  
              <option value="New Post">New Post</option>
              <option value="Cyrier service">Cyrier service</option>
            </select>
          </div>

          <button type="submit" class="btn btn-primary">Submit</button>

        </form>


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