<?php session_start(); ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    <meta http-equiv="x-ua-compatible" content="ie=edge"/>
    <title>Buenbit || Calculadora</title>
    <!-- Font Awesome-->
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.0.10/css/all.css"/>
    <!-- Bootstrap core CSS-->
    <link rel="stylesheet" href="css/bootstrap.min.css"/>
    <!-- Bootstrap slider rang-->
    <link rel="stylesheet" href="css/bootstrap-slider.css"/>
    <!-- Material Design Bootstrap-->
    <link rel="stylesheet" href="css/buenbit.css"/>
  </head>
  <body>
    <header>
      <!-- Navbar-->
      <nav class="navbar fixed-top navbar-expand-lg scrolling-navbar double-nav bg-white">
        <div class="container col-md-10">
          <!-- SideNav slide-out button-->
          <div class="float-left d-md-none d-block"><a><img src="img/logo-buenbit-d.svg"/></a>
            <!--
            a.button-collapse.black-text(href='#' data-activates='slide-out')
                i.fas.fa-bars
            -->
          </div>
          <!-- Breadcrumb-->
          <div class="breadcrumb-dn mr-auto"><a><img src="img/logo-buenbit-d.svg"/></a></div>
          <!-- Navbar links-->
          <ul class="nav navbar-nav nav-flex-icons ml-auto d-md-flex d-none">
            <li class="nav-item align-items-center d-flex"><a class="nav-link text-primary font-weight-normal"><span class="clearfix d-none d-sm-inline-block">Descargá la app</span></a></li>
            <li class="nav-item mx-md-3"><a class="nav-link btn btn-rounded btn-outline-primary btn-lg px-4 py-2"><span class="clearfix d-none d-sm-inline-block">Crear cuenta</span></a></li>
            <li class="nav-item"><a class="nav-link btn btn-rounded btn-primary btn-lg px-4 py-2"><span class="clearfix d-none d-sm-inline-block">Ingresar</span></a></li>
          </ul>
          <!-- Navbar links-->
        </div>
      </nav>
      <!-- Navbar-->
    </header>
    <main class="pb-md-5">
      <div class="container-fluid">
        <section class="section-home-mt container col-md-10 mx-auto">
          <div class="row">
            <div class="col-md-5 pt-md-5 order-md-1 order-3">
              <div class="d-md-block d-none">
                <h1>Usá tus stablecoins <br> para pedir un <br> préstamo en pesos</h1>
                <h2 class="font-60 text-primary font-weight-bold">al 0%</h2>
              </div>
              <div>
                <div class="d-flex align-items-center mt-md-5 mt-5"><img class="mr-2" src="img/icono-manito.svg"/>
                  <p class="mb-0"><b class="mr-1 font-weight-500">¡No gastes tus ahorros!</b>Dejá tus criptomonedas <br class="d-md-block d-none"> estables como garantía y llévate pesos.</p>
                </div>
                <div class="d-flex align-items-center mt-md-3  mt-5"><img class="mr-2" src="img/icono-rayo.svg"/>
                  <p class="mb-0"><b class="mr-1 font-weight-500">¡Al toque!</b>Lo pedís y lo tenéis acreditado <br class="d-md-block d-none">en el momento.</p>
                </div>
                <div class="d-flex align-items-center mt-md-3  mt-5"><img class="mr-2" src="img/icono-atras.svg"/>
                  <p class="mb-0"><b class="mr-1 font-weight-500">¡Lo cancelás cuando quieras!</b>Ni bien lo <br class="d-md-block d-none">hacés, te devolvemos tus criptos.</p>
                </div>
              </div>
            </div>
            <div class="col-md-2 d-md-block d-none order-md-2 order-2 px-md-0">
              <embed src="img/home-imagen.svg" class="img-home"/>
            </div>
            <div class="col-md-5 pt-5 order-md-3 order-1 pl-md-5 align-items-center d-md-flex">
              <div class="d-md-none d-block mb-4">
                <h1 class="font-35-m">Usá tus stablecoins <br> para pedir un <br> préstamo en pesos</h1>
                <h2 class="font-60 text-primary font-weight-bold">al 0%</h2>
              </div>
              <div class="card pt-5 ml-md-4 col-md-11 px-md-0">
                <p class="text-center">¿Cuántos pesos necesitás?</p>
                <div class="d-flex align-items-center">
                  <div class="col-md-3 text-right"><small>ARG</small></div>
                  <div class="col-md-6">
                    <div class="text-center align-items-center font-35 justify-content-center set_amount view_input_set">$<span class="amount">5.000</span></div>
                    <div class="md-form">
                      <input class="form-control mb-md-1 mb-0 set_amount numberico" id="amount_input_set" type="number" style="display:none;" placeholder="Monto" min="5" max="50000"/>
                    </div>
                    <input class="amount_input" type="hidden" name="amount" value="5000"/>
                  </div>
                  <div class="col-md-3"><a class="view_input_set"><i class="fas fa-retweet"></i></a></div>
                </div>
                <div class="justify-content-center d-flex my-3 col-10 mx-auto find">
                  <div class="text-primary mr-3" id="bajar"><i class="fal fa-minus-circle font-23"></i></div>
                  <input id="ex13" type="text"/>
                  <div class="text-primary ml-3" id="subir"><i class="fal fa-plus-circle font-23"></i></div>
                </div>
                <button class="btn btn-primary btn-md btn-rounded my-4 col-md-6 mx-auto font-12 col-8 simular_prestamo font-15">Simular préstamo</button>
              </div>
            </div>
          </div>
        </section>
        <section class="container col-md-10 mx-auto pt-5">
            <div class="row mt-5">
                <div class="col-md-4">
                    <small>FAQs</small>
                    <h3 class="font-weight-normal">Préstamos</h3>
                </div>
                <div class="col-md-8">
                    <div class="accordion md-accordion" id="accordion-progress" role="tablist" aria-multiselectable="true">
                        <!-- Accordion card -->
                        <div class="card">

                            <!-- Card header -->
                            <div class="card-header" role="tab" id="heading-1043">
                                <a data-toggle="collapse" href="#collapse-1043" aria-expanded="false" aria-controls="collapse-1043" class="collapsed">
                                    <h6 class="mb-0 text-secondary
