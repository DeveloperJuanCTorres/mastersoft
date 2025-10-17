<div id="tab-5" class="tab-pane fade show p-0 active">
    <div class="row g-4 product">
        @foreach($products as $product)
            <div class="col-lg-4">
                <div class="product-item rounded wow fadeInUp" data-wow-delay="0.1s">
                    <div class="product-item-inner border rounded">
                        <div class="product-item-inner-item" style="height: 250px; display: flex; justify-content: center; align-items: center; overflow: hidden; background-color: #f8f8f8;">
                            @php
                                $imagenes = json_decode($product->images)
                            @endphp
                            @if($imagenes)
                            <img src="storage/{{$imagenes[0]}}" class="product-image" alt="">
                            @else
                            <img src="img/defectomaster.jpeg" class="product-image" alt="">
                            @endif
                            <div class="product-new">Nuevo</div>
                            <div class="product-details">
                                <a href="{{route('product.detail', $product)}}"><i class="fa fa-eye fa-1x"></i></a>
                            </div>
                        </div>
                        <div class="text-center rounded-bottom p-4">
                            <a href="{{route('product.detail', $product)}}" class="d-block mb-2">{{$product->taxonomy->name}}</a>
                            <a href="#" class="d-block h6 product-name">{{ Str::limit($product->name, 40, '...') }}</a>
                            <del class="me-2 fs-5">S/. {{$product->price*1.20}}</del>
                            <span class="text-primary fs-5">S/. {{$product->price}}</span>
                        </div>
                    </div>
                    <div class="product-item-add border border-top-0 rounded-bottom text-center p-4 pt-0">
                        <input type="hidden" id="qty" value="1">
                        <a href="javascript:void(0)" class="btn btn-primary border-secondary rounded-pill py-2 px-4 mb-4 addcart" data-id="{{$product->id}}">
                            <i class="fas fa-shopping-cart me-2"></i> 
                            Agregar al carrito
                        </a>
                        <div class="d-flex justify-content-between align-items-center">
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
                                        class="rounded-circle btn-sm-square border"><i
                                            class="fas fa-heart"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
        <div class="col-12 wow fadeInUp" data-wow-delay="0.1s">
            <div class="pagination d-flex justify-content-center mt-5">
                <a href="#" class="rounded">&laquo;</a>
                <a href="#" class="active rounded">1</a>
                <a href="#" class="rounded">2</a>
                <a href="#" class="rounded">3</a>
                <a href="#" class="rounded">4</a>
                <a href="#" class="rounded">5</a>
                <a href="#" class="rounded">6</a>
                <a href="#" class="rounded">&raquo;</a>
            </div>
        </div>
    </div>
</div>
<div id="tab-6" class="products tab-pane fade show p-0">
    <div class="row g-4 products-mini">
        @foreach($products as $product)
            <div class="col-lg-6">
                <div class="products-mini-item border">
                    <div class="row g-0">
                        <div class="col-5">
                            <div class="products-mini-img border-end" style="height: 180px; display: flex; justify-content: center; align-items: center; overflow: hidden; background-color: #f8f8f8;">
                                @php
                                    $imagenes = json_decode($product->images)
                                @endphp
                                @if($imagenes)
                                    <img src="storage/{{$imagenes[0]}}" class="product-image" alt="Image">
                                @else
                                    <img src="img/defectomaster.jpeg" class="img-fluid w-100 h-100" alt="">
                                @endif
                                <div class="products-mini-icon rounded-circle bg-primary">
                                    <a href="#"><i class="fa fa-eye fa-1x text-white"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-7">
                            <div class="products-mini-content p-3">
                                <a href="#" class="d-block mb-2">{{$product->taxonomy->name}}</a>
                                <a href="#" class="d-block h5">{{ Str::limit($product->name, 30, '...') }}</a>
                                <del class="me-2 fs-5">S/. {{$product->price*1.20}}</del>
                                <span class="text-primary fs-5">S/. {{$product->price}}</span>
                            </div>
                        </div>
                    </div>
                    <div class="products-mini-add border p-3">
                        <a href="#"
                            class="btn btn-primary border-secondary rounded-pill py-2 px-4"><i
                                class="fas fa-shopping-cart me-2"></i> Agregar al carrito</a>
                        <div class="d-flex">
                            <a href="#"
                                class="text-primary d-flex align-items-center justify-content-center me-3"><span
                                    class="rounded-circle btn-sm-square border"><i
                                        class="fas fa-random"></i></i></a>
                            <a href="#"
                                class="text-primary d-flex align-items-center justify-content-center me-0"><span
                                    class="rounded-circle btn-sm-square border"><i
                                        class="fas fa-heart"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
        <div class="col-12 wow fadeInUp" data-wow-delay="0.1s">
            <div class="pagination d-flex justify-content-center mt-5">
                <a href="#" class="rounded">&laquo;</a>
                <a href="#" class="active rounded">1</a>
                <a href="#" class="rounded">2</a>
                <a href="#" class="rounded">3</a>
                <a href="#" class="rounded">4</a>
                <a href="#" class="rounded">5</a>
                <a href="#" class="rounded">6</a>
                <a href="#" class="rounded">&raquo;</a>
            </div>
        </div>
    </div>
</div>





<div class="col-12">
    {{ $products->links('vendor.pagination.bootstrap-5') }}
</div>
