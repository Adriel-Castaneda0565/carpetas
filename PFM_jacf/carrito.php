<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrito</title>
    <link rel="stylesheet" href="cart.css?v=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
<header class="header">
        <div class="logo">
            <a href="index.php"><img src="img/logo1.png"></a>
        </div>

    <nav><ul class="nav">
            <li><a href="index.php">Inicio</a>
            <li><a href="Productos.php">Productos</a>
                <ul>
                    <li><a href="Peluches.php">Peluches</a></li>
                    <li><a href="Figuras.php">Figuras</a></li>
                    <li><a href="Carritos.php">Carritos</a></li>
                </ul>
                <li><div class="boton-popup">
                <label style="color:#20d2d8;" for="btn-popup">
                    Contacto
                </label>
            </div></li>
            <li><a href="carrito.php" class="btn-c"><button>carrito</button></a></li> 
        </ul>
    </nav>
    <?php
        include("db.php");
        session_start();
        // Verificar si el usuario ha iniciado sesión
        if (!isset($_SESSION['users'])) {
        // Si no ha iniciado sesión, mostrar el enlace para registrarse
        echo '<a href="inicio.php" class="btn"><button>Inicio de sesion</button></a>';
        } else {
        // Si ha iniciado sesión, mostrar el nombre del usuario y el enlace para cerrar sesión
        echo '<p class="bienvenido">Bienvenid@, ' . htmlspecialchars($_SESSION['users']) . '</p>';
        echo '<p><br></p>';
        echo '<a href="cerrarsesion.php" class="btn"><button>Cerrar Sesión</button></a>';
    }?>
        <input type="checkbox" id="btn-popup">
        <div class="popup-contr">
            <div class="popup-cont">
                <div class="yo">
                    <img src="/img/adri.png.jpg">
                </div>
                <h3>Nombre</h3>
                <p>Jesus Adriel Castañeda Franco</p>
                <h3>Especialidad</h3>
                <p>Programacion</p>
                <h3>Semestre</h3>
                <p>4to Semestre</p>
                <div class="close">
                    <label for="btn-popup">Cerrar</label>
                </div>
            </div>
            <label for="btn-popup" class="close-popup"></label>
        </div>

        
    </header>
  
<?php

include("db.php");

$usuario = $_SESSION['users'];

// Obtener el ID del usuario desde la base de datos
$sql_user = "SELECT id FROM users WHERE username = '$usuario'";
$result_user = $conn->query($sql_user);

if ($result_user->num_rows > 0) {
    $user_data = $result_user->fetch_assoc();
    $id_usuario = $user_data['id'];
} else {
    //si no a iniciado sesion
    echo "<input type=\"checkbox\" id=\"btn-popup\" checked>";
    echo "<div class=\"popup-contr\">";
    echo "<div class=\"popup-cont\">";
    echo "<h3>USUARIO SIN REGISTRAR</h3><p>Parece que aun no has iniciado sesion</p>";
    echo "<h3>Ya tienes un usuario?</h3>",'<a href="login.php" class="btn"><button>Inicio de sesion</button></a>';
    echo "<h3>Nuevo Usuario?</h3>",'<a href="register.php" class="btn"><button>Registrar</button></a>';
    echo '<br><br><a href="index.php" class="btn-v"><button>Volver</button></a>';
    echo "</div>";
    echo "</div>";
    //no permite que se ejecute lo demas
    exit();
}

// Verificar si se ha pasado un ID de producto para añadir al carrito
if (isset($_GET['id'])) {
    $producto_id = intval($_GET['id']);

    $sql = "SELECT * FROM productos WHERE id = '$producto_id'";
    $resultado = $conn->query($sql);
    //si existe el producto y(&&) el resultado es mayor a 0
    if ($resultado && $resultado->num_rows > 0) {
        $sqlCarrito = "SELECT cantidad FROM carrito WHERE productoid = '$producto_id' AND usuarioid = '$id_usuario'";
        $resultadoCarrito = $conn->query($sqlCarrito);
        //si el producto existe en la cuanta del usuario y(&&) la cantidad es mayor a 0
        if ($resultadoCarrito && $resultadoCarrito->num_rows > 0) {
            $carrito = $resultadoCarrito->fetch_assoc();
            $cantidad = $carrito['cantidad'] + 1;
            $sql_update = "UPDATE carrito SET cantidad = $cantidad WHERE productoid = '$producto_id'AND usuarioid = ' $id_usuario'";
            $conn->query($sql_update);
        } else {
            //si aun no existe se agrega con una cantidad con valor 1
            $sqlInsert = "INSERT INTO carrito (usuarioid, productoid, cantidad) VALUES ('$id_usuario', '$producto_id', 1)";
            $conn->query($sqlInsert);
        }
        //regresa para que puedas seguir agregando productos
        header("location:carrito.php");
    }
}

