<?php

// Paramertos para la conexión a base de datos
$servername = "localhost"; //Nombre del servidor, en este caso es local
$database = "intelcost"; // Nombre de la base de datos en la que se va a trabajar
$username = "sebastian"; //Usuario de la base de datos
$password = "12345"; // Contraseña del usuario de la base de datos


$tabla1 = "proveedores"; // Tabla de proveedores



//Conexión a base de datos
$conexion = new mysqli($servername, $username, $password, $database);

//Se comprueba la conexión
if ($conexion->connect_errno) {
    echo "Error al conectar";
    exit();
}


?>