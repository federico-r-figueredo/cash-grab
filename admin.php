<?php
	
	session_start();
	require 'parametros_conexion.php';
	include 'funcs.php';

	if(!isset($_SESSION["id_usuario"])){ //Si no ha iniciado sesión redirecciona a index.php
		header("Location: index.php");
	}

	$idUsuario = $_SESSION['id_usuario'];
	
	$sql_1 = "SELECT tipo FROM usuarios WHERE id_usr = '$idUsuario'";

	$result_1 = $mysqli->query($sql_1);

	$row_1 = $result_1->fetch_assoc();

	if($row_1['tipo'] != 2){
		header("Location: panel_usuarios.php");
	}

	$sql_2 = "SELECT interes, costo_adm, nota FROM config WHERE id = 1";

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
			<div class="col-lg-12 col-xl- my-5">

				<!----------------- Panel admin (inicio) ---------------------->
					<div class="card mb-3">
						<div class="row">
							<div class="col-sm-12 mb-2">
								<div class="mt-4">
									<h2 class="text-center">Panel de ADMIN</h2>
								</div>
							</div>
						</div>  
						<div class="btn-group btn-group-toggle mb-4" role="group" aria-label="Basic example">
							<div class="container ">
						
								<div class="row mx-auto my-1">
									<div class="col-md">
										<button id="btn_prestamos" type="button" class="btn peach-gradient m-2 w-100" onClick="activo(this.id); cambio_vista('prestamos');" ><i class="fas fa-history fa-sm pr-2" style="display:inline;" aria-hidden="true"></i>Prestamos</button>
									</div>
									<div class="col-md">
										<button id="btn_usuarios" type="button" class="btn purple-gradient m-2 w-100" onClick="activo(this.id); cambio_vista('usuarios');"><i class="fas fa-money-bill-alt fa-sm pr-2" style="display:inline;" aria-hidden="true"></i>Usuarios</button>
									</div>
									<div class="col-md">
										<button id="btn_bancos" type="button" class="btn purple-gradient m-2 w-100" onClick="activo(this.id); cambio_vista('bancos');" ><i class="fas fa-history fa-sm pr-2" style="display:inline;" aria-hidden="true"></i>Bancos</button>
									</div>
									<div class="col-md">
										<button id="btn_historial" type="button" class="btn purple-gradient m-2 w-100" onClick="activo(this.id); cambio_vista('historial');"><i class="fas fa-money-bill-alt fa-sm pr-2" style="display:inline;" aria-hidden="true"></i>Historial</button>
									</div>
									<div class="col-md">
										<button id="btn_config" type="button" class="btn purple-gradient m-2 w-100" onClick="activo(this.id); cambio_vista('config');"><i class="fas fa-money-bill-alt fa-sm pr-2" style="display:inline;" aria-hidden="true"></i>Configuración</button>
									</div>
								</div>
							</div>
						</div>
					</div>
				<!----------------- Panel admin (fin) ------------------------->
			   
				<!----------------- Vista Prestamos (Inicio) ------------------>
					<div class="row" style="max-height: inherit; min-height: 325px;" id="prestamos">
						<div class="col-sm-12 mt-1" >
							<div class="card">
								<div class="card-body text-center">

									<!------ Navegador Tabs (inicio) ------>
										<ul class="nav nav-pills mb-3 justify-content-center" id="pills-tab" role="tablist">
											<li class="nav-item">
												<a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-pendientes" role="tab" aria-controls="pills-home" aria-selected="true">Pendientes</a>
											</li>
											<li class="nav-item">
												<a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-revision" role="tab" aria-controls="pills-profile" aria-selected="false">En revisión</a>
											</li>
											<li class="nav-item">
												<a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-aprobados" role="tab" aria-controls="pills-profile" aria-selected="true">Aprobados</a>
											</li>
											<li class="nav-item">
												<a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-rechazados" role="tab" aria-controls="pills-profile" aria-selected="false">Rechazados</a>
											</li>
										</ul>
									<!------ Navegador Tabs (fin) --------->

									<!------ Contenido Tab (inicio) ---->
										<div class="tab-content pt-2 pl-1" id="pills-tabContent">

											<!-- Primer Pill (inicio) -->
												<div class="tab-pane fade show active" id="pills-pendientes" role="tabpanel" aria-labelledby="pills-home-tab">

													<nav aria-label="Page navigation example">
														<ul class="pagination justify-content-center pag-1">
															<li class="page-item" id="previous-page">
																<a class="page-link" href="javascript:void(0)" tabindex="-1">Previous</a>
															</li>
														</ul>
													</nav>

													<table class="table">
													<thead class="thead-dark">
														<tr>
														<th scope="col">Usuario</th>
														<th scope="col">Monto</th>
														<th scope="col">Perfil</th>
														<th scope="col">Fecha</th>
														</tr>
													</thead>
													<tbody id="tabla-pres-pen">
														<!------------ Contenido generaro con AJAX -------------------->
													</tbody>
													</table>
													<!-- Button trigger modal -->

													<!------------- Modal (inicio) ----------------->
														<div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
															<div class="modal-dialog" role="document">
																<div class="modal-content">

																	<div class="modal-body">
																		<nav>
																			<div class="nav nav-tabs justify-content-center" id="nav-tab" role="tablist">
																				<a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home_1" role="tab" aria-controls="nav-home" aria-selected="true">Prestamo</a>
																				<a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile_1" role="tab" aria-controls="nav-profile" aria-selected="false">Usuario</a>
																				<button type="button" class="close" data-dismiss="modal" aria-label="Close" style="position: absolute; right: 15px;">
																					<span aria-hidden="true">&times;</span>
																				</button>
																			</div>
																		</nav>
																		<div class="tab-content" id="nav-tabContent">
																			<div class="tab-pane fade show active" id="nav-home_1" role="tabpanel" aria-labelledby="nav-home-tab">
																				<table class="table mb-0">
																					<tbody class>
																						<tr>
																							<th scope="row" class="table-dark">Monto</th>
																							<td class="td1"></td>
																						</tr>
																						<tr>
																							<th scope="row" class="table-dark">Fecha Devolución</th>
																							<td class="td2"></td>
																						</tr>
																						<tr>
																							<th scope="row" class="table-dark">Interés</th>
																							<td class="td3"></td>
																						</tr>
																						<tr>
																							<th scope="row" class="table-dark">Costos Administrativos</th>
																							<td class="td4">°</td>
																						</tr>
																						<tr>
																							<th scope="row" class="table-dark">Monto a devolver</th>
																							<td class="td5"></td>
																						</tr>
																						<tr>
																							<th scope="row" class="table-dark">N° Cuenta Bancaria</th>
																							<td class="td6"></td>
																						</tr>
																						<tr>
																							<th scope="row" class="table-dark">CBU</th>
																							<td class="td7"></td>
																						</tr>
																					</tbody>
																				</table>
																				<div class="mt-3">
																					<form role="form" method="POST" action="admin_scripts.php" autocomplete="off">
																						<input type="hidden" name="pendiente-rechazar-i" id="pendiente-rechazar-i" />
																						<input type="hidden" name="pendiente-revision-i" id="pendiente-revision-i" />
																						<button id="btn1"  type="submit" name="pendiente-rechazar-b" class="btn bg-danger" >Rechazar</button>
																						<button id="btn2" type="submit" name="pendiente-revision-b" class="btn bg-success">Enviar a revisión</button>
																					</form>
																				</div>
																			</div>
																			<div class="tab-pane fade" id="nav-profile_1" role="tabpanel" aria-labelledby="nav-profile-tab">
																				<table class="table mb-0">
																					<tbody class>
																						<tr>
																							<th scope="row" class="table-dark">Nombre</th>
																							<td class="td8"></td>
																						</tr>
																						<tr>
																							<th scope="row" class="table-dark">Apellido</th>
																							<td class="td9"></td>
																						</tr>
																						<tr>
																							<th scope="row" class="table-dark">DNI</th>
																							<td class="td10"></td>
																						</tr>
																						<tr>
																							<th scope="row" class="table-dark">Domicilio</th>
																							<td class="td11">°</td>
																						</tr>
																						<tr>
																							<th scope="row" class="table-dark">Teléfono</th>
																							<td class="td12"></td>
																						</tr>
																						<tr>
																							<th scope="row" class="table-dark">Sexo</th>
																							<td class="td13"></td>
																						</tr>
																						<tr>
																							<th scope="row" class="table-dark">E-Mail</th>
																							<td class="td14"></td>
																						</tr>
																						<tr>
																							<th scope="row" class="table-dark">Fecha de nacimiento</th>
																							<td class="td15"></td>
																						</tr>
																						<tr>
																							<th scope="row" class="table-dark">Sueldo Bruto Mensual</th>
																							<td class="td16"></td>
																						</tr>
																					</tbody>
																				</table>
																				<div class="mt-3">
																					<form role="form" method="POST" action="admin_scripts.php" autocomplete="off">
																						<input type="hidden" name="pend-banear-i" id="pend-banear-i" />
																						<input type="hidden" name="pend-eliminar-i" id="pend-eliminar-i" />
																						<button id="btn1"  type="submit" name="pend-banear-b" class="btn bg-danger" >Banear</button>
																						<button id="btn2" type="submit" name="pend-eliminar-b" class="btn bg-success">Eliminar</button>
																					</form>
																				</div>
																				
																			</div>
																		</div>
																	</div>

																</div>
															</div>
														</div>
													<!---------------- Modal (fin) ---------------->

												</div>
											<!-- Primer Pill (fin) ----->
									

											<!-- Segunda Pill (inicio) -->
												<div class="tab-pane fade" id="pills-revision" role="tabpanel" aria-labelledby="pills-profile-tab">

													<nav aria-label="Page navigation example">
														<ul class="pagination justify-content-center pag-2">
															<li class="page-item" id="previous-page">
																<a class="page-link" href="javascript:void(0)" tabindex="-1">Previous</a>
															</li>
														</ul>
													</nav>

													<table class="table">
													<thead class="thead-dark">
														<tr>
														<th scope="col">Usuario</th>
														<th scope="col">Monto</th>
														<th scope="col">Perfil</th>
														<th scope="col">Hora y Fecha</th>
														</tr>
													</thead>
													<tbody id="tabla-pres-rev">
														<!------------ Contenido generaro con AJAX -------------------->
													</tbody>
													</table>
							
													<!------------- Modal (inicio) ----------------->
													<div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
															<div class="modal-dialog" role="document">
																<div class="modal-content">

																	<div class="modal-body">
																		<nav>
																			<div class="nav nav-tabs justify-content-center" id="nav-tab" role="tablist">
																				<a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home_2" role="tab" aria-controls="nav-home" aria-selected="true">Prestamo</a>
																				<a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile_2" role="tab" aria-controls="nav-profile" aria-selected="false">Usuario</a>
																				<button type="button" class="close" data-dismiss="modal" aria-label="Close" style="position: absolute; right: 15px;">
																					<span aria-hidden="true">&times;</span>
																				</button>
																			</div>
																		</nav>
																		<div class="tab-content" id="nav-tabContent">
																			<div class="tab-pane fade show active" id="nav-home_2" role="tabpanel" aria-labelledby="nav-home-tab">
																				<table class="table mb-0">
																					<tbody class>
																						<tr>
																							<th scope="row" class="table-dark">Monto</th>
																							<td class="td1"></td>
																						</tr>
																						<tr>
																							<th scope="row" class="table-dark">Fecha Devolución</th>
																							<td class="td2"></td>
																						</tr>
																						<tr>
																							<th scope="row" class="table-dark">Interés</th>
																							<td class="td3"></td>
																						</tr>
																						<tr>
																							<th scope="row" class="table-dark">Costos Administrativos</th>
																							<td class="td4">°</td>
																						</tr>
																						<tr>
																							<th scope="row" class="table-dark">Monto a devolver</th>
																							<td class="td5"></td>
																						</tr>
																						<tr>
																							<th scope="row" class="table-dark">N° Cuenta Bancaria</th>
																							<td class="td6"></td>
																						</tr>
																						<tr>
																							<th scope="row" class="table-dark">CBU</th>
																							<td class="td7"></td>
																						</tr>
																					</tbody>
																				</table>
																				<div class="mt-3">
																					<form role="form" method="POST" action="admin_scripts.php" autocomplete="off">
																						<input type="hidden" name="revision-aprobar-i" id="revision-aprobar-i" />
																						<input type="hidden" name="revision-rechazar-i" id="revision-rechazar-i"/>
																						<button id="btn1"  type="submit" name="revision-rechazar-b" class="btn bg-danger" onclick="loader();">Rechazar</button>
																						<button id="btn2" type="submit" name="revision-aprobar-b" class="btn bg-success" onclick="loader();">Aprobar</button>
																					</form>
																				</div>
																			</div>
																			<div class="tab-pane fade" id="nav-profile_2" role="tabpanel" aria-labelledby="nav-profile-tab">
																				<table class="table mb-0">
																					<tbody class>
																						<tr>
																							<th scope="row" class="table-dark">Nombre</th>
																							<td class="td8"></td>
																						</tr>
																						<tr>
																							<th scope="row" class="table-dark">Apellido</th>
																							<td class="td9"></td>
																						</tr>
																						<tr>
																							<th scope="row" class="table-dark">DNI</th>
																							<td class="td10"></td>
																						</tr>
																						<tr>
																							<th scope="row" class="table-dark">Domicilio</th>
																							<td class="td11">°</td>
																						</tr>
																						<tr>
																							<th scope="row" class="table-dark">Teléfono</th>
																							<td class="td12"></td>
																						</tr>
																						<tr>
																							<th scope="row" class="table-dark">Sexo</th>
																							<td class="td13"></td>
																						</tr>
																						<tr>
																							<th scope="row" class="table-dark">E-Mail</th>
																							<td class="td14"></td>
																						</tr>
																						<tr>
																							<th scope="row" class="table-dark">Fecha de nacimiento</th>
																							<td class="td15"></td>
																						</tr>
																						<tr>
																							<th scope="row" class="table-dark">Sueldo Bruto Mensual</th>
																							<td class="td16"></td>
																						</tr>
																					</tbody>
																				</table>
																				<div class="mt-3">
																					<form role="form" method="POST" action="admin_scripts.php" autocomplete="off">
																						<input type="hidden" name="rev-banear-i" id="rev-banear-i" />
																						<input type="hidden" name="rev-eliminar-i" id="rev-eliminar-i" />
																						<button id="btn1"  type="submit" name="rev-banear-b" class="btn bg-danger" >Banear</button>
																						<button id="btn2" type="submit" name="rev-eliminar-b" class="btn bg-success">Eliminar</button>
																					</form>
																				</div>
																			</div>
																		</div>
																	</div>
																</div>
															</div>
														</div>
													<!---------------- Modal (fin) ---------------->

												</div>
											<!-- Segunda Pill (fin) ----->

											<!-- Tercer Pill (inicio) -->
												<div class="tab-pane fade" id="pills-aprobados" role="tabpanel" aria-labelledby="pills-profile-tab">

													<nav aria-label="Page navigation example">
														<ul class="pagination justify-content-center pag-3">
															<li class="page-item" id="previous-page">
																<a class="page-link" href="javascript:void(0)" tabindex="-1">Previous</a>
															</li>
														</ul>
													</nav>

													<table class="table">
													<thead class="thead-dark">
														<tr>
														<th scope="col">Usuario</th>
														<th scope="col">Monto</th>
														<th scope="col">Perfil</th>
														<th scope="col">Hora y Fecha</th>
														</tr>
													</thead>
													<tbody id="tabla-pres-apr">
														<!------------ Contenido generaro con AJAX -------------------->
													</tbody>
													</table>
														<!-- Button trigger modal -->

													<!------------- Modal (inicio) ----------------->
													<div class="modal fade" id="exampleModal3" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
															<div class="modal-dialog" role="document">
																<div class="modal-content">

																	<div class="modal-body">
																		<nav>
																			<div class="nav nav-tabs justify-content-center" id="nav-tab" role="tablist">
																				<a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home_3" role="tab" aria-controls="nav-home" aria-selected="true">Prestamo</a>
																				<a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile_3" role="tab" aria-controls="nav-profile" aria-selected="false">Usuario</a>
																				<button type="button" class="close" data-dismiss="modal" aria-label="Close" style="position: absolute; right: 15px;">
																					<span aria-hidden="true">&times;</span>
																				</button>
																			</div>
																		</nav>
																		<div class="tab-content" id="nav-tabContent">
																			<div class="tab-pane fade show active" id="nav-home_3" role="tabpanel" aria-labelledby="nav-home-tab">
																				<table class="table mb-0">
																					<tbody class>
																						<tr>
																							<th scope="row" class="table-dark">Monto</th>
																							<td class="td1"></td>
																						</tr>
																						<tr>
																							<th scope="row" class="table-dark">Fecha Devolución</th>
																							<td class="td2"></td>
																						</tr>
																						<tr>
																							<th scope="row" class="table-dark">Interés</th>
																							<td class="td3"></td>
																						</tr>
																						<tr>
																							<th scope="row" class="table-dark">Costos Administrativos</th>
																							<td class="td4">°</td>
																						</tr>
																						<tr>
																							<th scope="row" class="table-dark">Monto a devolver</th>
																							<td class="td5"></td>
																						</tr>
																						<tr>
																							<th scope="row" class="table-dark">N° Cuenta Bancaria</th>
																							<td class="td6"></td>
																						</tr>
																						<tr>
																							<th scope="row" class="table-dark">CBU</th>
																							<td class="td7"></td>
																						</tr>
																					</tbody>
																				</table>
																				<div class="mt-3">
																					<form role="form" method="POST" action="admin_scripts.php" autocomplete="off">
																						<input type="hidden" name="aprobar-rechazar-i" id="aprobar-rechazar-i" data-x="" />
																						<button id="btn1"  type="submit" name="aprobar-rechazar-b" class="btn bg-danger" >Rechazar</button>
																					</form>
																				</div>
																			</div>
																			<div class="tab-pane fade" id="nav-profile_3" role="tabpanel" aria-labelledby="nav-profile-tab">
																				<table class="table mb-0">
																					<tbody class>
																						<tr>
																							<th scope="row" class="table-dark">Nombre</th>
																							<td class="td8"></td>
																						</tr>
																						<tr>
																							<th scope="row" class="table-dark">Apellido</th>
																							<td class="td9"></td>
																						</tr>
																						<tr>
																							<th scope="row" class="table-dark">DNI</th>
																							<td class="td10"></td>
																						</tr>
																						<tr>
																							<th scope="row" class="table-dark">Domicilio</th>
																							<td class="td11">°</td>
																						</tr>
																						<tr>
																							<th scope="row" class="table-dark">Teléfono</th>
																							<td class="td12"></td>
																						</tr>
																						<tr>
																							<th scope="row" class="table-dark">Sexo</th>
																							<td class="td13"></td>
																						</tr>
																						<tr>
																							<th scope="row" class="table-dark">E-Mail</th>
																							<td class="td14"></td>
																						</tr>
																						<tr>
																							<th scope="row" class="table-dark">Fecha de nacimiento</th>
																							<td class="td15"></td>
																						</tr>
																						<tr>
																							<th scope="row" class="table-dark">Sueldo Bruto Mensual</th>
																							<td class="td16"></td>
																						</tr>
																					</tbody>
																				</table>
																				<div class="mt-3">
																					<form role="form" method="POST" action="admin_scripts.php" autocomplete="off">
																						<input type="hidden" name="ap-banear-i" id="ap-banear-i" />
																						<input type="hidden" name="ap-eliminar-i" id="ap-eliminar-i" />
																						<button id="btn1"  type="submit" name="ap-banear-b" class="btn bg-danger" >Banear</button>
																						<button id="btn2" type="submit" name="ap-eliminar-b" class="btn bg-success">Eliminar</button>
																					</form>
																				</div>
																			</div>
																		</div>
																	</div>
																</div>
															</div>
														</div>
													<!---------------- Modal (fin) ---------------->

												</div>
											<!-- Tercer Pill (fin) ----->

											<!-- Cuarta Pill (inicio) -->
												<div class="tab-pane fade" id="pills-rechazados" role="tabpanel" aria-labelledby="pills-profile-tab">

													<nav aria-label="Page navigation example">
														<ul class="pagination justify-content-center pag-4">
															<li class="page-item" id="previous-page">
																<a class="page-link" href="javascript:void(0)" tabindex="-1">Previous</a>
															</li>
														</ul>
													</nav>

													<table class="table">
													<thead class="thead-dark">
														<tr>
														<th scope="col">Usuario</th>
														<th scope="col">Monto</th>
														<th scope="col">Perfil</th>
														<th scope="col">Hora y Fecha</th>
														</tr>
													</thead>
													<tbody id="tabla-pres-rech">
														<!------------ Contenido generaro con AJAX -------------------->
													</tbody>
													</table>
										   

													<!------------- Modal (inicio) ----------------->
													<div class="modal fade" id="exampleModal4" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
															<div class="modal-dialog" role="document">
																<div class="modal-content">

																	<div class="modal-body">
																		<nav>
																			<div class="nav nav-tabs justify-content-center" id="nav-tab" role="tablist">
																				<a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home_4" role="tab" aria-controls="nav-home" aria-selected="true">Prestamo</a>
																				<a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile_4" role="tab" aria-controls="nav-profile" aria-selected="false">Usuario</a>
																				<button type="button" class="close" data-dismiss="modal" aria-label="Close" style="position: absolute; right: 15px;" onclick="loader();>
																					<span aria-hidden="true">&times;</span>
																				</button>
																			</div>
																		</nav>
																		<div class="tab-content" id="nav-tabContent">
																			<div class="tab-pane fade show active" id="nav-home_4" role="tabpanel" aria-labelledby="nav-home-tab">
																				<table class="table mb-0">
																					<tbody class>
																						<tr>
																							<th scope="row" class="table-dark">Monto</th>
																							<td class="td1"></td>
																						</tr>
																						<tr>
																							<th scope="row" class="table-dark">Fecha Devolución</th>
																							<td class="td2"></td>
																						</tr>
																						<tr>
																							<th scope="row" class="table-dark">Interés</th>
																							<td class="td3"></td>
																						</tr>
																						<tr>
																							<th scope="row" class="table-dark">Costos Administrativos</th>
																							<td class="td4">°</td>
																						</tr>
																						<tr>
																							<th scope="row" class="table-dark">Monto a devolver</th>
																							<td class="td5"></td>
																						</tr>
																						<tr>
																							<th scope="row" class="table-dark">N° Cuenta Bancaria</th>
																							<td class="td6"></td>
																						</tr>
																						<tr>
																							<th scope="row" class="table-dark">CBU</th>
																							<td class="td7"></td>
																						</tr>
																					</tbody>
																				</table>
																				<div class="mt-3">
																					<form role="form" method="POST" action="admin_scripts.php" autocomplete="off">
																						<input type="hidden" name="rechazar-revision-i" id="rechazar-revision-i" data-x="" />
																						<button id="btn1"  type="submit" name="rechazar-revision-b" class="btn bg-success" >Enviar a Revisión</button>
																					</form>
																				</div>
																			</div>
																			<div class="tab-pane fade" id="nav-profile_4" role="tabpanel" aria-labelledby="nav-profile-tab">
																				<table class="table mb-0">
																					<tbody class>
																						<tr>
																							<th scope="row" class="table-dark">Nombre</th>
																							<td class="td8"></td>
																						</tr>
																						<tr>
																							<th scope="row" class="table-dark">Apellido</th>
																							<td class="td9"></td>
																						</tr>
																						<tr>
																							<th scope="row" class="table-dark">DNI</th>
																							<td class="td10"></td>
																						</tr>
																						<tr>
																							<th scope="row" class="table-dark">Domicilio</th>
																							<td class="td11">°</td>
																						</tr>
																						<tr>
																							<th scope="row" class="table-dark">Teléfono</th>
																							<td class="td12"></td>
																						</tr>
																						<tr>
																							<th scope="row" class="table-dark">Sexo</th>
																							<td class="td13"></td>
																						</tr>
																						<tr>
																							<th scope="row" class="table-dark">E-Mail</th>
																							<td class="td14"></td>
																						</tr>
																						<tr>
																							<th scope="row" class="table-dark">Fecha de nacimiento</th>
																							<td class="td15"></td>
																						</tr>
																						<tr>
																							<th scope="row" class="table-dark">Sueldo Bruto Mensual</th>
																							<td class="td16"></td>
																						</tr>
																					</tbody>
																				</table>
																				<div class="mt-3">
																					<form role="form" method="POST" action="admin_scripts.php" autocomplete="off">
																						<input type="hidden" name="rec-banear-i" id="rec-banear-i" />
																						<input type="hidden" name="rec-eliminar-i" id="rec-eliminar-i" />
																						<button id="btn1"  type="submit" name="rec-banear-b" class="btn bg-danger" >Banear</button>
																						<button id="btn2" type="submit" name="rec-eliminar-b" class="btn bg-success">Eliminar</button>
																					</form>
																				</div>
																			</div>
																		</div>
																	</div>
																</div>
															</div>
														</div>
													<!---------------- Modal (fin) ---------------->

												</div>
											<!-- Cuarta Pill (fin) ----->

										</div>
									<!------ Contenido Tab (fin) ------->
								</div>
							</div>
						</div>
					</div>
				<!----------------- Vista Prestamos (Fin) --------------------->



				<!----------------- Vista Usuarios (Inicio) ------------------->
					<div class="row  d-none" style="max-height: inherit; min-height: 325px;" id="usuarios">
						<div class="col-sm-12 mt-1" >
							<div class="card">
								<div class="card-body text-center">

									<!------ Navegador Tabs (inicio) ----->
										<ul class="nav nav-pills mb-3 justify-content-center" id="pills-tab" role="tablist">
											<li class="nav-item">
												<a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-todos" role="tab" aria-controls="pills-home" aria-selected="true">Activos</a>

											</li>
											<li class="nav-item">
												<a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-baneados" role="tab" aria-controls="pills-profile" aria-selected="false">Baneados</a>
											</li>
										</ul>
									<!------ Navegador Tabs (fin) -------->

									<!------ Contenido Tab (inicio) ------>
										<div class="tab-content pt-2 pl-1" id="pills-tabContent">

											<!-- Primer Pill (inicio) -->
												<div class="tab-pane fade show active" id="pills-todos" role="tabpanel" aria-labelledby="pills-home-tab" id="div-usuarios">

													<nav aria-label="Page navigation example">
														<ul class="pagination justify-content-center pag-5">
															<li class="page-item" id="previous-page">
															<a class="page-link" href="javascript:void(0)" tabindex="-1">Previous</a>
															</li>
														</ul>
													</nav>

													<table class="table">
													<thead class="thead-dark">
														<tr>
														<th scope="col">Nombre</th>
														<th scope="col">Correo</th>
														<th scope="col">Perfil</th>
														<th scope="col">Fecha de Registro</th>
														</tr>
													</thead>
													<tbody id="tabla-us-activos">
														<!------------ Contenido generaro con AJAX -------------------->
													</tbody>
													</table>

													<!-- Modal -->
														<div class="modal fade" id="exampleModal5" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
															<div class="modal-dialog" role="document">
																<div class="modal-content">

																	<div class="modal-body">
																		<nav>
																			<div class="nav nav-tabs justify-content-center" id="nav-tab" role="tablist">
																				<a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Usuario</a>
																				<button type="button" class="close" data-dismiss="modal" aria-label="Close" style="position: absolute; right: 15px;">
																					<span aria-hidden="true">&times;</span>
																				</button>
																			</div>
																		</nav>
																		<div class="tab-content" id="nav-tabContent">
																			<div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
																				<table class="table mb-0">
																					<tbody class>
																						<tr>
																							<th scope="row" class="table-dark">Nombre</th>
																							<td class="td1"></td>
																						</tr>
																						<tr>
																							<th scope="row" class="table-dark">Apellido</th>
																							<td class="td2"></td>
																						</tr>
																						<tr>
																							<th scope="row" class="table-dark">DNI</th>
																							<td class="td3"></td>
																						</tr>
																						<tr>
																							<th scope="row" class="table-dark">Domicilio</th>
																							<td class="td4">°</td>
																						</tr>
																						<tr>
																							<th scope="row" class="table-dark">Teléfono</th>
																							<td class="td5"></td>
																						</tr>
																						<tr>
																							<th scope="row" class="table-dark">Sexo</th>
																							<td class="td6"></td>
																						</tr>
																						<tr>
																							<th scope="row" class="table-dark">E-Mail</th>
																							<td class="td7"></td>
																						</tr>
																						<tr>
																							<th scope="row" class="table-dark">Fecha de nacimiento</th>
																							<td class="td8"></td>
																						</tr>
																						<tr>
																							<th scope="row" class="table-dark">Sueldo Bruto Mensual</th>
																							<td class="td9"></td>
																						</tr>
																					</tbody>
																				</table>
																			</div>
																		</div>
																	</div>

																	<div class="modal-footer">
																		<div class="mt-3">
																			<form role="form" method="POST" action="admin_scripts.php" autocomplete="off">
																				<input type="hidden" name="ustod-banear-i" id="ustod-banear-i" />
																				<input type="hidden" name="ustod-eliminar-i" id="ustod-eliminar-i" />
																				<button id="btn1"  type="submit" name="ustod-banear-b" class="btn bg-danger" >Banear</button>
																				<button id="btn2" type="submit" name="ustod-eliminar-b" class="btn bg-danger">Eliminar</button>
																			</form>
																		</div>
																	</div>

																</div>
															</div>
														</div>
													<!---------------- Modal (fin) ---------------->
												</div>
											<!-- Primer Pill (fin) -->
									
											<!-- Segunda Pill (inicio) -->
												<div class="tab-pane fade" id="pills-baneados" role="tabpanel" aria-labelledby="pills-profile-tab">

													<nav aria-label="Page navigation example">
														<ul class="pagination justify-content-center pag-6">
															<li class="page-item" id="previous-page">
															<a class="page-link" href="javascript:void(0)" tabindex="-1">Previous</a>
															</li>
														</ul>
													</nav>

													<table class="table">
													<thead class="thead-dark">
														<tr>
														<th scope="col">Usuario</th>
														<th scope="col">Monto</th>
														<th scope="col">Perfil</th>
														<th scope="col">Hora y Fecha</th>
														</tr>
													</thead>
													<tbody id="tabla-baneados">
														<!------------ Contenido generaro con AJAX -------------------->
													</tbody>
													</table>

													<!-- Modal -->
													<div class="modal fade" id="exampleModal6" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
															<div class="modal-dialog" role="document">
																<div class="modal-content">

																	<div class="modal-body">
																		<nav>
																			<div class="nav nav-tabs justify-content-center" id="nav-tab" role="tablist">
																				<a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Usuario</a>
																				<button type="button" class="close" data-dismiss="modal" aria-label="Close" style="position: absolute; right: 15px;">
																					<span aria-hidden="true">&times;</span>
																				</button>
																			</div>
																		</nav>
																		<div class="tab-content" id="nav-tabContent">
																			<div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
																				<table class="table mb-0">
																					<tbody class>
																						<tr>
																							<th scope="row" class="table-dark">Nombre</th>
																							<td class="td1"></td>
																						</tr>
																						<tr>
																							<th scope="row" class="table-dark">Apellido</th>
																							<td class="td2"></td>
																						</tr>
																						<tr>
																							<th scope="row" class="table-dark">DNI</th>
																							<td class="td3"></td>
																						</tr>
																						<tr>
																							<th scope="row" class="table-dark">Domicilio</th>
																							<td class="td4">°</td>
																						</tr>
																						<tr>
																							<th scope="row" class="table-dark">Teléfono</th>
																							<td class="td5"></td>
																						</tr>
																						<tr>
																							<th scope="row" class="table-dark">Sexo</th>
																							<td class="td6"></td>
																						</tr>
																						<tr>
																							<th scope="row" class="table-dark">E-Mail</th>
																							<td class="td7"></td>
																						</tr>
																						<tr>
																							<th scope="row" class="table-dark">Fecha de nacimiento</th>
																							<td class="td8"></td>
																						</tr>
																						<tr>
																							<th scope="row" class="table-dark">Sueldo Bruto Mensual</th>
																							<td class="td9"></td>
																						</tr>
																					</tbody>
																				</table>
																			</div>
																		</div>
																	</div>

																	<div class="modal-footer">
																		<div class="mt-3">
																			<form role="form" method="POST" action="admin_scripts.php" autocomplete="off">
																				<input type="hidden" name="usban-activo-i" id="usban-activo-i" />
																				<input type="hidden" name="usban-eliminar-i" id="usban-eliminar-i" />
																				<button id="btn1"  type="submit" name="usban-activo-b" class="btn bg-success" >Activar</button>
																				<button id="btn2" type="submit" name="usban-eliminar-b" class="btn bg-danger">Eliminar</button>
																			</form>
																		</div>
																	</div>

																</div>
															</div>
														</div>
													<!---------------- Modal (fin) ---------------->

												</div>
											<!-- Segunda Pill (fin) -->
										</div>
									<!------ Contenido Tab (fin) --------->
								</div>
							</div>
						</div>
					</div>
				<!----------------- Vista Usuarios (Fin) ---------------------->
				
				<!----------------  Vista Bancos (inicio) --------------------->
					<div class="row  d-none" style="max-height: inherit; min-height: 325px;" id="bancos">
						<div class="col-sm-12 mt-1" >
							<div class="card">
								<div class="card-body text-center">

									<!------ Navegador Tabs (inicio) ------>
										<ul class="nav nav-pills mb-3 justify-content-center" id="pills-tab" role="tablist">
											<li class="nav-item">
												<a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-todos-bancos" role="tab" aria-controls="pills-home" aria-selected="true">Todos</a>
											</li>
											<li class="nav-item">
												<a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-agregar" role="tab" aria-controls="pills-profile" aria-selected="false">Agregar</a>
											</li>
										</ul>
									<!------- Navegador Tabs (fin) ------->

									<!----- Contenido Tab (inicio) ------>
										<div class="tab-content pt-2 pl-1" id="pills-tabContent">

											<!-- Primer Pill (inicio) -->
												<div class="tab-pane fade show active" id="pills-todos-bancos" role="tabpanel" aria-labelledby="pills-home-tab">

													<nav aria-label="Page navigation example">
														<ul class="pagination justify-content-center pag-7">
															<li class="page-item" id="previous-page">
															<a class="page-link" href="javascript:void(0)" tabindex="-1">Previous</a>
															</li>
														</ul>
													</nav>

													<table class="table">
														<thead class="thead-dark">
															<tr>
															<th scope="col">Usuario</th>
															<th scope="col">Monto</th>
															<th scope="col">Perfil</th>
															<th scope="col">Hora y Fecha</th>
															</tr>
														</thead>
														<tbody id="tabla-bancos">
															<!------------ Contenido generaro con AJAX -------------------->
														</tbody>
													</table>

													<!------------- Modal (inicio) ----------------->
														<div class="modal fade" id="exampleModal7" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
															<div class="modal-dialog" role="document">
																<div class="modal-content">

																	<div class="modal-body">
																		<nav>
																			<div class="nav nav-tabs justify-content-center" id="nav-tab" role="tablist">
																				<a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home_7" role="tab" aria-controls="nav-home" aria-selected="true">Banco</a>
																				<a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile_7" role="tab" aria-controls="nav-profile" aria-selected="false">Editar</a>
																				<button type="button" class="close" data-dismiss="modal" aria-label="Close" style="position: absolute; right: 15px;">
																					<span aria-hidden="true">&times;</span>
																				</button>
																			</div>
																		</nav>
																		<div class="tab-content" id="nav-tabContent">
																			<div class="tab-pane fade show active" id="nav-home_7" role="tabpanel" aria-labelledby="nav-home-tab">
																				<table class="table mb-0">
																					<tbody class>
																						<tr>
																							<th scope="row" class="table-dark">Nombre</th>
																							<td class="td1"></td>
																						</tr>
																						<tr>
																							<th scope="row" class="table-dark">Código</th>
																							<td class="td2"></td>
																						</tr>
																						<tr>
																							<th scope="row" class="table-dark">Teléfono #1</th>
																							<td class="td3"></td>
																						</tr>
																						<tr>
																							<th scope="row" class="table-dark">Teléfono #2</th>
																							<td class="td4"></td>
																						</tr>
																						<tr>
																							<th scope="row" class="table-dark">Notas</th>
																							<td class="td5"></td>
																						</tr>
																					</tbody>
																				</table>
																			</div>
																			<div class="tab-pane fade" id="nav-profile_7" role="tabpanel" aria-labelledby="nav-profile-tab">
																				<form class="text-center border border-light p-5" role="form" method="POST" action="admin_scripts.php" >

																					<input type="text" id="" name="b_nombre"  class="form-control mb-2 ib6" placeholder="Nombre" value="">

																					<input type="text" id="" name="b_direccion"  class="form-control mb-2 ib7" placeholder="Direccion" value="">

																					<input type="text" id="" name="b_telefono1"  class="form-control mb-2 ib8" placeholder="Teléfono #1" value="">

																					<input type="text" id="" name="b_telefono2"  class="form-control mb-2 ib9" placeholder="Teléfono #2" value="">

																					<input type="text" id="" name="b_correo"  class="form-control mb-2 ib10" placeholder="E-Mail" value="">

																					<div class="form-group">
																						<textarea id="" class="form-control rounded-0 ib11" name="b_notas" id="exampleFormControlTextarea2" rows="3" placeholder="Agregar nota.." value=""></textarea>
																					</div>

																					<input type="hidden" id="" name="b_id" class="ib12" value=""/>

																					<button class="btn btn-info btn-block mt-4 purple-gradient" type="submit" name="editar-banco">Guardar Cambios</button>

																				</form>
																			</div>
																		</div>
																	</div>
																</div>
															</div>
														</div>
													<!---------------- Modal (fin) ---------------->

												</div>
											<!--- Primer Pill (fin) ---->
									

											<!-- Segunda Pill (inicio) -->
												<div class="tab-pane fade" id="pills-agregar" role="tabpanel" aria-labelledby="pills-profile-tab">
													<form class="text-center border border-light p-5" role="form" method="POST" action="admin_scripts.php" >

														<input type="text" name="cb_nombre"  class="form-control mb-2" placeholder="Nombre">

														<input type="text" name="cb_direccion"  class="form-control mb-2" placeholder="Direccion">

														<input type="text" name="cb_telefono1"  class="form-control mb-2" placeholder="Teléfono #1">

														<input type="text" name="cb_telefono2"  class="form-control mb-2" placeholder="Teléfono #2">

														<input type="text" name="cb_correo"  class="form-control mb-2" placeholder="E-Mail">

														<div class="form-group">
															<textarea class="form-control rounded-0 ib11" name="cb_notas" id="exampleFormControlTextarea2" rows="3" placeholder="Agregar nota.." value=""></textarea>
														</div>

														<button class="btn btn-info btn-block mt-4 purple-gradient" type="submit" name="crear-banco">Agregar Banco</button>

													</form>
												</div>
											<!-- Segundo Pill (fin) ----->
										</div>
									<!----- Contenido Tab (fin) --------->
								</div>
							</div>
						</div>
					</div>
				<!----------------  Vista Bancos (fin) ------------------------>


				<!----------------- Vista Historial (Inicio) ------------------>
					<div class="row  d-none" style="max-height: inherit; min-height: 325px;" id="historial">
						<div class="col-sm-12 mt-1" >
							<div class="card">
								<div class="card-body text-center">

									<!------ Navegador Tabs (inicio) ---->
										<ul class="nav nav-pills mb-3 justify-content-center" id="pills-tab" role="tablist">
											<li class="nav-item">
												<a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-hist-ad" role="tab" aria-controls="pills-home" aria-selected="true">Administración</a>
											</li>
											<li class="nav-item">
												<a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-hist-us" role="tab" aria-controls="pills-profile" aria-selected="false">Usuarios</a>
											</li>
										</ul>
									<!------ Navegador Tabs (fin) ------->

									<!------ Contenido Tab (inicio)------>
										<div class="tab-content pt-2 pl-1" id="pills-tabContent">

											<!-- Primer Pill (inicio) -->
												<div class="tab-pane fade show active" id="pills-hist-ad" role="tabpanel" aria-labelledby="pills-home-tab">

													<nav aria-label="Page navigation example">
														<ul class="pagination justify-content-center pag-8">
															<li class="page-item" id="previous-page">
															<a class="page-link" href="javascript:void(0)" tabindex="-1">Previous</a>
															</li>
														</ul>
													</nav>

													<table class="table">
													<thead class="thead-dark">
														<tr>
															<th scope="col">Tipo</th>
															<th scope="col">Evento</th>
															<th scope="col">IP</th>
															<th scope="col">Fecha</th>
														</tr>
													</thead>
													<tbody id="tabla-hist-adm">
														<!------------ Contenido generaro con AJAX -------------------->
													</tbody>
													</table>
												</div>
											<!-- Primer Pill (fin) -->
									
											<!-- Segunda Pill (inicio) -->
												<div class="tab-pane fade" id="pills-hist-us" role="tabpanel" aria-labelledby="pills-profile-tab">

													<nav aria-label="Page navigation example">
														<ul class="pagination justify-content-center pag-9">
															<li class="page-item" id="previous-page">
															<a class="page-link" href="javascript:void(0)" tabindex="-1">Previous</a>
															</li>
														</ul>
													</nav>

													<table class="table">
														<thead class="thead-dark">
															<tr>
																<th scope="col">Tipo</th>
																<th scope="col">Evento</th>
																<th scope="col">IP</th>
																<th scope="col">Fecha</th>
															</tr>
														</thead>
														<tbody id="tabla-hist-usr">
															<!------------ Contenido generaro con AJAX -------------------->
														</tbody>
													</table>
												</div>
											<!-- Segunda Pill (fin) -->

										</div>
									<!------ Contenido Tab (fin) -------->
								</div>
							</div>
						</div>
					</div>
				<!----------------- Vista Historial (Fin) --------------------->                           

				<!----------------  Vista Cotizador (inicio) ------------------>

					<div class="row d-none" style="max-height: inherit;" id="config">
						<div class="col-sm-12 mt-1" >
							<div class="card">
								<div class="card-body">

									<!------ Navegador Tabs (inicio) ------>
										<ul class="nav nav-pills mb-3 justify-content-center" id="pills-tab" role="tablist">
											<li class="nav-item">
												<a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab"
												aria-controls="pills-home" aria-selected="true">Porcentaje</a>
											</li>
										</ul>
									<!------- Navegador Tabs (fin) ------->

									<!----- Contenido Tab (inicio) ------>
										<div class="tab-content pt-2 pl-1" id="pills-tabContent">

											<!-- Primer Pill (inicio) -->
												<div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
													<form class="border border-light p-5" role="form" method="POST" action="admin_scripts.php" autocomplete="off">
														<label for="porcentaje">Interés:</label>
															<div class="input-group mb-3">
																<div class="input-group-prepend">
																	<span class="input-group-text" id="basic-addon1">%</span>
																</div>
																<input type="text" id="porcentaje" name="interes" class="form-control" value="<?php echo $row_2['interes'] ?>" >
															</div>
													
														<label for="costos">Costos Administrativos:</label>
															<div class="input-group mb-3">
																<div class="input-group-prepend">
																	<span class="input-group-text" id="basic-addon1">$</span>
																</div>
																<input type="text" id="costos" name="costo_adm" class="form-control" value="<?php echo $row_2['costo_adm'] ?>" >
															</div>
											
														<div class="form-group">
															<label for="exampleFormControlTextarea2">Agregar Nota:</label>
															<textarea class="form-control rounded-0" id="exampleFormControlTextarea2" name="nota" rows="3"><?php echo $row_2['nota'] ?></textarea>
														</div>
														<button class="btn btn-info my-4 btn-block purple-gradient" type="submit" name="cotizador" >Guardar Cambios</button>
													</form>
												</div>
											<!--- Primer Pill (fin) ---->

										</div>
									<!----- Contenido Tab (fin) --------->

								</div>
							</div>
						</div>
					</div>
				<!----------------  Vista Cotizador (fin) --------------------->          

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
	<script>
		
		'use strict';
		
		// función cambio color botones
			function activo(id_boton){

				var id_botones = [
					"btn_prestamos",
					"btn_usuarios",
					"btn_bancos",
					"btn_historial",
					"btn_config"
				];
				
				for(var i=0; i < id_botones.length; i++){
					var boton_1 = document.getElementById(id_botones[i]);
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

			var id_vistas = [
				"prestamos",
				"usuarios",
				"bancos",
				"historial",
				"config"
			];

		// función cambio vistas
			function cambio_vista(id){

				for(var i=0; i < id_vistas.length; i++){
		
					var vista = document.getElementById(id_vistas[i]);
		
					if(vista.classList.contains("d-none")){
						continue
					}else{
						vista.classList.add("d-none");
					}
				}
				
				var elemento = document.getElementById(id);
				elemento.classList.remove('d-none');

			}



		// 1.1 Render vista "Prestamos" > "En Revisión"
			var tabla_1 = document.getElementById('tabla-pres-pen');

			var ourRequest_1 = new XMLHttpRequest();
			ourRequest_1.open('GET', 'prestamos_pendientes.json');
			ourRequest_1.onload = function(){
				var ourData = JSON.parse(ourRequest_1.responseText);
				renderHTML_1(ourData);
			};

			ourRequest_1.send();

			function renderHTML_1(data){

				var cadena = "";
			   
				for (var i = 0; i < data.length; i++) {
					
					cadena+= "<tr class='fila' ><td>" + data[i].nombre + " " + data[i].apellido + "</td><td>" + data[i].monto + "</td><td><button type='button' class='btn_spec btn-primary' data-toggle='modal' data-target='#exampleModal1' data-1=" + data[i].monto + " data-2=" + data[i].plazo + " data-3=" + data[i].interes + " data-4=" + data[i].costo_adm + " data-5=" + data[i].monto_dev + " data-6=" + data[i].cuenta + " data-7=" + data[i].cbu + " data-8=" + data[i].nombre + " data-9=" + data[i].apellido + " data-10=" + data[i].dni + " data-11=" + data[i].domicilio + " data-12=" + data[i].telefono + " data-13=" + data[i].sexo + " data-14=" + data[i].correo + " data-15=" + data[i].fecha_nac + " data-16=" + data[i].salario + " data-17=" + data[i].id_usr + " style='padding: 0,4 1,1;'>Ver Ficha</button></td><td>" + data[i].fecha_prestamo + "</td></tr>";
 
				}
				
				tabla_1.insertAdjacentHTML('beforeend', cadena);
				
				var numberOfItems = $('#tabla-pres-pen .fila').length;
				var limitPerPage = 4
				$("#tabla-pres-pen .fila:gt(" + (limitPerPage - 1) + ")").hide()
				var totalPages = Math.ceil(numberOfItems / limitPerPage);
				$('.pag-1').append("<li class='current-page page-item active'><a class='page-link' href='javascript:void(0)'>" + 1 + "</a></li>")

				for(var i = 2; i <= totalPages; i++){
					$('.pag-1').append("<li class='current-page page-item'><a class='page-link' href='javascript:void(0)'>" + i + "</a></li>");
				}


				$('.pag-1').append("<li class='page-item' id='next-page'><a class='page-link' href='javascript:void(0)'>Next</a></li>");
				
				$(".pag-1 li.current-page").on("click", function(){
					if($(this).hasClass("active")){
						return false;
					}else{
						var currentPage = $(this).index();
						$(".pag-1 li").removeClass("active");
						$(this).addClass("active");
						$("#tabla-pres-pen .fila").hide();
						var grandTotal = limitPerPage * currentPage;
						for(var i = grandTotal - limitPerPage; i < grandTotal; i++){
							$("#tabla-pres-pen .fila:eq(" + i + ")").show();
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
						$("#tabla-pres-pen .fila").hide();
						var grandTotal = limitPerPage * currentPage;
						for(var i = grandTotal - limitPerPage; i < grandTotal; i++){
							$("#tabla-pres-pen .fila:eq(" + i + ")").show();
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
						$("#tabla-pres-pen .fila").hide();
						var grandTotal = limitPerPage * currentPage;
						for(var i = grandTotal - limitPerPage; i < grandTotal; i++){
							$("#tabla-pres-pen .fila:eq(" + i + ")").show();
						}
						$(".pag-1 li.current-page:eq(" + (currentPage - 1) + ")").addClass('active');
					}
				});
   
			}

		// 1.1 Render Tabla "Prestamos" > "Pendientes"	

			$('#exampleModal1').on('show.bs.modal', function (event) {
				var button = $(event.relatedTarget)
				var modal = $(this)
				var recipient = [];
    			for (var i = 1; i <= 16; ++i) {
        			recipient[i] = button.data("" + i + "")
					modal.find(".td" + i ).text(recipient[i])
    			}
				$("#pendiente-rechazar-i").val(button.data("17"));
				$("#pendiente-revision-i").val(button.data("17"));
				$("#pend-banear-i").val(button.data("17"));
				$("#pend-eliminar-i").val(button.data("17"));
				
			})



		// 1.2 Render vista "Prestamos" > "En Revisión"
			var tabla_2 = document.getElementById('tabla-pres-rev');

			var ourRequest_2 = new XMLHttpRequest();
			ourRequest_2.open('GET', 'prestamos_revision.json');
			ourRequest_2.onload = function(){
				var ourData = JSON.parse(ourRequest_2.responseText);
				renderHTML_2(ourData);
			};

			ourRequest_2.send();

			function renderHTML_2(data){

				var cadena = "";
			   
				for (var i = 0; i < data.length; i++) {
					
					cadena+= "<tr class='fila' ><td>" + data[i].nombre + " " + data[i].apellido + "</td><td>" + data[i].monto + "</td><td><button type='button' class='btn_spec btn-primary' data-toggle='modal' data-target='#exampleModal2' data-1=" + data[i].monto + " data-2=" + data[i].plazo + " data-3=" + data[i].interes + " data-4=" + data[i].costo_adm + " data-5=" + data[i].monto_dev + " data-6=" + data[i].cuenta + " data-7=" + data[i].cbu + " data-8=" + data[i].nombre + " data-9=" + data[i].apellido + " data-10=" + data[i].dni + " data-11=" + data[i].domicilio + " data-12=" + data[i].telefono + " data-13=" + data[i].sexo + " data-14=" + data[i].correo + " data-15=" + data[i].fecha_nac + " data-16=" + data[i].salario + " data-17=" + data[i].id_usr + " style='padding: 0,4 1,1;'>Ver Ficha</button></td><td>" + data[i].fecha_prestamo + "</td></tr>";
 
				}
				
				tabla_2.insertAdjacentHTML('beforeend', cadena);
				
				var numberOfItems = $('#tabla-pres-rev .fila').length;
				var limitPerPage = 4
				$("#tabla-pres-rev .fila:gt(" + (limitPerPage - 1) + ")").hide()
				var totalPages = Math.ceil(numberOfItems / limitPerPage);
				$('.pag-2').append("<li class='current-page page-item active'><a class='page-link' href='javascript:void(0)'>" + 1 + "</a></li>")

				for(var i = 2; i <= totalPages; i++){
					$('.pag-2').append("<li class='current-page page-item'><a class='page-link' href='javascript:void(0)'>" + i + "</a></li>");
				}


				$('.pag-2').append("<li class='page-item' id='next-page'><a class='page-link' href='javascript:void(0)'>Next</a></li>");
				
				$(".pag-2 li.current-page").on("click", function(){
					if($(this).hasClass("active")){
						return false;
					}else{
						var currentPage = $(this).index();
						$(".pag-2 li").removeClass("active");
						$(this).addClass("active");
						$("#tabla-pres-rev .fila").hide();
						var grandTotal = limitPerPage * currentPage;
						for(var i = grandTotal - limitPerPage; i < grandTotal; i++){
							$("#tabla-pres-rev .fila:eq(" + i + ")").show();
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
						$("#tabla-pres-rev .fila").hide();
						var grandTotal = limitPerPage * currentPage;
						for(var i = grandTotal - limitPerPage; i < grandTotal; i++){
							$("#tabla-pres-rev .fila:eq(" + i + ")").show();
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
						$("#tabla-pres-rev .fila").hide();
						var grandTotal = limitPerPage * currentPage;
						for(var i = grandTotal - limitPerPage; i < grandTotal; i++){
							$("#tabla-pres-rev .fila:eq(" + i + ")").show();
						}
						$(".pag-2 li.current-page:eq(" + (currentPage - 1) + ")").addClass('active');
					}
				});
   
			}

		// 1.2 Render Tabla "Prestamos" > "En Revisión"	

			$('#exampleModal2').on('show.bs.modal', function (event) {
				var button = $(event.relatedTarget)
				var modal = $(this)
				var recipient = [];
    			for (var i = 1; i <= 16; ++i) {
        			recipient[i] = button.data("" + i + "")
					modal.find(".td" + i ).text(recipient[i])
    			}
				$("#revision-rechazar-i").val(button.data("17"));
				$("#revision-aprobar-i").val(button.data("17"));
				$("#rev-banear-i").val(button.data("17"));
				$("#rev-eliminar-i").val(button.data("17"));
			})



		// 1.3 Render vista "Prestamos" > "Aprobados"

			var tabla_3 = document.getElementById('tabla-pres-apr');

			var ourRequest_3 = new XMLHttpRequest();
			ourRequest_3.open('GET', 'prestamos_aprobados.json');
			ourRequest_3.onload = function(){
				var ourData = JSON.parse(ourRequest_3.responseText);
				renderHTML_3(ourData);
			};

			ourRequest_3.send();

			function renderHTML_3(data){

				var cadena = "";
			   
				for (var i = 0; i < data.length; i++) {
					
					cadena+= "<tr class='fila' ><td>" + data[i].nombre + " " + data[i].apellido + "</td><td>" + data[i].monto + "</td><td><button type='button' class='btn_spec btn-primary' data-toggle='modal' data-target='#exampleModal3' data-1=" + data[i].monto + " data-2=" + data[i].plazo + " data-3=" + data[i].interes + " data-4=" + data[i].costo_adm + " data-5=" + data[i].monto_dev + " data-6=" + data[i].cuenta + " data-7=" + data[i].cbu + " data-8=" + data[i].nombre + " data-9=" + data[i].apellido + " data-10=" + data[i].dni + " data-11=" + data[i].domicilio + " data-12=" + data[i].telefono + " data-13=" + data[i].sexo + " data-14=" + data[i].correo + " data-15=" + data[i].fecha_nac + " data-16=" + data[i].salario + " data-17=" + data[i].id_usr + " style='padding: 0,4 1,1;'>Ver Ficha</button></td><td>" + data[i].fecha_prestamo + "</td></tr>";
 
				}
				
				tabla_3.insertAdjacentHTML('beforeend', cadena);
				
				var numberOfItems = $('#tabla-pres-apr .fila').length;
				var limitPerPage = 4
				$("#tabla-pres-apr .fila:gt(" + (limitPerPage - 1) + ")").hide()
				var totalPages = Math.ceil(numberOfItems / limitPerPage);
				$('.pag-3').append("<li class='current-page page-item active'><a class='page-link' href='javascript:void(0)'>" + 1 + "</a></li>")

				for(var i = 2; i <= totalPages; i++){
					$('.pag-3').append("<li class='current-page page-item'><a class='page-link' href='javascript:void(0)'>" + i + "</a></li>");
				}


				$('.pag-3').append("<li class='page-item' id='next-page'><a class='page-link' href='javascript:void(0)'>Next</a></li>");
				
				$(".pag-3 li.current-page").on("click", function(){
					if($(this).hasClass("active")){
						return false;
					}else{
						var currentPage = $(this).index();
						$(".pag-3 li").removeClass("active");
						$(this).addClass("active");
						$("#tabla-pres-apr .fila").hide();
						var grandTotal = limitPerPage * currentPage;
						for(var i = grandTotal - limitPerPage; i < grandTotal; i++){
							$("#tabla-pres-apr .fila:eq(" + i + ")").show();
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
						$("#tabla-pres-apr .fila").hide();
						var grandTotal = limitPerPage * currentPage;
						for(var i = grandTotal - limitPerPage; i < grandTotal; i++){
							$("#tabla-pres-apr .fila:eq(" + i + ")").show();
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
						$("#tabla-pres-apr .fila").hide();
						var grandTotal = limitPerPage * currentPage;
						for(var i = grandTotal - limitPerPage; i < grandTotal; i++){
							$("#tabla-pres-apr .fila:eq(" + i + ")").show();
						}
						$(".pag-3 li.current-page:eq(" + (currentPage - 1) + ")").addClass('active');
					}
				});
   
			}

		// 1.3 Render Tabla "Prestamos" > "Aprobados"	

			$('#exampleModal3').on('show.bs.modal', function (event) {
				var button = $(event.relatedTarget)
				var modal = $(this)
				var recipient = [];
    			for (var i = 1; i <= 16; ++i) {
        			recipient[i] = button.data("" + i + "")
					modal.find(".td" + i ).text(recipient[i])
    			}
				$("#aprobar-rechazar-i").val(button.data("17"));
				$("#ap-banear-i").val(button.data("17"));
				$("#ap-eliminar-i").val(button.data("17"));
			})


		// 1.4 Render vista "Prestamos" > "Rechazados"
			var tabla_4 = document.getElementById('tabla-pres-rech');

			var ourRequest_4 = new XMLHttpRequest();
			ourRequest_4.open('GET', 'prestamos_rechazados.json');
			ourRequest_4.onload = function(){
				var ourData = JSON.parse(ourRequest_4.responseText);
				renderHTML_4(ourData);
			};

			ourRequest_4.send();

			function renderHTML_4(data){

				var cadena = "";
			   
				for (var i = 0; i < data.length; i++) {
					
					cadena+= "<tr class='fila' ><td>" + data[i].nombre + " " + data[i].apellido + "</td><td>" + data[i].monto + "</td><td><button type='button' class='btn_spec btn-primary' data-toggle='modal' data-target='#exampleModal4' data-1=" + data[i].monto + " data-2=" + data[i].plazo + " data-3=" + data[i].interes + " data-4=" + data[i].costo_adm + " data-5=" + data[i].monto_dev + " data-6=" + data[i].cuenta + " data-7=" + data[i].cbu + " data-8=" + data[i].nombre + " data-9=" + data[i].apellido + " data-10=" + data[i].dni + " data-11=" + data[i].domicilio + " data-12=" + data[i].telefono + " data-13=" + data[i].sexo + " data-14=" + data[i].correo + " data-15=" + data[i].fecha_nac + " data-16=" + data[i].salario + " data-17=" + data[i].id_usr + " style='padding: 0,4 1,1;'>Ver Ficha</button></td><td>" + data[i].fecha_prestamo + "</td></tr>";
 
				}
				
				tabla_4.insertAdjacentHTML('beforeend', cadena);
				
				var numberOfItems = $('#tabla-pres-rech .fila').length;
				var limitPerPage = 4
				$("#tabla-pres-rech .fila:gt(" + (limitPerPage - 1) + ")").hide()
				var totalPages = Math.ceil(numberOfItems / limitPerPage);
				$('.pag-4').append("<li class='current-page page-item active'><a class='page-link' href='javascript:void(0)'>" + 1 + "</a></li>")

				for(var i = 2; i <= totalPages; i++){
					$('.pag-4').append("<li class='current-page page-item'><a class='page-link' href='javascript:void(0)'>" + i + "</a></li>");
				}


				$('.pag-4').append("<li class='page-item' id='next-page'><a class='page-link' href='javascript:void(0)'>Next</a></li>");
				
				$(".pag-4 li.current-page").on("click", function(){
					if($(this).hasClass("active")){
						return false;
					}else{
						var currentPage = $(this).index();
						$(".pag-4 li").removeClass("active");
						$(this).addClass("active");
						$("#tabla-pres-rech .fila").hide();
						var grandTotal = limitPerPage * currentPage;
						for(var i = grandTotal - limitPerPage; i < grandTotal; i++){
							$("#tabla-pres-rech .fila:eq(" + i + ")").show();
						}
					}
				});

				$("li#next-page").on("click", function(){
					var currentPage = $(".pag-4 li.active").index();
					if(currentPage === totalPages){
						return false;
					} else {
						currentPage++;
						$(".pag-4 li").removeClass("active");
						$("#tabla-pres-rech .fila").hide();
						var grandTotal = limitPerPage * currentPage;
						for(var i = grandTotal - limitPerPage; i < grandTotal; i++){
							$("#tabla-pres-rech .fila:eq(" + i + ")").show();
						}
						$(".pag-4 li.current-page:eq(" + (currentPage - 1) + ")").addClass('active');
					}
				});

				$("li#previous-page").on("click", function(){
					var currentPage = $(".pag-4 li.active").index();
					if(currentPage === 1){
						return false;
					} else {
						currentPage--;
						$(".pag-4 li").removeClass("active");
						$("#tabla-pres-rech .fila").hide();
						var grandTotal = limitPerPage * currentPage;
						for(var i = grandTotal - limitPerPage; i < grandTotal; i++){
							$("#tabla-pres-rech .fila:eq(" + i + ")").show();
						}
						$(".pag-4 li.current-page:eq(" + (currentPage - 1) + ")").addClass('active');
					}
				});
   
			}

		// 1.4 Render Tabla "Prestamos" > "Rechazados"	

			$('#exampleModal4').on('show.bs.modal', function (event) {
				var button = $(event.relatedTarget)
				var modal = $(this)
				var recipient = [];
    			for (var i = 1; i <= 16; ++i) {
        			recipient[i] = button.data("" + i + "")
					modal.find(".td" + i ).text(recipient[i])
    			}
				$("#rechazar-revision-i").val(button.data("17"));
				$("#rec-banear-i").val(button.data("17"));
				$("#rec-eliminar-i").val(button.data("17"));
			})


		// 2.1 Render vista "Usuarios" > "Activos"

			var tabla_5 = document.getElementById('tabla-us-activos');

			var ourRequest_5 = new XMLHttpRequest();
			ourRequest_5.open('GET', 'usuarios_activos.json');
			ourRequest_5.onload = function(){
				var ourData = JSON.parse(ourRequest_5.responseText);
				renderHTML_5(ourData);
			};

			ourRequest_5.send();

			function renderHTML_5(data){

				var cadena = "";
			
				for (var i = 0; i < data.length; i++) {
					
					cadena += "<tr class='fila'><td>" + data[i].nombre + " " + data[i].apellido + "</td><td>" + data[i].correo + "</td><td><button type='button' class='btn_spec btn-primary' data-toggle='modal' data-target='#exampleModal5' data-1=" + data[i].nombre + " data-2=" + data[i].apellido + " data-3=" + data[i].dni + " data-4=" + data[i].direccion + " data-5=" + data[i].telefono + " data-6=" + data[i].sexo + " data-7=" + data[i].correo + " data-8=" + data[i].fecha_nac + " data-9=" + data[i].salario + "  data-10=" + data[i].id_usr + " style='padding: 0,4 1,1;'>Ver Ficha</button></td><td>" + data[i].fecha_registro + "</td></tr>";
					
				}
				
				tabla_5.insertAdjacentHTML('beforeend', cadena);

				var numberOfItems = $('#tabla-us-activos .fila').length;
				var limitPerPage = 3
				$("#tabla-us-activos .fila:gt(" + (limitPerPage - 1) + ")").hide()
				var totalPages = Math.ceil(numberOfItems / limitPerPage);
				$('.pag-5').append("<li class='current-page page-item active'><a class='page-link' href='javascript:void(0)'>" + 1 + "</a></li>")

				for(var i = 2; i <= totalPages; i++){
					$('.pag-5').append("<li class='current-page page-item'><a class='page-link' href='javascript:void(0)'>" + i + "</a></li>");
				}


				$('.pag-5').append("<li class='page-item' id='next-page'><a class='page-link' href='javascript:void(0)'>Next</a></li>");
				
				$(".pag-5 li.current-page").on("click", function(){
					if($(this).hasClass("active")){
						return false;
					}else{
						var currentPage = $(this).index();
						$(".pag-5 li").removeClass("active");
						$(this).addClass("active");
						$("#tabla-us-activos .fila").hide();
						var grandTotal = limitPerPage * currentPage;
						for(var i = grandTotal - limitPerPage; i < grandTotal; i++){
							$("#tabla-us-activos .fila:eq(" + i + ")").show();
						}
					}
				});

				$("li#next-page").on("click", function(){
					var currentPage = $(".pag-5 li.active").index();
					if(currentPage === totalPages){
						return false;
					} else {
						currentPage++;
						$(".pag-5 li").removeClass("active");
						$("#tabla-us-activos .fila").hide();
						var grandTotal = limitPerPage * currentPage;
						for(var i = grandTotal - limitPerPage; i < grandTotal; i++){
							$("#tabla-us-activos .fila:eq(" + i + ")").show();
						}
						$(".pag-5 li.current-page:eq(" + (currentPage - 1) + ")").addClass('active');
					}
				});

				$("li#previous-page").on("click", function(){
					var currentPage = $(".pag-5 li.active").index();
					if(currentPage === 1){
						return false;
					} else {
						currentPage--;
						$(".pag-5 li").removeClass("active");
						$("#tabla-us-activos .fila").hide();
						var grandTotal = limitPerPage * currentPage;
						for(var i = grandTotal - limitPerPage; i < grandTotal; i++){
							$("#tabla-us-activos .fila:eq(" + i + ")").show();
						}
						$(".pag-5 li.current-page:eq(" + (currentPage - 1) + ")").addClass('active');
					}
				});
			}

		// 2.1 Render Tabla "Usuarios" > "Todos"	

			$('#exampleModal5').on('show.bs.modal', function (event) {
				var button = $(event.relatedTarget)
				var modal = $(this)
				var recipient = [];
    			for (var i = 1; i <= 9; ++i) {
        			recipient[i] = button.data("" + i + "")
					modal.find(".td" + i ).text(recipient[i])
    			}
				$("#ustod-banear-i").val(button.data("10"));
				$("#ustod-eliminar-i").val(button.data("10"));
			})




		// 2.2 Render vista "Usuarios" > "Baneados"
			var tabla_6 = document.getElementById('tabla-baneados');

			var ourRequest_6 = new XMLHttpRequest();
			ourRequest_6.open('GET', 'usuarios_baneados.json');
			ourRequest_6.onload = function(){
				var ourData = JSON.parse(ourRequest_6.responseText);
				renderHTML_6(ourData);
			};

			ourRequest_6.send();

			function renderHTML_6(data){

				var cadena = "";
			   
				for (var i = 0; i < data.length; i++) {
					
					cadena += "<tr class='fila'><td>" + data[i].nombre + " " + data[i].apellido + "</td><td>" + data[i].correo + "</td><td><button type='button' class='btn_spec btn-primary' data-toggle='modal' data-target='#exampleModal6' data-1=" + data[i].nombre + " data-2=" + data[i].apellido + " data-3=" + data[i].dni + " data-4=" + data[i].direccion + " data-5=" + data[i].telefono + " data-6=" + data[i].sexo + " data-7=" + data[i].correo + " data-8=" + data[i].fecha_nac + " data-9=" + data[i].salario + " data-10=" + data[i].id_usr + "  style='padding: 0,4 1,1;'>Ver Ficha</button></td><td>" + data[i].fecha_registro + "</td></tr>";
					
				}
				
				tabla_6.insertAdjacentHTML('beforeend', cadena);

				var numberOfItems = $('#tabla-baneados .fila').length;
				var limitPerPage = 3
				$("#tabla-baneados .fila:gt(" + (limitPerPage - 1) + ")").hide()
				var totalPages = Math.ceil(numberOfItems / limitPerPage);
				$('.pag-6').append("<li class='current-page page-item active'><a class='page-link' href='javascript:void(0)'>" + 1 + "</a></li>")

				for(var i = 2; i <= totalPages; i++){
					$('.pag-6').append("<li class='current-page page-item'><a class='page-link' href='javascript:void(0)'>" + i + "</a></li>");
				}


				$('.pag-6').append("<li class='page-item' id='next-page'><a class='page-link' href='javascript:void(0)'>Next</a></li>");
				
				$(".pag-6 li.current-page").on("click", function(){
					if($(this).hasClass("active")){
						return false;
					}else{
						var currentPage = $(this).index();
						$(".pag-6 li").removeClass("active");
						$(this).addClass("active");
						$("#tabla-baneados .fila").hide();
						var grandTotal = limitPerPage * currentPage;
						for(var i = grandTotal - limitPerPage; i < grandTotal; i++){
							$("#tabla-baneados .fila:eq(" + i + ")").show();
						}
					}
				});

				$("li#next-page").on("click", function(){
					var currentPage = $(".pag-6 li.active").index();
					if(currentPage === totalPages){
						return false;
					} else {
						currentPage++;
						$(".pag-6 li").removeClass("active");
						$("#tabla-baneados .fila").hide();
						var grandTotal = limitPerPage * currentPage;
						for(var i = grandTotal - limitPerPage; i < grandTotal; i++){
							$("#tabla-baneados .fila:eq(" + i + ")").show();
						}
						$(".pag-6 li.current-page:eq(" + (currentPage - 1) + ")").addClass('active');
					}
				});

				$("li#previous-page").on("click", function(){
					var currentPage = $(".pag-6 li.active").index();
					if(currentPage === 1){
						return false;
					} else {
						currentPage--;
						$(".pag-6 li").removeClass("active");
						$("#tabla-baneados .fila").hide();
						var grandTotal = limitPerPage * currentPage;
						for(var i = grandTotal - limitPerPage; i < grandTotal; i++){
							$("#tabla-baneados .fila:eq(" + i + ")").show();
						}
						$(".pag-6 li.current-page:eq(" + (currentPage - 1) + ")").addClass('active');
					}
				});
   
			}

		// 2.2 Render modal "Usuarios" > "Baneados"

			$('#exampleModal6').on('show.bs.modal', function (event) {
				var button = $(event.relatedTarget)
				var modal = $(this)
				var recipient = [];
    			for (var i = 1; i <= 9; ++i) {
        			recipient[i] = button.data("" + i + "")
					modal.find(".td" + i ).text(recipient[i])
    			}
				$("#usban-activo-i").val(button.data("10"));
				$("#usban-eliminar-i").val(button.data("10"));
			})



		// 2.2 Render vista "Bancos" > "Todos"
			var tabla_7 = document.getElementById('tabla-bancos');

			var ourRequest_7 = new XMLHttpRequest();
			ourRequest_7.open('GET', 'bancos.json');
			ourRequest_7.onload = function(){
				var ourData = JSON.parse(ourRequest_7.responseText);
				renderHTML_7(ourData);
			};

			ourRequest_7.send();

			function renderHTML_7(data){

				var cadena = "";
			   
				for (var i = 0; i < data.length; i++) {
					
					cadena += "<tr class='fila'><td>" + data[i].nombre + "</td><td>" + data[i].id_banco + "</td><td><button type='button' class='btn_spec btn-primary' data-toggle='modal' data-target='#exampleModal7' data-1='" + data[i].nombre + "' data-2='" + data[i].id_banco + "' data-3='" + data[i].telefono_1 + "' data-4='" + data[i].telefono_2 + "' data-5='" + data[i].notas + "'  data-6='" + data[i].nombre + "' data-7='" + data[i].direccion + "' data-8='" + data[i].telefono_1 + "' data-9='" + data[i].telefono_2 + "' data-10='" + data[i].email + "' data-11='" + data[i].notas + "' data-12='" + data[i].id_banco + "' style='padding: 0,4 1,1;'>Ver Ficha</button></td><td>" + data[i].telefono_1 + "</td></tr>";
					
				}
				
				tabla_7.insertAdjacentHTML('beforeend', cadena);

				var numberOfItems = $('#tabla-bancos .fila').length;
				var limitPerPage = 3
				$("#tabla-bancos .fila:gt(" + (limitPerPage - 1) + ")").hide()
				var totalPages = Math.ceil(numberOfItems / limitPerPage);
				$('.pag-7').append("<li class='current-page page-item active'><a class='page-link' href='javascript:void(0)'>" + 1 + "</a></li>")

				for(var i = 2; i <= totalPages; i++){
					$('.pag-7').append("<li class='current-page page-item'><a class='page-link' href='javascript:void(0)'>" + i + "</a></li>");
				}


				$('.pag-7').append("<li class='page-item' id='next-page'><a class='page-link' href='javascript:void(0)'>Next</a></li>");
				
				$(".pag-7 li.current-page").on("click", function(){
					if($(this).hasClass("active")){
						return false;
					}else{
						var currentPage = $(this).index();
						$(".pag-7 li").removeClass("active");
						$(this).addClass("active");
						$("#tabla-bancos .fila").hide();
						var grandTotal = limitPerPage * currentPage;
						for(var i = grandTotal - limitPerPage; i < grandTotal; i++){
							$("#tabla-bancos .fila:eq(" + i + ")").show();
						}
					}
				});

				$("li#next-page").on("click", function(){
					var currentPage = $(".pag-7 li.active").index();
					if(currentPage === totalPages){
						return false;
					} else {
						currentPage++;
						$(".pag-7 li").removeClass("active");
						$("#tabla-bancos .fila").hide();
						var grandTotal = limitPerPage * currentPage;
						for(var i = grandTotal - limitPerPage; i < grandTotal; i++){
							$("#tabla-bancos .fila:eq(" + i + ")").show();
						}
						$(".pag-7 li.current-page:eq(" + (currentPage - 1) + ")").addClass('active');
					}
				});

				$("li#previous-page").on("click", function(){
					var currentPage = $(".pag-7 li.active").index();
					if(currentPage === 1){
						return false;
					} else {
						currentPage--;
						$(".pag-7 li").removeClass("active");
						$("#tabla-bancos .fila").hide();
						var grandTotal = limitPerPage * currentPage;
						for(var i = grandTotal - limitPerPage; i < grandTotal; i++){
							$("#tabla-bancos .fila:eq(" + i + ")").show();
						}
						$(".pag-7 li.current-page:eq(" + (currentPage - 1) + ")").addClass('active');
					}
				});
   
			}

		// 3.1 Render modal "Bancos" > "Todos"

			$('#exampleModal7').on('show.bs.modal', function (event) {
				var button = $(event.relatedTarget)
				var modal = $(this)
				var recipient = [];
    			for (var i = 1; i <= 5; ++i) {
        			recipient[i] = button.data("" + i + "")
					modal.find(".td" + i ).text("" + recipient[i] + "")
    			}
				for (var i = 6; i <= 12; ++i) {
        			recipient[i] = button.data("" + i + "")
					modal.find(".ib" + i ).val("" + recipient[i]  + "")
					
    			}
			})

		



		// 4.2 Render vista "Historial" > "Admin"

			var tabla_8 = document.getElementById('tabla-hist-adm');

			var ourRequest_8 = new XMLHttpRequest();
			ourRequest_8.open('GET', 'hist-adm.json');
			ourRequest_8.onload = function(){
				var ourData = JSON.parse(ourRequest_8.responseText);
				renderHTML_8(ourData);
			};

			ourRequest_8.send();

			function renderHTML_8(data){

				var cadena = "";
			   
				for (var i = 0; i < data.length; i++) {
					
					cadena += "<tr class='fila'><td>Tipo: Administrador</td><td>" + data[i].evento + "</td><td>" + data[i].ip + "</td><td>" + data[i].fecha + "</td></tr>";
					
				}
				
				tabla_8.insertAdjacentHTML('beforeend', cadena);

				var numberOfItems = $('#tabla-hist-adm .fila').length;
				var limitPerPage = 3
				$("#tabla-hist-adm .fila:gt(" + (limitPerPage - 1) + ")").hide()
				var totalPages = Math.ceil(numberOfItems / limitPerPage);
				$('.pag-8').append("<li class='current-page page-item active'><a class='page-link' href='javascript:void(0)'>" + 1 + "</a></li>")

				for(var i = 2; i <= totalPages; i++){
					$('.pag-8').append("<li class='current-page page-item'><a class='page-link' href='javascript:void(0)'>" + i + "</a></li>");
				}


				$('.pag-8').append("<li class='page-item' id='next-page'><a class='page-link' href='javascript:void(0)'>Next</a></li>");
				
				$(".pag-8 li.current-page").on("click", function(){
					if($(this).hasClass("active")){
						return false;
					}else{
						var currentPage = $(this).index();
						$(".pag-8 li").removeClass("active");
						$(this).addClass("active");
						$("#tabla-hist-adm .fila").hide();
						var grandTotal = limitPerPage * currentPage;
						for(var i = grandTotal - limitPerPage; i < grandTotal; i++){
							$("#tabla-hist-adm .fila:eq(" + i + ")").show();
						}
					}
				});

				$("li#next-page").on("click", function(){
					var currentPage = $(".pag-8 li.active").index();
					if(currentPage === totalPages){
						return false;
					} else {
						currentPage++;
						$(".pag-8 li").removeClass("active");
						$("#tabla-hist-adm .fila").hide();
						var grandTotal = limitPerPage * currentPage;
						for(var i = grandTotal - limitPerPage; i < grandTotal; i++){
							$("#tabla-hist-adm .fila:eq(" + i + ")").show();
						}
						$(".pag-8 li.current-page:eq(" + (currentPage - 1) + ")").addClass('active');
					}
				});

				$("li#previous-page").on("click", function(){
					var currentPage = $(".pag-8 li.active").index();
					if(currentPage === 1){
						return false;
					} else {
						currentPage--;
						$(".pag-8 li").removeClass("active");
						$("#tabla-hist-adm .fila").hide();
						var grandTotal = limitPerPage * currentPage;
						for(var i = grandTotal - limitPerPage; i < grandTotal; i++){
							$("#tabla-hist-adm .fila:eq(" + i + ")").show();
						}
						$(".pag-8 li.current-page:eq(" + (currentPage - 1) + ")").addClass('active');
					}
				});
   
			}


		// 4.3 Render vista "Historial" > "User"

			var tabla_9 = document.getElementById('tabla-hist-usr');

			var ourRequest_9 = new XMLHttpRequest();
			ourRequest_9.open('GET', 'hist-usr.json');
			ourRequest_9.onload = function(){
				var ourData = JSON.parse(ourRequest_9.responseText);
				renderHTML_9(ourData);
			};

			ourRequest_9.send();

			function renderHTML_9(data){

				var cadena = "";
			   
				for (var i = 0; i < data.length; i++) {
					
					cadena += "<tr class='fila'><td>Tipo: Usuario</td><td>" + data[i].evento + "</td><td>" + data[i].ip + "</td><td>" + data[i].fecha + "</td></tr>";
					
				}
				
				tabla_9.insertAdjacentHTML('beforeend', cadena);

				var numberOfItems = $('#tabla-hist-usr .fila').length;
				var limitPerPage = 3
				$("#tabla-hist-usr .fila:gt(" + (limitPerPage - 1) + ")").hide()
				var totalPages = Math.ceil(numberOfItems / limitPerPage);
				$('.pag-9').append("<li class='current-page page-item active'><a class='page-link' href='javascript:void(0)'>" + 1 + "</a></li>")

				for(var i = 2; i <= totalPages; i++){
					$('.pag-9').append("<li class='current-page page-item'><a class='page-link' href='javascript:void(0)'>" + i + "</a></li>");
				}


				$('.pag-9').append("<li class='page-item' id='next-page'><a class='page-link' href='javascript:void(0)'>Next</a></li>");
				
				$(".pag-9 li.current-page").on("click", function(){
					if($(this).hasClass("active")){
						return false;
					}else{
						var currentPage = $(this).index();
						$(".pag-9 li").removeClass("active");
						$(this).addClass("active");
						$("#tabla-hist-usr .fila").hide();
						var grandTotal = limitPerPage * currentPage;
						for(var i = grandTotal - limitPerPage; i < grandTotal; i++){
							$("#tabla-hist-usr .fila:eq(" + i + ")").show();
						}
					}
				});

				$("li#next-page").on("click", function(){
					var currentPage = $(".pag-9 li.active").index();
					if(currentPage === totalPages){
						return false;
					} else {
						currentPage++;
						$(".pag-9 li").removeClass("active");
						$("#tabla-hist-usr .fila").hide();
						var grandTotal = limitPerPage * currentPage;
						for(var i = grandTotal - limitPerPage; i < grandTotal; i++){
							$("#tabla-hist-usr .fila:eq(" + i + ")").show();
						}
						$(".pag-9 li.current-page:eq(" + (currentPage - 1) + ")").addClass('active');
					}
				});

				$("li#previous-page").on("click", function(){
					var currentPage = $(".pag-9 li.active").index();
					if(currentPage === 1){
						return false;
					} else {
						currentPage--;
						$(".pag-9 li").removeClass("active");
						$("#tabla-hist-usr .fila").hide();
						var grandTotal = limitPerPage * currentPage;
						for(var i = grandTotal - limitPerPage; i < grandTotal; i++){
							$("#tabla-hist-usr .fila:eq(" + i + ")").show();
						}
						$(".pag-9 li.current-page:eq(" + (currentPage - 1) + ")").addClass('active');
					}
				});
   
			}
	</script>
</body>
</html>

