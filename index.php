<?php
    function getUserIpAddr(){
    if(!empty($_SERVER['HTTP_CLIENT_IP'])){
        //ip from share internet
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    }elseif(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
        //ip pass from proxy
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    }else{
        $ip = $_SERVER['REMOTE_ADDR'];
    }
    return $ip;
}
  
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Fyntech</title>
  <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet"> 
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <!-- Bootstrap core CSS -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <!-- Material Design Bootstrap -->
  <link href="css/mdb.min.css" rel="stylesheet">
  <!-- Your custom styles (optional) -->
  <link href="css/style.css" rel="stylesheet">

</head>
<body>

    <!--Navbar-->
    <nav class="navbar navbar-expand-lg navbar-dark blue-gradient">

    <div class="container">

    <!-- Navbar brand -->
    <img src="img/logo.png" style="width: 250px">

    <!-- Collapse button -->
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#basicExampleNav"
    aria-controls="basicExampleNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
    </button>

    <!-- Collapsible content -->
    <div class="collapse navbar-collapse" id="basicExampleNav">

    <!-- Links -->
    <ul class="navbar-nav mx-auto">
        <li class="nav-item active">
        <a class="nav-link" href="index.php">Inicio
            <span class="sr-only">(current)</span>
        </a>
        </li>
        <li class="nav-item">
        <a class="nav-link" href="#">¿Cómo&nbspfunciona?</a>
        </li>
        <li class="nav-item">
        <a class="nav-link" href="#">Contacto</a>
        </li>

    </ul>
    <!-- Links -->
        <a href="login.php"><button class="btn btn-outline-light my-2 my-sm-0 mr-sm-2 boton-custom" type="submit">Ingresar</button></a>
        <a href="registro.php"><button class="btn btn-outline-light my-2 my-sm-0 boton-custom" type="submit">Registrarse</button></a>
  
    </div>
    <!-- Collapsible content -->

    </div>

    </nav>
    <!--/.Navbar-->

    <main class="blue-gradient">
  
        <div class="container-fluid">

            <div class="row">

                <div class="col-md-9 col-lg-6 col-xl-6 mx-auto">
                    <div class="row">
                        <div class="col-sm-12 col-md-12 col-lg-8 col-xl-8 mx-auto">
                            <section class="form-elegant my-5 rd-animacion">
                                <img src="img/personaje.png"style="width: 400px"> 
                            </section>
                        </div>
                    </div>
                </div>

        <div class="col-md-9 col-lg-6 col-xl-6 mx-auto">
            <div class="row">
                

        <div class="col-sm-10 col-md-12 col-xl-8 rd-calc">
            <section class="form-elegant mb-5" style="margin-top: 16%;">

                <div class="card">
                    <div class="card-body">

                        <h3 class="text-center font-weight-bold mt-3 mb-3 pb-4 cuanto-necesitas"><strong>¿CUÁNTO NECESITAS?</strong></h3>
                        <hr>

                        <form class="range-field my-5">
                            <input id="calculatorSlider" class="form-control-range" type="range" value="0" min="1000" max="4000" />
                        </form>

                        <!-- Grid row -->
                        <div class="row">
     
                            <!-- Grid column -->
                            <div class="col-md-6 text-center pb-5">

                                <h2><span class="badge purple-gradient lighten-2 mb-4">Te prestamos</span></h2>
                                <h2 class="display-4" style="color:#0d47a1;">$<strong id="prestamos"></strong></h2>

                            </div>
                            <!-- Grid column -->

                            <!-- Grid column -->
                            <div class="col-md-6 text-center pb-5">

                                <h2><span class="badge purple-gradient lighten-2 mb-4">Devolvés</span></h2>
                                <h2 class="display-4" style="color:#0d47a1;">$<strong id="devolves"></strong></h2>

                            </div>
                            <!-- Grid column -->
                       
                            <!-- Sign up button -->
                            <div class="col-md-12 text-center pb-5">
                                <a href="registro.php"><button class="btn purple-gradient my-4 btn-block" type="submit" ><h3>¡Quiero este préstamo!</h3></button></a>
                            </div>

                        </div>
                        <script>
                            var slider = document.getElementById("calculatorSlider");
                            var output_1 = document.getElementById("prestamos");
                            var output_2 = document.getElementById("devolves");
                            output_1.innerHTML = formatMoney(slider.value, 0); // Display the default slider value
                            window.onload = onLoadFunctions;
                            output_2.innerHTML = slider.value; // Display the default slider value * interest rate
                            

                            // Intializes output_2 on window load
                            
                            function onLoadFunctions() {
                                output_2.innerHTML =  formatMoney(Math.round(slider.value * 1.15), 0);   
                                }
                            
                            // Update the current slider value (each time you drag the slider handle)

                            slider.oninput = function() {
                                output_1.innerHTML = formatMoney(this.value, 0);
                                output_2.innerHTML = formatMoney(Math.round(slider.value * 1.15), 0);
                            } 

                            x = formatMoney(1500, 0);
                            console.log(x);

                            function formatMoney(n, c, d, t) {
                                var c = isNaN(c = Math.abs(c)) ? 2 : c,
                                    d = d == undefined ? "." : d,
                                    t = t == undefined ? "," : t,
                                    s = n < 0 ? "-" : "",
                                    i = String(parseInt(n = Math.abs(Number(n) || 0).toFixed(c))),
                                    j = (j = i.length) > 3 ? j % 3 : 0;

                                return s + (j ? i.substr(0, j) + t : "") + i.substr(j).replace(/(\d{3})(?=\d)/g, "$1" + t) + (c ? d + Math.abs(n - i).toFixed(c).slice(2) : "");
                            };
                        </script>
                    </div>
                </div>
                
            </section>
        </div>

                
        </div>
    </div>
