<?php 
 
    require('parametros_conexion.php');
        
    // JSON "Historial"
    $sql = "SELECT id_usr, fecha_prestamo, monto, monto_dev, plazo, estado FROM prestamo";
    $query = mysqli_query($mysqli, $sql);
    $json_array = array();
    while($row = mysqli_fetch_assoc($query)){
        $json_array[] = $row;
    }
    $json_coded = json_encode($json_array);
    $file_name = 'panel-hist.json';
    file_put_contents($file_name, $json_coded);

     // JSON "Mis E-Mail"
     $sql = "SELECT id_usr, correo, estado FROM usuarios";
     $query = mysqli_query($mysqli, $sql);
     $json_array = array();
     while($row = mysqli_fetch_assoc($query)){
         $json_array[] = $row;
     }
     $json_coded = json_encode($json_array);
     $file_name = 'panel-correos.json';
     file_put_contents($file_name, $json_coded);

     // JSON "Mis CBU"
    $sql = "SELECT bancos.nombre, cuentas.id_usr, cuentas.cbu, cuentas.tipo FROM bancos INNER JOIN cuentas ON bancos.id_banco = cuentas.id_banco";
     $query = mysqli_query($mysqli, $sql);
     $json_array = array();
     while($row = mysqli_fetch_assoc($query)){
         $json_array[] = $row;
     }
     $json_coded = json_encode($json_array);
     $file_name = 'panel-cuentas.json';
     file_put_contents($file_name, $json_coded);


?>









