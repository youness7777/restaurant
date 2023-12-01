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
          <div class="container"  style="padding-top:50px;color:white;margin-left:-5px;">
        <table class="table table-striped">
        <thead>

       
          <tr style="background-color: #fb5849;">
            <th style="color:white;">Nom de patient</th>
            <th style="color:white;">N°Tél</th>
            <th style="color:white;">Action</th>
          </tr>
          </thead>
          <tbody>
          @foreach($users as $RDadmin)
          
         
          <tr>
            
        
           <td style="color:white;">{{$RDadmin->name}}</td>
           <td style="color:white;">{{$RDadmin->email}}</td>
           @if($RDadmin->usertype=="0")
           <td>
           <a href="{{url('delete_users',$RDadmin->id)}}"> <i class="fa-regular fa-rectangle-xmark fa-beat fa-xl" style="color: #e2081e;margin-left:35px; " onclick="return confirm('etes-vous sur d annuler cette demande')"></i></a>
           </td>
           @else
           
           <td>
           <a style="color:white;">Not Allowed</a>
           </td>
           @endif
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