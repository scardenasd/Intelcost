<?php

if (isset($_POST['btn1'])) {
    include("../conexion/conexion.php"); //Se incluye el archivo conexion para conectarse a la base de datos

    //Variables que guardan los datos de los campos ingresados por el usuario


    //Formato de fecha para el tipo de dato datetime


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
        }else{
            if(strlen($celular) > 10 || strlen($celular) < 10){
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
        echo "<div class='alert alert-danger'>";
        for ($i = 0; $i < count($campos); $i++) {
            echo "<li>" . $campos[$i] . "</li>";
        }
    } else {
        echo "<div class='alert alert-success'>
                            Datos correctos";

        //Sentencia SQL para insertar los datos a la base de datos
        $insertar = ("INSERT INTO $tabla1 (nombres, apellidos, edad, correo_electronico, celular, telefono, registro)
                    VALUES('$nombres', '$apellidos', '$edad', '$correo', '$celular', '$telefono', now())");

        $resultado = mysqli_query($conexion, $insertar);

        if ($resultado) {
            echo "<script>alert('Datos ingresados correctamente'); 
window.location='/Intelcost/paginas/index.php';</script>";
        } else {
            echo "<script> alert('Error al Ingresar los datos.'); window.history.go(-1); </script>";
        }
    }
}