">
                                        ¿Enviar el formulario de este sitio web implica que voy a recibir el préstamo?                  <i class="fa fa-angle-down rotate-icon"></i>
                                    </h6>
                                </a>
                            </div>

                            <!-- Card body -->
                            <div id="collapse-1043" class="collapse px-md-4" role="tabpanel" aria-labelledby="heading-1043" data-parent="#accordion-progress">
                                <small>
                                    No. Al completar el formulario de este sitio web una persona de nuestro equipo va a contactarte para asesorarte, responder todas tus dudas y acompañarte en el proceso de otorgación del préstamo en pesos sólo si decides avanzar.
                                </small>
                            </div>
                        </div>
                        <!-- Accordion card -->
                        <!-- Accordion card -->
                        <div class="card">

                            <!-- Card header -->
                            <div class="card-header" role="tab" id="heading-1044">
                                <a data-toggle="collapse" href="#collapse-1044" aria-expanded="false" aria-controls="collapse-1044" class="collapsed">
                                    <h6 class="mb-0 text-secondary
">
                                        ¿Cuáles son los requisitos para obtener un préstamo?                  <i class="fa fa-angle-down rotate-icon"></i>
                                    </h6>
                                </a>
                            </div>

                            <!-- Card body -->
                            <div id="collapse-1044" class="collapse  px-md-4" role="tabpanel" aria-labelledby="heading-1044" data-parent="#accordion-progress">
                                <small>
                                    Para poder acceder a un préstamo en pesos garantizado con criptomonedas es necesario ser persona física, mayor a 18 años y contar con capacidad para contratar y ser usuario de Buenbit. Deberán haber aceptado los términos y condiciones generales del servicio de Créditos Colaterizados como así también los TYC y Políticas de Privacidad de Buenbit.
                                </small>
                            </div>
                        </div>
                        <!-- Accordion card -->
                        <!-- Accordion card -->
                        <div class="card">

                            <!-- Card header -->
                            <div class="card-header" role="tab" id="heading-1045">
                                <a data-toggle="collapse" href="#collapse-1045" aria-expanded="false" aria-controls="collapse-1045" class="collapsed">
                                    <h6 class="mb-0 text-secondary
">
                                        ¿Puedo solicitar un préstamo en criptomonedas?  <i class="fa fa-angle-down rotate-icon"></i>
                                    </h6>
                                </a>
                            </div>

                            <!-- Card body -->
                            <div id="collapse-1045" class="collapse  px-md-4" role="tabpanel" aria-labelledby="heading-1045" data-parent="#accordion-progress">
                                <small> No, el préstamo que obtendrás es en pesos argentinos.</small>
                            </div>
                        </div>
                        <!-- Accordion card -->
                        <!-- Accordion card -->
                        <div class="card">

                            <!-- Card header -->
                            <div class="card-header" role="tab" id="heading-1046">
                                <a data-toggle="collapse" href="#collapse-1046" aria-expanded="false" aria-controls="collapse-1046" class="collapsed">
                                    <h6 class="mb-0 text-secondary
