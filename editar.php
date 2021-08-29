<!DOCTYPE html>
<html lang="en">
<link rel="stylesheet" href="css/style.css">
<?php
include_once "admin/config.php";
include_once 'functions.php';

if($_GET){
    $id = $_GET['idd2'];
    $sql_mostrar = "SELECT * FROM riego WHERE idd ='$id'";
//Prepara sentencia
    $Consultar_mostrar = conexion($bd_config)->prepare($sql_mostrar);
//Ejecutar consulta
    $Consultar_mostrar->execute(array($id));
    $resultado_mostrar = $Consultar_mostrar->fetch();
}



?>
<body class="body-editar">


<form class="form-editar" method="GET">
        
        
        <label class="label" for="idzona">id_zona </label>
        <input value="<?php echo $resultado_mostrar['id_zona'] ?>" type="number" name="id_zona" readonly onmousedown="return false;"><br><br>
        <label class="label" for="senal">señal</label>
        <input value="<?php echo $resultado_mostrar['senal'] ?>" type="text" name="senal" id="" readonly onmousedown="return false;"><br><br>
        <label class="label" for="bateria">bateria</label>
        <input value="<?php echo $resultado_mostrar['bateria'] ?>" type="text" name="bateria" id="" readonly onmousedown="return false;"><br><br>
        <label class="label" for="nivel">Nivel</label>
        <input value="<?php echo $resultado_mostrar['nivel'] ?>" type="text" name="nivel" id=""><br><br>
        <label class="label" for="bateria">Humedad</label>
        <input value="<?php echo $resultado_mostrar['hum'] ?>" type="text" name="hum" id=""><br><br>
        <label class="label" for="bateria">Agua</label>
        <input value="<?php echo $resultado_mostrar['agua'] ?>" type="text" name="agua" id="" readonly onmousedown="return false;"><br><br>
        <label class="label" for="bateria">inicio</label>
        <input value="<?php echo $resultado_mostrar['inicio'] ?>" type="text" name="inicio" id="" readonly onmousedown="return false;"><br><br>
        <label class="label" for="bateria">final</label>
        <input value="<?php echo $resultado_mostrar['final'] ?>" type="text" name="final" id="" readonly onmousedown="return false;"><br><br>
        <label class="label" for="bateria">Fecha</label>
        <input value="<?php echo $resultado_mostrar['fecha'] ?>" type="datetime" name="fecha" id="" readonly onmousedown="return false;"><br><br>
        <input value="<?php echo $resultado_mostrar['idd'] ?>" type="hidden" name="id"><br><br>
        <button type="submit" name="enviar">Enviar</button>
        
</form>
</body>
<?php
//97548

if (isset($_GET['enviar'])) {


    $id1 = $_GET['id'];


    $idzona = $_GET['id_zona'];
    $senal = $_GET['senal'];
    $bateria = $_GET['bateria'];
    $nivel = $_GET['nivel'];
    $hum = $_GET['hum'];
    $agua = $_GET['agua'];
    $inicio = $_GET['inicio'];
    $final = $_GET['final'];
    $fecha = $_GET['fecha'];

    $sql_actualizar = "UPDATE riego SET id_zona=?,senal=?,bateria=?,nivel=?,hum=?,agua=?,inicio=?,final=?,fecha=? WHERE idd=?";
    //Preparar la consulta
    $consultar_actualizar = conexion($bd_config)->prepare($sql_actualizar);
    //Ejecutar
    $consultar_actualizar->execute(array($idzona, $senal, $bateria, $nivel, $hum, $agua, $inicio, $final, $fecha, $id1));
    //Redireccionar
    echo "<script>alert('Registro actualizados correctamente');</script>";
    header('Location: views/usuario.view.php');



}





?>