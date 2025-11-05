@extends('layouts.app')

@section('content')

@include('partials.topbar')

<!-- Navbar & Hero Start -->
<div class="container-fluid nav-bar p-0">
    <div class="row gx-0 bg-primary px-5 align-items-center py-2">
        <div class="col-lg-3 d-none d-lg-block">
            <nav class="navbar navbar-light position-relative" style="width: 250px;">
                <button class="navbar-toggler border-0 fs-4 w-100 px-0 text-start" type="button"
                    data-bs-toggle="collapse" data-bs-target="#allCat">
                    <h4 class="m-0 text-white"><i class="fa fa-bars me-2"></i>Categorías</h4>
                </button>
                <div class="collapse navbar-collapse rounded-bottom" id="allCat">
                    <div class="navbar-nav ms-auto py-0">
                        <ul class="list-unstyled categories-bars">
                            @foreach($categories as $category)    
                            <li>
                                <div class="categories-bars-item">
                                    <a href="{{ route('store', ['categories' => $category->id]) }}" class="nav-item nav-link">{{$category->name}}</a>
                                </div>
                            </li>                            
                            @endforeach
                            <a href="/store" class="btn btn-primary py-2 px-4 m-2" style="border-radius: 10px;">Más categorías</a>                            
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
        <div class="col-12 col-lg-9">
            <nav class="navbar navbar-expand-lg navbar-light bg-primary ">
                <a href="/" class="navbar-brand d-block d-lg-none">
                    <img width="200" src="{{asset("storage/$business->image")}}" alt="">
                    <!-- <img src="img/logo.png" alt="Logo"> -->
                </a>
                <button class="navbar-toggler ms-auto" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarCollapse">
                    <span class="fa fa-bars fa-1x"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <div class="navbar-nav ms-auto py-0">
                        <a href="/" class="nav-item nav-link active">Inicio</a>
                        <a href="/store" class="nav-item nav-link">Tienda</a>
                        <a href="/about" class="nav-item nav-link">Nosotros</a>
                        <a href="/contact" class="nav-item nav-link me-2">Contáctanos</a>
                        <!-- <div class="nav-item dropdown d-block d-lg-none mb-3">
                            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Categorías</a>
                            <div class="dropdown-menu m-0">
                                <ul class="list-unstyled categories-bars">
                                    foreach(categories as category)    
                                    <li>
                                        <div class="categories-bars-item">
                                            <a href="route('store', ['categories' => $category->id]) " class="nav-item nav-link">category->name</a>
                                        </div>
                                    </li>                            
                                    endforeach                                    
                                </ul>
                            </div>
                        </div> -->
                    </div>
                    
                    <a href="/cart" class="text-muted d-flex align-items-center justify-content-end"><span
                        class="rounded-circle btn-md-square border bg-white"><i class="fas fa-shopping-cart"></i></span>
                    <span class="text-white ms-2" id="cartTotal">S/. {{\Cart::subtotal()}}</span></a>
                </div>
            </nav>
        </div>
    </div>
</div>
<!-- Navbar & Hero End -->

<!-- Carousel Start -->
<div class="container-fluid carousel bg-light px-0">
    <div class="row g-0 justify-content-end">
        <div class="col-12 col-lg-9 col-xl-9">
            <div class="header-carousel owl-carousel bg-light">
                @foreach($banners as $banner)
                <div class="row g-0 header-carousel-item align-items-center">
                    <div class="carousel-img wow fadeInLeft" data-wow-delay="0.1s">
                        <img src="storage/{{$banner->image}}" class="img-fluid w-100" alt="Image">
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        <div class="col-12 col-lg-3 col-xl-3 wow fadeInRight" data-wow-delay="0.1s">
            <div class="carousel-header-banner h-100">
                <img src="storage/{{$business->banner}}" class="img-fluid w-100 h-100" style="object-fit: cover;" alt="Image">
            </div>
        </div>
    </div>
</div>
<!-- Carousel End -->



