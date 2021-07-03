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
    <main>
      <div class="container-fluid">
        <section class="section-home-mt container col-md-10 mx-auto">
          <div class="row">
            <div class="col-md-5 pt-md-5 order-md-1 order-3">
              <div class="d-md-block d-none">
                <h1>Usá tus Dai para <br> pedir un préstamos</h1>
                <h2 class="font-60 text-primary font-weight-bold">al 24%</h2>
              </div>
              <div>
                <div class="d-flex align-items-center mt-md-5 mt-5"><img class="mr-2" src="img/icono-manito.svg"/>
                  <p class="mb-0"><b class="mr-1 font-weight-500">¡Es fácil!</b>Dejá tus Dai en garantía y llévate  <br class="d-md-block d-none"> pesos para gastar en lo que necesites.</p>
                </div>
                <div class="d-flex align-items-center mt-3"><img class="mr-2" src="img/icono-rayo.svg"/>
                  <p class="mb-0"><b class="mr-1 font-weight-500">¡Al toque!</b>Lo pedís y lo tenéis acreditado <br class="d-md-block d-none">en el momento.</p>
                </div>
                <div class="d-flex align-items-center mt-3"><img class="mr-2" src="img/icono-atras.svg"/>
                  <p class="mb-0"><b class="mr-1 font-weight-500">¡Lo cancelas cuando quieras!</b>Ni bien lo <br class="d-md-block d-none">haces, te devolvemos los Dai.</p>
                </div>
              </div>
            </div>
            <div class="col-md-2 d-md-block d-none order-md-2 order-2 px-md-0">
              <embed src="img/persona-1.svg"/>
            </div>
            <div class="col-md-5 pt-5 order-md-3 order-1 pl-md-5 align-items-center d-md-flex">
              <div class="d-md-none d-block mb-4">
                <h1>Usá tus Dai para <br> pedir un préstamos</h1>
                <h2 class="font-60 text-primary font-weight-bold">al 24%</h2>
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
                <div class="rgba-blue-slight d-flex align-items-center justify-content-center py-2 text-primary">
                  <p class="mb-0 text-right font-12 mr-2">Interés anual a <br> partir de tan solo</p><span class="font-30 font-weight-bold">22%</span>
                </div>
                <button class="btn btn-primary btn-md btn-rounded my-4 col-md-6 mx-auto font-12 col-8 simular_prestamo font-15">Simular préstamo</button>
              </div>
            </div>
          </div>
        </section>
      </div>
    </main>
    <!-- Footer-->
    <footer class="page-footer pt-4 mt-5">
      <!-- Copyright--><img class="img-background z-index-1 d-md-block d-none" src="img/curva-d-p.svg"/><img class="img-background z-index-1 d-md-none d-block" src="img/curva-m-p.svg"/>
      <div class="py-3 text-center">
        <div class="container-fluid pt-md-4 pt-4"><a href=""><img src="img/logo-buenbit-d-w.svg"/></a></div>
      </div>
      <!-- Copyright-->
    </footer>
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