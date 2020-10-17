<!DOCTYPE html>
<html>
 @foreach ($Settings as $setting)

 @endforeach
 @foreach ($Promocion as $promocion)

 @endforeach
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>@if($Settings->isEmpty()) @else {{$setting->setting_nombre}}@endif</title>
    <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <!-- Our Custom CSS -->
    <link rel="stylesheet" href="../css/style3.css">
    <!-- Scrollbar Custom CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css">
    <!-- JS, Popper.js, and jQuery -->
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous">
    </script>
    <style style="text/css">
        div.slide-left {
          width:100%;
          overflow:hidden;
        }
        div.slide-left p {
          animation: slide-left 10s;
        }

        @keyframes slide-left {
          from {
            margin-left: 100%;
            width: 300%;
          }

          to {
            margin-left: 0%;
            width: 100%;
          }
        }
        </style>
      <!-- Custom styles for this template -->
      <link href="https://getbootstrap.com/docs/4.5/examples/carousel/carousel.css" rel="stylesheet">
      <!-- Bootstrap CSS CDN -->
      <!-- Our Custom CSS -->
      <link rel="stylesheet" href="https://bootstrapious.com/tutorial/sidebar/style3.css">
      <!-- Scrollbar Custom CSS -->
      <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css">

        <link href="../css/main.css" rel="stylesheet" type="text/css">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"
        integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous">
    </script>
    <link href="/dist/css/smart_cart.min.css" rel="stylesheet" type="text/css">
    <script type="text/javascript" src="/dist/js/jquery.smartCart.min.js"></script>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
        integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <!-- Font Awesome JS -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>

</head>
<header>


    <!-- Page Content  -->
    <div id="content mt-2">

        <nav class="navbar navbar-expand-lg navbar-light navbar-default fixed-top" id="navbarmanual"
      style="     border: solid .05em orange;

        border-radius: 30px;"
        >
            <a class="navbar-brand" href="/">
                <img style="border-radius:70%;" src=" @if($Settings->isEmpty()) @else {{$setting->setting_logo}}@endif" width="50"
                    height="50" class="d-inline-block align-top" alt="">
                    @if($Settings->isEmpty()) @else <h5> {{$setting->setting_nombre}}</h5> @endif
            </a>

            <div class="container">

                <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fas fa-align-justify"></i>
                </button>


                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                        <button type="button" id="sidebarCollapse" class="btn btn-info">
                            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-cart4" fill="currentColor"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M0 2.5A.5.5 0 0 1 .5 2H2a.5.5 0 0 1 .485.379L2.89 4H14.5a.5.5 0 0 1 .485.621l-1.5 6A.5.5 0 0 1 13 11H4a.5.5 0 0 1-.485-.379L1.61 3H.5a.5.5 0 0 1-.5-.5zM3.14 5l.5 2H5V5H3.14zM6 5v2h2V5H6zm3 0v2h2V5H9zm3 0v2h1.36l.5-2H12zm1.11 3H12v2h.61l.5-2zM11 8H9v2h2V8zM8 8H6v2h2V8zM5 8H3.89l.5 2H5V8zm0 5a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0zm9-1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0z" />
                            </svg>
                        </button>
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <x-jet-dropdown-link href="{{ route('dashboard') }}">
                                    {{ Auth::user()->name }}
                                </x-jet-dropdown-link>
                                <div class="border-t border-blue-100"></div>
                                <!-- Authentication -->
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <x-jet-dropdown-link href="{{ route('logout') }}" onclick="event.preventDefault();
                                                                    this.closest('form').submit();">
                                        {{ __('Logout') }}
                                    </x-jet-dropdown-link>
                                </form>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>





            <div class="wrapper">
                <!-- Sidebar  -->
                <nav  class="sticky-top"  id="sidebar" style="background-color:white; opacity:95%;">
                    <div id="dismiss" class="mt-5">
                        <i class="fas fa-arrow-left"></i>
                    </div>
                    <form action="results.php" method="POST">
                        <div class="sidebar-header text-dark " style="background-color:white; color:dark;" id="smartcart">
                            <h3 class="text-dark"><br> Carrito</h3>
                            <!-- SmartCart element -->
                    </form>
                </nav>
            </div>
        </nav>

</header>

