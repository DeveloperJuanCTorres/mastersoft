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
                        <a href="/" class="nav-item nav-link">Inicio</a>
                        <a href="/store" class="nav-item nav-link active">Tienda</a>
                        <a href="/about" class="nav-item nav-link">Nosotros</a>
                        <a href="/contact" class="nav-item nav-link me-2">Contáctanos</a>
                        <!-- <div class="nav-item dropdown d-block d-lg-none mb-3">
                            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Categorías</a>
                            <div class="dropdown-menu m-0">
                                <ul class="list-unstyled categories-bars">
                                    foreach(categories as category)    
                                    <li>
                                        <div class="categories-bars-item">
                                            <a href=" route('store', ['categories' => category->id]) " class="nav-item nav-link">category->name</a>
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

<!-- Single Page Header start -->
<div class="container-fluid page-header py-5">
    <h1 class="text-center text-white display-6 wow fadeInUp" data-wow-delay="0.1s">{{$product->name}}</h1>
    <ol class="breadcrumb justify-content-center mb-0 wow fadeInUp" data-wow-delay="0.3s">
        <li class="breadcrumb-item"><a href="/">Inicio</a></li>
        <li class="breadcrumb-item active text-white">Detalle</li>
    </ol>
</div>
<!-- Single Page Header End -->

 <!-- Single Products Start -->
<div class="container-fluid shop py-5">
    <div class="container py-5">
        <div class="row g-4">
            <div class="col-lg-5 col-xl-3 wow fadeInUp" data-wow-delay="0.1s">
                <!-- <div class="input-group w-100 mx-auto d-flex mb-4">
                    <input type="search" class="form-control p-3" placeholder="keywords"
                        aria-describedby="search-icon-1">
                    <span id="search-icon-1" class="input-group-text p-3"><i class="fa fa-search"></i></span>
                </div>
                <div class="product-categories mb-4">
                    <h4>Categorías</h4>
                    <ul class="list-unstyled">
                        @foreach($categories as $category)  
                        <li>
                            <div class="categories-item">
                                <a href="{{ route('store', ['categories' => $category->id]) }}" class="text-dark"><i class="fas fa-apple-alt text-secondary me-2"></i>
                                    {{$category->name}}</a>
                                <span>(3)</span>
                            </div>
                        </li>    
                        @endforeach                    
                    </ul>
                </div> -->
                <h4>Promociones</h4>
                @foreach($promotions as $promotion)
                    <div class="wow fadeInLeft py-2" data-wow-delay="0.1s">
                        <a href="{{route('product.detail', $promotion->product)}}">
                            <div class="bg-primary rounded position-relative">
                                <img src="{{asset ('storage/' . $promotion->image)}}" class="img-fluid w-100 rounded" alt="">
                            </div>
                        </a>
                    </div>
                @endforeach

                
            </div>
            <div class="col-lg-7 col-xl-9 wow fadeInUp" data-wow-delay="0.1s">
                <div class="row g-4 single-product">
                    <div class="col-xl-6">
                        <div class="single-carousel owl-carousel">
                            @php
                                $imagenes = json_decode($product->images)
                            @endphp
                            @if($imagenes)
                                @foreach($imagenes as $key => $item)
                                <div class="single-item"
                                    data-dot="<img class='img-fluid' src='{{asset('storage/' . $item)}}' alt=''>">
                                    <div class="single-inner bg-light rounded">
                                        <img src="{{asset('storage/' . $item)}}" style="max-width: 300px;" class="img-fluid rounded d-block m-auto" alt="Image">
                                    </div>
                                </div>
                                @endforeach
                            @else
                            <div class="single-item"
                                data-dot="<img class='img-fluid' src='{{asset('img/defectomaster.jpeg')}}' alt=''>">
                                <div class="single-inner bg-light rounded">
                                    <img src="{{asset('img/defectomaster.jpeg')}}" class="img-fluid rounded" alt="Image">
                                </div>
                            </div>
                            @endif
                        </div>
                    </div>
                    <div class="col-xl-6">
                        <h4 class="fw-bold mb-3">{{$product->name}}</h4>
                        <p class="mb-3">Categoría: {{$product->taxonomy->name}}</p>
                        <h5 class="fw-bold mb-3">S/. {{$product->price}}</h5>
                        <div class="d-flex mb-4">
                            <i class="fa fa-star text-secondary"></i>
                            <i class="fa fa-star text-secondary"></i>
                            <i class="fa fa-star text-secondary"></i>
                            <i class="fa fa-star text-secondary"></i>
                            <i class="fa fa-star"></i>
                        </div>
                        <div class="d-flex flex-column mb-3">
                            <small>Marca: {{$product->brand->name}}</small>
                            <small>Disponible: <strong class="text-primary">{{$product->stock}}  en stock</strong></small>
                        </div>
                        <p class="mb-4">{!! Str::markdown($product->description ?? '') !!}</p>
                        <div class="input-group quantity1 mb-5" style="width: 100px;">
                            <div class="input-group-btn">
                                <button class="btn btn-sm btn-minus1 rounded-circle bg-light border">
                                    <i class="fa fa-minus"></i>
                                </button>
                            </div>
                            <input type="text" class="form-control form-control-sm text-center border-0" value="1" id="qty">
                            <div class="input-group-btn">
                                <button class="btn btn-sm btn-plus1 rounded-circle bg-light border">
                                    <i class="fa fa-plus"></i>
                                </button>
                            </div>
                        </div>
                        <a href="#" class="btn btn-primary border border-secondary rounded-pill px-4 py-2 mb-4 text-primary addcart" data-id="{{$product->id}}">
                            <i class="fa fa-shopping-bag me-2 text-white"></i> 
                            Agregar al carrito
                        </a>
                    </div>
                    <div class="col-lg-12">
                        <nav>
                            <div class="nav nav-tabs mb-3">
                                <button class="nav-link active border-white border-bottom-0" type="button"
                                    role="tab" id="nav-about-tab" data-bs-toggle="tab" data-bs-target="#nav-about"
                                    aria-controls="nav-about" aria-selected="true">Información</button>
                                <button class="nav-link border-white border-bottom-0" type="button" role="tab"
                                    id="nav-mission-tab" data-bs-toggle="tab" data-bs-target="#nav-mission"
                                    aria-controls="nav-mission" aria-selected="false">Reseñas</button>
                            </div>
                        </nav>
                        <div class="tab-content mb-5">
                            <div class="tab-pane active" id="nav-about" role="tabpanel"
                                aria-labelledby="nav-about-tab">
                                <p>{!! Str::markdown($product->information ?? '') !!}</p>
                            </div>
                            <div class="tab-pane" id="nav-mission" role="tabpanel"
                                aria-labelledby="nav-mission-tab">
                                <div class="d-flex">
                                    <img src="{{asset('img/avatar.jpg')}}" class="img-fluid rounded-circle p-3"
                                        style="width: 100px; height: 100px;" alt="">
                                    <div class="">
                                        <p class="mb-2" style="font-size: 14px;">April 12, 2024</p>
                                        <div class="d-flex justify-content-between">
                                            <h5>Jason Smith</h5>
                                            <div class="d-flex mb-3">
                                                <i class="fa fa-star text-secondary"></i>
                                                <i class="fa fa-star text-secondary"></i>
                                                <i class="fa fa-star text-secondary"></i>
                                                <i class="fa fa-star text-secondary"></i>
                                                <i class="fa fa-star"></i>
                                            </div>
                                        </div>
                                        <p>The generated Lorem Ipsum is therefore always free from repetition
                                            injected humour, or non-characteristic
                                            words etc. Susp endisse ultricies nisi vel quam suscipit </p>
                                    </div>
                                </div>
                                <div class="d-flex">
                                    <img src="{{asset('img/avatar.jpg')}}" class="img-fluid rounded-circle p-3"
                                        style="width: 100px; height: 100px;" alt="">
                                    <div class="">
                                        <p class="mb-2" style="font-size: 14px;">April 12, 2024</p>
                                        <div class="d-flex justify-content-between">
                                            <h5>Sam Peters</h5>
                                            <div class="d-flex mb-3">
                                                <i class="fa fa-star text-secondary"></i>
                                                <i class="fa fa-star text-secondary"></i>
                                                <i class="fa fa-star text-secondary"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                            </div>
                                        </div>
                                        <p class="text-dark">The generated Lorem Ipsum is therefore always free from
                                            repetition injected humour, or non-characteristic
                                            words etc. Susp endisse ultricies nisi vel quam suscipit </p>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="nav-vision" role="tabpanel">
                                <p class="text-dark">Tempor erat elitr rebum at clita. Diam dolor diam ipsum et
                                    tempor sit. Aliqu diam
                                    amet diam et eos labore. 3</p>
                                <p class="mb-0">Diam dolor diam ipsum et tempor sit. Aliqu diam amet diam et eos
                                    labore.
                                    Clita erat ipsum et lorem et sit</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Single Products End -->

