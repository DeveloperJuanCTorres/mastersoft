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
    <h1 class="text-center text-white display-6 wow fadeInUp" data-wow-delay="0.1s">Carrito de compras</h1>
    <ol class="breadcrumb justify-content-center mb-0 wow fadeInUp" data-wow-delay="0.3s">
        <li class="breadcrumb-item"><a href="/">Inicio</a></li>
        <li class="breadcrumb-item active text-white">Carrito</li>
    </ol>
</div>
<!-- Single Page Header End -->

<!-- Checkout Page Start -->
<div class="container-fluid bg-light overflow-hidden py-5">
    <div class="container py-5">
        <h1 class="mb-4 wow fadeInUp" data-wow-delay="0.1s">Detalles de facturación</h1>
        <form action="#">
            <div class="row g-5">
                <div class="col-md-12 col-lg-6 col-xl-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="row">
                        <div class="custom-control custom-checkbox mb-3">
                            <input type="radio" id="tipo_cliente" name="tipo_cliente" value="natural" style="width: 15px;height: 15px;" checked onclick="mostrarCampos()"> <span class="px-2">Natural</span>
                        </div>
                        <div class="custom-control custom-checkbox mb-3">
                            <input type="radio" id="tipo_cliente" name="tipo_cliente" value="empresa" style="width: 15px;height: 15px;" onclick="mostrarCampos()"><span class="px-2">Empresa</span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12" id="campo_cliente">
                            <div class="row">
                                <div class="col-md-6 form-group">
                                    <label class="form-label my-3">Nombre</label>
                                    <input class="form-control" type="text" id="nombre" name="nombre" placeholder="John">
                                </div>
                                <div class="col-md-6 form-group">
                                    <label class="form-label my-3">Apellidos</label>
                                    <input class="form-control" type="text" id="apellidos" name="apellidos" placeholder="Doe">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12" style="display: none;" id="campo_empresa">
                            <div class="row">
                                <div class="col-md-6 form-group">
                                    <label class="form-label my-3">RUC</label>
                                    <input class="form-control" type="text" id="ruc" name="ruc">
                                </div>
                                <div class="col-md-6 form-group">
                                    <label class="form-label my-3">Razon social</label>
                                    <input class="form-control" type="text" id="company" name="company">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 form-group">
                            <label class="form-label my-3">Email</label>
                            <input class="form-control" type="text" id="email" name="email" placeholder="example@email.com">
                        </div>
                        <div class="col-md-6 form-group pt-5">
                            <!-- <label class="form-label my-3">Teléfono</label> -->
                            @include('partials.phone')
                        </div>
                        <div class="col-md-12 form-group">
                            <label class="form-label my-3">Dirección</label>
                            <input class="form-control" type="text" id="direccion" name="direccion" placeholder="123 Street">
                        </div>
                        <div class="col-md-6 form-group">
                            <label class="form-label my-3">Departamento</label>
                            <select id="departamento" class="form-control departamento" name="mauticform[departamento]">    
                                <option data-id="" value="">-Seleccionar-</option>
                            </select>
                        </div>
                        <div class="col-md-6 form-group">
                            <label class="form-label my-3">Provincia</label>
                            <select id="provincia" class="form-control provincia" name="mauticform[provincia1]">
                                <option data-id="" value="Chachapoyas">-Seleccionar-</option>                
                            </select>
                        </div>
                        <div class="col-md-6 form-group">
                            <label class="form-label my-3">Distrito</label>
                            <select id="distrito" class="form-control distrito" name="mauticform[distrito1]">
                                <option data-id="" value="">-Seleccionar-</option>
                            </select>
                        </div>
                    </div>
                    
                    <div class="form-item pt-4">
                        <textarea name="text" class="form-control" spellcheck="false" cols="30" rows="5"
                            placeholder="Oreder Notes (Optional)"></textarea>
                    </div>
                </div>
                <div class="col-md-12 col-lg-6 col-xl-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr class="text-center">
                                    <th scope="col" class="text-start">Producto</th>
                                    <th scope="col">Precio</th>
                                    <th scope="col">Cant.</th>
                                    <th scope="col" style="width: 100px;">Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach(Cart::content() as $item)
                                <tr class="text-center">
                                    <th scope="row" class="text-start py-4">
                                        {{$item->name}}
                                    </th>
                                    <td class="py-4">$269.00</td>
                                    <td class="py-4 text-center">2</td>
                                    <td class="py-4">$538.00</td>
                                </tr>
                                @endforeach
                                <tr>
                                    <th scope="row">
                                    </th>
                                    <td class=""></td>
                                    <td class="">
                                        <p class="mb-0 text-dark py-2">Subtotal</p>
                                    </td>
                                    <td class="">
                                        <div class="py-2 text-center border-bottom border-top">
                                            <p class="mb-0 text-dark">S/. {{number_format(Cart::subtotal()/1.18,2)}}</p>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">
                                    </th>
                                    <td class=""></td>
                                    <td class="">
                                        <p class="mb-0 text-dark py-2">IGV</p>
                                    </td>
                                    <td class="">
                                        <div class="py-2 text-center border-bottom border-top">
                                            <p class="mb-0 text-dark">S/. {{number_format(Cart::subtotal() - Cart::subtotal()/1.18,2)}}</p>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">
                                    </th>
                                    <td class=""></td>
                                    <td class="">
                                        <p class="mb-0 text-dark text-uppercase py-2">TOTAL</p>
                                    </td>                                    
                                    <td class="">
                                        <div class="py-2 text-center border-bottom border-top">
                                            <p class="mb-0 text-dark">S/. {{number_format(Cart::subtotal(),2)}}</p>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="row g-0 text-center align-items-center justify-content-center border-bottom py-2">
                        <div class="col-12">
                            <div class="form-check text-start my-2">
                                <input type="checkbox" class="form-check-input bg-primary border-0" id="Transfer-1"
                                    name="Transfer" value="Transfer">
                                <label class="form-check-label" for="Transfer-1">Transferencia bancaria</label>
                            </div>
                        </div>
                    </div>
                    <div class="row g-4 text-center align-items-center justify-content-center border-bottom py-2">
                        <div class="col-12">
                            <div class="form-check text-start my-2">
                                <input type="checkbox" class="form-check-input bg-primary border-0" id="Delivery-1"
                                    name="Delivery" value="Delivery">
                                <label class="form-check-label" for="Delivery-1">Pago contra entrega</label>
                            </div>
                        </div>
                    <!-- </div>
                    <div class="row g-4 text-center align-items-center justify-content-center border-bottom py-2">
                        <div class="col-12">
                            <div class="form-check text-start my-2">
                                <input type="checkbox" class="form-check-input bg-primary border-0" id="Paypal-1"
                                    name="Paypal" value="Paypal">
                                <label class="form-check-label" for="Paypal-1">Paypal</label>
                            </div>
                        </div>
                    </div> -->
                    <div class="row g-4 text-center align-items-center justify-content-center pt-4">
                        <button type="button"
                            class="btn btn-primary border-secondary py-3 px-4 text-uppercase w-100 text-primary pedido">Realizar pedido</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<!-- Checkout Page End -->


