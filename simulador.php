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
<body class="img-background-simulador">
<header>
    <!-- Navbar-->
    <nav class="navbar fixed-top navbar-expand-lg scrolling-navbar double-nav">
        <div class="container col-md-10">
            <!-- SideNav slide-out button-->
            <div class="float-left d-md-none d-block">
                <a href="index.php">
                    <img src="img/logo-buenbit-d.svg"/>
                </a>
            </div>
            <!-- Breadcrumb-->
            <div class="breadcrumb-dn mr-auto">
                <a href="index.php">
                    <img src="img/logo-buenbit-d.svg" />
                </a>
            </div>
            <!-- Navbar links-->
            <ul class="nav navbar-nav nav-flex-icons ml-auto d-md-flex d-none">
                <li class="nav-item mx-md-3"><a href="https://app.buenbit.com/registro"
                                                class="nav-link btn btn-rounded btn-outline-primary btn-lg px-4 py-2"><span
                                class="clearfix d-none d-sm-inline-block">Crear cuenta</span></a></li>
                <li class="nav-item"><a href="https://app.buenbit.com/" class="nav-link btn btn-rounded btn-primary btn-lg px-4 py-2"><span
                                class="clearfix d-none d-sm-inline-block">Ingresar</span></a></li>
            </ul>
            <!-- Navbar links-->
        </div>
    </nav>
    <!-- Navbar-->
