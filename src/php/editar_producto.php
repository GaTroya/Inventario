<?php
include "../php/conexion.php";

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

$id_producto = $_GET['id']; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombreProductoEditar = $_POST["nombreProductoEditar"];
    $precioProductoEditar = $_POST["precioProductoEditar"];
    $stockEditar = $_POST["stockEditar"];
    $fechaVencimientoEditar = $_POST["FechaVenceEditar"];
    $codigoEditar = $_POST["CodigoEditar"];

    $sql = "UPDATE producto SET nombre_producto = '$nombreProductoEditar', precio_producto = '$precioProductoEditar', stock_producto = '$stockEditar', fecha_vencimiento = '$fechaVencimientoEditar' WHERE codigo_producto = $codigoEditar";

    if ($conn->query($sql) === TRUE) {
        header("Location: ../pages/Productos.php"); 
        exit();
    } else {
      
    }
}


$sql = "SELECT codigo_producto, nombre_producto, precio_producto, stock_producto, fecha_vencimiento FROM producto WHERE codigo_producto = $id_producto";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $nombreProductoEditar = $row["nombre_producto"];
    $precioProductoEditar = $row["precio_producto"];
    $stockEditar = $row["stock_producto"];
    $fechaVencimientoEditar = $row["fecha_vencimiento"];
    $codigoEditar = $row["codigo_producto"];
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
    <h2>Editar Producto</h2>
    </div>
    <form class="Edicion" action="" method="post">
        <div class="form-group">
            <label for="CodigoEditar">Código del Producto:</label>
            <input type="number" id="CodigoEditar" name="CodigoEditar" value="<?php echo $codigoEditar; ?>" required>
        </div>
        <div class="form-group">
            <label for="nombreProductoEditar">Nombre del Producto:</label>
            <input type="text" id="nombreProductoEditar" name="nombreProductoEditar" value="<?php echo $nombreProductoEditar; ?>" required>
        </div>
        <div class="form-group">
            <label for="precioProductoEditar">Precio:</label>
            <input type="number" id="precioProductoEditar" name="precioProductoEditar" step="0.01" value="<?php echo $precioProductoEditar; ?>" required>
        </div>
        <div class="form-group">
            <label for="stockEditar">Cantidad en Stock:</label>
            <input type="number" id="stockEditar" name="stockEditar" value="<?php echo $stockEditar; ?>" required>
        </div>
        <div class="form-group">
            <label for="FechaVenceEditar">Fecha de Vencimiento:</label>
            <input type="date" id="FechaVenceEditar" name="FechaVenceEditar" min="2023-10-26" value="<?php echo $fechaVencimientoEditar; ?>" required>
        </div>
        <button type="submit" class="btn-secondary">Guardar Cambios</button>
    </form>
</body>
</html>