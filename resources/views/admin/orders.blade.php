@extends('layouts.admin_layouts')

@section('content')


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">


      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Orders</h1>
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

                    <th class="sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">№ order
                    </th>

                    <th class="sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">User Name
                    </th>

                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Total Sum
                    </th>

                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Payment
                    </th>

                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Delivery
                    </th>

                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Status
                    </th>

                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Details
                    </th>

                  </thead>

                  <tbody>


                  @foreach($orders as $key => $value)
                    <tr role="row" class="even">
                      <td class="sorting_1 dtr-control">{{ $value->id }}</td>
                      <td>{{ $value->user->name }}</td>
                      <td>{{ $value->total_sum }}</td>
                      <td>{{ $value->payment }}</td>
                      <td>{{ $value->delivery }}</td>
                      <td>Pending</td>
                      <td>
                        <a href="{{ route('detail_order_user', $value->id) }}" type="button" class="btn btn-block btn-primary btn-xs">Details</a>
                      </td>
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