">                                    ¿Puedo cancelar la totalidad de mi préstamo antes del vencimiento?  <i class="fa fa-angle-down rotate-icon"></i>
                                    </h6>
                                </a>
                            </div>

                            <!-- Card body -->
                            <div id="collapse-1046" class="collapse  px-md-4" role="tabpanel" aria-labelledby="heading-1045" data-parent="#accordion-progress">
                                <small>Sí, podés cancelar la totalidad de tu préstamo antes del vencimiento pactado, asumiendo los costos administrativos por cancelación anticipada.</small>
                            </div>
                        </div>
                        <!-- Accordion card -->
                    </div>
                </div>
            </div>
            <div class="row mt-5">
                <div class="col-md-4">
                    <small>FAQs</small>
                    <h3 class="font-weight-normal">Garantías</h3>
                </div>
                <div class="col-md-8">
                    <div class="accordion md-accordion" id="accordion-progress" role="tablist" aria-multiselectable="true">
                        <!-- Accordion card -->
                        <div class="card">

                            <!-- Card header -->
                            <div class="card-header" role="tab" id="heading-1047">
                                <a data-toggle="collapse" href="#collapse-1047" aria-expanded="false" aria-controls="collapse-1047" class="collapsed">
                                    <h6 class="mb-0 text-secondary
">
                                        ¿En qué consiste la garantía en criptomonedas? <i class="fa fa-angle-down rotate-icon"></i>
                                    </h6>
                                </a>
                            </div>

                            <!-- Card body -->
                            <div id="collapse-1047" class="collapse  px-md-4" role="tabpanel" aria-labelledby="heading-1047" data-parent="#accordion-progress">
                                <small>
                                    ¡No gastes tus ahorros en criptomonedas! Podés obtener un préstamo en pesos y usar tus criptomonedas como garantía de la devolución, y de esa manera obtener mejores tasas de financiación. Nosotros mantenemos tus criptomonedas en resguardo y en concepto de garantía hasta que puedas cancelar tu préstamo. Una vez que canceles la totalidad de tu préstamo te devolvemos tus criptomonedas.
                                </small>
                            </div>
                        </div>
                        <!-- Accordion card -->
                        <!-- Accordion card -->
                        <div class="card">

                            <!-- Card header -->
                            <div class="card-header" role="tab" id="heading-1048">
                                <a data-toggle="collapse" href="#collapse-1048" aria-expanded="false" aria-controls="collapse-1048" class="collapsed">
                                    <h6 class="mb-0 text-secondary
">
                                        ¿Cuáles son las criptomonedas que puedo ofrecer en garantía?                  <i class="fa fa-angle-down rotate-icon"></i>
                                    </h6>
                                </a>
                            </div>

                            <!-- Card body -->
                            <div id="collapse-1048" class="collapse  px-md-4" role="tabpanel" aria-labelledby="heading-1048" data-parent="#accordion-progress">
                                <small>Podés ofrecer en garantía distintos tipos de stablecoins como DAI, USDT, USDC o USDB.</small>
                            </div>
                        </div>
                        <!-- Accordion card -->
                        <!-- Accordion card -->
                        <div class="card">

                            <!-- Card header -->
                            <div class="card-header" role="tab" id="heading-1049">
                                <a data-toggle="collapse" href="#collapse-1049" aria-expanded="false" aria-controls="collapse-1049" class="collapsed">
                                    <h6 class="mb-0 text-secondary
">
                                        ¿Cuál es el valor de las criptomonedas que tengo que ofrecer en garantía para obtener mi préstamo?                                        <i class="fa fa-angle-down rotate-icon"></i>
                                    </h6>
                                </a>
                            </div>

                            <!-- Card body -->
                            <div id="collapse-1049" class="collapse px-md-4" role="tabpanel" aria-labelledby="heading-1049" data-parent="#accordion-progress">
                                <small>El valor de las criptomonedas que deberás ofrecer en garantía depende del valor en pesos de tu préstamo y el costo financiero que quieras asumir. Cuanto mayor sea el valor del préstamo que querés obtener y menor el costo financiero que querés asumir, mayor será el valor de criptomonedas que necesitarás ofrecer en garantía. Podés calcular una estimación del valor a ofrecer en garantía usando la calculadora de simulación de préstamos en este sitio web.</small>
                            </div>
                        </div>
                        <!-- Accordion card -->
                        <!-- Accordion card -->
                        <div class="card">

                            <!-- Card header -->
                            <div class="card-header" role="tab" id="heading-1050">
                                <a data-toggle="collapse" href="#collapse-1050" aria-expanded="false" aria-controls="collapse-1050" class="collapsed">
                                    <h6 class="mb-0 text-secondary
