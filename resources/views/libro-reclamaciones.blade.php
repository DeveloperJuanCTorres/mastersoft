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
    <h1 class="text-center text-white display-6 wow fadeInUp" data-wow-delay="0.1s">Libro de reclamaciones</h1>
    <ol class="breadcrumb justify-content-center mb-0 wow fadeInUp" data-wow-delay="0.3s">
        <li class="breadcrumb-item"><a href="/">Inicio</a></li>
        <li class="breadcrumb-item active text-white">Reclamos</li>
    </ol>
</div>
<!-- Single Page Header End -->

<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="page-content px-4">
                <div class="header-text py-5">
                    <h3 class="pt-4">1. DATOS DE LA PERSONA QUE PRESENTA LA QUEJA O RECLAMO</h3>
                    <div class="row">
                        <div class="col-lg-3 col-md-6 col-12 mt-4 px-6">
                            <div class="form-floating">
                                
                                <input required type="date" class="form-control" id="fecha_nac" placeholder="Fecha Nacimiento">
                                <label for="name">Fecha Nacimiento</label>
                            </div>                      
                        </div>
                        <div class="col-lg-3 col-md-6 col-12 mt-4 px-6">
                            <div class="form-floating">
                                
                                <select required class="form-control" name="tipo_doc" id="tipo_doc">
                                    <option value="0">-Seleccionar-</option>
                                    <option value="DNI">DNI</option>
                                    <option value="PASAPORTE">PASAPORTE</option>
                                </select>
                                <label for="name">Tipo documento</label>
                            </div>                       
                        </div>
                        <div class="col-lg-3 col-md-6 col-12 mt-4 px-6">
                            <div class="form-floating">
                                
                                <input type="number" class="form-control" id="numero_doc" placeholder="Número de documento">
                                <label for="name">Número de documento</label>
                            </div>                       
                        </div>
                        <div class="col-lg-3 col-md-6 col-12 mt-4 px-6">
                            <div class="form-floating">
                                <label for="name">Nombre</label>
                                <input type="text" class="form-control" id="nombres" placeholder="Nombre">
                                
                            </div>                        
                        </div>

                        <div class="col-lg-3 col-md-6 col-12 mt-4 px-6">
                            <div class="form-floating">
                                
                                <input type="text" class="form-control" id="apellido_pat" placeholder="Apellido paterno">
                                <label for="name">Apellido paterno</label>
                            </div>                        
                        </div>
                        <div class="col-lg-3 col-md-6 col-12 mt-4 px-6">
                            <div class="form-floating">
                                
                                <input type="text" class="form-control" id="apellido_mat" placeholder="Apellido materno">
                                <label for="name">Apellido materno</label>
                            </div>                        
                        </div>
                        <div class="col-lg-3 col-md-6 col-12 mt-4 px-6">
                            <div class="form-floating">
                                
                                <input type="email" class="form-control" id="email" placeholder="Email">
                                <label for="name">Email</label>
                            </div>                       
                        </div>
                        <div class="col-lg-3 col-md-6 col-12 mt-4 px-6">
                            <div class="form-floating">
                                @include('partials.phone')
                            </div>                       
                        </div>

                        <div class="col-lg-3 col-md-6 col-12 mt-4 px-6">
                            <div class="form-floating">
                               
                                <select id="departamento" class="form-control departamento" name="mauticform[departamento]">    
                                    <option data-id="" value="">-Seleccionar-</option>
                                </select>
                                <label for="name">Departamento</label>
                            </div>                       
                        </div>
                        <div class="col-lg-3 col-md-6 col-12 mt-4 px-6">
                            <div class="form-floating">
                                
                                <select id="provincia" class="form-control provincia" name="mauticform[provincia1]">
                                    <option data-id="" value="Chachapoyas">-Seleccionar-</option>                
                                </select>
                                <label for="name">Provincia</label>
                            </div>                         
                        </div>
                        <div class="col-lg-3 col-md-6 col-12 mt-4 px-6">
                            <div class="form-floating">
                                
                                <select id="distrito" class="form-control distrito" name="mauticform[distrito1]">
                                    <option data-id="" value="">-Seleccionar-</option>
                                </select>
                                <label for="name">Distrito</label>
                            </div>                        
                        </div>

                        <div class="col-lg-9 col-md-12 col-12 mt-4 px-6">
                            <div class="form-floating">
                                
                                <input type="text" class="form-control" id="direccion" placeholder="Direccion">
                                <label for="name">Dirección fiscal</label>
                            </div>                       
                        </div>
                    </div>
                    <h3 class="pt-4">2. INFORMACIÓN GENERAL</h3>
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-12 mt-4 px-6">
                            <div class="form-floating">
                                
                                <input type="text" class="form-control" id="orden_compra" placeholder="Orden de compra">
                                <label for="name">Orden de compra</label>
                            </div>                      
                        </div>
                        <div class="col-lg-6 col-md-6 col-12 mt-4 px-6">
                            <div class="form-floating">
                                
                                <input type="number" class="form-control" id="producto" placeholder="Monto del producto/servicio">
                                <label for="name">Monto del producto/servicio</label>
                            </div>                       
                        </div>

                        <div class="col-lg-6 col-md-6 col-12 mt-4 px-6">
                            <div class="form-floating">
                                
                                <textarea class="form-control" id="reclamo" rows="5" placeholder="Escribe"></textarea>
                                <label for="name">Detalla tu queja/reclamo</label>
                            </div>                        
                        </div>
                        <div class="col-lg-6 col-md-6 col-12 mt-4 px-6">
                            <div class="form-floating">
                                
                                <textarea class="form-control" id="pedido" rows="5" placeholder="Escribe"></textarea>
                                <label for="name">Pedido</label>
                            </div>                         
                        </div>
                        <div class="col-lg-12 my-4 text-center">
                            <button class="btn btn-primary py-3 enviar">Enviar reclamo</button>
                        </div>
                    </div>
                </div>                
            </div>
        </div>
    </div>
</div>


@include('partials.footer')


@endsection