</main>
 
    <!-- Footer -->
<footer class="page-footer font-small blue-gradient pt-4">

<!-- Footer Links -->
<div class="container text-center text-md-left">

  <!-- Grid row -->
  <div class="row">

    <!-- Grid column -->
    <div class="col-md-6 mt-md-0 mt-3">

      <!-- Content -->
      <div class="my-3">
        <h5 class="text-uppercase">FinteCred</h5>
        <p>Todos los derechos reservados © 2018 Copyright.</p>
      </div>

    </div>
    <!-- Grid column -->

    <hr class="clearfix w-100 d-md-none pb-3">

    <!-- Grid column -->
    <div class="col-md-3 mb-md-0 mb-3">

        <!-- Links -->
        <h5 class="text-uppercase">Acerca</h5>

        <ul class="list-unstyled">
          <li>
            <a href="#!">Politica de privacidad</a>
          </li>
          <li>
            <a href="#!">Términos y Condiciones</a>
          </li>
        </ul>

      </div>
      <!-- Grid column -->

      <!-- Grid column -->
      <div class="col-md-3 mb-md-0 mb-3">

        <!-- Links -->
        <h5 class="text-uppercase">Ayuda</h5>

        <ul class="list-unstyled">
          <li>
            <a href="#!">¿Cuánto dinero puedo solicitar?</a>
          </li>
          <li>
            <a href="#!">¿Dónde y cómo realizo el pago de lo que debo?</a>
          </li>
          <li>
            <a href="#!">Preguntas frecuentes</a>
          </li>
        </ul>

      </div>
      <!-- Grid column -->

  </div>
  <!-- Grid row -->

</div>
<!-- Footer Links -->

<!-- Copyright -->
<div class="footer-copyright text-center py-3">© 2018 Copyright:
  <a href="https://valordigital.com.ar/"> www.valordigital.com.ar</a>
</div>
<!-- Copyright -->

</footer>
<!-- Footer -->
   
    <!-- SCRIPTS -->
  <!-- JQuery -->
  <script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
  <!-- Bootstrap tooltips -->
  <script type="text/javascript" src="js/popper.min.js"></script>
  <!-- Bootstrap core JavaScript -->
  <script type="text/javascript" src="js/bootstrap.min.js"></script>
  <!-- MDB core JavaScript -->
  <script type="text/javascript" src="js/mdb.min.js"></script>

  
  
</body>
</html>