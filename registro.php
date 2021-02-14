<?php
	require("parametros_conexion.php");
	require("funcs.php");

  $errors = array();

	if(!empty($_POST)){
  
    $usuario = $mysqli->real_escape_string($_POST['usuario']);
		$email = $mysqli->real_escape_string($_POST['email']);
		$password_1 = $mysqli->real_escape_string($_POST['password_1']);
		$password_2 = $mysqli->real_escape_string($_POST['password_2']);
		$captcha = $mysqli->real_escape_string($_POST['g-recaptcha-response']);

		$activo = 0;
		$tipo_usuario = 2;
		$secret = '6LeF_YYUAAAAANCqyQDOcUSdGBfp5s41Au7tGXlZ';

    if(minMax(1, 15, $usuario)){
      $errors[] = "Usuario debe poseer un máximo de 15 caracteres";
    }

    if(minMax(6, 150, $password_1)){
      $errors[] = "Contraseña debe poseer un minimo de 6 caracteres";
    }

		if(!$captcha){
			$errors[] = "Por favor verifica el captcha";
		}

		if(isNull($usuario, $email, $password_1, $password_2)){
			$errors[] = "Debe llenar todos los campos";
		}

		if(!isEmail($email)){
			$errors[] = "Dirección de correo electronico inválida";
		}

		if(emailExiste($email)){
			$errors[] = "El correo electrónico $email ya existe";
		}

		if(!validaPassword($password_1, $password_2)){
			$errors[] = "Las contraseñas no coinciden";
		}

		if(count($errors) == 0){
			$response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$secret&response=$captcha");

			$arr = json_decode($response, TRUE);

			if($arr['success']){

        $ip = $_SERVER['REMOTE_ADDR'];

				$pass_hash = hashPassword($password_1);

				$token = generateToken();

				$registro = registraUsuario($usuario, $email, $pass_hash, $activo, $token, $ip);

				if($registro > 0){

					$url = 'http://' . $_SERVER["SERVER_NAME"] . '/fintecred/activar.php?id=' . $registro . '&val=' . $token;

					$asunto = 'Activar Cuenta - Sistema de Usuarios - FINTECRED';

					$cuerpo = "Estimado $usuario: <br></br>Para continuar con el proceso de registro, es indispensable haga click en el siguiente enlace <a href='$url'>Activar Cuenta</a>";

					if(EnviarEmail($email, $usuario, $asunto, $cuerpo)){

						echo "Para terminar el proceso de registro siga las instrucciones que le hemos enviado a la direccion de correo electronico: $email";

						echo "<br><a href='index.php'>Iniciar Sesion</a>";

						exit;

					} else {

						$errors[] = "Error al enviar Email";
					}

				} else {
					$errors[] = "Error al registrar";
				}

			}else {
				$errors[] = "Error al comprobar Captcha";
			}

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
  <script src='https://www.google.com/recaptcha/api.js'></script>
  <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <!-- Bootstrap core CSS -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <!-- Material Design Bootstrap -->
  <link href="css/mdb.min.css" rel="stylesheet">
  <!-- Your custom styles (optional) -->
  <link href="css/style.css" rel="stylesheet">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">

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
                <!-- Default form register -->

                <div class="card" style="margin-top:15%; margin-bottom:15%;">

                  <?php echo resultBlock($errors); ?>
                  <script>
                    function showHide(id){
                      var elem = document.getElementById(id);
                      elem.parentNode.removeChild(elem);
                    }
                  </script>
                    <form class="text-center border border-light p-5" role="form" method="POST" action="<?php $_SERVER['PHP_SELF'] ?>" autocomplete="off">

                        <h3 class="mb-4">Registrarme</h3>

                        <input type="text" id="usuario" name="usuario" class="form-control mb-4" placeholder="Usuario">

                       
                        <input type="email" id="email" name="email" class="form-control mb-4" placeholder="Correo electrónico">

                     
                        <input type="password" id="password" name="password_1" class="form-control" placeholder="Elegi tu contraseña" aria-describedby="defaultRegisterFormPasswordHelpBlock">
                        
                        <small id="defaultRegisterFormPasswordHelpBlock" class="form-text text-muted mb-4">
                            Debe poseer al menos 6 caracteres
                        </small>

                        <input type="password" id="defaultRegisterFormPassword" name="password_2" class="form-control" placeholder="Confirma tu contraseña" aria-describedby="defaultRegisterFormPasswordHelpBlock">
                        
                        <div class="text-center">
                          <div class="g-recaptcha my-4" data-sitekey="6LeF_YYUAAAAAHzXbbGe4r3nNF7qeDohHcJfSM7u"></div>
                        </div>
						

                        <!-- Sign up button -->
                        <button class="btn btn-info my-4 btn-block purple-gradient" type="submit">Crear mi cuenta</button>

                        <!-- Social register -->
                        <p>o creá tu cuenta con:</p>

                        <a href="">
                          <button type="button" class="btn btn-lg btn-fb btn-block" style="background-color: #3b5998;"><i class="fab fa-facebook-f pr-1"></i> Facebook</button>
                        </a>

                        <hr>

                        <!-- Terms of service -->
                        <p>Al
                            <em>crear tu cuenta</em> aceptas nuestros <br/>
                            <a href="terminos.php" target="_blank">Términos y Condiciones de Servicio</a>
                        </p>

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
