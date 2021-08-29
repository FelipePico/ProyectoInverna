<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <title>Registro</title>
</head>
<body class="bg-image">
    
    <div class="container">

        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);  ?>" method="POST">


            <div class="input-group">

                <i class="fa fa-user icons" aria-hidden="false"></i>
                <input type="text" name="id_imei" placeholder="Imei" class="form-control">

            </div>
          
    
            <div class="input-group">

                <i class="fa fa-user icons" aria-hidden="false"></i>
                <input type="text" name="usuario" placeholder="Usuario" class="form-control">

            </div>

            <div class="input-group">

                <i class="fa fa-lock icons" aria-hidden="false"></i>
                <input type="password" name="password" placeholder="Contraseña" class="form-control">
                
            </div>

            <div class="input-group">

            <select class="form-control" name="rol">
                <!--<option value="">Selecciona un privilegio: </option>-->
                <option value="usuario">Cliente</option>
                <!--<option value="administrador">Administrador</option>-->
            </select>


            </div>

            <?php if (!empty($errores)): ?>
                <ul>
            <?php echo $errores; ?>
                </ul>
            <?php endif; ?>

            <button type="submit" name="submit" class="btn btn-flat-green">Registrar</button>


        </form>

        <a href="<?php echo RUTA.'login.php'?>" class="login-link"> ¿Ya tienes cuenta?</a>

    </div>

    
</body>
</html>