">
                                        ¿En qué momento recupero mis criptomonedas?                                        <i class="fa fa-angle-down rotate-icon"></i>
                                    </h6>
                                </a>
                            </div>

                            <!-- Card body -->
                            <div id="collapse-1050" class="collapse px-md-4" role="tabpanel" aria-labelledby="heading-1050" data-parent="#accordion-progress">
                                <small>Una vez que canceles la totalidad del préstamo te devolveremos exactamente el mismo valor y en la misma criptomoneda que dejaste en garantía.</small>
                            </div>
                        </div>
                        <!-- Accordion card -->
                    </div>
                </div>
            </div>
            <div class="row mt-5">
                <div class="col-md-4">
                    <small>FAQs</small>
                    <h3 class="font-weight-normal">Cuotas</h3>
                </div>
                <div class="col-md-8">
                    <div class="accordion md-accordion" id="accordion-progress" role="tablist" aria-multiselectable="true">
                        <!-- Accordion card -->
                        <div class="card">

                            <!-- Card header -->
                            <div class="card-header" role="tab" id="heading-1088">
                                <a data-toggle="collapse" href="#collapse-1088" aria-expanded="false" aria-controls="collapse-1088" class="collapsed">
                                    <h6 class="mb-0 text-secondary">
                                        ¿En cuantas cuotas puedo cancelar mi préstamo? Podés cancelar tu préstamo en 3, 6 o 12 cuotas.                  <i class="fa fa-angle-down rotate-icon"></i>
                                    </h6>
                                </a>
                            </div>

                            <!-- Card body -->
                            <div id="collapse-1088" class="collapse  px-md-4" role="tabpanel" aria-labelledby="heading-1088" data-parent="#accordion-progress">
                                        ....
                            </div>
                        </div>
                        <!-- Accordion card -->
                        <!-- Accordion card -->
                        <div class="card">

                            <!-- Card header -->
                            <div class="card-header" role="tab" id="heading-1052">
                                <a data-toggle="collapse" href="#collapse-1052" aria-expanded="false" aria-controls="collapse-1052" class="collapsed">
                                    <h6 class="mb-0 text-secondary
">
                                        ¿Cuál es el sistema de amortización de las cuotas?                                        <i class="fa fa-angle-down rotate-icon"></i>
                                    </h6>
                                </a>
                            </div>

                            <!-- Card body -->
                            <div id="collapse-1052" class="collapse  px-md-4" role="tabpanel" aria-labelledby="heading-1052" data-parent="#accordion-progress">
                                <small>El sistema de amortización de las cuotas es el francés.</small>
                            </div>
                        </div>
                        <!-- Accordion card -->
                        <!-- Accordion card -->
                        <div class="card">

                            <!-- Card header -->
                            <div class="card-header" role="tab" id="heading-1053">
                                <a data-toggle="collapse" href="#collapse-1053" aria-expanded="false" aria-controls="collapse-1053" class="collapsed">
                                    <h6 class="mb-0 text-secondary
">
                                        ¿Cuál es el sistema de amortización de las cuotas?                                        <i class="fa fa-angle-down rotate-icon"></i>
                                    </h6>
                                </a>
                            </div>

                            <!-- Card body -->
                            <div id="collapse-1053" class="collapse  px-md-4" role="tabpanel" aria-labelledby="heading-1053" data-parent="#accordion-progress">
                                <small> El sistema de amortización de las cuotas es el francés.</small>
                            </div>
                        </div>
                        <!-- Accordion card -->
                        <!-- Accordion card -->
                        <div class="card">

                            <!-- Card header -->
                            <div class="card-header" role="tab" id="heading-1054">
                                <a data-toggle="collapse" href="#collapse-1054" aria-expanded="false" aria-controls="collapse-1054" class="collapsed">
                                    <h6 class="mb-0 text-secondary
