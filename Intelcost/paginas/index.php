<?php
// Condicion para el boton de insertar
if (isset($_POST['btn1'])) {

    //Parametros de variables con la informacion ingresada por el usuario
    $nombres = $_POST['nombres'];
    $apellidos = $_POST['apellidos'];
    $edad = $_POST['edad'];
    $correo = $_POST['correo'];
    $celular = $_POST['celular'];
    $telefono = $_POST['telefono'];
    $date = date('Y-m-d H:i:s');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">






    <title>Formulario de Proveedores</title>
    <link rel="stylesheet" type="text/css " href="css/bootstrap.min.css">

    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>


    <nav class="navbar navbar-expand-lg navbar-light bg-light" style="background-color: #e3f2fd;">
        <img src="/Intelcost/imagen/logointelcost.png" width="110" height="90" class="d-inline-block align-top" alt="">

        <a class="navbar-brand" href="#"> Menú</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="index.php">Inicio <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="listar.php">Ver Proveedores</a>
                </li>
            </ul>
        </div>
    </nav>

</head>

<body>



    <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-4">

            <center>
                <h2>Registrar Proveedores</h2>
            </center>

            <?php
            //Archivo que contiene el insertar a base de datos
            include("../control/insertar.php");
            ?>
            <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">

                <div class="form-grupo">
                    <label for="nombres">Nombres: </label>
                    <input type="text" name="nombres" class="form-control" id="nombres" value="<?php if (isset($nombres)) echo $nombres ?>">
                    <br>
                </div>

                <div class="form-grupo">
                    <label for="apellidos">Apellidos: </label>
                    <input type="text" name="apellidos" class="form-control" id="apellidos" value="<?php if (isset($apellidos)) echo $apellidos ?>">
                    <br>
                </div>

                <div class="form-grupo">
                    <label for="edad">Edad: </label>
                    <input type="text" name="edad" class="form-control" id="edad" value="<?php if (isset($edad)) echo $edad ?>">
                    <br>
                </div>

                <div class="form-grupo">
                    <label for="correo">Correo Electronico: </label>
                    <input type="email" name="correo" class="form-control" id="correo" value="<?php if (isset($correo)) echo $correo ?>">
                    <br>
                </div>

                <div class="form-grupo">
                    <label for="celular">Celular: </label>
                    <input type="text" name="celular" class="form-control" id="celular" value="<?php if (isset($celular)) echo $celular ?>">
                    <br>
                </div>

                <div class="form-grupo">
                    <label for="telefono">Telefono: </label>
                    <input type="text" name="telefono" class="form-control" id="telefono" value="<?php if (isset($telefono)) echo $telefono ?>">
                    <br>
                </div>


                <center>
                    <input type="submit" value="Enviar" class="btn btn-success" name="btn1">
                    <br><br>
                </center>


            </form>




        </div>
        <div class="col-md-4"></div>
    </div>


    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>