</header>
<main>
    <form method="post" class="mb-form-simulador" action="php/send.php">
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
            <div class="container col-md-10 mx-auto px-0">
                <div class="row col-md-8 mx-auto pt-5 px-0">
                    <div class="mx-md-auto mb-4 col-11 mx-auto">
                        <h1 class="text-center">Simulador de préstamos</h1>
                    </div>
                    <div class="card py-md-5 pt-5 pb-4 col-md-12 px-0 col-11 mx-auto">
                        <p class="text-center"><span class="font-weight-bold">Paso 1.</span> Definí el valor del préstamo <br class="d-md-none d-block"> en pesos que vas a pedir.</p>
                        <div class="justify-content-center d-flex my-3 border-bottom pb-5">
                            <div class="col-md-10 col-12 mx-md-auto">
                                <div class="d-flex align-items-center">
                                    <div class="col-md-3 text-right"><small>ARG</small></div>
                                    <div class="col-md-6">
                                        <div class="text-center align-items-center font-35 justify-content-center set_amount view_input_set">$<span class="amount">5</span></div>
                                        <div class="md-form set_amount my-0" style="display: none;">
                                            <input class="form-control validate mb-md-1 mb-0 numberico" id="amount_input_set" type="number" placeholder="Monto" min="5000" max="50000" />
                                            <div class="invalid-feedback">El monto debe estar entre $5.000 y $50.000</div>
                                        </div>
                                        <input class="amount_input" type="hidden" value="5000" />
                                    </div>
                                    <div class="col-md-3">
                                        <a class="view_input_set"><i class="fas fa-retweet"></i></a>
                                    </div>
                                </div>
                                <div class="justify-content-center d-flex my-3 col-12 mx-auto find">
                                    <div class="text-primary mr-4" id="bajar"><i class="fal fa-minus-circle font-23"></i></div>
                                    <input id="ex13" type="text" />
                                    <div class="text-primary ml-4" id="subir"><i class="fal fa-plus-circle font-23"></i></div>
                                </div>
                            </div>
                        </div>
                        <div>
                            <div class="border-bottom pb-5">
                                <p class="text-center mt-3">
                                    <span class="font-weight-bold">Paso 2.</span>
                                    Elegí en cuántas cuotas <br class="d-md-none d-block"> lo querés devolver.
                                </p>
                                <div class="justify-content-center d-flex">
                                    <div data-toggle="buttons">
                                        <label class="btn btn-info active btn-rounded btn-p font-20"> <input class="meses" type="radio" name="meses" autocomplete="off" value="3" checked="" /> 3 </label>
                                        <label class="btn btn-info btn-rounded btn-p font-20"> <input class="meses" type="radio" name="meses" autocomplete="off" value="6" /> 6 </label>
                                        <label class="btn btn-info btn-rounded btn-p font-20"> <input class="meses" type="radio" name="meses" autocomplete="off" value="12" /> 12 </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div>
                            <div class="border-bottom pb-5">
                                <p class="text-center mt-5"><span class="font-weight-bold">Paso 3.</span> Elegí la tasa nominal anual <br class="d-md-none d-block"> que querés pagar de intereses.</p>
                                <div class="justify-content-center d-flex">
                                    <div data-toggle="buttons">
                                        <label class="btn btn-info active btn-rounded btn-p font-20 py-md-2"> <input class="porcentaje" type="radio" name="porcentaje" autocomplete="off" value="0.0" checked="" /> 0% </label>
                                        <label class="btn btn-info btn-rounded btn-p font-20 py-md-2"> <input class="porcentaje" type="radio" name="porcentaje" autocomplete="off" value="0.25" /> 25% </label>
                                        <label class="btn btn-info btn-rounded btn-p font-20 py-md-2"> <input class="porcentaje" type="radio" name="porcentaje" autocomplete="off" value="0.50" /> 50% </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="border-bottom">
                            <div class="pb-5">
                                <div class="d-flex text-center justify-content-center align-items-center pt-md-5">
                                    <p class="text-center mb-0">
                                        Cuota mensual
                                    </p>
                                </div>
                                <p class="text-center "></p>
                                <div class="text-center">
                                    <div>
                                        <div class="col-md-6 justify-content-center d-flex align-items-center mx-md-auto">
                                            <span class="font-30 text-primary cuotas_inicial_con_iva">0</span></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div>
                            <div class="pb-5">
                                <div class="d-flex text-center justify-content-center align-items-center pt-md-5">
                                    <p class="text-center mb-0">
                                        Cantidad de criptomonedas <br class="d-md-none d-block"> a ofrecer en garantía
                                    </p>
                                    <a class="ml-md-3 mt-md-auto mt-4" type="button" data-toggle="modal" data-target="#exampleModal2">
                                        <img src="img/icono14.svg" alt="">
                                    </a>
                                </div>
                                <p class="text-center "></p>
                                <div class="text-center">
                                    <div>
                                        <div class="col-md-6 justify-content-center d-flex align-items-center mx-md-auto">
                                            <span class="font-30 text-primary garantia">0</span></div>
                                    </div>
                                    <img src="img/img-gratia.svg" alt="" class="mx-auto d-block">
                                    <small class="text-muted font-10">Podés dejar DAI, USDT, USDC, BUSD</small>
                                </div>
                            </div>
                        </div>
                        <div class="grey lighten-4 border-bottom border-top">
                            <p class="text-center pt-2 pt-md-4 mb-0">Detalle del préstamo a solicitar</p>
                            <div class="text-center pb-4">
                               <small class="font-10"> Valores de referencia sujetos a cambios en las cotizaciones</small>
                            </div>
                            <div class="d-flex align-items-center justify-content-center pb-2 text-muted pb-md-4">
                            <table>
                                <tr>
                                    <td class="font-12-m text-md-left text-right">Monto solicitado: </td>
                                    <td class="font-weight-bold monto_solicitado pl-md-4 font-12-m text-primary">0</td>
                                    <input type="hidden" class="monto_solicitado" name="monto_solicitado">
                                </tr>
                                <tr>
                                    <td class="font-12-m text-md-left text-right">Cuotas: </td>
                                    <td class="font-weight-bold cuotas pl-md-4 font-12-m text-primary">0</td>
                                    <input type="hidden" class="cuotas" name="cuotas">
                                </tr>
                                <tr>
                                    <td class="font-12-m text-md-left text-right">Cuota inicial con IVA: </td>
                                    <td class="font-weight-bold cuotas_inicial_con_iva pl-md-4 font-12-m text-primary">0</td>
                                    <input type="hidden" class="cuotas_inicial_con_iva" name="cuotas_inicial_con_iva">
                                </tr>
                                <tr>
                                    <td class="font-12-m text-md-left text-right">Garantía en criptomonedas necesaria: </td>
                                    <td class="font-weight-bold garantia_en_cripto pl-md-4 font-12-m text-primary">0</td>
                                    <input type="hidden" class="garantia_en_cripto" name="garantia_en_cripto">
                                </tr>
                                <tr>
                                    <td class="font-12-m text-md-left text-right">Costo Financiero Total (CFT): </td>
                                    <td class="font-weight-bold  pl-md-4 font-12-m text-primary">
                                        <span class="interes">0%</span>
                                        <a type="button" data-toggle="modal" data-target="#exampleModal">
                                            <img src="img/icono14.svg" alt="">
                                        </a>
                                    </td>
                                    <input type="hidden" class="interes_input" name="interes">
                                </tr>
                                <tr>
                                    <td class="font-12-m text-md-left text-right">Monto total a cancelar: </td>
                                    <td class="font-weight-bold monto_total_cancelar pl-md-4 font-12-m text-primary">0</td>
                                    <input type="hidden" class="monto_total_cancelar" name="monto_total_cancelar">
                                </tr>
                            </table>
                        </div>
                        </div>
                        <div>
                            <div class="pb-md-1">
                                <p class="text-center mt-5 mb-0">Dejanos tus datos y te <br class="d-md-none d-block"> contactaremos a la brevedad</p>
                                <div class="text-center pb-4">
                                    <small class="font-10"> El envío del formulario no implica la otorgación del préstamo</small>
                                </div>
                                <div class="justify-content-center d-flex">
                                    <div class="col-md-10">
                                        <div class="md-form md-outline">
                                            <input class="form-control validate mb-md-1 mb-0 font-14 padding-10-bb" id="form81" type="text" name="full_name" placeholder="Nombre y apellido" required/>
                                        </div>
                                        <div class="md-form md-outline">
                                            <input class="form-control validate font-14 padding-10-bb mb-1" id="form82" type="email" placeholder="Email" name="email" required/>
                                        </div>
                                        <div class="md-form md-outline">
                                            <input class="form-control validate font-14 padding-10-bb" id="form82" type="tel" placeholder="Teléfono" name="phone"/>
                                        </div>
                                        <input type="hidden" name="token" value=<?=$_SESSION['token'];?>>
                                        <button type="submit" class="btn btn-primary btn-md btn-rounded mt-2 mx-auto font-12 col-12 test">Enviar solicitud</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </form>
