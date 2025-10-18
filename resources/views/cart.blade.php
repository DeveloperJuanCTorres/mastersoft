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

<!-- Cart Page Start -->
<div class="container-fluid py-5">
    <div class="row px-xl-5 py-5">
        <div class="row">
            @if(Cart::count() > 0)
            <div class="col-lg-8 col-md-6 col-12">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col" style="width: 65%;">Producto</th>
                                <th scope="col" style="width: 10%;">Precio</th>
                                <th scope="col" style="width: 10%;">Cantidad</th>
                                <th scope="col" style="width: 10%;">Total</th>
                                <th scope="col" style="width: 5%;"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach(Cart::content() as $item)
                            <tr>
                                <th scope="row" class="d-flex" style="text-align: left;">
                                    <img src="{{$item->options->image}}" alt="" style="width: 50px;height: 50px;"> 
                                    <p class="d-block my-auto px-2">{{$item->name}}</p>
                                </th>
                                <td>
                                    <p class="mb-0 py-2">S/. {{$item->price}}</p>
                                </td>
                                <td>
                                    <div class="input-group quantity py-2" style="width: 100px;">
                                        <div class="input-group-btn">
                                            <button class="btn btn-sm btn-minus rounded-circle bg-light border" data-rowid="{{ $item->rowId }}">
                                                <i class="fa fa-minus"></i>
                                            </button>
                                        </div>
                                        <input type="text" class="form-control form-control-sm text-center border-0 qty-input"
                                            value="{{$item->qty}}" data-rowid="{{ $item->rowId }}">
                                        <div class="input-group-btn">
                                            <button class="btn btn-sm btn-plus rounded-circle bg-light border" data-rowid="{{ $item->rowId }}">
                                                <i class="fa fa-plus"></i>
                                            </button>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <p class="mb-0 py-2 subtotal-item" data-rowid="{{ $item->rowId }}">S/. {{ number_format($item->price * $item->qty, 2) }}</p>
                                </td>
                                <td class="">
                                    <form action="{{route('removeitem')}}" method="post">
                                    @csrf
                                        <input type="hidden" name="rowId" value="{{$item->rowId}}">
                                        <button type="submit" class="btn btn-md rounded-circle bg-danger border">
                                            <i class="fa fa-times text-white"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="container py-4">
                    <a href="{{route('clear')}}" class="btn bg-dark py-2 px-4 text-white" style="border-radius: 10px;">Limpiar carrito</a>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-12">
                <!-- <div class="d-block justify-content-between">
                    <input type="text" class="border-0 border-bottom rounded py-3 mb-4" placeholder="Cupón">
                    <button class="btn btn-primary rounded-pill px-4" type="button">Aplicar cupón</button>
                </div> -->

                <div class="bg-light rounded">
                    <div class="p-4">
                        <h4 class="display-6 mb-4">Total de carrito</h4>
                        <div class="d-flex justify-content-between mb-4">
                            <h5 class="mb-0 me-4">Subtotal:</h5>
                            <p class="mb-0" id="subtotal-general">S/. {{number_format(Cart::subtotal()/1.18,2)}}</p>
                        </div>
                        <div class="d-flex justify-content-between">
                            <h5 class="mb-0 me-4">IGV</h5>
                            <div>
                                <p class="mb-0" id="igv">S/. {{number_format(Cart::subtotal() - Cart::subtotal()/1.18,2)}}</p>
                            </div>
                        </div>
                    </div>
                    <div class="py-4 mb-4 border-top border-bottom d-flex justify-content-between">
                        <h5 class="mb-0 ps-4 me-4">Total</h5>
                        <p class="mb-0 pe-4" id="cart-total">S/. {{number_format(Cart::subtotal(),2)}}</p>
                    </div>
                    <a href="/checkout" class="btn btn-primary rounded-pill px-4 py-3 text-uppercase mb-4 w-100"
                        type="button">Ir a pagar</a>
                </div>
            </div>
            @else
            <div class="container">
                <div class="row px-xl-5">
                    <h5>No existen productos en tu carrito</h5>
                    <div class="d-block m-auto">
                        <a href="/" class="btn btn-primary py-2 px-4" style="border-radius: 10px;">Ir al inicio</a>
                    </div>
                </div>
            </div>
            @endif
        </div>
    </div>
</div>
<!-- Cart Page End -->


@include('partials.footer')

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).on('click', '.btn-plus, .btn-minus', function(e) {
        e.preventDefault();
        let input = $(this).closest('.quantity').find('.qty-input');
        let rowId = input.data('rowid');
        let qty   = parseInt(input.val());

        if ($(this).hasClass('btn-plus')) {
            qty++;
        } else {
            if (qty > 1) qty--;
        }

        input.val(qty);

        // AJAX para actualizar carrito
        $.ajax({
            url: "{{ route('cart.update') }}",
            method: "POST",
            data: {
                _token: "{{ csrf_token() }}",
                rowId: rowId,
                qty: qty
            },
            success: function(response) {
                if (response.success) {
                    // actualizar subtotal del item
                    $(`.subtotal-item[data-rowid='${rowId}']`).text('S/. ' + response.subtotalItem);

                    // actualizar resumen
                    $("#subtotal-general").text('S/. ' + response.subtotalGeneral);
                    $("#igv").text('S/. ' + response.igv);
                    $("#cart-total").text('S/. ' + response.total);
                    $("#cartTotal").text('S/. ' + response.total);
                }
            }
        });
    });
</script>

@endsection