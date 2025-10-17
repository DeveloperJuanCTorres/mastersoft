<!-- Footer Start -->
<div class="container-fluid footer py-5 wow fadeIn" data-wow-delay="0.2s">
    <div class="container py-3">
        <div class="row g-5">
            <div class="col-md-6 col-lg-6 col-xl-3">
                <div class="footer-item d-flex flex-column">
                    <div class="footer-item">
                        <img width="200" src="{{asset("storage/$business->image")}}" alt="">
                        <p class="mb-3">Dolor amet sit justo amet elitr clita ipsum elitr est.Lorem ipsum dolor sit
                            amet, consectetur adipiscing elit consectetur adipiscing elit.</p>
                        <div class="position-relative mx-auto rounded-pill">
                            <input class="form-control rounded-pill w-100 py-3 ps-4 pe-5" type="text"
                                placeholder="Enter your email">
                            <button type="button"
                                class="btn btn-primary rounded-pill position-absolute top-0 end-0 py-2 mt-2 me-2">SignUp</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-6 col-xl-3">
                <div class="footer-item d-flex flex-column">
                    <h4 class="text-primary mb-4">Enlaces</h4>
                    <a href="#" class=""><i class="fas fa-angle-right me-2"></i> Inicio</a>
                    <a href="#" class=""><i class="fas fa-angle-right me-2"></i> Tienda</a>
                    <a href="#" class=""><i class="fas fa-angle-right me-2"></i> Nosotros</a>
                    <a href="#" class=""><i class="fas fa-angle-right me-2"></i> Contáctanos</a>
                    <a href="#" class=""><i class="fas fa-angle-right me-2"></i> Políticas de provacidad</a>
                    <a href="#" class=""><i class="fas fa-angle-right me-2"></i> Términos y condiciones</a>
                </div>
            </div>
            <div class="col-md-6 col-lg-6 col-xl-3">
                <div class="footer-item d-flex flex-column">
                    <h4 class="text-primary mb-4">Redes Sociales</h4>
                    <p>Duo stet tempor ipsum sit amet magna ipsum tempor est</p>
                    
                    <h6 class="text-secondary text-uppercase mt-4 mb-3">Síguenos</h6>
                    <div class="d-flex">
                        <a class="btn btn-primary btn-square mx-2" href="{{$business->link_youtube}}" target="_blank"><i class="fab fa-youtube"></i></a>
                        <a class="btn btn-primary btn-square mx-2" href="{{$business->link_facebook}}" target="_blank"><i class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-primary btn-square mx-2" href="{{$business->link_linkedin}}" target="_blank"><i class="fab fa-linkedin-in"></i></a>
                        <a class="btn btn-primary btn-square mx-2" href="{{$business->link_instagram}}" target="_blank"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-6 col-xl-3">
                <div class="footer-item d-flex flex-column">
                    <h4 class="text-primary mb-4">Libro de reclamaciones</h4>
                    <a href="/libro-reclamaciones">
                        <img class="d-block m-auto" width="90" src="{{asset('img/libro.png')}}" alt="">
                    </a>
                    <p class="text-center">RUC: {{$business->ruc}}</p>
                    <p class="text-center">{{$business->name}}</p>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Footer End -->


<!-- Copyright Start -->
<div class="container-fluid copyright py-4">
    <div class="container">
        <div class="row g-4 align-items-center">
            <div class="col-md-6 text-center text-md-start mb-md-0">
                <span class="text-white"><a href="#" class="border-bottom text-white"><i
                            class="fas fa-copyright text-light me-2"></i>{{$business->name}}</a>, Todos los derechos reservados.</span>
            </div>
            <div class="col-md-6 text-center text-md-end text-white">
                Distribuido por <a class="border-bottom text-white" target="_blank" href="https://vesergenperu.com">Grupo VesergenPerú</a>
            </div>
        </div>
    </div>
</div>
<!-- Copyright End -->


<!-- Back to Top -->
<a href="#" class="btn btn-primary back-to-top"><i class="fa fa-angle-double-up"></i></a>