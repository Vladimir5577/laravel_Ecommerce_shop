@extends('layouts.admin_layouts')

@section('content')


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">


      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>№ Order: {{ $order->id }}</h1>
            <h3 class="m-0 text-dark">Name: {{ $order->user->name }}</h3>
            <h4>Total price: {{ $order->total_sum }} $</h4>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Starter Page</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">

      <div class="col-sm-12"><table id="example2" class="table table-bordered table-hover dataTable dtr-inline" role="grid" aria-describedby="example2_info">
          <thead>
          <tr role="row">

            <th class="sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">id
            </th>

            <th class="sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">User Name
            </th>

            <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Total Sum
            </th>


            <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Status
            </th>

            <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Details
            </th>

          </thead>

          <tbody>

            @foreach($products as $key => $value)
              <tr role="row" class="even">
                  <td class="sorting_1 dtr-control">{{ $value->id }}</td>
                  <td><img src="{{ asset('images/' . $value->photo) }}"></td>
                  <td>{{ $value->name }}</td>
                  <td>{{ $value->price }}</td>
                  <td></td>
                  <td>A</td>
              </tr>
            @endforeach

           <!--  <tr role="row" class="even">
              <td class="sorting_1 dtr-control">Gecko</td>
              <td>Firefox 1.5</td>
              <td>Win 98+ / OSX.2+</td>
              <td>1.8</td>
              <td>A</td>
            </tr> -->


        </tbody>
         
        </table>
      </div>
              
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->


  

@endsection