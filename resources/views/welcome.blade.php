@extends('layouts.app')
@section('content')
    {{-- <x-spiner></x-spiner> --}}
    <div class="static-slider1 py-4 containericons" id="home">
        <div class="bgg"></div>
        <div class="bgg bgg2"></div>
        <div class="bgg bgg3"></div>

        <div class="icons-money col-12 d-flex flex-wrap ">
            <div class="moneda"></div>
            <div class="billete"></div>
            <div class="moneda"></div>
            <div class="billete"></div>
            <div class="moneda"></div>
            <div class="billete"></div>
            <div class="moneda"></div>
            <div class="billete"></div>
            <div class="moneda"></div>
            <div class="billete"></div>

        </div>

        <div class="container">
            <!-- Row  -->
            <div class="row d-flex align-items-end">
                <!-- Column -->
                <div class="col-md-7 col-sm-12 align-self-center hero-text">
                    <h1 class="title mt-5 text-white">Trabajando Juntos podemos lograr <br> <span
                            class="typed-text-output typewrite" data-period="2000"
                            data-type='[ "Crecimiento", "Rentabilidad", "Seguridad" ]'></span></h1>
                    <a href="" class="btn btn-border py-3 px-4 m-5">Convertirme en inversionista</a>
                </div>
                <!-- Column -->
                <div class="col-md-5 col-sm-12 mt-5 hero-img">
                    <img src="img/hero.png" alt="wrapkit" class="img-fluid rebote" />
                </div>
            </div>
        </div>
    </div>

    <div class="service-39 py-5 wrap-service39-box">
        <div class="container">
            <div class="row">
                <div class="col-lg-6"><img src="/img/emp.png" class="img-fluid" alt="wrapkit" /></div>
                <div class="col-lg-6">
                    <div class="card-body">
                        <h3 class="text-uppercase">Acerca de Nosotros</h3>
                        <p class="my-4">En CRWDBSNESS, nos apasiona impulsar la innovación y el crecimiento empresarial a
                            través de la colaboración colectiva. Somos una plataforma de financiamiento colectivo que se
                            dedica a conectar inversores visionarios con proyectos prometedores en una variedad de giros y
                            sectores. Nuestro objetivo principal es democratizar la inversión y fomentar la diversificación
                            para lograr los mejores rendimientos posibles para nuestros inversionistas.</p>
                        <!-- column  -->

                        <h4>Con nosotros puede encontrar</h4>


                        <!-- column  -->
                        <div class="d-flex d-md-flex align-content-center mb-4">
                            <div class="display-5 mr-3"><i class="fas fa-shield-alt text-success-gradiant mx-5"></i>
                            </div>
                            <div>
                                <h5>Seguridad</h5>
                                <h6 class="subtitle font-weight-normal">Todas tus inversiones son totalmente seguras y
                                    monitoriadas a diario</h6>
                            </div>
                        </div>
                        <!-- column  -->

                        <!-- column  -->
                        <div class="d-flex d-md-flex align-content-center mb-4">
                            <div class="display-5 mr-3"><i class="fas fa-shield-alt text-success-gradiant mx-5"></i>
                            </div>
                            <div>
                                <h5>Retorno</h5>
                                <h6 class="subtitle font-weight-normal">Puedes obtener retorno de tu inversión desde el
                                    primer mes</h6>
                            </div>
                        </div>
                        <!-- column  -->

                        <!-- column  -->
                        <div class="d-flex d-md-flex align-content-center mb-4">
                            <div class="display-5 mr-3"><i class="fas fa-brain text-success-gradiant mx-5"></i></div>
                            <div>
                                <h5>Conocimiento </h5>
                                <h6 class="subtitle font-weight-normal">contamos con gran experiencia y
                                    conocimiento profundo del mercado financiero </h6>
                            </div>
                        </div>
                        <!-- column  -->
                    </div>
                </div>
            </div>
        </div>

        <div class="container mt-5">
            <div class="row g-5">
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
                    {{-- <div class="d-flex align-items-center mb-5">
                        <div class="years flex-shrink-0 text-center me-4">
                            <h1 class="display-1 mb-0">7</h1>
                            <h5 class="mb-0">Años</h5>
                        </div>
                        <h3 class="lh-base mb-0">De experiencia impulsando nuevas empresas</h3>
                    </div> --}}
                    <h2>¿Por qué invertir con nosotros?
                    </h2>
                    <p class="mb-4">
                        Invertir con CRWDBSNESS es una oportunidad única para aquellos que buscan un enfoque fresco y dinámico en el mundo de las inversiones. Aquí hay algunas razones por las cuales deberías considerar unirte a nuestra comunidad de inversionistas visionarios:
                        <ul>
                            <li> Diversificación Inteligente: Accede a proyectos en diversos sectores para construir una cartera
                                balanceada que maximice el potencial de crecimiento y reduzca riesgos.</li>
                            <li>Fomento de la Innovación: Respaldamos emprendedores audaces que están cambiando industrias,
                                permitiéndote ser parte del progreso y evolución.</li>
                            <li>Transparencia Total: Mantenemos una comunicación abierta y brindamos información clara sobre cada
                                proyecto, asegurando que estés informado en todo momento.</li>
                            <li>Participación en el Éxito: Al invertir, compartes las recompensas del éxito de las empresas
                                respaldadas, siendo parte activa de su crecimiento.</li>
                            <li>Comunidad de Visión: Únete a una red de inversores y emprendedores apasionados que comparten su
                                conocimiento y perspectivas.</li>
                        </ul>
                       

                        

                        

                        

                        
                    </p>
                </div>
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="row g-3 mb-4">
                        <div class="col-sm-6">
                            <img class="img-fluid rounded" src="img/about-1.jpg" alt="">
                        </div>
                        <div class="col-sm-6">
                            <img class="img-fluid rounded" src="img/about-2.jpg" alt="">
                        </div>
                    </div>


                    <div class="block-counter-1 section-counter">
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="counter">
                                    <div class="number-wrap text-success-gradiant">
                                        <span class="block-counter-1-number" data-number="3">0</span><span
                                            class="append">K</span>
                                    </div>
                                    <span class="block-counter-1-caption">inversionistas</span>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="counter">
                                    <div class="number-wrap text-success-gradiant">
                                        <span class="block-counter-1-number " data-number="7">0</span><span
                                            class="append"></span>
                                    </div>
                                    <span class="block-counter-1-caption">Años de experiencia</span>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="counter">
                                    <div class="number-wrap text-success-gradiant">
                                        <span class="block-counter-1-number " data-number="100">0</span><span
                                            class="append">%</span>
                                    </div>
                                    <span class="block-counter-1-caption">Satisfacción</span>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>


    </div>

    <!-- Team Start -->
    <div class="py-6 pb-5" id="proyects">
        <div class="container">
            <div class="row mb-5 wow fadeInUp d-flex justify-content-center " data-wow-delay="0.1s">
                <h1 class="display-5 mb-5 text-center">Proyetos</h1>
                <p class="text-center" style="max-width: 700px"> 
                    Explora nuestra lista de proyectos actuales para descubrir las oportunidades de inversión que ofrecemos. Desde startups disruptivas hasta proyectos de expansión bien establecidos, cada proyecto tiene su propia historia y potencial. Únete a nosotros en CRWDBSNESS y sé parte de la próxima generación de inversionistas que respaldan la innovación y el crecimiento empresarial.
                </p>
            </div>
            <div class="row d-flex justify-content-center">

                @foreach ($projects as $project)
                    <div class="card card-company m-5">
                        <div class="card-img">
                            <img class="card-img-top img-fluid" src="{{ $project->logo_url }}" alt="Card image cap">
                        </div>
                        <div class="card-body">
                            <h4 class="card-title">{{ $project->name }}</h4>
                            <h6 class="card-subtitle">Exportadora de berries</h6>
                            <p class="stars mb-3 mt-2"><i class="fas fa-star"></i><i class="fas fa-star"></i><i
                                    class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i></p>
                            <b class="card-text">Rendimiento Estimado</b>
                            <span>de {{ $project->rendimiento }}% Anual</span>
                            <div class="mb-4 mt-4">
                                <div class="d-flex justify-content-between">
                                    <h6 class="font-weight-bold">{{ $project->meta }}</h6>
                                    <h6 class="font-weight-bold">{{ ((  $project->acciones - $project->acciones_disponibles ) / $project->acciones) * 100; }} %</h6>
                                </div>
                                <div class="progress">
                                    <div class="progress-bar bg-primary" role="progressbar" aria-valuenow="0"
                                        aria-valuemin="0" aria-valuemax="100" style="width: {{ ((  $project->acciones - $project->acciones_disponibles ) / $project->acciones) * 100; }}%;"></div>
                                </div>
                            </div>
                            <a href="{{ route('proyect', $project->id) }}" class="btn btn-primary">aprender mas</a>
                            <!-- <a href="" class="company-item rounded-end p-4"> Aprende mas
                                <i class="fa fa-arrow-right fa-2x text-primary"></i>
                            </a> -->

                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- Team End -->

    <!-- Service Start -->
    <div class="container-fluid bg-light my-5 py-6" id="service">
        <div class="container">
            <div class="row g-5 mb-5 wow fadeInUp" data-wow-delay="0.1s">
                <div class="col-12 text-center d-flex flex-colum row justify-content-center">
                    <h1 class="display-5 mb-0">Proyectos finalizados</h1>
                    <p class=" text-center mt-4" style="max-width: 700px"> Nuestro objetivo es brindarte oportunidades emocionantes para invertir en ideas que tienen el potencial de generar un impacto significativo y un crecimiento sostenible.</p>
                </div>
            </div>
            <div class="row g-5">

                <div class="col-lg-6 wow fadeInUp " data-wow-delay="0.1s">
                    <div class="service-item d-flex flex-column flex-sm-row bg-white h-100 p-4 p-lg-5 finish">
                        <div class="bg-icon flex-shrink-0 mb-3">
                            <img src="/img/companies/fredos.png" class="img-fluid">
                        </div>
                        <div class="ms-sm-4">
                            <h4 class="mb-3">Fredos BarberClub</h4>
                            <h6 class="mb-3">Rendimiento estimado: <br>
                                <span class="text-primary">de 24.0% a 31.0% Anual</span>
                            </h6>


                            <div class="skill mb-4">
                                <span>Meta Mínima: $2,400,000</span>
                                <div class="d-flex justify-content-between">
                                    <h6 class="font-weight-bold">$2,000,000</h6>
                                    <h6 class="font-weight-bold">$2,400,000</h6>
                                </div>
                                <div class="progress">
                                    <div class="progress-bar bg-primary" role="progressbar" aria-valuenow="95"
                                        aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                            <div class="d-flex flex-column">
                                <span>Valor de la acción: $688.00</span>
                                <a href="#" class="btn btn-primary w-50 mt-3">Ver mas</a>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- Service End -->

    <section class="shop-banner">
        <div class="container mb-5" style="left: -300px;
        width: 50%;
        position: relative;
        
    ">
            <h3 class="title text-success-gradiant">
                Invierte en el Futuro 
                <br> Hoy<br></h3>
             <span >
                ¿Estás listo para ser parte de algo más grande? En CRWDBSNESS, no solo estamos redefiniendo la inversión, estamos forjando el camino hacia el futuro. Si estás buscando oportunidades que superen los límites y generen rendimientos reales, estás en el lugar correcto.
            </span>
        </div>
    </section>

    {{-- <div class="py-5 c2a1">
        <div class="container w-75 blur">
            <!-- Row -->
            <div class="row justify-content-center">
                <div class="col-md-7 text-center">
                    <h1 class="mb-3 card-title banner-inf title">Conviértete en inversionista</h1>
                    <p class="">Lorem ipsum dolor sit amet, consectetur
                        adipiscelit. Nam malesu dolor sit amet, consectetur adipiscelit. consectetur adipiscelit.
                        Nam malesu dolor.</p>
                    <a class="btn mt-3 btn-primary text-uppercase" href="#"><span>join us now</span></a>
                </div>
            </div>
            <!-- Row -->
        </div>
    </div> --}}


    <section id="phrase">
        <div class="container">
            <blockquote>Hay poder inmenso cuando un grupo de personas con intereses similares se une para lograr las mismas
                metas.
                <span>&mdash; Idowu Koyenikan</span>
            </blockquote>
        </div>
    </section>


    <!-- Testimonial Start -->
    <div class="container-fluid bg-light" id="testimonial">
        <div class="container-fluid py-5">
            <h1 class="display-5 text-center mb-5 wow fadeInUp" data-wow-delay="0.1s">Testimonios</h1>
            <div class="row justify-content-center">
                <div class="col-lg-3 d-none d-lg-block">
                    <div class="testimonial-left h-100">
                        <img class="img-fluid wow fadeIn" data-wow-delay="0.1s" src="img/testimonial-1.jpg"
                            alt="">
                        <img class="img-fluid wow fadeIn" data-wow-delay="0.3s" src="img/testimonial-2.jpg"
                            alt="">
                        <img class="img-fluid wow fadeIn" data-wow-delay="0.5s" src="img/testimonial-3.jpg"
                            alt="">
                    </div>
                </div>
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="owl-carousel testimonial-carousel">
                        <div class="testimonial-item text-center">
                            <div class="position-relative mb-5">
                                <img class="img-fluid rounded-circle border border-secondary p-2 mx-auto"
                                    src="img/testimonial-1.jpg" alt="">
                                <div class="testimonial-icon">
                                    <i class="fa fa-quote-left text-primary"></i>
                                </div>
                            </div>
                            <p class="fs-5 fst-italic">Dolores sed duo clita tempor justo dolor et stet lorem kasd
                                labore dolore lorem ipsum. At lorem lorem magna ut et, nonumy et labore et tempor
                                diam
                                tempor erat.</p>
                            <hr class="w-25 mx-auto">
                            <h5>Client Name</h5>
                            <span>Profession</span>
                        </div>
                        <div class="testimonial-item text-center">
                            <div class="position-relative mb-5">
                                <img class="img-fluid rounded-circle border border-secondary p-2 mx-auto"
                                    src="img/testimonial-2.jpg" alt="">
                                <div class="testimonial-icon">
                                    <i class="fa fa-quote-left text-primary"></i>
                                </div>
                            </div>
                            <p class="fs-5 fst-italic">Dolores sed duo clita tempor justo dolor et stet lorem kasd
                                labore dolore lorem ipsum. At lorem lorem magna ut et, nonumy et labore et tempor
                                diam
                                tempor erat.</p>
                            <hr class="w-25 mx-auto">
                            <h5>Client Name</h5>
                            <span>Profession</span>
                        </div>
                        <div class="testimonial-item text-center">
                            <div class="position-relative mb-5">
                                <img class="img-fluid rounded-circle border border-secondary p-2 mx-auto"
                                    src="img/testimonial-3.jpg" alt="">
                                <div class="testimonial-icon">
                                    <i class="fa fa-quote-left text-primary"></i>
                                </div>
                            </div>
                            <p class="fs-5 fst-italic">Dolores sed duo clita tempor justo dolor et stet lorem kasd
                                labore dolore lorem ipsum. At lorem lorem magna ut et, nonumy et labore et tempor
                                diam
                                tempor erat.</p>
                            <hr class="w-25 mx-auto">
                            <h5>Client Name</h5>
                            <span>Profession</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 d-none d-lg-block">
                    <div class="testimonial-right h-100">
                        <img class="img-fluid wow fadeIn" data-wow-delay="0.1s" src="img/testimonial-1.jpg"
                            alt="">
                        <img class="img-fluid wow fadeIn" data-wow-delay="0.3s" src="img/testimonial-2.jpg"
                            alt="">
                        <img class="img-fluid wow fadeIn" data-wow-delay="0.5s" src="img/testimonial-3.jpg"
                            alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Testimonial End -->

    <!-- Contact Start -->
    <div class="container-xxl py-5" id="contact">
        <div class="container py-5">
            <div class="row g-5 mb-5 wow fadeInUp" data-wow-delay="0.1s">
                <div class="col-12 text-center d-flex flex-colum row justify-content-center ">
                    <h1 class="display-5 mb-5 ">Trabajemos juntos</h1>
                    <p style="max-width: 700px">¿Listo para dar el siguiente paso o tienes preguntas? Estamos aquí para ayudarte. No dudes en ponerte en contacto con nosotros a través de cualquiera de los siguientes medios. Nuestro equipo estará encantado de asistirte en lo que necesites.</p>

                </div>
            </div>
            <div class="row g-5">
                <div class="col-lg-5 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <p class="mb-2">Nuestras oficinas:</p>
                    <h3 class="fw-bold">Calle 123, Los Reyes, Michoacan, México</h3>
                    <hr class="w-100">
                    <p class="mb-2">Llámanos:</p>
                    <h3 class="fw-bold">+012 345 6789</h3>
                    <hr class="w-100">
                    <p class="mb-2">Envianos un correo:</p>
                    <h3 class="fw-bold">contacto@crwdbsnss.com</h3>
                    <hr class="w-100">
                    <p class="mb-2">Siguenos:</p>
                    <div class="d-flex pt-2">
                        <a class="btn btn-square btn-primary me-2" href=""><i class="fab fa-twitter"></i></a>
                        <a class="btn btn-square btn-primary me-2" href=""><i class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-square btn-primary me-2" href=""><i class="fab fa-youtube"></i></a>
                        <a class="btn btn-square btn-primary me-2" href=""><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
                <div class="col-lg-7 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                    <form>
                        <div class="row g-3">
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="name" placeholder="Tu nombre">
                                    <label for="name">Tu nombre</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="email" class="form-control" id="email"
                                        placeholder="Tu correo electronico">
                                    <label for="email">Tu correo electronico</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="subject" placeholder="Asunto">
                                    <label for="subject">Asunto</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-floating">
                                    <textarea class="form-control" placeholder="Deja tu mensaje aquí" id="message" style="height: 100px"></textarea>
                                    <label for="message">Mensage</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <button class="btn btn-primary py-3 px-5" type="submit">Envia tu mensaje</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Contact End -->

    <!-- Map Start -->
    <div class="container-xxl pt-3 px-0 wow fadeInUp mb-5" data-wow-delay="0.1s">
        <div class="container-xxl px-0">
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d36513.810487042676!2d-102.47661213570906!3d19.602315107481537!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x842e418303a64449%3A0xf5803540e7c46628!2sSan%20Jos%C3%A9%201037%2C%20Quinta%20Real%2C%2060380%20Los%20Reyes%20de%20Salgado%2C%20Mich.!5e0!3m2!1ses-419!2smx!4v1687810927670!5m2!1ses-419!2smx"
                frameborder="0" style="width: 100%; height: 460px; border:0;" allowfullscreen="" aria-hidden="false"
                tabindex="0"></iframe>
        </div>
    </div>
    <!-- Map End -->

    <!-- logo carousel -->
    <div class="logo-carousel-section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="logo-carousel owl-carousel owl-theme">
                        <div class="logo-item">
                            <img src="/img/company-logos/1.png" alt="" />
                        </div>
                        <div class="logo-item">
                            <img src="/img/company-logos/2.png" alt="" />
                        </div>
                        <div class="logo-item">
                            <img src="/img/company-logos/3.png" alt="" />
                        </div>
                        <div class="logo-item">
                            <img src="/img/company-logos/4.png" alt="" />
                        </div>
                        <div class="logo-item">
                            <img src="/img/company-logos/5.png" alt="" />
                        </div>
                        <div class="logo-item">
                            <img src="/img/company-logos/5.png" alt="" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end logo carousel -->
@endsection
