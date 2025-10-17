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
                        <a href="/store" class="nav-item nav-link active">Tienda</a>
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
                    <div class="product-categories mb-4">
                        <h4>Categorías</h4>
                        <ul class="list-unstyled overflow-auto" style="max-height: 400px;">
                            @foreach($categories as $category)
                            <li>
                                <div class="categories-item">
                                    <input type="radio" class="custom-control-input" style="width: 20px;" name="categories[]" value="{{ $category->id }}">                       
                                    <label class="custom-control-label text-dark">{{$category->name}}</label>                                        
                                    <span class="badge border font-weight-normal bg-primary" style="float: right;">{{$category->productsInStock->count()}}</span>
                                </div>
                            </li>                        
                            @endforeach
                        </ul>
                    </div>
                    <div class="price mb-4">
                        <h4 class="mb-2">Price</h4>
                        <input type="range" class="form-range w-100" id="rangeInput" name="rangeInput" min="0" max="500"
                            value="0" oninput="amount.value=rangeInput.value">
                        <output id="amount" name="amount" min-velue="0" max-value="500" for="rangeInput">0</output>
                        <div class=""></div>
                    </div>
                    <div class="additional-product mb-4 overflow-auto" style="max-height: 400px;">
                        <h4>Marcas</h4>
                        @foreach($brands as $key => $brand)
                        <div class="additional-product-item">
                            <input type="radio" class="me-2" id="Categories-{{$key}}" name="brands[]" value="{{ $brand->id }}">
                            <label for="Categories-{{$key}}" class="text-dark"> {{$brand->name}}</label>
                            <span class="badge border font-weight-normal bg-primary" style="float: right;">{{$brand->productsInStock->count()}}</span>
                        </div>
                        @endforeach
                    </div>
                    <div class="featured-product mb-4">
                        <h4 class="mb-3">Featured products</h4>
                        <div class="featured-product-item">
                            <div class="rounded me-4" style="width: 100px; height: 100px;">
                                <img src="img/product-3.png" class="img-fluid rounded" alt="Image">
                            </div>
                            <div>
                                <h6 class="mb-2">SmartPhone</h6>
                                <div class="d-flex mb-2">
                                    <i class="fa fa-star text-secondary"></i>
                                    <i class="fa fa-star text-secondary"></i>
                                    <i class="fa fa-star text-secondary"></i>
                                    <i class="fa fa-star text-secondary"></i>
                                    <i class="fa fa-star"></i>
                                </div>
                                <div class="d-flex mb-2">
                                    <h5 class="fw-bold me-2">2.99 $</h5>
                                    <h5 class="text-danger text-decoration-line-through">4.11 $</h5>
                                </div>
                            </div>
                        </div>
                        <div class="featured-product-item">
                            <div class="rounded me-4" style="width: 100px; height: 100px;">
                                <img src="img/product-4.png" class="img-fluid rounded" alt="Image">
                            </div>
                            <div>
                                <h6 class="mb-2">Smart Camera</h6>
                                <div class="d-flex mb-2">
                                    <i class="fa fa-star text-secondary"></i>
                                    <i class="fa fa-star text-secondary"></i>
                                    <i class="fa fa-star text-secondary"></i>
                                    <i class="fa fa-star text-secondary"></i>
                                    <i class="fa fa-star"></i>
                                </div>
                                <div class="d-flex mb-2">
                                    <h5 class="fw-bold me-2">2.99 $</h5>
                                    <h5 class="text-danger text-decoration-line-through">4.11 $</h5>
                                </div>
                            </div>
                        </div>
                        <div class="featured-product-item">
                            <div class="rounded me-4" style="width: 100px; height: 100px;">
                                <img src="img/product-5.png" class="img-fluid rounded" alt="Image">
                            </div>
                            <div>
                                <h6 class="mb-2">Camera Leance</h6>
                                <div class="d-flex mb-2">
                                    <i class="fa fa-star text-secondary"></i>
                                    <i class="fa fa-star text-secondary"></i>
                                    <i class="fa fa-star text-secondary"></i>
                                    <i class="fa fa-star text-secondary"></i>
                                    <i class="fa fa-star"></i>
                                </div>
                                <div class="d-flex mb-2">
                                    <h5 class="fw-bold me-2">2.99 $</h5>
                                    <h5 class="text-danger text-decoration-line-through">4.11 $</h5>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex justify-content-center my-4">
                            <a href="#" class="btn btn-primary px-4 py-3 rounded-pill w-100">Vew More</a>
                        </div>
                    </div>
                    <a href="#">
                        <div class="position-relative">
                            <img src="img/product-banner-2.jpg" class="img-fluid w-100 rounded" alt="Image">
                            <div class="text-center position-absolute d-flex flex-column align-items-center justify-content-center rounded p-4"
                                style="width: 100%; height: 100%; top: 0; right: 0; background: rgba(242, 139, 0, 0.3);">
                                <h5 class="display-6 text-primary">SALE</h5>
                                <h4 class="text-secondary">Get UP To 50% Off</h4>
                                <a href="#" class="btn btn-primary rounded-pill px-4">Shop Now</a>
                            </div>
                        </div>
                    </a>
                    <div class="product-tags py-4">
                        <h4 class="mb-3">PRODUCT TAGS</h4>
                        <div class="product-tags-items bg-light rounded p-3">
                            <a href="#" class="border rounded py-1 px-2 mb-2">New</a>
                            <a href="#" class="border rounded py-1 px-2 mb-2">brand</a>
                            <a href="#" class="border rounded py-1 px-2 mb-2">black</a>
                            <a href="#" class="border rounded py-1 px-2 mb-2">white</a>
                            <a href="#" class="border rounded py-1 px-2 mb-2">tablats</a>
                            <a href="#" class="border rounded py-1 px-2 mb-2">phone</a>
                            <a href="#" class="border rounded py-1 px-2 mb-2">camera</a>
                            <a href="#" class="border rounded py-1 px-2 mb-2">drone</a>
                            <a href="#" class="border rounded py-1 px-2 mb-2">talevision</a>
                            <a href="#" class="border rounded py-1 px-2 mb-2">slaes</a>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-lg-9 wow fadeInUp" data-wow-delay="0.1s">
                <div class="rounded mb-4 position-relative">
                    <img src="img/product-banner-3.jpg" class="img-fluid rounded w-100" style="height: 250px;"
                        alt="Image">
                    <div class="position-absolute rounded d-flex flex-column align-items-center justify-content-center text-center"
                        style="width: 100%; height: 250px; top: 0; left: 0; background: rgba(242, 139, 0, 0.3);">
                        <h4 class="display-5 text-primary">SALE</h4>
                        <h3 class="display-4 text-white mb-4">Get UP To 50% Off</h3>
                        <a href="#" class="btn btn-primary rounded-pill">Shop Now</a>
                    </div>
                </div>
                <div class="row g-4">
                    <div class="col-xl-7">
                        <div class="input-group w-100 mx-auto d-flex">
                            <input type="search" class="form-control p-3" placeholder="keywords"
                                aria-describedby="search-icon-1">
                            <span id="search-icon-1" class="input-group-text p-3"><i
                                    class="fa fa-search"></i></span>
                        </div>
                    </div>
                    <div class="col-xl-3 text-end">
                        <div class="bg-light ps-3 py-3 rounded d-flex justify-content-between">
                            <label for="electronics">Sort By:</label>
                            <select id="electronics" name="electronicslist"
                                class="border-0 form-select-sm bg-light me-3" form="electronicsform">
                                <option value="volvo">Default Sorting</option>
                                <option value="volv">Nothing</option>
                                <option value="sab">Popularity</option>
                                <option value="saab">Newness</option>
                                <option value="opel">Average Rating</option>
                                <option value="audio">Low to high</option>
                                <option value="audi">High to low</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-4 col-xl-2">
                        <ul class="nav nav-pills d-inline-flex text-center py-2 px-2 rounded bg-light mb-4" style="flex-wrap: nowrap !important;">
                            <li class="nav-item me-4">
                                <a class="bg-light" data-bs-toggle="pill" href="#tab-5">
                                    <i class="fas fa-th fa-3x text-primary"></i>
                                </a>
                            </li>
                            <li class="nav-item">
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
});
</script>
@endpush

@endsection