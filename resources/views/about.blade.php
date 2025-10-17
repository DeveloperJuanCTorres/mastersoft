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
                    <img height="50" src="{{asset("storage/$business->image")}}" alt="">
                    <!-- <img src="img/logo.png" alt="Logo"> -->
                </a>
                <button class="navbar-toggler ms-auto" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarCollapse">
                    <span class="fa fa-bars fa-1x"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <div class="navbar-nav ms-auto py-0">
                        <a href="/" class="nav-item nav-link">Inicio</a>
                        <a href="/store" class="nav-item nav-link">Tienda</a>
                        <a href="/about" class="nav-item nav-link active">Nosotros</a>
                        <a href="/contact" class="nav-item nav-link me-2">Contáctanos</a>
                        <div class="nav-item dropdown d-block d-lg-none mb-3">
                            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Categorías</a>
                            <div class="dropdown-menu m-0">
                                <ul class="list-unstyled categories-bars">
                                    @foreach($categories as $category)    
                                    <li>
                                        <div class="categories-bars-item">
                                            <a href="{{ route('store', ['categories' => $category->id]) }}" class="nav-item nav-link">{{$category->name}}</a>
                                        </div>
                                    </li>                            
                                    @endforeach                                    
                                </ul>
                            </div>
                        </div>
                    </div>
                    
                    <a href="/cart" class="text-muted d-flex align-items-center justify-content-center"><span
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
    <h1 class="text-center text-white display-6 wow fadeInUp" data-wow-delay="0.1s">Nosotros</h1>
    <ol class="breadcrumb justify-content-center mb-0 wow fadeInUp" data-wow-delay="0.3s">
        <li class="breadcrumb-item"><a href="/">Inicio</a></li>
        <li class="breadcrumb-item active text-white">Nosotros</li>
    </ol>
</div>
<!-- Single Page Header End -->

<!-- About Start -->
<div class="container-fluid overflow-hidden py-5">
    <div class="container py-5">
        <div class="row g-5">
            <div class="col-xl-5 wow fadeInLeft" data-wow-delay="0.1s">
                <div class="bg-light rounded">
                    <img src="storage/{{$nosotros->image}}" class="img-fluid w-100" style="margin-bottom: -7px;" alt="Image">
                    <!-- <img src="img/about-3.jpg" class="img-fluid w-100 border-bottom border-5 border-primary" style="border-top-right-radius: 300px; border-top-left-radius: 300px;" alt="Image"> -->
                </div>
            </div>
            <div class="col-xl-7 wow fadeInRight" data-wow-delay="0.3s">
                <h5 class="sub-title pe-3">{{$nosotros->subtitulo}}</h5>
                <h1 class="display-5 mb-4">{{$nosotros->titulo}}</h1>
                <p class="mb-4">{!! Str::markdown($nosotros->description) !!}</p>
                <div class="row gy-4 align-items-center">
                    <div class="col-4 col-md-3">
                        <div class="bg-light text-center rounded p-3">
                            <div class="mb-2">
                                <i class="fas fa-award fa-4x text-primary"></i>
                            </div>
                            <h1 class="display-5 fw-bold mb-2">{{$nosotros->experiencia}}</h1>
                            <p class="text-muted mb-0">Años de Experiencia</p>
                        </div>
                    </div>
                    <div class="col-8 col-md-9">
                        <div class="d-flex flex-wrap">
                            <div id="phone-tada" class="d-flex align-items-center justify-content-center me-4">
                                <a href="" class="position-relative wow tada" data-wow-delay=".9s">
                                    <i class="fa fa-phone-alt text-primary fa-3x"></i>
                                    <div class="position-absolute" style="top: 0; left: 25px;">
                                        <span><i class="fa fa-comment-dots text-secondary"></i></span>
                                    </div>
                                </a>
                            </div>
                            <div class="d-flex flex-column justify-content-center">
                                <span class="text-primary">¿Tienes alguna pregunta?</span>
                                <span class="fw-bold fs-5" style="letter-spacing: 2px;color: #003A66;">{{$nosotros->telefono}}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- About End -->

<div class="container-fluid features overflow-hidden py-5">
    <div class="container py-5">
        <div class="row g-4 justify-content-center text-center">
            <div class="col-md-6 col-lg-6 col-xl-4 wow fadeInUp" data-wow-delay="0.1s">
                <div class="feature-item text-center p-4 bg-light">
                    <div class="feature-icon p-3 mb-4">
                        <i class="fas fa-users fa-4x text-primary"></i>
                    </div>
                    <div class="feature-content d-flex flex-column">
                        <h5 class="mb-3">Misión</h5>
                        <p class="mb-3">{!! Str::markdown($nosotros->mision) !!}</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-6 col-xl-4 wow fadeInUp" data-wow-delay="0.3s">
                <div class="feature-item text-center p-4 bg-light">
                    <div class="feature-icon p-3 mb-4">
                        <i class="fas fa-low-vision fa-4x text-primary"></i>
                    </div>
                    <div class="feature-content d-flex flex-column">
                        <h5 class="mb-3">Visión</h5>
                        <p class="mb-3">{!! Str::markdown($nosotros->vision) !!}</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-6 col-xl-4 wow fadeInUp" data-wow-delay="0.5s">
                <div class="feature-item text-center p-4 bg-light">
                    <div class="feature-icon p-3 mb-4">
                        <i class="fas fa-user-graduate fa-4x text-primary"></i>
                    </div>
                    <div class="feature-content d-flex flex-column">
                        <h5 class="mb-3">Valores</h5>
                        <p class="mb-3">{!! Str::markdown($nosotros->valores) !!}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



@include('partials.footer')


@endsection