<!-- Searvices Start -->
<div class="container-fluid px-0">
    <div class="row g-0">
        <div class="col-6 col-md-4 col-lg-3 border-start border-end wow fadeInUp" data-wow-delay="0.1s">
            <div class="p-4">
                <div class="d-inline-flex align-items-center">
                    <i class="fa fa-sync-alt fa-2x text-primary"></i>
                    <div class="ms-4">
                        <h6 class="text-uppercase mb-2">Devolución Gratuita</h6>
                        <p class="mb-0">¡Garantía de devolución de dinero de 30 días!</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-6 col-md-4 col-lg-3 border-end wow fadeInUp" data-wow-delay="0.2s">
            <div class="p-4">
                <div class="d-flex align-items-center">
                    <i class="fab fa-telegram-plane fa-2x text-primary"></i>
                    <div class="ms-4">
                        <h6 class="text-uppercase mb-2">Envío Gratis</h6>
                        <p class="mb-0">Envío gratuito en todos los pedidos.</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-6 col-md-4 col-lg-3 border-end wow fadeInUp" data-wow-delay="0.3s">
            <div class="p-4">
                <div class="d-flex align-items-center">
                    <i class="fas fa-life-ring fa-2x text-primary"></i>
                    <div class="ms-4">
                        <h6 class="text-uppercase mb-2">Soporte 24/7</h6>
                        <p class="mb-0">Brindamos soporte en línea las 24 horas del día.</p>
                    </div>
                </div>
            </div>
        </div>
        <!-- <div class="col-6 col-md-4 col-lg-2 border-end wow fadeInUp" data-wow-delay="0.4s">
            <div class="p-4">
                <div class="d-flex align-items-center">
                    <i class="fas fa-credit-card fa-2x text-primary"></i>
                    <div class="ms-4">
                        <h6 class="text-uppercase mb-2">Recibir tarjeta de regalo</h6>
                        <p class="mb-0">Reciba un regalo en pedidos superiores a S/. 500</p>
                    </div>
                </div>
            </div>
        </div> -->
        <!-- <div class="col-6 col-md-4 col-lg-2 border-end wow fadeInUp" data-wow-delay="0.5s">
            <div class="p-4">
                <div class="d-flex align-items-center">
                    <i class="fas fa-lock fa-2x text-primary"></i>
                    <div class="ms-4">
                        <h6 class="text-uppercase mb-2">Pago Seguro</h6>
                        <p class="mb-0">Valoramos su seguridad</p>
                    </div>
                </div>
            </div>
        </div> -->
        <div class="col-6 col-md-4 col-lg-3 border-end wow fadeInUp" data-wow-delay="0.6s">
            <div class="p-4">
                <div class="d-flex align-items-center">
                    <i class="fas fa-blog fa-2x text-primary"></i>
                    <div class="ms-4">
                        <h6 class="text-uppercase mb-2">Servicio en Línea</h6>
                        <p class="mb-0">Devolución gratuita de productos en 30 días</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Searvices End -->

<style>
    .wrapper1{
    width: 100%;
    }
    .carousel1{
        display: flex;
    /* max-width: 1200px; */
    margin: auto;
    /* padding: 0 30px; */
    }
    .carousel .card{
    color: rgb(0, 0, 0);
    text-align: center;
    margin: 20px 0;
    line-height: 250px;
    font-size: 90px;
    font-weight: 600;
    border-radius: 10px;
    box-shadow: 0px 4px 15px rgba(0,0,0,0.2);
    }
    .owl-dots{
        display: flex;
        text-align: center;
        margin-top: 40px;
    }
    .owl-dot{
    height: 15px;
    width: 45px;
    margin: 0 5px;
    outline: none;
    border-radius: 14px;
    border: 2px solid #a4ce3a!important;
    box-shadow: 0px 4px 15px rgba(0,0,0,0.2);
    transition: all 0.2s ease;
    }
    .owl-dot.active,
    .owl-dot:hover{
    background: #a4ce3a!important;
    }
