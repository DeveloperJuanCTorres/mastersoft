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
                            @foreach($categoriesNav as $category)    
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
    <h1 class="text-center text-white display-6 wow fadeInUp" data-wow-delay="0.1s">Tienda</h1>
    <ol class="breadcrumb justify-content-center mb-0 wow fadeInUp" data-wow-delay="0.3s">
        <li class="breadcrumb-item"><a href="/">Inicio</a></li>
        <li class="breadcrumb-item active text-white">Tienda</li>
    </ol>
</div>
<!-- Single Page Header End -->

<!-- Shop Page Start -->
<div class="container-fluid shop py-5">
    <div class="container py-5">
        <div class="row g-4">
            <div class="col-lg-3 wow fadeInUp" data-wow-delay="0.1s">
                <form id="filterForm">
                    <div class="pb-4">
                        <div class="input-group w-100 mx-auto d-flex">
                            <input type="text" name="search" class="form-control p-3" placeholder="Buscar"
                                aria-describedby="search-icon-1" id="searchInput" value="{{ request('search') }}">
                            <span id="search-icon-1" class="input-group-text p-3"><i
                                    class="fa fa-search"></i></span>
                        </div>
                    </div>
                    <div class="mb-4 w-100">
                        <button type="button" id="resetFilters" class="btn btn-sm btn-danger">Limpiar filtros</button>
                    </div>
                    <h4>Categorías</h4>
                    <div class="additional-product mb-4 overflow-auto" style="max-height: 400px;">
                        
                        @foreach($categories as $key => $category)                        
                        <div class="additional-product-item d-flex align-items-center justify-content-between">
                            <div class="d-flex align-items-center flex-grow-1 me-2">
                                <input type="radio" class="me-2" id="category-{{$key}}" name="categories[]" value="{{ $category->id }}" {{ request('categories') == $category->id ? 'checked' : '' }}>
                                <label for="category-{{$key}}" class="text-dark mb-0" style="font-size: 14px; word-break: break-word;">{{$category->name}}</label>
                            </div>
                            <span class="badge border font-weight-normal bg-primary">{{$category->productsInStock->count()}}</span>
                        </div>
                        @endforeach
                    </div>
                    <hr>
                    <!-- <div class="price mb-4">
                        <h4 class="mb-2">Price</h4>
                        <input type="range" class="form-range w-100" id="rangeInput" name="rangeInput" min="0" max="500"
                            value="0" oninput="amount.value=rangeInput.value">
                        <output id="amount" name="amount" min-velue="0" max-value="500" for="rangeInput">0</output>
                        <div class=""></div>
                    </div> -->
                    <h4>Marcas</h4>
                    <div class="additional-product mb-4 overflow-auto" style="max-height: 400px;">
                        
                        @foreach($brands as $key => $brand)
                        <div class="additional-product-item d-flex align-items-center justify-content-between">
                            <div class="d-flex align-items-center flex-grow-1 me-2">
                                <input type="radio" class="me-2" id="brand-{{$key}}" name="brands[]" value="{{ $brand->id }}">
                                <label for="brand-{{$key}}" class="text-dark mb-0" style="font-size: 13px; word-break: break-word;">{{$brand->name}}</label>
                            </div>
                            <span class="badge border font-weight-normal bg-primary">{{$brand->productsInStock->count()}}</span>
                        </div>
                        @endforeach
                    </div>
                    <hr>
                    @foreach($promotions as $promotion)
                    <div class="wow fadeInLeft py-2" data-wow-delay="0.1s">
                        <a href="{{route('product.detail', $promotion->product)}}">
                            <div class="bg-primary rounded position-relative">
                                <img src="storage/{{$promotion->image}}" class="img-fluid w-100 rounded" alt="">
                            </div>
                        </a>
                    </div>
                    @endforeach
                </form>
            </div>
            <div class="col-lg-9 wow fadeInUp" data-wow-delay="0.1s">                
                <div class="row g-4 justify-content-end">                    
                    <div class="d-flex justify-content-end">
                        <ul class="nav nav-pills d-inline-flex text-center py-2 px-2 rounded bg-light mb-4" style="flex-wrap: nowrap !important;">
                            <li class="nav-item me-4" style="font-size: 12px;">
                                <a class="bg-light" data-bs-toggle="pill" href="#tab-5">
                                    <i class="fas fa-th fa-3x text-primary"></i>
                                </a>
                            </li>
                            <li class="nav-item" style="font-size: 12px;">
                                <a class="bg-light" data-bs-toggle="pill" href="#tab-6">
                                    <i class="fas fa-bars fa-3x text-primary"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- Spinner oculto al principio -->
                <div id="loadingSpinner" class="hidden absolute inset-0 flex items-center justify-center bg-white bg-opacity-75 z-10">
                    <div class="w-12 h-12 border-4 border-blue-500 border-dashed rounded-full animate-spin"></div>
                </div>
                <div class="tab-content" id="productContainer">
                    @include('product-list')
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Shop Page End -->



@include('partials.footer')

@push('scripts')
<!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script> -->
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="js/addcart.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
    const form = document.getElementById('filterForm');
    const productContainer = document.getElementById('productContainer');
    const loadingSpinner = document.getElementById('loadingSpinner');
    const searchInput = document.getElementById('searchInput');
    const resetFilters = document.getElementById('resetFilters');

    let debounceTimeout;

    searchInput.addEventListener('input', function () {
        clearTimeout(debounceTimeout);
        debounceTimeout = setTimeout(() => {
            fetchProducts();
        }, 300);
    });

    // 🟥 Limpiar todos los filtros
    resetFilters.addEventListener('click', function () {
        form.reset(); // limpia todos los inputs del formulario
        searchInput.value = '';  
        $('#buscar').val('');
        form.querySelectorAll('input[type="radio"], input[type="checkbox"]').forEach(el => el.checked = false);
        updateURLWithoutParams();
        fetchProducts(); // recarga todos los productos
    });

    form.addEventListener('change', function () {
        fetchProducts();
    });

    function fetchProducts(page = 1) {
        const formData = new FormData(form);
        const params = new URLSearchParams(formData);

        loadingSpinner.classList.remove('hidden'); // Mostrar spinner

        fetch(`{{ route('store') }}?${params.toString()}&page=${page}`, {
            headers: {
                'X-Requested-With': 'XMLHttpRequest'
            }
        })
        .then(response => response.text())
        .then(html => {
            productContainer.innerHTML = html;
            updateURLParams(params);
        })
        .finally(() => {
            loadingSpinner.classList.add('hidden'); // Ocultar spinner
        });
    }

    // Paginación AJAX
    document.addEventListener('click', function(e) {
        if (e.target.closest('.pagination a')) {
            e.preventDefault();
            const url = new URL(e.target.href);
            const page = url.searchParams.get('page');
            fetchProducts(page);
        }
    });

    // 🧩 Actualiza la URL en tiempo real sin recargar la página
    function updateURLParams(params) {
        const newUrl = `${window.location.pathname}?${params.toString()}`;
        window.history.replaceState({}, '', newUrl);
    }

    // 🧼 Limpia la URL completamente (sin parámetros)
    function updateURLWithoutParams() {
        const cleanUrl = window.location.origin + window.location.pathname;
        window.history.replaceState({}, '', cleanUrl);
    }
});
</script>
@endpush

@endsection