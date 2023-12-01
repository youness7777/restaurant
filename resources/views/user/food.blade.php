<!-- ***** Menu Area Starts ***** -->
<section class="section" id="menu">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="section-heading">
                        <h6>Our Menu</h6>
                        <h2>Our selection of cakes with quality taste</h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="menu-item-carousel">
            <div class="col-lg-12">
                <div class="owl-menu-item owl-carousel">
                    @foreach($data as $fd)
                    <form action="{{url('add_cart',$fd->id)}}" method="POST">
                        @csrf
                    <div class="item">
                        <div style="background-image: url('/foodimage/{{$fd->image}}');" class='card'>
                            <div class="price"><h6>{{$fd->price}}</h6></div>
                            <div class='info'>
                              <h1 class='title'>{{$fd->title}}</h1>
                              <p class='description'>{{$fd->description}}</p>
                              <div class="main-text-button">
                                  <div class="scroll-to-section"><a href="#reservation">Make Reservation <i class="fa fa-angle-down"></i></a></div>
                              </div>
                            </div>
                        </div>
                        <input type="number" name="quantity" min="0" style="width: 80px;">
                        <button type="submit" style="background: none; border: none; padding: 0;">
                            <i class="fa-solid fa-cart-shopping fa-lg" style="color: #e24b4b;"></i>
                         </button>
                    </div>
                    </form>
                   @endforeach
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Menu Area Ends ***** -->