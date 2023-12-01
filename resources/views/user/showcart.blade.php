<!DOCTYPE html>
<html lang="en">

  <head>
<base href="/public"></base>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400;500;600;700&display=swap" rel="stylesheet">
 <!-- plugins:css -->
 <base>
 <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <title>Klassy Cafe - Restaurant HTML Template</title>
<!--
    
TemplateMo 558 Klassy Cafe

https://templatemo.com/tm-558-klassy-cafe

-->
    <!-- Additional CSS Files -->
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"/>

    <link rel="stylesheet" href="assets/css/templatemo-klassy-cafe.css">

    <link rel="stylesheet" href="assets/css/owl-carousel.css">

    <link rel="stylesheet" href="assets/css/lightbox.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    </head>
    
    <body>
    

    <!-- ***** Preloader Start ***** -->
    <div id="preloader">
        <div class="jumper">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>  
    <!-- ***** Preloader End ***** -->
    
    
    <!-- ***** Header Area Start ***** -->
    <header class="header-area header-sticky">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav class="main-nav">
                        <!-- ***** Logo Start ***** -->
                        <a href="index.html" class="logo">
                            <img src="assets/images/klassy-logo.png" align="klassy cafe html template">
                        </a>
                        <!-- ***** Logo End ***** -->
                        <!-- ***** Menu Start ***** -->
                        <ul class="nav">
                            <li class="scroll-to-section"><a href="http://127.0.0.1:8000/redirects" class="active">Home</a></li>
                            <li class="scroll-to-section"><a href="#about">About</a></li>
                           	
                        <!-- 
                            <li class="submenu">
                                <a href="javascript:;">Drop Down</a>
                                <ul>
                                    <li><a href="#">Drop Down Page 1</a></li>
                                    <li><a href="#">Drop Down Page 2</a></li>
                                    <li><a href="#">Drop Down Page 3</a></li>
                                </ul>
                            </li>
                        -->
                            <li class="scroll-to-section"><a href="#menu">Menu</a></li>
                            <li class="scroll-to-section"><a href="#chefs">Chefs</a></li> 
                            <li class="submenu">
                                <a href="javascript:;">Features</a>
                                <ul>
                                    <li><a href="#">Features Page 1</a></li>
                                    <li><a href="#">Features Page 2</a></li>
                                    <li><a href="#">Features Page 3</a></li>
                                    <li><a href="#">Features Page 4</a></li>
                                </ul>
                            </li>
                            <!-- <li class=""><a rel="sponsored" href="https://templatemo.com" target="_blank">External URL</a></li> -->
                            <li class="scroll-to-section"><a href="#reservation">Contact Us</a></li> 
                            @auth
                            <a href="{{url('show_cart',Auth::user()->id)}}" >
                            <i class="fa-solid fa-cart-shopping fa-beat fa-lg" style="color: #e24b4b; padding-top:20px;padding-left:20px;">{{$count}} </i>
                            </a>
                           @endauth
                           @guest 
                           <i class="fa-solid fa-cart-shopping fa-beat fa-lg" style="color: #e24b4b; padding-top:20px;padding-left:20px;"> </i>
                           @endguest
                           </a>

                            <li>@if (Route::has('login'))
                <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                    @auth
                     <li>
                      <x-app-layout>
  
                     </x-app-layout>
                      </li>
                    @else
                    <li> <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a>  </li>

                        @if (Route::has('register'))
                        <li>  <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>  </li>
                        @endif
                    @endauth
                </div>
            @endif
              </li>
              
                        </ul>        
                        
                        <!-- ***** Menu End ***** -->
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <div class="container"  style="padding: 140px;">
  
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
    },3000);
  });
</script>


  <table class="table table-dark table-striped"  >
        <thead>
          <tr align="center">
            <th>Food Name</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Status</th>
          </tr>
        </thead>
        <tbody>

        <form method="post" action="{{url('confirm_order')}}">
            @csrf
            @foreach($show as $RD)
           
          <tr align="center">
             <td> 
                <input type="text" name="foodname[]" value="{{$RD->title}}" hidden="" >
                {{$RD->title}}
            </td>

             <td>
             <input type="text" name="price[]" value="{{$RD->price}}" hidden="" >
                {{$RD->price}} $
            </td>

             <td>
             <input type="text" name="quantity[]" value="{{$RD->quantity}}" hidden="" >
                {{$RD->quantity}}
            </td>
            
            <td>
            @foreach($data2 as $dt)
            @if ($RD->food_id === $dt->food_id) <!-- Comparing food_id to match the current food -->
                    <a href="{{url('delete_cart',$dt->id)}}"> 
                        <i class="fa-regular fa-rectangle-xmark fa-beat fa-xl" style="color: #e2081e; font-size:27px" onclick="return confirm('etes-vous sûr d annuler cette demande')"></i>
                    </a>
                @endif
            @endforeach
        </td>
          </tr>
@endforeach
        </tbody>
      </table>
      <div align="center">
        <button class="btn btn-outline-primary" type="button" id="order">order Now</button>
      </div>
     
        
      <div id="appear" align="center" style="padding: 10px;display: none;" >
         <div style="padding: 10px;">
            <label>Name</label>
            <input type="text" name="name" placeholder="enter your name">
         </div>
         <div style="padding: 10px;">
            <label>Phone</label>
            <input type="text" name="phone" placeholder="enter your phone number">
         </div>
         <div style="padding: 10px;">
            <label>Adresse</label>
            <input type="text" name="adresse" placeholder="enter your adress">
         </div>
        
         <div style="padding: 10px;">
            
            <input class="btn btn-outline-success" type="submit" value="Order Confirm">
            <input class="btn btn-outline-danger" id="close" type="button" value="Close">
         </div>
         </div>
      </div>
      </form>
     

  <script type="text/javascript">
      $("#order").click(
             function()
             {
                $("#appear").show();
             }

    );

    $("#close").click(
             function()
             {
                $("#appear").hide();
             }

    );


    </script>
          <!-- partial -->
       
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="assets/js/jquery-2.1.0.min.js"></script>

    <!-- Bootstrap -->
    <script src="assets/js/popper.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>

    <!-- Plugins -->
    <script src="assets/js/owl-carousel.js"></script>
    <script src="assets/js/accordions.js"></script>
    <script src="assets/js/datepicker.js"></script>
    <script src="assets/js/scrollreveal.min.js"></script>
    <script src="assets/js/waypoints.min.js"></script>
    <script src="assets/js/jquery.counterup.min.js"></script>
    <script src="assets/js/imgfix.min.js"></script> 
    <script src="assets/js/slick.js"></script> 
    <script src="assets/js/lightbox.js"></script> 
    <script src="assets/js/isotope.js"></script> 
   
    <!-- Global Init -->
    <script src="assets/js/custom.js"></script>
    <script>

        $(function() {
            var selectedClass = "";
            $("p").click(function(){
            selectedClass = $(this).attr("data-rel");
            $("#portfolio").fadeTo(50, 0.1);
                $("#portfolio div").not("."+selectedClass).fadeOut();
            setTimeout(function() {
              $("."+selectedClass).fadeIn();
              $("#portfolio").fadeTo(50, 1);
            }, 500);
                
            });
        });

    </script>
  </body>
</html>