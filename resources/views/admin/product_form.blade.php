@extends('layouts.admin_layouts')

@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Admin Form</h1>
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
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-6">
            <div class="card">

              <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Product</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->

              <form action="{{ route('save_product') }}" method="post" enctype="multipart/form-data">
                @csrf

                <br>
                <img id="preimage" src="" height="120px" >

                <div class="card-body">
                  <div class="form-group">

                    <label for="exampleInputFile">File input</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" name="photo" class="custom-file-input" id="exampleInputFile" onchange="loadfile(event)">
                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                      </div>
                      <div class="input-group-append">
                        <span class="input-group-text" id="">Upload</span>
                      </div>
                    </div>
                  </div>

                  <!-- categories -->
                  <div class="form-group">
                    <label for="exampleFormControlSelect1">Choose Category</label>
                    <select name="category" class="form-control" id="exampleFormControlSelect1">

                        @foreach($categories as $key => $value)
                          <option value="{{ $value->id }}">
                            {{ $value->category }}
                          </option>
                        @endforeach
                        
                    </select>
                  </div>

                  @error('category')
                    <div class="alert alert-danger">
                      {{ $message }}
                    </div>
                  @enderror
                                  
                  <!-- name -->
                  <div class="form-group">
                    <label for="inputName">Name</label>
                    <input type="text" name="name" class="form-control" id="inputName" placeholder="Name of the product">
                  </div>

                  @error('name')
                    <div class="alert alert-danger">
                      {{ $message }}
                    </div>
                  @enderror

                  <!-- price -->
                  <div class="form-group">
                    <label for="inputPrice">Price</label>
                    <input type="number" name="price" class="form-control" id="inputPrice" placeholder="Price of the product">
                  </div>

                  @error('price')
                    <div class="alert alert-danger">
                      {{ $message }}
                    </div>
                  @enderror

                  <!-- description -->
                   <div class="form-group">
                    <label for="exampleFormControlTextarea1">Description</label>
                    <textarea type="text" name="description" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                  </div>

                  <div class="form-group form-check">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1" name="is_active" value="1">
                    <label class="form-check-label" for="exampleCheck1">Active product</label>
                  </div>

                </div>
                <!-- /.card-body -->


                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
            <!-- /.card -->

              
            </div>

            <div class="card card-primary card-outline">
              <div class="card-body">
                <h5 class="card-title">Card title</h5>

                <p class="card-text">
                  Some quick example text to build on the card title and make up the bulk of the card's
                  content.
                </p>
                <a href="#" class="card-link">Card link</a>
                <a href="#" class="card-link">Another link</a>
              </div>
            </div><!-- /.card -->
          </div>
          <!-- /.col-md-6 -->
          <div class="col-lg-6">
            <div class="card">
              <div class="card-header">
                <h5 class="m-0">Featured</h5>
              </div>
              <div class="card-body">
                <h6 class="card-title">Special title treatment</h6>

                <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                <a href="#" class="btn btn-primary">Go somewhere</a>
              </div>
            </div>

            <div class="card card-primary card-outline">
              <div class="card-header">
                <h5 class="m-0">Featured</h5>
              </div>
              <div class="card-body">
                <h6 class="card-title">Special title treatment</h6>

                <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                <a href="#" class="btn btn-primary">Go somewhere</a>
              </div>
            </div>
          </div>
          <!-- /.col-md-6 -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->


  <script type="text/javascript">
    function loadfile(event) {
      var output=document.getElementById('preimage');
      output.src=URL.createObjectURL(event.target.files[0]);
    };
  </script>

@endsection