$totalg = 0;

// si se dio click en el boton con nombre 'delete'
if (isset($_POST['delete'])) {
    $id = $_POST['id'];
    $sql = "DELETE FROM carrito WHERE productoid = $id AND usuarioid = $id_usuario";
    $conn->query($sql);
}



// si se dio click en el boton con nombre 'decrementar'
if (isset($_POST['decrementar'])) {
    $id = $_POST['id'];
    $sqlc = "SELECT cantidad FROM carrito WHERE productoid = '$id' AND usuarioid = '$id_usuario'";
    $result = $conn->query($sqlc);
    if ($result) {
        $row = $result->fetch_assoc();
        $cantidad = $row['cantidad'] - 1;
        $sql_update = "UPDATE carrito SET cantidad = $cantidad WHERE productoid = '$id' AND usuarioid = '$id_usuario'";
        $conn->query($sql_update);
        //si la cantidad es menor a 1 se elimina
        if ($cantidad < 1) {
            $sql = "DELETE FROM carrito WHERE productoid = $id AND usuarioid = $id_usuario";
            $conn->query($sql);
        }
    }
}

// si se dio click en el boton con nombre 'incrementar'
if (isset($_POST['incrementar'])) {
    $id = $_POST['id'];
    $sqlc = "SELECT cantidad FROM carrito WHERE productoid = '$id' AND usuarioid = '$id_usuario'";
    $result = $conn->query($sqlc);
    if ($result) {
        $row = $result->fetch_assoc();
        $cantidad = $row['cantidad'] + 1;
        $sql_update = "UPDATE carrito SET cantidad = $cantidad WHERE productoid = '$id' AND usuarioid = '$id_usuario'";
        $conn->query($sql_update);
    }
}

//conexion con la tabla carrito que se encuentra relacionada con la tabla productos
$sql_compras = "SELECT c.*, p.nombre AS productos_nombre, p.descripcion AS productos_descripcion, p.precio AS productos_precio, p.imagen AS productos_imagen
                FROM carrito c
                JOIN productos p ON c.productoid = p.id
                WHERE c.usuarioid = $id_usuario";
$result_compras = $conn->query($sql_compras);
// si hay productos en la tabla carrito

