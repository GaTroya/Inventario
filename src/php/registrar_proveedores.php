<?php
    include("conexion.php");

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        if(isset($_POST['Registrar_Proveedor'])){

            $nombre=$_POST ['nombreProveedor'];
            $telefono=$_POST ['telefonoProveedor'];
            $Nit=$_POST ['nit'];
            $descripcion=$_POST ['descripcionProveedor'];
    
           
    
            $insertarDatos = "INSERT INTO proveedor VALUES('$nombre','$telefono','$Nit','$descripcion','')";
            $ejecutarInsertar = mysqli_query($conn,$insertarDatos);
    
    
        }
        
    }

    
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel='stylesheet' type='text/css' media='screen' href='../../css/mdb.min.css'>

    <title>Registro Exitoso</title>
    
</head>
<body>
<div class="lista-edicion">
        <h2>¡Registro Exitoso!</h2>
        <p>Tu registro se ha completado con éxito.</p>
        <button class="btn-secondary" onclick="goBackAndReload()">Regresar</button>
    </div>

    <script>
        function goBackAndReload() {
            window.location.replace(document.referrer);
        }
    </script>

   
</body>
</html>