<main role="main">
    <div id="myCarousel" class="carousel slide" data-ride="carousel" style="margin-top:10%;" >
        <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
        </ol>

        <div class="carousel-inner" >
            <div class="carousel-item active">
                <img class="bd-placeholder-img"  src="  @if($Settings->isEmpty()) @else{{$promocion->bannera}} @endif" width="100%" height="100%" alt="">

                <div class="container">
                    <div class="carousel-caption text-left">
                        <h1>  @if($Settings->isEmpty()) @else{{$promocion->texto_bannera}} @endif</h1>
                        <p>De  @if($Settings->isEmpty()) @else {{$promocion->fecha_inicio}} a {{$promocion->fecha_final}} @endif</p>
                    </div>
                </div>
            </div>

            <div class="carousel-item">
                <img class="bd-placeholder-img"  src="  @if($Settings->isEmpty()) @else{{$promocion->bannerb}} @endif" width="100%" height="100%" alt="">

                <div class="container">
                    <div class="carousel-caption">
                        <h1>  @if($Settings->isEmpty()) @else{{$promocion->texto_bannerb}} @endif</h1>
                        <p>De @if($Settings->isEmpty()) @else{{$promocion->fecha_inicio}} a {{$promocion->fecha_final}} @endif</p>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <img class="bd-placeholder-img"  src="@if($Settings->isEmpty()) @else{{$promocion->bannerc}}@endif" width="100%" height="100%" alt="">

                <div class="container">
                    <div class="carousel-caption text-right">
                        <h1>  @if($Settings->isEmpty()) @else{{$promocion->texto_bannerc}}@endif</h1>
                        <p>De  @if($Settings->isEmpty()) @else {{$promocion->fecha_inicio}} a {{$promocion->fecha_final}} @endif</p>
                    </div>
                </div>
            </div>
        </div>
        <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>

    <!-- Marketing messaging and featurettes