@include('partials.footer')

@push('scripts')
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    function mostrarCampos() {
        const tipo = document.querySelector('input[name="tipo_cliente"]:checked').value;
        document.getElementById('campo_cliente').style.display = tipo === 'natural' ? 'block' : 'none';
        document.getElementById('campo_empresa').style.display = tipo === 'empresa' ? 'block' : 'none';
    }

    // Por si acaso se recarga la página con un valor diferente ya seleccionado
    document.addEventListener('DOMContentLoaded', mostrarCampos);
</script>
<script>
    let token = $('meta[name="csrf-token"]').attr('content');

    $(function() {
        $(".pedido").on('click',function () {
            var nombre = $("#nombre").val();
            var apellidos = $("#apellidos").val();
            var ruc = $("#ruc").val();
            var empresa = $("#company").val();
            var codigo = $("#codigo").val();
            var telefono = $("#telefono").val();
            var email = $("#email").val();
            var direccion = $("#direccion").val();
            var hoy = new Date();   
                                
            if (document.querySelector('input[name="tipo_cliente"]:checked').value == 'natural') {
                if (nombre == '') {
                    const Toast = Swal.mixin({
                    toast: true,
                    position: "top-end",
                    showConfirmButton: false,
                    timer: 3000,
                    timerProgressBar: true,
                    didOpen: (toast) => {
                        toast.onmouseenter = Swal.stopTimer;
                        toast.onmouseleave = Swal.resumeTimer;
                    }
                    });
                    Toast.fire({
                    icon: "warning",
                    title: "El nombre es requerido"
                    });
                    $('#nombre').focus();
                    return false;
                }
                if (apellidos == '') {
                    const Toast = Swal.mixin({
                    toast: true,
                    position: "top-end",
                    showConfirmButton: false,
                    timer: 3000,
                    timerProgressBar: true,
                    didOpen: (toast) => {
                        toast.onmouseenter = Swal.stopTimer;
                        toast.onmouseleave = Swal.resumeTimer;
                    }
                    });
                    Toast.fire({
                    icon: "warning",
                    title: "El apellido es requerido"
                    });
                    $('#apellidos').focus();
                    return false;
                }
            }

            if (document.querySelector('input[name="tipo_cliente"]:checked').value == 'empresa') {
                if (ruc == '') {
                    const Toast = Swal.mixin({
                    toast: true,
                    position: "top-end",
                    showConfirmButton: false,
                    timer: 3000,
                    timerProgressBar: true,
                    didOpen: (toast) => {
                        toast.onmouseenter = Swal.stopTimer;
                        toast.onmouseleave = Swal.resumeTimer;
                    }
                    });
                    Toast.fire({
                    icon: "warning",
                    title: "El RUC es requerido"
                    });
                    $('#ruc').focus();
                    return false;
                }
                if (empresa == '') {
                    const Toast = Swal.mixin({
                    toast: true,
                    position: "top-end",
                    showConfirmButton: false,
                    timer: 3000,
                    timerProgressBar: true,
                    didOpen: (toast) => {
                        toast.onmouseenter = Swal.stopTimer;
                        toast.onmouseleave = Swal.resumeTimer;
                    }
                    });
                    Toast.fire({
                    icon: "warning",
                    title: "La razon Social es requerido"
                    });
                    $('#company').focus();
                    return false;
                }
            }
            
            if (telefono == '') {
                const Toast = Swal.mixin({
                toast: true,
                position: "top-end",
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.onmouseenter = Swal.stopTimer;
                    toast.onmouseleave = Swal.resumeTimer;
                }
                });
                Toast.fire({
                icon: "warning",
                title: "El teléfono es requerido"
                });
                $('#telefono').focus();
                return false;
            }
            if (direccion == '') {
                const Toast = Swal.mixin({
                toast: true,
                position: "top-end",
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.onmouseenter = Swal.stopTimer;
                    toast.onmouseleave = Swal.resumeTimer;
                }
                });
                Toast.fire({
                icon: "warning",
                title: "La dirección es requerido"
                });
                $('#direccion').focus();
                return false;
            }

            Swal.fire({
                header: '...',
                title: 'loading...',
                allowOutsideClick:false,
                didOpen: () => {
                    Swal.showLoading()
                }
            });

            $.ajax({
                url: "/enviar_pedido",
                method: "post",
                dataType: 'json',
                data: {
                    _token: token,
                    nombre: nombre,
                    apellidos : apellidos,
                    empresa : empresa,
                    codigo : codigo,
                    telefono: telefono,
                    email: email,
                    direccion: direccion
                },
                success: function (response) {   
                    if (response.status) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Pedido',
                            text: response.msg,   
                            confirmButtonColor: "#e75e8d",                           
                        })
                        .then(resultado => {
                            window.location.href = "/";
                        })                 
                    } else {
                        Swal.fire({
                            icon: 'warning',
                            title: 'Ups, algo salio mal',
                            text: response.msg,
                            confirmButtonColor: "#e75e8d",
                        })
                    }
                },
                error: function (response) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...!!',
                        text: response.msg,
                    })
                }
            });
        });
    })
</script>
@endpush

@endsection