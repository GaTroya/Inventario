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
    
    <form  class="styled-form" action="../php/registrar_proveedores.php" method="post" id="formulario" >


      <div class="form-group">
              <label for="nombreProveedor">Nombre del proveedor:</label>
              <input type="text" id="nombreProveedor" name="nombreProveedor" required>
          </div>
          
      <div class="form-group">
              <label for="telefonoProveedor">Telefono del proveedor:</label>
              <input type="number" id="telefonoProveedor" name="telefonoProveedor"  required>
          </div>
  
      <div class="form-group">
              <label for="nit">Nit:</label>
              <input type="number" id="nit" name ="nit" step="0.01" required>
          </div>
  
  
          <div class="form-group">
              <label for="Descripion">Descripion :</label>
              <input type="textarea"  id="Descripion" name="descripcionProveedor"  required>
          </div>
  
        
  
          <input type="submit" value="Registrar Producto" name="Registrar_Proveedor">
      </form>

<table border="1">
    <tr>
        <th>Nombre</th>
        <th>Telefono</th>
        <th>Nit</th>
        <th>Descripcion</th>
        <th>Id</th>
    </tr>
    <?php
    include "../php/conexion.php";

    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }

    $sql = "SELECT nombre_proveedor, telefono_proveedor, nit, descripcion, id_proveedor FROM proveedor";
    $result = $conn->query($sql);
      echo '<div class="lista-elementos">';
      echo '<img src="../../img/logoInv.png" alt="Mi imagen" class="logo">';
      echo '<h2>Lista de proveedores</h2>';
      echo '</div>';
    if ($result->num_rows > 0) {
      
      while ($row = $result->fetch_assoc()) {
          echo '<tr>';
          echo '<td>' . $row["nombre_proveedor"] . '</td>';
          echo '<td>' . $row["telefono_proveedor"] . '</td>';
          echo '<td>' . $row["nit"] . '</td>';
          echo '<td>' . $row["descripcion"] . '</td>';
          echo '<td>' . $row["id_proveedor"] . '</td>';
          echo '<td><a class="editar-producto" href="../php/editar_proveedor.php?id=' . $row["id_proveedor"] . '">Editar</a></td>';
          echo '</tr>';
      }
  } else {
    echo '<div class="lista-elementos2">';
    echo '<h2>No hay proveedores registrados en la base de datos.</h2>';
    echo '</div>';
  }

    $conn->close();
    ?>
</table>

 
</body>
</html>