</main>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content p-4 border-radius-card">
            <div class="modal-header border-0 py-0">

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="fal fa-times-circle text-secondary"></i>
                </button>
            </div>
            <div class="modal-body border-0">
                <p class="font-12">
                    El Costo Financiero Total (CFT) indica el costo real del préstamo. Este tiene en cuenta todos los conceptos que se pagan por el mismo: los intereses que surgen de la tasa y el IVA sobre los intereses. Por eso, este CFT podría ser distinto a la tasa nominal anual que seleccionaste en el Paso 3, ya que la tasa nominal anual no considera el IVA sobre los intereses.
                </p>
            </div>
        </div>
    </div>
</div>

<!-- Modal 2-->
<div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel2" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content p-4 border-radius-card">
            <div class="modal-header border-0 py-0">

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="fal fa-times-circle text-secondary"></i>
                </button>
            </div>
            <div class="modal-body border-0">
                <p class="font-12">
                    El valor de las criptomonedas a ofrecer en garantía depende del valor en pesos de tu préstamo, la cantidad de cuotas a pagar y el costo financiero que quieras asumir. Cuanto mayor sea el valor del préstamo que querés obtener y la cantidad de cuotas a pagar, y menor el costo financiero que querés asumir, mayor será el valor de criptomonedas que necesitarás ofrecer en garantía.
                </p>
                <p class="font-12">
                    Nosotros mantenemos tus criptomonedas en resguardo y en concepto de garantía hasta que puedas cancelar tu préstamo. Una vez que canceles la totalidad de tu préstamo te devolvemos tus criptomonedas.
                </p>
                <p class="font-12">
                    Aclaración <br>
                    <span class="font-weight-bold">Podés dejar DAI, USDT, USDC, BUSD.</span>
                </p>
            </div>
        </div>
    </div>
</div>


