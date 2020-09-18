@extends('layouts.admin_layouts')

@section('content')

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.css">

  <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

<!--   <script
  src="https://code.jquery.com/jquery-3.5.1.min.js"
  integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
  crossorigin="anonymous"></script> -->
  
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.js"></script>



  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">

      @if(session('success'))
        <div class="alert alert-success">
          <h3>{{ session('success') }}</h3>
        </div>
      @endif

      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Products</h1>
            <a href="{{ route('product_form') }}" class="btn btn-success">
                Add Product
            </a>
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

        <table id="table_id" class="display_1" style="width:100%">
          <thead>
              <tr>
                  <th>Photo</th>
                  <th>Id</th>
                  <th>Category</th>
                  <th>Name</th>
                  <th>Price</th>
                  <th>Is active</th>
                  <th>Action</th>
              </tr>
          </thead>
           
      </table>
      
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->


  <script type="text/javascript">

          $(document).ready( function () {
          $('#table_id').DataTable({
            processing: true,
            serverSide:true,
            ajax: '{{ route("product_ajax") }}',
            columns: [
            
              { data: 'photo',
                   name: 'photo',
                  render: function(data, type, full, meta) {
                    return "<img height='100px' src={{ URL::to('/') }}/images/" + data + ">";
                  },

                  orderable: false
               },
               
              { data: 'id', name: 'id' },
              { data: 'category_id', name: 'category_id'},
              { data: 'name', name: 'name' },
              { data: 'price', name: 'price'},
              { data: 'is_active', name: 'is_active' },
              { data: 'action', name: 'action'},

            ]
          });
      } );
  </script>

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