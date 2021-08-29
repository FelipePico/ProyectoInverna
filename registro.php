<?php session_start();

require 'admin/config.php';
require 'functions.php';


if ($_SERVER['REQUEST_METHOD'] == 'POST'){

    $id_imei = limpiarDatos($_POST['id_imei']);
    $usuario = limpiarDatos($_POST['usuario']);
    $password = limpiarDatos($_POST['password']);
    $password = hash('sha512', $password);
    $rol = $_POST['rol'];

    $errores = '';

    // validar los campos de texto

    if (empty($id_imei) || empty($usuario) || empty($password) || empty($rol)) {
        $errores .= '<li class="error">Por favor rellene todos los campos</li>';
    }else {
         // validacion de que el usuario no exista
         $conexion = conexion($bd_config);

         $statement = $conexion->prepare('SELECT * FROM usuarios WHERE  id_imei = :id_imei LIMIT 1');
         $statement->execute(array(
            
             ':id_imei' => $id_imei

         ));

        /*$statement = $conexion->prepare('SELECT * FROM usuarios WHERE  usuario = :usuario LIMIT 1');
        $statement->execute(array(
            
            ':usuario' => $usuario

        ));*/

        
         $resultado = $statement->fetch();
         if ($resultado != false) {
             $errores .= '<li class="error">Este usuario ya existe</li>';
         }
         

         
    }
   

    if($errores == ''){
        $conexion = conexion($bd_config);
        $statement = $conexion->prepare('INSERT INTO usuarios (id, id_imei,usuario, password, tipo_usuario) VALUES(null,  :id_imei,:usuario, :password, :tipo_usuario)');
        $statement->execute(
            array(
                ':id_imei'=> $id_imei,
                ':usuario' => $usuario,
                ':password' => $password,
                ':tipo_usuario' => $rol
        ));

        header('Location: '.RUTA.'login.php');

    }



}

require 'views/registro.view.php';

?>