if ($result_compras->num_rows > 0) {
    echo "<div class=\"t-cart\">";
    echo "<h2>Tus productos en CARRITO</h2>";
    echo "</div>";
    echo "<table border='3'>";
    echo "<tr>";
    echo "<th>Imagen</th>";
    echo "<th>Nombre</th>";
    echo "<th>Descripción</th>";
    echo "<th>Cantidad</th>";
    echo "<th>Precio Individual</th>";
    echo "<th>Total</th>";
    echo "<th></th>";
    echo "</tr>";
    //escribe los datos de cada producto existente en la tabla carrito
    while ($pcarrito = $result_compras->fetch_assoc()) {
        //variable que multiplica el valor de los productos por la cantidad de estos
        $total = $pcarrito['cantidad'] * $pcarrito['productos_precio'];
        //acumulador que suma el precio de los preductos
        $totalg += $total;
        ?>

        <tr>
            <!-- se agregan a la tabla los datos de cada producto  -->
            <td><img src="<?= htmlspecialchars($pcarrito['productos_imagen']) ?>" alt="Producto" width="100"></td>
            <td><?= htmlspecialchars($pcarrito['productos_nombre']) ?></td>
            <td><?= htmlspecialchars($pcarrito['productos_descripcion']) ?></td>
            <td>
                 <!-- + -->
                 <form action="" method="POST" >
                    <input type="hidden" name="id" value="<?= $pcarrito['productoid'] ?>">
                    <button type="submit" name="incrementar">+</button>
                </form>
                <?= htmlspecialchars($pcarrito['cantidad']) ?>
                <!-- - -->
                <form action="" method="POST" >
                    <input type="hidden" name="id" value="<?= $pcarrito['productoid'] ?>">
                    <button type="submit" name="decrementar">-</button>
                </form> 
            </td>
            <!-- (number_formar) agrega los decimales y se le asigna al final el numero de estos (2) -->
            <td>$<?= number_format($pcarrito['productos_precio'], 2) ?></td>
            <td>$<?= number_format($total, 2) ?></td>
            <td>
                <!-- ELIMINA -->
                <form action="" method="POST">
                    <input type="hidden" name="id" value="<?= $pcarrito['productoid'] ?>">
                    <button type="submit" name="delete">Quitar del carrito</button>
                </form>
            </td>
        </tr>
        <?php
    }
    echo "<tr>";
    echo "<td colspan='5' style='text-align:right;'><strong>Total General:</strong></td>";
    echo "<td colspan='2'>$" . number_format($totalg, 2) . "</td>";
    echo "</tr>";
    $iva = $totalg * 0.16;
    $precioiva = $totalg + $iva;
    echo "<tr>";
    echo "<td colspan='5' style='text-align:right;'><strong>IVA:</strong></td>";
    echo "<td colspan='2'>$" . number_format($iva, 2) . "</td>";
    echo "</tr>";
    echo "<tr>";
    echo "<td colspan='5' style='text-align:right;'><strong>Total con IVA:</strong></td>";
    echo "<td colspan='2'>$" . number_format($precioiva, 2) . "</td>";
    echo "</tr>";
    echo "</table>";
    ?>
    <div class="d-grid">
<button  type="button" class="btn btn-primary btn-block" data-bs-toggle="modal" data-bs-target="#myModal">
    Finalizar Compra
  </button>
  <br><br><br><br>
  </div>
<!-- The Modal -->
<div class="modal" id="myModal">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
  <div class="modal-header">
        <h4 class="modal-title">Ticket</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <!-- Modal body -->
      <div class="modal-body">
     <?php 
    echo "<tr>";
    echo "<td colspan='5' style='text-align:right;'><strong>Total General:</strong></td>";
    echo "<td colspan='2'>$" . number_format($totalg, 2) . "</td>";
    echo "</tr>"; ?> <br><?php
    $iva = $totalg * 0.16;
    $precioiva = $totalg + $iva;
    echo "<tr>";
    echo "<td colspan='5' style='text-align:right;'><strong>IVA:</strong></td>";
    echo "<td colspan='2'>$" . number_format($iva, 2) . "</td>";
    echo "</tr>";
    echo "<tr>";?> <br><?php
    echo "<td colspan='5' style='text-align:right;'><strong>Total con IVA:</strong></td>";
    echo "<td colspan='2'>$" . number_format($precioiva, 2) . "</td>";
    echo "</tr>";?>
      

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn bg-success" data-bs-dismiss="modal">PAGAR</button>
    </div>
    </div>
    <footer class="pie-pagina">
    <div class="grupo-1">
        <div class="box">
            <figure>
                <a href="#">
                    <img src="img/logo1.png" alt="logo footer">
                </a>
            </figure>
        </div>
        <div class="box">
            <h2>SOBRE NOSOTROS</h2>
            <p>Fundador:Jesus Adriel Castañeda Franco</p>
            <p>Centro de Bachillerato Tecnologico industrial y de servicios</p>
        </div>
        <div class="box">
            <h2>Con precios jurasicos<br>desde el cretacico hasta tu casa</h2>
        </div>
    </div>
    <div class="grupo-2">
        <small>&copy;2024 <b>DINOTIENDA</b>-Todos los Derechos Reservados</small>
    </div>
    </footer> <div class="box">
    <h2>Con precios jurasicos<br>desde el cretacico hasta tu casa</h2>

        </div>
    </div> 
    </div>
    </div>
    <?php
} else {
    echo "<p>Aun no se han agregado productos a este carrito.</p><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>";
}
?>


<footer class="pie-pagina">
    <div class="grupo-1">
        <div class="box">
            <figure>
                <a href="#">
                    <img src="img/logo1.png" alt="logo footer">
                </a>
            </figure>
        </div>
        <div class="box">
            <h2>SOBRE NOSOTROS</h2>
            <p>Fundador:Jesus Adriel Castañeda Franco</p>
            <p>Centro de Bachillerato Tecnologico industrial y de servicios</p>
        </div>
        <div class="box">
            <h2>Con precios jurasicos<br>desde el cretacico hasta tu casa</h2>
        </div>
    </div>
    <div class="grupo-2">
        <small>&copy;2024 <b>DINOTIENDA</b>-Todos los Derechos Reservados</small>
    </div>
    </footer>
</body>
</html>