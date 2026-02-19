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


<style>
    :root {
        --primary: #2563eb;
        --bg: #f8fafc;
        --card: #ffffff;
        --text: #1f2937;
        --muted: #6b7280;
        --border: #e5e7eb;
    }

    .tc-header {
        background: linear-gradient(135deg, #16243D, #16243D);
        color: #fff;
        padding: 3rem 1rem;
        text-align: center;
    }

    .tc-header h1 {
        font-size: 2.2rem;
        font-weight: 700;
        margin: 0;
    }

    .tc-header p {
        margin-top: .5rem;
        opacity: .9;
    }

    .tc-container {
        max-width: 900px;
        margin: -40px auto 60px;
        padding: 0 1rem;
    }

    .tc-card {
        background: var(--card);
        border-radius: 14px;
        padding: 2.5rem;
        box-shadow: 0 20px 40px rgba(0,0,0,.08);
        border: 1px solid var(--border);
    }

    .tc-card h2 {
        color: var(--primary);
        font-size: 1.3rem;
        margin-top: 2rem;
        font-weight: 600;
    }

    .tc-card h2:first-child {
        margin-top: 0;
    }

    .tc-card p {
        margin: .5rem 0 1rem;
        line-height: 1.7;
    }

    .tc-card ul {
        padding-left: 1.2rem;
    }

    .tc-footer {
        text-align: center;
        color: var(--muted);
        font-size: .9rem;
        padding-bottom: 2rem;
    }

    @media (max-width: 600px) {
        .tc-card {
            padding: 1.5rem;
        }

        .tc-header h1 {
            font-size: 1.8rem;
        }
    }
</style>

<section class="tc-header">
    <img src="{{asset('storage/' . $business->image)}}" width="200" alt="Logo">
        <h1 class="text-white">Términos y Condiciones</h1>
    <p>Última actualización: {{ now()->format('d/m/Y') }}</p>
</section>

<section class="tc-container">
    <div class="tc-card">

        {!! Str::markdown($terminos->description) !!}

    </div>
</section>

<div class="tc-footer my-5">
    © {{ date('Y') }} <strong>{{ config('app.name') }}</strong> ·
</div>



@include('partials.footer')

@push('scripts')

@endpush

@endsection