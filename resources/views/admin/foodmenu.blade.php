<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Corona Admin</title>
    
        <!-- plugins:css -->
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        @include('admin.css')
  </head>
  <body>
    <div class="container-scroller">
      
      <!-- partial:partials/_sidebar.html -->
      @include('admin.sidebar')
      <!-- partial -->
      @include('admin.navbar')
        <!-- partial -->
  <div class="container-fluid page-body-wrapper">
      
    
      <div class="login-box">
        @if (session()->has('message'))
  <div id="success-alert" class="alert alert-success">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&check;</span>
    </button>
    {{ session()->get('message') }}
  </div>
@endif


<script>
  $(document).ready(function() {
    // Ajouter la classe "show" pour afficher l'alerte
    $('#success-alert').addClass('show');
    
    // Supprimer la classe "show" après 5 secondes (5000 millisecondes)
    setTimeout(function() {
      $('#success-alert').removeClass('show').addClass('hide');
    }, 3000);
  });
</script>


      <!--<h2>Login</h2>-->
     <form method="POST" enctype="multipart/form-data" action="{{url('addfood')}}">
        @csrf
    <div class="user-box">
      <input type="text" name="title" required="">
      <label>title</label>
    </div>
    <div class="user-box">
      <input type="text" name="price" required="">
      <label>price</label>
    </div>
   
    <div class="user-box">
      <input type="file" name="file" required="">
    </div>
    
    <div class="user-box">
      <input type="text" name="description" required="">
      <label>Description</label>
      
    </div>
  
    
    <a href="#" >
      <span></span>
      <span></span>
      <span></span>
      <span></span>
      <button type="submit">
      Submit
      </button>
    </a>
    
  </form>
  </div>
  
 </div>
          <!-- partial -->
       
    <!-- container-scroller -->
    <!-- plugins:js -->
    @include('admin.scripts')
    <!-- End custom js for this page -->
  </body>
</html>