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
          <form method="get" action="{{url('search_reservation')}}">
          <input type="text" name="se" style="margin-bottom: 20px;color:#fb5849;">
          <input type="submit" value="search"  class="btn btn-success">
          </form>
        <table class="table table-striped">
        <thead>

       
          <tr style="background-color:#fb5849;">
            <th style="color:white;">Name</th>
            <th style="color:white;">Phone</th>
            <th style="color:white;">guest</th>
            <th style="color:white;width:54px;padding-left:40px;">date</th>
            <th style="color:white;width:54px;padding-left:40px;">time</th>
            <th style="color:white;width:54px;padding-left:10px;">message</th>
           
          </tr>
          </thead>
          <tbody>
          @foreach($r as $data11)
          
         
          <tr>
            
        
           <td style="color:white;">{{$data11->name}}</td>
           <td style="color:white;">{{$data11->phone}}</td>
           <td style="color:white;">{{$data11->guest}}</td>
           <td style="color:white;">{{$data11->date}}</td>
           <td style="color:white;">{{$data11->time}}</td>
           <td style="color:white;">{{$data11->message}}</td>
           

          
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