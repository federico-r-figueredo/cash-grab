<?php
    session_start();
    require 'parametros_conexion.php';
    include 'funcs.php';
    require 'generar_json_usr.php';

    if(!isset($_SESSION["id_usuario"])){ //Si no ha iniciado sesión redirecciona a index.php
        header("Location: index.php");
    }

    $idUsuario = $_SESSION['id_usuario'];
    
    $sql = "SELECT id_usr, usuario FROM usuarios WHERE id_usr = '$idUsuario'";
    $result = $mysqli->query($sql);
		$row = $result->fetch_assoc();
		
		$sql_2 = "SELECT interes, costo_adm FROM config WHERE id = 1";
    $result_2 = $mysqli->query($sql_2);
    $row_2 = $result_2->fetch_assoc();

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
            <div class="col-lg-4 mx-auto mt-5" >
                <div class="card rd-card" id="rd-card">
                    <div class="view overlay mt-3">
                        <img class="card-img-top" src="https://mdbootstrap.com/img/Mockups/Lightbox/Thumbnail/img%20(67).jpg" alt="Card image cap">
                        <a href="#!">
                        <div class="mask rgba-white-slight"></div>
                        </a>
                    </div>
                    <div class="card-body mx-auto">
                        <h4 class="text-center">Modificar Datos</h4>
                        <div class="btn-group-vertical" role="group" aria-label="Vertical button group">
                        <form action="actualiza_datos.php" method="get">
                            <button id="correos" type="button" class="btn purple-gradient ml-0" onClick="activo(this.id); mis_email('remover');"><i class="fas fa-at fa-sm pr-2"></i>Mis e-mail</button>
                            <button id="cbu" type="button" class="btn purple-gradient" onClick="activo(this.id); mis_cbu('remover')"><i class="fas fa-university fa-sm pr-2"></i>Cuentas bancarias</button>
                            <button id="contrasena" type="button" class="btn purple-gradient" onClick="activo(this.id); mis_password('remover')"><i class="fas fa-unlock-alt fa-sm pr-2"></i>Mi contraseña</button>
                            <button id="imagen" type="button" class="btn purple-gradient" onClick="activo(this.id); foto_perfil('remover')"><i class="fas fa-user-circle fa-sm pr-2"></i>Imágen de perfil</button>
                            <button id="datos" type="submit" class="btn purple-gradient w-100" onClick="activo(this.id) "><i class="fas fa-pencil-alt fa-sm pr-2"></i>Editar mis datos</button>
                            </form>
                        </div>
                    </div>
                </div>    
            </div>

           

            <div class="col-lg-8 col-xl- my-5">
                <div class="card mb-3">
                    <div class="row">
                        <div class="col-sm-12 mb-2">
                            <div class="mt-4">
                                <h2 class="text-center">Panel de Usuario</h2>
                            </div>
                        </div>
                    </div>  
                    <div class="btn-group btn-group-toggle mb-4" role="group" aria-label="Basic example">
                        <div class="container ">
                            <div class="row mx-auto my-1">
                                <div class="col-sm">
                                    <button id="historial" type="button" class="btn purple-gradient m-2 w-100" onClick="activo(this.id); historial('remover');" ><i class="fas fa-history fa-sm pr-2" style="display:inline;" aria-hidden="true"></i>Historial</button>
                                </div>
                                <div class="col-sm">
                                    <button id="prestamo" type="button" class="btn peach-gradient m-2 w-100" onClick="activo(this.id); prestamo();"><i class="fas fa-money-bill-alt fa-sm pr-2" style="display:inline;" aria-hidden="true"></i>Pedir&nbsp;un&nbsp;préstamo</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            
                
                <script type="text/javascript">
                        function activo(id_boton){
                            
                            
                            var id_botones = [
                                "historial",
                                "prestamo",
                                "correos",
                                "cbu",
                                "contrasena",
                                "imagen",
                                "datos"
                            ];
                            
                            for(i=0; i < id_botones.length; i++){
                                boton_1 = document.getElementById(id_botones[i]);
                                if( boton_1.classList.contains("peach-gradient")){
                                    boton_1.classList.remove("peach-gradient");
                                    boton_1.classList.add("purple-gradient");
                                }else{
                                    continue
                                }
                            }

                            var boton_2 = document.getElementById(id_boton);
                            boton_2.classList.remove("purple-gradient");
                            boton_2.classList.add("peach-gradient"); 
                        }
                </script>
               
                <div class="row" style="max-height: inherit;">
                    <div class="col-sm-12 mt-1" >

                        <div class="card rd-mini-card">
                            <div class="card-body" id="remover">

                                <h2 class="text-center my-1">Cuanto necesitas?</h2>
                                <hr>

                                	<form class="range-field my-4  py-1">
                                    <input id="calculatorSlider" name="slider" class="form-control-range" type="range" min="1000" max="4000" />
                                

                                	<!-- Grid row -->
                                	<div class="row">

																		<!-- Grid column -->
																		<div class="col-md-6 text-center pb-1">

																				<h2><span class="badge purple-gradient lighten-2 mb-1">Te prestamos</span></h2>
																				<h2 class="display-4" style="color:#0d47a1">$<strong id="prestamos"></strong></h2>

																		</div>
																		<!-- Grid column -->

																		<!-- Grid column -->
																		<div class="col-md-6 text-center pb-3">

																				<h2><span class="badge purple-gradient lighten-2 mb-1">Devolvés</span></h2>
																				<h2 class="display-4" style="color:#0d47a1">$<strong id="devolves"></strong></h2>

																		</div>
																		<!-- Grid column -->

																		<!-- Sign up button -->
																		<div class="col-md-12 text-center mb-2">
																				<button class="btn peach-gradient btn-block" type="submit"><h3>¡Quiero este préstamo!</h3></button>
																		</div>
																	</div>
																</form>
                                
                            </div>
                        </div>
                    </div>
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
<input type="hidden" id="id_usr" value="<?php echo $row['id_usr'] ?>"/>
<input type="hidden" id="interes" value="<?php echo $row_2['interes'] ?>"/>
<input type="hidden" id="costo_adm" value="<?php echo $row_2['costo_adm'] ?>"/>
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
    <script>

        var id_usr = document.getElementById('id_usr').value;
				var interes = document.getElementById('interes').value;
				var costo_adm = document.getElementById('costo_adm').value;

        function historial(id){

            var padre = document.getElementById(id);

            var ourRequest = new XMLHttpRequest();
            ourRequest.open('GET', 'panel-hist.json')
            ourRequest.onload = function(){
                var ourData = JSON.parse(ourRequest.responseText);
                renderHTML(ourData);
            };

            ourRequest.send();

            while (padre.firstChild) {
                padre.removeChild(padre.firstChild);
            }

            function renderHTML(data){

                //Creamos elementos
                var tabla = document.createElement("table");
                var clase = document.createAttribute("class");
                var id = document.createAttribute("id");
                id.value = "tabla-hist";
                clase.value = "table";
                tabla.setAttributeNode(clase);
                tabla.setAttributeNode(id);

                //creamos clase de los th
                var th_1 = document.createElement("th");
                var clase_th_1 = document.createAttribute("class");
                clase_th_1.value = "text-center";
                th_1.setAttributeNode(clase_th_1);
                th_1.innerHTML= "Día";

                var th_2 = document.createElement("th");
                var clase_th_2 = document.createAttribute("class");
                clase_th_2.value = "text-center";
                th_2.setAttributeNode(clase_th_2);;
                th_2.innerHTML = "Pediste";

                var th_3 = document.createElement("th");
                var clase_th_3 = document.createAttribute("class");
                clase_th_3.value = "text-center";
                th_3.setAttributeNode(clase_th_3);
                th_3.innerHTML = "Devolvés";

                var th_4 = document.createElement("th");
                var clase_th_4 = document.createAttribute("class");
                clase_th_4.value = "text-center";
                th_4.setAttributeNode(clase_th_4);
                th_4.innerHTML = "Vencimiento";

                var th_5 = document.createElement("th");
                var clase_th_5 = document.createAttribute("class");
                clase_th_5.value = "text-center";
                th_5.setAttributeNode(clase_th_5);
                th_5.innerHTML = "Estado";
                
                var tr = document.createElement("tr");

                var thead = document.createElement("thead");
                var clase_thead = document.createAttribute("class");
                clase_thead.value = "purple-gradient text-white";
                thead.setAttributeNode(clase_thead);

                //Append los 3 th a tr

                tr.appendChild(th_1);
                tr.appendChild(th_2);
                tr.appendChild(th_3);
                tr.appendChild(th_4);
                tr.appendChild(th_5);

                //Append tr a thead

                thead.appendChild(tr);

                //Append thead a table

                tabla.appendChild(thead);

                //Append table a div padre

                padre.appendChild(tabla);

                cadena = "";

                for (i = 0; i < data.length ; i++) {
                    if(data[i].id_usr === id_usr){
                        cadena += "<tr class='fila' ><th scope='row' class='text-center'>" + data[i].fecha_prestamo + "</th><td class='text-center'>" + data[i].monto + "</td><td class='text-center'>" + data[i].monto_dev + "</td><td class='text-center'>" + data[i].plazo + "</td><td class='text-center'>" + data[i].estado + "</td></tr>";
                    }
                }
                
                var boton = "<div class='row'><div class='col-md-12 text-center mb-2' style='position: absolute; bottom: 0px;'><button class='btn btn-info btn-block peach-gradient' type='button' onClick='prestamo();'><i class='fas fa-money-bill-alt fa-sm pr-2' style='display:inline;'' aria-hidden='true'></i>Pedir&nbsp;un&nbsp;prestamo!</button></div></div>";

                var  paginacion = "<nav aria-label='Page navigation example'><ul class='pagination justify-content-center pag-1'><li class='page-item' id='previous-page'><a class='page-link' href='javascript:void(0)' tabindex='-1'>Anterior</a></li></ul></nav>"


                padre.insertAdjacentHTML("afterbegin", paginacion);
                

                var numberOfItems = ($('#tabla-hist .fila').length + 1);
                console.log(numberOfItems);
				var limitPerPage = 3
				$("#tabla-hist .fila:gt(" + (limitPerPage - 1) + ")").hide()
                var totalPages = Math.ceil(numberOfItems / limitPerPage);
				$('.pag-1').append("<li class='current-page page-item active'><a class='page-link' href='javascript:void(0)'>" + 1 + "</a></li>")

				for(var i = 2; i <= totalPages; i++){
					$('.pag-1').append("<li class='current-page page-item'><a class='page-link' href='javascript:void(0)'>" + i + "</a></li>");
				}


				$('.pag-1').append("<li class='page-item' id='next-page'><a class='page-link' href='javascript:void(0)'>Siguiente</a></li>");
				
				$(".pag-1 li.current-page").on("click", function(){
					if($(this).hasClass("active")){
						return false;
					}else{
						var currentPage = $(this).index();
						$(".pag-1 li").removeClass("active");
						$(this).addClass("active");
						$("#tabla-hist .fila").hide();
						var grandTotal = limitPerPage * currentPage;
						for(var i = grandTotal - limitPerPage; i < grandTotal; i++){
							$("#tabla-hist .fila:eq(" + i + ")").show();
						}
					}
				});

				$("li#next-page").on("click", function(){
					var currentPage = $(".pag-1 li.active").index();
					if(currentPage === totalPages){
						return false;
					} else {
						currentPage++;
						$(".pag-1 li").removeClass("active");
						$("#tabla-hist .fila").hide();
						var grandTotal = limitPerPage * currentPage;
						for(var i = grandTotal - limitPerPage; i < grandTotal; i++){
							$("#tabla-hist .fila:eq(" + i + ")").show();
						}
						$(".pag-1 li.current-page:eq(" + (currentPage - 1) + ")").addClass('active');
					}
				});

				$("li#previous-page").on("click", function(){
					var currentPage = $(".pag-1 li.active").index();
					if(currentPage === 1){
						return false;
					} else {
						currentPage--;
						$(".pag-1 li").removeClass("active");
						$("#tabla-hist .fila").hide();
						var grandTotal = limitPerPage * currentPage;
						for(var i = grandTotal - limitPerPage; i < grandTotal; i++){
							$("#tabla-hist .fila:eq(" + i + ")").show();
						}
						$(".pag-1 li.current-page:eq(" + (currentPage - 1) + ")").addClass('active');
					}
				});

                tabla.insertAdjacentHTML('beforeend', cadena);
                padre.insertAdjacentHTML('beforeend', boton);

            }
            
        }

        function mis_email(id){

            var padre = document.getElementById(id);

            

            var ourRequest = new XMLHttpRequest();
            ourRequest.open('GET', 'panel-correos.json');
            ourRequest.onload = function(){
                var ourData = JSON.parse(ourRequest.responseText);
                renderHTML(ourData);
            };

            ourRequest.send();

            while (padre.firstChild) {
                padre.removeChild(padre.firstChild);
            }

            

            function renderHTML(data){

                //Creamos elementos
                var tabla = document.createElement("table");
                var clase = document.createAttribute("class");
                var id = document.createAttribute("id");
                id.value = "tabla-correos";
                clase.value = "table";
                tabla.setAttributeNode(clase);
                tabla.setAttributeNode(id);

                //creamos clase de los th
                var clase_th = document.createAttribute("class");
                clase_th.value = "col";

                var th_1 = document.createElement("th");
                var clase_th_1 = document.createAttribute("class");
                clase_th_1.value = "text-center";
                th_1.setAttributeNode(clase_th_1);
                th_1.innerHTML= "#";

                var th_2 = document.createElement("th");
                var clase_th_2 = document.createAttribute("class");
                clase_th_2.value = "text-center";
                th_2.setAttributeNode(clase_th_2);;
                th_2.innerHTML = "E-Mail";

                var th_3 = document.createElement("th");
                var clase_th_3 = document.createAttribute("class");
                clase_th_3.value = "text-center";
                th_3.setAttributeNode(clase_th_3);
                th_3.innerHTML = "Estado";
                
                var tr = document.createElement("tr");

                var thead = document.createElement("thead");
                var clase_thead = document.createAttribute("class");
                clase_thead.value = "purple-gradient text-white";
                thead.setAttributeNode(clase_thead);

                //Append los 3 th a tr

                tr.appendChild(th_1);
                tr.appendChild(th_2);
                tr.appendChild(th_3);

                //Append tr a thead

                thead.appendChild(tr);

                //Append thead a table

                tabla.appendChild(thead);

                //Append table a div padre

                padre.appendChild(tabla);

                cadena = "";
               
                for (i = 0; i < data.length; i++) {
                    if(data[i].id_usr === id_usr){
                        cadena += "<tr class='fila' ><th scope='row' class='text-center'>" + (i+1) + "</th><td class='text-center'>" + data[i].correo + "</td><td class='text-center'>" + data[i].estado + "</td></tr>"
                    }   
                }
                
                if(data.length<3){
                    cadena += "<th scope='row' class='text-center'>" + (i+1) + "</th><td class='text-center'></td><td class='text-center'></td></tr><tr>"
                }

                var boton = "<div class='row'><div class='col-md-12 text-center mb-2' style='position: absolute; bottom: 5px;' ><a href='registro.php'><button class='btn btn-info btn-block peach-gradient' type='button'><i class='fas fa-money-bill-alt fa-sm pr-2' style='display:inline;'' aria-hidden='true'></i>Agregar e-mail</button></a></div></div>"

                var  paginacion = "<nav aria-label='Page navigation example'><ul class='pagination justify-content-center pag-2'><li class='page-item' id='previous-page'><a class='page-link' href='javascript:void(0)' tabindex='-1'>Anterior</a></li></ul></nav>"

                padre.insertAdjacentHTML("afterbegin", paginacion);

                var numberOfItems = ($('#tabla-correos .fila').length + 1);
				var limitPerPage = 3
				$("#tabla-correos .fila:gt(" + (limitPerPage - 1) + ")").hide()
                var totalPages = Math.ceil(numberOfItems / limitPerPage);
				$('.pag-2').append("<li class='current-page page-item active'><a class='page-link' href='javascript:void(0)'>" + 1 + "</a></li>")

				for(var i = 2; i <= totalPages; i++){
					$('.pag-2').append("<li class='current-page page-item'><a class='page-link' href='javascript:void(0)'>" + i + "</a></li>");
				}


				$('.pag-2').append("<li class='page-item' id='next-page'><a class='page-link' href='javascript:void(0)'>Siguiente</a></li>");
				
				$(".pag-2 li.current-page").on("click", function(){
					if($(this).hasClass("active")){
						return false;
					}else{
						var currentPage = $(this).index();
						$(".pag-2 li").removeClass("active");
						$(this).addClass("active");
						$("#tabla-correos .fila").hide();
						var grandTotal = limitPerPage * currentPage;
						for(var i = grandTotal - limitPerPage; i < grandTotal; i++){
							$("#tabla-correos .fila:eq(" + i + ")").show();
						}
					}
				});

				$("li#next-page").on("click", function(){
					var currentPage = $(".pag-2 li.active").index();
					if(currentPage === totalPages){
						return false;
					} else {
						currentPage++;
						$(".pag-2 li").removeClass("active");
						$("#tabla-correos .fila").hide();
						var grandTotal = limitPerPage * currentPage;
						for(var i = grandTotal - limitPerPage; i < grandTotal; i++){
							$("#tabla-correos .fila:eq(" + i + ")").show();
						}
						$(".pag-2 li.current-page:eq(" + (currentPage - 1) + ")").addClass('active');
					}
				});

				$("li#previous-page").on("click", function(){
					var currentPage = $(".pag-2 li.active").index();
					if(currentPage === 1){
						return false;
					} else {
						currentPage--;
						$(".pag-2 li").removeClass("active");
						$("#tabla-correos .fila").hide();
						var grandTotal = limitPerPage * currentPage;
						for(var i = grandTotal - limitPerPage; i < grandTotal; i++){
							$("#tabla-correos .fila:eq(" + i + ")").show();
						}
						$(".pag-2 li.current-page:eq(" + (currentPage - 1) + ")").addClass('active');
					}
				});

                tabla.insertAdjacentHTML('beforeend', cadena);
                padre.insertAdjacentHTML('beforeend', boton);
            } 
           
        }

        function mis_cbu(id){

            var padre = document.getElementById(id);

            var ourRequest = new XMLHttpRequest();
            ourRequest.open('GET', 'panel-cuentas.json');
            ourRequest.onload = function(){
                var ourData = JSON.parse(ourRequest.responseText);
                console.log(ourData);
                renderHTML(ourData);
            };

            ourRequest.send();

            while (padre.firstChild) {
                padre.removeChild(padre.firstChild);
            }

            

            function renderHTML(data){

                //Creamos elementos
                var tabla = document.createElement("table");
                var clase = document.createAttribute("class");
                var id = document.createAttribute("id");
                id.value = "tabla-cuentas";
                clase.value = "table";
                tabla.setAttributeNode(clase);
                tabla.setAttributeNode(id);

                //creamos clase de los th
                var clase_th = document.createAttribute("class");
                clase_th.value = "col";

                var th_1 = document.createElement("th");
                var clase_th_1 = document.createAttribute("class");
                clase_th_1.value = "text-center";
                th_1.setAttributeNode(clase_th_1);
                th_1.innerHTML= "#";

                var th_2 = document.createElement("th");
                var clase_th_2 = document.createAttribute("class");
                clase_th_2.value = "text-center";
                th_2.setAttributeNode(clase_th_2);
                th_2.innerHTML= "Banco";

                var th_3 = document.createElement("th");
                var clase_th_3 = document.createAttribute("class");
                clase_th_3.value = "text-center";
                th_3.setAttributeNode(clase_th_3);;
                th_3.innerHTML = "CBU";

                var th_4 = document.createElement("th");
                var clase_th_4 = document.createAttribute("class");
                clase_th_4.value = "text-center";
                th_4.setAttributeNode(clase_th_4);
                th_4.innerHTML = "Estado";
                
                var tr = document.createElement("tr");

                var thead = document.createElement("thead");
                var clase_thead = document.createAttribute("class");
                clase_thead.value = "purple-gradient text-white";
                thead.setAttributeNode(clase_thead);

                //Append los 3 th a tr

                tr.appendChild(th_1);
                tr.appendChild(th_2);
                tr.appendChild(th_3);
                tr.appendChild(th_4);

                //Append tr a thead

                thead.appendChild(tr);

                //Append thead a table

                tabla.appendChild(thead);

                //Append table a div padre

                padre.appendChild(tabla);

                cadena = "";
               
                for (i = 0; i < data.length; i++) {
                    if(data[i].id_usr === id_usr){
                        cadena += "<th scope='row' class='text-center'>" + (i+1) + "</th></th><td class='text-center'>" + data[i].nombre + "</td><td class='text-center'>" + data[i].cbu + "</td><td class='text-center'>" + data[i].tipo + "</td></tr><tr>"
                    }
                }
                    
                var boton = "<div class='row'><div class='col-md-12 text-center mb-2' style='position: absolute; bottom: 5px;' ><a href='registro_cbu.php'><button class='btn btn-info btn-block peach-gradient' type='button'><i class='fas fa-money-bill-alt fa-sm pr-2' style='display:inline;'' aria-hidden='true'></i>Agregar CBU</button></a></div></div>"

                var  paginacion = "<nav aria-label='Page navigation example'><ul class='pagination justify-content-center pag-3'><li class='page-item' id='previous-page'><a class='page-link' href='javascript:void(0)' tabindex='-1'>Anterior</a></li></ul></nav>"

                padre.insertAdjacentHTML("afterbegin", paginacion);

                var numberOfItems = ($('#tabla-cuentas .fila').length + 1);
				var limitPerPage = 3
				$("#tabla-cuentas .fila:gt(" + (limitPerPage - 1) + ")").hide()
                var totalPages = Math.ceil(numberOfItems / limitPerPage);
				$('.pag-3').append("<li class='current-page page-item active'><a class='page-link' href='javascript:void(0)'>" + 1 + "</a></li>")

				for(var i = 2; i <= totalPages; i++){
					$('.pag-3').append("<li class='current-page page-item'><a class='page-link' href='javascript:void(0)'>" + i + "</a></li>");
				}


				$('.pag-3').append("<li class='page-item' id='next-page'><a class='page-link' href='javascript:void(0)'>Siguiente</a></li>");
				
				$(".pag-3 li.current-page").on("click", function(){
					if($(this).hasClass("active")){
						return false;
					}else{
						var currentPage = $(this).index();
						$(".pag-3 li").removeClass("active");
						$(this).addClass("active");
						$("#tabla-cuentas .fila").hide();
						var grandTotal = limitPerPage * currentPage;
						for(var i = grandTotal - limitPerPage; i < grandTotal; i++){
							$("#tabla-cuentas .fila:eq(" + i + ")").show();
						}
					}
				});

				$("li#next-page").on("click", function(){
					var currentPage = $(".pag-3 li.active").index();
					if(currentPage === totalPages){
						return false;
					} else {
						currentPage++;
						$(".pag-3 li").removeClass("active");
						$("#tabla-cuentas .fila").hide();
						var grandTotal = limitPerPage * currentPage;
						for(var i = grandTotal - limitPerPage; i < grandTotal; i++){
							$("#tabla-cuentas .fila:eq(" + i + ")").show();
						}
						$(".pag-3 li.current-page:eq(" + (currentPage - 1) + ")").addClass('active');
					}
				});

				$("li#previous-page").on("click", function(){
					var currentPage = $(".pag-3 li.active").index();
					if(currentPage === 1){
						return false;
					} else {
						currentPage--;
						$(".pag-3 li").removeClass("active");
						$("#tabla-cuentas .fila").hide();
						var grandTotal = limitPerPage * currentPage;
						for(var i = grandTotal - limitPerPage; i < grandTotal; i++){
							$("#tabla-cuentas .fila:eq(" + i + ")").show();
						}
						$(".pag-3 li.current-page:eq(" + (currentPage - 1) + ")").addClass('active');
					}
				});

                tabla.insertAdjacentHTML('beforeend', cadena);
                padre.insertAdjacentHTML('beforeend', boton);
            } 
           
        }

        function mis_password(id){
        
            var padre = document.getElementById(id);

            while (padre.firstChild) {
                padre.removeChild(padre.firstChild);
            }

            var  input = "<form class='text-center border border-light p-5' method='POST' action='modificar_password.php'><p class='h4 mb-4'>Modificar contraseña</p><input type='password' name='password_actual' class='form-control mb-4' placeholder='Escriba su contraseña actual'><input type='password' name='password_nuevo' class='form-control mb-4' placeholder='Escriba una nueva contraseña'><button class='btn btn-info btn-block my-4 peach-gradient' type='submit'>Modificar contraseña</button></form>"

            padre.insertAdjacentHTML("afterbegin", input);

        }

    function foto_perfil(id){
    
    var padre = document.getElementById(id);

    while (padre.firstChild) {
        padre.removeChild(padre.firstChild);
    }

    var  input = "<div class='text-center border border-light p-5 h-100'><p class='h4 mb-4'>Modificar imágen de perfil</p><div class='input-group mt-5'><div class='custom-file'><label class='btn btn-block my-4 purple-gradient' for='inputGroupFile01'>Seleccione archivo</label></div></div><button class='btn btn-info btn-block my-4 peach-gradient' type='submit'>Subir foto</button><input type='file' class='custom-file-input' style='visibility:hidden;' id='inputGroupFile01' aria-describedby='inputGroupFileAddon01'></div></div>"

    padre.insertAdjacentHTML("afterbegin", input);

    }
    
    
  
    var slider = document.getElementById("calculatorSlider");
    var output_1 = document.getElementById("prestamos");
    var output_2 = document.getElementById("devolves");
    output_1.innerHTML = formatMoney(slider.value, 0); // Display the default slider value
    window.onload = onLoadFunctions;
    output_2.innerHTML = slider.value; // Display the default slider value * interest rate


    // Intializes output_2 on window load
    
    function onLoadFunctions() {
        output_2.innerHTML =  formatMoney((Math.round((slider.value * (100 + parseInt(interes, 10)) / 100) + parseInt(costo_adm, 10))), 0);   
        }
    
    // Update the current slider value (each time you drag the slider handle)

    slider.oninput = function() {
        output_1.innerHTML = formatMoney(this.value, 0);
        output_2.innerHTML = formatMoney((Math.round((slider.value * (100 + parseInt(interes, 10)) / 100) + parseInt(costo_adm, 10))), 0);
    } 

    x = formatMoney(1500, 0);

    function formatMoney(n, c, d, t) {
        var c = isNaN(c = Math.abs(c)) ? 2 : c,
            d = d == undefined ? "." : d,
            t = t == undefined ? "," : t,
            s = n < 0 ? "-" : "",
            i = String(parseInt(n = Math.abs(Number(n) || 0).toFixed(c))),
            j = (j = i.length) > 3 ? j % 3 : 0;

        return s + (j ? i.substr(0, j) + t : "") + i.substr(j).replace(/(\d{3})(?=\d)/g, "$1" + t) + (c ? d + Math.abs(n - i).toFixed(c).slice(2) : "");
    };
                  
   

    function prestamo(){
    
        var padre = document.getElementById("remover");

        while (padre.firstChild) {
          padre.removeChild(padre.firstChild);
        }

        var texto = "<h3 class='text-center font-weight-bold my-1'><strong>CUANTO NECESITAS?</strong></h3><hr><form class='range-field my-4  py-1'><input id='calculatorSlider' class='form-control-range' type='range'min='1000' max='4000' /></form><div class='row'><div class='col-md-6 text-center pb-1'><h2><span class='badge purple-gradient lighten-2 mb-1'>Te prestamos</span></h2><h2 class='display-4' style='color:#0d47a1'>$<strong id='prestamos'></strong></h2></div><div class='col-md-6 text-center pb-3'><h2><span class='badge purple-gradient lighten-2 mb-1'>Devolvés</span></h2><h2 class='display-4' style='color:#0d47a1'>$<strong id='devolves'></strong></h2></div><div class='col-md-12 text-center mb-2'><a href='prestamo.php'><button class='btn peach-gradient btn-block' type='submit'><h3>Quiero este préstamo</h3></button></a></div></div>"

        padre.insertAdjacentHTML("afterbegin", texto);

				var slider = document.getElementById("calculatorSlider");
				var output_1 = document.getElementById("prestamos");
				var output_2 = document.getElementById("devolves");
				output_1.innerHTML = formatMoney(slider.value, 0); // Display the default slider value
				window.onload = onLoadFunctions;
				output_2.innerHTML = slider.value; // Display the default slider value * interest rate


				// Intializes output_2 on window load
				
			function onLoadFunctions() {
				output_2.innerHTML =  formatMoney((Math.round((slider.value * (100 + parseInt(interes, 10)) / 100) + parseInt(costo_adm, 10))), 0);   
			}
				
				// Update the current slider value (each time you drag the slider handle)

			slider.oninput = function() {
				output_1.innerHTML = formatMoney(this.value, 0);
				output_2.innerHTML = formatMoney((Math.round((slider.value * (100 + parseInt(interes, 10)) / 100) + parseInt(costo_adm, 10))), 0);
			} 

			x = formatMoney(1500, 0);

			function formatMoney(n, c, d, t) {
				var c = isNaN(c = Math.abs(c)) ? 2 : c,
						d = d == undefined ? "." : d,
						t = t == undefined ? "," : t,
						s = n < 0 ? "-" : "",
						i = String(parseInt(n = Math.abs(Number(n) || 0).toFixed(c))),
						j = (j = i.length) > 3 ? j % 3 : 0;

			return s + (j ? i.substr(0, j) + t : "") + i.substr(j).replace(/(\d{3})(?=\d)/g, "$1" + t) + (c ? d + Math.abs(n - i).toFixed(c).slice(2) : "");
			};

    }

    



</script>
  
</body>
</html>