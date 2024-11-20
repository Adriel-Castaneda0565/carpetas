<!DOCTYPE html>
<html>
<head>
    <title>Inicio</title>
    <link rel="stylesheet" href="styles.css?v=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <!--Ventana emergente-->


    <header class="header">
        <div class="logo">
            <a href="index.php"><img src="img/logo1.png"></a>
        </div>

    <nav><ul class="nav">
            <li><a href="#">Inicio</a>
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
<!--Carrucel-->
<center><h2>BIENVENIDO A LA DINOTIENDA</h2></center>

    <div class="carrusel">
        <div class="txtc">
            Somos una tienda encargada de brindar suenos 
            y aventuras con diferentes articulos para chicos
            y grandes, con los mejores precios del mercado
        </div>
        <div class="carousel-container">
            <div class="carousel">
                <img src="img/dodito.png" style="height: 500px;"  class="carousel-image">
                <img src="img/3pack.png" style="height: 500px;"  class="carousel-image">
                <img src="img/jprex.png" style="height: 500px;"  class="carousel-image">
                <img src="img/bmw.png" style="height: 500px;"  class="carousel-image">
                <img src="img/blackminidragon.png" style="height: 500px;"  class="carousel-image">
                <img src="img/blackdragon.png" style="height: 500px;"  class="carousel-image">
                <img src="img/rexfigura.png" style="height: 500px;"  class="carousel-image">
                <img src="img/run.png" style="height: 500px;"  class="carousel-image">
            </div>
            <button class="prev" onclick="changeSlide(-1)">&#10094;</button>
            <button class="next" onclick="changeSlide(1)">&#10095;</button>
        </div>
        <br>
    </div>
    <script src="script.js"></script>

    <!--Productos-->

    

    


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