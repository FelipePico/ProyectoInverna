<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Bienvenido Usuario</title>
  <link rel="stylesheet" href="../css/style.css">
</head>
<?php
  include_once "../admin/config.php"; // Using database connection file here
  include_once '../functions.php';


  session_start();

  $id_user= $_SESSION['usuario'];
  $sql_inicio = "SELECT * FROM usuarios WHERE usuario ='$id_user' ";
  $consulta_resta = conexion($bd_config)->prepare($sql_inicio);
  $consulta_resta->execute();
  $resultado = $consulta_resta->rowCount();
  $prueba = $consulta_resta->fetch(PDO::FETCH_OBJ);

?>
<body class="body">
  <div class="contenedor-bienvenida">
  <h1 class="bienvenida">Bienvenido <?php echo $prueba->usuario; ?></h1>
  <a href="<?php echo RUTA.'close.php' ?>">Cerrar Sesion</a>
  </div>

    </tbody>
  </table>


<?php 



  
  $usuario=htmlentities($_SESSION['usuario'],ENT_QUOTES,'utf-8');
  $query = conexion($bd_config)->query("SELECT * FROM riego AS r LEFT JOIN usuarios AS u ON u.id_imei = r.imei WHERE r.usuario= '".$prueba->usuario."' ;");
  /*$query = $conexion->query('select * from riego where imei = usuarios.id_imei ' );*/
  $result = $query->fetchAll(PDO::FETCH_OBJ);
 
  echo "<div class='padre'>";
    echo '<table id="tablax" class="table">';

      echo "<thead>";
        echo "<tr>";
            #echo "<td> Id </td>";
            #echo "<td> Imei </td>";
            echo "<td> Id_zona </td>";
            echo "<td> Señal </td>";
            echo "<td> Bateria</td>";
            echo "<td> Nivel </td>";
            echo "<td> Humedad </td>";
            echo "<td> Agua </td>";
            echo "<td> Inicio </td>";
            echo "<td> Final </td>";
            echo "<td> Fecha </td>";
            echo "<td colspan='2'> botones </td>";
          
        echo "</tr>";



      echo "</thead>";

      
    foreach($result as $r){
        

          #echo "<td>".$r->idd."</td>\t"; 
          
          #echo "<td>".$r->imei."</td>\t"; 
        
          echo "<td>".$r->id_zona."</td>";
          
          echo "<td>".$r->senal."</td>";
          
          echo "<td>".$r->bateria."</td>";
          
          echo "<td>".$r->nivel."</td>";
          echo "<td>".$r->hum."</td>";
      
          echo "<td>".$r->agua."</td>";
          echo "<td>".$r->inicio."</td>";
          echo "<td>".$r->final."</td>";
          echo "<td>".$r->fecha."</td>";


          echo "<td><a class='boton' name='eliminar' href=../delete.php?idd=".$r->idd.">Eliminar</a></td>";

          echo "<td><a  class='boton' name='editar' href=../editar.php?idd2=".$r->idd.">Editar</a></td>";

          echo "</tr>";
        
        }



        
        echo "</table>";
  echo "</div>";

 
  




?>


    



  
</body>
</html>
