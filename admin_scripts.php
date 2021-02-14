<?php

	session_start();
	require 'parametros_conexion.php';

	if(isset($_POST['pendiente-rechazar-b'])) {

		global $mysqli;

		$id = $_POST['pendiente-rechazar-i'];
		$stmt = $mysqli->prepare("UPDATE prestamo SET estado = 3 WHERE id_usr = ? AND estado = 0");
		$stmt->bind_param('s', $id);
		$result = $stmt->execute();
		require 'generar_json.php';
		$stmt->close();

		header("Refresh:2; url=admin.php");
	
	}

	if(isset($_POST['pendiente-revision-b'])) {

		global $mysqli;

		$id = $_POST['pendiente-revision-i'];
		$stmt = $mysqli->prepare("UPDATE prestamo SET estado = 1 WHERE id_usr = ? AND estado = 0");
		$stmt->bind_param('s', $id);
		$result = $stmt->execute();
		require 'generar_json.php';
		$stmt->close();

		header("Refresh:2; url=admin.php");
	}

	if(isset($_POST['revision-rechazar-b'])) {
		
		global $mysqli;
		$id = $_POST['revision-rechazar-i'];
		$stmt = $mysqli->prepare("UPDATE prestamo SET estado = 3 WHERE id_usr = ? AND estado = 1");
		$stmt->bind_param('s', $id);
		$result = $stmt->execute();
		require 'generar_json.php';
		$stmt->close();
		
		header("Refresh:2; url=admin.php");
	
		
		}

	if(isset($_POST['revision-aprobar-b'])) {
		
		global $mysqli;

		$id = $_POST['revision-aprobar-i'];
		$stmt = $mysqli->prepare("UPDATE prestamo SET estado = 2 WHERE id_usr = ? AND estado = 1");
		$stmt->bind_param('s', $id);
		$result = $stmt->execute();
		require 'generar_json.php';
		$stmt->close();
		
		header("Refresh:2; url=admin.php");
		
	}
	

	if(isset($_POST['aprobar-rechazar-b'])) {
		
		global $mysqli;

		$id = $_POST['aprobar-rechazar-i'];
		$stmt = $mysqli->prepare("UPDATE prestamo SET estado = 3 WHERE id_usr = ? AND estado = 2");
		$stmt->bind_param('s', $id);
		$result = $stmt->execute();
		require 'generar_json.php';
		$stmt->close();

		header("Refresh:2; url=admin.php");
		
	}

	if(isset($_POST['rechazar-revision-b'])) {
		
		global $mysqli;

		$id = $_POST['rechazar-revision-i'];
		$stmt = $mysqli->prepare("UPDATE prestamo SET estado = 1 WHERE id_usr = ? AND estado = 3");
		$stmt->bind_param('s', $id);
		$result = $stmt->execute();
		require 'generar_json.php';
		$stmt->close();

		header("Refresh:2; url=admin.php");
		
		}

	if(isset($_POST['pend-banear-b'])) {
	
		global $mysqli;

		$id = $_POST['pend-banear-i'];
		$stmt = $mysqli->prepare("UPDATE usuarios SET estado = 2 WHERE id_usr = ?");
		$stmt->bind_param('s', $id);
		$result = $stmt->execute();
		require 'generar_json.php';
		$stmt->close();

		header("Refresh:2; url=admin.php");
		
	}

	if(isset($_POST['pend-eliminar-b'])) {
	
		global $mysqli;

		$id = $_POST['pend-eliminar-i'];
		$stmt = $mysqli->prepare("DELETE FROM usuarios WHERE id_usr = ?");
		$stmt->bind_param('s', $id);
		$result = $stmt->execute();
		require 'generar_json.php';
		$stmt->close();
		
		header("Refresh:2; url=admin.php");

	}

	if(isset($_POST['rev-banear-b'])) {
	
		global $mysqli;

		$id = $_POST['rev-banear-i'];

		$stmt = $mysqli->prepare("UPDATE usuarios SET estado = 2 WHERE id_usr = ?");
		$stmt->bind_param('s', $id);
		$result = $stmt->execute();
		require 'generar_json.php';
		$stmt->close();

		header("Refresh:2; url=admin.php");
		
	}

	if(isset($_POST['rev-eliminar-b'])) {
	
		global $mysqli;

		$id = $_POST['rev-eliminar-i'];
		$stmt = $mysqli->prepare("DELETE FROM usuarios WHERE id_usr = ?");
		$stmt->bind_param('s', $id);
		$result = $stmt->execute();
		require 'generar_json.php';
		$stmt->close();

		header("Refresh:2; url=admin.php");

	}

	if(isset($_POST['ap-banear-b'])) {
	
		global $mysqli;

		$id = $_POST['ap-banear-i'];
		$stmt = $mysqli->prepare("UPDATE usuarios SET estado = 2 WHERE id_usr = ?");
		$stmt->bind_param('s', $id);
		$result = $stmt->execute();
		require 'generar_json.php';
		$stmt->close();

		header("Refresh:2; url=admin.php");
		
	}

	if(isset($_POST['ap-eliminar-b'])) {
	
		global $mysqli;

		$id = $_POST['ap-eliminar-i'];
		$stmt = $mysqli->prepare("DELETE FROM usuarios WHERE id_usr = ?");
		$stmt->bind_param('s', $id);
		$result = $stmt->execute();
		require 'generar_json.php';
		$stmt->close();

		header("Refresh:2; url=admin.php");

	}

	if(isset($_POST['rec-banear-b'])) {
	
		global $mysqli;

		$id = $_POST['rec-banear-i'];
		$stmt = $mysqli->prepare("UPDATE usuarios SET estado = 2 WHERE id_usr = ?");
		$stmt->bind_param('s', $id);
		$result = $stmt->execute();
		require 'generar_json.php';
		$stmt->close();
		
		header("Refresh:2; url=admin.php");
		
	}

	if(isset($_POST['rec-eliminar-b'])) {
	
		global $mysqli;
		$id = $_POST['rec-eliminar-i'];

		$stmt = $mysqli->prepare("DELETE FROM usuarios WHERE id_usr = ?");
		$stmt->bind_param('s', $id);
		$result = $stmt->execute();
		require 'generar_json.php';
		$stmt->close();

		header("Refresh:2; url=admin.php");

	}

	if(isset($_POST['ustod-banear-b'])) {

		global $mysqli;

		$id = $_POST['ustod-banear-i'];
		$stmt = $mysqli->prepare("UPDATE usuarios SET estado = 2 WHERE id_usr = ?");
		$stmt->bind_param('s', $id);
		$result = $stmt->execute();
		require 'generar_json.php';
		$stmt->close();

		header("Refresh:2; url=admin.php");

	}

	if(isset($_POST['ustod-eliminar-b'])) {
	
		global $mysqli;

		$id = $_POST['ustod-eliminar-i'];
		$stmt = $mysqli->prepare("DELETE FROM usuarios WHERE id_usr = ?");
		$stmt->bind_param('s', $id);
		$result = $stmt->execute();
		require 'generar_json.php';
		$stmt->close();

		header("Refresh:2; url=admin.php");

	}

	if(isset($_POST['usban-activo-b'])) {
	
		global $mysqli;

		$id = $_POST['usban-activo-i'];
		$stmt = $mysqli->prepare("UPDATE usuarios SET estado = 1 WHERE id_usr = ?");
		$stmt->bind_param('s', $id);
		$result = $stmt->execute();
		require 'generar_json.php';
		$stmt->close();

		header("Refresh:2; url=admin.php");

	}

	if(isset($_POST['usban-eliminar-b'])) {
	
		global $mysqli;

		$id = $_POST['usban-eliminar-i'];
		$stmt = $mysqli->prepare("DELETE FROM usuarios WHERE id_usr = ?");
		$stmt->bind_param('s', $id);
		$result = $stmt->execute();
		require 'generar_json.php';
		$stmt->close();

		header("Refresh:2; url=admin.php");

	}

	if(isset($_POST['editar-banco'])) {
	
		global $mysqli;

		$id = $_POST['b_id'];
		$nombre = $_POST['b_nombre'];
		$direccion = $_POST['b_direccion'];
		$tel1 = $_POST['b_telefono1'];
		$tel2 = $_POST['b_telefono2'];
		$correo = $_POST['b_correo'];
		$notas = $_POST['b_notas'];

		$stmt = $mysqli->prepare("UPDATE bancos SET nombre = ?, direccion = ?, telefono_1 = ?, telefono_2 = ?, email = ?, notas = ? WHERE id_banco = ?");
		$stmt->bind_param('ssiissi', $nombre, $direccion, $tel1, $tel2, $correo, $notas, $id);
		$result = $stmt->execute();
		require 'generar_json.php';
		$stmt->close();

		header("Refresh:2; url=admin.php");

	}

	if(isset($_POST['crear-banco'])) {
	
		global $mysqli;

		$nombre = $_POST['cb_nombre'];
		$direccion = $_POST['cb_direccion'];
		$tel1 = $_POST['cb_telefono1'];
		$tel2 = $_POST['cb_telefono2'];
		$correo = $_POST['cb_correo'];
		$notas = $_POST['cb_notas'];

		$stmt = $mysqli->prepare("INSERT INTO bancos (nombre, direccion, telefono_1, telefono_2, email, notas) VALUES (?,?,?,?,?,?)");
		$stmt->bind_param('ssiiss', $nombre, $direccion, $tel1, $tel2, $correo, $notas);
		$result = $stmt->execute();
		require 'generar_json.php';
		$stmt->close();

		header("Refresh:2; url=admin.php");

	}

	if(isset($_POST['cotizador'])) {
	
		global $mysqli;

		$interes = $_POST['interes'];
		$costo_adm = $_POST['costo_adm'];
		$nota = $_POST['nota'];

		$stmt = $mysqli->prepare("UPDATE config  SET interes = ?, costo_adm = ?, nota = ? WHERE id = 1");
		$stmt->bind_param('iis', $interes, $costo_adm, $nota);
		$result = $stmt->execute();
		require 'generar_json.php';
		$stmt->close();

		header("Refresh:2; url=admin.php");

	}

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Page Title</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="css/style.css" rel="stylesheet">
</head>
<body>
	<div id="contenedor_carga">
		<div id="carga">
		</div>
	</div>
</body>
</html>