<!DOCTYPE html>
<html lang="en">
  <head>
  
    @include('admin.css')
  
  </head>
  <body>
      <!-- partial -->
      @include('admin.sidebar')

      @include('admin.navbar')
              <!-- partial -->
  
              <div class="container-fluid page-body-wrapper">
                <div class="container" align="center">
                <table>
                    <tr style="background-color: gray">
                        <td style=" padding:5px;">CUstomer Name</td>
                        <td style="padding:5px;">Phone</td>
                        
                        
                        <td style="padding:10px;">Address</td>
                        <td style="padding:10px;">Product Title</td>
                        <td style="padding:10px;">Price</td>
                        <td style="padding:10px;">Quantity</td>
                        <td style="padding:10px;">Status</td>
                        <td style="padding:10px;">Action</td>
                    </tr>
                    
                      @foreach ($order as $orders)
                      <tr style="background-color:black" align="center">
                          <td style="padding:10px;">{{$orders->name}}</td>
                          <td style="padding:10px;">{{$orders->phone}}</td>
                          <td style="padding:10px;">{{$orders->address}}</td>
                          <td style="padding:10px;">{{$orders->product_name}}</td>
                          <td style="padding:10px;">{{$orders->price}}</td>
                          <td style="padding:10px;">{{$orders->quantity}}</td>
                          <td style="padding:10px;">{{$orders->status}}</td>
                          <td style="padding:10px;">
                            <a class="btn btn-success" href="{{url('updatestatus',$orders->id)}}">Deliverd</a></td>
                      </tr>   
                      @endforeach   
                    
                </table>  
                </div>
              </div>           
            <!-- partial -->
            @include('admin.script')
  </body>
</html>