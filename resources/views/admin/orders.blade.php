<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Corona Admin</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"/>
   
        <!-- plugins:css -->
        @include('admin.css')
  </head>
  <body>
    
  <div class="container-scroller">
      <!-- partial:partials/_sidebar.html -->
      @include('admin.sidebar')
      <!-- partial -->
      @include('admin.navbar')
        <!-- partial -->
        <div class="container-fluid page-body-wrapper" >
          <div class="container"  style="padding-top:50px;color:white;">
          <form method="get" action="{{url('search')}}">
          <input type="text" name="search" style="margin-bottom: 20px;color:#fb5849;">
          <input type="submit"  value="search" class="btn btn-success">
          </form>
        <table class="table table-striped">
        <thead>

       
          <tr style="background-color:#fb5849;">
            <th style="color:white;">Name</th>
            <th style="color:white;">Phone</th>
            <th style="color:white;">Adresse</th>
            <th style="color:white;width:54px;padding-left:40px;">FoodName</th>
            <th style="color:white;width:54px;padding-left:40px;">Price</th>
            <th style="color:white;width:54px;padding-left:10px;">Quantity</th>
            <th style="color:white;width:54px;">Total Price</th>
          </tr>
          </thead>
          <tbody>
          @foreach($orders as $data11)
          
         
          <tr>
            
        
           <td style="color:white;">{{$data11->name}}</td>
           <td style="color:white;">{{$data11->phone}}</td>
           <td style="color:white;">{{$data11->adress}}</td>
           <td style="color:white;">{{$data11->foodname}}</td>
           <td style="color:white;">{{$data11->price}} $</td>
           <td style="color:white;">{{$data11->quantity}}</td>
           <td style="color:white;">{{$data11->price * $data11->quantity}} $</td>

          
          </tr>
                                                    
          @endforeach
          </tbody>    
        
        
      </table>
        </div>
        </div>
        </div>
          <!-- partial -->
       
    <!-- container-scroller -->
    <!-- plugins:js -->
    @include('admin.scripts')
    <!-- End custom js for this page -->
  </body>
</html>