</style>

<!-- Related Product Start -->
<div class="wrapper1 container-fluid py-5">
    <div class="mx-auto text-center pb-5" style="max-width: 700px;">
        <h4 class="text-primary mb-4 border-bottom border-primary border-2 d-inline-block p-2 title-border-radius wow fadeInUp"
            data-wow-delay="0.1s">Nuestras promociones</h4>
    </div>
    <div class="carousel1 owl-carousel container">
            @foreach($promotions as $promotion)
            <div class="card" data-wow-delay="0.1s">
                <a href="{{route('product.detail', $promotion->product)}}">
                    <div class="bg-primary rounded position-relative">
                        <img src="storage/{{$promotion->image}}" class="img-fluid w-100 rounded" alt="">
                    </div>
                </a>
            </div>
            @endforeach
    </div>
 </div>
<!-- Related Product End -->
 

<!-- Our Products Start -->
<div class="container-fluid product py-5">
    <div class="container py-5">
        <div class="tab-class">
            <div class="row g-4">
                <div class="col-lg-4 text-start wow fadeInLeft" data-wow-delay="0.1s">
                    <h1>Nuestros Productos</h1>
                </div>
                <div class="col-lg-8 text-end wow fadeInRight" data-wow-delay="0.1s">
                    <ul class="nav nav-pills d-inline-flex text-center mb-5">
                        <li class="nav-item mb-4">
                            <a class="d-flex mx-2 py-2 bg-light rounded-pill active" data-bs-toggle="pill"
                                href="#tab-1">
                                <span class="text-dark" style="width: 130px;">Destacados</span>
                            </a>
                        </li>                        
                    </ul>
                </div>
            </div>
            <div class="tab-content">
                <div id="tab-1" class="tab-pane fade show p-0 active">
                    <div class="row g-4">
                        @foreach($products as $product)
                        <div class="col-md-6 col-lg-4 col-xl-3">
                            <div class="product-item rounded wow fadeInUp" data-wow-delay="0.1s">
                                <div class="product-item-inner border rounded">
                                    <div class="product-item-inner-item" style="height: 250px; display: flex; justify-content: center; align-items: center; overflow: hidden; background-color: #f8f8f8;"">
                                        @php
                                            $imagenes = json_decode($product->images)
                                        @endphp
                                        @if($imagenes)
                                        <img src="storage/{{$imagenes[0]}}" class="product-image" alt="">
                                        @else
                                        <img src="img/defectomaster.jpeg" class="product-image" alt="">
                                        @endif
                                        <div class="product-new">Nuevo</div>
                                        <div class="product-details">
                                            <a href="{{route('product.detail', $product)}}"><i class="fa fa-eye fa-1x"></i></a>
                                        </div>
                                    </div>
                                    <div class="text-center rounded-bottom p-4">
                                        <a href="{{route('product.detail', $product)}}" class="d-block mb-2">{{$product->taxonomy->name}}</a>
                                        <a href="#" class="d-block h5 product-name">{{ Str::limit($product->name, 40, '...') }}</a>
                                        <del class="me-2 fs-5">S/. {{$product->price*1.20}}</del>
                                        <span class="text-primary fs-5">S/. {{$product->price}}</span>
                                    </div>
                                </div>
                                <div class="product-item-add border border-top-0 rounded-bottom text-center p-4 pt-0">
                                    <input type="hidden" id="qty" value="1">
                                    <a href="javascript:void(0)" class="btn btn-primary border-secondary rounded-pill py-2 px-4 mb-4 addcart" data-id="{{$product->id}}">
                                        <i class="fas fa-shopping-cart me-2"></i> 
                                        Agregar al carrito
                                    </a>
                                    <!-- <div class="d-flex justify-content-between align-items-center">
                                        <div class="d-flex">
                                            <i class="fas fa-star text-primary"></i>
                                            <i class="fas fa-star text-primary"></i>
                                            <i class="fas fa-star text-primary"></i>
                                            <i class="fas fa-star text-primary"></i>
                                            <i class="fas fa-star"></i>
                                        </div>
                                        <div class="d-flex">
                                            <a href="#"
                                                class="text-primary d-flex align-items-center justify-content-center me-3"><span
                                                    class="rounded-circle btn-sm-square border"><i
                                                        class="fas fa-random"></i></i></a>
                                            <a href="#"
                                                class="text-primary d-flex align-items-center justify-content-center me-0"><span
                                                    class="rounded-circle btn-sm-square border"><i
                                                        class="fas fa-heart"></i></a>
                                        </div>
                                    </div> -->
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Our Products End -->

 <!-- Bestseller Products Start -->
