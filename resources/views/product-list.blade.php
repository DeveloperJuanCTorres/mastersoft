<div class="col-12 pb-1">
    <div class="d-flex align-items-center justify-content-between mb-4">
        <!-- <div>
            <button class="btn btn-sm btn-light"><i class="fa fa-th-large"></i></button>
            <button class="btn btn-sm btn-light ml-2"><i class="fa fa-bars"></i></button>
        </div> -->
        <!-- <div class="ml-2">
            <div class="btn-group">
                <button type="button" class="btn btn-sm btn-light dropdown-toggle" data-toggle="dropdown">Sorting</button>
                <div class="dropdown-menu dropdown-menu-right">
                    <a class="dropdown-item" href="#">Latest</a>
                    <a class="dropdown-item" href="#">Popularity</a>
                    <a class="dropdown-item" href="#">Best Rating</a>
                </div>
            </div>
            <div class="btn-group ml-2">
                <button type="button" class="btn btn-sm btn-light dropdown-toggle" data-toggle="dropdown">Showing</button>
                <div class="dropdown-menu dropdown-menu-right">
                    <a class="dropdown-item" href="#">10</a>
                    <a class="dropdown-item" href="#">20</a>
                    <a class="dropdown-item" href="#">30</a>
                </div>
            </div>
        </div> -->
    </div>
</div>
@foreach($products as $product)
<div class="col-lg-4 col-md-6 col-sm-6 pb-1">
    <div class="product-item bg-light mb-4">
        <div class="product-img position-relative overflow-hidden">
            @php
                $imagenes = json_decode($product->images)
            @endphp
            @if($imagenes)
            <img class="img-fluid w-100" src="storage/{{$imagenes[0]}}" alt="">
            @else
            <img class="img-fluid w-100" src="img/defectomaster.jpeg" alt="">
            @endif
            <div class="product-action">
                <!-- <a class="btn btn-outline-dark btn-square" href=""><i class="fa fa-shopping-cart"></i></a> -->
                <!-- <a class="btn btn-outline-dark btn-square" href=""><i class="far fa-heart"></i></a>
                <a class="btn btn-outline-dark btn-square" href=""><i class="fa fa-sync-alt"></i></a> -->
                <input type="hidden" id="qty" value="1">
                <a class="btn btn-outline-dark addcart" href="#" data-id="{{$product->id}}">
                    <i class="fa fa-shopping-cart"></i>
                    Agregar al carrito
                </a>
                <a class="btn btn-outline-dark" href="{{route('product.detail', $product)}}">
                    <i class="fa fa-search"></i>
                </a>
            </div>
        </div>
        <div class="text-center py-4">
            <a class="h6 text-decoration-none text-truncate" href="">{{$product->name}}</a>
            <div class="d-flex align-items-center justify-content-center mt-2">
                <h5>S/. {{$product->price}}</h5><h6 class="text-muted ml-2"><del>S/. {{$product->price*1.20}}</del></h6>
            </div>
            <div class="d-flex align-items-center justify-content-center mb-1">
                <small>Stock ({{$product->stock}} {{$product->unidad_medida}})</small>
            </div>
        </div>
    </div>
</div>
@endforeach  
<div class="col-12">
    {{ $products->links('vendor.pagination.bootstrap-5') }}
    <!-- <nav>
        <ul class="pagination justify-content-center">
        <li class="page-item disabled"><a class="page-link" href="#">Previous</span></a></li>
        <li class="page-item active"><a class="page-link" href="#">1</a></li>
        <li class="page-item"><a class="page-link" href="#">2</a></li>
        <li class="page-item"><a class="page-link" href="#">3</a></li>
        <li class="page-item"><a class="page-link" href="#">Next</a></li>
        </ul>
    </nav> -->
</div>