<!-- Footer-->
<div class="footer-background-home align-items-center d-flex w-100 position-absolute pt-5 md-footer-simulador-m-top">
    <div class="container px-md-4 pt-md-5">
        <div class="row align-items-center d-flex">
            <div class="col-6">
                <a href="index.php">
                    <img src="img/logo-buenbit-d-w.svg"/>
                </a>
            </div>
            <div class="col-6 text-right">
                <a href="terminos.php">
                    <small class="text-white ">
                        <u>Términos y condiciones</u>
                    </small>
                </a>
            </div>
        </div>
        <hr class="text-white border-info mt-5 mb-5 mb-md-5 col-md-12 col-10" style="opacity: .2" >
        <div class="justify-content-center d-flex">
            <a href="https://open.spotify.com/show/5VfrmT5T2fmyxQNZEwY8wJ?si=jcfqwbLsS-6pJFnBCjMamA&nd=1"
               class="p-btn-footer-f">
                <img class="iconos-footer"
                     src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAFQAAABUCAYAAAAcaxDBAAAACXBIWXMAABYlAAAWJQFJUiTwAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAQjSURBVHgB7Z1NT1NBFIbf2woigkZdmVj3inuif0Bda/wFujfiWuPer73+ATGu1biHPyDGtbhFw5cCAvW8vTPtpVzotD13binnSQ79oMXwcObMmam5kyCQer2eyM2YxKjEiMQJiQTDSV1iW+KfxJbERpIk9ZA3dhQiIqtyMy5xGsMrMIQ/EmsiduewFx0oyGXkJFKRRos1pGJzMzZXqMvKCxJVGHkwS5fysnWfUJHJ+ngOJrMTlPlLpG5nn6xkH7jMNJlh0NF556xJU6irmTbMu6NRGp27BtkMnYTJ7AU6m/APGkJd2tps3jsTfuj7DJ2A0S/s1VERsxX/wOiLcdZSyjwJQwO6HOOXURhajJpQXUYo1FolPaoUepx3kLSpVGCoYkKVMaHKmFBlTKgyJlQZE6qMCVXGhCpjQpUxocqYUGVMqDImVJkTiM8liSmJyxJXJc66x3D3z7S9fkViWWLR3eftT4mvEgvuuYEhkQ+WLqJ4bknclLiN/cL6hYIp9pPEHFLZpRFD6COJx4gHM/e9xEeUIDeG0O/Qz8pQmLVvJOYRiUERuoJWfcyjhrT29gpLwVOkpaFQYgi9J/Ha3ac0/lIclvPu/jLCJxb+YTiZ+YnthrsNHQFPJN6iQGJNSl7EDxQzK1PsdaST39Qhr+Mf7woKJJbQmLA8zCCV2565LCnTKJAy+tA8OITzelDia2toZvO1D5GKZbmZyXxvFgUTO0MpjEPyGtIhyvu1wPdSKGsvhfn6GzLJ1Ny/w/fPoWBiCr2PtB/VbKEol5LYHn3GABBLKLPxA4rFy32BEldLsYRyyH055PsU4OvksnvO11RGDd1l9juUJDbmkH8m8QDpL8ll4TekGbUY+H4KZe31/Sc3VjrV3+cSLxGRo942UTBrM0vKQXLvIOLS86jvh3LWZ4s07W7zsj20i1BhmDaY2WO2i/UTVTTKGPJ+kplCqw/1y8W8bOJExSUra292H6BTo8+fFVqf1Ygt9BX0NpmZebMYgE3lLDGFFtmLltYmtRNTKLOSvagf1guZ8Ov19iGa7UVDtutKF1vGWl5jG49iufGR1y5xYTCNkj68G4btO7+jlBV7F5Fnd88w7YdSLFdi/uOOUhjGDeZSsf85oowJVcaEKmNClTGhyphQZUyoMiZUGROqjAlVxoQqY0KVMaHKmFBlKDToYs1GELsUugNDix0K3YKhxbYJ1WWTQjdhdVSLjUqSJLtIL3pv9MdfXtvet03rMPpllV8aQt0F7i1Le2fdHxKQbexp2Fqo7qGzVf+gKdTV0iWY1G7wR1g0J/U9S0+Xtr9hUkNouGo/D8QOV+mN8MNVPO5y7Dx9wS7Jvhd2RKtdHf+TxWUrxZ7C8YXy2AWt93xA1b6f2DpCjde95xFB1W7ef8SgQIrjEWpcSQYfofYfLLMzGMYDiWoAAAAASUVORK5CYII="
                     alt="">
            </a>
            <a href="https://www.facebook.com/Buenbit/" class="p-btn-footer-f">
                <img class="iconos-footer"
                     src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAFQAAABUCAYAAAAcaxDBAAAACXBIWXMAABYlAAAWJQFJUiTwAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAALUSURBVHgB7Z1NctNAEIV75MSE4FAFrKCAC+QAHIELULCn4AQcgJtwAthzkZzAFLtABcfkz47TLY8cxZGVsfwWLeV9Vc+ObMeLr3pGI6tqOkgis9ks6NOOpq/Z1mxpgnSTmWaiudCca05DCLOUf7xTiIrs6dOu5pF0V2AK/zXHKnZa96GVgmJF7slcJLnmWOZiKyu2UmisymeanpAqrEoPq6r1llCVafPjE6HMuzCZf1TqpPxiVj6IlUmZaZijp9HZgoXQOGdymK9HPjVGdznlCt0TymyCORsUB7nQWLY8mzdnUAz9okIHQjbF1uqSqdmsOCAbsWtzqcl8IASBudyxh74QFH0KxbJtQrlUwtEzoff5FyQ0WSYECoWCoVAwFAqGQsFQKBgKBUOhYLbEP481HzRvNa9iqnghDvAudF/zTVZLdIdnoSbxh8wrtDV4nkO/SMtkGl6Fmsj30kK8Dvn9hM/8i3GFV6Gva94baj5qDsQhXof8y5r3DsSpTKONC/sjcQyvlMBQKJigN+efiw++l/6uu8QcxizzThzgSehvaY4JfiMO6MqQ/yVO6IpQN2f+rggdihMoFIynS8/ySeWT5vOKz/3UfF16zc2Q9yS0XGV1P3ociaOKXIYLezAUCoZCwVAoGAoFQ6FgKBQMhYKhUDAUCoZCwVAoGAoFQ6FgKBSMp7ueZZrcRnaBV6GthUMeDIWCoVAwFAqGQsFQKBgKBUOhYCgUjAlN2qyZJHFpQqdCUExN6LkQFBMKxXJmQs+E8yiK0yyEcCnzTe/JZpzY3vbFsmksZFNG9pALjRvcs0qbMy6aBJQX9maYS6j1MWej4mAhNM6lh0Kp61C0sFic1G9cesay/SuUmkLuarkfCJurNCO9uUpB3I7dui9wS/ab2IpotFb7nzKxWk3sQ7m/mDxbBY0bN6i69Y3XLdRs33trEdST7u7fbAJNnLVQsyvJ5BZqV4Y4oxDB+fajAAAAAElFTkSuQmCC"
                     alt="">
            </a>
            <a href="https://www.youtube.com/c/Buenbit" class="p-btn-footer-f">
                <img class="iconos-footer"
                     src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAFQAAABUCAYAAAAcaxDBAAAACXBIWXMAABYlAAAWJQFJUiTwAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAOaSURBVHgB7Z1dThRBEMf/swuICBr1yQS8gL4bffcEGr2A8Vk9gCfAjwN4AYwHMPEa4AXwFQ0CCgis9d/tXgaYhfmoGmZ265fUDjOwZPPb6pqenkl3gpz0er1ENrMSMxLTElMSCcaTnsSBxD+JfYndJEl6ed54oRAR2ZXNnMQ1jK/APPyR2Baxh+f90UhBISMXMBDpHLONgdjMjM0UGrLytkQXThbM0o2sbD0jVGSyPt6Ey7wIyvwpUg/SBzvpnZCZLjMfdHQrOBsyFBpqpjfzYvRLY3DXJ52hC3CZZaCz+bjTFxrS1s/m5ZmPTT9m6DycqrCvjo6Y7cQdpxJzrKWUeQWOBnQ5y5cZOFrMuFBdpinUu0p6dCl0kkeQtOl04KjiQpVxocq4UGVcqDIuVBkXqowLVcaFKuNClXGhyrhQZaZQH/dCLEkshmNLp7YYsZ/Fb4nN1P5mOEbWw88/JFYl1lK/MyWRYfs7sIUSP4btZbIs8R7GWAtlpn2TuI5msCLxGoZY19AvaI5M8lziIQyxFBrrZdN4BkMshT5CMzH9XJZCF9FM2GrMypCl0CY290grhVb90Ow3rsOGuzDCUugNVIOd8acSn6FPKzO0qlDCDH0l8Ri62TqRTT4Ns/WBxFvYlQEV2iI08gk6ZaCVGWqFRhnQKEeZtHn4LpYBi5NWadoslP1cjhWYXkoWpc7xUC1Y/15IvET5Wmh2YrMUysFd7ctPjhRxbLWxV2FtyVAK/AC9gQ2z0XvLGrqJ6rBJv8FgkFpzlMhMqGWGsk5Vue3BckGRFs1b48vOxFJo1SywrJNmJyXLJr+GZpK+O6qOpdBVNJPvMMQ6Q2u5F16QFRhiKZQyl9EsWDu/whDrS0+ODr1DM6DMJzBuNXU8OUJ4xubl4n2cfBTHkngLZS3ECmooQXUJHcWoZ5vYob9oiO302Xp9xPFauWyhY4c/zqiMC1XGhSrjQpVxocq4UGVcqDIuVBkXqowLVcaFKkOhuSZrdnJxRKGHcLQ4pNB9OFocuFBd9ih0D15HtdjtJElyhMGk9041/nJu+9ht2oFTlS2+9IWGCe49S8uzExcJSHfsadi7UMWhs624MxQaaukGXGoR4hIWw5P6iUvPkLa/4FLz0Hd1ej0QX1ylHPkXV4mE6di5+oJPyX4S9oi2Ci3/kyZkK8VexeRCeewF7ZReoOrMfzxeQo3z3nOJoG6R97cMCqQ4LqHGK8ncS6j9B1os0P1r6J4lAAAAAElFTkSuQmCC"
                     alt="">
            </a>
            <a href="https://www.instagram.com/buenbit/" class="p-btn-footer-f">
                <img class="iconos-footer"
                     src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAFQAAABUCAYAAAAcaxDBAAAACXBIWXMAABYlAAAWJQFJUiTwAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAATHSURBVHgB7Z07bNRAEIbHFwivAAIqUEKNgJqI9CCoefUIqFGgR/SAqEHQg6BH0IPoE4maILqA8oIkJDnmv9u9zF3uzmt7Peck80mT2Icd6z7N7o4feBMKpF6vJ/xrP8cwx16OPRwJ7UzqHGsc/zhWOZaTJKmH7JgqhEUO8a+DHIdo5woM4Q/HIotd77dRT0EuIw9TU6SxySI1xXbN2K5CXVae4BgioxvI0tlu2bpFKMtE/3iMTGYakPmLpa7JD2tyxWWmyQwDjo47Zy1aQl2fac08G42u0blrIDP0MJnMPMDZiF9pCHVpa6N5fkZ80/cZOkJGUVCrU43N1vyKUYiD6Eshcx8ZMYDL/fgxTEYshk1oXPZCqJVK8RiC0N18BSk2tRoZUTGhkTGhkTGhkTGhkTGhkTGhkTGhkdlD1eWIi27Mu6gcgxQKWbc4znJMcByl3gLTgNzvHD84PnB8dsvqJHwN7yTpAml3OO5RfoEhPOF4RspoCx3jeMVxnnSY4bhGitmqLfQrNaV68IXfcky78J9lYUz8vshxk9qPMcVxnZT6XE2hkxwPxfpTF2XwwIXGsdrQEoqM+SrWy/iCvj/2mSilznGMk0KWatWhF8UymnRsmTc4vrmYdJ/hGF4gKoibpICW0Cti+S3F555YRrcy6pZfis/PkQJadagcJL6E7dJWp/r9kXEhdabPzGnx2QQpMAihcynbptWpPttlnXmf4zk1m/YL6i60zJq3hdag9FMsX6De2ZW1Tk2rMzsHw1NUMoMQ2u9LfaR2mcg09IMQhsxGP5i1zgw9dhSqdLUJo7OUCZFnqDlav6Fm34nlcWqvErDPXaoIVRGKjOss+h/12R7/Lkdw9LkhfWTp/WhVhOapUyE8a525a4TKOvUDhaNeZ6ZRFaEyc6YpHDm6n6YKsN1vgaTVtOpURajMtCxNV25bCblVESqbeZaLGHLbLH1vaVRFKOpMOWI/DtgHdass8D8H7LNjLt+l4c+IPCjUJ/tsD+GddWvIbY7ShQ7i1BNnP72+2Cdq7xdRk6Ip+y4Bl+U6L5rg1PMyhR279FPPQdxGhoxeQm9zvKZNqWjS/U4rp9w+vRgjZbSafGhTQ0ZeovQzpXm3DS6KhN7RVKkCtDIUAnwzxcWMNAmQhSv7OCW9KvaFcDR/OYj1Y1Qsq9xK1hKKEdiXOGjOISXODG3eZs7LRMffKx2tJi/rzDukh3qdqiU0T51ZlDx1amE0B6UsdWZR8taphdF8cgQDy3vqXmciIH2Osj2qKB95POeis07FMcZJiUE8LPaO9OpDX6eqPSymferps6Xs54zy1KlRGMTzoR7/tBzqzFG3XuSBWwQGnix1anQGKXRHYv9pITImNDImNDImNDImNDImNDImNDImNDImNDIQGvSyZiOIDQhdJyMW6xC6SkYs1kxoXFYgdIWsH43Fci1Jkg1qvvTeKMZfvNvel01LZBRlAT8aQt0L7i1L87PkJwmQhT0MWwmVHThb8Cstoa4vnSWTmgU/hUVrUG879XRp+5tMaggNV53zgdjkKvkIn1zF417HjtkX7JXs7aAiWsg0/Y/EZSvEHqDdC+ShClrKPUHVlr+4OYUa3nuPKYKGsuy/zYBAiMMUajiTDJ5C7T/D90RKVK9OJAAAAABJRU5ErkJggg=="
                     alt="">
            </a>
            <a href="https://twitter.com/buenbit" class="p-btn-footer-f">
                <img class="iconos-footer"
                     src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAFQAAABUCAYAAAAcaxDBAAAACXBIWXMAABYlAAAWJQFJUiTwAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAQqSURBVHgB7Z3LThRREIb/HhQRAaOuTOAJdG2CL6B7jaw16t7L2sS9KHuMe0hce3kAia4hcY9xh4abAgJj/TPnQAPD0NNdXT1AfUkx6aGbwEf1qerTkz4JMlKv1xN56ZPolTgrcUYiwcmkLrEp8U9iQ2ItSZJ6lgOPFCIie+SlX+ICTq7ALPyRWBGxW+12OlRQyMhBNEU6u6ygKbZlxrYUGrLyikQPnFYwSxdaZesBoSKT4+MluMyjoMxfInUz/WYtvREy02Vmg44uB2c77AgNY6af5p3RGBqDuwbpDB2Ey8wDnQ3EjYbQkLZezfMzEE/9mKEDcIrCXh01MVuLG04h+jmWUuY5OBrQZR+/9MLRoteF6nKWQr1V0qOHQk/zDJI2tRocVVyoMi5UGReqjAtVxoUq40KVcaHKuFBlXKgyx1XoqMQ7ia8SP0N8lngjMXzIMddgQCKToldhw0OJtyjGkMQziUdt9pmXGJeYDvuPSdwK7z9ByVgJvY1mRr2SeI38MAuvZ9x3NrUvZd6R+IGSsTrlR8Prc4mnyAePyyoTqX2X0JS5lPo9SsNKaHr8otSX6IyRcFweFiUmJL6hOQSUipXQpX3bHANZUIaRjSKZxX/GTYkXEp9QMlZC51u8xz+UWcNT+SixRSs0ZU7DACuhM22+x1P5Pdq3PBeRnykU7y4yYyX0C1pnaYTZyvaGGctKzjGWp3kc8xaRnxkYYtmHxtYpDxyD8xaUBxIfYYRVhrKxZl84jnwUqc5LMOQMbOA4ycIyD3tmYYhVhsZTbgS2zME4Qy2LUhWYZiexbJuqkFp6I78fy+k7VlvrMdT8n2gplGPZXdi1MFMwHj+JZR+a5h6a85plFqkbMJiu249V25TmO8qf9WF2msskVdwCmUT55L2AKExVQudQHpRZSXaSKoTGGfQyptNY8CrLTlJVUYpw4pfFSePWhNl9o3ZULTTC6/wJ5J9I7gqZpIoqn4bVnreXHyN/5e8amaQKoRTHTOT86BiKtVC8pL2PChr4w7AQyntGHCtjE6/RzFMg7/Gb3drIiuUHHXins2jxocjJEF2TlWmsixKzk2MmMzZrAaI49q1ssz6gS0VGqqzyIyEodgi7QwFvyFEaiwxFms9pFqFb2qYTg38+VBkXqowLVcaFKuNClXGhyrhQZVyoMi5UGReqjAtVxoUqQ6GZHtbsZGKbQrfgaLFFoRtwtNh0obqsU+g6fBzVYq2WJMk2mg+9d4rxl8+2j23TKpyiLPNLQ2h4wL1naX5W4yIB6caehr2F6hw6W44bO0LDWLoAl9oJcQmLnaK+59IzpO1vuNQsNFztXw/EF1fJR/bFVSLhcexcfcEfyb4XdkTLHS3/kyZkK8Wex+mF8tgFreZeoOrAT9xdQo3PvecSQT2dHH/MoECK4xJqvJLMvITafxDsAW8lbvPGAAAAAElFTkSuQmCC"
                     alt="">
            </a>
            <a href="https://t.me/buenbitcomunidad" class="p-btn-footer-f">
                <img class="iconos-footer"
                     src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAFQAAABUCAYAAAAcaxDBAAAACXBIWXMAABYlAAAWJQFJUiTwAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAQ0SURBVHgB7Z1NTxNRFIbPlA8RQaOuXLDX+Atwj7r3g70xbv3cG+NWYlxj3Gt0j38AE9dqXItxh0Y+FBCo5+3c2w5laO/MnNN2pudJDs1A24SHd+6cuR3mRhRIvV6P+GGCa5xrjGuUK6JqUufa5frHtcO1FUVRPeSFXYWwyBF+mOQ6QdUVGMIfrg0Wu9fpSUcKcomcplik0WKDYrGpiU0V6lJ5lmuEjDSQ0tW0tB4SyjIxPp4mk9kNyPzJUneT36wlN1wyTWYYcHTGOWvSFOrGTNvNs9EYGp27BsmETpPJzAOcTfmNhlAXWzua52fK7/o+oVNkFAW9OtXYbM1vGIWYxFgKmcfIkAAuJ/BlnAwpxk2oLGMQaq2SHCMQOswzSNLUamSIYkKFMaHCmFBhTKgwJlQYEyqMCRVmGISe5HrA9ZbrK9cPriekRMRTTueomsxyPeS6dMTP57g+kzCjVC0ucl3hukNxMjtxihSoglCIQwpv09FpTOM3KVBmoVnSmMYKKVBGod3GxhCQzjVSoCxCkUDs0nnT2M4XUmLQhUqkMQ2V8RMMolAkcJ7rJsXjZBbWKCzB4u2SZ5Aae6QRDfdH95hF5iLXea7Xgc9XEzoICS2yW+NIfZ9rmeI/wHzg61QOSKBfQovs1h6kcoFiOXiPdxR+wPpESvRaqMTRGgLvcr1321llqrVMoFdCsVv7RBbhA8Uyv7vtrDKBWssEtIVKtT1I1DOul4nv3eB6StmT/o0U0RIq2T9ivLtFrVQCyHxB+VA7wgMNoZh7fEQyLLiSfP/S7fKhrUsnkEq0Q+1pkvhjqZ0lAY3G/jrXG8oHxkok8jIdlvmcZJKvustrztjPUGssnQl4fvsRPAlkSiQfMudIEc2j/IorpBVCr7qabXseRCKVyynvgSP4K5KbHFGZA03Sr8+UfGK7Ndn4YE1ypintICdKv049Q5KCkwDpaTvV8RMM8sfI0jKB+i4/yEKlf3kML0OdUIx1iySHakPvGfQrRx5TfNopkVbVht5ThktxlqjYyYJnmXpAWa5tQkLvucqbVtvlU0BK86ZVddrOU+aLxdCnhp7WYvy8QD2gzJczZklrT3Z3UPbrQ0PHVrUP5dqpygW3Pq1LKT/DXIFkP9uRKl3BjISiZ02mFTNZ1yh9SlCFKl/B3BfsnxaEMaHCmFBhTKgwJlQYEyqMCRXGhApjQoWB0KCbNRtB7EPoHhlS7EHoDhlS7JpQWbYhdJtsHJViqxZF0T7FN703ivEX97b3bdMmGUVZx5eGUHeDe0tpfjb9IgHJxh6GrYXKDpyt+42mUDeWrpJJzYJfwqJ5UD9w6uli+4tMaggNV+3rgdjiKvkIX1zF427HjtUX7JbsB0FHtJ5p+Z8kLq0Qe5yGF8hDF7SZe4GqQ+/YWkIN973HEkEjWV5fMiAQ4rCEGs4kg5dQ+w+uD/+ri2cmuwAAAABJRU5ErkJggg=="
                     alt="">
            </a>
        </div>
    </div>
</div>

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
<!-- Script Solver -->
<script src="https://unpkg.com/javascript-lp-solver/prod/solver.js"></script>
<script type="text/javascript" src="js/simulador.js"></script>
<script type="text/javascript" src="js/calculo-dos.js"></script>
</body>
</html>
