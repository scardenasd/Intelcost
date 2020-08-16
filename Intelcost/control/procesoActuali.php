<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Validacion</title>

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

    <center><h1>Validacion</h1></center>

<?php

include("../conexion/conexion.php");

$id = $_POST['id'];
$nombres = $_POST['nombres'];
$apellidos = $_POST['apellidos'];
$edad = $_POST['edad'];
$correo = $_POST['correo'];
$celular = $_POST['celular'];
$telefono = $_POST['telefono'];

$date = date('Y-m-d H:i:s');

$campos = array();

if (empty($nombres)) {
    array_push($campos, "Debe ingresar su nombre");
} else {
    if (strlen($nombres) > 60) {
        array_push($campos, "El nombre supera la cantidad de caracteres");
    } else {
        if (strlen($nombres) < 3) {
            array_push($campos, "El nombre debe tener mas de 2 caracteres");
        }
    }
}

if (empty($apellidos)) {
    array_push($campos, "Debe ingresar sus apellidos");
} else {
    if (strlen($nombres) > 60) {
        array_push($campos, "El apellido supera la cantidad de caracteres");
    }
}
if (empty($edad)) {
    array_push($campos, "Debe ingresar su edad");
} else {
    if (!is_numeric($edad)) {
        array_push($campos, "La edad debe ser un numero.");
    } else {
        if ($edad < 0) {
            array_push($campos, "Ingrese solo números positivos");
        }
    }
}
if (empty($correo)) {
    array_push($campos, "Debe ingresar su correo");
} else {
    if (!filter_var($correo, FILTER_VALIDATE_EMAIL)) {

        array_push($campos, "El correo es incorrecto");
    }
}
if (empty($celular)) {
    array_push($campos, "Debe ingresar su celular");
} else {
    if (!is_numeric($celular)) {
        array_push($campos, "El celular debe ser un numero.");
    } else {
        if (strlen($celular) > 10 || strlen($celular) < 10) {
            array_push($campos, "El celular debe tener 10 digitos");
        }
    }
}

if (!is_numeric($telefono)) {
    array_push($campos, "El telefono debe ser un numero.");
} else {
    if (strlen($telefono) > 21) {
        array_push($campos, "El telefono debe tener un maximo de 20 caracteres");
    }
}

if (count($campos) > 0) {
    echo "<script>
    window.open=('/Intelcost/control/procesoActuali.php','Validacion', 'width=500, height=150');</script>";
    echo "<div class='alert alert-danger'>";
    for ($i = 0; $i < count($campos); $i++) {
        echo "<li>" . $campos[$i] . "</li>";
    }
} else {
    echo "<div class='alert alert-success'>
                            Datos correctos";



    $actuailizar = "UPDATE $tabla1 SET nombres='$nombres', apellidos='$apellidos', edad='$edad', correo_electronico='$correo', celular='$celular', telefono='$telefono', registro=now()
                WHERE id = '$id'";


    $res = mysqli_query($conexion, $actuailizar);

    if ($res) {
        echo "<script>alert('Datos actualizados correctamente.');
    window.location='/Intelcost/paginas/listar.php';</script>";
    } else {
        echo "<script> alert('Error al actualizar los datos.'); window.history.go(-1); </script>";
    }
}
?>

<div class="cod-md-4">
    <center><input type="button" class="btn btn-danger" value="Aceptar" onclick="history.go(-1);"></center>
    </div>

</body>

</html>
