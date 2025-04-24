<?php

date_default_timezone_set('America/Costa_Rica');
session_start();
/*if (!session_start())
{
    throw new RuntimeException('Failed to start the session');
}*/
header("Access-Control-Allow-Origin: *");
header('Access-Control-Allow-Headers: Content-Type');

$databaseGlobal = CurlController::database();

$routesArray = explode("/", $_SERVER['REQUEST_URI']);

/*========================================
Ajuste para Facebook
========================================*/

$localPath = true;

if($localPath){

    $urlParams = $routesArray;

}else{

    if(!empty($_SERVER['HTTPS']) && ('on' == $_SERVER['HTTPS'])){

        if(!empty(array_filter($routesArray)[1])){
    
            $urlGet = explode("?", array_filter($routesArray)[1]);
    
            $urlParams = explode("&", $urlGet[0]);
    
        }
    
    }else{
    
        if(!empty(array_filter($routesArray)[1])){
    
            $urlGet = explode("?", array_filter($routesArray)[1]);
    
            $urlParams = explode("&", $urlGet[0]);
    
        }
    
    }

}

// print_r($urlParams[2]); return;

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Veterinaria Happy Dog</title>
    <link rel="shortcut icon" href="views/img/logo.ico"> 

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <!-- FontAwesome -->
	<link rel="stylesheet" href="views/css/fontawesome-free/fontawesome.min.css">
    <link rel="stylesheet" href="views/css/fontawesome-free/css/all.min.css">

    <!-- CSS -->
    <link rel="stylesheet" href="views/css/styles.css">
    <link rel="stylesheet" href="views/css/servicios.css">
</head>
<body>
    
    <!-- Header de la página -->
    <?php include "modules/header.php"; ?>

    
    <!-- Contenido de la página -->
    <main>

        <!--=====================================
        Pages
        ======================================-->

        <?php 

            if(!empty($urlParams[2])){

                if(
                    $urlParams[2] == "inicio" ||
                    $urlParams[2] == "login" ||
                    $urlParams[2] == "registro" ||
                    $urlParams[2] == "recuperar-contrasena" ||
                    $urlParams[2] == "mascotas-gestion" ||
                    $urlParams[2] == "mascotas-historial" ||
                    $urlParams[2] == "mascotas-modificar" ||
                    $urlParams[2] == "mascotas-registrar" ||
                    $urlParams[2] == "citas-agendar" ||
                    $urlParams[2] == "citas-gestion" ||
                    $urlParams[2] == "citas-modificar" ||
                    $urlParams[2] == "citas-programadas" ||
                    $urlParams[2] == "clientes-agregar" ||
                    $urlParams[2] == "clientes-consulta" ||
                    $urlParams[2] == "clientes-modificar" ||
                    $urlParams[2] == "admin-estadisticas" ||
                    $urlParams[2] == "admin-reportes" ||
                    $urlParams[2] == "admin-usuarios" ||
                    $urlParams[2] == "blog" ||
                    $urlParams[2] == "noticias" ||
                    $urlParams[2] == "contacto" ||
                    $urlParams[2] == "servicios-disponibles" ||
                    $urlParams[2] == "resenas-calificar" ||
                    $urlParams[2] == "resenas-publicar" ||
                    $urlParams[2] == "resenas-testimonios" ||
                    // $urlParams[2] == "" ||
                    false

                ){

                    include "modules/".$urlParams[2].".php";
                    
                }else{

                    include "modules/404.php";

                }

            }else{

                include "modules/inicio.php";

            }

        ?>
        
    </main>

    <!-- Pie de página -->
    <?php include "modules/footer.php"; ?>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    
</body>
</html>