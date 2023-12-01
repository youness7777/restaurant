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
        <table class="table table-striped">
        <thead>

       
          <tr style="background-color:#fb5849;">
            <th style="color:white;">Name</th>
            <th style="color:white;">Speciality</th>
            <th style="color:white;">Images</th>
            <th style="color:white;width:54px;padding-left:40px;">action</th>
          </tr>
          </thead>
          <tbody>
          @foreach($chefs as $chef)
          
         
          <tr>
            
        
           <td style="color:white;">{{$chef->name}}</td>
           <td style="color:white;">{{$chef->speciality}}</td>
           <td style="color:white;"><img src="chefimage/{{$chef->image}}" style="width:74px;height:74px;"></td>
           <td>
           <a href="{{url('delete_chefs',$chef->id)}}"> <i class="fa-regular fa-rectangle-xmark fa-beat fa-xl" style="color: #e2081e;padding-left: 50px; font-size:27px" onclick="return confirm('etes-vous sur d annuler cette demande')"></i></a>
           <a href="{{url('edit_chefs',$chef->id)}}"><i class="fa-solid fa-pen fa-beat" style="color: #276286; font-size:24px; padding-left:20px; padding-right:40px;"></i>
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