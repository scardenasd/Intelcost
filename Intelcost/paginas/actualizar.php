<?php

$id = $_GET["id"];

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

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
    <?php
    include("../conexion/conexion.php");
    $sql = "SELECT * FROM $tabla1  WHERE id = '$id'";
    $res = mysqli_query($conexion, $sql);

    while ($mostrar = mysqli_fetch_assoc($res)) {
    ?>
        <form method=POST action="../control/procesoActuali.php">
            <div class="row">
                <div class="col-md-4"></div>
                <div class="col-md-4">

                    <center>
                        <h1>Proveedores</h1>
                    </center>

                    <div class="form-grupo">
                        <input type="hidden" name="id" value="<?php echo $mostrar["id"]; ?>" class="form-control" placeholder="" id="id" require="true">
                        <br>
                    </div>

                    <div class="form-grupo">
                        <label for="nombres">Nombres: </label>
                        <input type="text" name="nombres" value="<?php echo $mostrar["nombres"]; ?>" class="form-control" placeholder="" id="nombres" require="true">
                        <br>
                    </div>

                    <div class="form-grupo">
                        <label for="apellidos">Apellidos: </label>
                        <input type="text" name="apellidos" value="<?php echo $mostrar["apellidos"]; ?>" class="form-control" placeholder="" id="apellidos" require="true">
                        <br>
                    </div>

                    <div class="form-grupo">
                        <label for="edad">Edad: </label>
                        <input type="text" name="edad" value="<?php echo $mostrar["edad"]; ?>" class="form-control" placeholder="" id="edad" require="true">
                        <br>
                    </div>

                    <div class="form-grupo">
                        <label for="correo">Correo Electronico: </label>
                        <input type="text" name="correo" value="<?php echo $mostrar["correo_electronico"]; ?>" class="form-control" placeholder="" id="correo" require="true">
                        <br>
                    </div>

                    <div class="form-grupo">
                        <label for="celular">Celular: </label>
                        <input type="text" name="celular" value="<?php echo $mostrar["celular"]; ?>" class="form-control" placeholder="" id="celular" require="true">
                        <br>
                    </div>

                    <div class="form-grupo">
                        <label for="telefono">Telefono: </label>
                        <input type="text" name="telefono" value="<?php echo $mostrar["telefono"]; ?>" class="form-control" placeholder="" id="telefono" require="">
                        <br>
                    </div>

                    <center>
                        <input type="submit" value="Actualizar" class="btn btn-info" name="btnActualizar">
                        <input type="button" class="btn btn-danger" value="Volver" onclick="history.go(-1);">

                    </center>
                    <br>





                <?php

            }
            mysqli_free_result($res);






                ?>

                </from>




</body>

</html>