@if($mas_vendidos->count() > 0)
<div class="container-fluid products pb-5">
    <div class="container products-mini py-5">
        <div class="mx-auto text-center mb-5" style="max-width: 700px;">
            <h4 class="text-primary mb-4 border-bottom border-primary border-2 d-inline-block p-2 title-border-radius wow fadeInUp"
                data-wow-delay="0.1s">Productos más vendidos</h4>
            <!-- <p class="mb-0 wow fadeInUp" data-wow-delay="0.2s">Te mostramos nuestros productos más vendidos</p> -->
        </div>
        <div class="row g-4">
            @foreach($mas_vendidos as $item)
            <div class="col-md-6 col-lg-6 col-xl-4 wow fadeInUp" data-wow-delay="0.1s">
                <div class="products-mini-item border">
                    <div class="row g-0">
                        <div class="col-5">
                            <div class="products-mini-img border-end" style="height: 180px; display: flex; justify-content: center; align-items: center; overflow: hidden;">
                                @php
                                    $imagenes1 = json_decode($item->images)
                                @endphp
                                @if($imagenes1)
                                    <img src="storage/{{$imagenes1[0]}}" class="img-fluid w-100" alt="Image">
                                @else
                                    <img src="img/defectomaster.jpeg" class="img-fluid w-100" alt="">
                                @endif
                                <div class="products-mini-icon rounded-circle bg-primary">
                                    <a href="{{route('product.detail', $item)}}"><i class="fa fa-eye fa-1x text-white"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-7">
                            <div class="products-mini-content p-3">
                                <a href="#" class="d-block mb-2">{{$item->taxonomy->name}}</a>
                                <a href="#" class="d-block h5">{{ Str::limit($item->name, 40, '...') }}</a>
                                <del class="me-2 fs-5">S/. {{$item->price*1.20}}</del>
                                <span class="text-primary fs-5">S/. {{$item->price}}</span>
                            </div>
                        </div>
                    </div>
                    <div class="products-mini-add border p-3">
                        <a href="#" class="btn btn-primary border-secondary rounded-pill py-2 px-4"><i
                                class="fas fa-shopping-cart me-2"></i> Agregar al carrito</a>
                        <div class="d-flex">
                            <a href="#"
                                class="text-primary d-flex align-items-center justify-content-center me-3"><span
                                    class="rounded-circle btn-sm-square border"><i
                                        class="fas fa-random"></i></i></a>
                            <a href="#"
                                class="text-primary d-flex align-items-center justify-content-center me-0"><span
                                    class="rounded-circle btn-sm-square border"><i class="fas fa-heart"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endif
<!-- Bestseller Products End -->


@include('partials.footer')

@push('scripts')
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="js/addcart.js"></script>
<script>
    const baseUrl = "{{ url('/product.detail') }}"; // Esto será "/producto"
</script>

<script>
    $(".carousel1").owlCarousel({
        margin: 20,
        loop: true,
        autoplay: true,
        autoplayTimeout: 3000,
        autoplayHoverPause: true,
        responsive: {
        0:{
            items:1,
            nav: false
        },
        600:{
            items:2,
            nav: false
            }
        }
    });
 
</script>
@endpush

@endsection