================================================== -->
    <!-- Wrap the rest of the page in another container to center all the content. -->

    <div class="container marketing" >

        <div class="row">
            <!-- BEGIN PRODUCTS -->
            @foreach ($Articulo as $producto)
            @if($producto->descuento!=0)
            <div class="col-md-4" style="border-radius:10px;">
                <div class="alert alert-warning" role="alert">
                  <h4 class="alert-heading">  @if($Promocion->isEmpty()) @else{{$promocion->titulo}} @endif</h4>

                </div>
                <!-- bbb_deals -->
                <div class="bbb_deals sc-product-item" style="border-radius:40px;">
                    @if($producto->descuento!=0)
                    <div class="ribbon ribbon-top-right"><span>Oferta -{{$producto->descuento}}%</span></div>
                    @endif
                    <div class="bbb_deals_title" data-name="product_name">{{$producto->nombre}}</div>
                    <div class="bbb_deals_slider_container">
                        <div class=" bbb_deals_item">
                            <div class="bbb_deals_image"><img data-name="product_image"
                                    src="https://res.cloudinary.com/dxfq3iotg/image/upload/v1562074043/234.png"
                                    alt=""></div>
                            <div class="bbb_deals_content">
                                <div class="bbb_deals_info_line d-flex flex-row justify-content-start">
                                    @foreach ($Marca as $marca)
                                    @if($marca->id===$producto->id_marca)
                                    <div class="bbb_deals_item_category"><a href="#">{{$marca->nombre}}</a></div>
                                    @endif
                                    @endforeach
                                    <small class="text-muted">{{$producto->categoria}}</small>
                                    <div class="bbb_deals_item_price_a ml-auto">
                                        @if($producto->descuento!=0)
                                        <del>${{$producto->precioOriginal}}</del>
                                        @else
                                        ${{$producto->precioOriginal}}
                                        @endif
                                        @if($Settings->isEmpty()) @else {{$setting->setting_moneda}} @endif</div>
                                </div>
                                <div class="bbb_deals_info_line d-flex flex-row justify-content-start">
                                    <div class="form-group">
                                        <textarea class="form-control bbb_deals_item_name" disabled
                                            data-name="product_desc" rows="8">{{$producto->descripcion}}</textarea>
                                    </div>

                                    <div class="bbb_deals_item_price ml-auto">${{$producto->precio}} @if($Settings->isEmpty()) @else {{$setting->setting_moneda}} @endif</div>
                                    <input name="product_price" value="{{$producto->precio}}" type="hidden" />
                                    <input name="product_id" value="{{$producto->id}}" type="hidden" />
                                </div>
                                <div class="available">
                                    <div class="available_line d-flex flex-row justify-content-start">
                                        <div class="available_title">Disponible:
                                            <span>{{$producto->existencia}}</span></div>
                                        <div class="sold_title ml-auto">Already sold: <span>28</span></div>
                                    </div>
                                    <button class="sc-add-to-cart btn btn-success">Agregar Carrito</button>
                                    <div class="available_bar"><span style="width:17%"></span></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
                @endif
            @endforeach
     <!-- BEGIN PRODUCTS -->
     <div class="container">
        <div class="row">
            <div class="col-md-12 mt-2">
                <div class="alert alert-success" role="alert">
                  <h4 class="alert-heading">Articulos</h4>
                </div>
            </div>
        </div>
     </div>

     @foreach ($Articulo as $producto)
     @if($producto->descuento==0)
     <div class="col-md-4">
         <!-- bbb_deals -->
         <div class="bbb_deals sc-product-item mt-3" style="border-radius:40px;">
             @if($producto->descuento!=0)
             <div class="ribbon ribbon-top-right"><span>Oferta -{{$producto->descuento}}%</span></div>
             @endif
             <div class="bbb_deals_title" data-name="product_name">{{$producto->nombre}}</div>
             <div class="bbb_deals_slider_container">
                 <div class=" bbb_deals_item">
                     <div class="bbb_deals_image"><img data-name="product_image"
                             src="https://res.cloudinary.com/dxfq3iotg/image/upload/v1562074043/234.png"
                             alt=""></div>
                     <div class="bbb_deals_content">
                         <div class="bbb_deals_info_line d-flex flex-row justify-content-start">
                             @foreach ($Marca as $marca)
                             @if($marca->id===$producto->id_marca)
                             <div class="bbb_deals_item_category"><a href="#">{{$marca->nombre}}</a></div>
                             @endif
                             @endforeach
                             <small class="text-muted">{{$producto->categoria}}</small>
                             <div class="bbb_deals_item_price_a ml-auto">
                                 @if($producto->descuento!=0)
                                 <del>${{$producto->precioOriginal}}</del>
                                 @else
                                 ${{$producto->precioOriginal}}
                                 @endif
                                 @if($Settings->isEmpty()) @else {{$setting->setting_moneda}} @endif</div>
                         </div>
                         <div class="bbb_deals_info_line d-flex flex-row justify-content-start">
                             <div class="form-group">
                                 <textarea class="form-control bbb_deals_item_name" disabled
                                     data-name="product_desc" rows="8">{{$producto->descripcion}}</textarea>
                             </div>

                             <div class="bbb_deals_item_price ml-auto">${{$producto->precio}} @if($Settings->isEmpty()) @else {{$setting->setting_moneda}} @endif</div>
                             <input name="product_price" value="{{$producto->precio}}" type="hidden" />
                             <input name="product_id" value="{{$producto->id}}" type="hidden" />
                         </div>
                         <div class="available">
                             <div class="available_line d-flex flex-row justify-content-start">
                                 <div class="available_title">Disponible:
                                     <span>{{$producto->existencia}}</span></div>
                                 <div class="sold_title ml-auto">Already sold: <span>28</span></div>
                             </div>
                             <button class="sc-add-to-cart btn btn-success">Agregar Carrito</button>
                             <div class="available_bar"><span style="width:17%"></span></div>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </div>
     @endif
     @endforeach
        </div>

        <!-- /.row -->

        <!-- START THE FEATURETTES -->

        <hr class="featurette-divider">

        <div class="row featurette">
            @if($Settings->isEmpty()) @else
            @if($setting->setting_banner!='')
                <div class="alert alert-warning fixed-top item-1"  style="opacity: 77%;" role="alert">
                <a href="#" class="alert-link "><center>@if($Settings->isEmpty()) @else <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-exclamation-circle" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                    <path d="M7.002 11a1 1 0 1 1 2 0 1 1 0 0 1-2 0zM7.1 4.995a.905.905 0 1 1 1.8 0l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 4.995z"/>
                  </svg> {{$setting->setting_banner}} !!@endif</center></a>
              </div>

              @endif
              @endif
            <div class="col-md-7">
                <h2 class="featurette-heading">  @if($Settings->isEmpty()) @else{{$promocion->titulo}}@endif </h2>
                <p class="lead">  @if($Settings->isEmpty()) @else{{$promocion->titulo_banner_principal}} @endif</p>
            </div>

            <div class="col-md-5">
                <svg class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto" width="500"
                    height="500" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice"
                    focusable="false" role="img" aria-label="Placeholder: 500x500">
                    <title>Placeholder</title>
                    <rect width="100%" height="100%" fill="#eee" /><text x="50%" y="50%" fill="#aaa"
                        dy=".3em">500x500</text>
                </svg>
            </div>
        </div>

        <hr class="featurette-divider">

        <div class="row featurette">
            <div class="col-md-7 order-md-2">
                <h2 class="featurette-heading">Oh yeah, it’s that good. <span class="text-muted">See for
                        yourself.</span></h2>
                <p class="lead">Donec ullamcorper nulla non metus auctor fringilla. Vestibulum id ligula porta felis
                    euismod semper. Praesent commodo cursus magna, vel scelerisque nisl consectetur. Fusce dapibus,
                    tellus ac cursus commodo.</p>
            </div>
            <div class="col-md-5 order-md-1">
                <svg class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto" width="500"
                    height="500" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice"
                    focusable="false" role="img" aria-label="Placeholder: 500x500">
                    <title>Placeholder</title>
                    <rect width="100%" height="100%" fill="#eee" /><text x="50%" y="50%" fill="#aaa"
                        dy=".3em">500x500</text>
                </svg>
            </div>
        </div>

        <hr class="featurette-divider">

        <div class="row featurette">
            <div class="col-md-7">
                <h2 class="featurette-heading">And lastly, this one. <span class="text-muted">Checkmate.</span></h2>
                <p class="lead">Donec ullamcorper nulla non metus auctor fringilla. Vestibulum id ligula porta felis
                    euismod semper. Praesent commodo cursus magna, vel scelerisque nisl consectetur. Fusce dapibus,
                    tellus ac cursus commodo.</p>
            </div>
            <div class="col-md-5">
                <svg class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto" width="500"
                    height="500" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice"
                    focusable="false" role="img" aria-label="Placeholder: 500x500">
                    <title>Placeholder</title>
                    <rect width="100%" height="100%" fill="#eee" /><text x="50%" y="50%" fill="#aaa"
                        dy=".3em">500x500</text>
                </svg>
            </div>

        </div>
        <hr class="featurette-divider">
        <!-- /END THE FEATURETTES -->
    </div><!-- /.container -->
    <!-- FOOTER -->
    <footer class="container">
        <p class="float-right"><a href="#">Back to top</a></p>
        <p>&copy; 2017-2020 HollyDev Jose Isaias Briano Jasso. &middot; <a href="#">@if($Settings->isEmpty()) @else {{$setting->setting_direccion}} @endif </a> &middot; <a
                href="#">Contactanos:</a>@if($Settings->isEmpty()) @else {{$setting->setting_contacto}} @endif </p><p>Abierto de : @if($Settings->isEmpty()) @else {{$setting->setting_abierto}} @endif</p>
    </footer>
