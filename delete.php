<?php 

include_once "admin/config.php"; // Using database connection file here
include_once 'functions.php';
 // get id through query string

//$conexion= conexion($bd_config);
$id = $_GET['idd'];
$conexion = conexion($bd_config);
$statement = $conexion->prepare("delete from riego where idd =".$id);
$statement->execute(array($id));
//$del = mysqli_query($db,"delete from riego where idd = '$id'"); // delete query

if($statement){
     // Close connection
    header("location:views/usuario.view.php"); // redirects to all records page
    $conexion=null;
}else{
    echo "Error deleting record"; // display error message if not delete
}
?>