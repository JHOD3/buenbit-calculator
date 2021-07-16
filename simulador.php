<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>Buenbit || Calculadora</title>
    <!-- Font Awesome-->
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.0.10/css/all.css" />
    <!-- Bootstrap core CSS-->
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <!-- Bootstrap slider rang-->
    <link rel="stylesheet" href="css/bootstrap-slider.css" />
    <!-- Material Design Bootstrap-->
    <link rel="stylesheet" href="css/buenbit.css" />
</head>
<body>
<header>
    <!-- Navbar-->
    <nav class="navbar fixed-top navbar-expand-lg scrolling-navbar double-nav bg-white">
        <div class="container col-md-10">
            <!-- SideNav slide-out button-->
            <div class="float-left d-md-none d-block">
                <a><img src="img/logo-buenbit-d.svg" /></a>
                <!--
    a.button-collapse.black-text(href='#' data-activates='slide-out')
        i.fas.fa-bars
    -->
            </div>
            <!-- Breadcrumb-->
            <div class="breadcrumb-dn mr-auto">
                <a><img src="img/logo-buenbit-d.svg" /></a>
            </div>
            <!-- Navbar links-->
            <ul class="nav navbar-nav nav-flex-icons ml-auto d-md-flex d-none">
                <li class="nav-item align-items-center d-flex">
                    <a class="nav-link text-primary font-weight-normal"><span class="clearfix d-none d-sm-inline-block">Descargá la app</span></a>
                </li>
                <li class="nav-item mx-md-3">
                    <a class="nav-link btn btn-rounded btn-outline-primary btn-lg px-4 py-2"><span class="clearfix d-none d-sm-inline-block">Crear cuenta</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link btn btn-rounded btn-primary btn-lg px-4 py-2"><span class="clearfix d-none d-sm-inline-block">Ingresar</span></a>
                </li>
            </ul>
            <!-- Navbar links-->
        </div>
    </nav>
    <!-- Navbar-->
</header>
<main>
    <form method="post" action="php/send.php">
        <?php
        if (empty($_SESSION['token'])) {
            if (function_exists('mcrypt_create_iv')) {
                $_SESSION['token'] = bin2hex(mcrypt_create_iv(32, MCRYPT_DEV_URANDOM));
            }else{
                $_SESSION['token'] = bin2hex(openssl_random_pseudo_bytes(32));
            }
        }
        ?>
        <section class="section-home-mt">
            <div class="container col-md-10 mx-auto px-0 position-absolute z-index-99 absolute-center">
                <div class="row col-md-8 mx-auto pt-5 px-0">
                    <div class="mx-md-auto mb-4 col-11 mx-auto">
                        <h1 class="text-center">Simulador de operación</h1>
                    </div>
                    <div class="card py-md-5 pt-5 pb-2 col-md-12 px-0 col-11 mx-auto">
                        <p class="text-center">¿Cuántos pesos necesitás?</p>
                        <div class="justify-content-center d-flex my-3 border-bottom pb-4">
                            <div class="col-md-12 mx-md-auto">
                                <div class="d-flex align-items-center">
                                    <div class="col-md-3 text-right"><small>USDT</small></div>
                                    <div class="col-md-6">
                                        <div class="text-center align-items-center font-35 justify-content-center set_amount view_input_set"><span class="amount">5</span></div>
                                        <div class="md-form set_amount" style="display: none;">
                                            <input class="form-control validate mb-md-1 mb-0 numberico" id="amount_input_set" type="number" placeholder="Monto" min="5000" max="50000" />
                                            <div class="invalid-feedback">El monto debe estar entre $5.000 y $50.000</div>
                                        </div>
                                        <input class="amount_input" type="hidden" value="5000" />
                                    </div>
                                    <div class="col-md-3">
                                        <a class="view_input_set"><i class="fas fa-retweet"></i></a>
                                    </div>
                                </div>
                                <div class="justify-content-center d-flex my-3 col-10 mx-auto find">
                                    <div class="text-primary mr-4" id="bajar"><i class="fal fa-minus-circle font-23"></i></div>
                                    <input id="ex13" type="text" />
                                    <div class="text-primary ml-4" id="subir"><i class="fal fa-plus-circle font-23"></i></div>
                                </div>
                            </div>
                        </div>
                        <div class="border-bottom pb-4">
                            <p class="text-center mt-3 mb-3">¿En cuántos meses?</p>
                            <div class="justify-content-center d-flex">
                                <div data-toggle="buttons">
                                    <label class="btn btn-info active btn-rounded btn-c font-20"> <input class="meses" type="radio" name="meses" autocomplete="off" value="1" checked="" /> 1 </label>
                                    <label class="btn btn-info btn-rounded btn-c font-20"> <input class="meses" type="radio" name="meses" autocomplete="off" value="3" checked="" /> 3 </label>
                                    <label class="btn btn-info btn-rounded btn-c font-20"> <input class="meses" type="radio" name="meses" autocomplete="off" value="6" /> 6 </label>
                                    <label class="btn btn-info btn-rounded btn-c font-20"> <input class="meses" type="radio" name="meses" autocomplete="off" value="12" /> 12 </label>
                                </div>
                            </div>
                        </div>
                        <div class="border-bottom pb-4">
                            <p class="text-center mt-5">Vas a recibir:</p>
                            <div class="justify-content-center d-flex">
                                <div>
                                    <div class="col-md-6 justify-content-center d-flex align-items-center mx-md-auto">
                                        <small class="text-primary mr-md-3">USD</small>
                                        <span class="font-30 text-primary garantia">1.500</span>
                                        <input type="hidden" name="monto" id="monto" >
                                        <input type="hidden" name="meses" id="meses" >
                                        <input type="hidden" name="monto_recibir" id="monto_recibir" >
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div>
                            <div class="pb-md-1">
                                <p class="text-center mt-5">Datos personales</p>
                                <div class="justify-content-center d-flex">
                                    <div class="col-md-10">
                                        <div class="md-form md-outline">
                                            <input class="form-control validate mb-md-1 mb-0" id="form81" type="text" name="full_name" placeholder="Nombre y apellido" required/>
                                        </div>
                                        <div class="md-form md-outline">
                                            <input class="form-control validate" id="form82" type="email" placeholder="Email" name="email" required/>
                                        </div>
                                        <input type="hidden" name="token" value=<?=$_SESSION['token'];?>>
                                        <button type="submit" class="btn btn-primary btn-md btn-rounded mt-2 mx-auto font-12 col-12 test">Enviar solicitud</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="container-fluid py-md-4 py-3 justify-content-center col-11 mx-auto">
                        <a href=""><img class="mx-auto d-block" src="img/logo-buenbit-d-w.svg" /></a>
                    </div>
                </div>
            </div>
        </section>
    </form>
    <div class="footer-background-otra"></div>
</main>
<!--include ../components/_footer1-->
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
<!-- Script Simulador-->
<script type="text/javascript" src="js/xlsx.full.min.js"></script>
<script type="text/javascript" src="js/simulador.js"></script>
<script type="text/javascript" src="js/calculo-otras.js"></script>
</body>
</html>
