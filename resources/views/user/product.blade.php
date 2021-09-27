
<div class="latest-products">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="section-heading">
            <h2>Latest Products</h2>
            <a href="products.html">view all products <i class="fa fa-angle-right"></i></a>
            <form class="d-flex " action="{{url('search')}}" method="get">
              @csrf
              <div class="input-group">
                  <input type="search" class="form-control form-control-sm" name="search" placeholder="search..." aria-label="Recipient's username" aria-describedby="button-addon2">
                  <button class="btn btn-sm btn-success " type="submit" id="button-addon2"><i class="fa fa-search"></i></button>
                </div>
             </form> 
          </div>
        </div>
        @foreach($data as $product)
            
        <div class="col-md-4">
          <div class="product product-caption ">
            <a href="#"><img src="productimage/{{$product->image}}" height="200px" width="200px" alt=""></a>
            <div class="down-content">
              <a href="#"><h4>{{$product->title}}</h4></a>
              <h6>Rs.-{{$product->price}} ₹</h6>
              <p>{{$product->description}}</p>
              <form action="{{url('addcart',$product->id)}}" method="POST">
                @csrf
              <input type="number" class="form-control" style="width:100px;" value="1" min="1" name="quantity">
               <br>
               <input type="submit" class="btn btn-primary" value="Add cart">
              </form>  
          </div>
          </div>
         </div>
      @endforeach
       @if(method_exists($data,'links'))
      <div class="d-flex justify-content-center" style="margin-top: 20px">

         {!! $data->links() !!}
     
     @endif
        </div>
    </div>
    </div>
  </div>
