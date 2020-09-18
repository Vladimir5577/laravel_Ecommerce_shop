<div class="col-lg-3">

    <h1 class="my-4">My Shop</h1>
    <div class="list-group">

      <a href="{{ route('shop') }}" class="list-group-item">All products</a>

      @foreach(Shop::get_categories() as $key => $value)
        <a href="" class="list-group-item ">{{ $value->category }}</a>
      @endforeach

      <!-- <a href="#" class="list-group-item">Category 1</a>
      <a href="#" class="list-group-item">Category 2</a>
      <a href="#" class="list-group-item">Category 3</a> -->
    </div>

  </div>
  <!-- /.col-lg-3 -->

