<?php

include("../conexion/conexion.php");

if (isset($_GET['del'])) {
    $id = $_GET['del'];
    $query = mysqli_query($conexion, "DELETE FROM $tabla1 WHERE id='$id'");
    header("location:listar.php");
}

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

    <div class="container">
        <div class="table-responsive">
        <table class="table table-bordered table-md">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">Nombres</th>
                    <th scope="col">Apellidos</th>
                    <th scope="col">Edad</th>
                    <th scope="col">Correo</th>
                    <th scope="col">Celular</th>
                    <th scope="col">Telefono</th>
                    <th scope="col">Fecha Registro</th>
                    <th scope="col"></th>
                    <th scope="col"></th>


                </tr>
            </thead>
            <?php
            include("../conexion/conexion.php");
            $sql = "SELECT * FROM $tabla1";
            $res = mysqli_query($conexion, $sql);

            while ($mostrar = mysqli_fetch_assoc($res)) {
            ?>

                <tr>
                    <td><?php echo $mostrar["nombres"] ?></td>
                    <td><?php echo $mostrar["apellidos"] ?></td>
                    <td><?php echo $mostrar["edad"] ?></td>
                    <td><?php echo $mostrar["correo_electronico"] ?></td>
                    <td><?php echo $mostrar["celular"] ?></td>
                    <td><?php echo $mostrar["telefono"] ?></td>
                    <td><?php echo $mostrar["registro"] ?></td>
                    <td><a href="actualizar.php?id=<?php echo $mostrar["id"]; ?>" class="btn btn-success">Editar</a></td>
                    <td><a href="#" onclick="confirmar(<?php echo $mostrar['id'] ?>)" class="btn btn-danger">Eliminar</a></td>

                </tr>

            <?php

            }
            mysqli_free_result($res);






            ?>
        </table>
        </div>
    </div>
    </from>


    <script type="text/javascript">
        function confirmar(id) {
            if (confirm('¿Estas seguro que desea eliminar?')) {
                window.location.href = "listar.php?del=" + id;
            }
        }
    </script>


</body>

</html>