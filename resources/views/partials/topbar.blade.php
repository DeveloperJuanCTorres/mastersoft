
<!-- Spinner Start -->
<div id="spinner"
    class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
    <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
        <span class="sr-only">Loading...</span>
    </div>
</div>
<!-- Spinner End -->

<!-- Topbar Start -->

<div class="container-fluid px-5 py-4 d-none d-lg-block">
    <div class="row gx-0 align-items-center text-center">
        <div class="col-md-4 col-lg-3 text-center text-lg-start">
            <div class="d-inline-flex align-items-center">
                <a href="/" class="navbar-brand p-0">                    
                    <img height="70" src="{{asset("storage/$business->image")}}" alt="">
                </a>
            </div>
        </div>
        <div class="col-md-4 col-lg-6 text-center">
            <div class="position-relative ps-4">
                <div class="d-flex border rounded-pill">
                    <input class="form-control border-0 rounded-pill w-100 py-3" type="text"
                        data-bs-target="#dropdownToggle123" placeholder="Search Looking For?">
                    
                    <button type="button" class="btn btn-primary rounded-pill py-3 px-5" style="border: 0;"><i
                            class="fas fa-search"></i></button>
                </div>
            </div>
        </div>
        <div class="col-md-4 col-lg-3 text-center text-lg-end">
            <div class="d-inline-flex align-items-center">
                <a href="" class="btn btn-secondary rounded-pill py-2 px-4 px-lg-3 mb-3 mb-md-3 mb-lg-0"><i
                            class="fa fa-mobile-alt me-2"></i> +0123 456 7890</a>
            </div>
        </div>
    </div>
</div>
<!-- Topbar End -->

