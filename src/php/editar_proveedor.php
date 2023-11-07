<?php
include "../php/conexion.php";

$id_proveedor = $_GET['id'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombreProveedorEditar = $_POST["nombreProveedorEditar"];
    $telefonoProveedorEditar = $_POST["telefonoProveedorEditar"];
    $nitEditar = $_POST["nitEditar"];
    $descripcionEditar = $_POST["DescripionEditar"];
    $idProveedorEditar = $_POST["idProveedorEditar"];

    $sql = "UPDATE proveedor SET nombre_proveedor = '$nombreProveedorEditar', telefono_proveedor = '$telefonoProveedorEditar', nit = '$nitEditar', descripcion = '$descripcionEditar' WHERE id_proveedor = $idProveedorEditar";

    if ($conn->query($sql) === TRUE) {
        header("Location: ../pages/proveedores.php"); 
        exit();
    } else {
        
    }
}


$sql = "SELECT nombre_proveedor, telefono_proveedor, nit, descripcion FROM proveedor WHERE id_proveedor = $id_proveedor";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $nombreProveedorEditar = $row["nombre_proveedor"];
    $telefonoProveedorEditar = $row["telefono_proveedor"];
    $nitEditar = $row["nit"];
    $descripcionEditar = $row["descripcion"];
}

$conn->close();
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset='utf-8'>
  <meta http-equiv='X-UA-Compatible' content='IE=edge'>
  <title>MinasMarket</title>
  <meta name='viewport' content='width=device-width, initial-scale=1'>
  <link rel='stylesheet' type='text/css' media='screen' href='../../css/mdb.min.css'>
  <script src='../js/main.js'></script>
</head>

<body>
<div class="Div-edicion"> 
    <h2>Editar Proveedor</h2>
    </div>
    <form action="" method="post"> 
        <div class="form-group">
            <label for="nombreProveedorEditar">Nombre del proveedor:</label>
            <input type="text" id="nombreProveedorEditar" name="nombreProveedorEditar" value="<?php echo $nombreProveedorEditar; ?>" required>
        </div>
        <div class="form-group">
            <label for="telefonoProveedorEditar">Teléfono del proveedor:</label>
            <input type="text" id="telefonoProveedorEditar" name="telefonoProveedorEditar" value="<?php echo $telefonoProveedorEditar; ?>" required>
        </div>
        <div class="form-group">
            <label for="nitEditar">Nit:</label>
            <input type="number" id="nitEditar" name="nitEditar" value="<?php echo $nitEditar; ?>" required>
        </div>
        <div class="form-group">
            <label for="DescripionEditar">Descripción:</label>
            <input type="text" id="DescripionEditar" name="DescripionEditar" value="<?php echo $descripcionEditar; ?>" required>
        </div>
        <div class="form-group">
            <label for="idProveedorEditar">ID:</label>
            <input type="number" id="idProveedorEditar" name="idProveedorEditar" value="<?php echo $id_proveedor; ?>" required>
        </div>
        <button type="submit" class="btn-secondary">Guardar Cambios</button>
    </form>
</body>
</html>