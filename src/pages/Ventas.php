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
      function validarSelectVentas() {
        var selectProducto = document.getElementById("producto");
        var productoSeleccionado = selectProducto.value;

        // Verifica si el valor seleccionado en el campo select es una opción vacía
        if (productoSeleccionado === "") {
          alert("El producto no puede estar vacio.");
          return false;
        }
        return true;
    } 

      function validarCantidad() {
        var cantidadInput = document.getElementById("cantidad");
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
    
    <form class="styled-form" action="../php/registrar_factura.php" method="post" id="formulario" onsubmit="return validarSelectVentas();">
      
      
      <div class="form-group">
          <label for="cedulaCliente">Cedula cliente:</label>
          <input type="number" id="cliente" name="cedulaCliente" step="0.01" required >
      </div>

      <div class="form-group">
          <label for="producto">Selecciona un Producto:</label>
          <select id="producto" name="producto" >
            <?php
            
              include "../php/conexion.php";

              $sql = "SELECT nombre_producto FROM producto";
              $result = $conn->query($sql);

              if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                   
                    echo "<option>" . $row['nombre_producto'] . "</option>";
                }
            }

            ?>
          
          </select>
      </div>

      <div class="form-group">
          <label for="precio">Precio Unitario:</label>
          <input type="number" id="precio" name="precio" step="0.01" required oninput="validarPrecio()">
      </div>

      <div class="form-group">
          <label for="cantidad">Cantidad:</label>
          <input type="number" id="cantidad" name="cantidad" required oninput="validarCantidad()">
      </div>

     
      <div id="previsualizacion">
          <h2>Factura</h2>
          <p >MinasMarket</p>
          <p >3170997865</p>
          <p >calle 18 #23-15</p>
          <p >***************************************************</p>
          <p>Cliente: <span id="clienteSeleccionado"></span></p>
          <p>Producto: <span id="productoSeleccionado"></span></p>
          <p>Precio Unitario: <span id="precioUnitario">0.00</span></p>
          <p>Cantidad: <span id="cantidadSeleccionada">0</span></p>
          <p>Total: <span id="total">0.00</span></p>
      </div>

    

      <input type="submit" name="Registrar_Factura" value="Generar Factura">
      
  </form>

  <table border="1">
    <tr>
        <th>Nombre Producto</th>
        <th>Precio producto</th>
        <th>Cantidad</th>
        <th>Cedula cliente</th>
        <th>Numero de factura</th>
        <th>Total</th>
    </tr>
    <?php
    
    include "../php/conexion.php";

    
    $sql = "SELECT nombre_producto, precio_producto, cantidad, cedula_cliente, nro_de_factura, total FROM factura";
    $result = $conn->query($sql);
      echo '<div class="lista-elementos">';
      echo '<img src="../../img/logoInv.png" alt="Mi imagen" class="logo">';
      echo '<h2>Lista de facturas</h2>';
      echo '</div>';
    if ($result->num_rows > 0) {
        
      while ($row = $result->fetch_assoc()) {
          echo '<tr>';
          echo '<td>' . $row["nombre_producto"] . '</td>';
          echo '<td>' . $row["precio_producto"] . '</td>';
          echo '<td>' . $row["cantidad"] . '</td>';
          echo '<td>' . $row["cedula_cliente"] . '</td>';
          echo '<td>' . $row["nro_de_factura"] . '</td>';
          echo '<td>' . $row["total"] . '</td>';
          echo '</tr>';
      }
  } else {
    echo '<div class="lista-elementos2">';
    echo '<h2>No hay facturas registradas en la base de datos.</h2>';
    echo '</div>';
  }

    $conn->close();
    ?>
</table>

    
</body>
</html>