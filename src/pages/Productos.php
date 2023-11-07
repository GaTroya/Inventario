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
  <header>
    
    <nav class="navbar navbar-expand-lg navbar-dark bg-black">
      <div class="container-fluid">
        <button
          class="navbar-toggler"
          type="button"
          data-mdb-toggle="collapse"
          data-mdb-target="#navbarExample01"
          aria-controls="navbarExample01"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <i class="fas fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarExample01">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link" href="http://localhost:8080/minasMarket">Home</a>
            </li>
            <li class="nav-item active">
              <a class="nav-link" aria-current="page" href="Productos.php">Productos</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="Proveedores.php">Proveedores</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="Ventas.php">Ventas</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    
  
  </header>

    <button class="boton-mas" id="mostrarFormulario">+</button>

    <script>

      function validarCantidad() {
        var cantidadInput = document.getElementById("stock");
        var cantidad = parseFloat(cantidadInput.value);

        if (isNaN(cantidad) || cantidad <= 0) {
            cantidadInput.setCustomValidity("La cantidad debe ser un número mayor a 0");
        } else {
            cantidadInput.setCustomValidity(""); 
          }
      }

      function validarPrecio() {
        var cantidadInput = document.getElementById("precio");
        var cantidad = parseFloat(cantidadInput.value);

        if (isNaN(cantidad) || cantidad <= 0) {
            cantidadInput.setCustomValidity("La precio debe ser un número mayor a 0");
        } else {
            cantidadInput.setCustomValidity(""); 
          }
      }
    </script>
    
    <form  class="styled-form" action="../php/registrar_producto.php" method="post" id="formulario" >


      <div class="form-group">
              <label for="Codigo">Codigo del Producto:</label>
              <input type="Number" id="Codigo" name="Codigo" required>
          </div>
          
      <div class="form-group">
              <label for="nombre">Nombre del Producto:</label>
              <input type="text" id="nombre" name="nombre" required >
          </div>
  
      <div class="form-group">
              <label for="precio">Precio:</label>
              <input type="number" id="precio" name ="precio" step="0.01" required oninput="validarPrecio()">
          </div>
  
  
          <div class="form-group">
              <label for="stock">Cantidad en Stock:</label>
              <input type="number" id="stock" name="stock" required oninput="validarCantidad()">
          </div>
  
          <div class="form-group">
              <label for="Fecha_Vence">Fecha de Vencimiento:</label>
              <input type="date" id="Fecha_Vence" name="Fecha_Vence" min="2023-10-26" required>
          </div>
  
          <input type="submit" value="Registrar Producto" name="Registrar_Producto">
      </form>

<table border="1">
    <tr>
        <th>Código</th>
        <th>Nombre</th>
        <th>Precio</th>
        <th>Cantidad</th>
        <th>Fecha de Vencimiento</th>
    </tr>
    <?php


    include "../php/conexion.php";

  
    $sql = "SELECT codigo_producto, nombre_producto, precio_producto, stock_producto, fecha_vencimiento FROM producto";
    $result = $conn->query($sql) ;
        echo '<div class="lista-elementos">';
          echo '<img src="../../img/logoInv.png" alt="Mi imagen" class="logo">';
          echo '<h2>Lista de Productos</h2>';
          echo '</div>';
    if ($result->num_rows > 0) {   
      while ($row = $result->fetch_assoc()) {
          echo '<tr>';
          echo '<td>' . $row["codigo_producto"] . '</td>';
          echo '<td>' . $row["nombre_producto"] . '</td>';
          echo '<td>' . $row["precio_producto"] . '</td>';
          echo '<td>' . $row["stock_producto"] . '</td>';
          echo '<td>' . $row["fecha_vencimiento"] . '</td>';

          echo '<td><a class="editar-producto" href="../php/editar_producto.php?id=' . $row["codigo_producto"] . '">Editar</a></td>';
          echo '</tr>';
      }
  } else {
    echo '<div class="lista-elementos2">';
    echo '<h2>No hay productos registrados en la base de datos.</h2>';
    echo '</div>';
  }

    $conn->close();
    ?>
</table>

</body>
</html>

