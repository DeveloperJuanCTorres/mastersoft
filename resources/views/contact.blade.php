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
                        <a href="/about" class="nav-item nav-link">Nosotros</a>
                        <a href="/contact" class="nav-item nav-link me-2 active">Contáctanos</a>
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
    <h1 class="text-center text-white display-6 wow fadeInUp" data-wow-delay="0.1s">Contáctanos</h1>
    <ol class="breadcrumb justify-content-center mb-0 wow fadeInUp" data-wow-delay="0.3s">
        <li class="breadcrumb-item"><a href="/">Inicio</a></li>
        <li class="breadcrumb-item active text-white">Contáctanos</li>
    </ol>
</div>
<!-- Single Page Header End -->

<!-- Contucts Start -->
<div class="container-fluid contact py-5">
    <div class="container py-5">
        <div class="p-5 bg-light rounded">
            <div class="row g-4">
                <div class="col-12">
                    <div class="text-center mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 900px;">
                        <h4 class="text-primary border-bottom border-primary border-2 d-inline-block pb-2">Ponte en conmtacto con nosotros</h4>
                        <p class="mb-5 fs-5 text-dark">¡Estamos aquí para ti! ¿Cómo podemos ayudarte?</p>
                    </div>
                </div>
                <div class="col-lg-7">
                    <h5 class="text-primary wow fadeInUp" data-wow-delay="0.1s">Vamos a conectarnos</h5>
                    <h1 class="display-5 mb-4 wow fadeInUp" data-wow-delay="0.3s">Envía tu mensaje</h1>
                    <form>
                        <div class="row g-4 wow fadeInUp" data-wow-delay="0.1s">
                            <div class="col-lg-12 col-xl-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="name" placeholder="Tu nombre">
                                    <label for="name">Tu Nombre</label>
                                </div>
                            </div>
                            <div class="col-lg-12 col-xl-6">
                                <div class="form-floating">
                                    <input type="email" class="form-control" id="email" placeholder="Tu Email">
                                    <label for="email">Tu Email</label>
                                </div>
                            </div>
                            <div class="col-lg-12 col-xl-6">
                                <div class="form-floating">
                                    <input type="phone" class="form-control" id="phone" placeholder="Phone">
                                    <label for="phone">Tu Teléfono</label>
                                </div>
                            </div>
                            <div class="col-lg-12 col-xl-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="project" placeholder="Project">
                                    <label for="project">Tu Proyecto</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="subject" placeholder="Subject">
                                    <label for="subject">Asunto</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-floating">
                                    <textarea class="form-control" placeholder="Leave a message here" id="message"
                                        style="height: 160px"></textarea>
                                    <label for="message">Mensaje</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <button class="btn btn-primary w-100 py-3">Enviar Mensaje</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-lg-5 wow fadeInUp" data-wow-delay="0.2s">
                    <div class="h-100 rounded">
                        <iframe class="rounded w-100" style="height: 100%;"
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d387191.33750346623!2d-73.97968099999999!3d40.6974881!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c24fa5d33f083b%3A0xc80b8f06e177fe62!2sNew%20York%2C%20NY%2C%20USA!5e0!3m2!1sen!2sbd!4v1694259649153!5m2!1sen!2sbd"
                            loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="row g-4 align-items-center justify-content-center">
                        <div class="col-md-6 col-lg-6 col-xl-3 wow fadeInUp" data-wow-delay="0.1s">
                            <div class="rounded p-4">
                                <div class="rounded-circle bg-secondary d-flex align-items-center justify-content-center mb-4"
                                    style="width: 70px; height: 70px;">
                                    <i class="fas fa-map-marker-alt fa-2x text-primary"></i>
                                </div>
                                <div>
                                    <h4>Dirección</h4>
                                    <p class="mb-2">{{$business->address}}</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-6 col-xl-3 wow fadeInUp" data-wow-delay="0.3s">
                            <div class="rounded p-4">
                                <div class="rounded-circle bg-secondary d-flex align-items-center justify-content-center mb-4"
                                    style="width: 70px; height: 70px;">
                                    <i class="fas fa-envelope fa-2x text-primary"></i>
                                </div>
                                <div>
                                    <h4>Email</h4>
                                    <p class="mb-2">{{$business->email}}</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-6 col-xl-3 wow fadeInUp" data-wow-delay="0.5s">
                            <div class="rounded p-4">
                                <div class="rounded-circle bg-secondary d-flex align-items-center justify-content-center mb-4"
                                    style="width: 70px; height: 70px;">
                                    <i class="fa fa-phone-alt fa-2x text-primary"></i>
                                </div>
                                <div>
                                    <h4>Teléfono</h4>
                                    <p class="mb-2">{{$business->phone}}</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-6 col-xl-3 wow fadeInUp" data-wow-delay="0.7s">
                            <div class="rounded p-4">
                                <div class="rounded-circle bg-secondary d-flex align-items-center justify-content-center mb-4"
                                    style="width: 70px; height: 70px;">
                                    <i class="fab fa-firefox-browser fa-2x text-primary"></i>
                                </div>
                                <div>
                                    <h4>mastersoftstore.com</h4>
                                    <p class="mb-2">{{$business->phone}}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Contuct End -->



@include('partials.footer')


@endsection