<?php
 
 session_start();
 require 'parametros_conexion.php';
 include 'funcs.php';
 
 if(!isset($_SESSION["id_usuario"])){ //Si no ha iniciado sesión redirecciona a index.php
   header("Location: index.php");
 }

 $errors = array();

if(!empty($_POST)){

	$banco = $mysqli->real_escape_string($_POST['banco']);
	$cuenta = $mysqli->real_escape_string($_POST['cuenta']);
	$cbu = $mysqli->real_escape_string($_POST['cbu']);
  $id_usuario = $_SESSION["id_usuario"];
  



	if(banco_isNull($banco)){
		$errors[] = "Seleccione una entidad bancaria";
	}

	if(minMax(1, 20, $cuenta)){
		$errors[] = "Número de cuenta debe poseer entre 7 y 20 cifras";
	}

	if(minMax(1, 20, $cbu)){
		$errors[] = "CBU debe poseer entre 7 y 20 cifras";
	}

	$registro = registraCBU($banco, $cuenta, $cbu, $id_usuario);


	if($registro){

		header("Location: registro_cbu_exitoso.php");

	} else {
		$errors[] = "Error al registrar";
	}

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
        <li class="nav-item">
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

    <img src="https://mdbootstrap.com/img/Photos/Avatars/img%20(27).jpg" class="rounded-circle" style="max-width: 50px;">
    
    <div class="btn-group px-2" role="group">
      <button id="btnGroupDrop1" type="button" class="btn btn-outline-light my-2 my-sm-0 boton-custom dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Mi Cuenta
      </button>
      <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
        <a class="dropdown-item text-center" href="panel_usuarios.php">Panel de Usuario</a>
        <a class="dropdown-item text-center" href="cerrar_sesion.php">Cerrar Sesión</a>
      </div>
    </div>
	
   
    </div>
    <!-- Collapsible content -->

    </div>

    </nav>
    <!--/.Navbar-->

<main class="blue-gradient">
    <div class="container">
        <div class="row">
            <div class="col-md- col-lg- col-xl- col-md- col-lg- col-xl- mx-auto">
                <!-- Default form register -->
                <div class="card" style="margin-top:30%; margin-bottom:30%;">

					<?php echo resultBlock($errors); ?>
					<script>
						function showHide(id){
						var elem = document.getElementById(id);
						elem.parentNode.removeChild(elem);
						}
					</script>
                    <form class="text-center border border-light p-5" method="POST" action="<?php $_SERVER['PHP_SELF'] ?>">

                        <p class="h4 mb-4">Datos de cuenta</p>

                        <select class="browser-default form-control mb-4" name="banco">
                          <option value="0">Seleccione un Banco</option>
                          <option value="007">Banco Galicia</option><option value="017">Banco Francés BBVA</option><option value="034">Banco Patagonia</option><option value="001">American Express Bank</option><option value="002">BACS</option><option value="003">Banco Interfinanzas</option><option value="004">Banco Ciudad</option><option value="005">Banco Columbia</option><option value="006">Banco Comafi</option><option value="008">Banco Credicoop</option><option value="009">Banco de Cordoba - BANCOR</option><option value="010">Banco de Corrientes</option><option value="011">Banco de Formosa</option><option value="012">Banco de la pampa</option><option value="013">Banco de San Juan</option><option value="014">Banco de Santiago del Estero</option><option value="015">banco de servicios y transacciones - BST</option><option value="016">Banco de tierra del fuego</option><option value="015">Banco de Valores</option><option value="016">Banco del Chubut</option><option value="018">banco del sol</option><option value="019">Banco del Tucuman</option><option value="020">Bando finansur</option><option value="021">banco hipotecario</option><option value="022">Banco Industrial</option><option value="023">banco itaù</option><option value="024">Banco Julio</option><option value="025">Banco Macro</option><option value="026">banco mariva</option><option value="027">Banco Mas ventas</option><option value="028">banco meridian </option><option value="029">Banco Municipal de Rosario</option><option value="030">Banco Nacion</option><option value="031">Banco Piano </option><option value="032">Banco Provincia de buenos aires</option><option value="033">Banco Provincia del Neuquen</option><option value="035">banco superville</option><option value="036">banco roela</option><option value="037">banco saenz</option><option value="038">banco santa cruz</option><option value="039">Banco Santader Rio</option><option value="040">BNP PARIBAS</option><option value="041">BANCO HSBC </option><option value="042">BANCO ICBC </option><option value="043">NUEVO BANCO DE ENTRE RIOS</option><option value="044">NUEVO BANCO DE LA RIOJA</option><option value="044">NUEVO BANCO DE SANTA FE</option><option value="045">nuevo banco del chaco</option><option value="046">banco coinag</option><option value="047">MONTEMAR COMPAÑIA FINANCIERA S.A</option>
                        </select>

                        <input type="text" name="cuenta" class="form-control mb-4" placeholder="cuenta">

                        <input type="text" name="cbu" class="form-control mb-4" placeholder="cbu">

                        <!-- Sign up button -->
                        <button class="btn btn-info my-4 btn-block purple-gradient" type="submit">Agregar CBU</button>

                    </form>
                </div>
                <!-- Default form register -->

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
            <a href="#!">Política de privacidad</a>
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