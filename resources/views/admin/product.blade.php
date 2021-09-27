<!DOCTYPE html>
<html lang="en">
  <head>
  
    @include('admin.css')
  <style type="text/css">
  .title{
      color: white
      padding-top:45px;
      font-size:25px;
  }
  label{
      display: inline-block;
      width: 200px;
  }
  </style>
  </head>
  <body>
      <!-- partial -->
      @include('admin.sidebar')

      @include('admin.navbar')
              <!-- partial -->
  
              <div class="container-fluid page-body-wrapper">
                  <div class="container" align="center">
                   <h1 class="title">Add Product </h1>

                   @if(session()->has('message'))
                   <div class="alert alert-success">
                       <button type="button" class="close" data-dismiss="alert">x</button>
                       {{session()->get('message')}}
                   </div>
                   @endif  
                   
                   <form action="{{url('uploadproduct')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                  <div style="padding: 15px;">
                   <label>Product Title</label>
                   <input type="text" style="color: black" name="title" placeholder="Give a product title" required="">
                  </div> 
                  <div style="padding: 15px;">
                    <label>Price</label>
                    <input type="number" style="color: black" name="price" placeholder="Give a price" required="">
                   </div> 
                   <div style="padding: 15px;">
                    <label>Description</label>
                    <input type="text" name="des" style="color: black" placeholder="Give Description" required="">
                   </div> 
                   <div style="padding: 15px;">
                    <label>Quantity</label>
                    <input type="text" name="quant" style="color: black" placeholder="Give a product quantity" required="">
                   </div> 
           
                    <div style="padding: 15px;">
                    <input type="file" name="file">
                    </div>
                    <div style="padding: 15px;">
                        <input type="submit" value="submit" class="btn btn-success">
                    </div>   
                   </form>

                  </div>
              </div>         
            <!-- partial -->
            @include('admin.script')
  </body>
</html>