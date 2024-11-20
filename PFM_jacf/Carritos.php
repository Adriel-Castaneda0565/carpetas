<!DOCTYPE html>
<html>
<head>
    <title>Inicio</title>
    <link rel="stylesheet" href="styles.css?v=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    
    <header class="header">
        <div class="logo">
            <a href="index.php"><img src="img/frikisaurstore.png"></a>
        </div>

    <nav><ul class="nav">
            <li><a href="index.php">Inicio</a>
            <li><a href="Productos.php">Productos</a>
                <ul>
                    <li><a href="Ropa.php">Ropa</a></li>
                    <li><a href="Figuras.php">Figuras</a></li>
                </ul>
                <li><div class="boton-popup">
                <label for="btn-popup">
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
<!--Carrucel-->

    <!--Productos-->

    <div class="productos">
        <?php
        include("db.php");
        $categoria="Carros";
        if($categoria=="Carros"){
        $sql=$conn->query("SELECT *FROM productos WHERE categoria='$categoria'");
        while($datos=$sql->fetch_object()){?>
        <div class="ss">
        <div class="nombre-p"><?=htmlspecialchars($datos->nombre)?></div>
        <img src="<?=htmlspecialchars($datos->imagen)?>" alt="" class="imagen-p">
        <div class="desc"><?=htmlspecialchars($datos->descripcion)?></div>
        <div class="precio-p">$<?=htmlspecialchars($datos->precio)?></div><br>
        <div class="id-p">$<?=htmlspecialchars($datos->id)?></div><br>
        <a class="boton-cart" href='carrito.php?id=<?=htmlspecialchars($datos->id)?>'>Agregar a carrito</a>
        </div>
        <?php   
        }
    }
        ?>
       
    </div>



    <footer class="pie-pagina" style="margin-top: 100px;">
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