</main>

<div class="overlay"></div>
<script type="text/javascript">
    $(document).ready(function() {
        $("#sidebar").mCustomScrollbar({
            theme: "minimal"
        });
        $('#dismiss, .overlay').on('click', function() {
            $('#sidebar').removeClass('active');
            $('.overlay').removeClass('active');
        });
        $('#sidebarCollapse').on('click', function() {
            $('#sidebar').addClass('active');
            $('.overlay').addClass('active');
            $('.collapse.in').toggleClass('in');
            $('a[aria-expanded=true]').attr('aria-expanded', 'false');
        });
    });
    // $('#smartcart').smartCart();
</script>
<script type="text/javascript">
    $('#smartcart').smartCart();
</script>

<!-- jQuery CDN - Slim version (=without AJAX) -->
<script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.min.js"></script>

<!-- Popper.JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"
    integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous">
</script>
<!-- Bootstrap JS -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"
    integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous">
</script>
<!-- jQuery Custom Scroller CDN -->
<script
    src="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.concat.min.js">
</script>
<script type="text/javascript">
    $(document).ready(function() {

        $("#sidebar").mCustomScrollbar({
            theme: "minimal"
        });
        $('#dismiss, .overlay').on('click', function() {
            // hide sidebar
            $('#sidebar').removeClass('active');
            // hide overlay
            $('.overlay').removeClass('active');
        });
        $('#sidebarCollapse').on('click', function() {
            // open sidebar
            $('#sidebar').addClass('active');
            // fade in the overlay
            $('.overlay').addClass('active');
            $('.collapse.in').toggleClass('in');
            $('a[aria-expanded=true]').attr('aria-expanded', 'false');
        });
    });
</script>
</body>
</html>