">
                                        ¿Cómo puedo ver el vencimiento de mis cuotas?                                       <i class="fa fa-angle-down rotate-icon"></i>
                                    </h6>
                                </a>
                            </div>

                            <!-- Card body -->
                            <div id="collapse-1054" class="collapse  px-md-4" role="tabpanel" aria-labelledby="heading-1054" data-parent="#accordion-progress">
                                <small> Una vez que obtengas tu préstamo te brindaremos el detalle para que puedas controlar el vencimiento de las cuotas. De todas maneras, también te vamos a avisar un día antes de cada vencimiento para que puedas recordarlo.</small>
                            </div>
                        </div>
                        <!-- Accordion card -->
                        <!-- Accordion card -->
                        <div class="card">

                            <!-- Card header -->
                            <div class="card-header" role="tab" id="heading-1054">
                                <a data-toggle="collapse" href="#collapse-1054" aria-expanded="false" aria-controls="collapse-1054" class="collapsed">
                                    <h6 class="mb-0 text-secondary
">
                                        ¿Cómo puedo cancelar las cuotas?                                      <i class="fa fa-angle-down rotate-icon"></i>
                                    </h6>
                                </a>
                            </div>

                            <!-- Card body -->
                            <div id="collapse-1054" class="collapse  px-md-4" role="tabpanel" aria-labelledby="heading-1054" data-parent="#accordion-progress">
                                <small>Las cuotas se cancelan vía transferencia bancaria.</small>
                            </div>
                        </div>
                        <!-- Accordion card -->
                        <!-- Accordion card -->
                        <div class="card">

                            <!-- Card header -->
                            <div class="card-header" role="tab" id="heading-1055">
                                <a data-toggle="collapse" href="#collapse-1055" aria-expanded="false" aria-controls="collapse-1055" class="collapsed">
                                    <h6 class="mb-0 text-secondary
">
                                        ¿Qué pasa con la garantía si no puedo cancelar las cuotas?
                                        <i class="fa fa-angle-down rotate-icon"></i>
                                    </h6>
                                </a>
                            </div>

                            <!-- Card body -->
                            <div id="collapse-1055" class="collapse  px-md-4" role="tabpanel" aria-labelledby="heading-1055" data-parent="#accordion-progress">
                                <small>En caso que no puedas cancelar las cuotas, como última instancia podríamos acudir a utilizar tus criptomonedas en garantía para venderlas a precio de mercado contra pesos argentinos, y así saldar la deuda de tu préstamo.</small>
                                <small>En caso que el valor de tus criptomonedas en garantía superen el valor total del préstamo a cancelar, solo venderemos la cantidad de criptomonedas necesarias para cancelar el total de la deuda más los costos administrativos por la gestión, y el saldo en criptomonedas (en caso de existir), te será devuelto.</small>
                            </div>
                        </div>
                        <!-- Accordion card -->
                    </div>
                </div>
            </div>
        </section>
      </div>
    </main>
    <!-- Footer-->
    <div class="footer-background-home mt-md-5 align-items-center d-flex">
        <div class="container px-md-4 pt-md-5">
            <div class="row align-items-center d-flex">
                <div class="col-md-6">
                    <a href=""><img class="" src="img/logo-buenbit-d-w.svg" /></a>
                </div>
                <div class="col-md-6 text-right">
                    <a href=""><small class="text-white "><u>Términos y condiciones</u></small></a>
                </div>
            </div>
            <hr class="text-white border-info my-md-5">
            <div class="justify-content-center d-flex">
                <a href="" class="btn p-btn-footer btn-success" >
                    <i class="fab fa-spotify font-23"></i>
                </a>
                <a href="" class="btn p-btn-footer-f btn-success" >
                    <i class="fab fa-facebook-f font-23"></i>
                </a>
                <a href=""  class="btn p-btn-footer btn-success" >
                    <i class="fab fa-youtube font-20"></i>
                </a>
                <a href=""  class="btn p-btn-footer btn-success" >
                    <i class="fab fa-instagram font-23"></i>
                </a>
                <a href=""  class="btn p-btn-footer btn-success" >
                    <i class="fab fa-twitter font-23"></i>
                </a>
                <a href=""  class="btn p-btn-footer btn-success" >
                    <i class="fab fa-telegram-plane font-23"></i>
                </a>
            </div>
        </div>
    </div>

    <!-- Footer-->
    <!-- JQuery-->
    <script src="js/jquery-3.4.1.min.js"></script>
    <!-- Bootstrap tooltips-->
    <script type="text/javascript" src="js/popper.min.js"></script>
    <!-- Bootstrap core JavaScript-->
    <script type="text/javascript" src="js/bootstrap.js"></script>
    <!-- Bootstrap slider rang JavaScript-->
    <script type="text/javascript" src="js/bootstrap-slider.js"></script>
    <!-- MDB core JavaScript-->
    <script type="text/javascript" src="js/mdb.js"></script>
    <!-- Script-->
    <script type="text/javascript" src="js/script.js"></script>
  </body>
</html>