<!-- Topbar Start -->
<div class="container-fluid">
    <div class="row align-items-center bg-light py-3 px-xl-5 d-none d-lg-flex">
        <div class="col-lg-4">
            <a href="/" class="text-decoration-none">
                <img height="50" src="{{asset("storage/$business->image")}}" alt="">
            </a>
        </div>
        <div class="col-lg-4 col-6 text-left">
            <form action="">
                <div class="input-group" style="position: relative;">
                    <input type="text" id="buscar" class="form-control" placeholder="Search for products">
                    <div class="input-group-append">
                        <span class="input-group-text bg-transparent text-primary">
                            <i class="fa fa-search"></i>
                        </span>
                    </div>
                    <ul id="resultados" style="position: absolute; z-index:9;" class="list-group mt-5"></ul>
                </div>
            </form>
        </div>
        <div class="col-lg-4 col-6 text-right">
            <p class="m-0">Servicio al cliente</p>
            <h5 class="m-0">{{$business->phone}}</h5>
        </div>
    </div>
</div>
<!-- Topbar End -->