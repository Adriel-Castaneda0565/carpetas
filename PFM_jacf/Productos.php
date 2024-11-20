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
    
<!--Carrucel-->
<br><br><br><br>


<!--Productos-->



    <div class="catego">
        
        <a href="peluches.php" class="xx">
        <img src=img/arkito.png class="imagen-cat">
        <p style="color:black">peluches</p>
        </a>
        

        <a href="figuras.php" class="xx">
        <img src=img/arkito.png class="imagen-cat">
        <p style="color:black">figuras</p>
        </a>

        <a href="Carritos.php" class="xx">
        <img src=img/arkito.png class="imagen-cat">
        <p style="color:black">carros</p>
        </a>
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