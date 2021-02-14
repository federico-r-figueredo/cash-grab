<?php
    require('parametros_conexion.php');
    
   

    
    // JSON "Prestamos" > "Pendientes"
    $sql = "SELECT * FROM usuarios INNER JOIN prestamo ON usuarios.id_usr = prestamo.id_usr WHERE  prestamo.estado = 0";;
    $query = mysqli_query($mysqli, $sql);
    $json_array = array();
    while($row = mysqli_fetch_assoc($query)){
        $json_array[] = $row;
    }
    $json_coded = json_encode($json_array);
    $file_name = 'prestamos_pendientes.json';
    file_put_contents($file_name, $json_coded);

    
    // JSON "Prestamos" > "Revision"
    $sql = "SELECT * FROM usuarios INNER JOIN prestamo ON usuarios.id_usr = prestamo.id_usr WHERE  prestamo.estado = 1";
    $query = mysqli_query($mysqli, $sql);
    $json_array = array();
    while($row = mysqli_fetch_assoc($query)){
        $json_array[] = $row;
    }
    $json_coded = json_encode($json_array);
    $file_name = 'prestamos_revision.json';
    file_put_contents($file_name, $json_coded);


    // JSON "Prestamos" > "Aprobados"
    $sql = "SELECT * FROM usuarios INNER JOIN prestamo ON usuarios.id_usr = prestamo.id_usr WHERE  prestamo.estado = 2";
    $query = mysqli_query($mysqli, $sql);
    $json_array = array();
    while($row = mysqli_fetch_assoc($query)){
        $json_array[] = $row;
    }
    $json_coded = json_encode($json_array);
    $file_name = 'prestamos_aprobados.json';
    file_put_contents($file_name, $json_coded);


    // JSON "Prestamos" > "Rechazados"
    $sql = "SELECT * FROM usuarios INNER JOIN prestamo ON usuarios.id_usr = prestamo.id_usr WHERE  prestamo.estado = 3";
    $query = mysqli_query($mysqli, $sql);
    $json_array = array();
    while($row = mysqli_fetch_assoc($query)){
        $json_array[] = $row;
    }
    $json_coded = json_encode($json_array);
    $file_name = 'prestamos_rechazados.json';
    file_put_contents($file_name, $json_coded);


    // JSON "usuarios" > "Activos"
    $sql = "SELECT nombre, apellido, dni, direccion, telefono, sexo, correo, fecha_nac, salario, fecha_registro, id_usr FROM usuarios WHERE estado = 1";
    $query = mysqli_query($mysqli, $sql);
    $json_array = array();
    while($row = mysqli_fetch_assoc($query)){
        $json_array[] = $row;
    }
    $json_coded = json_encode($json_array);
    $file_name = 'usuarios_activos.json';
    file_put_contents($file_name, $json_coded);


    // JSON "usuarios" > "Baneados"
    $sql = "SELECT nombre, apellido, dni, direccion, telefono, sexo, correo, fecha_nac, salario, fecha_registro, id_usr FROM usuarios WHERE estado = 2";
    $query = mysqli_query($mysqli, $sql);
    $json_array = array();
    while($row = mysqli_fetch_assoc($query)){
        $json_array[] = $row;
    }
    $json_coded = json_encode($json_array);
    $file_name = 'usuarios_baneados.json';
    file_put_contents($file_name, $json_coded);

    
    // JSON "Bancos" > "Todos"
    $sql = "SELECT * FROM bancos";
    $query = mysqli_query($mysqli, $sql);
    $json_array = array();
    while($row = mysqli_fetch_assoc($query)){
        $json_array[] = $row;
    }
    $json_coded = json_encode($json_array);
    $file_name = 'bancos.json';
    file_put_contents($file_name, $json_coded);


    // JSON "Historial" > "admin"
    $sql = "SELECT eventos.evento, usuarios.ip, eventos.fecha FROM eventos INNER JOIN usuarios ON eventos.id_usr = usuarios.id_usr WHERE usuarios.tipo = 2";
    $query = mysqli_query($mysqli, $sql);
    $json_array = array();
    while($row = mysqli_fetch_assoc($query)){
        $json_array[] = $row;
    }
    $json_coded = json_encode($json_array);
    $file_name = 'hist-adm.json';
    file_put_contents($file_name, $json_coded);

    // JSON "Historial" > "usr"
    $sql = "SELECT eventos.evento, usuarios.ip, eventos.fecha FROM eventos INNER JOIN usuarios ON eventos.id_usr = usuarios.id_usr WHERE usuarios.tipo = 1";
    $query = mysqli_query($mysqli, $sql);
    $json_array = array();
    while($row = mysqli_fetch_assoc($query)){
        $json_array[] = $row;
    }
    $json_coded = json_encode($json_array);
    $file_name = 'hist-usr.json';
    file_put_contents($file_name, $json_coded);

    /*
    $sql = "SELECT * FROM correos";
    $query = mysqli_query($mysqli, $sql);
    $json_array = array();
    while($row = mysqli_fetch_assoc($query)){
        $json_array[] = $row;
    }
    $json_coded = json_encode($json_array);

    $file_name = 'correos.json';

    
    file_put_contents($file_name, $json_coded);

    $sql = "SELECT * FROM cbu";
    $query = mysqli_query($mysqli, $sql);
    $json_array = array();
    while($row = mysqli_fetch_assoc($query)){
        $json_array[] = $row;
    }
    $json_coded = json_encode($json_array);

    $file_name = 'cbu.json';

    
    file_put_contents($file_name, $json_coded); */

















?>