<!-- Related Product Start -->
<div class="container-fluid related-product">
    <div class="container">
        <div class="mx-auto text-center pb-5" style="max-width: 700px;">
            <h4 class="text-primary mb-4 border-bottom border-primary border-2 d-inline-block p-2 title-border-radius wow fadeInUp"
                data-wow-delay="0.1s">También te puede interesar</h4>
            <p class="wow fadeInUp" data-wow-delay="0.2s">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                Modi, asperiores ducimus sint quos tempore officia similique quia? Libero, pariatur consectetur?</p>
        </div>
        <div class="related-carousel owl-carousel pt-4">
            @foreach($relatedProducts as $product)
            <div class="related-item rounded">
                <div class="related-item-inner border rounded">
                    <div class="related-item-inner-item">
                        @php
                            $imagenes = json_decode($product->images)
                        @endphp
                        @if($imagenes)
                        <img src="{{asset('storage/' . $imagenes[0])}}" class="img-fluid w-100 rounded-top" alt="">
                        @else
                        <img src="{{asset('img/defectomaster.jpeg')}}" class="img-fluid w-100 rounded-top" alt="">
                        @endif
                        <div class="related-new">Nuevo</div>
                        <div class="related-details">
                            <a href="{{route('product.detail', $product)}}"><i class="fa fa-eye fa-1x"></i></a>
                        </div>
                    </div>
                    <div class="text-center rounded-bottom p-4">
                        <a href="#" class="d-block mb-2">{{$product->taxonomy->name}}</a>
                        <a href="#" class="d-block h5">{{ Str::limit($product->name, 40, '...') }}</a>
                        <del class="me-2 fs-5">S/. {{$product->price*1.20}}</del>
                        <span class="text-primary fs-5">S/. {{$product->price}}</span>
                    </div>
                </div>
                <div class="related-item-add border border-top-0 rounded-bottom  text-center p-4 pt-0">
                    <input type="hidden" id="qty" value="1">
                    <a href="#" data-id="{{$product->id}}" class="btn btn-primary border-secondary rounded-pill py-2 px-4 mb-4 addcart"><i
                            class="fas fa-shopping-cart me-2"></i> Agregar al carrito</a>
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
                                    class="rounded-circle btn-sm-square border"><i class="fas fa-heart"></i></a>
                        </div>
                    </div> -->
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
<!-- Related Product End -->


@include('partials.footer')

@push('scripts')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
	<script src="{{asset('js/addcart.js')}}"></script>
    @endpush

@endsection