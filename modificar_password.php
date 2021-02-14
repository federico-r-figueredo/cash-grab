<?php
	session_start();
    require 'parametros_conexion.php';
    include 'funcs.php';

    $errors = array();

	if(!isset($_SESSION["id_usuario"])){ //Si no ha iniciado sesión redirecciona a index.php
		header("Location: index.php");
	}

    $id_usuario = $_SESSION['id_usuario'];
    $password_1 = $mysqli->real_escape_string($_POST['password_actual']);
    $password_2= $mysqli->real_escape_string($_POST['password_nuevo']);

    if(verificaPassword($password_1, $id_usuario)){
		
    	$pass_hash = hashPassword($password_2);

		if(modificaPassword($pass_hash, $id_usuario)){
			$msg = "Su contraseña fue modificada con exito";
		}else{
			$errors[] = "Error al modificar la contraseña";
		}

    }else{
		$errors[] = "La contraseña introducida es incorrecta";
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
        <a href="login.php"><button class="btn btn-outline-light my-2 my-sm-0 mr-sm-2 boton-custom" type="submit">Ingresar</button></a>
        <a href="registro.php"><button class="btn btn-outline-light my-2 my-sm-0 boton-custom" type="submit">Registrarse</button></a>
    </form>
    </div>
    <!-- Collapsible content -->

    </div>

    </nav>
    <!--/.Navbar-->

<main class="blue-gradient">
    <div class="container">
        <div class="row">
            <div class="col-md- col-lg- col-xl- col-md- col-lg- col-xl- mx-auto">
                <div class="card" style="margin-top:50%; margin-bottom:50%;">

                    <?php echo resultBlock($errors); ?>
                      <script>
                        function showHide(id){
                          var elem = document.getElementById(id);
                          elem.parentNode.removeChild(elem);
                        }
                    </script>

                    <form class="text-center border border-light p-5" role="form" method="POST" action="panel_usuarios.php" >
                   
						<div class="alert alert-success" role="alert" >
							<?php echo $msg ?>
						</div>

                   
                    <button class="btn btn-info btn-block mt-4 purple-gradient" type="submit">Volver al Panel de Usuarios</button>

                    </form>
                </div>
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