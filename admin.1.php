<?php
	/*
	session_start();
	require 'parametros_conexion.php';
	include 'funcs.php';

	if(!isset($_SESSION["id_usuario"])){ //Si no ha iniciado sesión redirecciona a index.php
		header("Location: index.php");
	}

	$idUsuario = $_SESSION['id_usuario'];
	
	$sql = "SELECT id_tipo FROM usuarios WHERE id = '$idUsuario'";

	$result = $mysqli->query($sql);

	$row = $result->fetch_assoc();

	if($row['id_tipo'] != 1){
		header("Location: panel_usuarios.php");
	} 

	
	$sql = "SELECT nombre, apellido, dni, direccion, telefono, sexo, correo, fecha_nac, salario FROM usuarios";

	$result = $mysqli->query($sql);

	$row = $result->fetch_assoc();

	echo $row['correo'];
	
	*/
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
		<a class="dropdown-item text-center" href="mi_cuenta.php">Panel de Usuario</a>
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
					<div class="row" style="max-height: inherit;" id="prestamos">
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
													<tbody id="1">
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
																			</div>
																		</div>
																	</div>

																	<div class="modal-footer">
																		<button type="button" class="btn btn-secondary" data-dismiss="modal">Banear Usuario</button>
																		<button type="button" class="btn btn-primary">Eliminar Usuario</button>
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
													<tbody id="2">
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
																			</div>
																		</div>
																	</div>

																	<div class="modal-footer">
																		<button type="button" class="btn btn-secondary" data-dismiss="modal">Banear Usuario</button>
																		<button type="button" class="btn btn-primary">Eliminar Usuario</button>
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
													<tbody id="3">
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
																			</div>
																		</div>
																	</div>

																	<div class="modal-footer">
																		<button type="button" class="btn btn-secondary" data-dismiss="modal">Banear Usuario</button>
																		<button type="button" class="btn btn-primary">Eliminar Usuario</button>
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
													<tbody id="4">
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
																				<button type="button" class="close" data-dismiss="modal" aria-label="Close" style="position: absolute; right: 15px;">
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
																			</div>
																		</div>
																	</div>

																	<div class="modal-footer">
																		<button type="button" class="btn btn-secondary" data-dismiss="modal">Banear Usuario</button>
																		<button type="button" class="btn btn-primary">Eliminar Usuario</button>
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
					<div class="row  d-none" style="max-height: inherit;" id="usuarios">
						<div class="col-sm-12 mt-1" >
							<div class="card">
								<div class="card-body text-center">

									<!------ Navegador Tabs (inicio) ----->
										<ul class="nav nav-pills mb-3 justify-content-center" id="pills-tab" role="tablist">
											<li class="nav-item">
												<a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-todos" role="tab" aria-controls="pills-home" aria-selected="true">Todos</a>

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
													<tbody id="tabla-us-todos">
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
																	<button type="button" class="btn btn-secondary" data-dismiss="modal">Banear Usuario</button>
																	<button type="button" class="btn btn-primary">Eliminar Usuario</button>
																</div>
															</div>
														</div>
													</div>

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

													<!------------- Modal (inicio) ----------------->
													<div class="modal fade" id="exampleModal6" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
														<div class="modal-dialog" role="document">
															<div class="modal-content">
															<nav>
																<div class="nav nav-tabs justify-content-center" id="nav-tab" role="tablist">
																	<a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Prestamo</a>
																	<a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Usuario</a>
																</div>
																</nav>
																<div class="tab-content" id="nav-tabContent">
																	<div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">...</div>
																	<div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">...</div>
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
					<div class="row  d-none" style="max-height: inherit;" id="bancos">
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
														<ul class="pagination justify-content-center">
															<li class="page-item">
															<a class="page-link" href="#" tabindex="-1">Previous</a>
															</li>
															<li class="page-item"><a class="page-link" href="#">1</a></li>
															<li class="page-item"><a class="page-link" href="#">2</a></li>
															<li class="page-item"><a class="page-link" href="#">3</a></li>
															<li class="page-item">
															<a class="page-link" href="#">Next</a>
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
														<tbody>
															
														</tbody>
													</table>

													<!-- Modal -->
													<div class="modal fade" id="exampleModal7" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
														<div class="modal-dialog" role="document">
															<div class="modal-content">
															<nav>
																<div class="nav nav-tabs justify-content-center" id="nav-tab" role="tablist">
																	<a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Prestamo</a>
																	<a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Usuario</a>
																</div>
																</nav>
																<div class="tab-content" id="nav-tabContent">
																<div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">...</div>
																<div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">...</div>
																</div>
															</div>
														</div>
													</div>

												</div>
											<!--- Primer Pill (fin) ---->
									

											<!-- Segunda Pill (inicio) -->
												<div class="tab-pane fade" id="pills-agregar" role="tabpanel" aria-labelledby="pills-profile-tab">
													<form class="text-center border border-light p-5" role="form" method="POST" action="<?php $_SERVER['PHP_SELF'] ?>" autocomplete="off">

														<input type="text" id="usuario" name="usuario" class="form-control mb-4" placeholder="Usuario">

														<input type="text" id="usuario" name="usuario" class="form-control mb-4" placeholder="Usuario">

														<input type="text" id="usuario" name="usuario" class="form-control mb-4" placeholder="Usuario">

														<input type="text" id="usuario" name="usuario" class="form-control mb-4" placeholder="Usuario">

														<div class="form-group">
															<textarea class="form-control rounded-0" id="exampleFormControlTextarea2" rows="3"></textarea>
														</div>
														<button class="btn btn-info my-4 btn-block purple-gradient" type="submit">Agregar Banco</button>
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
					<div class="row  d-none" style="max-height: inherit;" id="historial">
						<div class="col-sm-12 mt-1" >
							<div class="card">
								<div class="card-body text-center">

									<!------ Navegador Tabs (inicio) ---->
										<ul class="nav nav-pills mb-3 justify-content-center" id="pills-tab" role="tablist">
											<li class="nav-item">
												<a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-administracion" role="tab" aria-controls="pills-home" aria-selected="true">Administración</a>
											</li>
											<li class="nav-item">
												<a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-usuarios" role="tab" aria-controls="pills-profile" aria-selected="false">Usuarios</a>
											</li>
										</ul>
									<!------ Navegador Tabs (fin) ------->

									<!------ Contenido Tab (inicio)------>
										<div class="tab-content pt-2 pl-1" id="pills-tabContent">

											<!-- Primer Pill (inicio) -->
												<div class="tab-pane fade show active" id="pills-administracion" role="tabpanel" aria-labelledby="pills-home-tab">

													<nav aria-label="Page navigation example">
														<ul class="pagination justify-content-center">
															<li class="page-item">
															<a class="page-link" href="#" tabindex="-1">Previous</a>
															</li>
															<li class="page-item"><a class="page-link" href="#">1</a></li>
															<li class="page-item"><a class="page-link" href="#">2</a></li>
															<li class="page-item"><a class="page-link" href="#">3</a></li>
															<li class="page-item">
															<a class="page-link" href="#">Next</a>
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
													<tbody>
													
													</tbody>
													</table>

													<!-- Modal -->
													<div class="modal fade" id="exampleModal8" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
														<div class="modal-dialog" role="document">
															<div class="modal-content">
															<nav>
																<div class="nav nav-tabs justify-content-center" id="nav-tab" role="tablist">
																	<a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Prestamo</a>
																	<a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Usuario</a>
																</div>
																</nav>
																<div class="tab-content" id="nav-tabContent">
																<div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">...</div>
																<div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">...</div>
																</div>
															</div>
														</div>
													</div>
												

												</div>
											<!-- Primer Pill (fin) -->
									
											<!-- Segunda Pill (inicio) -->
												<div class="tab-pane fade" id="pills-usuarios" role="tabpanel" aria-labelledby="pills-profile-tab">

													<nav aria-label="Page navigation example">
														<ul class="pagination justify-content-center">
															<li class="page-item">
															<a class="page-link" href="#" tabindex="-1">Previous</a>
															</li>
															<li class="page-item"><a class="page-link" href="#">1</a></li>
															<li class="page-item"><a class="page-link" href="#">2</a></li>
															<li class="page-item"><a class="page-link" href="#">3</a></li>
															<li class="page-item">
															<a class="page-link" href="#">Next</a>
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
														<tbody>
														
														</tbody>
													</table>

													<!-- Modal -->
													<div class="modal fade" id="exampleModal9" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
														<div class="modal-dialog" role="document">
															<div class="modal-content">
															<nav>
																<div class="nav nav-tabs justify-content-center" id="nav-tab" role="tablist">
																	<a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Prestamo</a>
																	<a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Usuario</a>
																</div>
																</nav>
																<div class="tab-content" id="nav-tabContent">
																<div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">...</div>
																<div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">...</div>
																</div>
															</div>
														</div>
													</div>


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
													<form class="border border-light p-5" role="form" method="POST" action="<?php $_SERVER['PHP_SELF'] ?>" autocomplete="off">
														<label for="exampleForm1">Interés:</label>
														<input type="text" id="exampleForm1" class="form-control">
														<br/>
														<label for="exampleForm2">Costos Administrativos:</label>
														<input type="text" id="exampleForm2" class="form-control">
														<br/>
														<div class="form-group">
															<label for="exampleFormControlTextarea2">Agregar Nota:</label>
															<textarea class="form-control rounded-0" id="exampleFormControlTextarea2" rows="3"></textarea>
														</div>
														<button class="btn btn-info my-4 btn-block purple-gradient" type="submit">Guardar Cambios</button>
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

			for(var i = 1; i <=4 ;i++){
			
				var tabla = document.getElementById("" + i + "");
				
				var ourRequest_1 = new XMLHttpRequest();
				ourRequest_1.open('GET', 'prestamos_pendientes.json');
				ourRequest_1.onload = function(){
				var ourData_1 = JSON.parse(ourRequest_1.responseText);
				renderHTML_1(ourData_1);
			};

			ourRequest_1.send();

			function renderHTML_1(data){



					var cadena  = "";
				
					for (var q = 0; q < data.length; q++) {
						
						cadena += "<tr class='fila' ><td>" + data[q].nombre + " " + data[q].apellido + "</td><td>" + data[q].monto + "</td><td><button type='button' class='btn_spec btn-primary' data-toggle='modal' data-target='#exampleModal1' data-1=" + data[q].monto + " data-2=" + data[q].plazo + " data-3=" + data[q].interes + " data-4=" + data[q].costo_adm + " data-5=" + data[q].monto_dev + " data-6=" + data[q].cuenta + " data-7=" + data[q].cbu + " data-8=" + data[q].nombre + " data-9=" + data[q].apellido + " data-10=" + data[q].dni + " data-11=" + data[q].domicilio + " data-12=" + data[q].telefono + " data-13=" + data[q].sexo + " data-14=" + data[q].correo + " data-15=" + data[q].fecha_nac + " data-16=" + data[q].salario + " style='padding: 0,4 1,1;'>Ver Ficha</button></td><td>" + data[q].fecha_prestamo + "</td></tr>";
	
					}
					
					tabla.insertAdjacentHTML('beforeend', cadena );
					
					var numberOfItems = $("#" + i + " .fila").length;
					var limitPerPage = 4
					$("#" + i + " .fila:gt(" + (limitPerPage - 1) + ")").hide()
					var totalPages = Math.round(numberOfItems / limitPerPage);
					$(".pag-" + i).append("<li class='current-page page-item active'><a class='page-link' href='javascript:void(0)'>" + 1 + "</a></li>")

					for(var i = 2; i <= totalPages; i++){
						$(".pag-" + i).append("<li class='current-page page-item'><a class='page-link' href='javascript:void(0)'>" + i + "</a></li>");
					}


					$(".pag-" + i).append("<li class='page-item' id='next-page'><a class='page-link' href='javascript:void(0)'>Next</a></li>");
					
					$(".pag-" + i + " li.current-page").on("click", function(){
						if($(this).hasClass("active")){
							return false;
						}else{
							var currentPage = $(this).index();
							$(".pag-" + i + " li").removeClass("active");
							$(this).addClass("active");
							$("#" + i + " .fila").hide();
							var grandTotal = limitPerPage * currentPage;
							for(var i = grandTotal - limitPerPage; i < grandTotal; i++){
								$("#" + i + " .fila:eq(" + i + ")").show();
							}
						}
					});

					$("li#next-page").on("click", function(){
						var currentPage = $(".pag-" + i + " li.active").index();
						if(currentPage === totalPages){
							return false;
						} else {
							currentPage++;
							$(".pag-" + i + " li").removeClass("active");
							$("#" + i + " .fila").hide();
							var grandTotal = limitPerPage * currentPage;
							for(var i = grandTotal - limitPerPage; i < grandTotal; i++){
								$("#" + i + " .fila:eq(" + i + ")").show();
							}
							$(".pag-" + i + " li.current-page:eq(" + (currentPage - 1) + ")").addClass('active');
						}
					});

					$("li#previous-page").on("click", function(){
						var currentPage = $(".pag-" + i + " li.active").index();
						if(currentPage === 1){
							return false;
						} else {
							currentPage--;
							$(".pag-" + i + " li").removeClass("active");
							$("#" + i + " .fila").hide();
							var grandTotal = limitPerPage * currentPage;
							for(var i = grandTotal - limitPerPage; i < grandTotal; i++){
								$("#" + i + " .fila:eq(" + i + ")").show();
							}
							$(".pag-" + i + " li.current-page:eq(" + (currentPage - 1) + ")").addClass('active');
						}
					});
	
				}
				
			}


			

		// 1.1 Render Tabla "Prestamos" > "Pendientes"	

			$('#exampleModal1').on('show.bs.modal', function (event) {
				var button = $(event.relatedTarget)
				var recipient = [];
    			for (var i = 1; i <= 16; ++i) {
        			recipient[i] = button.data("" + i + "")
    			}
				var modal = $(this)
				for (var i = 1; i <= 16; ++i) {
					modal.find(".td" + i ).text(recipient[i])
				}
			})

		/* 1.2 Render vista "Prestamos" > "En Revisión"
			var tabla_2 = document.getElementById('tabla-pres-rev');

			var ourRequest_2 = new XMLHttpRequest();
			ourRequest_2.open('GET', 'prestamos_revision.json');
			ourRequest_2.onload = function(){
				var ourData_2 = JSON.parse(ourRequest_2.responseText);
				renderHTML_2(ourData_2);
			};

			ourRequest_2.send();

			function renderHTML_2(data){

				var cadena_2 = "";
			   
				for (var i = 0; i < data.length; i++) {
					
					cadena_2+= "<tr class='fila' ><td>" + data[i].nombre + " " + data[i].apellido + "</td><td>" + data[i].monto + "</td><td><button type='button' class='btn_spec btn-primary' data-toggle='modal' data-target='#exampleModal2' data-1=" + data[i].monto + " data-2=" + data[i].plazo + " data-3=" + data[i].interes + " data-4=" + data[i].costo_adm + " data-5=" + data[i].monto_dev + " data-6=" + data[i].cuenta + " data-7=" + data[i].cbu + " data-8=" + data[i].nombre + " data-9=" + data[i].apellido + " data-10=" + data[i].dni + " data-11=" + data[i].domicilio + " data-12=" + data[i].telefono + " data-13=" + data[i].sexo + " data-14=" + data[i].correo + " data-15=" + data[i].fecha_nac + " data-16=" + data[i].salario + " style='padding: 0,4 1,1;'>Ver Ficha</button></td><td>" + data[i].fecha_prestamo + "</td></tr>";
 
				}
				
				tabla_2.insertAdjacentHTML('beforeend', cadena_2);
				
				var numberOfItems = $('#tabla-pres-rev .fila').length;
				var limitPerPage = 4
				$("#tabla-pres-rev .fila:gt(" + (limitPerPage - 1) + ")").hide()
				var totalPages = Math.round(numberOfItems / limitPerPage);
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
			var button = $(event.relatedTarget) // Button that triggered the modal
			var recipient1 = button.data('1')
			var recipient2 = button.data('2')
			var recipient3 = button.data('3')
			var recipient4 = button.data('4')
			var recipient5 = button.data('5')
			var recipient6 = button.data('6')
			var recipient7 = button.data('7')
			var recipient8 = button.data('8')
			var recipient9 = button.data('9')
			var recipient10 = button.data('10')
			var recipient11 = button.data('11')
			var recipient12 = button.data('12')
			var recipient13 = button.data('13')
			var recipient14 = button.data('14')
			var recipient15 = button.data('15')
			var recipient16 = button.data('16')
			
			// Extract info from data-* attributes
			// If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
			// Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
			var modal = $(this)
			modal.find('.td1').text(recipient1)
			modal.find('.td2').text(recipient2)
			modal.find('.td3').text(recipient3)
			modal.find('.td4').text(recipient4)
			modal.find('.td5').text(recipient5)
			modal.find('.td6').text(recipient6)
			modal.find('.td7').text(recipient7)
			modal.find('.td8').text(recipient8)
			modal.find('.td9').text(recipient9)
			modal.find('.td10').text(recipient10)
			modal.find('.td11').text(recipient11)
			modal.find('.td12').text(recipient12)
			modal.find('.td13').text(recipient13)
			modal.find('.td14').text(recipient14)
			modal.find('.td15').text(recipient15)
			modal.find('.td16').text(recipient16)

		})








		// 1.3 Render vista "Prestamos" > "Aprobados"
			var tabla_3 = document.getElementById('tabla-pres-apr');

			var ourRequest_3 = new XMLHttpRequest();
			ourRequest_3.open('GET', 'prestamos_aprobados.json');
			ourRequest_3.onload = function(){
				var ourData_3 = JSON.parse(ourRequest_3.responseText);
				renderHTML_3(ourData_3);
			};

			ourRequest_3.send();

			function renderHTML_3(data){

				var cadena_3 = "";
			   
				for (var i = 0; i < data.length; i++) {
					
					cadena_3+= "<tr class='fila' ><td>" + data[i].nombre + " " + data[i].apellido + "</td><td>" + data[i].monto + "</td><td><button type='button' class='btn_spec btn-primary' data-toggle='modal' data-target='#exampleModal3' data-1=" + data[i].monto + " data-2=" + data[i].plazo + " data-3=" + data[i].interes + " data-4=" + data[i].costo_adm + " data-5=" + data[i].monto_dev + " data-6=" + data[i].cuenta + " data-7=" + data[i].cbu + " data-8=" + data[i].nombre + " data-9=" + data[i].apellido + " data-10=" + data[i].dni + " data-11=" + data[i].domicilio + " data-12=" + data[i].telefono + " data-13=" + data[i].sexo + " data-14=" + data[i].correo + " data-15=" + data[i].fecha_nac + " data-16=" + data[i].salario + " style='padding: 0,4 1,1;'>Ver Ficha</button></td><td>" + data[i].fecha_prestamo + "</td></tr>";
 
				}
				
				tabla_3.insertAdjacentHTML('beforeend', cadena_3);
				
				var numberOfItems = $('#tabla-pres-apr .fila').length;
				var limitPerPage = 4
				$("#tabla-pres-apr .fila:gt(" + (limitPerPage - 1) + ")").hide()
				var totalPages = Math.round(numberOfItems / limitPerPage);
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

		// 1.2 Render Tabla "Prestamos" > "En Revisión"	

			$('#exampleModal3').on('show.bs.modal', function (event) {
			var button = $(event.relatedTarget) // Button that triggered the modal
			var recipient1 = button.data('1')
			var recipient2 = button.data('2')
			var recipient3 = button.data('3')
			var recipient4 = button.data('4')
			var recipient5 = button.data('5')
			var recipient6 = button.data('6')
			var recipient7 = button.data('7')
			var recipient8 = button.data('8')
			var recipient9 = button.data('9')
			var recipient10 = button.data('10')
			var recipient11 = button.data('11')
			var recipient12 = button.data('12')
			var recipient13 = button.data('13')
			var recipient14 = button.data('14')
			var recipient15 = button.data('15')
			var recipient16 = button.data('16')
			
			// Extract info from data-* attributes
			// If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
			// Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
			var modal = $(this)
			modal.find('.td1').text(recipient1)
			modal.find('.td2').text(recipient2)
			modal.find('.td3').text(recipient3)
			modal.find('.td4').text(recipient4)
			modal.find('.td5').text(recipient5)
			modal.find('.td6').text(recipient6)
			modal.find('.td7').text(recipient7)
			modal.find('.td8').text(recipient8)
			modal.find('.td9').text(recipient9)
			modal.find('.td10').text(recipient10)
			modal.find('.td11').text(recipient11)
			modal.find('.td12').text(recipient12)
			modal.find('.td13').text(recipient13)
			modal.find('.td14').text(recipient14)
			modal.find('.td15').text(recipient15)
			modal.find('.td16').text(recipient16)

		})







		// 1.4 Render vista "Prestamos" > "Rechazados"
			var tabla_4 = document.getElementById('tabla-pres-rech');

			var ourRequest_4 = new XMLHttpRequest();
			ourRequest_4.open('GET', 'prestamos_rechazados.json');
			ourRequest_4.onload = function(){
				var ourData_4 = JSON.parse(ourRequest_4.responseText);
				renderHTML_4(ourData_4);
			};

			ourRequest_4.send();

			function renderHTML_4(data){

				var cadena_4 = "";
			   
				for (var i = 0; i < data.length; i++) {
					
					cadena_4+= "<tr class='fila' ><td>" + data[i].nombre + " " + data[i].apellido + "</td><td>" + data[i].monto + "</td><td><button type='button' class='btn_spec btn-primary' data-toggle='modal' data-target='#exampleModal4' data-1=" + data[i].monto + " data-2=" + data[i].plazo + " data-3=" + data[i].interes + " data-4=" + data[i].costo_adm + " data-5=" + data[i].monto_dev + " data-6=" + data[i].cuenta + " data-7=" + data[i].cbu + " data-8=" + data[i].nombre + " data-9=" + data[i].apellido + " data-10=" + data[i].dni + " data-11=" + data[i].domicilio + " data-12=" + data[i].telefono + " data-13=" + data[i].sexo + " data-14=" + data[i].correo + " data-15=" + data[i].fecha_nac + " data-16=" + data[i].salario + " style='padding: 0,4 1,1;'>Ver Ficha</button></td><td>" + data[i].fecha_prestamo + "</td></tr>";
 
				}
				
				tabla_4.insertAdjacentHTML('beforeend', cadena_4);
				
				var numberOfItems = $('#tabla-pres-rech .fila').length;
				var limitPerPage = 4
				$("#tabla-pres-rech .fila:gt(" + (limitPerPage - 1) + ")").hide()
				var totalPages = Math.round(numberOfItems / limitPerPage);
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

		// 1.2 Render Tabla "Prestamos" > "En Revisión"	

			$('#exampleModal4').on('show.bs.modal', function (event) {
			var button = $(event.relatedTarget) // Button that triggered the modal
			var recipient1 = button.data('1')
			var recipient2 = button.data('2')
			var recipient3 = button.data('3')
			var recipient4 = button.data('4')
			var recipient5 = button.data('5')
			var recipient6 = button.data('6')
			var recipient7 = button.data('7')
			var recipient8 = button.data('8')
			var recipient9 = button.data('9')
			var recipient10 = button.data('10')
			var recipient11 = button.data('11')
			var recipient12 = button.data('12')
			var recipient13 = button.data('13')
			var recipient14 = button.data('14')
			var recipient15 = button.data('15')
			var recipient16 = button.data('16')
			
			// Extract info from data-* attributes
			// If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
			// Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
			var modal = $(this)
			modal.find('.td1').text(recipient1)
			modal.find('.td2').text(recipient2)
			modal.find('.td3').text(recipient3)
			modal.find('.td4').text(recipient4)
			modal.find('.td5').text(recipient5)
			modal.find('.td6').text(recipient6)
			modal.find('.td7').text(recipient7)
			modal.find('.td8').text(recipient8)
			modal.find('.td9').text(recipient9)
			modal.find('.td10').text(recipient10)
			modal.find('.td11').text(recipient11)
			modal.find('.td12').text(recipient12)
			modal.find('.td13').text(recipient13)
			modal.find('.td14').text(recipient14)
			modal.find('.td15').text(recipient15)
			modal.find('.td16').text(recipient16)

		})



	*/

































		// 2.1 Render vista "Usuarios" > "Todos"

			var tabla_5 = document.getElementById('tabla-us-todos');

			var ourRequest_5 = new XMLHttpRequest();
			ourRequest_5.open('GET', 'usuarios_admin.json');
			ourRequest_5.onload = function(){
				var ourData_5 = JSON.parse(ourRequest_5.responseText);
				renderHTML_5(ourData_5);
			};

			ourRequest_5.send();

			function renderHTML_5(data){

				var cadena_5 = "";
			
				for (var i = 0; i < data.length; i++) {
					
					cadena_5 += "<tr class='fila'><td>" + data[i].nombre + " " + data[i].apellido + "</td><td>" + data[i].correo + "</td><td><button type='button' class='btn_spec btn-primary' data-toggle='modal' data-target='#exampleModal5' data-1=" + data[i].nombre + " data-2=" + data[i].nombre + " data-3=" + data[i].nombre + " data-4=" + data[i].nombre + " data-5=" + data[i].nombre + " data-6=" + data[i].nombre + " data-7=" + data[i].nombre + " data-8=" + data[i].nombre + " data-9=" + data[i].nombre + " data-10=" + data[i].nombre + " data-11=" + data[i].nombre + " data-12=" + data[i].nombre + " data-13=" + data[i].nombre + " data-14=" + data[i].nombre + " data-15=" + data[i].nombre + " data-16=" + data[i].nombre + "  style='padding: 0,4 1,1;'>Ver Ficha</button></td><td>" + data[i].fecha_registro + "</td></tr>";
					
				}
				
				tabla_5.insertAdjacentHTML('beforeend', cadena_5);

				var numberOfItems = $('#tabla-us-todos .fila').length;
				var limitPerPage = 3
				$("#tabla-us-todos .fila:gt(" + (limitPerPage - 1) + ")").hide()
				var totalPages = Math.round(numberOfItems / limitPerPage);
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
						$("#tabla-us-todos .fila").hide();
						var grandTotal = limitPerPage * currentPage;
						for(var i = grandTotal - limitPerPage; i < grandTotal; i++){
							$("#tabla-us-todos .fila:eq(" + i + ")").show();
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
						$("#tabla-us-todos .fila").hide();
						var grandTotal = limitPerPage * currentPage;
						for(var i = grandTotal - limitPerPage; i < grandTotal; i++){
							$("#tabla-us-todos .fila:eq(" + i + ")").show();
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
						$("#tabla-us-todos .fila").hide();
						var grandTotal = limitPerPage * currentPage;
						for(var i = grandTotal - limitPerPage; i < grandTotal; i++){
							$("#tabla-us-todos .fila:eq(" + i + ")").show();
						}
						$(".pag-5 li.current-page:eq(" + (currentPage - 1) + ")").addClass('active');
					}
				});
			}

		// 2.1 Render modal "Usuarios" > "Todos"

			$('#exampleModal5').on('show.bs.modal', function (event) {
			var button = $(event.relatedTarget) // Button that triggered the modal
			var recipient1 = button.data('1')
			var recipient2 = button.data('2')
			var recipient3 = button.data('3')
			var recipient4 = button.data('4')
			var recipient5 = button.data('5')
			var recipient6 = button.data('6')
			var recipient7 = button.data('7')
			var recipient8 = button.data('8')
			var recipient9 = button.data('9')// Extract info from data-* attributes
			// If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
			// Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
			var modal = $(this)
			modal.find('.td1').text(recipient1)
			modal.find('.td2').text(recipient2)
			modal.find('.td3').text(recipient3)
			modal.find('.td4').text(recipient4)
			modal.find('.td5').text(recipient5)
			modal.find('.td6').text(recipient6)
			modal.find('.td7').text(recipient7)
			modal.find('.td8').text(recipient8)
			modal.find('.td9').text(recipient9)

			})

		// 2.2 Render vista "Usuarios" > "Baneados"
			var tabla_6 = document.getElementById('tabla-baneados');

			var ourRequest_6 = new XMLHttpRequest();
			ourRequest_6.open('GET', 'usuarios_baneados.json');
			ourRequest_6.onload = function(){
				var ourData_6 = JSON.parse(ourRequest_6.responseText);
				renderHTML_6(ourData_6);
			};

			ourRequest_6.send();

			function renderHTML_6(data){

				var cadena_6 = "";
			   
				for (var i = 0; i < data.length; i++) {
					
					cadena_6 += "<tr class='fila'><td>" + data[i].nombre + " " + data[i].apellido + "</td><td>" + data[i].correo + "</td><td><button type='button' class='btn_spec btn-primary' data-toggle='modal' data-target='#exampleModal6' data-1=" + data[i].monto + " data-2=" + data[i].plazo + " data-3=" + data[i].interes + " data-4=" + data[i].costo_adm + " data-5=" + data[i].monto_dev + " data-6=" + data[i].cuenta + " data-7=" + data[i].cbu + " data-8=" + data[i].nombre + " data-9=" + data[i].apellido + " data-10=" + data[i].dni + " data-11=" + data[i].domicilio + " data-12=" + data[i].telefono + " data-13=" + data[i].sexo + " data-14=" + data[i].correo + " data-15=" + data[i].fecha_nac + " data-16=" + data[i].salario + " style='padding: 0,4 1,1;'>Ver Ficha</button></td><td>" + data[i].fecha_registro + "</td></tr>";
					
				}
				
				tabla_6.insertAdjacentHTML('beforeend', cadena_6);

				var numberOfItems = $('#tabla-baneados .fila').length;
				var limitPerPage = 3
				$("#tabla-baneados .fila:gt(" + (limitPerPage - 1) + ")").hide()
				var totalPages = Math.round(numberOfItems / limitPerPage);
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
			var button = $(event.relatedTarget) // Button that triggered the modal
			var recipient1 = button.data('1')
			var recipient2 = button.data('2')
			var recipient3 = button.data('3')
			var recipient4 = button.data('4')
			var recipient5 = button.data('5')
			var recipient6 = button.data('6')
			var recipient7 = button.data('7')
			var recipient8 = button.data('8')
			var recipient9 = button.data('9')// Extract info from data-* attributes
			// If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
			// Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
			var modal = $(this)
			modal.find('.td1').text(recipient1)
			modal.find('.td2').text(recipient2)
			modal.find('.td3').text(recipient3)
			modal.find('.td4').text(recipient4)
			modal.find('.td5').text(recipient5)
			modal.find('.td6').text(recipient6)
			modal.find('.td7').text(recipient7)
			modal.find('.td8').text(recipient8)
			modal.find('.td9').text(recipient9)

			})


		
		   
	 

	</script>
	
</body>
</html>

